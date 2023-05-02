<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use vova07\imperavi\Widget;

/** @var yii\web\View $this */
/** @var app\models\Orders $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="orders-form">

<!--    --><?php //$form = ActiveForm::begin(); ?>
<!---->
<!--    --><?//= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
<!---->
<!--    --><?//= $form->field($model, 'department_id')->textInput() ?>
<!---->
<!--    --><?//= $form->field($model, 'branch_id')->textInput() ?>
<!---->
<!--    --><?//= $form->field($model, 'user_id')->textInput() ?>
<!---->
<!--    --><?//= $form->field($model, 'create_at')->textInput() ?>
<!---->
<!--    --><?//= $form->field($model, 'update_at')->textInput() ?>
<!---->
<!--    --><?//= $form->field($model, 'user_id_update')->textInput() ?>
<!---->
<!--    <div class="form-group">-->
<!--        --><?//= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
<!--    </div>-->
<!---->
<!--    --><?php //ActiveForm::end(); ?>
    <?php
    //echo \Yii::$app->user->identity->id;
    $action_id = \Yii::$app->controller->action->id;
    $department_id = \Yii::$app->request->get('id');
    $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'text')->widget(Widget::className(), [
        'settings' => [
            'toolbarFixedTopOffset' => 100,
            'lang' => 'ru',
            'minHeight' => 200,
            'plugins' => [
                'clips',
                'fullscreen',
                'table'
            ],
            'clips' => [
                ['Lorem ipsum...', 'Lorem...'],
                ['red', '<span class="label-red">red</span>'],
                ['green', '<span class="label-green">green</span>'],
                ['blue', '<span class="label-blue">blue</span>'],
            ],
        ],
    ]); ?>

    <?php if ($action_id == 'create') {
        echo $form->field($model, 'create_at')->hiddenInput(['value' => time()])->label(false);
        echo $form->field($model, 'user_id')->hiddenInput(['value' => \Yii::$app->user->identity->id])->label(false);
        echo $form->field($model, 'department_id')->hiddenInput(['value' => $department_id])->label(false); ?>
        <div class="form-group">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        </div>
    <?php }
    if ($action_id == 'update') {

        echo $form->field($model, 'update_at')->hiddenInput(['value' => time()])->label(false);
        echo $form->field($model, 'user_id_update')->hiddenInput(['value' => Yii::$app->getUser()->id])->label(false)
        ; ?>
        <div class="form-group">
            <?= Html::submitButton('Обновить', ['class' => 'btn btn-success']) ?>
        </div>
    <?php } ?>

    <?php ActiveForm::end(); ?>

</div>
