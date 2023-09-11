<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\BusinessTrip $model */

$this->title = 'Create Business Trip';
$this->params['breadcrumbs'][] = ['label' => 'Business Trips', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="business-trip-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
