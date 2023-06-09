<?php

namespace frontend\controllers;

use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;

class NotyficationController extends Controller
{

    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
                'access' => [
                    'class' => AccessControl::class,

                    'rules' => [
                        [
                            'allow' => true,
                            'actions' => ['view', 'index', 'ajax-read'],
                            'roles' => ['view_manager'],
                        ],
                        [
                            'allow' => true,
                            'actions' => ['index', 'ajax-read'],
                            'roles' => ['create_admin', 'moderator', 'admin'],
                        ],
                    ],
                ],
            ]
        );
    }

    public function actionIndex()
    {
        $userOldRole = 'admin';
        $authManager = \Yii::$app->authManager;
        $oldRole = $authManager->getRole($userOldRole);
        //$authManager->revoke($oldRole, 2);
                $ivanov = \common\models\User::findOne(2);
                // Достаем роль администратора из RBAC-менеджера.
                $roleAdministrator = \Yii::$app->authManager->getRole('user');
                // Привязываем роль администратора к идентификатору Иванова.
                //\Yii::$app->authManager->assign($roleAdministrator, $ivanov->getRole());

        $model2 = \app\models\Notyfication::find()->where(['user_id' => \Yii::$app->getUser()->id])->orderBy('id desc')
            ->all();

        return $this->render('index', ['model' => $model2]);
    }

    // ajax изменение статуса уведомлений (прочитано)
    public function actionAjaxRead()
    {
        $post = \Yii::$app->request->post();
        $noty = \app\models\Notyfication::find()->where(['in', 'id', $post['id']])->all();
        foreach ($noty as $notification) {
            $notification->read = $post['read'];
            $notification->save();
        }
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return $noty;
    }
}