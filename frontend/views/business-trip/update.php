<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\BusinessTrip $model */

$this->title = 'Изменить командировку: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'График командировок', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="business-trip-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
