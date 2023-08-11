<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var \frontend\models\PasswordResetRequestForm $model */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Request password reset';
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
                                        <div class="slick-slide slick-cloned" data-slick-index="-1" id="" aria-hidden="true"
                                             tabindex="-1" style="width: 512px;">
                                        </div>

                                        <div class="slick-slide slick-cloned" data-slick-index="1" aria-hidden="true" role="tabpanel"
                                             id="slick-slide01" aria-describedby="slick-slide-control01"
                                             style="width: 512px;" tabindex="-1">

                                        </div>

                                        <div class="slick-slide slick-cloned" data-slick-index="3" id="" aria-hidden="true"
                                             tabindex="-1" style="width: 512px;">

                                        </div>
                                        <div class="slick-slide slick-cloned" data-slick-index="1" id="" aria-hidden="true"
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

                            <div class="site-request-password-reset">
                                <h1><?= Html::encode($this->title) ?></h1>

                                <p>Please fill out your email. A link to reset password will be sent there.</p>
                            <div class="divider row"></div>
                            <div>
            <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>

                <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Send', ['class' => 'btn btn-primary']) ?>
                </div>

            <?php ActiveForm::end(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
