<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\CheckListMedical $model */

$this->title = 'Update Check List Medical: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Check List Medicals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="check-list-medical-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
