<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Page $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Страницы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="page-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('<i class="fa fa-trash"></i>', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('<i class="fa fa-download"></i>', ['create-doc', 'id' => $model->id], ['class' => 'btn 
        btn-light', 'title' => 'Скачать', 'data-toggle' => 'tooltip', 'data-placement' => 'top']) ?>

<!--        --><?//= Html::a('<i class="fa fa-print"></i>', ['#', 'id' => $model->id], ['class' => 'btn
//        btn-secondary', 'title' => 'Распечатать', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'onclicl'
//            => 'window.print()']) ?>
        <a href="#" class="btn btn-secondary" title="Печать" data-toggle="tooltip" id="docprint" onclick="window.print()"><i class="fa
        fa-print"></i></a>
    </p>
    <div class="mb-3 card">
        <div class="card-body">
            <ul class="tabs-animated-shadow tabs-animated nav">
                <li class="nav-item">
                    <a role="tab" class="nav-link" id="tab-c-0" data-toggle="tab" href="#tab-animated-0" aria-selected="false">
                        <span>Tab 1</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a role="tab" class="nav-link active" id="tab-c-1" data-toggle="tab" href="#tab-animated-1" aria-selected="true">
                        <span>Tab 2</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a role="tab" class="nav-link" id="tab-c-2" data-toggle="tab" href="#tab-animated-2" aria-selected="false">
                        <span>Tab 3</span>
                    </a>
                </li>
            </ul>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalDelete">
                Launch demo modal
            </button>


            <div class="tab-content">
                <div class="tab-pane" id="tab-animated-0" role="tabpanel">
                    <p class="mb-0">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen
                        book.
                        It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </p>
                </div>
                <div class="tab-pane active" id="tab-animated-1" role="tabpanel">
                    <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                        unknown
                        printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </p>
                </div>
                <div class="tab-pane" id="tab-animated-2" role="tabpanel">
                    <p class="mb-0">It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus
                        PageMaker including versions of Lorem Ipsum.</p>
                </div>
            </div>
        </div>
    </div>

<!--    --><?//= DetailView::widget([
//        'model' => $model,
//        'attributes' => [
//            'id',
//            'name',
//            'department_id',
//            'create_at',
//            'update_at',
//            'user_id_create',
//            'user_id_update',
//        ],
//    ]) ?>
    <div class="row">
        <div class="col-12 mb-3" id="print">
            <?php echo $model->text;  ?>

        </div>

    </div>
</div>



