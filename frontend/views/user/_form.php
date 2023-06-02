<?php

use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\User $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
<div class="row">
    <div class="col-md-6">
    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
</div>
    <div class="col-md-6">
    <?= $form->field($model, 'email') ?>
    </div>
</div>
    <div class="row">
        <div class="col-md-6">
    <?= $form->field($model, 'company_id')->dropDownList(\yii\helpers\ArrayHelper::map(app\models\Company::find()
        ->andWhere('id>0')->all(), 'id', 'name')) ?>
        </div>
        <div class="col-md-6">
    <?= $form->field($model, 'city_id')->dropDownList(\yii\helpers\ArrayHelper::map(app\models\Branch::find()
        ->andWhere('id>0')->all(), 'id', 'name')) ?>
        </div>
        <div class="col-md-12">
    <label for="signupform-department_id">Отдел</label>

    <select id="signupform-department_id" class="form-control" name="SignupForm[department_id]">
        <?php $sql2 = app\models\Department::find()->select(['name', 'id'])->distinct()->all();
        foreach ($sql2 as $item) { ?>
            <option value="<?= $item->id ?>"><?= $item->name ?></option>
        <?php }
        ?> </select>


    <div class="form-group mt-3">
        <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
    </div>
        </div>
    <?php ActiveForm::end(); ?>

</div>
