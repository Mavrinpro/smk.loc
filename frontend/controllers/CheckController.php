<?php

namespace frontend\controllers;

use app\models\Check;
use app\models\CheckSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

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
        $post = \Yii::$app->request->post();
        $dep_id =  \Yii::$app->request->get();
        $scoreall =  \app\models\UserScore::find()->where(['check_id' => $id])->orderBy('id ASC')->all();

        //var_dump($post); die;
        $m = $this->findModel($id);
        $check = \app\models\CheckList::find()->where(['service_id' => $id])->all();

        $getId = \Yii::$app->request->get('department_id');
        if (empty($post['department_id'])){
            $post['department_id'] = $getId;
        }
        // Сотрудники в select
        $user = \common\models\User::find()->where(['department_id' => $dep_id['id'], 'status' => 10])->all();

        $check1 = \app\models\CheckList::find()->where(['service_id' => $id])->sum('score');
        $check2 = \app\models\CheckList::find()->where(['service_id' => $id])->sum('score2');
        $num1 = \app\models\CheckList::find()->where(['service_id' => $id])->sum('score3');
        $num2 = \app\models\CheckList::find()->where(['service_id' => $id])->sum('score4');
        $num3 = \app\models\CheckList::find()->where(['service_id' => $id])->sum('score5');
        $num4 = \app\models\CheckList::find()->where(['service_id' => $id])->sum('score6');
        $num5 = \app\models\CheckList::find()->where(['service_id' => $id])->sum('score7');
        $num6 = \app\models\CheckList::find()->where(['service_id' => $id])->sum('score8');
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
            'scoreall' => $scoreall
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
}
