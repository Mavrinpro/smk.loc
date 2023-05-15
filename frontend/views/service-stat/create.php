<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ServiceStat $model */

$this->title = 'Create Service Stat';
$this->params['breadcrumbs'][] = ['label' => 'Service Stats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="service-stat-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
<?php
$service = \app\models\ServiceStat::find()->all();

 ?>
</div>
<div class="row">
    <div class="col-md-12">
        <table class="mb-0 table table-hover">
            <thead>
            <tr>
                <th>Дата</th>
                <th>Сотрудник</th>
                <th>Услуга</th>
                <th>Количество</th>


            </tr>
            </thead>
            <tbody>
            <?php foreach ($statistic as $items): ?>
                <tr>
                    <td><?php echo date('d.m.Y',$items->create_at); ?></td>
                    <td><?php echo $items->user->username; ?></td>
                    <td><?php echo $items->service->name; ?></td>
                    <td><?php echo  $items->active ?></td>


                </tr>
            <?php endforeach; ?>

            </tbody>
        </table>
    </div>
</div>
