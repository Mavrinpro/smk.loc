<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */

/** @var \frontend\models\SignupForm $model */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="app-container app-theme-white body-tabs-shadow">
        <div class="app-container">
            <div class="h-100">
                <div class="h-100 no-gutters row">
                    <div class="d-none d-lg-block col-lg-4">
                        <div class="slider-light">
                            <div class="slick-slider slick-initialized slick-dotted">

                                <div class="slick-list draggable">
                                    <div class="slick-track"
                                         style="opacity: 1; width: 3584px; transform: translate3d(-1536px, 0px, 0px);">
                                        <div class="slick-slide slick-cloned" data-slick-index="-1" id=""
                                             aria-hidden="true"
                                             tabindex="-1" style="width: 512px;">
                                        </div>

                                        <div class="slick-slide slick-cloned" data-slick-index="1" aria-hidden="true"
                                             role="tabpanel"
                                             id="slick-slide01" aria-describedby="slick-slide-control01"
                                             style="width: 512px;" tabindex="-1">

                                        </div>

                                        <div class="slick-slide slick-cloned" data-slick-index="3" id=""
                                             aria-hidden="true"
                                             tabindex="-1" style="width: 512px;">

                                        </div>
                                        <div class="slick-slide slick-cloned" data-slick-index="1" id=""
                                             aria-hidden="true"
                                             tabindex="-1" style="width: 512px;">
                                            <div>
                                                <div style="width: 100%; display: inline-block;">
                                                    <div class="position-relative h-100 d-flex justify-content-center
                                                align-items-center" style="background-image: url(/img/bg_login.svg)"
                                                         tabindex="-1">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="h-100 d-flex bg-white justify-content-center align-items-center col-md-12 col-lg-6">
                        <div class="mx-auto app-login-box col-sm-12 col-md-10 col-lg-7">
                            <div class="app-logo"></div>
                            <h4 class="mb-0">
                                <span>Регистрация в системе</span>
                            </h4>
                            <div class="divider row"></div>
                            <div>
                                <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
                                <?= $form->field($model, 'fio')->textInput(['autofocus' => true]) ?>
                                <?= $form->field($model, 'company_id')->dropDownList(ArrayHelper::map(app\models\Company::find()
                                    ->asArray()->all(), 'id', 'name'), ['prompt' => 'Укажите компанию'])
                                ?>
                                <?= $form->field($model, 'city_id')->dropDownList(ArrayHelper::map(app\models\Branch::find()->asArray()
                                    ->all(), 'id', 'name'), ['prompt' => 'Выберите город']) ?>
                                <!--                --><? //= $form->field($model, 'department_id') ->dropDownList(ArrayHelper::map(app\models\Department::find()
                                //                    ->asArray()
                                //                ->all(), 'id','name'),['prompt'=>'Выберите свой отдел']) ?>
                                <div class="form-group field-signupform-department_id">
                                    <!--                                <label for="signupform-department_id">Отдел</label>-->
                                    <!--                                <select id="signupform-department_id" class="form-control" name="SignupForm[department_id]">-->
                                    <!--                                    <option value="">Выберите свой отдел</option>-->
                                    <!--                                    <option value="2">Управление персоналом</option>-->
                                    <!--                                    <option value="3">Администраторы</option>-->
                                    <!--                                    <option value="4">Мед. персонал</option>-->
                                    <!--                                    <option value="5">КЦ</option>-->
                                    <!--                                    <option value="6">Меркетинг</option>-->
                                    <!--                                    <option value="7">Стратегическое управление</option>-->
                                    <!--                                    <option value="8">Администраторы</option>-->
                                    <!--                                    <option value="9">Мед. персонал</option>-->
                                    <!--                                    <option value="10">Стратегическое управление</option>-->
                                    <!--                                    <option value="11">Администраторы</option>-->
                                    <!--                                    <option value="12">Мед. персонал</option>-->
                                    <!--                                    <option value="13">Стратегическое управление</option>-->
                                    <!--                                    <option value="14">Администраторы</option>-->
                                    <!--                                    <option value="16">Стратегическое управление</option>-->
                                    <!--                                    <option value="17">Администраторы</option>-->
                                    <!--                                    <option value="18">Мед. персонал</option>-->
                                    <!--                                    <option value="19">Мед. персонал</option>-->
                                    <!--                                    <option value="20">Стратегическое управление</option>-->
                                    <!--                                </select>-->

                                    <div class="invalid-feedback"></div>
                                </div>

                                <?= $form->field($model, 'email') ?>

                                <?= $form->field($model, 'password')->passwordInput() ?>

                                <div class="form-group">
                                    <?= Html::submitButton('Регистрация', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                                </div>

                                <?php ActiveForm::end(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php

$js = <<< JS

var select          = $('#signupform-city_id'),
    form_department = $('.field-signupform-department_id');
select.on('change', function (event){
    event.preventDefault(); 
    var th = $(this);
    //console.log(th.val())
    $.ajax({
                type: 'POST',
                url: 'site/ajax-select',
                data: {
                    id: th.val(), 
                    //action: 'loadmore'
                },
                dataType: 'json',
                // beforeSend: function (xhr) {
                //     button.addClass('border_none');
                //     button.html('<img src="ссылка на gif загрузчик"/>');
                // },
                success: function (data) {
                    //console.log(data)
                    var sel = data.label;
                    sel += data.sel;
                    sel += data.opt_empty;
                    sel += data.id;
                    sel += data.sel_close
                    
                    
                    form_department.html(sel);
                   
                }
            });
    
})

JS;
$this->registerJs($js);
