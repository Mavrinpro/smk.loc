<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Check $model */

$this->title = 'Update Check: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Checks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="check-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
