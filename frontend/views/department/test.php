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

$this->title = 'Тестирование';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-12">

    <h1><?= Html::encode($this->title) ?></h1>
        <?= Html::a('<i class="fa fa-plus-circle"></i> Создать тест', ['/test/create', 'department_id' =>
            \Yii::$app->request->get('test_id')],
            ['class' =>
            'btn btn-success mb-3']) ?>

        <?php if (sizeof($test) > 0): ?>
        <ul class="list-group">
            <?php foreach ($test as $tester) {
                $question = \app\models\Question::find()->where(['test_id' => $tester->id])->all();
                ?>
                <a href="/result-test/view/?id=<?= $tester->id ?>"><li class="justify-content-between
                list-group-item"><?=
                    $tester->name ?></a>
                    <span class="badge badge-primary badge-pill"><?= sizeof($question) ?></span>
                </li>
            <?php } ?>
        </ul>
        <?php else: ?>
        <p>Тестов нет</p>
    <?php
    $js = <<<JS
  
Swal.fire('Тестов для отдела пока нет') 

JS;

    $this->registerJs($js);
    ?>
        <?php endif; ?>
    </div>

</div>
</div>

