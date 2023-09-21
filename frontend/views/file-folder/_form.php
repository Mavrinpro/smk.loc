<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\FileFolder $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="file-folder-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'file_id')->textInput() ?>

    <?= $form->field($model, 'department_id')->hiddenInput(['value' => \Yii::$app->request->get('department_id')])
        ->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Создать', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
