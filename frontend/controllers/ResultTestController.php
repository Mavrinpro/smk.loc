<?php

namespace frontend\controllers;


use app\models\Test;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
class ResultTestController extends \yii\web\Controller
{
    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionView($id)
    {
        $question = \app\models\Question::find()->where(['test_id' => $id])->all();
        $answer = \app\models\Answer::find()->where(['question_id' => $question->id])->all();
        //var_dump($question); die;
        return $this->render('view', ['id' => $question->id,
            'question' => $question,
            'answer' => $answer,
            'model' => $this->findModel($id),
        ]);
    }

    protected function findModel($id)
    {
        if (($model = Test::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    // Прохождение теста пользователем
    public function actionPassingTest()
    {
        $post = \Yii::$app->request->post();
        $idQuestion = $post['id'];
        $rightQuestion = $post['right'];
        $testId = $post['testId'];
        $questId = $post['questId'];
        //$testRes = \app\models\ResultTest::find()->where(['']);

        $resultTest = new \app\models\ResultTest();
        if(\Yii::$app->request->isAjax){
            if ($rightQuestion === 'true'){
                $right = 1;
                $resultTest->user_id = \Yii::$app->getUser()->id;
                $resultTest->test_id = $testId;
                $resultTest->create_at = time();
                $resultTest->question_id = $questId;
                $resultTest->answer_id = $idQuestion;
                $resultTest->save();
                \Yii::$app->session->setFlash('IdRes', $resultTest->id);
            }else {
                $right = 0;
                $testRes = \app\models\ResultTest::find()->where(['id' => $resultTest->id])->one();
                $testRes->delete();
            }
            //$answer->answer_right = $right;
            //$answer->update();
            return json_encode($resultTest->id. \Yii::$app->session->getFlash('IdRes'));
        }




        //

    }

}
