<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\BusinessTrip $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="business-trip-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'doctor_id')->textInput() ?>

    <?= $form->field($model, 'department_id')->textInput() ?>

    <?= $form->field($model, 'user_id_create')->textInput() ?>

    <?= $form->field($model, 'user_id_update')->textInput() ?>

    <?= $form->field($model, 'check_id')->textInput() ?>

    <?= $form->field($model, 'create_at')->textInput() ?>

    <?= $form->field($model, 'update_at')->textInput() ?>

    <?= $form->field($model, 'start_trip')->textInput() ?>

    <?= $form->field($model, 'end_trip')->textInput() ?>

    <?= $form->field($model, 'date_of_departure')->textInput() ?>

    <?= $form->field($model, 'return_date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
