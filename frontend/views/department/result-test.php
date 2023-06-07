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
<!--        --><?//= Html::a('<i class="fa fa-plus-circle"></i> Создать тест', ['/test/create', 'department_id' =>
//            \Yii::$app->request->get('test_id')],
//            ['class' =>
//                'btn btn-success mb-3']) ?>
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Сотрудник</th>

                <th>Дата</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($test as $itemq) { ?>
                <tr>
                    <td><?= $itemq->id ?></td>
                    <td><?= Html::a('<i class="fa fa-user"></i> '.$itemq->user->fio, ['testview', 'id' =>
                            $itemq->test_id, 'user_id' => $itemq->user_id, 'res' => $itemq->id], ['class' => ' btn btn-outline-link'])
                        ?></td>
                        <td><i class="fa fa-clock"></i> <?= date('d.m.Y H:i:s', $itemq->date_end_test) ?></td>
                </tr>

            <?php } ?>
            </tbody>
        </table>
    </div>

</div>
</div>

