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

    <li class="list-group-item">
        <div class="widget-content p-0">
            <div class="widget-content-wrapper">
                <div class="widget-content-left mr-3">
                    <div class="switch has-switch switch-container-class" id="check_user_admin" data-class="fixed">
                        <div class="switch-animate switch-off">
                            <input type="checkbox" data-toggle="toggle" data-onstyle="success">
                        </div>
                    </div>
                </div>
                <div class="widget-content-left">
                    <div class="widget-heading">Fixed Sidebar</div>
                    <div class="widget-subheading">Makes the sidebar left fixed, always visible!</div>
                </div>
            </div>
        </div>
    </li>
</div>


