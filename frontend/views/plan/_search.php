<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\PlanDoctors $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="plan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'department_id') ?>

    <?= $form->field($model, 'create_at') ?>

    <?= $form->field($model, 'update_at') ?>

    <?php // echo $form->field($model, 'user_id_create') ?>

    <?php // echo $form->field($model, 'user_id_update') ?>

    <?php // echo $form->field($model, 'active') ?>

    <?php // echo $form->field($model, 'send_user_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
