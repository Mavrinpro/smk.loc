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
                            'roles' => ['create_admin', 'moderator'],
                        ],
                    ],
                ],
            ]
        );
    }

    public function actionIndex()
    {
        $model2 = \app\models\Notyfication::find()->where(['user_id' => 1])->orderBy('id desc')->all();

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