<?php

namespace frontend\controllers;

use app\models\CheckList;
use app\models\Check;
use app\models\CheckListSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CheckListController implements the CRUD actions for CheckList model.
 */
class CheckListController extends Controller
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
     * Lists all CheckList models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new CheckListSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CheckList model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $check = CheckList::find()->all();
        $check1 = CheckList::find()->sum('score');
        $check2 = CheckList::find()->sum('score2');

        return $this->render('view', [
            'check' => $check,
            'countcheck' => $check1 + $check2,
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new CheckList model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
       // \Yii::$app->cache->flush();
        $model = new CheckList();
        //$check = new Check();
        $c = Check::find()->all();
        $id = \Yii::$app->request->get('check_id');
        if ($this->request->isPost) {

            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['check/view', 'id' => $id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'checkmodel' => $check,

        ]);
    }

    /**
     * Updates an existing CheckList model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing CheckList model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the CheckList model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return CheckList the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CheckList::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


    // Редактирование таблицы чек-лист
    public function actionAjaxTable()
    {
        $post = \Yii::$app->request->post();
        $score = $post['score'];
        $id = $post['id'];
        $val = $post['val'];
        if ($val == '0'){
            $val = null;
        }
        $check = CheckList::find()->where(['id' => $id])->one();
        $check2 = CheckList::find()->sum('score');
        if (\Yii::$app->request->isAjax){

            if ($post['score'] == 'score1' && isset($post['score'])){
                $check->score = $val;
                $check->update();
            }else if ($post['score'] == 'score2' && isset($post['score'])){
                $check->score2 = $val;
                $check->update();
            } else if ($post['score'] == 'num1' && isset($post['score'])){
                $check->score3 = $val;
                $check->update();
            } else if ($post['score'] == 'num2' && isset($post['score'])){
                $check->score4 = $val;
                $check->update();
            }else if ($post['score'] == 'num3' && isset($post['score'])){
                $check->score5 = $val;
                $check->update();
            }else if ($post['score'] == 'num4' && isset($post['score'])){
                $check->score6 = $val;
                $check->update();
            }else if ($post['score'] == 'num5' && isset($post['score'])){
                $check->score7 = $val;
                $check->update();
            }else if ($post['score'] == 'num6' && isset($post['score'])){
                $check->score8 = $val;
                $check->update();
            }
        }
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return $post;
    }

// Смена номера в таблице

    public function actionAjaxChangePhone()
    {

        $post = \Yii::$app->request->post();
        $score = $post['score'];
        $id = $post['id'];
        $val = $post['val'];
        $check = CheckList::find()->where(['service_id' => $id])->one();
        if ($val == '0'){
            $val = null;
        }

    if ($post['score'] == 'num1' && isset($post['score'])){
        $check->phone1 = $val;
        $check->update();
    } else if ($post['score'] == 'num2' && isset($post['score'])){
        $check->phone2 = $val;
        $check->update();
    }else if ($post['score'] == 'num3' && isset($post['score'])){
        $check->phone3 = $val;
        $check->update();
    }

        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return $post;
    }


    //Отправить данные по пользователю
    public function actionSendUserData()
    {
        $post = \Yii::$app->request->post();
        $userScore = new \app\models\UserScore();
        $scoreUser =  \app\models\UserScore::find()->where(['user_id' => $post['userid']])->orderBy('id DESC')->one();
        if (\Yii::$app->request->isAjax){
            if (date('Y-m', $scoreUser->create_at) == date('Y-m')){
                $post =  2;
            }else{
                $userScore->user_id = $post['userid'];
                $userScore->score = $post['score_count'];
                $userScore->create_at = time();
                $userScore->check_id = $post['model'];
                $userScore->save();

                $userCount =  \app\models\UserScore::find()->where(['user_id' => $post['userid']])->orderBy('id DESC')->one();
                $user =  \common\models\User::find()->where(['id' => $post['userid']])->one();
            }
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return [
                'post' => $post,
                'user' => $user,
                'usercount' => $userCount,
                'html' => '<tr><td>'.date('d.m.Y', $userCount->create_at).'</td><td>'.$user->username.'</td><td>'
                        .$userCount->score.'</td></tr>'
            ];

        }
    }
}
