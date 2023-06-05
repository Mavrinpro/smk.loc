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
        $question = \app\models\Question::find()->where(['test_id' => $id])->one();
        $answer = \app\models\Answer::find()->where(['question_id' => $question->id])->all();
        $result = new \app\models\ResultTest();
        $countQuest = \app\models\Question::find()->where(['test_id' => $id])->count();
        $qu = \app\models\Question::find()->where(['test_id' => $id])->all();
        $next_id = \app\models\Question::find()
            ->where(['test_id' => $id])
            ->where(['>', 'id', $question->id])
            ->orderBy(['id' => SORT_ASC])
            ->one();
        //$i = 0;

        if (\Yii::$app->request->post()) {
            \Yii::$app->session->setFlash('success', 'Запись ');
            return $this->redirect(['view', 'id' => $next_id->id]);
        }


        return $this->render('view', ['id' => $question->id,
            'result' => $result,
            'question' => $question,
            'answer' => $answer,
            'countQuest' => $countQuest,
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
        $id = \Yii::$app->request->get('id');
        $question = \app\models\Question::find()->where(['test_id' => $id])->one();
        $answer = \app\models\Answer::find()->where(['question_id' => $question->id])->all();
        $result = new \app\models\ResultTest();
        $post = \Yii::$app->request->post();


        if (\Yii::$app->request->post()) {
            \Yii::$app->session->setFlash('IdRes', 777);
            return $this->render('view', ['id' => 2]
            //'result' => $result,
            //'question' => $question,
            //'answer' => $answer,
            //'model' => $this->findModel($id),
            );
            //            if ($rightQuestion === 'true'){
            //                $right = 1;
            //                $resultTest->user_id = \Yii::$app->getUser()->id;
            //                $resultTest->test_id = $testId;
            //                $resultTest->create_at = time();
            //                $resultTest->question_id = $questId;
            //                $resultTest->answer_id = $idQuestion;
            //                $resultTest->save();
            //                \Yii::$app->session->setFlash('IdRes', $resultTest->id);
            //            }else {
            //                $right = 0;
            //                $testRes = \app\models\ResultTest::find()->where(['id' => $resultTest->id])->one();
            //                $testRes->delete();
            //            }
            //            //$answer->answer_right = $right;
            //            //$answer->update();
            //            return json_encode($resultTest->id. \Yii::$app->session->getFlash('IdRes'));
        }


    }

    public function actionStart($id)
    {
        //\Yii::$app->db->schema->refresh();
        $question = \app\models\Question::find()->where(['id' => $id])->one();
        $answer = \app\models\Answer::find()->where(['question_id' => $question->id])->all();
        $result = new \app\models\ResultTest();
        //$countQuest = \app\models\Question::find()->where(['test_id' => $id])->count();
        $requestGet = \Yii::$app->request->get();
        $i = 0;

        $next_id = \app\models\Question::find()
            ->where(['id' => $id])
            ->where(['>', 'id', $question->id])
            ->andWhere(['test_id' => $question->test_id])
            ->orderBy(['id' => SORT_ASC])
            ->one();

        if (\Yii::$app->request->isPost) {

            $ansId = \Yii::$app->request->post()['ResultTest']['answer_id'];
            var_dump($ansId); die();

            $testId = \Yii::$app->request->post('ResultTest')['test_id'];
            $question_Id = \Yii::$app->request->post('ResultTest')['question_id'];
            //var_dump($ansId); die;
//            if ($ansId == null || $ansId == '0'){
//                \Yii::$app->session->setFlash('error', 'Выберите вариант ответа');
//                return $this->refresh();
//            }
            if (\Yii::$app->request->post('ResultTest')['answer_text'] != ''){
                \Yii::$app->session->setFlash('success', 'Тест пройден');

                $testId = \Yii::$app->request->get('test_id');
                $result->answer_id = null;
                $result->answer_text = \Yii::$app->request->post('ResultTest')['answer_text'];
                $result->test_id = $testId;
                $result->question_id = \Yii::$app->request->post('ResultTest')['question_id'];;
                $result->create_at = time();
                $result->user_id = \Yii::$app->getUser()->id;
                $result->save();
            }

            if (!isset($next_id->id)) {
                $next_id = 1;
                \Yii::$app->session->setFlash('success', 'Тест пройден');
                $userId = \Yii::$app->getUser()->id;
                $testId = \Yii::$app->request->get('test_id');
                $result->answer_id = $ansId;
                $result->test_id = $testId;
                $result->question_id = $question_Id;
                $result->create_at = time();
                $result->user_id = \Yii::$app->getUser()->id;
                $result->save();
                $res = \app\models\ResultTest::find()->where(['test_id' => $question->test_id, 'user_id' =>$userId])->all();


                return $this->redirect(['end',
                    'test_id' => $question->test_id,
                    'model' => $res,
                ]);

            }

                \Yii::$app->session->setFlash('success', $ansId);
                $result->answer_id = $ansId;
                $result->test_id = $testId;
                $result->question_id = $question_Id;
                $result->create_at = time();
                $result->user_id = \Yii::$app->getUser()->id;
                $result->save();

            if ($next_id->id == null) {
                \Yii::$app->session->setFlash('success', 'Тест пройден');
                $userId = \Yii::$app->getUser()->id;
                $testId = \Yii::$app->request->get('test_id');
                $res = \app\models\ResultTest::find()->where(['test_id' => $testId, 'user_id' =>$userId])->all();
                return $this->render('end', [

                    'model' => $res,
                ]);

            }else{
                \Yii::$app->session->setFlash('success', $ansId);
               
                return $this->redirect(['start', 'id' => $next_id->id, 'test_id' => $next_id->test_id, 'qid'
                =>$question->id]);

            }


        }

        return $this->render('start', ['id' => $question->id,
            'next' => $next_id->id,
            'result' => $result,
            'question' => $question,
            'answer' => $answer,
            'model' => $question,
        ]);
    }

    public function actionEnd()
    {
        $userId = \Yii::$app->getUser()->id;
        $testId = \Yii::$app->request->get('test_id');
        $res = \app\models\ResultTest::find()->where(['test_id' => $testId, 'user_id' =>$userId])->all();


            $re = \app\models\Question::find()->all();

        $q = \app\models\Question::find()->where(['test_id' => $testId])->all();
        return $this->render('end', [
            'name' => $userId,
            'model' => $res,
            'question' => $q
        ]);
    }

}
