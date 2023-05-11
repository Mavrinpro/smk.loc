<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/** @var yii\web\View $this */


$this->title = $question->name;
$this->params['breadcrumbs'][] = ['label' => 'Тесты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<?= Html::a('Начать тестирование', ['start', 'id' => $question->id], ['class' => 'btn btn-warning']) ?>
<!--        --><? //= Html::a('Добавить вопрос', ['question/create'], ['class' => 'btn btn-primary', 'data-target' => 'modal',
//            'data-toggle' => '#modalDelete'
//        ]) ?>
<div class="test-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-md-12">


            <ul class="todo-list-wrapper list-group list-group-flush" id="accordion">
                <?php $form = ActiveForm::begin([
                    'id' => 'form_result_test',
                    //'action' => '/result-test/passing-test'
                    'method' => 'post'
                ]); ?>
                <?php
                $i = 0;
                //var_dump($answer);

                    $i++;
                    $answer = \app\models\Answer::find()->where(['question_id' => $question->id])->all();
                    ?>
                    <li class="list-group-item">
                        <div class="todo-indicator bg-primary"></div>
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="widget-heading ml-2" data-toggle="collapse"
                                         data-target="#collapseOne<?= $i ?>" aria-expanded="false"
                                         aria-controls="collapseThree"
                                         style="cursor: pointer"><?= $i . '. ' . $quest->name ?></div>
                                    <div class="widget-subheading ml-2">
                                        <div>

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
                                                                <i class="badge badge-dot badge-dot-xl badge-primary"> </i>
                                                                </span>
                                                                    <div class="vertical-timeline-element-content bounce-in">

                                                                        <h4 class="timeline-title">

                                                                            <div class="custom-control custom-switch">

                                                                                <?= $form->field($result, 'answer_id')->checkbox(['id' => 'customSwitch-' . $ans->id,
                                                                                    'class' =>'custom-control-input'])->label($ans->name) ?>
                                                                                <?= $form->field($result, 'user_id')->hiddenInput(['value' => \Yii::$app->getUser()
                                                                                    ->id])->label(false) ?>
                                                                                <?= $form->field($result, 'test_id')->hiddenInput(['value' => $model->id])->label
                                                                                (false) ?>
                                                                                <?= $form->field($result, 'question_id')->hiddenInput(['value' => $question->id])->label
                                                                                (false) ?>

                                                                            </div>

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
                            </div>
                        </div>
                    </li>

                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                <?php ActiveForm::end(); ?>
            </ul>





            <!--            <div id="timer"></div>-->
        </div>

    </div>
    <!--    <div id="regi">Start timer <span id="time">05:00</span> minutes!</div>-->
    <button data-swal-template="#my-template">
        Trigger modal
    </button>

    <button data-swal-toast-template="#my-template">
        Trigger toast
    </button>
</div>
<?php
$js = <<<JS
// $(function (){
//     $(document).on('click', '#createAnswer', function (){
//         var id = $(this).data('id');
//         $('#answer-question_id').val(id);
//         console.log(id);
//     });
//    
//     // Отметить правильный ответ
//     $("input[id^='customSwitch-']").change(
//        function(e){
//   
// if ($(this).is(':checked') == true){
//
//                toastr.success('', 'Установлен правильный ответ!', {
//                    timeOut: 5000,
//                    closeButton: true,
//                    progressBar: true
//                })
//            }else{
// 
//                toastr.error('', 
//                    ' Правильный отовет отменен!', {
//                    timeOut: 5000,
//                    closeButton: true,
//                    progressBar: true
//                })
//            } 
//    $.ajax({
//             url: '/result-test/passing-test',
//             type: 'POST',
//             data: {
//                 id: $(this).attr('data-id'),
//                 testId: $(this).attr('data-test_id'),
//                 questId: $(this).attr('data-quest-id'),
//                 right: $(this).is(':checked')
//             },
//             //dataType: 'JSON',
//             success: function(res){
//                      //$( "#control-group").append(res); 
//                       console.log(res);           
//             },
//             error: function(){
//                 //search_form_header.find('.result_search').html('').css('display', 'none');
//                 alert('Error!');
//             }
//         })
// });
// })

Swal.bindClickHandler()

Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  toast: true,
  title: 'a34ta34taq34',
    icon: 'success',
  showCloseButton: true,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
}).bindClickHandler('data-swal-toast-template');


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
  $('#regi').click(function () {
initTimer(10, "timer", function () { 
this.innerHTML = 0;
}); 
});

 
// function initTimer(time, id, callback) { 
//
// setTimeout(function () { 
//    
//      var minutes = parseInt(time-- / 60);
//      var seconds = parseInt(time-- % 60, 0);
//      if (seconds < 10) {
//     seconds = '0'+seconds;
//   }
// if (time > 0) { 
//    
// timer.innerHTML = minutes+":"+seconds; 
// setTimeout(arguments.callee, 1000); 
// console.log(time);
// } 
// else { 
// callback.call(timer); 
//
// } 
// }, 0); 
// } 


JS;

$this->registerJs($js);
?>

