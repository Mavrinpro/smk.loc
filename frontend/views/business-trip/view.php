<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\BusinessTrip $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Business Trips', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="business-trip-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('<i class="fa fa-trash"></i>', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'doctor_id',
            'department_id',
            'user_id_create',
            'user_id_update',
            'check_id',
            'create_at',
            'update_at',
            [
                    'attribute' => 'start_trip',
                'value' => function($model){
                return date('Y-m-d', $model->start_trip);
                },
            ],

            [
                'attribute' => 'end_trip',
                'value' => function($model){
                    return date('Y-m-d', $model->end_trip);
                },
            ],

            [
                'attribute' => 'date_of_departure',
                'value' => function($model){
                    return date('Y-m-d', $model->date_of_departure);
                },
            ],

            [
                'attribute' => 'return_date',
                'value' => function($model){
                    return date('Y-m-d', $model->return_date);
                },
            ],

        ],
    ]) ?>

</div>
