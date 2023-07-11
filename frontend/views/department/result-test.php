<?php

use app\models\Department;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var frontend\models\DepartmentSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Результаты тестирования';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="row">
    <div class="col-md-12">

        <h1><?= Html::encode($this->title) ?></h1>
        <?php if (sizeof($test) > 0): ?>
        <table class="table">
            <thead>
            <tr>
                <th>Тест</th>
                <th>Сотрудник</th>
                <th>Дата</th>
                <th>Удалить</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($test as $itemq) { ?>
                <tr>
                    <td><span class="badge badge-warning"><?= $itemq->testname->name ?></span></td>
                    <td><?= Html::a('<i class="fa fa-user"></i> ' . $itemq->user->fio, ['testview', 'id' =>
                            $itemq->test_id, 'user_id' => $itemq->user_id, 'res' => $itemq->id], ['class' => ' btn btn-outline-link'])
                        ?></td>
                    <td><i class="fa fa-clock"></i> <?= date('d.m.Y H:i:s', $itemq->date_end_test) ?></td>
                    <td><?= Html::a('<i class="fa fa-trash"></i> ', ['delete-result-test', 'id' =>$itemq->id ,'test_id' =>
                            $itemq->test_id, 'user_id' => $itemq->user_id, 'res' => $itemq->id, 'department_id' =>
                            \Yii::$app->request->get('department_id')], ['class' =>
                            ' btn btn-xs btn-outline-danger', 'data' => [
                            'method' => 'post',
                            'confirm' => 'Удалить результат тестирования этого сотрудника?',
                            'params' => [
                                'id' => 6,
                                'param2' => 'value2',
                            ],
                        ]])
                        ?></td>
                </tr>

            <?php } ?>
            </tbody>
        </table>
        <?php else: ?>
        <div class="alert alert-danger">Тест пока никто не прошел</div>
        <?php endif; ?>
    </div>

</div>
</div>

