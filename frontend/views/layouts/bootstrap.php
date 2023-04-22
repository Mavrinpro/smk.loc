<?php

/** @var \yii\web\View $this */
/** @var string $content */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>
<?= $content ?>
<?php $this->endBody() ?>
<section>

    <nav class="navbar navbar-expand-lg navbar-light bg_transparent pt-3 pb-3 fixed-top">
        <div class="container">
            <a class="navbar-brand" href="<?=\yii\helpers\Url::to(['site/index']) ?>"><img src="/img/logo.png" alt="logo" width="60" class="logo"></a>
            <span class="navbar-text d-md-none d-block">
      <a href="tel:89636847261" class="btn br-50 bg_dark_blue text-light"><img src="/img/phone-call.png" alt="logo" width="18"></a>
    </span>
            <div class="hamburger hamburger--elastic navbar-toggler border-0 collapsed" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <div class="hamburger-box navbar-toggler border-0 collapsed">
                    <div class="hamburger-inner"></div>
                </div>
            </div>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link active" href="<?=\yii\helpers\Url::to(['site/index']) ?>">Home <span class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link" href="<?=\yii\helpers\Url::to(['site/about']) ?>">О компании</a>
                    <a class="nav-item nav-link" href="<?=\yii\helpers\Url::to(['site/services']) ?>">Услуги</a>
                    <a class="nav-item nav-link" href="<?=\yii\helpers\Url::to(['site/contact']) ?>">Контакты</a>
                    <a class="nav-item nav-link " href="#">Disabled</a>
                </div>
            </div>
            <span class="navbar-text d-none d-md-block">
      <a href="tel:89636847261" class="btn br-50 bg_dark_blue text-light"><img src="/img/phone-call.png" alt="logo" width="18"> 89636847261</a>
    </span>
        </div>
    </nav>
</section>
<footer class="bg_dark_blue text-white p-md-5 p-3 mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-3 mb-md-0">
                <p><b>ООО «ЕСА-МСМ»</b></p>
                <p><b>Адрес:</b> <small class="small-text">109029  г. Москва вн. тер. г. муниципальный округ Нижегородский, ул. Скотопрогонная, д. 29/1, этаж 2, пом./оф. xvi/226</small></p>
                <p><b>ИНН:</b> <small class="small-text">9722012001</small></p>
                <p><b>ОГРН:</b> <small class="small-text">1217700585981</small></p>
            </div>
            <hr class="d-inline-block d-md-none">
            <div class="col-md-4 mb-3 mb-md-0">
                <p><b>Контакты</b></p>
                <p><a href="tel:89636847261">8 (963) 684-72-61</a></p>
                <p><a href="tel:89162900050">8 (916) 290-00-50</a></p>
            </div>
            <div class="col-md-4">
                <p><a href="<?= \yii\helpers\Url::to('/about') ?>">О компании</a></p>
                <p><a href="<?= \yii\helpers\Url::to('/services') ?>">Услуги</a></p>
                <p><a href="<?= \yii\helpers\Url::to('/contact') ?>">Контакты</a></p>
                <p><a href="<?= \yii\helpers\Url::to('/politics') ?>">Политика конфиденциальности</a></p>
            </div>
        </div>
    </div>
</footer>
<section class="p-3 bg_blue">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <p>© <?php echo date('Y') ?>, Шредирование бумаги. Все права защищены.</p>
            </div>
        </div>
    </div>
</section>
</body>
</html>
<?php $this->endPage();
