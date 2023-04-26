<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Page $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Pages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="page-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'department_id',
            'create_at',
            'update_at',
            'user_id_create',
            'user_id_update',
        ],
    ]) ?>

</div>
<div class="row">
    <div class="col-12 mb-3">
        <!--        <div class="toggle-group">-->
        <!--            <input type="checkbox" id="eee" data-toggle="toggle" data-onstyle="success"> Администратор-->
        <!--            <label for="eee" class="btn btn-danger toggle-on">Onнн</label>-->
        <!--            <label for="eee" class="btn btn-light toggle-off">Off</label><span class="toggle-handle btn-->
        <!--            btn-light"></span></div>-->
    </div>
    
</div>


