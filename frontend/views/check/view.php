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
        <!--        --><? //= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <!--        --><? //= Html::a('Delete', ['delete', 'id' => $model->id], [
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

        <?= Html::a('<i class="fa fa-trash"></i> Очистить все оценки', ['check/clear-score', 'check_id' =>
            \Yii::$app->request->get('id')],
            ['class' => 'btn btn-danger', 'data' => [
                        'confirm' => 'Хотите очистить все?',
                        'method' => 'post',
                    ],
        ]) ?>
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

        <?php
        //var_dump($scoreUser);
        if (sizeof($user) > 0) { ?>
            <select name="user_check" id="user_check" class="mb-2 form-control">
                <option value="0" selected="selected">Выбрать сотрудника</option>
                <?php foreach ($user as $item) {
                    echo '<option value="' . $item->id . '">' . $item->username . '</option>>';
                } ?>
            </select>
        <?php } else {

            $js = <<<JS
  

Swal.fire({
title: 'Добавьте сотрудников в отдел и начните работу.',
confirmButtonColor: '#f44336',
icon: "warning",
type: 'warning',
 customClass: 'reeee',
}
);

JS;
            $this->registerJs($js);
        }
        ?>

        <?php if (sizeof($check) > 0): ?>
            <table class="mb-0 table table-hover table-warning table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Критерий</th>
                    <th>Lasik</th>
                    <th>Баллы</th>
                    <th class="phone_editable" data-model="<?= $model->id
                    ?>" data-type="num1"><?= $check[0]->phone1 ?></th>
                    <th class="phone_editable" data-model="<?= $model->id
                    ?>" data-type="num2"><?= $check[0]->phone2 ?></th>
                    <th class="phone_editable" data-model="<?= $model->id
                    ?>" data-type="num3"><?= $check[0]->phone3 ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($check as $items): ?>
                    <tr>
                    <?php if ($items->text2 != null): ?>
                        <td rowspan="2"><?= Html::a('<i class="fa fa-trash"></i>', ['/check/delete-checklist'],
                                ['class' => 'btn btn-danger btn-sm', 'data' => [
                                    'confirm' => 'Хотите удалить запись?',
                                    'method' => 'post',
                                    'params' => [
                                        'id' => $items->id,
                                        'department_id' => $model->department_id,
                                        'check' => $model->id,
                                    ]
                                ],
                                ]) ?></td>
                        <td rowspan="2"><?php echo $items->name; ?></td>
                        <td><?php echo $items->text1; ?></td>
                        <td class="editable score" data-id="<?= $items->id ?>" data-type="score1" data-model="<?=
                        $model->id
                        ?>"><?=
                            $items->score
                            ?></td>
                        <td class="editable" data-id="<?= $items->id ?>" data-type="num1" data-model="<?= $model->id
                        ?>"><?=
                            $items->score3
                            ?></td>
                        <td class="editable" data-id="<?= $items->id ?>" data-type="num2" data-model="<?= $model->id
                        ?>"><?=
                            $items->score4
                            ?></td>
                        <td class="editable" data-id="<?= $items->id ?>" data-type="num3" data-model="<?= $model->id
                        ?>"><?=
                            $items->score5
                            ?></td>
                        <tr>
                            <td><?php echo $items->text2; ?></td>

                            <td class="editable score2" data-id="<?= $items->id ?>" data-type="score2" data-model="<?=
                            $model->id ?>"><?=
                                $items->score2
                                ?></td>
                            <td class="editable" data-id="<?= $items->id ?>" data-type="num4" data-model="<?= $model->id
                            ?>"><?=
                                $items->score6
                                ?></td>
                            <td class="editable" data-id="<?= $items->id ?>" data-type="num5" data-model="<?= $model->id
                            ?>"><?=
                                $items->score7
                                ?></td>
                            <td class="editable" data-id="<?= $items->id ?>" data-type="num6" data-model="<?= $model->id
                            ?>"><?=
                                $items->score8
                                ?></td>
                        </tr>
                    <?php else: ?>
                        <td><?= Html::a('<i class="fa fa-trash"></i>', ['/check/delete-checklist'],
                                ['class' => 'btn btn-danger btn-sm', 'data' => [
                                    'confirm' => 'Хотите удалить запись?',
                                    'method' => 'post',
                                    'params' => [
                                        'id' => $items->id,
                                        'department_id' => $model->department_id,
                                        'check' => $model->id,
                                    ]
                                ],
                                ]) ?></td>
                        <td><?php echo $items->name; ?></td>
                        <td><?php echo $items->text1; ?></td>
                        <td class="editable score" data-id="<?= $items->id ?>" data-type="score1" data-model="<?=
                        $model->id
                        ?>"><?=
                            $items->score
                            ?></td>
                        <td class="editable" data-id="<?= $items->id ?>" data-type="num1" data-model="<?= $model->id
                        ?>"><?= $items->score3 ?></td>

                        <td class="editable" data-id="<?= $items->id ?>" data-type="num2" data-model="<?= $model->id
                        ?>"><?=
                            $items->score4
                            ?></td>
                        <td class="editable" data-id="<?= $items->id ?>" data-type="num3" data-model="<?= $model->id
                        ?>"><?= $items->score5 ?></td>
                    <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
                <td colspan="3" class="font-weight-bold bg-dark text-light">Общее количество баллов</td>
                <td class="text-center font-weight-bold bg-dark text-light"
                    id="score_count"><?= $countcheck['check'] ?></td>
                <td class="text-center font-weight-bold bg-dark text-light"
                    id="score_count1"><?= $countcheck['col1'] ?></td>
                <td class="text-center font-weight-bold bg-dark text-light"
                    id="score_count2"><?= $countcheck['col2'] ?></td>
                <td class="text-center font-weight-bold bg-dark text-light"
                    id="score_count3"><?= $countcheck['col3'] ?></td>
                <tr>
                    <td colspan="3" class="font-weight-bold bg-dark text-warning h5">Всего баллов</td>
                    <td colspan="4" class="text-center font-weight-bold bg-dark text-warning h5"
                        id="score_count4"><?= $countcheck['count'] ?></td>
                </tr>
                </tbody>
            </table>
        <?php else: ?>
            <p>Нет данных</p>
        <?php endif; ?>
    </div>
    <div class="col-md-12 mt-3">
        <h3>По завершении отправьте данные по выбранному сотруднику в базу</h3>
        <!--    --><? //= Html::button('<i class="fa fa-paper-plane"></i> Отправить данные', ['', 'check_id' =>
        //        \Yii::$app->request->get('id')], ['class' => 'btn btn-dark btn-lg mb-5', 'id' => 'send_user_data']) ?>
        <button type="button" class="btn btn-dark btn-lg mb-5" id="send_user_data" data-model="<?= $model->id ?>"><i
                    class="fa
        fa-paper-plane"></i>
            Отправить
            данные
        </button>
    </div>
    <div class="col-md-12">
        <div id="user-data-backend">
            <table class="mb-0 table table-bordered" id="tabledata">
                <thead>
                <tr>
                    <th>Дата</th>
                    <th>Сотрудник</th>
                    <th>Баллы</th>
                    <th style="width: 30px">Удалить</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($scoreall as $score) { ?>
                    <tr>
                        <th scope="row"><?= date('d.m.Y', $score->create_at) ?></th>
                        <td><?= $score->user->username ?></td>
                        <td><?= $score->score ?></td>
                        <td><?= Html::a('<i class="fa fa-trash"></i>', ['check/delete-user-score', 'id' =>
                                $score->id, 'check_id' => $model->id, 'department_id' => $model->department_id],
                                ['class' => 'btn btn-danger btn-sm', 'data' => [
                                    'confirm' => 'Хотите удалить запись?',
                                    'method' => 'post',
                                    'params' => [
                                            'department_id' => $model->department_id
                                    ]
                                ],
                                ]) ?></td>
                    </tr>
                <?php } ?>

                <span></span>
                </tbody>
            </table>
        </div>
    </div>
