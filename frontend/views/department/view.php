<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap4\Modal;
use yii\bootstrap4\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Department $model */
/** @var app\models\Department $page */
/** @var yii\data\ActiveDataProvider $dataProvider */


$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Отделы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->name;
\yii\web\YiiAsset::register($this);
?>

<?= Html::a('<i class="fa fa-plus-circle"></i> Создать материал', ['/page/create', 'id' => $model->id], ['class' => 'btn btn-success mb-3']) ?>
<?= Html::a('<i class="fa fa-pencil-alt"></i>', ['department/update', 'id' => $model->id], ['class' => 'ml-3 btn btn-warning mb-3']) ?>
<a href="" data-target="#modalCreateUser" data-toggle="modal" class="btn btn-success mb-3 ml-3"><i class="fa
fa-user"></i> Добавить
    сотрудника</a>
<div class="row">
    <div class="col-md-12 mb-5">
        <div class="grid-menu grid-menu-4col">
            <div class="no-gutters row">
                <div class="col-sm-3">
                    <?= Html::a('<i class="lnr-book btn-icon-wrapper"> </i>Протоколы инцидентов', ['/protocol'], ['class' => 'btn-icon-vertical btn-square btn-transition btn btn-outline-primary']) ?>
                </div>
                <div class="col-sm-3">
                    <?= Html::a('<i class="lnr-license btn-icon-wrapper"> </i>Приказы', ['/order'], ['class' => 'btn-icon-vertical btn-square btn-transition btn btn-outline-secondary']) ?>
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
        <div class="grid-menu grid-menu-4col">
            <div class="no-gutters row">
                <div class="col-sm-3">
                    <a href="/department/test/?test_id=<?= $model->id ?>" class="btn-icon-vertical btn-square
                    btn-transition
                     btn
                    btn-outline-primary">
                        <i class="lnr-graduation-hat btn-icon-wrapper"> </i>Тесты
                    </a>
                </div>
                <div class="col-sm-3">
                    <button class="btn-icon-vertical btn-square btn-transition btn btn-outline-secondary">
                        <i class="lnr-file-empty btn-icon-wrapper"> </i>СОПы
                    </button>
                </div>
                <div class="col-sm-3">
                    <button class="btn-icon-vertical btn-square btn-transition btn btn-outline-danger">
                        <i class="lnr-warning btn-icon-wrapper"> </i>Паспорта рисков процесса
                    </button>
                </div>
                <div class="col-sm-3">
                    <a href="/check/?department_id=<?= $model->id ?>" class="btn-icon-vertical btn-square btn-transition
                     btn
                    btn-outline-info">
                        <i class="lnr-map btn-icon-wrapper"> </i>Критерии оценки
                    </a>
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

                    <a href="/page/view/<?= $pages->id; ?>" class="btn-wide btn-hover-shine btn-pill btn
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
                            'confirm' => 'Хотите удалить запись ' . $pages->id . '?',
                            'method' => 'post',
                        ],
                    ]) ?>

                </div>
            </div>
        </div>

    <?php } ?>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="drawer-section p-0">
            <div class="files-box">
                <ul class="list-group list-group-flush">
                    <?php foreach ($page as $pages) { ?>
                        <li class="list-group-item">
                            <div class="todo-indicator bg-success"></div>
                            <div class="widget-content p-0">
                                <div class="widget-content-wrapper">
                                    <div class="widget-content-left  fsize-2 mr-3 text-primary center-elem">
                                        <i class="fa fa-file-alt"></i>
                                    </div>
                                    <div class="widget-content-left flex2">
                                        <div class="widget-heading"><a href="/page/view/<?= $pages->id; ?>"
                                                                       class="widget-heading font-weight-normal"><?= $pages->name ?></a>
                                        </div>
                                    </div>

                                    <div class="widget-content-right">

                                        <div class="d-inline-block dropdown">
                                            <button type="button" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false" class="border-0 btn-transition btn btn-link">
                                                <i class="fa fa-ellipsis-h"></i>
                                            </button>
                                            <div tabindex="-1" role="menu" aria-hidden="true"
                                                 class="dropdown-menu dropdown-menu-right">
                                                <ul class="nav flex-column">
                                                    <li class="nav-item">
                                                        <a class="nav-link">
                                                            <i class="nav-link-icon lnr-pointer-right"></i>
                                                            <span> Передать</span>
                                                            <!--                                            <div class="ml-auto badge badge-pill badge-secondary">86</div>-->
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" onclick="window.print()">
                                                            <i class="nav-link-icon lnr-printer"></i>
                                                            <span> Печать</span>
                                                            <!--                                            <div class="ml-auto badge badge-pill badge-danger">5</div>-->
                                                        </a>
                                                    </li>
                                                    <?= Html::a('<i class="nav-link-icon lnr-download"></i> <span> Скачать</span>', ['page/create-doc', 'id' => $model->id], ['class' => 'nav-link', 'title' => 'Скачать']) ?>
                                                    <li class="nav-item">
                                                        <a disabled="" data-toggle="modal" data-target="#modalDelete"
                                                           class="nav-link">
                                                            <i class="nav-link-icon lnr-trash"></i>
                                                            <span> Удалить</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!--                                        <button class="border-0 btn-transition btn btn-outline-danger" data-toggle="modal" data-target="#modalDelete">-->
                                        <!--                                            <i class="fa fa-trash-alt"></i>-->
                                        <!--                                        </button>-->
                                    </div>
                                </div>
                            </div>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<a href="" data-target="#modalCreateUser" data-toggle="modal" class="btn btn-success mb-3 mt-3"><i class="fa
fa-user"></i> Добавить
    сотрудника</a>
<?php if (sizeof($user) > 0) { ?>
    <div class="row">
        <div class="col-md-12 mt-3">
            <h3 class="mb-3">Сотрудники</h3>
<!--                        --><?//= Html::a('<i class="fa fa-user"></i> Добавить сотрудника', ['create-user', 'id' =>
//                            $model->id],['class' => 'btn btn-success mb-3', 'data' => [
//                            'method' => 'post',
//                            'params' => [
//                                'id' => $model->id,
//                                'param2' => 'value2',
//                            ],
//                        ],]) ?>
            <ul class="todo-list-wrapper list-group list-group-flush">
                <?php
                foreach ($user as $users) { ?>
                    <li class="list-group-item">
                        <div class="todo-indicator bg-focus"></div>
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left mr-2">
                                    <div class="custom-checkbox custom-control">
                                        <input type="checkbox" id="exampleCustomCheckbox<?= $users->id ?>"
                                               class="custom-control-input">
                                        <label class="custom-control-label"
                                               for="exampleCustomCheckbox<?= $users->id ?>">&nbsp;</label>
                                    </div>
                                </div>
                                <div class="widget-content-left">
                                    <?php if ($users->status == 10) { ?>
                                        <a href="/user/view/<?= $users->id ?>"
                                           class="widget-heading text-success"><?= $users->username ?></a>
                                        <div class="widget-subheading">
                                            <div>Активный

                                            </div>
                                        </div>
                                    <?php } else { ?>
                                        <div class="widget-heading text-danger"><?= $users->username ?></div>
                                        <div class="widget-subheading">
                                            <div>Не активный

                                            </div>
                                        </div>
                                    <?php } ?>

                                </div>
                                <div class="widget-content-right widget-content-actions">
                                    <div class="d-inline-block dropdown">
                                        <button type="button" aria-haspopup="true" data-toggle="dropdown"
                                                aria-expanded="false"
                                                class="border-0 btn-transition btn btn-link">
                                            <i class="fa fa-ellipsis-h"></i>
                                        </button>
                                        <div tabindex="-1" role="menu" aria-hidden="true"
                                             class="dropdown-menu dropdown-menu-right"
                                             style="">
                                            <h6 tabindex="-1" class="dropdown-header">Header</h6>
                                            <button type="button" disabled="" tabindex="-1"
                                                    class="disabled dropdown-item">Action
                                            </button>
                                            <button type="button" tabindex="0" class="dropdown-item">Another Action
                                            </button>
                                            <!--                                            <button type="button" tabindex="0" class="dropdown-item">Удалить</button>-->
                                            <?= Html::a('Удалить', ['department/delete-user', 'id' =>
                                                $users->id, 'department_id' => $model->id], ['class' => 'dropdown-item',
                                                'data' => [
                                                'method' => 'post',
                                                'params' => [
                                                    'id' => 6,
                                                    'param2' => 'value2',
                                                ],
                                            ],]) ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
<?php } ?>

<?php
$js = <<<JS

JS;
$this->registerJs($js);
?>


