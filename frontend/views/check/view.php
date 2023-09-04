<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
/** @var yii\web\View $this */
/** @var app\models\CheckList $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Чек-листы', 'url' => ['index?department_id=' . $model->department_id]];
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
        btn-success']);
        if ($model->department_id == 4) { ?>
            <?= Html::a('<i class="fa fa-plus-circle"></i> Добавить критерии Да/Нет', ['check-list-medical/create', 'check_id' =>
                \Yii::$app->request->get('id'), 'department_id' => \Yii::$app->request->get('department_id')],
                ['class' => 'btn 
        btn-outline-warning']) ?>
        <?php } ?>


        <?= Html::a('<i class="fa fa-trash"></i> Очистить все оценки', ['check/clear-score', 'check_id' =>
            \Yii::$app->request->get('id'), 'department_id' => \Yii::$app->request->get('department_id')],
            ['class' => 'btn btn-danger', 'data' => [
                'confirm' => 'Хотите очистить все?',
                'method' => 'post',
            ],
            ]) ?>

        <?= Html::a('<i class="fa fa-edit"></i>', ['update', 'id' => $model->id],
            ['class' => 'btn 
        btn-primary', 'data' => [

                'method' => 'post',
                'params' => [
                    'id' => $model->id,
                    'department_id' => $model->department_id,
                    'check' => $model->id,
                ]
            ],]) ?>

        <?= Html::a('<i class="fa fa-trash"></i>', ['check/delete-check', 'check_id' =>
            \Yii::$app->request->get('id'), 'department_id' => \Yii::$app->request->get('department_id')],
            ['class' => 'btn btn-outline-danger', 'data' => [
                'confirm' => 'Хотите удалить чек-лист?',
                'method' => 'post',
                'params' => [
                        'department_id' => $model->department_id,
                        'id' => $model->id,
                    'listmedical' => sizeof($checklistMedical),
                    'list' => sizeof($check)

                ]
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
        //var_dump($user);
        if (sizeof($user) > 0) { ?>
            <select name="user_check" id="user_check" class="mb-2 form-control">
                <option value="0" selected="selected">Выбрать сотрудника</option>
                <?php foreach ($user as $item) {
                    echo '<option value="' . $item->id . '">' . $item->fio . '</option>>';
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
                    <th>Критерий</th>
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
        <button type="button" class="btn btn-dark btn-lg mb-5" id="send_user_data" data-model="<?= $model->id ?>"
                data-user_create_id="<?= \Yii::$app->user->getId() ?>" data-title="<?= $model->name ?>"><i
                    class="fa
        fa-paper-plane"></i>
            Отправить
            данные
        </button>
        <?= Html::a('<i class="fa fa-download"></i>', ['export-excel', 'id' => $model->id],
            ['class' => 'btn 
        btn-primary mb-5', 'data' => [

                'method' => 'post',
                'params' => [
                    'id' => $model->id,
                    'department_id' => $model->department_id,
                    'check' => $model->id,
                ]
            ],]) ?>
    </div>
    <div class="col-md-12">
        <div id="user-data-backend">

            <?php if (sizeof($checklistMedical) > 0) { ?>
                <table class="table table-bordered table-hover">
                    <thead class="bg-dark text-light">
                    <tr>

                        <th>#</th>
                        <th>Критерий</th>
                        <th><span class="text-success">Да</span></th>
                        <th><span class="text-warning">Нет</span></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php

                    foreach ($checklistMedical as $itemq) {


                        ?>
                        <tr>
                            <td><?= Html::a('<i class="fa fa-trash"></i>', ['check-list-medical/delete', 'id' =>
                                    $itemq->id, 'department_id' => \Yii::$app->request->get('department_id')],
                                    ['class' => 'btn btn-outline-danger btn-sm', 'data' => [
                                        'confirm' => 'Хотите удалить критерий?',
                                        'method' => 'post',
                                        'params' => [
                                            'department_id' => \Yii::$app->request->get('department_id'),
                                            'id' => $itemq->id,
                                            'check_id' => $model->id
                                        ]
                                    ],
                                    ]) ?></td>
                            <td class="w-100"><?= $itemq->name ?></td>

                            <td>
                                <div class="custom-checkbox custom-control">
                                    <?php if ($itemq->active === 1): ?>
                                        <input type="checkbox" id="checkbox_right-<?= $itemq->id ?>"
                                               data-id="<?= $itemq->id
                                               ?>" class="custom-control-input" data-user_id="<?= $user->id ?>"
                                               data-test_id="<?= \Yii::$app->request->get('id') ?>"
                                               data-res="<?= \Yii::$app->request->get('res') ?>" checked>
                                    <?php else: ?>
                                        <input type="checkbox" id="checkbox_right-<?= $itemq->id ?>"
                                               data-id="<?= $itemq->id
                                               ?>" class="custom-control-input" data-user_id="<?= $user->id ?>"
                                               data-test_id="<?= \Yii::$app->request->get('id') ?>"
                                               data-res="<?= \Yii::$app->request->get('res') ?>">
                                    <?php endif; ?>
                                    <label class="custom-control-label"
                                           for="checkbox_right-<?= $itemq->id ?>">&nbsp;</label>
                                </div>
                            </td>
                            <td>
                                <div class="custom-checkbox custom-control">
                                    <?php if ($itemq->active === 0): ?>
                                        <input type="checkbox" id="checkbox_left-<?= $itemq->id ?>"
                                               data-id="<?= $itemq->id
                                               ?>" class="custom-control-input" data-user_id="<?= $user->id ?>"
                                               data-test_id="<?= \Yii::$app->request->get('id') ?>"
                                               data-res="<?= \Yii::$app->request->get('res') ?>" checked>
                                    <?php else: ?>
                                        <input type="checkbox" id="checkbox_left-<?= $itemq->id ?>"
                                               data-id="<?= $itemq->id
                                               ?>" class="custom-control-input" data-user_id="<?= $user->id ?>"
                                               data-test_id="<?= \Yii::$app->request->get('id') ?>"
                                               data-res="<?= \Yii::$app->request->get('res') ?>">
                                    <?php endif; ?>
                                    <label class="custom-control-label"
                                           for="checkbox_left-<?= $itemq->id ?>">&nbsp;</label>
                                </div>
                            </td>

                        </tr>

                    <?php } ?>

                    </tbody>
                </table>
                <div class="alert alert-success">Результат: <b><span id="result_count"><?= $countResult; ?>%</span></b>
                </div>
            <? } else { ?>
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
                    <?php

                    foreach ($scoreall as $score) { ?>
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
            <?php } ?>
            <?php if (sizeof($comment) > 0) { ?>
                <?php foreach ($comment as $comments) { ?>
                    <div class="chat-box-wrapper">
                        <div>
                            <div class="avatar-icon-wrapper mr-1">
                                <div class="badge badge-bottom btn-shine badge-success badge-dot badge-dot-lg">
                                </div>
                                <div class="avatar-icon avatar-icon-lg rounded">
                                    <?php if ($commentCheck->userCommentAvatar
                                        ($comments->user_id)
                                            ->avatar != null) {?>
                                    <img src="/files/avatar/<?php echo $comments->user_id ?>/<?php echo
                                    $commentCheck->userCommentAvatar
                                        ($comments->user_id)
                                        ->avatar;
                                    ?>" alt="">
                        <?php }else{ ?>
                                        <img src="/img/ava.jpg" alt="">
                                    <?php }?>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="chat-box"><?= $comments->text ?>
                            </div>
                            <small class="opacity-6">
                                <i class="fa fa-calendar-alt mr-1"></i>
                                <?= date('d.m.Y H:i:s', $comments->create_at) ?> | <?= Html::a('<i class="fa fa-trash text-danger"></i>', ['check/delete-comment-check'],
                                    [ 'data' => [
                                        'confirm' => 'Хотите удалить запись?',
                                        'method' => 'post',
                                        'params' => [
                                            'department_id' => $model->department_id,
                                            'check_id' => $model->id,
                                            'comment_id' => $comments->id
                                        ]
                                    ],
                                    ]) ?>
                            </small>
                        </div>
                    </div>
                <?php } ?>

            <?php } ?>
            <div class="comment_check mt-3">
                <?php $formComment = \yii\bootstrap4\ActiveForm::begin(['class' => 'mt-5']) ?>
                <?= $formComment->field($commentCheck, 'text')->textarea(['maxlength' => true]) ?>
                <?= $formComment->field($commentCheck, 'department_id')->hiddenInput(['value' => $model->department_id])
                    ->label
                    (false) ?>
                <?= $formComment->field($commentCheck, 'user_id')->hiddenInput(['value' => \Yii::$app->getUser()->id])
                    ->label
                    (false) ?>
                <?= $formComment->field($commentCheck, 'check_id')->hiddenInput(['value' => $model->id])
                    ->label
                    (false) ?>
                <?= $formComment->field($commentCheck, 'create_at')->hiddenInput(['value' => time()])
                    ->label
                    (false) ?>
                <?= $formComment->field($commentCheck, 'active')->hiddenInput(['value' => true])
                    ->label
                    (false) ?>
                <div class="form-group">
                    <?= Html::submitButton('Добавить комментарий', ['class' => 'btn btn-success']) ?>
                </div>
                <?php \yii\bootstrap4\ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>

<?php
$js = <<<JS
  
// var loading = '<div class="blockUI blockOverlay" style="display: none; border: none; margin: 0px; padding: 0px;'+ 
// 'width: 100%; height: 100%; top: 0px; left: 0px; position: absolute;">'+
// '<div class="blockUI undefined blockElement" style="position: absolute;"><div class="loader mx-auto">'+
// '<div class="line-scale-pulse-out"><div class="bg-success"></div><div class="bg-success"></div><div '+
// 'class="bg-success"></div>'+
// '<div class="bg-success"></div><div class="bg-success"></div></div></div></div></div>';
$(function(){
    
    $('[id^="checkbox_right"]').change(function (event){
        //console.log('event');
    var id = $(this).data('id');
    var num = null;
    var user_id = $(this).data('user_id');
    var test_id = $(this).data('test_id');
    var res = $(this).data('res');
    
    if ($(this).is(':checked')){
        $("#checkbox_left-"+id).prop('checked', false);
	num = 1;
} else {
	num = null;
    $("#checkbox_left-"+id).prop('checked', false);
}
    $.ajax({
            
            url: '/check-list-medical/checkbox-right',
            type: 'POST',
            data: {
                id: id,
                num: num,
                user_id: user_id,
                test_id: test_id,
                res: res,
                //val: Number(e.value)
            },
            dataType: 'JSON',
            success: function(res){
                console.log(res);
                $('#result_count').html('<b>'+res+"%</b>");
                               
            },
            error: function(){
                console.log('Error!');
                
            }
        })
})
    
    
    //===============================================
$('[id^="checkbox_left"]').click(function (){
    var id = $(this).data('id')
     var num = null;
    var res = $(this).data('res');
  
   var user_id = $(this).data('user_id');
    var test_id = $(this).data('test_id');
    if ($(this).is(':checked')){
         $("#checkbox_right-"+id).prop('checked', false);
         //console.log($("#checkbox_right"+id));
        
	num = 1;
} else {
          //$("#checkbox_right-"+id).prop('checked', false);
	num = null;
}
    
    $.ajax({
            
            url: '/check-list-medical/checkbox-left',
            type: 'POST',
            data: {
                id: id,
                num: num,
                user_id: user_id,
                test_id: test_id,
                res: res,
            },
            dataType: 'JSON',
            success: function(res){
                console.log(res);
                  $('#result_count').html('<b>'+res+"%</b>");             
            },
            error: function(){
                console.log('Error!');
            }
        })
})
    
//    $('td.editable').each(function (){
//        var th = $(this);
//        $(this).editable('click', function (e){
//             
//            if (e.value == undefined){
//                return false;
//            }else{
//             if ( e.value == ''){
//                  e.value = null;
//             }
//            $.ajax({
//            
//            url: '/check-list/ajax-table',
//            type: 'POST',
//            data: {
//                id: th.data('id'),
//                score: th.data('type'),
//                val: Number(e.value)
//            },
//            dataType: 'JSON',
//            success: function(res){
//                console.log($('#user_check').val());
//                if (res.val != '' && res.val != '0' && res.val != 'NaN'){
//                toastr.success('', 'Данные успешно сохранены!', {
//                
//                   timeOut: 5000,
//                   closeButton: true,
//                   progressBar: true
//               });
//                } else{
//                    toastr.error('', 'Вы не указали значение!', {
//                
//                   timeOut: 5000,
//                   closeButton: true,
//                   progressBar: true
//               });
//                }
//                setTimeout(function (){
//                    $.ajax({
//            
//            url: '/check/ajax-count',
//            type: 'POST',
//            data: {
//                id: th.data('id'),
//                score: th.data('type'),
//                val: e.value,
//                modelid: th.data('model')
//            },
//            dataType: 'JSON',
//            success: function(res){
//                //console.log(res);
//                $('#score_count').text(Number(res.check1) + Number(res.check2));
//                $('#score_count1').text(res.col1);
//                $('#score_count2').text(res.col2);
//                $('#score_count3').text(res.col3);
//                $('#score_count4').text(res.count);
//            },
//            error: function(){
//                //search_form_header.find('.result_search').html('').css('display', 'none');
//                alert('Error!');
//            }
//        })
//                },1500)
//                 //console.log(res);
//            },
//            error: function(){
//                //search_form_header.find('.result_search').html('').css('display', 'none');
//                alert('Error!');
//            }
//        })
//            }
//
//        })
//    })
    
});
// Изменить телефон
// $('th.phone_editable').each(function (){
//     var th = $(this);
//     $(this).editable('click', function (e){
//             
//             if (e.value == undefined){
//                 return false;
//             }else{
//              if ( e.value == ''){
//                   e.value = null;
//              }
//             $.ajax({
//            
//             url: '/check-list/ajax-change-phone',
//             type: 'POST',
//             data: {
//                 id: th.data('model'),
//                 score: th.data('type'),
//                 val: Number(e.value)
//             },
//             dataType: 'JSON',
//             success: function(res){
//                 console.log(res);
//                 if (res.val != '' && res.val != '0' && res.val != 'NaN'){
//                 toastr.success('', 'Данные успешно сохранены!', {
//                
//                    timeOut: 5000,
//                    closeButton: true,
//                    progressBar: true
//                });
//                 } else{
//                     toastr.error('', 'Вы не указали значение!', {
//                
//                    timeOut: 5000,
//                    closeButton: true,
//                    progressBar: true
//                });
//                 }
//                
//             },
//             error: function(){
//                 alert('Error!');
//             }
//         })
//             }
//
//         })
// });

// selected

// (function(){
//     var select = document.querySelector('#user_check');
//     if (localStorage.selectedIndex !== undefined) {
//         select.selectedIndex = localStorage.selectedIndex;
//     }
//     select.onchange = function() {
//         localStorage.selectedIndex = this.selectedIndex;
//     }
// })()

// send user data
//$('#send_user_data').on('click', function (){
//    $('#tabledata').append(loading);
//    var userId = $('#user_check').val();
//    var score_count = $('#score_count4').text();
//    var modelId = $(this).data('model');
//    var user_create_id = $(this).data('user_create_id');
//    var title = $(this).data('title');
//    if (userId == 0 || userId == ''){
//       Swal.fire({
//title: 'Сотрудник не выбран.',
//confirmButtonColor: '#f44336',
//icon: "warning",
//type: 'warning',
// customClass: 'reeee',
//});
//       $('.blockUI').remove();
//       return false;
//    }
//    if (score_count == 0){
//         Swal.fire({
//title: 'Сначала оцените сотрудника.',
//confirmButtonColor: '#f44336',
//icon: "warning",
//type: 'warning',
// customClass: 'reeee',
//});
//         $('.blockUI').remove();
//       return false;
//    }
//    
//    $(this).find('.fa').removeClass('fa-paper-plane');
//    $(this).find('.fa').addClass('spinner-grow spinner-grow-sm');
//    $.ajax({
//            
//            url: '/check-list/send-user-data',
//            type: 'POST',
//            data: {
//                userid: userId,
//                score_count: score_count,
//                model: modelId,
//                user_create_id: user_create_id,
//                title: title
//            },
//            dataType: 'JSON',
//            success: function(res){
//                 $('.blockUI').remove();
//                if (res.post == '2'){
//                    $('.blockUI').remove();
//                    Swal.fire({
//                    title: '<span class="text-danger">Данные по этому пользователю за этот период уже есть.</span>',
//                    confirmButtonColor: '#d92550',
//                    icon: "warning",
//                    type: 'error',
//                    showConfirmButton: true,
//                    customClass: 'reeee p-3',
//                    showCloseButton: true,
//      
//                 
//                });
//                    $('#send_user_data').find('.fa').removeClass('spinner-grow spinner-grow-sm');
//                $('#send_user_data').find('.fa').addClass('fa-paper-plane');
//                    return false;
//                }
//                $('#tabledata').find('tbody').append(res.html);
//                $('#send_user_data').find('.fa').removeClass('spinner-grow spinner-grow-sm');
//                $('#send_user_data').find('.fa').addClass('fa-paper-plane');
//                console.log(res);
//                if (res.userid != '' && res.userid != '0' && res.userid != 'NaN'){
//                toastr.success('', 'Данные успешно сохранены! '+res.post.score_count, {
//                
//                   timeOut: 5000,
//                   closeButton: true,
//                   progressBar: true
//               });
//                } else{
//                    toastr.error('', 'Вы не указали значение!', {
//                    timeOut: 5000,
//                    closeButton: true,
//                    progressBar: true
//               });
//                }
//                
//            },
//            error: function(){
//                $('#send_user_data').find('.fa').removeClass('spinner-grow spinner-grow-sm');
//                $('#send_user_data').find('.fa').addClass('fa-paper-plane');
//                 Swal.fire({
//                    title: 'Что-то пошло не так. Обратитесь к администратору.',
//                    confirmButtonColor: '#f44336',
//                    icon: "warning",
//                    type: 'warning',
//                    customClass: 'reeee',
//                });
//            }
//        })
//        return false;
//});

JS;

$this->registerJs($js);
?>
