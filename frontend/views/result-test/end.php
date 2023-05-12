<?php
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

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

foreach ($re as $item) {
    echo '<br>'.$item->name.' - '.$item->answer_right.' -- '.date('Y-m-d', $item->create_at).' <br>';
}

foreach ($model as $item) {
    echo '<br>'.date('Y-m-d', $item->create_at).' <br>';
}

//var_dump($model);