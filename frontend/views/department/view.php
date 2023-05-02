<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap4\Modal;

/** @var yii\web\View $this */
/** @var app\models\Department $model */
/** @var app\models\Department $page */


 $this->title = $model->name;
 $this->params['breadcrumbs'][] = ['label' => 'Отделы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->name;
\yii\web\YiiAsset::register($this);
?>
<?= Html::a('<i class="fa fa-plus-circle"></i> Создать материал', ['/page/create', 'id' => $model->id], ['class' => 'btn btn-success mb-3']) ?>
<?= Html::a('<i class="fa fa-pencil-alt"></i>', ['department/update', 'id' => $model->id], ['class' => 'ml-3 btn btn-warning mb-3']) ?>
<div class="row">
    <div class="col-md-12 mb-5">
        <div class="grid-menu grid-menu-4col">
            <div class="no-gutters row">
                <div class="col-sm-3">
                    <button class="btn-icon-vertical btn-square btn-transition btn btn-outline-primary">
                        <i class="lnr-book btn-icon-wrapper"> </i>Протоколы инцидентов
                    </button>
                </div>
                <div class="col-sm-3">
                    <button class="btn-icon-vertical btn-square btn-transition btn btn-outline-secondary">
                        <i class="lnr-license btn-icon-wrapper"> </i>Приказы
                    </button>
                </div>
                <div class="col-sm-3">
                    <button class="btn-icon-vertical btn-square btn-transition btn btn-outline-success">
                        <i class="lnr-paperclip btn-icon-wrapper"> </i>Документированная процедура
                    </button>
                </div>
                <div class="col-sm-3">
                    <button class="btn-icon-vertical btn-square btn-transition btn btn-outline-info">
                        <i class="lnr-map btn-icon-wrapper"> </i>План внутреннего аудита
                    </button>
                </div>
            </div>
        </div>
    </div>
    <?php foreach ($page as $pages) { ?>
    <div class="col-md-3">
        <div class="mb-3 card text-white card-body bg-white text-dark">
            <h5 class="text-dark card-title"><?= $pages->name ?></h5>
            With supporting text below as a natural lead-in to additional content.

            <div class="menu-header-content btn-pane-right mt-3">

                <a href="/page/view/<?= $pages->id;  ?>" class="btn-wide btn-hover-shine btn-pill btn
                            btn-inline-block
                            btn-outline-success">Перейти
                </a>
                <?= Html::a('<i class="fa fa-pencil-alt"></i>', ['page/update', 'id' => $pages->id], [
                    'class' => 'btn-wide btn-hover-shine btn-pill btn
                            btn-inline-block
                            btn-outline-warning',
                ]) ?>

                <?= Html::a('<i class="fa fa-trash"></i>', ['page/delete', 'id' => $pages->id], [
                    'class' => 'btn-wide btn-hover-shine btn-pill btn
                            btn-inline-block
                            btn-outline-danger',
                    'data' => [
                        'confirm' => 'Хотите удалить запись ' .$pages->id.'?',
                        'method' => 'post',
                    ],
                ]) ?>

            </div>
        </div>
    </div>

    <?php } ?>
</div>



