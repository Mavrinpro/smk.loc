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
    <!--        --><? //= Html::a('Create Protocol', ['create'], ['class' => 'btn btn-success']) ?>
    <!--    </p>-->
    <div class="mt-3 mb-4">
        <?php
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
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                'attribute' => 'id',
                'format' => 'raw',

                'value' => function ($files) {

                    foreach ($files as $file) {
                        //var_dump($files); die();

                        $url = 'files/protocol/'.$files->department_id.'/'.$files->name;
                        $path_parts = pathinfo($url);
                        $file = scandir('files/protocol/'.$files->department_id);

                        // $files2 = scandir($dir, 1);

                        //print_r($files1);
                        //print_r($files2);
                        //var_dump($files);
                        //$ras = explode('.', $file);

                        //$kb = filesize("files/".$file->name);
                        //echo $url.$file->name;
                        var_dump($path_parts);
                        //echo $url.$file->name;
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

                       return '<img src="'.$ind.'" width="40">';
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
            'department_id',
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
                        return '';
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
