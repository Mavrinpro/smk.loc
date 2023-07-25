<?php

use app\models\Protocol;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\ProtocolSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Протоколы инцидентов';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="protocol-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <!--    <p>-->
    <!--        --><?//= Html::a('Create Protocol', ['create'], ['class' => 'btn btn-success']) ?>
    <!--    </p>-->
    <div class="mt-3 mb-4">
        <?php
        echo \kato\DropZone::widget([
            'options' => [
                'url' => '/protocol/upload/?department_id='.\Yii::$app->request->get('department_id'),
                'maxFilesize' => '10',
                'dictDefaultMessage' => 'Перетащите файлы в эту область'
            ],
            'clientEvents' => [
                'complete' => "function(file){
                
                console.log(file)
                }",
                'removedfile' => "function(file){alert(file.name + ' is removed')}"
            ],
        ]);
        echo '<input type="hidden" name="department_id" value="'.$model->id.'">'
        ?>
    </div>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'department_id',
            'create_at',
            //'update_at',
            //'user_id_create',
            //'user_id_update',
            //'active',
            //'send_user_id',
            [
                'class' => ActionColumn::className(),
                'buttons' => [
                    'update' => function ($url,$model, $key) {
                        return Html::a('<i class="fa-solid fa fa-edit"></i>',
                            $url, ['class' => 'btn btn-sm btn-warning']);
                    },
                    'view' => function ($url,$model, $key) {
                        return Html::a(
                            '<i class="fa-solid fa fa-eye"></i>',
                            $url, ['class' => 'btn btn-sm btn-success']);
                    },
                    'delete' => function ($url,$model, $key) {
                        return Html::a(
                            '<i class="fa fa-trash-alt"></i>',
                            $url,['class' => 'btn btn-sm btn-danger',
                            //'title' => Yii::t('app', 'Delete'),
                            'data-confirm' => Yii::t('yii', 'Удалить протокол № '.$key.'?'),
                            'data-method' => 'post', 'data-pjax' => '1',
                        ]);
                    },


                ],
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
