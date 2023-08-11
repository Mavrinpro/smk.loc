<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\VarDumper;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var app\models\Passport $model */

$this->title = 'Передать файл';
$this->params['breadcrumbs'][] = ['label' => 'Паспорт рисков процесса', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="protocol-view">
    <h1><?= Html::encode($this->title. ': '. $model->name)  ?> </h1>
</div>
<?php

//var_dump($model);

//VarDumper::dump($model, 10, true);

 $form = ActiveForm::begin([
    'id' => 'formus',
    'validateOnBlur' => true,
    'enableClientValidation' => true,
    'errorCssClass' => 'error',
    'fieldConfig' => [
        'errorOptions' => [
            'encode' => true,
            'class' => 'help-block',

        ],
    ],

    'options' => [
        'class' =>'form mt-5',


    ],

]); ?>


    <div class="form-group mr-md-3">


        <?= $form->field($model, 'send_user_id')->dropDownList(ArrayHelper::map(common\models\User::find()->where(['status' => 10])
            ->asArray()->all(), 'id', 'fio'), ['prompt' => 'Выберите сотрудника'])->label('Фио сотрудника')
        ?>
    </div>


    <div class="form-group">
        <?= Html::submitButton('Передать файл', ['class' => 'btn btn-lg btn-warning br-50', 'name' =>
            'contact-button']) ?>
    </div>

<?php ActiveForm::end(); ?>