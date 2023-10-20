<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Doctor $model */

$this->title = 'Добавить врача';
$this->params['breadcrumbs'][] = ['label' => 'Врачи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="doctor-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