</div>


<?php
$js = <<<JS
  
var loading = '<div class="blockUI blockOverlay" style="display: none; border: none; margin: 0px; padding: 0px;'+ 
'width: 100%; height: 100%; top: 0px; left: 0px; position: absolute;">'+
'<div class="blockUI undefined blockElement" style="position: absolute;"><div class="loader mx-auto">'+
'<div class="line-scale-pulse-out"><div class="bg-success"></div><div class="bg-success"></div><div '+
'class="bg-success"></div>'+
'<div class="bg-success"></div><div class="bg-success"></div></div></div></div></div>';
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
                console.log($('#user_check').val());
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
                //console.log(res);
                $('#score_count').text(Number(res.check1) + Number(res.check2));
                $('#score_count1').text(res.col1);
                $('#score_count2').text(res.col2);
                $('#score_count3').text(res.col3);
                $('#score_count4').text(res.count);
            },
            error: function(){
                //search_form_header.find('.result_search').html('').css('display', 'none');
                alert('Error!');
            }
        })
                },1500)
                 //console.log(res);
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
// Изменить телефон
$('th.phone_editable').each(function (){
    var th = $(this);
    $(this).editable('click', function (e){
             
            if (e.value == undefined){
                return false;
            }else{
             if ( e.value == ''){
                  e.value = null;
             }
            $.ajax({
            
            url: '/check-list/ajax-change-phone',
            type: 'POST',
            data: {
                id: th.data('model'),
                score: th.data('type'),
                val: Number(e.value)
            },
            dataType: 'JSON',
            success: function(res){
                console.log(res);
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
                
            },
            error: function(){
                alert('Error!');
            }
        })
            }

        })
});

