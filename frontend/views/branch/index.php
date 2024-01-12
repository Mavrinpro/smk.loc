<?php

use app\models\Branch;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\models\BranchSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */
$this->title = 'Филиалы';
$this->params['breadcrumbs'][] = $this->title;
$branch = new app\models\Branch();
echo Yii::$app->request->hostInfo;
?>
<div class="app-page-title">
    <div class="row">
        <?php foreach ($branch->branch() as $branch) { ?>
            <div class="col-md-6 col-xl-4">
                <div class="card mb-3 widget-content bg-arielle-smile">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading"><?= $branch->name ?></div>
                            <div class="widget-subheading">Total Clients Profit</div>
                        </div>
                        <div class="widget-content-right">
                            <a href="/branch/view/?id=<?= $branch->id ?>" class="mb-2 mr-2 btn-pill btn
                            btn-light"><i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

    </div>
