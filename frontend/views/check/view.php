<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\CheckList $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Чек-листы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="check-list-view">

        <h1><?= Html::encode($this->title) ?></h1>
    <p>
<!--        --><?//= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
<!--        --><?//= Html::a('Delete', ['delete', 'id' => $model->id], [
//            'class' => 'btn btn-danger',
//            'data' => [
//                'confirm' => 'Are you sure you want to delete this item?',
//                'method' => 'post',
//            ],
//        ]) ?>
        <?= Html::a('<i class="fa fa-plus-circle"></i> Добавить критерии', ['check-list/create', 'check_id' =>
            \Yii::$app->request->get('id')],
            ['class' => 'btn 
        btn-success']) ?>
    </p>

    <!--    --><? //= DetailView::widget([
    //        'model' => $model,
    //        'attributes' => [
    //            'id',
    //            'name',
    //            'text1',
    //            'text2',
    //            'text3',
    //            'user_id',
    //            'service_id',
    //            'department_id',
    //            'create_at',
    //            'update_at',
    //            'user_id_create',
    //            'user_id_update',
    //            'active',
    //        ],
    //    ]) ?>

</div>
<div class="row">
    <div class="col-md-12">
        <?php if (sizeof($check) > 0): ?>
        <table class="mb-0 table table-hover table-warning table-bordered">
            <thead>
            <tr>
                <th>#</th>
                <th>Критерий</th>
                <th>Lasik</th>
                <th>Баллы</th>
                <th><?= $check[0]->phone1 ?></th>
                <th><?= $check[0]->phone2 ?></th>
                <th><?= $check[0]->phone3 ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($check as $items): ?>
                <tr>
                <?php if ($items->text2 != null): ?>
                    <td rowspan="2"><?php echo $items->id; ?></td>
                    <td rowspan="2"><?php echo $items->name; ?></td>
                    <td><?php echo $items->text1; ?></td>
                    <td class="editable score" data-id="<?= $items->id ?>" data-type="score1" data-model="<?=
                    $model->id
                    ?>"><?=
                        $items->score
                        ?></td>
                    <td class="editable" data-id="<?= $items->id ?>" data-type="num1" data-model="<?= $model->id
                    ?>"><?=
                        $items->phone1
                        ?></td>
                    <td class="editable" data-id="<?= $items->id ?>" data-type="num2" data-model="<?= $model->id
                    ?>"><?=
                        $items->phone2
                        ?></td>
                    <td class="editable" data-id="<?= $items->id ?>" data-type="num3" data-model="<?= $model->id
                    ?>"><?=
                        $items->phone3
                        ?></td>
                    <tr>
                        <td><?php echo $items->text2; ?></td>

                        <td class="editable score2" data-id="<?= $items->id ?>" data-type="score2" data-model="<?=
                        $model->id ?>"><?=
                            $items->score2
                            ?></td>
                        <td class="editable" data-id="<?= $items->id ?>" data-type="num4" data-model="<?= $model->id
                        ?>"><?=
                            $items->phone4
                            ?></td>
                        <td class="editable" data-id="<?= $items->id ?>" data-type="num5" data-model="<?= $model->id
                        ?>"><?=
                            $items->phone5
                            ?></td>
                        <td class="editable" data-id="<?= $items->id ?>" data-type="num6" data-model="<?= $model->id
                        ?>"><?=
                            $items->phone6
                            ?></td>
                    </tr>
                <?php else: ?>
                    <td><?php echo $items->id; ?></td>
                    <td><?php echo $items->name; ?></td>
                    <td><?php echo $items->text1; ?></td>
                    <td class="editable score" data-id="<?= $items->id ?>" data-type="score1" data-model="<?=
                    $model->id
                    ?>"><?=
                        $items->score
                        ?></td>
                    <td class="editable" data-id="<?= $items->id ?>" data-type="num1" data-model="<?= $model->id
                    ?>"><?=
                        $items->phone1
                        ?></td>
                    <td class="editable" data-id="<?= $items->id ?>" data-type="num2" data-model="<?= $model->id
                    ?>"><?=
                        $items->phone2
                        ?></td>
                    <td class="editable" data-id="<?= $items->id ?>" data-type="num3" data-model="<?= $model->id
                    ?>"><?=
                        $items->phone3
                        ?></td>
                <?php endif; ?>
                </tr>
            <?php endforeach; ?>
            <td colspan="3" class="font-weight-bold bg-dark text-light">Общее количество баллов</td>
            <td colspan="4" class="text-center font-weight-bold bg-dark text-light"
                id="score_count"><?= $countcheck ?></td>
            </tbody>
        </table>
        <?php else: ?>
        <p>Нет данных</p>
        <?php endif; ?>
    </div>

</div>


<?php
$js = <<<JS
  

$(function(){
    $('td.editable').each(function (){
        var th = $(this);
        $(this).editable('click', function (e){
             
            if (e.value == undefined){
                return false;
            }else{
             if ( e.value == ''){
                  e.value = null;
             }
            $.ajax({
            
            url: '/check-list/ajax-table',
            type: 'POST',
            data: {
                id: th.data('id'),
                score: th.data('type'),
                val: Number(e.value)
            },
            dataType: 'JSON',
            success: function(res){
                if (res.val != '' && res.val != '0' && res.val != 'NaN'){
                toastr.success('', 'Данные успешно сохранены!', {
                
                   timeOut: 5000,
                   closeButton: true,
                   progressBar: true
               });
                } else{
                    toastr.error('', 'Вы не указали значение!', {
                
                   timeOut: 5000,
                   closeButton: true,
                   progressBar: true
               });
                }
                setTimeout(function (){
                    $.ajax({
            
            url: '/check/ajax-count',
            type: 'POST',
            data: {
                id: th.data('id'),
                score: th.data('type'),
                val: e.value,
                modelid: th.data('model')
            },
            dataType: 'JSON',
            success: function(res){
                console.log(res);
                $('#score_count').text(res);
            },
            error: function(){
                //search_form_header.find('.result_search').html('').css('display', 'none');
                alert('Error!');
            }
        })
                },1500)
                 console.log(res);
            },
            error: function(){
                //search_form_header.find('.result_search').html('').css('display', 'none');
                alert('Error!');
            }
        })
            }

        })
    })
    
});


JS;

$this->registerJs($js);
?>
