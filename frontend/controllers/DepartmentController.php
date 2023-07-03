<?php

namespace frontend\controllers;

use app\models\Department;
use app\models\Page;
use app\models\Branch;
use app\models\Test;
use app\models\UserSearch;
use frontend\models\SignupForm;
use common\models\User;
use frontend\models\DepartmentSearch;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DepartmentController implements the CRUD actions for Department model.
 */
class DepartmentController extends Controller
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
                            'actions' => ['view', 'create', 'pdf', 'index', 'create-doc', 'test', 'create-user', 'delete-user', 'result-test', 'testview', 'success-test', 'test-failed', 'delete-result-test'],
                            'roles' => ['create_admin', 'moderator'],
                        ],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Department models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new DepartmentSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Department model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $depart = Department::find()->where(['id' => $id])->one();
        $page = Page::find()->where(['department_id' => $id])->all();
        $branch = Branch::find()->where(['id' => $depart->branch_id])->one();

        $user = User::find()->where(['department_id' => $depart->id])->all();
        $userForm = new User();

        return $this->render('view', [
            'user' => $user,
            'branch' => $branch,
            'page' => $page,
            'model' => $this->findModel($id),
            'userform' => $userForm
        ]);
    }

    /**
     * Creates a new Department model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Department();

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
     * Updates an existing Department model.
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
     * Deletes an existing Department model.
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
     * Finds the Department model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Department the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Department::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    // Вывод тестов
    public function actionTest()
    {
        $id = \Yii::$app->request->get('test_id');
        $test = Test::find()->where(['department_id' => $id])->all();
        foreach ($test as $item) {
            $question = \app\models\Question::find()->where(['test_id' => $item->id])->all();
        }

        return $this->render('test',[
            'test' => $test,
            //'question' => $question,
        ]);
    }

    // Добавить пользователя на странице отдела
    public function actionCreateUser()
    {
        $model = new SignupForm();

        if ($model->load(\Yii::$app->request->post()) && $model->signup()) {
            $roleUser = \Yii::$app->authManager->getRole('user');
            $ertre = new User();
            $user = User::find()->orderBy('id DESC')->one();
            \Yii::$app->authManager->assign($roleUser, $user->getId());
            \Yii::$app->session->setFlash('success', 'Сотрудник добавлен в отдел!');
            return $this->redirect(['view', 'id' => \Yii::$app->request->post('SignupForm')['department_id']]);
        }else{
            \Yii::$app->session->setFlash('error', 'Вы что-то ввели неверно. Попробуйте еще раз.');
            return $this->redirect(['view', 'id' => \Yii::$app->request->post('SignupForm')['department_id']]);
        }


    }

    public function actionDeleteUser()
    {
        $user = new SignupForm();
        $user->deleteUser(\Yii::$app->request->get('id'));
        return $this->redirect(['view', 'id' => \Yii::$app->request->get('department_id')]);
    }

// Результаты тестов (все юзеры по отделам)
    public function actionResultTest($department_id)
    {
        $user = \common\models\User::find()->where(['department_id' => $department_id])->all();
        $usrId = [];
        foreach ($user as $item) {
            $usrId[]= $item->id;
        }
        $testEnd = \app\models\EndTest::find()->where(['in', 'user_id', $usrId])->all();
        return $this->render('result-test',[
            'test' => $testEnd
        ]);
    }

    // Результат теста конкретного юзера 
    public function actionTestview($id, $user_id, $res)
    {

        $user = \common\models\User::find()->where(['id' => $user_id])->one();
        
        $test = \app\models\EndTest::find()->where(['id' => $res])->one();
        $testEnd = \app\models\ResultTest::find()->where(['test_id' => $id, 'user_id' => $user_id])->andWhere(['>', 'create_at', strtotime(date('Y-m-d', $test->date_end_test))])->all();
        return $this->render('testview',[
            'id' => 5,
            'tester' => $testEnd,
            'test' => $test,
            'user' => $user
        ]);
    }

    public function actionSuccessTest($id, $user_id, $res)
    {
        $noty = new \app\models\Notyfication();
        $test = \app\models\Test::find()->where(['id' => $id])->one();
        $noty->user_id = $user_id;
        $noty->user_create_id = \Yii::$app->getUser()->id;
        $noty->text = 'Тест "'.$test->name.'" пройден';
        $noty->create_at = time();
        $noty->read = 0;
        //var_dump($noty); die();
        $noty->save();
        //var_dump($noty);
        $user = new User();
        $bot_token = \app\models\Settings::find()->one();
        $telegram = User::find()->where(['id' => $user_id])->one();
        $text = "🏆 Тест пройден 🏆";
        $user->sendTelegramnotification($bot_token->bot_token, $text, $telegram->telegram_id, date('H:i:s | d.m.Y'), '123', '+79099999999', 'Alex'  );
        \Yii::$app->session->setFlash('success', 'Уведомление отправлено.');
        return $this->redirect(['department/testview', 'id' => $id, 'user_id' => $user_id, 'res' => $res]);
    }

    public function actionTestFailed($id, $user_id, $res)
    {
        $user = new User();
        $bot_token = \app\models\Settings::find()->one();
        $telegram = User::find()->where(['id' => $user_id])->one();
        $text = "⛔ Тест Провален ⛔";
        $user->sendTelegramnotification($bot_token->bot_token, $text, $telegram->telegram_id, date('H:i:s | d.m.Y'), '123', '+79099999999', 'Alex'  );
        \Yii::$app->session->setFlash('success', 'Уведомление отправлено.');
        return $this->redirect(['department/testview', 'id' => $id, 'user_id' => $user_id, 'res' => $res]);
    }

    // Удаление результатов теста вместе с ответами (таблица result_test)

    public function actionDeleteResultTest($id, $department_id)
    {
        $get = \Yii::$app->request->get();

        $endTest = \app\models\EndTest::find()->where(['id' => $id])->one();

        $resultTest = \app\models\ResultTest::find()->where(['test_id' => $endTest->test_id, 'user_id' =>
            $endTest->user_id])->andWhere
        (['>=', 'create_at', date('Y-m-d H:i:s', strtotime($endTest->date_end_test))])->all();
        if ($this->request->isPost){
            $endTest->delete();
            foreach ($resultTest as $result) {
                $result->delete();
            }
            \Yii::$app->session->setFlash('success', 'Результат тестирования удален.');
            return $this->redirect(['department/result-test', 'department_id' => $department_id]);

        }
        return $this->redirect('/');

    }
    
}
