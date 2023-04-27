<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap4\Modal;

/** @var yii\web\View $this */
/** @var app\models\Department $model */
/** @var app\models\Department $page */
/** @var app\models\Department $branch */

$this->title = $model->name .' ('. $branch->name. ')';
$this->params['breadcrumbs'][] = ['label' => 'Departments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $branch->name;
\yii\web\YiiAsset::register($this);
?>
<?= Html::a('Создать', ['/page/create', 'id' => $model->id], ['class' => 'btn btn-success mb-3']) ?>
<div class="row">
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

                <?= Html::a('<i class="fa fa-trash"></i>', ['delete', 'id' => $model->id], [
                    'class' => 'btn-wide btn-hover-shine btn-pill btn
                            btn-inline-block
                            btn-outline-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>

            </div>
        </div>
    </div>

    <?php } ?>
</div>



