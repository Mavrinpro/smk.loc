<?php

use app\models\BusinessTrip;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\models\BusinessTripSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'График командировок';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="business-trip-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Новая командировка', ['create', 'department_id' => 5], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'doctor_id',
            [
                'attribute' => 'doctor_id',
                'value' => 'doctor.fio',
                'filter'=>\app\models\Doctor::find()->select(['fio', 'id'])
                    ->indexBy
                    ('id')->column(),
            ],
            'department_id',
            'user_id_create',
            'user_id_update',
            //'check_id',
            //'create_at',
            //'update_at',
            //'start_trip',
            //'end_trip',
            //'date_of_departure',
            //'return_date',
            [
                'class' => ActionColumn::className(),
                'buttons' => [
                    'update' => function ($url, $model, $key) {
                        return Html::a('<i class="fa-solid fa fa-edit"></i>',
                            $url, ['class' => 'btn btn-sm btn-warning']);
                    },
                    'view' => function ($url, $model, $key) {
                        return Html::a(
                            '<i class="fa-solid fa fa-eye"></i>',
                            $url, ['class' => 'btn btn-sm btn-success']);
                    },
                    'change-department' => function ($url, $model, $key) {     // render your custom button
                        return Html::a(
                            ' <i class="fa fa-share"></i>',
                            $url, ['class' => 'btn ml-2 btn-sm btn-success']);
                    },
                    'delete' => function ($url, $model, $key) {
                        return Html::a(
                            '<i class="fa fa-trash-alt"></i>',
                            $url, ['class' => 'btn btn-sm btn-danger',
                            //'title' => Yii::t('app', 'Delete'),
                            'data-confirm' => Yii::t('yii', 'Удалить командировку № ' . $key . '?'),
                            'data-method' => 'post', 'data-pjax' => '1',
                        ]);
                    },


                ],
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
