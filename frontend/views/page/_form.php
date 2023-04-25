<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var app\models\Page $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="page-form"> <?php
    $action_id = \Yii::$app->controller->action->id;
    $department_id = \Yii::$app->request->get('id');
    echo $department_id;

    $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'department_id')->hiddenInput(['value' => $department_id])->label(false); ?>

    <?php if ($action_id == 'create') {
        echo $form->field($model, 'create_at')->hiddenInput(['value' => time()])->label(false);
        echo $form->field($model, 'user_id_create')->hiddenInput(['value' => \Yii::$app->user->identity->id])->label(false);
    }
    if ($action_id == 'update') {

        echo $form->field($model, 'update_at')->hiddenInput(['value' => time()])->label(false);
        echo $form->field($model, 'user_id_update')->hiddenInput(['value' => Yii::$app->getUser()->id])->label(false);
    } ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
