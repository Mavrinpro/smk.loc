<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\CheckList $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Чек-листы', 'url' => ['index?department_id=' . $score->department_id]];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
//var_dump($score); die;
?>
<div class="check-list-view">

    <h1><?= Html::encode($this->title) ?></h1>


</div>
<div class="row">


    <div class="col-md-12 mt-3">
        <div id="user-data-backend">
            <table class="mb-0 table table-bordered" id="tabledata">
                <thead>
                <tr>
                    <th>Дата</th>
                    <th>Чек-лист</th>
                    <th>Баллы</th>

                </tr>
                </thead>
                <tbody>
                <?php
                //var_dump($scores->user); die;
                foreach ($score as $scores) { ?>
                    <tr>
                        <th scope="row"><?= date('d.m.Y', $scores->create_at) ?></th>
                        <td><?= Html::a($scores->check->name, ['scoreview', 'id' => $scores->check_id]) ?></td>
                        <td><span class="badge badge-success badge-pill"><?= $scores->score ?></span></td>

                    </tr>
                <?php } ?>

                <span></span>
                </tbody>
            </table>

        </div>
    </div>
</div>

<?php

$this->registerJs(<<<JS


JS
); ?>