// selected

(function(){
    var select = document.querySelector('#user_check');
    if (localStorage.selectedIndex !== undefined) {
        select.selectedIndex = localStorage.selectedIndex;
    }
    select.onchange = function() {
        localStorage.selectedIndex = this.selectedIndex;
    }
})()

// send user data
$('#send_user_data').on('click', function (){
    $('#tabledata').append(loading);
    var userId = $('#user_check').val();
    var score_count = $('#score_count4').text();
    var modelId = $(this).data('model');
    if (userId == 0 || userId == ''){
       Swal.fire({
title: 'Сотрудник не выбран.',
confirmButtonColor: '#f44336',
icon: "warning",
type: 'warning',
 customClass: 'reeee',
});
       $('.blockUI').remove();
       return false;
    }
    if (score_count == 0){
         Swal.fire({
title: 'Сначала оцените сотрудника.',
confirmButtonColor: '#f44336',
icon: "warning",
type: 'warning',
 customClass: 'reeee',
});
         $('.blockUI').remove();
       return false;
    }
    
    $(this).find('.fa').removeClass('fa-paper-plane');
    $(this).find('.fa').addClass('spinner-grow spinner-grow-sm');
    $.ajax({
            
            url: '/check-list/send-user-data',
            type: 'POST',
            data: {
                userid: userId,
                score_count: score_count,
                model: modelId
            },
            dataType: 'JSON',
            success: function(res){
                 $('.blockUI').remove();
                if (res.post == '2'){
                    $('.blockUI').remove();
                    Swal.fire({
                    title: '<span class="text-danger">Данные по этому пользователю за этот период уже есть.</span>',
                    confirmButtonColor: '#d92550',
                    icon: "warning",
                    type: 'error',
                    showConfirmButton: true,
                    customClass: 'reeee p-3',
                    showCloseButton: true,
      
                 
                });
                    $('#send_user_data').find('.fa').removeClass('spinner-grow spinner-grow-sm');
                $('#send_user_data').find('.fa').addClass('fa-paper-plane');
                    return false;
                }
                $('#tabledata').find('tbody').append(res.html);
                $('#send_user_data').find('.fa').removeClass('spinner-grow spinner-grow-sm');
                $('#send_user_data').find('.fa').addClass('fa-paper-plane');
                console.log(res);
                if (res.userid != '' && res.userid != '0' && res.userid != 'NaN'){
                toastr.success('', 'Данные успешно сохранены! '+res.post.score_count, {
                
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
                
            },
            error: function(){
                $('#send_user_data').find('.fa').removeClass('spinner-grow spinner-grow-sm');
                $('#send_user_data').find('.fa').addClass('fa-paper-plane');
                 Swal.fire({
                    title: 'Что-то пошло не так. Обратитесь к администратору.',
                    confirmButtonColor: '#f44336',
                    icon: "warning",
                    type: 'warning',
                    customClass: 'reeee',
                });
            }
        })
        return false;
});

JS;

$this->registerJs($js);
?>
