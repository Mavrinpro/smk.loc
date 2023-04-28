<?php

namespace frontend\controllers;

use common\models\User;
use app\models\Page;
use app\models\PageSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use kartik\mpdf\Pdf;

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
                            'allow' => true,
                            'actions' => ['view'],
                            'roles' => ['view_manager'],
                        ],
                        [
                            'allow' => true,
                            'actions' => ['view', 'create', 'pdf', 'index', 'create-doc'],
                            'roles' => ['superadmin', 'moderator'],
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


    public function actionPdf()
    {
        // get your HTML raw content without any layouts or scripts
        \Yii::$app->response->format = \yii\web\Response::FORMAT_RAW;
        $pdf = new Pdf([
            'mode' => Pdf::MODE_UTF8, // leaner size using standard fonts
            'destination' => Pdf::DEST_BROWSER,
            'content' => $this->renderPartial('view'),
            'options' => [
                // any mpdf options you wish to set
            ],
            'methods' => [
                'SetTitle' => 'Privacy Policy - Krajee.com',
                'SetSubject' => 'Generating PDF files via yii2-mpdf extension has never been easy',
                'SetHeader' => ['тест Privacy Policy||Generated On: ' . date("r")],
                'SetFooter' => ['|Page {PAGENO}|'],
                'SetAuthor' => 'Kartik Visweswaran',
                'SetCreator' => 'Kartik Visweswaran',
                'SetKeywords' => 'Krajee, Yii2, Export, PDF, MPDF, Output, Privacy, Policy, yii2-mpdf',
            ]
        ]);
        $this->layout = 'print';
        return $pdf->render();
    }

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

        //        header("Content-type: application/vnd.ms-word");
        //        header("Content-Disposition: attachment;Filename=".rand().".doc");
        //        header("Pragma: no-cache");
        //        header("Expires: 0");
        //        header("Content-type: application/vnd.ms-word");
        //        header("Content-Disposition: attachment;Filename=" . rand() . ".doc");
        //        header("Pragma: no-cache");
        //        header("Expires: 0");
        //        echo "<html><body>";
        //        echo "<h1>gggggggggggggggg</h1>";
        //        echo 5555555555;
        //        echo "</body></html>";
        //        exit;

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
                \Yii::$app->session->setFlash('success', 'Запись ' . $model->name . ' успешно создана.');
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
            \Yii::$app->session->setFlash('success', 'Запись <b>' . $model->name . '</b> успешно обновлена.');
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


    // Create doc
    public function actionCreateDoc($id)
    {
        $model = $this::findModel($id);
        //$word = iconv('UTF-8', 'WINDOWS-1251', $model->text);
        header('Content-Type: text; charset=utf-8');
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=" . date('d-m-Y H:i:s') . ".doc");
        // header("Pragma: no-cache");
        header("Expires: 0");
        echo '<html xmlns:v="urn:schemas-microsoft-com:vml"
        xmlns:o="urn:schemas-microsoft-com:office:office" 
        xmlns:w="urn:schemas-microsoft-com:office:word" 
        xmlns="http://www.w3.org/TR/REC-html40">
         <head>
         <style> 
        <!-- 
         /* Font Definitions */ 
        @font-face 
            {font-family:Verdana; 
            panose-1:2 11 6 4 3 5 4 4 2 4; 
            mso-font-charset:0; 
            mso-generic-font-family:swiss; 
            mso-font-pitch:variable; 
            mso-font-signature:536871559 0 0 0 415 0;} 
         /* Style Definitions */ 
         table {
    border-collapse: collapse;
    text-align: left;
}
         td {
    border: 1px solid #9E9E9E;
}
        body 
            {mso-style-parent:""; 
            margin:0in; 
            margin-bottom:.0001pt; 
            mso-pagination:widow-orphan; 
            font-size:12pt; 
                mso-bidi-font-size:8.0pt; 
            font-family:"Arial"; 
            padding: 40pt;
            text-align: center;
            mso-fareast-font-family:"Arial";} 
            h1{
            font-size: 22pt;
            }
        p.small 
            {mso-style-parent:""; 
            margin:0in; 
            margin-bottom:.0001pt; 
            mso-pagination:widow-orphan; 
            font-size:1.0pt; 
                mso-bidi-font-size:1.0pt; 
            font-family:"Arial"; 
            mso-fareast-font-family:"Arial";} 
        @page Section1 
            {size:8.5in 11.0in; 
            margin:1.0in 1.25in 1.0in 1.25in; 
            mso-header-margin:.5in; 
            mso-footer-margin:.5in; 
            mso-paper-source:0;} 
        div.Section1 
            {page:Section1;} 
        --> 
        </style> 
</head>
         <body>
       <meta http-equiv=Content-Type content="text/html; charset=utf-8"> ';
        // iconv('UTF-8', 'WINDOWS-1251', $model->text);
        echo '<div style="text-align:center;">'.$model->text.'</div>';
        //echo $model->text;
        echo "</body></html>";
        //exit;
    }
}
