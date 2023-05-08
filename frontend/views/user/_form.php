<?php

use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\User $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

    <?= $form->field($model, 'email') ?>
    <?= $form->field($model, 'company_id') ?>
    <!--    --><? //= $form->field($model, 'city_id') ?>
    <?= $form->field($model, 'city_id')->dropDownList(\yii\helpers\ArrayHelper::map(app\models\Branch::find()->andWhere('id>0')->all(), 'id', 'name')) ?>
    <!--    --><? //= $form->field($model, 'department_id') ?>
    <label for="signupform-department_id">Отдел</label>
    <select id="signupform-department_id" class="form-control" name="SignupForm[department_id]">
        <?php $sql2 = app\models\Department::find()->select(['name', 'id'])->distinct()->all();
        foreach ($sql2 as $item) { ?>
            <option value="<?= $item->id ?>"><?= $item->name ?></option>
        <?php }
        ?> </select>
    <?= $form->field($model, 'password')->passwordInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
