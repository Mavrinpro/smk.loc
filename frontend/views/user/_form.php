<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\User $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

    <?= $form->field($model, 'email') ?>
    <?= $form->field($model, 'company_id') ?>
<!--    --><?//= $form->field($model, 'city_id') ?>
    <?= $form->field($model, 'city_id')->dropDownList(\yii\helpers\ArrayHelper::map(app\models\Branch::find()->andWhere('id>0')->all(), 'id', 'name')) ?>
<!--    --><?//= $form->field($model, 'department_id') ?>
    <?= $form->field($model, 'department_id')->dropDownList(\yii\helpers\ArrayHelper::map(app\models\Department::find()->select('name')->distinct(fa)->all(), 'id', 'name')) ?>
    <?= $form->field($model, 'password')->passwordInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
