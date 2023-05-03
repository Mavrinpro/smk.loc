<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\History;

/** @var yii\web\View $this */
/** @var app\models\Page $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Страницы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
$userHasRoleName = \Yii::$app->user->can('superadmin');
var_dump($userHasRoleName);
?>
<div class="page-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php if ($userHasRoleName): ?>
            <?= Html::a('<i class="fa fa-trash"></i>', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ])
            ?>
        <?php endif; ?>
        <?= Html::a('<i class="fa fa-download"></i>', ['create-doc', 'id' => $model->id], ['class' => 'btn 
        btn-light', 'title' => 'Скачать', 'data-toggle' => 'tooltip', 'data-placement' => 'top']) ?>

        <!--        --><? //= Html::a('<i class="fa fa-print"></i>', ['#', 'id' => $model->id], ['class' => 'btn
        //        btn-secondary', 'title' => 'Распечатать', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'onclicl'
        //            => 'window.print()']) ?>
        <a href="#" class="btn btn-secondary" title="Печать" data-toggle="tooltip" id="docprint"
           onclick="window.print()"><i class="fa
        fa-print"></i></a>
    </p>
    <!--    <div class="mb-3 card">-->
    <!--        <div class="card-body">-->
    <!--            <ul class="tabs-animated-shadow tabs-animated nav">-->
    <!--                <li class="nav-item">-->
    <!--                    <a role="tab" class="nav-link" id="tab-c-0" data-toggle="tab" href="#tab-animated-0"-->
    <!--                       aria-selected="false">-->
    <!--                        <span>Tab 1</span>-->
    <!--                    </a>-->
    <!--                </li>-->
    <!--                <li class="nav-item">-->
    <!--                    <a role="tab" class="nav-link active" id="tab-c-1" data-toggle="tab" href="#tab-animated-1"-->
    <!--                       aria-selected="true">-->
    <!--                        <span>Tab 2</span>-->
    <!--                    </a>-->
    <!--                </li>-->
    <!--                <li class="nav-item">-->
    <!--                    <a role="tab" class="nav-link" id="tab-c-2" data-toggle="tab" href="#tab-animated-2"-->
    <!--                       aria-selected="false">-->
    <!--                        <span>Tab 3</span>-->
    <!--                    </a>-->
    <!--                </li>-->
    <!--            </ul>-->
    <!--             Button trigger modal -->
    <!--            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalDelete">-->
    <!--                Launch demo modal-->
    <!--            </button>-->
    <!---->
    <!---->
    <!--                        <div class="tab-content">-->
    <!--                            <div class="tab-pane" id="tab-animated-0" role="tabpanel">-->
    <!--                                <p class="mb-0">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when-->
    <!--                                    an unknown printer took a galley of type and scrambled it to make a type specimen-->
    <!--                                    book.-->
    <!--                                    It has survived not only five centuries, but also the leap into electronic typesetting,-->
    <!--                                    remaining essentially unchanged. </p>-->
    <!--                            </div>-->
    <!--                            <div class="tab-pane active" id="tab-animated-1" role="tabpanel">-->
    <!--                                <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem-->
    <!--                                    Ipsum has been the industry's standard dummy text ever since the 1500s, when an-->
    <!--                                    unknown-->
    <!--                                    printer took a galley of type and scrambled it to make a type specimen book. It has survived not-->
    <!--                                    only five centuries, but also the leap into electronic typesetting, remaining essentially-->
    <!--                                    unchanged. </p>-->
    <!--                            </div>-->
    <!--                            <div class="tab-pane" id="tab-animated-2" role="tabpanel">-->
    <!--                                <p class="mb-0">It was popularised in the 1960s with the release of Letraset sheets containing Lorem-->
    <!--                                    Ipsum passages, and more recently with desktop publishing software like Aldus-->
    <!--                                    PageMaker including versions of Lorem Ipsum.</p>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--        </div>-->
    <!--    </div>-->

    <!--    --><? //= DetailView::widget([
    //        'model' => $model,
    //        'attributes' => [
    //            'id',
    //            'name',
    //            'department_id',
    //            'create_at',
    //            'update_at',
    //            'user_id_create',
    //            'user_id_update',
    //        ],
    //    ]) ?>
    <?php if ($userHasRoleName): ?>
    <div class="row">
        <div class="col-12 mb-3" id="print">
            <?= $model->text ?>
        </div>
    </div>
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">История</h5>
                <div class="vertical-without-time vertical-timeline vertical-timeline--animate vertical-timeline--one-column">
                    <?php foreach ($history as $his) { ?>
                        <div class="vertical-timeline-item vertical-timeline-element">
                            <div>
<span class="vertical-timeline-element-icon bounce-in">
<i class="badge badge-dot badge-dot-xl badge-success"> </i>
</span>
                                <div class="vertical-timeline-element-content bounce-in">
                                    <h4 class="timeline-title"><?php $user = common\models\User::find()->where(['id' =>
                                            $his->user_id_update])->one();
                                        echo $user->username;
                                        ?></h4>
                                    <p><span><b>
                                                <?= date('d.m.Y H:i', $his->update_at)
                                                ?></b> Изменение документа

                                    </p></span>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
    <button id="cloneDiv" class="btn btn-success mb-3"><i class="fa fa-plus"></i> Добавить вопрос</button>
    <div id="control-group" class="mt-3 mb-3 col-md-10">
        <div class="group-nput d-flex">
        <input type="text" class="form-control mr-3" id="klon" placeholder="Вопрос">
<!--            <button class="btn btn-danger btn-sm"><i class="fa fa-minus"></i></button>-->
        </div>
        <button class="btn btn-info btn-sm mt-2 btnanswer" id="btnanswer"><i class="fa fa-plus"></i></button>
    </div>
    </div>
<?php endif; ?>
<form class="form-horizontal" action="/page/form-builder" method="post">
    <fieldset>
        <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>"
               value="<?= Yii::$app->request->getCsrfToken(); ?>"/>

        <!-- Form Name -->
        <legend>Form Name</legend>

        <!-- Text input-->
        <div class="control-group">
            <label class="control-label" for="textinput-0">Text 1</label>
            <div class="controls">
                <input id="textinput-0" name="textinput-0" type="text" placeholder="placeholder" class="input-xlarge"
                       required="">
                <p class="help-block">help</p>
            </div>
        </div>

        <!-- Text input-->
        <div class="control-group">
            <label class="control-label" for="textinput-1">Text 2</label>
            <div class="controls">
                <input id="textinput-1" name="textinput-1" type="text" placeholder="placeholder" class="input-xlarge">
                <p class="help-block">help</p>
            </div>
        </div>

        <!-- Text input-->
        <div class="control-group">
            <label class="control-label" for="textinput-2">Text 3</label>
            <div class="controls">
                <input id="textinput-2" name="textinput-2" type="text" placeholder="placeholder" class="input-xlarge">
                <p class="help-block">help</p>
            </div>
        </div>

        <!-- Text input-->
        <div class="control-group">
            <label class="control-label" for="textinput-3">Text 4</label>
            <div class="controls">
                <input id="textinput-3" name="textinput-3" type="text" placeholder="placeholder" class="input-xlarge">
                <p class="help-block">help</p>
            </div>
        </div>
        <!-- Prepended checkbox -->


        <!-- Button (Double) -->
        <div class="control-group">
            <label class="control-label" for="doublebutton-0">Double Button</label>
            <div class="controls">
                <button type="submit" id="doublebutton-0" name="doublebutton-0" class="btn btn-success">Good Button
                </button>
            </div>
        </div>

    </fieldset>
</form>
<?php $test = app\models\Test::find()->all();
foreach ($test as $item) {


}

$arawer = 's:224:"{"_csrf":"2Mb00NwbNbNVbKdFiBugelg93wmGXX-JwtqiI_arM_mBi7Dgv1wM5jki7nz5LOoAMG_vQM0uDd-WjP1Ssvpnkg==","textinput-0":"e57e57","textinput-1":"e567e567","textinput-2":"e576e567e5","textinput-3":"7e576e576e57","doublebutton-0":""}";';
echo '<hr>';
//foreach (json_decode(unserialize($arawer)) as $k => $re){
//    echo $k . ' -- '.$re.' <br>';
//}
?>
</div>

<?php
$js = <<<JS


var i = 0;
$('#cloneDiv').click(function(){
i++;

  // get the last DIV which ID starts with ^= "klon"
  $('#klon').clone().appendTo( "#control-group" ).attr('id', 'klon'+i);
  $('#btnanswer').clone().appendTo( "#control-group" ).attr('id', 'btnanswer'+i);
  
})

var btnanswer = $('.btnanswer');
btnanswer.each(function (){
    

btnanswer.click(function (){
    console.log(3)
    //$('#control-group').append(elemInput); 
   $.ajax({
            url: '/page/form-builder',
            type: 'POST',
            data: 1,
            success: function(res){
                     $( "#control-group").append(res);            
            },
            error: function(){
                //search_form_header.find('.result_search').html('').css('display', 'none');
                alert('Error!');
            }
        })
});
})

$(document).on('click', ".mint", function (){
    //alert(4324);
  $(this).prev('input').remove();
  $(this).remove();
  console.log($(this));
});

     
JS;


$this->registerJs($js);
?>





