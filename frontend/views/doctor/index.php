<?php

use app\models\Doctor;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\models\DoctorSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Врачи';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="doctor-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Doctor', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'fio:ntext',

            [
                'attribute' => 'branch_id',
                'value' => 'branch.name',
                'label' => 'Филиал',
                'filter'=>\app\models\Branch::find()->select(['name'])
                    ->indexBy('id')->column(),
            ],

            [
                'attribute' => 'create_at',
                'value' => function ($model) {
                    return date('d.m.Y H:i', $model->create_at);
                },
            ],

            [
                'attribute' => 'update_at',
                'value' => function ($model) {
                    return date('d.m.Y H:i', $model->update_at);
                },
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Doctor $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
