<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use app\models\Answer;

/** @var yii\web\View $this */


$this->title = $user->fio;
$this->params['breadcrumbs'][] = ['label' => 'Результаты тестирования', 'url' => ['result-test', 'department_id' =>
    $user->department_id]];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

?>
<?php
//$m = new \app\models\EndTest();
//var_dump($test->testname);
?>
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-primary">
                <h3><?= Html::encode($test->testname->name) ?>
                    <i class="fa fa-user"></i>
                    <div class="badge"> <?= ($user->fio) ? Html::encode($user->fio) : Html::encode($user->username)
                        ?>
                    </div>
                </h3>
            </div>

            <table style="width: 100%;" id="example"
                   class="table table-hover table-striped table-bordered dataTable dtr-inline" role="grid"
                   aria-describedby="example_info">
                <thead class="bg-dark text-light">
                <tr>
                    <th>ID</th>
                    <th>Вопрос</th>
                    <th>Ответ</th>
                    <th>Дата</th>
                    <th><i class="fa fa-check text-success"></i></th>
                    <th><i class="fa fa-times text-danger"></i></th>
                </tr>
                </thead>
                <tbody>
                <?php
                $a = [];
                foreach ($tester as $itemq) {
                    $ansId = $itemq->ans_id;

                    $a[] = $ansId;

                    ?>
                    <?php $answered = \app\models\Answer::find()->where(['id' => $ansId])->one(); ?>
                    <tr>
                        <td><?= $itemq->id ?></td>
                        <td><?= $itemq->question->name ?></td>
                        <?php if (isset($itemq->ans_id)): ?>
                            <td> <?php

                                echo $itemq->answer->name . ', ';


                                ?></td>
                        <?php else: ?>
                            <td><?= $itemq->answer_text ?></td>
                        <?php endif; ?>
                        <td><?= date('d.m.Y H:i:s', $itemq->create_at) ?></td>
                        <td>
                            <div class="custom-checkbox custom-control">
                                <?php if ($itemq->completed == 1): ?>
                                    <input type="checkbox" id="checkbox_right-<?= $itemq->id ?>" data-id="<?= $itemq->id
                                    ?>" class="custom-control-input" data-user_id="<?= $user->id ?>"
                                           data-test_id="<?= \Yii::$app->request->get('id') ?>"
                                           data-res="<?= \Yii::$app->request->get('res') ?>" checked>
                                <?php else: ?>
                        <input type="checkbox" id="checkbox_right-<?= $itemq->id ?>" data-id="<?= $itemq->id
                        ?>" class="custom-control-input" data-user_id="<?= $user->id ?>"
                               data-test_id="<?= \Yii::$app->request->get('id') ?>"
                               data-res="<?= \Yii::$app->request->get('res') ?>" >
                                <?php endif; ?>
                                <label class="custom-control-label"
                                       for="checkbox_right-<?= $itemq->id ?>">&nbsp;</label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-checkbox custom-control">
                                <?php if ($itemq->completed == 0): ?>
                                    <input type="checkbox" id="checkbox_left-<?= $itemq->id ?>"
                                           data-id="<?= $itemq->id ?>"
                                           class="custom-control-input" data-user_id="<?= $user->id ?>"
                                           data-test_id="<?=
                                           \Yii::$app->request->get('id') ?>"
                                           data-res="<?= \Yii::$app->request->get('res')
                                           ?>" checked>
                                <?php else: ?>
                        <input type="checkbox" id="checkbox_left-<?= $itemq->id ?>"
                               data-id="<?= $itemq->id ?>"
                               class="custom-control-input" data-user_id="<?= $user->id ?>"
                               data-test_id="<?=
                               \Yii::$app->request->get('id') ?>"
                               data-res="<?= \Yii::$app->request->get('res')
                               ?>" >
                                <?php endif; ?>
                                <label class="custom-control-label" for="checkbox_left-<?= $itemq->id ?>">&nbsp;</label>
                            </div>
                        </td>

                    </tr>

                <?php } ?>

                </tbody>
            </table>
            <div class="col-12 mt-2 mb-3 alert alert-dark">Оценка: <span class="mr-auto"
                                                                         id="count_checkbox"><b><?= $counttest ?>%</b>
                                                                         </span></div>
            <?= Html::a('<i class="fa fa-check"></i> Тест пройден', ['success-test', 'id' => \Yii::$app->request->get
            ('id'), 'user_id' => \Yii::$app->request->get
            ('user_id'), 'res' => \Yii::$app->request->get
            ('res')],
                ['class' =>
                    'btn btn-success mb-3']) ?>
            <?= Html::a('<i class="fa fa-times"></i> Тест провален', ['test-failed', 'id' => \Yii::$app->request->get
            ('id'), 'user_id' => \Yii::$app->request->get
            ('user_id'), 'res' => \Yii::$app->request->get
            ('res')], ['class' => 'btn btn-danger mb-3']) ?>

        </div>
    </div>

<?php


$this->registerJs(<<<JS

$('[id^="checkbox_right"]').click(function (){
    var id = $(this).data('id');
    var num = null;
    var user_id = $(this).data('user_id');
    var test_id = $(this).data('test_id');
    var res = $(this).data('res');
    //console.log(id);
    if ($(this).is(':checked')){
        $("#checkbox_left-"+id).prop('checked', false);
	num = 1;
} else {
	num = null;
    //$("#checkbox_left-"+id).prop('checked', false);
}
    $.ajax({
            
            url: '/department/checkbox-right',
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
                $('#count_checkbox').html('<b>'+res+"%</b>");
                               
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
            
            url: '/department/checkbox-left',
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
                  $('#count_checkbox').html('<b>'+res+"%</b>");             
            },
            error: function(){
                console.log('Error!');
            }
        })
})

JS
);


