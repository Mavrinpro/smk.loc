<?php
use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;
/** @var yii\web\View $this */
/** @var app\models\TestSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */
/** @var yii\widgets\ActiveForm $form */

$this->title = 'Настройки';
$this->params['breadcrumbs'][] = $this->title;

?>
<h1>settings/index</h1>

<p>
    You may change the content of this page by modifying
    the file <code><?= __FILE__; ?></code>.
</p>

<?php

$form = ActiveForm::begin(); ?>

<?= $form->field($model, 'bot_token')->textInput(['maxlength' => true]) ?>


<div class="form-group">
    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>
