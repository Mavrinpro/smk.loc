<?php

namespace frontend\controllers;

use app\models\Chat;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BusinessTripController implements the CRUD actions for BusinessTrip model.
 */
class ChatController extends Controller
{
    /**
     * @inheritDoc
     */
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
            ]
        );
    }

    /**
     * Lists all BusinessTrip models.
     *
     * @return string
     */
    public function actionIndex()
    {

       $chat = Chat::find()->where(['active' => 1])->all();
        $model = new Chat();
        return $this->render('index', [
            'chat' => $chat,
            'model' => $model,
        ]);
    }


}
