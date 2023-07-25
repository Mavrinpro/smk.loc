<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\VarDumper;

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
<?php

var_dump($model);

VarDumper::dump($model, 10, true);