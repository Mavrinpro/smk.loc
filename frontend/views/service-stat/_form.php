<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ServiceStat $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="service-stat-form">

<!--    --><?php //$form = ActiveForm::begin(); ?>
<!---->
<!--    --><?//= $form->field($model, 'user_id')->textInput() ?>
<!---->
<!--    --><?//= $form->field($model, 'service_id')->textInput() ?>
<!---->
<!--    --><?//= $form->field($model, 'department_id')->textInput() ?>
<!---->
<!--    --><?//= $form->field($model, 'create_at')->textInput() ?>
<!---->
<!--    --><?//= $form->field($model, 'update_at')->textInput() ?>
<!---->
<!--    --><?//= $form->field($model, 'user_id_create')->textInput() ?>
<!---->
<!--    --><?//= $form->field($model, 'user_id_update')->textInput() ?>
<!---->
<!--    --><?//= $form->field($model, 'active')->textInput() ?>
<!---->
<!--    <div class="form-group">-->
<!--        --><?//= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
<!--    </div>-->
<!---->
<!--    --><?php //ActiveForm::end(); ?>
<?php $service = \app\models\Service::find()->all();
var_dump($model->service);

?>
</div>
<div class="row">
    <?php foreach ($service as $item): ?>
        <div class="col-lg-3">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title"><?= $item->name ?></h5>

                    <?php $form = ActiveForm::begin(); ?>

                    <?= $form->field($model, 'user_id')->hiddenInput(['value' =>\Yii::$app->getUser()->id])->label
                    (false) ?>

                    <?= $form->field($model, 'service_id')->hiddenInput(['value' => $item->id])->label(false) ?>
                    <?= $form->field($model, 'department_id')->hiddenInput()->label(false) ?>

                    <?= $form->field($model, 'create_at')->hiddenInput(['value' => time()])->label(false) ?>

                    <?= $form->field($model, 'update_at')->hiddenInput()->label(false) ?>

                    <?= $form->field($model, 'user_id_create')->hiddenInput(['value' =>\Yii::$app->getUser()->id])->label(false) ?>

                    <?= $form->field($model, 'user_id_update')->hiddenInput()->label(false) ?>

                    <?= $form->field($model, 'active')->textInput()->label(false) ?>

                    <div class="form-group">
                        <?= Html::submitButton('Добавить', ['class' => 'btn btn-success']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>

                </div>
            </div>
        </div>
    <?php endforeach; ?>

</div>
