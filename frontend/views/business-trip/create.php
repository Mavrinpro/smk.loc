<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\BusinessTrip $model */

$this->title = 'Создать командировку';
$this->params['breadcrumbs'][] = ['label' => 'График командировок', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="business-trip-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
