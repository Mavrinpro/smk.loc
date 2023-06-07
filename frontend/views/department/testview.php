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
<?php
echo 'Тест пройден';
$id = [];
//foreach ($model as $item) {
//    $id[] = $item->test_id;
//}
//$re = \app\models\Answer::find()->where(['in' ,'test_id' , $id])->all();
//$qu = \app\models\Question::find()->where(['in' ,'test_id' , $id])->all();
$arrName = [];
//var_dump($model);
//foreach ($model as $itemq) {
//        if($itemq->answer->answer_right == 1){
//            $l = '<span class="mb-2 mr-2 badge badge-pill badge-success d-inline-block">Верно</span>';
//        }else{
//            $l = '<span class="mb-2 mr-2 badge badge-pill badge-danger d-inline-block">Не верно</span>';
//        }
//    echo '<p>'.$itemq->question->name.' - ' .$itemq->answer->name.'=='.$l.'-'. date('d.m.Y', $itemq->create_at).'</p>';
//
//
//}
$testEnd = \app\models\EndTest::find()->all();
//var_dump($test);
?>
    <table class="table">
        <thead>
        <tr>
            <th>Вопрос</th>
            <th>Ответ</th>
            <th>Дата</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($tester as $itemq) { ?>

            <tr>

                <td><?= $itemq->question->name ?></td>
                <?php if (isset($itemq->ans_id)): ?>
                    <td><?= $itemq->answer->name ?> <?= $itemq->ans_id ?> <?php //var_dump($m->anser()) ?></td>
                <?php else: ?>
                    <td><?= $itemq->answer_text ?></td>
                <?php endif; ?>
                <td><?= date('d.m.Y H:i:s', $itemq->create_at) ?></td>

            </tr>

        <?php } echo date('Y-m-d',$test->date_end_test).'--'.date('Y-m-d');?>

        </tbody>
    </table>
<?php


