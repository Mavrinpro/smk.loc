<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use app\models\Answer;

/** @var yii\web\View $this */


$this->title = $user->fio;
$this->params['breadcrumbs'][] = ['label' => 'Результаты тестирования', 'url' => ['result-test']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

?>
<?php
//$m = new \app\models\EndTest();

?>
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-primary"><h1>Результат теста: <?= Html::encode($user->fio) ?></h1></div>

            <table class="table">
                <thead>
                <tr>
                    <th>Вопрос</th>
                    <th>Ответ</th>
                    <th>Дата</th>
                    <th><i class="fa fa-check"></i></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($tester as $itemq) { ?>

                    <tr>

                        <td><?= $itemq->question->name ?></td>
                        <?php if (isset($itemq->ans_id)): ?>
                            <td><?= $itemq->answer->name ?> <?= $itemq->ans_id ?><?php //var_dump($m->anser()) ?></td>
                        <?php else: ?>
                            <td><?= $itemq->answer_text ?> </td>
                        <?php endif; ?>
                        <td><?= date('d.m.Y H:i:s', $itemq->create_at) ?> <?= $models->user->id ?></td>
                        <td><?= (isset($itemq->ans_id)) ? (isset($itemq->answer->answer_right) &&
                                $itemq->answer->answer_right ==
                                1) ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i></td>' : 'Ответ вписан' ?>
                    </tr>

                <?php } ?>

                </tbody>
            </table>
        </div>
    </div>
<?php


