<?php

use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\User $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="user-form">
    <div class="mb-5 mt-3">
    <?php
    echo 'Загрузить аватар';
    echo \kato\DropZone::widget([
        'options' => [
            'url' => '/protocol/upload/?department_id=' . \Yii::$app->request->get('department_id'),
            'maxFilesize' => '10',
            'dictDefaultMessage' => 'Перетащите файлы в эту область'
        ],
        'clientEvents' => [
            'complete' => "function(file){
                
                console.log(file)
                }",
            'removedfile' => "function(file){alert(file.name + ' is removed')}"
        ],
    ]);
    ?>
    </div>
    <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
<div class="row">
    <div class="col-md-6">
    <?= $form->field($model, 'fio')->textInput(['autofocus' => true]) ?>
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
        <div class="col-md-6">
            <?= $form->field($model, 'department_id')->dropDownList(\yii\helpers\ArrayHelper::map
            (app\models\Department::find()
                ->andWhere('id>0')->all(), 'id', 'name')) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'telegram_id')->textInput() ?>
        </div>

    <div class="form-group mt-3">
        <?= Html::submitButton('Изменить', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
