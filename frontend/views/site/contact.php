<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */

/** @var \frontend\models\ContactForm $model */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\IndexForm;
use frontend\assets\MapAsset;

$this->title = 'ООО «ЕСА-МСМ»';
$this->params['breadcrumbs'][] = $this->title;
MapAsset::register($this)?>
<section class="mt-5 pt-5">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h1><?= Html::encode($this->title) ?></h1>
                <p>109029 г. Москва ВН. ТЕР. Г. МУНИЦИПАЛЬНЫЙ ОКРУГ НИЖЕГОРОДСКИЙ, УЛ. СКОТОПРОГОННАЯ, Д. 29/1, ЭТАЖ 2, ПОМ./ОФ. XVI/226
                <p>ИНН 9722012001</p>
                <p>ОГРН 1217700585981</p>
                <p>тел: 89636847261/89162900050</p>
                <p>Склад: г. Москва, ул. Талалихина, д. 41 стр. 33 №5. Договор аренды № 11 от 25.12.2019г. (Арендодатель ООО «Воски»). </p>
                <p>г. Москва, ул. Скотопрогонная, д. 29/1, пом. XVI, офис 226. Договор аренды № 434 от 02.12.2021г.</p>
                <p>Генеральный директор: Евстафьева С.М.</p>
                <div id="map" style="width: 100%; height: 400px"></div>
                <?= $this->render('__form', ['model' => $model]); ?>
            </div>

        </div>

    </div>
</section>
