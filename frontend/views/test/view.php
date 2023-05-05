<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Test $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Тесты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="test-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('<i class="fas fa-pencil-alt"></i>', ['update', 'id' => $model->id], ['class' => 'btn btn-warning']) ?>
        <!--        --><? //= Html::a('Добавить вопрос', ['question/create'], ['class' => 'btn btn-primary', 'data-target' => 'modal',
        //            'data-toggle' => '#modalDelete'
        //        ]) ?>
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalCreateQuestion"><i
                    class="fa fa-plus-circle"></i> Добавить вопрос
        </button>
        <?= Html::a('<i class="fas fa-trash-alt"></i>', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <!--    --><? //= DetailView::widget([
    //        'model' => $model,
    //        'attributes' => [
    //            'id',
    //            'name',
    //            'user_id',
    //            'result',
    //            'create_at',
    //            'update_at',
    //            'action',
    //        ],
    //    ]) ?>

    <div class="row">
        <div class="col-md-12">
            <ul class="todo-list-wrapper list-group list-group-flush" id="accordion">
                <?php
                $i = 0;
                foreach ($question as $quest) {
                    $i++;
                    $answer = \app\models\Answer::find()->where(['test_id' => $model->id])->andWhere(['question_id' =>
                        $quest->id])
                        ->all();
                    ?>
                    <li class="list-group-item">
                        <div class="todo-indicator bg-success"></div>
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="widget-heading ml-2" data-toggle="collapse"
                                         data-target="#collapseOne<?= $i ?>" aria-expanded="false"
                                         aria-controls="collapseThree"><?= $i . '. ' . $quest->name ?></div>
                                    <div class="widget-subheading ml-2">
                                        <div>
                                            <?= $model->name ?>
                                            <div data-parent="#accordion" id="collapseOne<?= $i ?>"
                                                 class="collapse show"
                                                 style="">
                                                <div class="card-body">
                                                    <?php foreach ($answer as $ans) { ?>
                                                        <!--                                                        <p class="text-dark">--><? //= $ans->name ?><!--</p>-->
                                                        <div class="vertical-without-time vertical-timeline vertical-timeline--animate vertical-timeline--one-column">

                                                            <div class="vertical-timeline-item vertical-timeline-element">
                                                                <div>
<span class="vertical-timeline-element-icon bounce-in">
<i class="badge badge-dot badge-dot-xl badge-success"> </i>
</span>
                                                                    <div class="vertical-timeline-element-content bounce-in">

                                                                        <h4 class="timeline-title">
                                                                            <?php if ($ans->answer_right == true): ?>
                                                                                <div class="custom-control custom-switch">
                                                                                    <input type="checkbox"
                                                                                           class="custom-control-input"
                                                                                           id="customSwitch-<?= $ans->id
                                                                                           ?>" data-id="<?= $ans->id
                                                                                    ?>" checked>
                                                                                    <label class="custom-control-label"
                                                                                           for="customSwitch-<?= $ans->id
                                                                                           ?>"><?= $ans->name ?></label>
                                                                                </div>

                                                                            <?php else: ?>
                                                                                <div class="custom-control custom-switch">
                                                                                    <input type="checkbox"
                                                                                           class="custom-control-input"
                                                                                           id="customSwitch-<?= $ans->id
                                                                                           ?>" data-id="<?= $ans->id
                                                                                    ?>">
                                                                                    <label class="custom-control-label"
                                                                                           for="customSwitch-<?= $ans->id
                                                                                           ?>"><?= $ans->name ?></label>
                                                                                </div>
                                                                            <?php endif; ?>
                                                                        </h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content-right widget-content-actions">
                                    <?= Html::a('<i class="fa fa-pencil-alt"></i>', ['question/update', 'id' =>
                                        $quest->id], ['class' => 'border-0 btn-transition btn btn-outline-warning']) ?>
                                    <button class="border-0 btn-transition btn btn-outline-success"
                                            data-toggle="modal" data-target="#modalCreateAnswer" data-id="<?=
                                    $quest->id ?>" id="createAnswer">
                                        <i class="fa fa-plus"></i>
                                    </button>

                                    <?= Html::a('<i class="fa fa-trash-alt"></i>', ['delete-question', 'id' =>
                                        $quest->id], [
                                        'class' => 'border-0 btn-transition btn btn-outline-danger',
                                        'data' => [
                                            'confirm' => 'Удаляя вопрос удалятся все варианты ответа на него. Удалить?',
                                            'method' => 'post',
                                        ],
                                    ]) ?>
                                </div>
                            </div>
                        </div>
                    </li>
                <?php } ?>
            </ul>
            <div id="timer"></div>
        </div>
    </div>
    <div id="regi">Registration closes in <span id="time">05:00</span> minutes!</div>
</div>
<?php
$js = <<<JS
$(function (){
    $(document).on('click', '#createAnswer', function (){
        var id = $(this).data('id');
        $('#answer-question_id').val(id);
        console.log(id);
    });
    
    // Отметить правильный ответ
    $("input[id^='customSwitch-']").change(
       function(e){
   
if ($(this).is(':checked') == true){

               toastr.success('', 'Установлен правильный ответ!', {
                   timeOut: 5000,
                   closeButton: true,
                   progressBar: true
               })
           }else{
 
               toastr.error('', 
                   ' Правильный отовет отменен!', {
                   timeOut: 5000,
                   closeButton: true,
                   progressBar: true
               })
           } 
   $.ajax({
            url: '/page/form-builder',
            type: 'POST',
            data: {
                id: $(this).attr('data-id'),
                right: $(this).is(':checked'),
            },
            //dataType: 'JSON',
            success: function(res){
                     //$( "#control-group").append(res); 
                      console.log(res);           
            },
            error: function(){
                //search_form_header.find('.result_search').html('').css('display', 'none');
                alert('Error!');
            }
        })
});
})

//Timer
// function startTimer(duration, display) {
//     var timer = duration, minutes, seconds;
//     setInterval(function () {
//         minutes = parseInt(timer / 60, 10);
//         seconds = parseInt(timer % 60, 10);
//
//         minutes = minutes < 10 ? "0" + minutes : minutes;
//         seconds = seconds < 10 ? "0" + seconds : seconds;
//
//         display.textContent = minutes + ":" + seconds;
//       
//
//         if (--timer < 0) {
//             timer = duration;
//         }
//     }, 1000);
// }

// $('#regi').click(function () {
//     var fiveMinutes = 1 * 2,
//         display = document.querySelector('#time');
//     startTimer(fiveMinutes, display);
// });
  
initTimer(5, "timer", function () { 
this.innerHTML = 0;
toastr.error('', 'Время теста истекло', {
                   timeOut: 15000,
                   closeButton: true,
                   progressBar: true
               })
}); 

 
function initTimer(time, id, callback) { 
var timer = document.getElementById(id); 
setTimeout(function () { 
if (time > 0) { 
timer.innerHTML = time--; 
setTimeout(arguments.callee, 1000); 
} 
else { 
callback.call(timer); 
} 
}, 0); 
} 


JS;

$this->registerJs($js);
?>
