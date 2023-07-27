<?php

namespace frontend\controllers;

use app\models\Protocol;
use app\models\ProtocolSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\FileHelper;

/**
 * ProtocolController implements the CRUD actions for Protocol model.
 */
class ProtocolController extends Controller
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
                            'actions' => ['view', 'test', ' index'],
                            'roles' => ['view_manager'],
                        ],
                        [
                            'allow' => true,
                            'actions' => ['index', 'upload' , 'delete', 'change-directory', 'change-department'],
                            'roles' => ['create_admin', 'moderator', 'admin'],
                        ],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Protocol models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ProtocolSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Protocol model.
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
     * Creates a new Protocol model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Protocol();

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
     * Updates an existing Protocol model.
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
     * Deletes an existing Protocol model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $files = $this->findModel($id);
        $url = 'files/protocol/'.$files->department_id.'/'.$files->name;
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
     * Finds the Protocol model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Protocol the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Protocol::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    // Загрузка файлов Dropzone
    public function actionUpload()
    {
        $department_id = \Yii::$app->request->get('department_id');
        $fileName = 'file';
        $uploadPath = './files/protocol/'.$department_id;
        if (! FileHelper::createDirectory($uploadPath)) {
            throw new \yii\base\ErrorException('Cannot create folder: ' . $uploadPath);
        }
        $files = new Protocol();
        //$user = \common\models\User::find()->where(['id' => Yii::$app->user->getId()])->one();
        if (isset($_FILES[$fileName])) {
            FileHelper::localize ( $uploadPath.'/'.$files->name, $language = null, $sourceLanguage = null );
            $file = \yii\web\UploadedFile::getInstanceByName($fileName);

            //Print file data
            //print_r($file);

            if ($file->saveAs($uploadPath . '/' . $file->name)) {

                $files->name = $file->name;
                $files->department_id = $department_id; // id отдела
                $files->create_at = time();
                $files->user_id_create = \Yii::$app->user->getId();
                $files->active = 1;
                $files->save();
                echo \yii\helpers\Json::encode($file->name);
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
        $bot_token = \app\models\Settings::find()->one();

        if ($this->request->isPost){
            $post = \Yii::$app->request->post('Protocol');
            $user = \common\models\User::find()->where(['id' => $post['user_id_update'] ])->one();
            //$telegram = \common\models\User::find()->where(['id' => $user->id])->one();
            $source_file = 'files/protocol/'.$model->department_id.'/'.$model->name;
            $destination_path = 'files/protocol/'.$user->department_id.'/'.$model->name;
            $uploadPath = './files/protocol/'.$user->department_id;

            if (!empty($post['user_id_update'])){
                FileHelper::createDirectory($uploadPath);
                rename($source_file, $destination_path );
                $model->user_id_update = $post['user_id_update'];
                $model->department_id = $user->department_id;
                $model->update();
                $us->sendTelegramnotification($bot_token->bot_token, 'Вам передан файл', $user->telegram_id, date
                ('H:i:s | d.m.Y'), '123', '+79099999999', 'Alex'  );

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
