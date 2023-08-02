<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/** @var yii\web\View $this */


$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Тесты', 'url' => ['/department/test?test_id='.$model->department_id]];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<!--        --><? //= Html::a('Добавить вопрос', ['question/create'], ['class' => 'btn btn-primary', 'data-target' => 'modal',
//            'data-toggle' => '#modalDelete'
//        ])

?>
<div class="test-view">
    <?= Html::a('<i class="fa fa-edit"></i>', ['/test/view', 'id' => $model->id], ['class'
    => 'btn btn-success ']) ?>
    <div class="row justify-content-center">
        <div class="col-md-12 text-center">
            <h1><?= Html::encode($this->title) ?></h1>
        </div>
        <div class="col-md-6">
            <?= Html::a('Начать тестирование <span class="badge
            badge-pill
            badge-dark">'.$countQuest.'</span>', ['start', 'id' => $question->id, 'werwer' => $countQuest], ['class'
            => 'btn btn-warning 
            btn-block btn-lg']) ?>

        </div>
    </div>








            <!--            <div id="timer"></div>-->
        </div>

    </div>
    <!--    <div id="regi">Start timer <span id="time">05:00</span> minutes!</div>-->
<!--    <button data-swal-template="#my-template">-->
<!--        Trigger modal-->
<!--    </button>-->
<!---->
<!--    <button data-swal-toast-template="#my-template">-->
<!--        Trigger toast-->
<!--    </button>-->
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

