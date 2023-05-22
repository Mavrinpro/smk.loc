<?php

use app\models\Check;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\ListView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\models\CheckSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Чек-листы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="check-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('<i class="fa fa-plus-circle"></i> Создать чек-лист', ['create', 'department_id' =>
            \Yii::$app->request->get('department_id')],
            ['class' => 'btn 
        btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <!--    --><? //= GridView::widget([
    //        'dataProvider' => $dataProvider,
    //        'filterModel' => $searchModel,
    //        'columns' => [
    //            ['class' => 'yii\grid\SerialColumn'],
    //
    //            'id',
    //            'name',
    //            [
    //                'class' => ActionColumn::className(),
    //                'urlCreator' => function ($action, Check $model, $key, $index, $column) {
    //                    return Url::toRoute([$action, 'id' => $model->id]);
    //                 }
    //            ],
    //        ],
    //    ]); ?>


    <?php Pjax::end(); ?>

</div>
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
                <ul class="list-group">
                    <?=
                    ListView::widget([
                        'dataProvider' => $dataProvider,
                        'itemView' => '_list-check',
                        'viewParams' => [
                            'fullView' => true,
                            'context' => 'main-page',

                        ],
                    ]);
                    ?>
            </div>
        </div>
    </div>

</div>
