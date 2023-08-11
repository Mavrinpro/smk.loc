<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\BaseStringHelper;

/** @var yii\web\View $this */
/** @var app\models\CheckList $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Чек-листы', 'url' => ['index?department_id='.$model->department_id]];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
//var_dump($check); die;
?>
<div class="check-list-view">

    <h1><?= Html::encode($this->title) ?></h1>


</div>
<div class="row">
    <div class="col-md-12">

        <?php if (isset($check)): ?>
            <table class="mb-0 table table-hover table-warning table-bordered">
                <thead>
                <tr>

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
                <?php foreach ((array)$check as $items): ?>
                    <tr>


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
        <div id="user-data-backend">
            <table class="mb-0 table table-bordered" id="tabledata">
                <thead>
                <tr>
                    <th>Дата</th>
                    <th>Сотрудник</th>
                    <th>Баллы</th>

                </tr>
                </thead>
                <tbody>
                <?php
                //var_dump($check1);
                $param = 'test';
                $rex = base64_encode($param);
                $rrr = 'https://t.me/triviabot?start='.$rex;

                //$rex = base64_decode($rex);
                echo $rrr;
                foreach ($scoreall as $score) { ?>
                    <tr>
                        <th scope="row"><?= date('d.m.Y', $score->create_at) ?></th>
                        <td><?= $score->user->username ?></td>
                        <td><?= $score->score ?></td>

                    </tr>
                <?php } ?>

                <span></span>
                </tbody>
            </table>
        </div>
    </div>
</div>



