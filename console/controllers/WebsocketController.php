<?php
namespace console\controllers;
require 'vendor/autoload.php';

use Workerman\Timer;
use Workerman\Worker;
use yii\web\BadRequestHttpException;

$USERS          = [];
$CONNECT_LIST   = null;

class WebsocketController extends \yii\web\Controller
{


    public function beforeAction($action)
    {
        // ...set `$this->enableCsrfValidation` here based on some conditions...
        // call parent method that will check CSRF if such property is true.
        if ($action->id === 'index') {
            # code...
            $this->enableCsrfValidation = false;
        }
        return parent::beforeAction($action);
    }
    /**
     * {@inheritdoc}
     */


    public function actionIndex()
    {

        $TCP            = "tcp://127.0.0.1:8095";

        $worker = new Worker('websocket://127.0.0.1:8090');
        $worker->count = 1;
        $worker->user  = 'alex';
        $worker->name  = 'messages';

        // код таймера для пинга пользователей.
        $worker->onWorkerStart = function ($worker) use ($TCP) {


            $interval = 30; // пингуем каждые 30 секунд

            // Таймер проверки пользователя, онлайн или нет
            Timer::add($interval, function () {
                global $USERS;
                global $CONNECT_LIST;

                if(isset($CONNECT_LIST) && sizeof($CONNECT_LIST)) {
                    foreach ($CONNECT_LIST as $c) {

                        // Если ответ от клиента не пришел 2 раза, то удаляем соединение из списка
                        // и оповещаем всех участников об "отвалившемся" пользователе
                        if ($c->pingWithoutResponseCount >= 2) {
                            unset($CONNECT_LIST[$c->id]);
                            unset($USERS[$c->userInfo->id]);

                            $c->destroy(); // уничтожаем соединение
                        } else {
                            echo PHP_EOL."Отправляем пинг: cid: ".$c->id;
                            $c->send(json_encode(['type' => 'Ping']));
                            $c->pingWithoutResponseCount++; // увеличиваем счетчик пингов
                        }

                    }
                }

            });


            // создаём локальный tcp-сервер, чтобы отправлять на него сообщения из кода нашего сайта
            $tcp_worker = new Worker($TCP);

            // создаём обработчик сообщений, который будет срабатывать,
            // когда на локальный tcp-сокет приходит сообщение
            $tcp_worker->onMessage = function ($connection, $data) {
                global $USERS;
                global $CONNECT_LIST;

                echo PHP_EOL."Входные данные: ".$data;

                $DATA = @json_decode($data, true);
                switch (@$DATA['type']) {

                    // Тестовая удаленная отправка
                    case 'UserMessage':
                        foreach ($CONNECT_LIST as $c) {
                            $c->send(json_encode([
                                'type' => 'UserMessage',
                                'message' => 'СООБЩЕНИЕ ИЗ PHP',
                            ]));
                        }

                        break;

                }



                //$connection->send($data);
            };

            $tcp_worker->listen();


        };


        $worker->onConnect = function ($connection) {

            echo PHP_EOL."new connection from ip " . @$connection->getRemoteIp() .PHP_EOL;

            // Эта функция выполняется при подключении пользователя к WebSocket-серверу
            $connection->onWebSocketConnect = function ($connection) {
                global $USERS;
                global $CONNECT_LIST;
                $connection->pingWithoutResponseCount = 0;

                $connection->userInfo = (object)[
                    'id' => rand(0, 100),
                    'name' => rand(0, 100),
                    'img' => @$_COOKIE['test'],
                    'time_in' => date('Y-m-d H:i:s'),
                ];

                // счетчик безответных пингов
                $connection->pingWithoutResponseCount = 0;


                $CONNECT_LIST[$connection->id]    = $connection;
                $USERS[$connection->userInfo->id] = $connection;


                // Добавляем в соединение данные пользователя
                if (isset($connection->userInfo->id)) {

                    echo PHP_EOL."В сети пользователь: " . @$connection->userInfo->name . " \n";

                } else {

                    echo PHP_EOL."Не определился пользователь \n";

                }


            };

        };

        // Разбор входящих данных
        $worker->onMessage = function ($connection, $data) use ($worker) {
            global $USERS;
            global $CONNECT_LIST;

            echo PHP_EOL."Входящее сообщение: " . $data . " \n";

            $DATA = json_decode($data, true);
            $USER = @$worker->connections[@$connection->id]->userInfo;
            $chat = new \console\models\Chat();

            $userMessage = \common\models\User::find()->where(['status' => 10])->andWhere(['!=', 'id', $DATA['user_id']])->all();

            $usID = [];

            foreach ($userMessage as $item) {
                $usID[] = $item->id;
            }

            \Yii::$app->db->createCommand('SET SESSION wait_timeout = 28800;')->execute();
            if (!empty($DATA['message'])){
                $chat->text = $DATA['message'];
                $chat->user_id = $DATA['user_id'];
                $chat->ip_adress = $DATA['ip'];
                $chat->create_at = time();
                $chat->active = 1;
                $chat->save();

                // Chat message table
                foreach ($userMessage as $mess) {
                    $chat_message = new \console\models\ChatMessage();
                    $chat_message->user_id = $mess->id;
                    $chat_message->message_id = $chat->id;
                    $chat_message->save();
                }

            }else{
                return false;
            }

            if($chat->save()) {
                $message = \console\models\Chat::findOne(['id' => $chat->id]);
                $user = \common\models\User::find()->where(['id' => $message->user_id])->one();

                $countMessage = new \console\models\ChatMessage();
                $results = $countMessage->getUsersMessageCount();

                //$cookies = \Yii::$app->response->cookies;
                $arrayUSER = [];
                $arrayCOUNT = [];
                foreach ($results as $result) {

                    $arrayUSER[] = $result['user_id'];
                    $arrayCOUNT[] = $result['COUNT(user_id)'];

                }

                // Тут мы получаем массив из которого по методам определяем куда адресовано и делаем что нужно
                switch ($DATA['type']) {

                    // Тестовая удаленная отправка
                    case 'UserMessage':

                        foreach ($CONNECT_LIST as $c) {
                            // if($c->userInfo->group == 'managers')
                            $c->send(json_encode([
                                'type' => 'JsGetMessage',
                                'message' => $message->text,
                                'create_at' => date('d.m.Y H:i', $message->create_at),
                                'user_id' => $user->id,
                                'username' => $user->username,
                                'avatar' => $user->avatar,
                                'countMessage' => $arrayCOUNT,
                                'idUSER' => $arrayUSER,

                            ]));

                        }

                        break;


                }
            }
                if ($DATA['type'] == 'Editable'){
                    $message = \console\models\Chat::findOne(['id' => $DATA['id']]);
                    $message->text = $DATA['message'];
                    $message->update();

                    foreach ($CONNECT_LIST as $c) {
                        $c->send(json_encode([
                            'type' => 'EditedMessage',
                            'message' => $message->text,
                           'messageID' => $message->id
                        ]));

                    }

                }



        };

        $worker->onError = function ($connection, $code, $msg) use ($worker) {

            @file_get_contents('https://api.telegram.org/bo111111111/sendMessage?text=' . urlencode("ОШИБКА СОКЕТА error $code $msg\n") . '&chat_id=164835803');

        };

        // Emitted when connection closed
        $worker->onClose = function ($connection) {
            global $USERS;
            global $CONNECT_LIST;

            // нужно чтобы знать кто именно дисконектнулся
            $USER = null;

            // Когда закрыли страницу
            if(isset($CONNECT_LIST[$connection->id])) {
                $USER = $CONNECT_LIST[$connection->id];
                unset($CONNECT_LIST[$connection->id]);
            }


            echo "Покинул страницу: " . @$USER->userInfo->name . "\n";

            @$connection->destroy(); // уничтожаем соединение

        };


        // Run worker
        Worker::runAll();

    }

}