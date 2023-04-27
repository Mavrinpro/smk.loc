<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap4\Breadcrumbs;

$department = new app\models\Department();

/** @var yii\web\View $this */
/** @var app\models\Branch $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Филиалы', 'url' => ['index']];

\yii\web\YiiAsset::register($this);
?>


<p>
    <?= Html::a('<i class="fa fa-plus-circle"></i> Создать отдел', ['department/create', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
</p>
<div class="row">
    <?php foreach ($department->department($model->id) as $depart) { ?>
        <div class="col-md-3">
            <div class="mb-3 card text-white card-body bg-info">
                <h5 class="text-white card-title"><?= $depart->name ?></h5>
                With supporting text below as a natural lead-in to additional content.

               <div class="menu-header-content btn-pane-right mt-3">

                            <a href="/department/view/<?= $depart->id ?>" class="btn-wide btn-hover-shine btn-pill btn
                            btn-block
                            btn-light">Перейти
                            </a>

                    </div>
            </div>
        </div>
    <?php } ?>
</div>




