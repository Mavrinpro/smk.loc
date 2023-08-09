<?php

namespace frontend\controllers;

use app\models\Passport;
use app\models\PassportSearch;
use yii\helpers\FileHelper;
use yii\helpers\Html;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * PassportController implements the CRUD actions for Passport model.
 */
class PassportController extends Controller
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
                'access' => [
                    'class' => AccessControl::class,

                    'rules' => [
                        [
                            'allow' => true,
                            'actions' => ['view', 'index', 'upload'],
                            'roles' => ['view_manager'],
                        ],
                        [
                            'allow' => true,
                            'actions' => ['create', 'index', 'view', 'delete-checklist' , 'userscore', 'scoreview', 'upload', 'delete', 'change-department'],
                            'roles' => ['create_admin', 'admin'],
                        ],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Passport models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PassportSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Passport model.
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
     * Creates a new Passport model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Passport();

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
     * Updates an existing Passport model.
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
     * Deletes an existing Passport model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $files = $this->findModel($id);
        $url = 'files/passport/'.$files->department_id.'/'.$files->name;
        if (file_exists($url)) {
            unlink($url);
            \Yii::$app->session->setFlash('success', 'Файл успешно удален');
            $files->delete();
            return $this->redirect(['index', 'department_id' => $files->department_id]);
        }else{
            \Yii::$app->session->setFlash('error', 'Файл не найден');
        }

        return $this->redirect(['index', 'department_id' => $files->department_id]);
    }

    /**
     * Finds the Passport model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Passport the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Passport::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    // Загрузка файлов Dropzone
    public function actionUpload()
    {
        $department_id = \Yii::$app->request->get('department_id');
        $fileName = 'file';
        //$uploadPath = './files/protocol/';
        $uploadPath = './files/passport/'.$department_id;
        if (! FileHelper::createDirectory($uploadPath)) {
            throw new \yii\base\ErrorException('Cannot create folder: ' . $uploadPath);
        }
        $files = new Passport();
        //$user = \common\models\User::find()->where(['id' => Yii::$app->user->getId()])->one();
        $url = 'files/passport/'.$files->department_id.'/'.$files->name;
        if (isset($_FILES[$fileName])) {



            $file = \yii\web\UploadedFile::getInstanceByName( $fileName );
            $url  = 'files/passport/' . $files->department_id . '/' . $file->name;
            //Print file data
            //print_r($file);

            if ( $file->saveAs( $uploadPath . '/' . $file->name ) ) {
                $f = Passport::find()->where(['name' => $file->name])->one();
                if (sizeof((array)$f) > 0){
                    $f->delete();
                }

                $files->name           = $file->name;
                $files->department_id  = $department_id; // id отдела
                $files->create_at      = time();
                $files->user_id_create = \Yii::$app->user->getId();
                $files->active         = 1;
                $files->save();
                echo \yii\helpers\Json::encode( $file->name );


            }

        }

        return false;
    }

    public function actionChangeDepartment($id)
    {
        $model = $this->findModel($id);
        //        //var_dump(\Yii::$app->request->get('id')); die;
        //        $source_file = 'files/protocol/5/'.$model->name;
        //        $destination_path = 'files/protocol/14/'.$model->name;
        //        rename($source_file, $destination_path );
        //        $model->department_id = 14;
        //        $model->update();

        $us = new \common\models\User();
        $noty = new \app\models\Notyfication();
        $bot_token = \app\models\Settings::find()->one();

        if ($this->request->isPost){
            $post = \Yii::$app->request->post('Passport');
            //var_dump($post); die;
            $user = \common\models\User::find()->where(['id' => $post['user_id_update'] ])->one();
            //$telegram = \common\models\User::find()->where(['id' => $user->id])->one();
            $source_file = 'files/passport/'.$model->department_id.'/'.$model->name;
            $destination_path = 'files/passport/'.$user->department_id.'/'.$model->name;
            $uploadPath = './files/passport/'.$user->department_id;

            if (!empty($post['user_id_update'])){
                FileHelper::createDirectory($uploadPath);
                rename($source_file, $destination_path );
                $model->send_user_id = $post['user_id_update'];
                $model->department_id = $user->department_id;
                $model->update();
                if(!empty($user->telegram_id)){
                    $us->sendTelegramnotification($bot_token->bot_token, 'Вам передан файл', $user->telegram_id, date
                    ('H:i:s | d.m.Y'), '123', '+79099999999', 'Alex'  );
                }



                $test = \app\models\Test::find()->where(['id' => $id])->one();

                $noty->user_id = $user->id;
                $noty->user_create_id = \Yii::$app->getUser()->id;
                $noty->text = 'Вам передан файл: ';
                $noty->text .= Html::a($model->name, ['view', 'id' => $model->id]);
                $noty->create_at = time();
                $noty->read = 0;
                //var_dump($noty); die();
                $noty->save();

                \Yii::$app->session->setFlash('success', 'Файл успешно передан сотруднику: '. $user->fio.' - ' .
                    $user->department_id);
            }else{
                \Yii::$app->session->setFlash('error', 'Сотрудник не выбран');
            }

            return $this->redirect(['change-department',
                'id' => $id
            ]);
        }

        return $this->render('change-department', [
            //'department_id' => $model->department_id,
            'model' => $model
        ]);
    }
}
