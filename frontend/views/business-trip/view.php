<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\BusinessTrip $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'График командировок', 'url' => ['/business-trip?department_id='
    .$model->department_id]];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
    <div class="business-trip-view">

        <h1><?= Html::encode($this->title) ?></h1>

        <p>
            <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('<i class="fa fa-trash"></i>', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                    'params' => [
                            'department_id' => $model->department_id
                    ]
                ],
            ]) ?>
        </p>

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'doctor.fio',
                //'department_id',
                [
                    'attribute' => 'department.name',
                    'label' => 'Отдел',
                    'format' => 'html',
                    'value' => function ($model) {
                        return '<span class="badge badge-warning">'.$model->department->name.'</span>';
                    },
                ],
                [
                    'attribute' => 'branch.name',
                    'label' => 'Куда отправлен',
                    'format' => 'html',
                    'value' => function ($model) {
                        return '<span class="badge badge-info">'.$model->branch->name.'</span>';
                    },
                ],
                'user.username',
                //'check_id',
                [
                    'attribute' => 'create_at',
                    'format' => 'html',
                    'value' => function ($model) {
                        return date('d.m.Y', $model->create_at);
                    },
                ],

                [
                    'attribute' => 'update_at',
                    'value' => function ($model) {
                        if ($model->update_at != null) {
                            return date('d.m.Y', $model->update_at);
                        } else {
                            return 'Не обновлялось';
                        }

                    },
                ],
                [
                    'attribute' => 'start_trip',
                    'value' => function ($model) {
                        $dt = $model->start_trip;
                        $formatter = new IntlDateFormatter(
                            'ru_RU',
                            IntlDateFormatter::LONG,
                            IntlDateFormatter::LONG
                        );
                        $formatter->setPattern('d MMMM yyyy');
                        return $formatter->format($dt);

                    },
                ],

                [
                    'attribute' => 'end_trip',
                    'value' => function ($model) {
                        $dt = $model->end_trip;
                        $formatter = new IntlDateFormatter(
                            'ru_RU',
                            IntlDateFormatter::LONG,
                            IntlDateFormatter::LONG
                        );
                        $formatter->setPattern('d MMMM yyyy');
                        return $formatter->format($dt);
                    },
                ],

                [
                    'attribute' => 'date_of_departure',
                    'value' => function ($model) {
                        $dt = $model->date_of_departure;
                        $formatter = new IntlDateFormatter(
                            'ru_RU',
                            IntlDateFormatter::LONG,
                            IntlDateFormatter::LONG
                        );
                        $formatter->setPattern('d MMMM yyyy');
                        return $formatter->format($dt);
                    },
                ],

                [
                    'attribute' => 'return_date',
                    'value' => function ($model) {
                        $dt = $model->return_date;
                        $formatter = new IntlDateFormatter(
                            'ru_RU',
                            IntlDateFormatter::LONG,
                            IntlDateFormatter::LONG
                        );
                        $formatter->setPattern('d MMMM yyyy');
                        return $formatter->format($dt);
                    },
                ],

            ],
        ]) ?>


        <a href="##" id="all_box" class="btn btn-sm btn-success">Отметить все</a> <a href="##" id="all_box_no" class="btn btn-sm
                                                                              btn-warning">Снять</a><br><br>

        <?php $form = ActiveForm::begin([
            'action' => '/business-trip/send-trip',
            'id' => 'controls',

        ]); ?>
        <?php
        //var_dump($model);
        $items = \common\models\User::find()->where(['status' => 10])
            ->select(['username'])
            ->indexBy('id')
            ->column();

        echo $form->field($noty, 'user_id[]')
            ->checkboxList($items, ['itemOptions' => [
                'labelOptions' => [
                    //'style' => 'font-weight: normal',
                    'class' => 'badge badge-dark',
                ],
            ],]);
        echo $form->field($noty, 'model_id')
            ->hiddenInput(['value' => $model->id])->label(false);
        echo $form->field($noty, 'doctor_id')
            ->hiddenInput(['value' => $model->doctor_id])->label(false);

        ?>
        <div class="form-group">
            <?= Html::submitButton('Известить', ['class' => 'btn btn-success']) ?>
        </div>
        <?php ActiveForm::end(); ?>

    </div>

<?php


$js = <<< JS
$('#all_box').click(function(){
	
		$('#controls input:checkbox').prop('checked', true);
	
});

$('#all_box_no').click(function(){
	
		$('#controls input:checkbox').prop('checked', false);
	
});

JS;
$this->registerJs($js);