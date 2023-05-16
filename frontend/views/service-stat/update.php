<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ServiceStat $model */

$this->title = 'Update Service Stat: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Service Stats', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="service-stat-update">
    <p>
        <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
