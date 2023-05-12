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
echo 'Тест пройден'. \Yii::$app->getUser()->id;
$id = [];
foreach ($model as $item) {
    $id[] = $item->test_id;
}
$re = \app\models\Answer::find()->where(['in' ,'test_id' , $id])->all();
$qu = \app\models\Question::find()->where(['in' ,'test_id' , $id])->all();
$arrName = [];
//var_dump($model);
foreach ($model as $itemq) {
        if($itemq->answer->answer_right == 1){
            $l = '<span class="mb-2 mr-2 badge badge-pill badge-success d-inline-block">Верно</span>';
        }else{
            $l = '<span class="mb-2 mr-2 badge badge-pill badge-danger d-inline-block">Не верно</span>';
        }
    echo '<p>'.$itemq->question->name.' - ' .$itemq->answer->name.'=='.$l.'</p>';
    //foreach ($re as $item) {
    //    if($item->answer_right == 1){
    //        $l = '<div class="mb-2 mr-2 badge badge-pill badge-success">Success</div>';
    //    }else{
    //        $l = '<div class="mb-2 mr-2 badge badge-pill badge-danger">Danger</div>';
    //    }
    //    echo '<br>'.$item->name.' - '.$l.' -- '.date('Y-m-d', $item->create_at).' <br>';
    //}

}

foreach ($model as $item) {
   // echo $item->answer->name;
}
//foreach ($re as $item) {
//    if($item->answer_right == 1){
//        $l = '<div class="mb-2 mr-2 badge badge-pill badge-success">Success</div>';
//    }else{
//        $l = '<div class="mb-2 mr-2 badge badge-pill badge-danger">Danger</div>';
//    }
//    echo '<br>'.$item->name.' - '.$l.' -- '.date('Y-m-d', $item->create_at).' <br>';
//}
//
//foreach ($model as $item) {
//    echo '<br>'.date('Y-m-d', $item->create_at).' <br>';
//}

//var_dump($model->answer);
