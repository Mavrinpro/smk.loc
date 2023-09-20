<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\FileFolder $model */

$this->title = 'Создать раздел файлов';
$this->params['breadcrumbs'][] = ['label' => 'Разделы файлов', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="file-folder-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
