<?php

namespace frontend\controllers;

use app\models\CheckList;
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
        $checkCount = CheckList::find()->sum('score');

        return $this->render('view', [
            'check' => $check,
            'countcheck' => $checkCount,
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
        $model = new CheckList();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
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
        if (!isset($val)){
            $val = 0;
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
            }
        }
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return $post;
    }


    // Подсчет количества баллов
    public function actionAjaxCount()
    {
        $post = \Yii::$app->request->post();

        $check2 = CheckList::find()->sum('score');
        if (\Yii::$app->request->isAjax){
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return $check2;
        }

    }
}
