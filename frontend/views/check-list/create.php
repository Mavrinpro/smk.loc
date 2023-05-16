<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\CheckList $model */

$this->title = 'Create Check List';
$this->params['breadcrumbs'][] = ['label' => 'Check Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="check-list-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
