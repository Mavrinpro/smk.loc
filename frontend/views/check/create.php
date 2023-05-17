<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Check $model */

$this->title = 'Create Check';
$this->params['breadcrumbs'][] = ['label' => 'Checks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="check-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
