<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var app\models\BusinessTrip $model */
/** @var yii\widgets\ActiveForm $form */
?>

    <div class="business-trip-form">
        <?php

        $action = Yii::$app->controller->action->id; ?>
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'department_id')->hiddenInput(['value' => \Yii::$app->request->get('department_id')])->label(false) ?>
        <?= $form->field($model, 'doctor_id')->dropDownList(ArrayHelper::map(app\models\Doctor::find()->asArray()
            ->all(), 'id', 'fio'), ['prompt' => 'Выбрать врача']) ?>
<?= $form->field($model, 'branch_id')->dropDownList(ArrayHelper::map(app\models\Branch::find()->asArray()
    ->all(), 'id', 'name'), ['prompt' => 'Выбрать филиал']) ?>

        <?php if ($action == 'create'): ?>
            <?= $form->field($model, 'user_id_create')->hiddenInput(['value' => \Yii::$app->getUser()->id])->label(false) ?>
            <?= $form->field($model, 'create_at')->hiddenInput(['value' => time()])->label(false) ?>
            <div class="row">
                <div class="col-md-6">

                    <?= $form->field($model, 'start_trip')->textInput(['value' => date('Y-m-d')]) ?>

                </div>

                <div class="col-md-6">

                    <?= $form->field($model, 'end_trip')->textInput(['value' => date('Y-m-d')]) ?>

                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($model, 'date_of_departure')->textInput(['value' => date('Y-m-d')]) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'return_date')->textInput(['value' => date('Y-m-d')]) ?>
                </div>
            </div>
        <?php else: ?>

                <?= $form->field($model, 'user_id_update')->hiddenInput(['value' => \Yii::$app->getUser()->id])->label(false) ?>


                <?= $form->field($model, 'update_at')->hiddenInput(['value' => time()])->label(false) ?>
    </div>
            <div class="row">
                <div class="col-md-6">

                    <?php //var_dump($model->getOldAttributes()['start_trip'])?>
                    <?= $form->field($model, 'start_trip')->textInput(['value' => date('Y-m-d', $model->getOldAttributes()
                    ['start_trip'])]) ?>

                    <!--            --><? //= $form->field($model, 'start_trip')->widget(\kartik\date\DatePicker::class, [
                    //
                    //                'options' => [
                    //                    'autocomplete' => 'off',
                    //                    'placeholder' => 'Выберите дату',
                    //                    'data' => [
                    //                        'picker' => 'datepicker'
                    //                    ],
                    //                   // 'value' => Yii::$app->formatter->asDate($model->start_trip, 'yyyy-MM-dd'),
                    //                    'value' => date('Y-m-d', $model->start_trip),
                    //                    'type' => \kartik\date\DatePicker::TYPE_COMPONENT_APPEND,
                    //                ],
                    //                'pluginOptions' => [
                    //                    'autoclose' => true,
                    //                    'startDate' => 'd',
                    //                    'todayHighlight' => true,
                    //                    'format' => 'yyyy-mm-dd',
                    //
                    //                ]
                    //            ]) ?>
                </div>
                <div class="col-md-6">

                    <?= $form->field($model, 'end_trip')->textInput(['value' => date('Y-m-d', $model->getOldAttributes()
                    ['end_trip'])]) ?>

                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($model, 'date_of_departure')->textInput(['value' => date('Y-m-d', $model->getOldAttributes()
                    ['date_of_departure'])]) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'return_date')->textInput(['value' => date('Y-m-d', $model->getOldAttributes()
                    ['return_date'])]) ?>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($action == 'create'): ?>
            <div class="form-group">
                <?= Html::submitButton('Добавить', ['class' => 'btn btn-success']) ?>
            </div>
        <?php else: ?>
            <div class="form-group">
                <?= Html::submitButton('Изменить', ['class' => 'btn btn-success']) ?>
            </div>
        <?php endif; ?>
        <?php ActiveForm::end(); ?>

    </div>

<?php


$js = <<< JS

$('#businesstrip-start_trip, #businesstrip-end_trip, #businesstrip-date_of_departure, #businesstrip-return_date').datepicker({
format: "yyyy-mm-dd",
    //orientation: "top auto",
    toggleActive: true,
     language: "ru",
     autoclose: true,
     todayHighlight: true,
     
   
});


JS;
$this->registerJs($js);
