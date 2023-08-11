<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Sop $model */

$this->title = 'Create Sop';
$this->params['breadcrumbs'][] = ['label' => 'Sops', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sop-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
