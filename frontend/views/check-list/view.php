<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\CheckList $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Check Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="check-list-view">

    <!--    <h1>--><? //= Html::encode($this->title) ?><!--</h1>-->
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
        <table class="mb-0 table table-hover table-secondary table-bordered">
            <thead>
            <tr>
                <th>#</th>
                <th>Критерий</th>
                <th>Lasik</th>
                <th>Баллы</th>
                <th>Номер 1</th>
                <th>Номер 2</th>
                <th>Номер 3</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($check as $items): ?>
                <tr>
                <?php if ($items->text2 != null): ?>
                    <td rowspan="2"><?php echo $items->id; ?></td>
                    <td rowspan="2"><?php echo $items->name; ?></td>
                    <td><?php echo $items->text1; ?></td>
                    <td class="editable score" data-id="<?= $items->id ?>" data-type="score1"><?= $items->score
                        ?></td>
                    <td class="editable" data-id="<?= $items->id ?>"></td>
                    <td class="editable" data-id="<?= $items->id ?>"></td>
                    <td class="editable" data-id="<?= $items->id ?>"></td>
                    <tr>
                        <td><?php echo $items->text2; ?></td>

                        <td class="editable score2" data-id="<?= $items->id ?>"  data-type="score2"><?= $items->score2
                            ?></td>
                        <td class="editable" data-id="<?= $items->id ?>"></td>
                        <td class="editable" data-id="<?= $items->id ?>"></td>
                        <td class="editable" data-id="<?= $items->id ?>"></td>
                    </tr>
                <?php else: ?>
                    <td><?php echo $items->id; ?></td>
                    <td><?php echo $items->name; ?></td>
                    <td><?php echo $items->text1; ?></td>
                    <td class="editable score" data-id="<?= $items->id ?>" data-type="score1"><?= $items->score
                        ?></td>
                    <td class="editable" data-id="<?= $items->id ?>"></td>
                    <td class="editable" data-id="<?= $items->id ?>"></td>
                    <td class="editable" data-id="<?= $items->id ?>"></td>
                <?php endif; ?>
                </tr>
            <?php endforeach; ?>

            </tbody>
        </table>
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
                  e.value = 0;
             }
            $.ajax({
            
            url: '/check-list/ajax-table',
            type: 'POST',
            data: {
                id: th.data('id'),
                score: th.data('type'),
                val: e.value
            },
            dataType: 'JSON',
            success: function(res){
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
