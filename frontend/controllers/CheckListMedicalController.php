<?php

namespace frontend\controllers;

use app\models\CheckListMedical;
use app\models\CheckListMedicalSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CheckListMedicalController implements the CRUD actions for CheckListMedical model.
 */
class CheckListMedicalController extends Controller
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
     * Lists all CheckListMedical models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new CheckListMedicalSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CheckListMedical model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new CheckListMedical model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new CheckListMedical();
//
//        if ($this->request->isPost) {
//            if ($model->load($this->request->post()) && $model->save()) {
//                return $this->redirect(['view', 'id' => $model->id]);
//            }
//        } else {
//            $model->loadDefaultValues();
//        }

        //==============================
        // Создание множественных записей одной модели
        $count = count(\Yii::$app->request->post('ChecklistMedical', []));
        $products  = [new CheckListMedical()];

        for($i = 1; $i < $count; $i++) {
            $products[] = new CheckListMedical();
        }

        if (CheckListMedical::loadMultiple($products, \Yii::$app->request->post()) && CheckListMedical::validateMultiple($products)) {

            foreach ($products as $product) {

                if (!empty($product->name)){
                    $product->save(false);
                }


            }
            $post = \Yii::$app->request->post('ChecklistMedical');

            return $this->redirect(['check/view', 'id' => $post[0]['check_id'], 'department_id' => $post[0]['department_id']]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing CheckListMedical model.
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
     * Deletes an existing CheckListMedical model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $post = \Yii::$app->request->post();
        //var_dump($post); die;
        $this->findModel($id)->delete();
        \Yii::$app->session->setFlash('success', 'Критерий успешно удален');
        return $this->redirect(['check/view', 'id' => $post['check_id'], 'department_id' => $post['department_id']]);
    }

    /**
     * Finds the CheckListMedical model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return CheckListMedical the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CheckListMedical::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionCheckboxRight()
    {
//        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
//        $post = \Yii::$app->request->post();
//        return $post;

        $post = \Yii::$app->request->post();
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $result = \app\models\ChecklistMedical::find()->where(['id' => $post['id']])->one();


        $num = null;

        if ($post['num'] == 1){
            $num = 1;
        }
        $result->active = $num;
        $result->update();
        $count = \app\models\ChecklistMedical::find()->where(['check_id' => $post['test_id']])->count();
        $count2 = \app\models\ChecklistMedical::find()->where(['check_id' => $post['test_id'], 'active' => 1])->count();
        $new_width =  ($count2 * 100) / $count;
        if  ($new_width > 0){
            return round($new_width);
        }else{
            return 0;
        }

    }

    public function actionCheckboxLeft()
    {
//        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
//        $post = \Yii::$app->request->post();
//        return $post;

        $post = \Yii::$app->request->post();
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $result = \app\models\ChecklistMedical::find()->where(['id' => $post['id']])->one();
        $num = null;

        if ($post['num'] == 1){
            $num = 0;
        }
        $result->active = $num;
        $result->update();
        $count = \app\models\ChecklistMedical::find()->where(['check_id' => $post['test_id']])->count();
        $count2 = \app\models\ChecklistMedical::find()->where(['check_id' => $post['test_id'], 'active' => 1])->count();
        $new_width =  ($count2 * 100) / $count;
        if  ($new_width > 0){
            return round($new_width);
        }else{
            return 0;
        }
    }
}
