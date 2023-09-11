<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\BusinessTripSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="business-trip-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'doctor_id') ?>

    <?= $form->field($model, 'department_id') ?>

    <?= $form->field($model, 'user_id_create') ?>

    <?= $form->field($model, 'user_id_update') ?>

    <?php // echo $form->field($model, 'check_id') ?>

    <?php // echo $form->field($model, 'create_at') ?>

    <?php // echo $form->field($model, 'update_at') ?>

    <?php // echo $form->field($model, 'start_trip') ?>

    <?php // echo $form->field($model, 'end_trip') ?>

    <?php // echo $form->field($model, 'date_of_departure') ?>

    <?php // echo $form->field($model, 'return_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
