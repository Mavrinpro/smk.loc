<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Protocol $model */

$this->title = 'Передать файл';
$this->params['breadcrumbs'][] = ['label' => 'Протоколы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="protocol-view">

    <h1><?= Html::encode($this->title) ?></h1>

    

</div>
