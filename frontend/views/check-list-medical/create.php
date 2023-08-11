<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\CheckListMedical $model */

$this->title = 'Create Check List Medical';
$this->params['breadcrumbs'][] = ['label' => 'Check List Medicals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="check-list-medical-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
