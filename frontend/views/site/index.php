<?php
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use frontend\models\IndexForm;
/** @var yii\web\View $this */

$this->title = 'Шредирование и полное уничтожение документов';
?>
<div class="bg-wrapper pb-5">

    <section class="bg_head mt-5 pt-5">
        <div class="container mt-5">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1>Шредирование и полное уничтожение документов</h1>
                    <span class="sub-text mt-5">Предоставляем услуги по шредированию бумаги и полному уничтожению документов.</span>
                    <a href="<?= \yii\helpers\Url::to('site/services') ?>" class="btn btn-primary btn-lg br-50 pl-5 pr-5 shadow">Подробнее</a>
                </div>
                <div class="col-md-6">
                    <img src="/img/bum.png" alt="шреддер" class="img-fluid">
                </div>

            </div>
        </div>
    </section>
</div>
<section class="twoblocks mt-5">
    <div class="container">
        <div class="row position-relative twoblocks_after">
            <div class="col-md-6">
                <div class="block rounded shadow p-3 bg_dark_blue text-light">
                    <a href="/uslugi/" class="title">Виды документов для уничтожения</a>
                    <span class="sub-text">бухгалтерские документы, договоры, налоговую отчетность, оборотные ведомости, акты и т.п. следует хранить не менее 5 лет. По истечении этого времени от бумажных архивов можно избавляться, но делать это нужно с соблюдением особых процедур.</span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="block rounded shadow p-3 bg-white">
                    <a href="/uslugi/" class="title">Способ уничтожения документов</a>
                    <span class="sub-text">Измельчение бумаги на промышленном шредере на мелкие фрагменты. В процессе резки частицы перемешиваются, поэтому восстановление документации невозможно. Результат утилизации соответствует высокому уровню секретности по европейским стандартам.</span>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?= $this->render('__form', ['model' => $model]); ?>
            </div>
        </div>
    </div>
</section>
<section class="mt-5 advanced">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="mb-5">Наши преимущества</h3>
            </div>
            <div class="col-md-4 mt-5">
                <div class="block rounded shadow p-3 bg_white position-relative justify-content-center d-flex pt-5 align-items-center flex-column">
                    <div class="circle_number position-absolute"><span>1</span></div>
                    <span class="title">Минимальное время выполнения</span>
                    <span class="text">Качества и скорость предоставления услуги осуществляется за счет использования отработанных схем.</span>
                </div>
            </div>
            <div class="col-md-4 mt-5">
                <div class="block rounded shadow p-3 bg_dark_blue text-light position-relative justify-content-center d-flex pt-5 mt-5 mt-md-0 align-items-center flex-column">
                    <div class="circle_number position-absolute"><span>2</span></div>
                    <span class="title">Экономия до 30%</span>
                    <span class="text">Работаем без посредников. Поэтому гарантируем вам честную цену на услуги без наценок и ежемесячной индексации</span>
                </div>
                </div>
            <div class="col-md-4 mt-5">
                <div class="block rounded shadow p-3 bg_white position-relative justify-content-center d-flex pt-5 mt-5 mt-md-0 align-items-center flex-column">
                    <div class="circle_number position-absolute"><span>3</span></div>
                    <span class="title">Снижение рисков</span>
                    <span class="text">Работаем на современном оборудовании, прошедшее проверку и техническое обслушивание.</span>
                </div>
            </div>
            </div>

        </div>
    </div>
</section>
