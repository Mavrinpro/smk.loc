<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;

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
            'doctor.fio',
            'department_id',
            'user.username',
            'user.username',
            //'check_id',
            [
                'attribute' => 'create_at',
                'value' => function ($model) {
                    return date('d.m.Y', $model->create_at);
                },
            ],

            [
                'attribute' => 'update_at',
                'value' => function ($model) {
                    return date('d.m.Y', $model->update_at);
                },
            ],
            [
                'attribute' => 'start_trip',
                'value' => function ($model) {
                    return date('Y-m-d', $model->start_trip);
                },
            ],

            [
                'attribute' => 'end_trip',
                'value' => function ($model) {
                    return date('Y-m-d', $model->end_trip);
                },
            ],

            [
                'attribute' => 'date_of_departure',
                'value' => function ($model) {
                    return date('Y-m-d', $model->date_of_departure);
                },
            ],

            [
                'attribute' => 'return_date',
                'value' => function ($model) {
                    return date('Y-m-d', $model->return_date);
                },
            ],

        ],
    ]) ?>



        <a href="##" id="all_box" class="btn btn-sm btn-success">Отметить все</a>   <a href="##" id="all_box_no" class="btn btn-sm
                                                                              btn-warning">Снять</a><br><br>

        <?php $form = ActiveForm::begin([
                'action' => '/business-trip/send-trip',
            'id' => 'controls',

        ]); ?>
        <?php
        //var_dump($model);
        $items = \common\models\User::find()->where(['status' => 10])
            ->select(['username'])
            ->indexBy('id')
            ->column();

            echo $form->field($noty, 'user_id[]')
                ->checkboxList($items);
        echo $form->field($noty, 'doc')
            ->hiddenInput(['value' => $model->id])->label(false);
        echo $form->field($noty, 'id')
            ->hiddenInput(['value' => $model->doctor_id])->label(false);

        ?>
    <div class="form-group">
        <?= Html::submitButton('Известить', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>

<?php


$js = <<< JS
$('#all_box').click(function(){
	
		$('#controls input:checkbox').prop('checked', true);
	
});

$('#all_box_no').click(function(){
	
		$('#controls input:checkbox').prop('checked', false);
	
});

JS;
$this->registerJs($js);