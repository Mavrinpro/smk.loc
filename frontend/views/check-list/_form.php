<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\CheckList $model */
/** @var yii\widgets\ActiveForm $form */
$c = new \app\models\Check();

?>

<div class="check-list-form">

    <?php $form = ActiveForm::begin(); ?>
    <?php if ($model->phone1 != null && $model->phone2 != null && $model->phone3 != null): ?>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'phone1')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'phone2')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'phone3')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <?php endif; ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text3')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'user_id')->hiddenInput(['value' => \Yii::$app->getUser()->id])->label(false) ?>

    <?= $form->field($model, 'service_id')->hiddenInput(['value' => \Yii::$app->request->get('check_id')])->label
    (false) ?>

    <?= $form->field($model, 'department_id')->hiddenInput()->label(false) ?>
    <?= $form->field($model, 'score')->hiddenInput(['value' => null])->label(false) ?>
    <?= $form->field($model, 'score2')->hiddenInput(['value' => null])->label(false) ?>

    <?= $form->field($model, 'create_at')->hiddenInput(['value' => time()])->label(false) ?>

    <?= $form->field($model, 'update_at')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'user_id_create')->hiddenInput(['value' => \Yii::$app->getUser()->id])->label(false) ?>

    <?= $form->field($model, 'user_id_update')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'active')->hiddenInput()->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
