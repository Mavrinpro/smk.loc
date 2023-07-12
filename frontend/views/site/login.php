<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */

/** @var \common\models\LoginForm $model */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<!--<div class="site-login">-->
<!--    <h1>--><? //= Html::encode($this->title) ?><!--</h1>-->
<!---->
<!--    <p>Please fill out the following fields to login:</p>-->
<!---->
<!--    <div class="row">-->
<!--        <div class="col-lg-5">-->
<!--            --><?php //$form = ActiveForm::begin(['id' => 'login-form']); ?>
<!---->
<!--                --><? //= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
<!---->
<!--                --><? //= $form->field($model, 'password')->passwordInput() ?>
<!---->
<!--                --><? //= $form->field($model, 'rememberMe')->checkbox() ?>
<!---->
<!--                <div style="color:#999;margin:1em 0">-->
<!--                    If you forgot your password you can --><? //= Html::a('reset it', ['site/request-password-reset']) ?><!--.-->
<!--                    <br>-->
<!--                    Need new verification email? --><? //= Html::a('Resend', ['site/resend-verification-email']) ?>
<!--                </div>-->
<!---->
<!--                <div class="form-group">-->
<!--                    --><? //= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
<!--                </div>-->
<!---->
<!--            --><?php //ActiveForm::end(); ?>
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
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
                                                <div class="position-relative h-100 d-flex justify-content-center align-items-center bg-plum-plate"
                                                     tabindex="-1">

                                                    <div class="slider-content">
                                                        <h3>Scalable, Modular, Consistent</h3>
                                                        <p>Easily exclude the components you don't require. Lightweight,
                                                            consistent
                                                            Bootstrap based styles across all elements and components
                                                        </p>
                                                    </div>
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
                            <span class="d-block">Welcome back,</span>
                            <span>Please sign in to your account.</span>
                        </h4>
                        <h6 class="mt-3">No account? <a href="javascript:void(0);" class="text-primary">Sign up now</a>
                        </h6>
                        <div class="divider row"></div>
                        <div>
                            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                            <?= $form->field($model, 'password')->passwordInput() ?>

                            <?= $form->field($model, 'rememberMe')->checkbox() ?>

                            <div style="color:#999;margin:1em 0">
                                If you forgot your password you
                                can <?= Html::a('reset it', ['site/request-password-reset']) ?>.
                                <br>
                                Need new verification
                                email? <?= Html::a('Resend', ['site/resend-verification-email']) ?>
                            </div>

                            <div class="form-group">
                                <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                            </div>

                            <?php ActiveForm::end(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
