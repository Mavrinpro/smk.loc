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
                            'actions' => ['view', 'index'],
                            'roles' => ['view_manager'],
                        ],
                        [
                            'allow' => true,
                            'actions' => ['index'],
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
}