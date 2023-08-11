<?php

namespace frontend\controllers;

use app\models\Sop;
use app\models\SopSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\FileHelper;

/**
 * SopController implements the CRUD actions for Sop model.
 */
class SopController extends Controller
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
                            'actions' => ['create', 'index', 'view', 'delete-checklist' , 'userscore', 'scoreview', 'upload', 'delete'],
                            'roles' => ['create_admin', 'admin'],
                        ],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Sop models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new SopSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Sop model.
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
     * Creates a new Sop model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Sop();

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
     * Updates an existing Sop model.
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
     * Deletes an existing Sop model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $files = $this->findModel($id);
        $url = 'files/sop/'.$files->department_id.'/'.$files->name;
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
     * Finds the Sop model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Sop the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Sop::findOne(['id' => $id])) !== null) {
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
        $uploadPath = './files/sop/'.$department_id;
        if (! FileHelper::createDirectory($uploadPath)) {
            throw new \yii\base\ErrorException('Cannot create folder: ' . $uploadPath);
        }
        $files = new Sop();
        //$user = \common\models\User::find()->where(['id' => Yii::$app->user->getId()])->one();
        $url = 'files/sop/'.$files->department_id.'/'.$files->name;
        if (isset($_FILES[$fileName])) {



            $file = \yii\web\UploadedFile::getInstanceByName( $fileName );
            $url  = 'files/sop/' . $files->department_id . '/' . $file->name;
            //Print file data
            //print_r($file);

            if ( $file->saveAs( $uploadPath . '/' . $file->name ) ) {
                $f = Sop::find()->where(['name' => $file->name])->one();
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
}
