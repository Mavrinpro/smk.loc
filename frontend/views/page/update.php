<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Page $model */

$this->title = 'Изменить: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Страницы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="page-update">
    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
