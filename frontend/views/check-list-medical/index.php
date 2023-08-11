<?php

use app\models\CheckListMedical;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\CheckListMedicalSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Check List Medicals';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="check-list-medical-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Check List Medical', ['create', 'department_id' =>
            \Yii::$app->request->get('department_id')], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'name',
            'department_id',
            'create_at',
            'update_at',
            //'user_id_create',
            //'user_id_update',
            //'active',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, CheckListMedical $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
