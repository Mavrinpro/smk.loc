<?php

namespace frontend\controllers;
use frontend\models\SignupForm;
use common\models\User;
use app\models\UserSearch;
use yii\filters\AccessControl;
use yii\helpers\FileHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
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
                            'actions' => ['view', 'test', 'update', 'upload'],
                            'roles' => ['view_manager'],
                        ],
                        [
                            'allow' => true,
                            'actions' => ['index', 'view' , 'delete', 'update', 'upload'],
                            'roles' => ['create_admin'],
                        ],
                        [
                            'allow' => true,
                            'actions' => ['view', 'update', 'upload'],
                            'roles' => ['admin'],
                        ],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all User models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param int $id
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
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        //\Yii::$app->db->schema->refresh();
        $model = new SignupForm();
        if ($model->load(\Yii::$app->request->post()) && $model->signup()) {
            \Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
            return $this->goHome();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id
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
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $user = $this->findModel($id);
        $user->status = 0;
        $user->update();

        return $this->redirect(['index', 'id' => $user->id]);
    }

    public function actionDeleteUser($id)
    {
        $user = $this->findModel($id);
        $user->status = 0;
        $user->update();

        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionLists($id){

        $data = '<option>Выбрать...</option>';

        $items = app\models\Department::find()->select(['name', 'id'])->distinct()->all();
            foreach($items as $item){
                $data .= "<option value='".$item->id."'>".$item->name."</option>";
            }

        return $data;
    }

    // Сделать админом через ajax
    public function actionSetAdmin()
    {
        $manager = \Yii::$app->authManager;
       $post = \Yii::$app->request->post();


       if ($post['check'] == 1){

           $item = $manager->getRole('user');
           $item = $item ? : $manager->getPermission('user');
           $manager->revoke($item, $post['id']);

           $authorRole = $manager->getRole('admin');
           $manager->assign($authorRole, $post['id']);

       }else{
           $item = $manager->getRole('admin');
           $item = $item ? : $manager->getPermission('admin');
           $manager->revoke($item, $post['id']);

           $authorRole = $manager->getRole('user');
           $manager->assign($authorRole, $post['id']);

       }
       \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
       return $post['id'];

    }

    // Загрузка аватара
    public function actionUpload()
    {
        $user_id = \Yii::$app->request->get('user_id');
        $fileName = 'file';
        $uploadPath = './files/avatar/';
        if (! FileHelper::createDirectory($uploadPath)) {
            throw new \yii\base\ErrorException('Cannot create folder: ' . $uploadPath);
        }
        //$files = new Protocol();
        //$user = \common\models\User::find()->where(['id' => Yii::$app->user->getId()])->one();
        if (isset($_FILES[$fileName])) {
            FileHelper::localize ( $uploadPath.'/'.$files->name, $language = null, $sourceLanguage = null );
            $file = \yii\web\UploadedFile::getInstanceByName($fileName);

            //Print file data
            //print_r($file);

            if ($file->saveAs($uploadPath . '/' . $file->name)) {

//                $files->name = $file->name;
//                $files->department_id = $department_id; // id отдела
//                $files->create_at = time();
//                $files->user_id_create = \Yii::$app->user->getId();
//                $files->active = 1;
//                $files->save();
                echo \yii\helpers\Json::encode($file->name);
            }
        }

        return false;
    }
}
