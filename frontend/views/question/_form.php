<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Question $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="question-form">

<!--    --><?php //$form = ActiveForm::begin(); ?>
<!---->
<!--    --><?//= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
<!---->
<!--    --><?//= $form->field($model, 'user_id')->textInput() ?>
<!---->
<!--    --><?//= $form->field($model, 'test_id')->textInput() ?>
<!---->
<!--    --><?//= $form->field($model, 'create_at')->textInput() ?>
<!---->
<!--    --><?//= $form->field($model, 'update_at')->textInput() ?>
<!---->
<!--    --><?//= $form->field($model, 'right')->textInput() ?>
<!---->
<!--    <div class="form-group">-->
<!--        --><?//= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
<!--    </div>-->
<!---->
<!--    --><?php //ActiveForm::end(); ?>


    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_id')->hiddenInput(['value' => \Yii::$app->getUser()->id])->label
    (false) ?>

    <?= $form->field($model, 'test_id')->hiddenInput(['value' => $model->test_id])->label
    (false) ?>

    <?= $form->field($model, 'create_at')->hiddenInput(['value' => time()])->label(false) ?>

    <?= $form->field($model, 'update_at')->hiddenInput(['value' => time()])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
