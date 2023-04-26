<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap4\Modal;

/** @var yii\web\View $this */
/** @var app\models\Department $model */
/** @var app\models\Department $page */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Departments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

?>
<?= Html::a('Создать', ['/page/create', 'id' => $model->id], ['class' => 'btn btn-success mb-3']) ?>
<div class="row">

    <div class="col-md-3">
        <div class="mb-3 card text-white card-body bg-white text-dark">
            <h5 class="text-dark card-title">w5yw45yw45y</h5>
            With supporting text below as a natural lead-in to additional content.

            <div class="menu-header-content btn-pane-right mt-3">

                <a href="/department/view/5" class="btn-wide btn-hover-shine btn-pill btn
                            btn-block
                            btn-outline-success">Перейти
                </a>

            </div>
        </div>
    </div>
    <?php foreach ($page as $pages) { ?>
    <div class="col-md-3">
        <div class="mb-3 card text-white card-body bg-white text-dark">
            <h5 class="text-dark card-title">w5yw45yw45y</h5>
            With supporting text below as a natural lead-in to additional content.

            <div class="menu-header-content btn-pane-right mt-3">

                <a href="/department/view/5" class="btn-wide btn-hover-shine btn-pill btn
                            btn-block
                            btn-outline-success">Перейти
                </a>

            </div>
        </div>
    </div>
</div>
    <?php } ?>




