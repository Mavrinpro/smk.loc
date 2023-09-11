<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var app\models\Doctor $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="doctor-form">
<?php $action  = Yii::$app->controller->action->id; ?>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fio')->textInput() ?>
    <?= $form->field($model, 'branch_id')->dropDownList(ArrayHelper::map(app\models\Branch::find()->asArray()
        ->all(), 'id', 'name'), ['prompt' => 'Выберите город']) ?>
<?php if ($action == 'create'): ?>
    <?= $form->field($model, 'create_at')->hiddenInput(['value' => time()])->label(false) ?>
<?php else: ?>
    <?= $form->field($model, 'update_at')->hiddenInput(['value' => time()])->label(false) ?>
<?php endif; ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>