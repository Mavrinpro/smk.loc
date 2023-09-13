<?php

namespace frontend\controllers;

use app\models\BusinessTrip;
use app\models\BusinessTripSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BusinessTripController implements the CRUD actions for BusinessTrip model.
 */
class BusinessTripController extends Controller
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
        $searchModel = new BusinessTripSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single BusinessTrip model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $noty = new \app\models\Notyfication();
        $user = \common\models\User::find()->where(['status' =>10])->all();
        return $this->render('view', [
            'model' => $this->findModel($id),
            'user' => $user,
            'noty' => $noty
        ]);
    }

    /**
     * Creates a new BusinessTrip model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new BusinessTrip();
        $post = \Yii::$app->request->post();
        if ($this->request->isPost) {
            $model->start_trip = strtotime($post['BusinessTrip']['start_trip'] .' 00:00:00');
            $model->end_trip = strtotime($post['BusinessTrip']['end_trip'] .' 00:00:00');
            $model->date_of_departure = strtotime($post['BusinessTrip']['date_of_departure'] .' 00:00:00');
            $model->return_date = strtotime($post['BusinessTrip']['return_date'] .' 00:00:00');
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
     * Updates an existing BusinessTrip model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $post = \Yii::$app->request->post();
        $d = strtotime('2011-09-12 00:00:00');
        $model->date_of_departure = strtotime($post['BusinessTrip']['date_of_departure'] .' 00:00:00');
        $model->return_date = strtotime($post['BusinessTrip']['return_date'] .' 00:00:00');
        //var_dump($post); die;
        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing BusinessTrip model.
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
     * Finds the BusinessTrip model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return BusinessTrip the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BusinessTrip::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


    // отправка пользователям о командировке врача
    public function actionSendTrip()
    {


        $post = \Yii::$app->request->post('Notyfication');
        //$post['user_id'] - массив юзеров, которым нужно отправитиь уведомление
        //$post['model_id'] - ID модели business-trip
        //$post['doctor_id'] - ID доктора



        $user = \common\models\User::find()->where(['in', 'id', $post['user_id']])->all();
        if ($this->request->isPost) {
            //var_dump($post); die();
            foreach ($user as $it) {
                $doctor = \app\models\Doctor::find()->where(['id' => $post['doctor_id']])->one();
                $noty = new \app\models\Notyfication();
                $noty->user_id = $it->id;
                $noty->user_create_id = \Yii::$app->getUser()->id;
                $noty->text = 'Информация о командировке врача '. '<a href="/business-trip/view/?id='.$post['model_id'].'">"'.$doctor->fio.'"</a>';
                $noty->create_at = time();
                $noty->read = 0;
                //var_dump($noty); die();
                $noty->save();
            }
            if (sizeof($user) > 0){
                \Yii::$app->session->setFlash('success', 'Уведомление о командировке отправлено: '. $doctor->fio);
            }else{
                \Yii::$app->session->setFlash('error', 'Вы не выбрали сотрудников');
            }

            return $this->redirect(['view', 'id' => $post['model_id']]);
        }
        //var_dump($post);
    }
}
