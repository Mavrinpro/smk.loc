<?php

namespace frontend\controllers;
use common\models\User;
use app\models\Page;
use app\models\PageSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * PageController implements the CRUD actions for Page model.
 */
class PageController extends Controller
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
                                'allow'   => true,
                                'actions' => ['view'],
                                'roles'   => ['view_manager'],
                            ],
                            [
                                'allow'   => true,
                                'actions' => ['view', 'create', 'update'],
                                'roles'   => ['superadmin', 'moderator'],
                            ],
                        ],
                    ],

            ]
        );
    }

    /**
     * Lists all Page models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PageSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Page model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {

         //Создаем разрешение на доступ к странице управления пользователями.
//        $permissionManageUsers = \Yii::$app->authManager->createPermission('create_admin');
//
//        // Добавляем своё описание к разрешению, чтобы не забыть для чего мы его создавали.
//        $permissionManageUsers->description = 'Доступ к редактированию страниц.';
//
//        // Добавляем разрешение в систему через RBAC менеджер.
//        \Yii::$app->authManager->add($permissionManageUsers);
//
//        // Ищем роль модератора.
//        $roleModerator = \Yii::$app->authManager->getRole('superadmin');
//
//        // Добавляем (наследуем) разрешение для роли модератора.
//        \Yii::$app->authManager->addChild($roleModerator, $permissionManageUsers);



//        // Достаем пользователя Иванова из БД.
//        $ivanov = User::findOne(1);
//        // Достаем роль администратора из RBAC-менеджера.
//        $roleAdministrator = \Yii::$app->authManager->getRole('superadmin');
//        // Привязываем роль администратора к идентификатору Иванова.
//        \Yii::$app->authManager->assign($roleAdministrator, $ivanov->getId());
//
//        // Достаем пользователя Петрова из БД.
//        $petrov = User::findOne(2);
//        // Достаем роль модератора из RBAC-менеджера.
//        $roleModerator = \Yii::$app->authManager->getRole('admin');
//        // Привязываем роль модератора к идентификатору Петрова.
//        \Yii::$app->authManager->assign($roleModerator, $petrov->getId());
//
//        // Достаем пользователя Сидорова из БД.
//        $sidorov = User::findOne(3);
//        // Достаем роль модератора из RBAC-менеджера.
//        $roleUser = \Yii::$app->authManager->getRole('user');
//        // Привязываем роль пользователя к идентификатору Сидорова.
        //\Yii::$app->authManager->assign($roleUser, $sidorov->getId());
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Page model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Page();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                \Yii::$app->session->setFlash('success', 'Запись <b>'.$model->name.'</b> успешно создана.');
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
     * Updates an existing Page model.
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
     * Deletes an existing Page model.
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
     * Finds the Page model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Page the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Page::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
