<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\CheckListMedical $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="check-list-medical-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'department_id')->hiddenInput(['value' => \Yii::$app->request->get('department_id')])
        ->label(false) ?>

    <?= $form->field($model, 'create_at')->hiddenInput(['value' => time()])->label(false) ?>


    <?= $form->field($model, 'user_id_create')->hiddenInput(['value' => \Yii::$app->getUser()->id])->label(false) ?>


    <?= $form->field($model, 'active')->hiddenInput(['value' => null])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Добавить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
