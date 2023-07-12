<?php

use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;

/** @var yii\web\View $this */


$this->title = $question->name;
$this->params['breadcrumbs'][] = ['label' => 'Тесты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
$q = \app\models\Question::find()->where(['id' => $id])->one();
?>

<div class="test-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-md-12">

            <?= $next->id ?>
            <ul class="todo-list-wrapper list-group list-group-flush" id="accordion">
                <?php $form = ActiveForm::begin([
                    'id' => 'form_result_test',
                    //'action' => '/result-test/passing-test'
                    'method' => 'post'
                ]); ?>
                <?php

                //$answer = \app\models\Answer::find()->where(['question_id' => $question->id])->all();
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
                                                <?php $isExists = \app\models\Answer::find()->where(['question_id' =>
                                                    \Yii::$app->request->get('id')])->exists(); ?>
                                                <?= $isExists ?>
                                                <?php if ($isExists != 1): ?>
                                                    <?= $form->field($result, 'question_id')->hiddenInput(['value' => $question->id])->label
                                                    (false) ?>
                                                    <?= $form->field($result, 'answer_text')->textInput()->label('Ваш ответ') ?>
                                                    <input type="hidden" name="answer_null" value="null">
                                                <?php else: ?>
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

                                                                                <?= $form->field($result, 'answer_id')
                                                                                    ->checkbox(['id' => 'customSwitch-' . $ans->id,
                                                                                        'class' => 'custom-control-input', 'value' => $ans->id, 'uncheck' => null])
                                                                                    ->label($ans->name) ?>

                                                                                <?= $form->field($result, 'user_id')->hiddenInput(['value' => \Yii::$app->getUser()
                                                                                    ->id])->label(false) ?>
                                                                                <?= $form->field($result, 'test_id')->hiddenInput(['value' =>
                                                                                    $question->test_id])->label
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
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <?= Html::submitButton('Дальше', ['class' => 'mt-3 btn btn-success']) ?>
                <?php ActiveForm::end(); ?>
            </ul>


            <!--            <div id="timer"></div>-->
        </div>

    </div>
    <!--    <div id="regi">Start timer <span id="time">05:00</span> minutes!</div>-->

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
var n = $(this).length;

if ($(this).is(':checked') == true){
console.log($(this).length);
toastr.success('', 'Установлен правильный ответ!', {
timeOut: 5000,
closeButton: true,
progressBar: true
})
}else{
console.log($(this).length);
toastr.error('',
' Правильный отовет отменен!', {
timeOut: 5000,
closeButton: true,
progressBar: true
})
}

});
})

Swal.bindClickHandler()

Try me! 
Swal.fire('Any fool can use a computer')


JS;

$this->registerJs($js);
?>

