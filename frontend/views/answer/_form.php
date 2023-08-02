<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Answer $model */
/** @var yii\widgets\ActiveForm $form */
var_dump(\Yii::$app->request->post());
?>

<div class="answer-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_id')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'test_id')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'question_id')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'create_at')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'update_at')->hiddenInput()->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success', 'data' => [
            'method' => 'post',
            'params' => [
                'id' => 6,
                'param2' => 'value2',
            ],
        ]]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
