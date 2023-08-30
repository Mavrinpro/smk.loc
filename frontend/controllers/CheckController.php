<?php

namespace frontend\controllers;

use app\models\Check;
use app\models\CheckSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

/**
 * CheckController implements the CRUD actions for Check model.
 */
class CheckController extends Controller
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
                            'actions' => ['view', 'index', 'userscore', 'scoreview', 'delete-comment-check'],
                            'roles' => ['view_manager'],
                        ],
                        [
                            'allow' => true,
                            'actions' => ['create', 'index', 'view', 'delete-checklist' , 'userscore', 'scoreview', 'delete-user-score', 'delete-comment-check'],
                            'roles' => ['create_admin', 'admin'],
                        ],
                    ],
                ],

            ]
        );
    }

    /**
     * Lists all Check models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new CheckSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Check model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $commentCheck = new \app\models\CommentCheck();
        $post = \Yii::$app->request->post();
        $dep_id =  \Yii::$app->request->get();

        $comment = \app\models\CommentCheck::find()->where(['active' => true, 'check_id' => $dep_id['id']])->all();

        if ($this->request->isPost) {
            //var_dump($post); die;
            if ($commentCheck->load($this->request->post()) && $commentCheck->save()) {
                return $this->redirect(['view', 'id' => $post['CommentCheck']['check_id'], 'department_id' =>  $post['CommentCheck']['department_id']]);
            }
        } else {
            $commentCheck->loadDefaultValues();
        }



        $scoreall =  \app\models\UserScore::find()->where(['check_id' => $id])->orderBy('id ASC')->all();

        $check_listMedical = \app\models\ChecklistMedical::find()->where(['check_id' => $id])->all();

        //var_dump($post); die;
        $m = $this->findModel($id);
        $check = \app\models\CheckList::find()->where(['service_id' => $id])->all();

        $getId = \Yii::$app->request->get('department_id');
        if (empty($post['department_id'])){
            $post['department_id'] = $getId;
        }
        // Сотрудники в select
        $user = \common\models\User::find()->where(['department_id' => $getId, 'status' => 10])->all();
        
        
        $userId = \Yii::$app->getUser()->id;
        
        $check3 = \app\models\CheckList::find()->where(['service_id' => $id, 'user_id' => $userId ])->all();
        
        
        $check1 = \app\models\CheckList::find()->where(['service_id' => $id, 'user_id' =>$userId ])->sum('score');
        $check2 = \app\models\CheckList::find()->where(['service_id' => $id, 'user_id' =>$userId ])->sum('score2');
        $num1 = \app\models\CheckList::find()->where(['service_id' => $id, 'user_id' =>$userId ])->sum('score3');
        $num2 = \app\models\CheckList::find()->where(['service_id' => $id, 'user_id' =>$userId ])->sum('score4');
        $num3 = \app\models\CheckList::find()->where(['service_id' => $id, 'user_id' =>$userId ])->sum('score5');
        $num4 = \app\models\CheckList::find()->where(['service_id' => $id, 'user_id' =>$userId ])->sum('score6');
        $num5 = \app\models\CheckList::find()->where(['service_id' => $id, 'user_id' =>$userId ])->sum('score7');
        $num6 = \app\models\CheckList::find()->where(['service_id' => $id, 'user_id' =>$userId ])->sum('score8');


        $users = \common\models\User::findOne(['id' => $userId]);
        $userRole = current(ArrayHelper::getColumn(\Yii::$app->authManager->getRolesByUser(\Yii::$app->getUser()->id),
            'name'));
        $scoreall2 =  \app\models\UserScore::find()->where(['check_id' => $id, 'user_id' => $userId])->orderBy('id ASC')
            ->all();
        if ($userRole == 'user'){
            return $this->redirect('userscore');
        }

        $count = \app\models\ChecklistMedical::find()->where(['check_id' => $id])->count();
        $count2 = \app\models\ChecklistMedical::find()->where(['check_id' => $id, 'active' => 1])->count();
        if  ($count > 0){
        $new_width =  ($count2 * 100) / $count;

        }else{
            $new_width = 0;
        }
        return $this->render('view', [
            'user' => $user,
            'model' => $this->findModel($id),
            'check' => $check,
            'countcheck' => [
                'check' =>  $check2 + $check1,
                'col1' => $num1 + $num4,
                'col2' => $num2 + $num5,
                'col3' => $num3 + $num6,
                'count' => $check2 + $check1 +$num1+$num4+$num2+$num5+$num3+$num6
            ],
            'scoreall' => $scoreall,
            'checklistMedical' => $check_listMedical,
            'countResult' => round($new_width),
            'commentCheck' => $commentCheck,
            'comment' => $comment
        ]);
    }

    /**
     * Creates a new Check model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Check();

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
     * Updates an existing Check model.
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
     * Deletes an existing Check model.
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
     * Finds the Check model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Check the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Check::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    // Подсчет количества баллов
    public function actionAjaxCount()
    {
        $post = \Yii::$app->request->post();
        $id = $post['modelid'];
        $check1 = \app\models\CheckList::find()->where(['service_id' => $id])->sum('score');
        $check2 = \app\models\CheckList::find()->where(['service_id' => $id])->sum('score2');
        $num1 = \app\models\CheckList::find()->where(['service_id' => $id])->sum('score3');
        $num2 = \app\models\CheckList::find()->where(['service_id' => $id])->sum('score4');
        $num3 = \app\models\CheckList::find()->where(['service_id' => $id])->sum('score5');
        $num4 = \app\models\CheckList::find()->where(['service_id' => $id])->sum('score6');
        $num5 = \app\models\CheckList::find()->where(['service_id' => $id])->sum('score7');
        $num6 = \app\models\CheckList::find()->where(['service_id' => $id])->sum('score8');

        if (\Yii::$app->request->isAjax) {
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return [
                'check1' =>  $check2,
                'check2' => $check1,
                'col1' => $num1 + $num4,
                'col2' => $num2 + $num5,
                'col3' => $num3 + $num6,
                'count' => $check2 + $check1 +$num1+$num4+$num2+$num5+$num3+$num6

            ];
        }
    }

    // Очистить все оценки
    public function actionClearScore()
    {
        $id = \Yii::$app->request->get('check_id');
        $checklist = \app\models\CheckList::find()->where(['service_id' => $id])->all();
        if ($this->request->isPost){
            foreach ($checklist as $list) {
                $list->score = null;
                $list->score2 = null;
                $list->score3 = null;
                $list->score4 = null;
                $list->score5 = null;
                $list->score6 = null;
                $list->score7 = null;
                $list->score8 = null;
                $list->update();
                \Yii::$app->session->setFlash('success', 'Таблица очищена!');
            }
            $this->redirect(['check/view', 'id' => $id]);
        }

    }

    // Удаление из таблицы user_score
    public function actionDeleteUserScore($id)
    {
        $getId = \Yii::$app->request->get('department_id');
        $userScore = \app\models\UserScore::find()->where(['id' => $id])->one();
        if ($this->request->isPost){
            $userScore->delete();
            \Yii::$app->session->setFlash('success', 'Запись удалена!');
            $this->redirect(['check/view', 'id' => \Yii::$app->request->get('check_id')]);
        }
    }

    public function actionDeleteChecklist()
    {
        $post = \Yii::$app->request->post();
        $checklist = \app\models\CheckList::find()->where(['id' => $post['id']])->one();
        if ($this->request->isPost) {
            $checklist->delete();
            \Yii::$app->session->setFlash('success', 'Критерий удален!');
            $this->redirect(['check/view', 'id' => $post['check'], 'department_id' => $post['department_id']]);
        }
    }

    public function actionUserscore()
    {


        // view userscore
        //$post = \Yii::$app->request->post();
        //$dep_id = \Yii::$app->request->get();
        //$scoreall = \app\models\UserScore::find()->where(['check_id' => 5])->orderBy('id ASC')->all();


        //var_dump($post); die;
        //$m = $this->findModel($id);
       // $check = \app\models\CheckList::find()->where(['service_id' => $id])->all();

        //$getId = \Yii::$app->request->get('department_id');
        //if (empty($post['department_id'])) {
           // $post['department_id'] = $getId;
       // }
        // Сотрудники в select
        //$user = \common\models\User::find()->where(['department_id' => $getId, 'status' => 10])->all();


//        $userId = \Yii::$app->getUser()->id;
//
//        $check3 = \app\models\CheckList::find()->where(['service_id' => 5, 'user_id' => $userId])->all();
//
//
//        $check1 = \app\models\CheckList::find()->where(['service_id' => 5, 'user_id' => $userId])->sum('score');
//        $check2 = \app\models\CheckList::find()->where(['service_id' => 5, 'user_id' => $userId])->sum('score2');
//        $num1 = \app\models\CheckList::find()->where(['service_id' => 5, 'user_id' => $userId])->sum('score3');
//        $num2 = \app\models\CheckList::find()->where(['service_id' => 5, 'user_id' => $userId])->sum('score4');
//        $num3 = \app\models\CheckList::find()->where(['service_id' => 5, 'user_id' => $userId])->sum('score5');
//        $num4 = \app\models\CheckList::find()->where(['service_id' => 5, 'user_id' => $userId])->sum('score6');
//        $num5 = \app\models\CheckList::find()->where(['service_id' => 5, 'user_id' => $userId])->sum('score7');
//        $num6 = \app\models\CheckList::find()->where(['service_id' => 5, 'user_id' => $userId])->sum('score8');
//
//
//        $users = \common\models\User::findOne(['id' => $userId]);
//        $userRole = current(ArrayHelper::getColumn(\Yii::$app->authManager->getRolesByUser(\Yii::$app->getUser()->id),
//            'name'));
//        $scoreall2 = \app\models\UserScore::find()->where(['check_id' => $id, 'user_id' => $userId])->orderBy('id ASC')
//            ->all();
        $userId = \Yii::$app->getUser()->id;
        $scoreall =  \app\models\UserScore::find()->where(['user_id' => $userId])->orderBy('id ASC')
            ->all();
        $department = \common\models\User::find()->where(['id' => $userId])->one();
            return $this->render('userscore', ['score' => $scoreall, 'department_id' => $department->department_id]);


    }

    public function actionScoreview($id)
    {
        $userId = \Yii::$app->getUser()->id;
        $check = \app\models\CheckList::find()->where(['service_id' => $id])->all();
              $post = \Yii::$app->request->post();
                $dep_id =  \Yii::$app->request->get();
                $scoreall =  \app\models\UserScore::find()->where(['check_id' => $id])->orderBy('id ASC')->all();


                //var_dump($post); die;
                //$m = $this->findModel($id);
                $check = \app\models\CheckList::find()->where(['service_id' => $id])->all();

                $getId = \Yii::$app->request->get('department_id');
                if (empty($post['department_id'])){
                    $post['department_id'] = $getId;
                }
                // Сотрудники в select
                $user = \common\models\User::find()->where(['department_id' => $getId, 'status' => 10])->all();


                $userId = \Yii::$app->getUser()->id;

                $check3 = \app\models\CheckList::find()->where(['service_id' => $id, 'user_id' => $userId ])->all();


                $check1 = \app\models\CheckList::find()->where(['service_id' => $id, 'user_id' =>$userId ])->sum('score');
                $check2 = \app\models\CheckList::find()->where(['service_id' => $id, 'user_id' =>$userId ])->sum('score2');
                $num1 = \app\models\CheckList::find()->where(['service_id' => $id, 'user_id' =>$userId ])->sum('score3');
                $num2 = \app\models\CheckList::find()->where(['service_id' => $id, 'user_id' =>$userId ])->sum('score4');
                $num3 = \app\models\CheckList::find()->where(['service_id' => $id, 'user_id' =>$userId ])->sum('score5');
                $num4 = \app\models\CheckList::find()->where(['service_id' => $id, 'user_id' =>$userId ])->sum('score6');
                $num5 = \app\models\CheckList::find()->where(['service_id' => $id, 'user_id' =>$userId ])->sum('score7');
                $num6 = \app\models\CheckList::find()->where(['service_id' => $id, 'user_id' =>$userId ])->sum('score8');



                $userRole = current(ArrayHelper::getColumn(\Yii::$app->authManager->getRolesByUser(\Yii::$app->getUser()->id),
                    'name'));
                $scoreall2 =  \app\models\UserScore::find()->where(['check_id' => $id, 'user_id' => $userId])->orderBy('id ASC')
                    ->all();
        $scoreall =  \app\models\UserScore::find()->where(['user_id' => $userId])->orderBy('id ASC')
            ->all();
        return $this->render('scoreview', ['user' => $user,
            'model' => $this->findModel($id),
            'check' => $check,
            'countcheck' => [
                'check' =>  $check2 + $check1,
                'col1' => $num1 + $num4,
                'col2' => $num2 + $num5,
                'col3' => $num3 + $num6,
                'count' => $check2 + $check1 +$num1+$num4+$num2+$num5+$num3+$num6
            ],
            'scoreall' => $scoreall]);
    }

    // Удаление комментариев для check листов

    public function actionDeleteCommentCheck()
    {
        $post = \Yii::$app->request->post();
        //var_dump($post);
        $comment = \app\models\CommentCheck::findOne(['id' => $post['comment_id']]);
        //var_dump($comment); die;

            $comment->active = 0;
            $comment->update();
            $this->redirect(['check/view', 'id' => $post['check_id'], 'department_id' => $post['department_id']]);

    }
}
