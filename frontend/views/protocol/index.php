<?php

use app\models\Protocol;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap4\Modal;
use yii\bootstrap4\ActiveForm;
use yii\helpers\FileHelper;

/** @var yii\web\View $this */
/** @var app\models\ProtocolSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Протоколы инцидентов';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="protocol-index">

    <h1><?= Html::encode($this->title) ?><?= $model->name ?></h1>

    <!--    <p>-->
    <!--        --><? //= Html::a('Create Protocol', ['create'], ['class' => 'btn btn-success']) ?>
    <!--    </p>-->
    <div class="mt-3 mb-4">
        <?php
        //$files = FileHelper::changeOwnership('files/protocol/5/Safetov.png', 14, null );
        // rename('/files/protocol/5/Safetov.png', '/files/protocol/14/Safetov.png');
        //print_r($files);

        //$sourcePath = 'files/protocol/5/Safetov.png';
        //$destinationPath = 'files/protocol/14/Safetov.png';

        //rename($sourcePath, $destinationPath);
        //FileHelper::move($sourcePath, $destinationPath);
        echo \kato\DropZone::widget([
            'options' => [
                'url' => '/protocol/upload/?department_id=' . \Yii::$app->request->get('department_id'),
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
        echo '<input type="hidden" name="department_id" value="' . $model->id . '">'
        ?>
    </div>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                'label' => 'Передать',
                'format' => 'raw',
                'value' => function ($model) {
                    return Html::a('Передать', ['/protocol/change-department/', 'id' => $model->id]
                    );
                }
            ],
            [
                'attribute' => 'id',
                'label' => 'Файл',
                'format' => 'raw',
                'filter' => false,
                'value' => function ($files) {

                    foreach ($files as $file) {
                        //var_dump($files); die();

                        $url = 'files/protocol/' . $files->department_id . '/' . $files->name;
                        $path_parts = pathinfo($url);
                        $file = scandir('files/protocol/' . $files->department_id);

                        switch ($path_parts['extension']) {
                            case 'xlsx':
                                $ind = '/img/icon_xlsx.png';
                                break;
                            case 'xls':
                                $ind = '/img/icon_xls.png';
                                break;
                            case 'txt':
                                $ind = '/img/icon_txt.png';
                                break;
                            case 'zip':
                                $ind = '/img/icon_zip.png';
                                break;
                            case 'json':
                                $ind = '/img/icon_js.png';
                                break;
                            case 'csv':
                                $ind = '/img/icon_csv.png';
                                break;
                            case 'docx':
                                $ind = '/img/icon_doc.png';
                                break;
                            case 'pdf':
                                $ind = '/img/icon_pdf.png';
                                break;
                            case 'png':
                                $ind = '/img/icon_png.png';
                                break;
                            case 'jpeg':
                                $ind = '/img/icon_jpg.png';
                                break;
                            case 'html':
                                $ind = '/img/icon_html.png';
                                break;
                            case 'psd':
                                $ind = '/img/icon_psd.png';
                                break;
                            case 'jpg':
                                $ind = '/img/icon_jpg.png';
                                break;
                            case 'MP4':
                                $ind = '/img/icon_mp4.png';
                                break;
                            case 'JPG':
                                $ind = '/img/icon_jpg.png';
                                break;
                            default:
                                $ind = '/img/icon_file.png';
                        }

                        return '<img src="' . $ind . '" width="40">';
                    }
                }

            ],
            [
                'attribute' => 'name',
                'format' => 'raw',

                'value' => function ($model) {
                    return Html::a(
                        $model->name,
                        '/files/protocol/' . $model->department_id . '/' . $model->name, ['target' => '_blank', 'data-pjax' => "0"]);
                }

            ],
            //'department_id',
            [
                'attribute' => 'create_at',
                'format' => 'html',

                'value' => function ($model) {
                    return date('d.m.Y H:i:s', $model->create_at);
                }

            ],
            //'update_at',
            //'user_id_create',
            //'user_id_update',
            //'active',
            //'send_user_id',
            [
                'class' => ActionColumn::className(),
                'template' => '{view} {update} {delete} {change-department}',
                'visibleButtons' => [

                    'delete' => function ($model) {
                        return \Yii::$app->user->can('admin', ['post' => $model]);
                    },
                    'delete' => function ($model) {
                        return \Yii::$app->user->can('superadmin', ['post' => $model]);
                    },
                    'update' => function ($model) {
                        return '';
                    },
                    'view' => function ($model) {
                        return \Yii::$app->user->can('create_admin', ['post' => $model]);
                    },
                ],
                'buttons' => [
                    'update' => function ($url, $model, $key) {
                        return Html::a('<i class="fa-solid fa fa-edit"></i>',
                            $url, ['class' => 'btn btn-sm btn-warning']);
                    },
                    'view' => function ($url, $model, $key) {
                        return Html::a(
                            '<i class="fa-solid fa fa-eye"></i>',
                            $url, ['class' => 'btn btn-sm btn-success']);
                    },
                    'change-department' => function ($url, $model, $key) {     // render your custom button
                        return Html::a(
                            ' <i class="fa fa-share"></i>',
                            $url, ['class' => 'btn ml-2 btn-sm btn-success']);
                    },
                    'delete' => function ($url, $model, $key) {
                        return Html::a(
                            '<i class="fa fa-trash-alt"></i>',
                            $url, ['class' => 'btn btn-sm btn-danger',
                            //'title' => Yii::t('app', 'Delete'),
                            'data-confirm' => Yii::t('yii', 'Удалить протокол № ' . $key . '?'),
                            'data-method' => 'post', 'data-pjax' => '1',
                        ]);
                    },


                ],
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
