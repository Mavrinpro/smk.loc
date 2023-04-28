<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Branch $model */

$this->title = 'Create Branch';
$this->params['breadcrumbs'][] = ['label' => 'Branches', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="branch-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
