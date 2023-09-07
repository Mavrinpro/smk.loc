<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Test $model */

$this->title = 'Создать тест';
$this->params['breadcrumbs'][] = ['label' => 'Тесты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="test-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
