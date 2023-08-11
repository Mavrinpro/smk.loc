<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Sop $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'СОПы', 'url' => ['index?department_id='.$model->department_id]];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="protocol-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <!--        --><?//= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('<i class="fa fa-trash"></i>', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>

        <?= Html::a('Скачать <i class="fa fa-download"></i>', ['files/sop/'.$model->department_id.'/'.$model->name, ],
            ['class' => 'btn 
        btn-warning']) ?>
    </p>
    <?php //var_dump($model->Brancher($model->department->branch_id)); ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'name',
            //'department.name',
            [
                'attribute' => 'department_id',
                'label' => 'Отдел',
                'value' => function ($model) {
                    return $model->department->name . ' (' .$model->Brancher($model->department->branch_id)->name. ')';
                },
            ],
            //'create_at',
            [
                'attribute' => 'create_at',
                'label' => 'Дата создания',
                'value' => function ($model) {
                    return date('d.m.Y H:i:s', $model->create_at);
                },
            ],
            //'update_at',
            //'user.fio',
            [
                'attribute' => 'user_id_create',
                'label' => 'Кто создал',
                'value' => function($model)
                {
                    if (!empty($model->user->fio))
                    {
                        return $model->user->fio;
                    }else{
                        $model->user->username;
                    }
                },
            ],
            //'user_id_update',
            //'active',
            [
                'attribute' => 'active',
                'format' => 'html',
                'value' => function ($model) {
                    if ($model->active == 1)
                    {
                        return '<span class="text-success">Активный</span>';
                    }else{
                        return 'В архиве';
                    }

                },
            ],
//            [
//                'attribute' => 'send_user_id',
//                //'label' => 'Кто создал',
//                'value' => function($model)
//                {
//                    if (!empty($model->usersend->fio))
//                    {
//                        return $model->usersend->fio;
//                    }else{
//                        $model->usersend->username;
//                    }
//                },
//            ],
        ],
    ]) ?>

</div>
