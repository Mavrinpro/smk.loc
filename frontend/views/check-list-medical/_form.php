<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\CheckListMedical $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="check-list-medical-form">

    <?php $form = ActiveForm::begin(); ?>
    <?php for ($i = 0; $i < 4; $i++) { ?>
    <?= $form->field($model, "[$i]name")->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, "[$i]department_id")->hiddenInput(['value' => \Yii::$app->request->get('department_id')])
        ->label(false) ?>

    <?= $form->field($model, "[$i]create_at")->hiddenInput(['value' => time()])->label(false) ?>

        <?= $form->field($model, "[$i]check_id")->hiddenInput(['value' => \Yii::$app->request->get('check_id')])->label
        (false) ?>
    <?= $form->field($model, "[$i]user_id_create")->hiddenInput(['value' => \Yii::$app->getUser()->id])->label(false) ?>

    <?= $form->field($model, "[$i]active")->hiddenInput(['value' => null])->label(false) ?>
    <?php } ?>

    <div class="form-group">
        <?= Html::submitButton('Добавить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
