<?php
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use app\models\Answer;

/** @var yii\web\View $this */


$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Тесты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

?>
<div class="alert alert-success"><h3><?php echo 'Тест пройден'; ?></h3></div>
<?php
$id = [];
foreach ($model as $item) {
    $id[] = $item->test_id;
}

$m = new \app\models\ResultTest();

?>
<table class="table">
    <thead>
    <tr>
        <th>ID</th>
        <th>Вопрос</th>
        <th>Ответ</th>
        <th>Дата</th>
        <th>Дата</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($model as $itemq) { ?>

    <tr>
        <td><?= $itemq->id ?></td>
        <td><?= $itemq->question->name ?></td>
        <?php if (isset($itemq->ans_id)): ?>
        <td><?= $itemq->answer->name ?> <?= $itemq->ans_id ?> <?php //var_dump($m->anser()) ?></td>
        <?php else: ?>
        <td><?= $itemq->answer_text ?></td>
        <?php endif; ?>
        <td><?= date('d.m.Y H:i:s', $itemq->create_at) ?></td>
        <td><?= (isset($itemq->ans_id)) ? (isset($itemq->answer->answer_right) &&
                $itemq->answer->answer_right ==
                1) ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i>':'Ответ вписан' ?>
        </td>

    </tr>

    <?php } ?>

    </tbody>
</table>
<?php


