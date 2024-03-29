<?php

/** @var \yii\web\View $this */
/** @var string $content */

use yii\bootstrap4\Modal;
use yii\bootstrap4\ActiveForm;
use common\widgets\Alert;
use frontend\assets\AppAsset;
//use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
//use yii\bootstrap4\Nav;
//use yii\bootstrap4\NavBar;
use app\components\widgets\AlertWidget;
use yii\widgets\Breadcrumbs;
$question = new app\models\Question();
$answer = new app\models\Answer();
$userform = new frontend\models\SignupForm();


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



<div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar fixed-footer">
<?= $this->render('nav-menu')?>
<!--    --><?php
//    Modal::begin( [
//        'id' => 'werex',
//        'title' => '<h5>Добавить название файлу</h5>',
//        //'toggleButton' => ['label' => 'Добавить задачу', 'class' => 'btn btn-warning'],
//        //'footer' => 'Footer',
//
//    ] );
//
//
//
//
//    Modal::end();
//    ?>
    <div class="ui-theme-settings">
        <button type="button" id="TooltipDemo" class="btn-open-options btn btn-warning">
            <i class="fa fa-cog fa-w-16 fa-spin fa-2x"></i>
        </button>
        <div class="theme-settings__inner">
            <div class="scrollbar-container ps ps--active-y">
                <div class="theme-settings__options-wrapper">
                    <h3 class="themeoptions-heading">Layout Options</h3>
                    <div class="p-3">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <div class="widget-content p-0">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left mr-3">
                                            <div class="switch has-switch switch-container-class" data-class="fixed-header">
                                                <div class="switch-animate switch-on">
                                                    <input type="checkbox" checked data-toggle="toggle" data-onstyle="success">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Fixed Header</div>
                                            <div class="widget-subheading">Makes the sidebar left fixed, always visible!</div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="widget-content p-0">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left mr-3">
                                            <div class="switch has-switch switch-container-class" data-class="fixed-sidebar">
                                                <div class="switch-animate switch-on">
                                                    <input type="checkbox" checked data-toggle="toggle" data-onstyle="success">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Fixed Sidebar</div>
                                            <div class="widget-subheading">Makes the sidebar left fixed, always visible!</div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="widget-content p-0">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left mr-3">
                                            <div class="switch has-switch switch-container-class" data-class="fixed-footer">
                                                <div class="switch-animate switch-on">
                                                    <input type="checkbox" data-toggle="toggle" data-onstyle="success">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Fixed Footer</div>
                                            <div class="widget-subheading">Makes the sidebar left fixed, always visible!</div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <h3 class="themeoptions-heading">
                        <div> Header Options</div>
                        <button type="button"
                                class="btn-pill btn-shadow btn-wide ml-auto btn btn-focus btn-sm switch-header-cs-class"
                                data-class="">
                            Restore Default
                        </button>
                    </h3>
                    <div class="p-3">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <h5 class="pb-2">Choose Color Scheme</h5>
                                <div class="theme-settings-swatches">
                                    <div class="swatch-holder bg-primary switch-header-cs-class"
                                         data-class="bg-primary header-text-light"></div>
                                    <div class="swatch-holder bg-secondary switch-header-cs-class"
                                         data-class="bg-secondary header-text-light"></div>
                                    <div class="swatch-holder bg-success switch-header-cs-class"
                                         data-class="bg-success header-text-light"></div>
                                    <div class="swatch-holder bg-info switch-header-cs-class"
                                         data-class="bg-info header-text-light"></div>
                                    <div class="swatch-holder bg-warning switch-header-cs-class"
                                         data-class="bg-warning header-text-dark"></div>
                                    <div class="swatch-holder bg-danger switch-header-cs-class"
                                         data-class="bg-danger header-text-light"></div>
                                    <div class="swatch-holder bg-light switch-header-cs-class"
                                         data-class="bg-light header-text-dark"></div>
                                    <div class="swatch-holder bg-dark switch-header-cs-class"
                                         data-class="bg-dark header-text-light"></div>
                                    <div class="swatch-holder bg-focus switch-header-cs-class"
                                         data-class="bg-focus header-text-light"></div>
                                    <div class="swatch-holder bg-alternate switch-header-cs-class"
                                         data-class="bg-alternate header-text-light"></div>
                                    <div class="divider"></div>
                                    <div class="swatch-holder bg-vicious-stance switch-header-cs-class"
                                         data-class="bg-vicious-stance header-text-light"></div>
                                    <div class="swatch-holder bg-midnight-bloom switch-header-cs-class"
                                         data-class="bg-midnight-bloom header-text-light"></div>
                                    <div class="swatch-holder bg-night-sky switch-header-cs-class"
                                         data-class="bg-night-sky header-text-light"></div>
                                    <div class="swatch-holder bg-slick-carbon switch-header-cs-class"
                                         data-class="bg-slick-carbon header-text-light"></div>
                                    <div class="swatch-holder bg-asteroid switch-header-cs-class"
                                         data-class="bg-asteroid header-text-light"></div>
                                    <div class="swatch-holder bg-royal switch-header-cs-class"
                                         data-class="bg-royal header-text-light"></div>
                                    <div class="swatch-holder bg-warm-flame switch-header-cs-class"
                                         data-class="bg-warm-flame header-text-dark"></div>
                                    <div class="swatch-holder bg-night-fade switch-header-cs-class"
                                         data-class="bg-night-fade header-text-dark"></div>
                                    <div class="swatch-holder bg-sunny-morning switch-header-cs-class"
                                         data-class="bg-sunny-morning header-text-dark"></div>
                                    <div class="swatch-holder bg-tempting-azure switch-header-cs-class"
                                         data-class="bg-tempting-azure header-text-dark"></div>
                                    <div class="swatch-holder bg-amy-crisp switch-header-cs-class"
                                         data-class="bg-amy-crisp header-text-dark"></div>
                                    <div class="swatch-holder bg-heavy-rain switch-header-cs-class"
                                         data-class="bg-heavy-rain header-text-dark"></div>
                                    <div class="swatch-holder bg-mean-fruit switch-header-cs-class"
                                         data-class="bg-mean-fruit header-text-dark"></div>
                                    <div class="swatch-holder bg-malibu-beach switch-header-cs-class"
                                         data-class="bg-malibu-beach header-text-light"></div>
                                    <div class="swatch-holder bg-deep-blue switch-header-cs-class"
                                         data-class="bg-deep-blue header-text-dark"></div>
                                    <div class="swatch-holder bg-ripe-malin switch-header-cs-class"
                                         data-class="bg-ripe-malin header-text-light"></div>
                                    <div class="swatch-holder bg-arielle-smile switch-header-cs-class"
                                         data-class="bg-arielle-smile header-text-light"></div>
                                    <div class="swatch-holder bg-plum-plate switch-header-cs-class"
                                         data-class="bg-plum-plate header-text-light"></div>
                                    <div class="swatch-holder bg-happy-fisher switch-header-cs-class"
                                         data-class="bg-happy-fisher header-text-dark"></div>
                                    <div class="swatch-holder bg-happy-itmeo switch-header-cs-class"
                                         data-class="bg-happy-itmeo header-text-light"></div>
                                    <div class="swatch-holder bg-mixed-hopes switch-header-cs-class"
                                         data-class="bg-mixed-hopes header-text-light"></div>
                                    <div class="swatch-holder bg-strong-bliss switch-header-cs-class"
                                         data-class="bg-strong-bliss header-text-light"></div>
                                    <div class="swatch-holder bg-grow-early switch-header-cs-class"
                                         data-class="bg-grow-early header-text-light"></div>
                                    <div class="swatch-holder bg-love-kiss switch-header-cs-class"
                                         data-class="bg-love-kiss header-text-light"></div>
                                    <div class="swatch-holder bg-premium-dark switch-header-cs-class"
                                         data-class="bg-premium-dark header-text-light"></div>
                                    <div class="swatch-holder bg-happy-green switch-header-cs-class"
                                         data-class="bg-happy-green header-text-light"></div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <h3 class="themeoptions-heading">
                        <div>Sidebar Options</div>
                        <button type="button"
                                class="btn-pill btn-shadow btn-wide ml-auto btn btn-focus btn-sm switch-sidebar-cs-class"
                                data-class="">
                            Restore Default
                        </button>
                    </h3>
                    <div class="p-3">
                        <ul class="list-group">

                            <li class="list-group-item">
                                <h5 class="pb-2">Choose Color Scheme</h5>
                                <div class="theme-settings-swatches">
                                    <div class="swatch-holder bg-primary switch-sidebar-cs-class"
                                         data-class="bg-primary sidebar-text-light"></div>
                                    <div class="swatch-holder bg-secondary switch-sidebar-cs-class"
                                         data-class="bg-secondary sidebar-text-light"></div>
                                    <div class="swatch-holder bg-success switch-sidebar-cs-class"
                                         data-class="bg-success sidebar-text-dark"></div>
                                    <div class="swatch-holder bg-info switch-sidebar-cs-class"
                                         data-class="bg-info sidebar-text-dark"></div>
                                    <div class="swatch-holder bg-warning switch-sidebar-cs-class"
                                         data-class="bg-warning sidebar-text-dark"></div>
                                    <div class="swatch-holder bg-danger switch-sidebar-cs-class"
                                         data-class="bg-danger sidebar-text-light"></div>
                                    <div class="swatch-holder bg-light switch-sidebar-cs-class"
                                         data-class="bg-light sidebar-text-dark"></div>
                                    <div class="swatch-holder bg-dark switch-sidebar-cs-class"
                                         data-class="bg-dark sidebar-text-light"></div>
                                    <div class="swatch-holder bg-focus switch-sidebar-cs-class"
                                         data-class="bg-focus sidebar-text-light"></div>
                                    <div class="swatch-holder bg-alternate switch-sidebar-cs-class"
                                         data-class="bg-alternate sidebar-text-light"></div>
                                    <div class="divider"></div>
                                    <div class="swatch-holder bg-vicious-stance switch-sidebar-cs-class"
                                         data-class="bg-vicious-stance sidebar-text-light"></div>
                                    <div class="swatch-holder bg-midnight-bloom switch-sidebar-cs-class"
                                         data-class="bg-midnight-bloom sidebar-text-light"></div>
                                    <div class="swatch-holder bg-night-sky switch-sidebar-cs-class"
                                         data-class="bg-night-sky sidebar-text-light"></div>
                                    <div class="swatch-holder bg-slick-carbon switch-sidebar-cs-class"
                                         data-class="bg-slick-carbon sidebar-text-light"></div>
                                    <div class="swatch-holder bg-asteroid switch-sidebar-cs-class"
                                         data-class="bg-asteroid sidebar-text-light"></div>
                                    <div class="swatch-holder bg-royal switch-sidebar-cs-class"
                                         data-class="bg-royal sidebar-text-light"></div>
                                    <div class="swatch-holder bg-warm-flame switch-sidebar-cs-class"
                                         data-class="bg-warm-flame sidebar-text-dark"></div>
                                    <div class="swatch-holder bg-night-fade switch-sidebar-cs-class"
                                         data-class="bg-night-fade sidebar-text-dark"></div>
                                    <div class="swatch-holder bg-sunny-morning switch-sidebar-cs-class"
                                         data-class="bg-sunny-morning sidebar-text-dark"></div>
                                    <div class="swatch-holder bg-tempting-azure switch-sidebar-cs-class"
                                         data-class="bg-tempting-azure sidebar-text-dark"></div>
                                    <div class="swatch-holder bg-amy-crisp switch-sidebar-cs-class"
                                         data-class="bg-amy-crisp sidebar-text-dark"></div>
                                    <div class="swatch-holder bg-heavy-rain switch-sidebar-cs-class"
                                         data-class="bg-heavy-rain sidebar-text-dark"></div>
                                    <div class="swatch-holder bg-mean-fruit switch-sidebar-cs-class"
                                         data-class="bg-mean-fruit sidebar-text-dark"></div>
                                    <div class="swatch-holder bg-malibu-beach switch-sidebar-cs-class"
                                         data-class="bg-malibu-beach sidebar-text-light"></div>
                                    <div class="swatch-holder bg-deep-blue switch-sidebar-cs-class"
                                         data-class="bg-deep-blue sidebar-text-dark"></div>
                                    <div class="swatch-holder bg-ripe-malin switch-sidebar-cs-class"
                                         data-class="bg-ripe-malin sidebar-text-light"></div>
                                    <div class="swatch-holder bg-arielle-smile switch-sidebar-cs-class"
                                         data-class="bg-arielle-smile sidebar-text-light"></div>
                                    <div class="swatch-holder bg-plum-plate switch-sidebar-cs-class"
                                         data-class="bg-plum-plate sidebar-text-light"></div>
                                    <div class="swatch-holder bg-happy-fisher switch-sidebar-cs-class"
                                         data-class="bg-happy-fisher sidebar-text-dark"></div>
                                    <div class="swatch-holder bg-happy-itmeo switch-sidebar-cs-class"
                                         data-class="bg-happy-itmeo sidebar-text-light"></div>
                                    <div class="swatch-holder bg-mixed-hopes switch-sidebar-cs-class"
                                         data-class="bg-mixed-hopes sidebar-text-light"></div>
                                    <div class="swatch-holder bg-strong-bliss switch-sidebar-cs-class"
                                         data-class="bg-strong-bliss sidebar-text-light"></div>
                                    <div class="swatch-holder bg-grow-early switch-sidebar-cs-class"
                                         data-class="bg-grow-early sidebar-text-light"></div>
                                    <div class="swatch-holder bg-love-kiss switch-sidebar-cs-class"
                                         data-class="bg-love-kiss sidebar-text-light"></div>
                                    <div class="swatch-holder bg-premium-dark switch-sidebar-cs-class"
                                         data-class="bg-premium-dark sidebar-text-light"></div>
                                    <div class="swatch-holder bg-happy-green switch-sidebar-cs-class"
                                         data-class="bg-happy-green sidebar-text-light"></div>
                                </div>
                            </li>

                        </ul>
                    </div>
                    <h3 class="themeoptions-heading">
                        <div>Main Content Options</div>
                        <button type="button" class="btn-pill btn-shadow btn-wide ml-auto active btn btn-focus btn-sm">
                            Restore Default
                        </button>
                    </h3>
                    <div class="p-3">
                        <ul class="list-group">

                            <li class="list-group-item">
                                <h5 class="pb-2">Page Section Tabs</h5>
                                <div class="theme-settings-swatches">
                                    <div role="group" class="mt-2 btn-group">
                                        <button type="button"
                                                class="btn-wide btn-shadow btn-primary btn btn-secondary switch-theme-class"
                                                data-class="body-tabs-line"> Line
                                        </button>
                                        <button type="button"
                                                class="btn-wide btn-shadow btn-primary active btn btn-secondary switch-theme-class"
                                                data-class="body-tabs-shadow"> Shadow
                                        </button>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <h5 class="pb-2">Light Color Schemes
                                </h5>
                                <div class="theme-settings-swatches">
                                    <div role="group" class="mt-2 btn-group">
                                        <button type="button"
                                                class="btn-wide btn-shadow btn-primary active btn btn-secondary switch-theme-class"
                                                data-class="app-theme-white"> White Theme
                                        </button>
                                        <button type="button"
                                                class="btn-wide btn-shadow btn-primary btn btn-secondary switch-theme-class"
                                                data-class="app-theme-gray"> Gray Theme
                                        </button>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                    <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                </div>
                <div class="ps__rail-y" style="top: 0px; height: 754px; right: 0px;">
                    <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 487px;"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="app-main">
        <?= $this->render('sidebar-left') ?>
        <div class="app-main__inner">
<?php $this->beginBody() ?><div class="app-page-title">

                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div class="page-title-icon">
                            <i class="pe-7s-network icon-gradient bg-ripe-malin"></i>
                        </div>
                        <?= Breadcrumbs::widget([
                            //'homeLink' => ['label' => 'Главная', 'url' => '/'],
                            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                            //'itemTemplate' => "<li>{link}</li>",
                            'options' => [
                                'class' => 'custom-breadcrumbs'
                            ]
                        ])

                        ?>
                    </div>

                    <div class="page-title-actions">
<!--                        <button type="button" data-toggle="tooltip" title="" data-placement="bottom" class="btn-shadow mr-3 btn btn-dark" data-original-title="Example Tooltip">-->
<!--                            <i class="fa fa-star"></i>-->
<!--                        </button>-->
                        <div class="d-inline-block dropdown">
                            <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn-shadow dropdown-toggle btn btn-info">
<span class="btn-icon-wrapper pr-2 opacity-7">
<i class="fa fa-cog fa-w-20"></i>
</span>
                                Действие
                            </button>
                            <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link">
                                            <i class="nav-link-icon lnr-pointer-right"></i>
                                            <span> Передать</span>
<!--                                            <div class="ml-auto badge badge-pill badge-secondary">86</div>-->
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link">
                                            <i class="nav-link-icon lnr-printer"></i>
                                            <span> Печать</span>
<!--                                            <div class="ml-auto badge badge-pill badge-danger">5</div>-->
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link">
                                            <i class="nav-link-icon lnr-download"></i>
                                            <span> Скачать</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a disabled="" class="nav-link disabled">
                                            <i class="nav-link-icon lnr-file-empty"></i>
                                            <span> File Disabled</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?= AlertWidget::widget() ?>
<?= $content ?>

        </div>
        <div class="app-wrapper-footer">
            <div class="app-footer">
                <div class="app-footer__inner">
                    <div class="app-footer-left">
                        <div class="footer-dots">
                            <div class="dropdown">
                                <a aria-haspopup="true" aria-expanded="false" data-toggle="dropdown"
                                   class="dot-btn-wrapper">
                                    <i class="dot-btn-icon lnr-bullhorn icon-gradient bg-mean-fruit"></i>
                                    <div class="badge badge-dot badge-abs badge-dot-sm badge-danger">Notifications</div>
                                </a>
                                <div tabindex="-1" role="menu" aria-hidden="true"
                                     class="dropdown-menu-xl rm-pointers dropdown-menu">
                                    <div class="dropdown-menu-header mb-0">
                                        <div class="dropdown-menu-header-inner bg-deep-blue">
                                            <div class="menu-header-image opacity-1"
                                                 style="background-image: url('assets/images/dropdown-header/city3.jpg');"></div>
                                            <div class="menu-header-content text-dark">
                                                <h5 class="menu-header-title">Notifications</h5>
                                                <h6 class="menu-header-subtitle">You have <b>21</b> unread messages</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="tabs-animated-shadow tabs-animated nav nav-justified tabs-shadow-bordered p-3">
                                        <li class="nav-item">
                                            <a role="tab" class="nav-link active" data-toggle="tab"
                                               href="#tab-messages-header1">
                                                <span>Messages</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a role="tab" class="nav-link" data-toggle="tab" href="#tab-events-header1">
                                                <span>Events</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a role="tab" class="nav-link" data-toggle="tab" href="#tab-errors-header1">
                                                <span>System Errors</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab-messages-header1" role="tabpanel">
                                            <div class="scroll-area-sm">
                                                <div class="scrollbar-container ps">
                                                    <div class="p-3">
                                                        <div class="notifications-box">
                                                            <div class="vertical-time-simple vertical-without-time vertical-timeline vertical-timeline--one-column">
                                                                <div class="vertical-timeline-item dot-danger vertical-timeline-element">
                                                                    <div>
                                                                        <span class="vertical-timeline-element-icon bounce-in"></span>
                                                                        <div class="vertical-timeline-element-content bounce-in">
                                                                            <h4 class="timeline-title">All Hands
                                                                                Meeting</h4>
                                                                            <span class="vertical-timeline-element-date"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="vertical-timeline-item dot-warning vertical-timeline-element">
                                                                    <div>
                                                                        <span class="vertical-timeline-element-icon bounce-in"></span>
                                                                        <div class="vertical-timeline-element-content bounce-in">
                                                                            <p>Yet another one, at
                                                                                <span class="text-success">15:00 PM</span>
                                                                            </p>
                                                                            <span class="vertical-timeline-element-date"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="vertical-timeline-item dot-success vertical-timeline-element">
                                                                    <div>
                                                                        <span class="vertical-timeline-element-icon bounce-in"></span>
                                                                        <div class="vertical-timeline-element-content bounce-in">
                                                                            <h4 class="timeline-title">Build the
                                                                                production release
                                                                                <span class="badge badge-danger ml-2">NEW</span>
                                                                            </h4>
                                                                            <span class="vertical-timeline-element-date"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="vertical-timeline-item dot-primary vertical-timeline-element">
                                                                    <div>
                                                                        <span class="vertical-timeline-element-icon bounce-in"></span>
                                                                        <div class="vertical-timeline-element-content bounce-in">
                                                                            <h4 class="timeline-title">Something not
                                                                                important
                                                                                <div class="avatar-wrapper mt-2 avatar-wrapper-overlap">
                                                                                    <div class="avatar-icon-wrapper avatar-icon-sm">
                                                                                        <div class="avatar-icon">
                                                                                            <img src="assets/images/avatars/1.jpg"
                                                                                                 alt="">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="avatar-icon-wrapper avatar-icon-sm">
                                                                                        <div class="avatar-icon">
                                                                                            <img src="assets/images/avatars/2.jpg"
                                                                                                 alt="">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="avatar-icon-wrapper avatar-icon-sm">
                                                                                        <div class="avatar-icon">
                                                                                            <img src="assets/images/avatars/3.jpg"
                                                                                                 alt="">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="avatar-icon-wrapper avatar-icon-sm">
                                                                                        <div class="avatar-icon">
                                                                                            <img src="assets/images/avatars/4.jpg"
                                                                                                 alt="">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="avatar-icon-wrapper avatar-icon-sm">
                                                                                        <div class="avatar-icon">
                                                                                            <img src="assets/images/avatars/5.jpg"
                                                                                                 alt="">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="avatar-icon-wrapper avatar-icon-sm">
                                                                                        <div class="avatar-icon">
                                                                                            <img src="assets/images/avatars/9.jpg"
                                                                                                 alt="">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="avatar-icon-wrapper avatar-icon-sm">
                                                                                        <div class="avatar-icon">
                                                                                            <img src="assets/images/avatars/7.jpg"
                                                                                                 alt="">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="avatar-icon-wrapper avatar-icon-sm">
                                                                                        <div class="avatar-icon">
                                                                                            <img src="assets/images/avatars/8.jpg"
                                                                                                 alt="">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="avatar-icon-wrapper avatar-icon-sm avatar-icon-add">
                                                                                        <div class="avatar-icon">
                                                                                            <i>+</i></div>
                                                                                    </div>
                                                                                </div>
                                                                            </h4>
                                                                            <span class="vertical-timeline-element-date"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="vertical-timeline-item dot-info vertical-timeline-element">
                                                                    <div>
                                                                        <span class="vertical-timeline-element-icon bounce-in"></span>
                                                                        <div class="vertical-timeline-element-content bounce-in">
                                                                            <h4 class="timeline-title">This dot has an
                                                                                info state</h4>
                                                                            <span class="vertical-timeline-element-date"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="vertical-timeline-item dot-danger vertical-timeline-element">
                                                                    <div>
                                                                        <span class="vertical-timeline-element-icon bounce-in"></span>
                                                                        <div class="vertical-timeline-element-content bounce-in">
                                                                            <h4 class="timeline-title">All Hands
                                                                                Meeting</h4>
                                                                            <span class="vertical-timeline-element-date"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="vertical-timeline-item dot-warning vertical-timeline-element">
                                                                    <div>
                                                                        <span class="vertical-timeline-element-icon bounce-in"></span>
                                                                        <div class="vertical-timeline-element-content bounce-in">
                                                                            <p>Yet another one, at
                                                                                <span class="text-success">15:00 PM</span>
                                                                            </p>
                                                                            <span class="vertical-timeline-element-date"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="vertical-timeline-item dot-success vertical-timeline-element">
                                                                    <div>
                                                                        <span class="vertical-timeline-element-icon bounce-in"></span>
                                                                        <div class="vertical-timeline-element-content bounce-in">
                                                                            <h4 class="timeline-title">Build the
                                                                                production release
                                                                                <span class="badge badge-danger ml-2">NEW</span>
                                                                            </h4>
                                                                            <span class="vertical-timeline-element-date"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="vertical-timeline-item dot-dark vertical-timeline-element">
                                                                    <div>
                                                                        <span class="vertical-timeline-element-icon bounce-in"></span>
                                                                        <div class="vertical-timeline-element-content bounce-in">
                                                                            <h4 class="timeline-title">This dot has a
                                                                                dark state</h4>
                                                                            <span class="vertical-timeline-element-date"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                                        <div class="ps__thumb-x" tabindex="0"
                                                             style="left: 0px; width: 0px;"></div>
                                                    </div>
                                                    <div class="ps__rail-y" style="top: 0px; right: 0px;">
                                                        <div class="ps__thumb-y" tabindex="0"
                                                             style="top: 0px; height: 0px;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab-events-header1" role="tabpanel">
                                            <div class="scroll-area-sm">
                                                <div class="scrollbar-container ps">
                                                    <div class="p-3">
                                                        <div class="vertical-without-time vertical-timeline vertical-timeline--animate vertical-timeline--one-column">
                                                            <div class="vertical-timeline-item vertical-timeline-element">
                                                                <div>
<span class="vertical-timeline-element-icon bounce-in">
<i class="badge badge-dot badge-dot-xl badge-success"></i>
</span>
                                                                    <div class="vertical-timeline-element-content bounce-in">
                                                                        <h4 class="timeline-title">All Hands
                                                                            Meeting</h4>
                                                                        <p>Lorem ipsum dolor sic amet, today at
                                                                            <a href="javascript:void(0);">12:00 PM</a>
                                                                        </p>
                                                                        <span class="vertical-timeline-element-date"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="vertical-timeline-item vertical-timeline-element">
                                                                <div>
<span class="vertical-timeline-element-icon bounce-in">
<i class="badge badge-dot badge-dot-xl badge-warning"></i>
</span>
                                                                    <div class="vertical-timeline-element-content bounce-in">
                                                                        <p>Another meeting today, at
                                                                            <b class="text-danger">12:00 PM</b>
                                                                        </p>
                                                                        <p>Yet another one, at <span
                                                                                    class="text-success">15:00 PM</span>
                                                                        </p>
                                                                        <span class="vertical-timeline-element-date"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="vertical-timeline-item vertical-timeline-element">
                                                                <div>
<span class="vertical-timeline-element-icon bounce-in">
<i class="badge badge-dot badge-dot-xl badge-danger"></i>
</span>
                                                                    <div class="vertical-timeline-element-content bounce-in">
                                                                        <h4 class="timeline-title">Build the production
                                                                            release</h4>
                                                                        <p>Lorem ipsum dolor sit amit,consectetur
                                                                            eiusmdd tempor
                                                                            incididunt ut labore et dolore magna elit
                                                                            enim at
                                                                            minim veniam quis nostrud
                                                                        </p>
                                                                        <span class="vertical-timeline-element-date"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="vertical-timeline-item vertical-timeline-element">
                                                                <div>
<span class="vertical-timeline-element-icon bounce-in">
<i class="badge badge-dot badge-dot-xl badge-primary"></i>
</span>
                                                                    <div class="vertical-timeline-element-content bounce-in">
                                                                        <h4 class="timeline-title text-success">
                                                                            Something not important</h4>
                                                                        <p>Lorem ipsum dolor sit amit,consectetur elit
                                                                            enim at
                                                                            minim veniam quis nostrud</p>
                                                                        <span class="vertical-timeline-element-date"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="vertical-timeline-item vertical-timeline-element">
                                                                <div>
<span class="vertical-timeline-element-icon bounce-in">
<i class="badge badge-dot badge-dot-xl badge-success"></i>
</span>
                                                                    <div class="vertical-timeline-element-content bounce-in">
                                                                        <h4 class="timeline-title">All Hands
                                                                            Meeting</h4>
                                                                        <p>Lorem ipsum dolor sic amet, today at
                                                                            <a href="javascript:void(0);">12:00 PM</a>
                                                                        </p>
                                                                        <span class="vertical-timeline-element-date"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="vertical-timeline-item vertical-timeline-element">
                                                                <div>
<span class="vertical-timeline-element-icon bounce-in">
<i class="badge badge-dot badge-dot-xl badge-warning"></i>
</span>
                                                                    <div class="vertical-timeline-element-content bounce-in">
                                                                        <p>Another meeting today, at
                                                                            <b class="text-danger">12:00 PM</b>
                                                                        </p>
                                                                        <p>Yet another one, at <span
                                                                                    class="text-success">15:00 PM</span>
                                                                        </p>
                                                                        <span class="vertical-timeline-element-date"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="vertical-timeline-item vertical-timeline-element">
                                                                <div>
<span class="vertical-timeline-element-icon bounce-in">
<i class="badge badge-dot badge-dot-xl badge-danger"></i>
</span>
                                                                    <div class="vertical-timeline-element-content bounce-in">
                                                                        <h4 class="timeline-title">Build the production
                                                                            release</h4>
                                                                        <p>Lorem ipsum dolor sit amit,consectetur
                                                                            eiusmdd tempor
                                                                            incididunt ut labore et dolore magna elit
                                                                            enim at
                                                                            minim veniam quis nostrud
                                                                        </p>
                                                                        <span class="vertical-timeline-element-date"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="vertical-timeline-item vertical-timeline-element">
                                                                <div>
 <span class="vertical-timeline-element-icon bounce-in">
<i class="badge badge-dot badge-dot-xl badge-primary"></i>
</span>
                                                                    <div class="vertical-timeline-element-content bounce-in">
                                                                        <h4 class="timeline-title text-success">
                                                                            Something not important</h4>
                                                                        <p>Lorem ipsum dolor sit amit,consectetur elit
                                                                            enim at
                                                                            minim veniam quis nostrud
                                                                        </p>
                                                                        <span class="vertical-timeline-element-date"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                                        <div class="ps__thumb-x" tabindex="0"
                                                             style="left: 0px; width: 0px;"></div>
                                                    </div>
                                                    <div class="ps__rail-y" style="top: 0px; right: 0px;">
                                                        <div class="ps__thumb-y" tabindex="0"
                                                             style="top: 0px; height: 0px;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab-errors-header1" role="tabpanel">
                                            <div class="scroll-area-sm">
                                                <div class="scrollbar-container ps">
                                                    <div class="no-results pt-3 pb-0">
                                                        <div class="swal2-icon swal2-success swal2-animate-success-icon">
                                                            <div class="swal2-success-circular-line-left"
                                                                 style="background-color: rgb(255, 255, 255);"></div>
                                                            <span class="swal2-success-line-tip"></span>
                                                            <span class="swal2-success-line-long"></span>
                                                            <div class="swal2-success-ring"></div>
                                                            <div class="swal2-success-fix"
                                                                 style="background-color: rgb(255, 255, 255);"></div>
                                                            <div class="swal2-success-circular-line-right"
                                                                 style="background-color: rgb(255, 255, 255);"></div>
                                                        </div>
                                                        <div class="results-subtitle">All caught up!</div>
                                                        <div class="results-title">There are no system errors!</div>
                                                    </div>
                                                    <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                                        <div class="ps__thumb-x" tabindex="0"
                                                             style="left: 0px; width: 0px;"></div>
                                                    </div>
                                                    <div class="ps__rail-y" style="top: 0px; right: 0px;">
                                                        <div class="ps__thumb-y" tabindex="0"
                                                             style="top: 0px; height: 0px;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="nav flex-column">
                                        <li class="nav-item-divider nav-item"></li>
                                        <li class="nav-item-btn text-center nav-item">
                                            <button class="btn-shadow btn-wide btn-pill btn btn-focus btn-sm">View
                                                Latest Changes
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="dots-separator"></div>
                            <div class="dropdown">
                                <a class="dot-btn-wrapper" aria-haspopup="true" data-toggle="dropdown"
                                   aria-expanded="false">
                                    <i class="dot-btn-icon lnr-earth icon-gradient bg-happy-itmeo"></i>
                                </a>
                                <div tabindex="-1" role="menu" aria-hidden="true" class="rm-pointers dropdown-menu">
                                    <div class="dropdown-menu-header">
                                        <div class="dropdown-menu-header-inner pt-4 pb-4 bg-focus">
                                            <div class="menu-header-image opacity-05"
                                                 style="background-image: url('assets/images/dropdown-header/city2.jpg');"></div>
                                            <div class="menu-header-content text-center text-white">
                                                <h6 class="menu-header-subtitle mt-0"> Choose Language</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <h6 tabindex="-1" class="dropdown-header"> Popular Languages</h6>
                                    <button type="button" tabindex="0" class="dropdown-item">
                                        <span class="mr-3 opacity-8 flag large US"></span> USA
                                    </button>
                                    <button type="button" tabindex="0" class="dropdown-item">
                                        <span class="mr-3 opacity-8 flag large CH"></span> Switzerland
                                    </button>
                                    <button type="button" tabindex="0" class="dropdown-item">
                                        <span class="mr-3 opacity-8 flag large FR"></span>France
                                    </button>
                                    <button type="button" tabindex="0" class="dropdown-item">
                                        <span class="mr-3 opacity-8 flag large ES"></span>Spain
                                    </button>
                                    <div tabindex="-1" class="dropdown-divider"></div>
                                    <h6 tabindex="-1" class="dropdown-header">Others</h6>
                                    <button type="button" tabindex="0" class="dropdown-item active">
                                        <span class="mr-3 opacity-8 flag large DE"></span>Germany
                                    </button>
                                    <button type="button" tabindex="0" class="dropdown-item">
                                        <span class="mr-3 opacity-8 flag large IT"></span> Italy
                                    </button>
                                </div>
                            </div>
                            <div class="dots-separator"></div>
                            <div class="dropdown">
                                <a class="dot-btn-wrapper dd-chart-btn-2" aria-haspopup="true" data-toggle="dropdown"
                                   aria-expanded="false">
                                    <i class="dot-btn-icon lnr-pie-chart icon-gradient bg-love-kiss"></i>
                                    <div class="badge badge-dot badge-abs badge-dot-sm badge-warning">Notifications
                                    </div>
                                </a>
                                <div tabindex="-1" role="menu" aria-hidden="true"
                                     class="dropdown-menu-xl rm-pointers dropdown-menu">
                                    <div class="dropdown-menu-header">
                                        <div class="dropdown-menu-header-inner bg-premium-dark">
                                            <div class="menu-header-image"
                                                 style="background-image: url('assets/images/dropdown-header/abstract4.jpg');"></div>
                                            <div class="menu-header-content text-white">
                                                <h5 class="menu-header-title">Users Online</h5>
                                                <h6 class="menu-header-subtitle">Recent Account Activity Overview</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-chart">
                                        <div class="widget-chart-content">
                                            <div class="icon-wrapper rounded-circle">
                                                <div class="icon-wrapper-bg opacity-9 bg-focus"></div>
                                                <i class="lnr-users text-white"></i>
                                            </div>
                                            <div class="widget-numbers">
                                                <span>344k</span>
                                            </div>
                                            <div class="widget-subheading pt-2"> Profile views since last login</div>
                                            <div class="widget-description text-danger">
                                                <span class="pr-1"> <span>176%</span></span>
                                                <i class="fa fa-arrow-left"></i>
                                            </div>
                                        </div>
                                        <div class="widget-chart-wrapper">
                                            <div id="dashboard-sparkline-carousel-4-pop"></div>
                                        </div>
                                    </div>
                                    <ul class="nav flex-column">
                                        <li class="nav-item-divider mt-0 nav-item"></li>
                                        <li class="nav-item-btn text-center nav-item">
                                            <button class="btn-shine btn-wide btn-pill btn btn-warning btn-sm">
                                                <i class="fa fa-cog fa-spin mr-2"></i> View Details
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="app-footer-right">
                        <ul class="header-megamenu nav">
                            <li class="nav-item">
                                <a data-placement="top" rel="popover-focus" data-offset="300"
                                   data-toggle="popover-custom" class="nav-link" data-original-title="" title="">
                                    Footer Menu
                                    <i class="fa fa-angle-up ml-2 opacity-8"></i>
                                </a>
                                <div class="rm-max-width rm-pointers">
                                    <div class="d-none popover-custom-content">
                                        <div class="dropdown-mega-menu dropdown-mega-menu-sm">
                                            <div class="grid-menu grid-menu-2col">
                                                <div class="no-gutters row">
                                                    <div class="col-sm-6 col-xl-6">
                                                        <ul class="nav flex-column">
                                                            <li class="nav-item-header nav-item">Overview</li>
                                                            <li class="nav-item">
                                                                <a class="nav-link">
                                                                    <i class="nav-link-icon lnr-inbox"></i>
                                                                    <span>Contacts</span>
                                                                </a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link">
                                                                    <i class="nav-link-icon lnr-book"></i>
                                                                    <span>Incidents</span>
                                                                    <div class="ml-auto badge badge-pill badge-danger">
                                                                        5
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link">
                                                                    <i class="nav-link-icon lnr-picture"></i>
                                                                    <span>Companies</span>
                                                                </a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a disabled="" class="nav-link disabled">
                                                                    <i class="nav-link-icon lnr-file-empty"></i>
                                                                    <span>Dashboards</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-sm-6 col-xl-6">
                                                        <ul class="nav flex-column">
                                                            <li class="nav-item-header nav-item">Sales &amp; Marketing
                                                            </li>
                                                            <li class="nav-item"><a class="nav-link">Queues</a></li>
                                                            <li class="nav-item"><a class="nav-link">Resource Groups</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link">Goal Metrics
                                                                    <div class="ml-auto badge badge-warning">3</div>
                                                                </a>
                                                            </li>
                                                            <li class="nav-item"><a class="nav-link">Campaigns</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a data-placement="top" rel="popover-focus" data-offset="300"
                                   data-toggle="popover-custom" class="nav-link" data-original-title="" title="">
                                    Grid Menu
                                    <div class="badge badge-dark ml-0 ml-1">
                                        <small>NEW</small>
                                    </div>
                                    <i class="fa fa-angle-up ml-2 opacity-8"></i>
                                </a>
                                <div class="rm-max-width rm-pointers">
                                    <div class="d-none popover-custom-content">
                                        <div class="dropdown-menu-header">
                                            <div class="dropdown-menu-header-inner bg-tempting-azure">
                                                <div class="menu-header-image opacity-1"
                                                     style="background-image: url('assets/images/dropdown-header/city5.jpg');"></div>
                                                <div class="menu-header-content text-dark">
                                                    <h5 class="menu-header-title">Two Column Grid</h5>
                                                    <h6 class="menu-header-subtitle">Easy grid navigation inside
                                                        popovers</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="grid-menu grid-menu-2col">
                                            <div class="no-gutters row">
                                                <div class="col-sm-6">
                                                    <button class="btn-icon-vertical btn-transition-text btn-transition btn-transition-alt pt-2 pb-2 btn btn-outline-dark">
                                                        <i class="lnr-lighter text-dark opacity-7 btn-icon-wrapper mb-2"></i>Automation
                                                    </button>
                                                </div>
                                                <div class="col-sm-6">
                                                    <button class="btn-icon-vertical btn-transition-text btn-transition btn-transition-alt pt-2 pb-2 btn btn-outline-danger">
                                                        <i class="lnr-construction text-danger opacity-7 btn-icon-wrapper mb-2"></i>Reports
                                                    </button>
                                                </div>
                                                <div class="col-sm-6">
                                                    <button class="btn-icon-vertical btn-transition-text btn-transition btn-transition-alt pt-2 pb-2 btn btn-outline-success">
                                                        <i class="lnr-bus text-success opacity-7 btn-icon-wrapper mb-2"></i>Activity
                                                    </button>
                                                </div>
                                                <div class="col-sm-6">
                                                    <button class="btn-icon-vertical btn-transition-text btn-transition btn-transition-alt pt-2 pb-2 btn btn-outline-focus">
                                                        <i class="lnr-gift text-focus opacity-7 btn-icon-wrapper mb-2"></i>Settings
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="nav flex-column">
                                            <li class="nav-item-divider nav-item"></li>
                                            <li class="nav-item-btn clearfix nav-item">
                                                <div class="float-left">
                                                    <button class="btn btn-link btn-sm">Link Button</button>
                                                </div>
                                                <div class="float-right">
                                                    <button class="btn-shadow btn btn-info btn-sm">Info Button</button>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<div class="app-drawer-wrapper">
    <div class="drawer-nav-btn">
        <button type="button" class="hamburger hamburger--elastic is-active">
            <span class="hamburger-box"><span class="hamburger-inner"></span></span>
        </button>
    </div>
    <div class="drawer-content-wrapper">
        <div class="scrollbar-container ps ps--active-y">
            <h3 class="drawer-heading">Servers Status</h3>
            <div class="drawer-section">
                <div class="row">
                    <div class="col">
                        <div class="progress-box">
                            <h4>Server Load 1</h4>
                            <div class="circle-progress circle-progress-gradient-xl mx-auto">
                                <canvas width="142" height="142" style="height: 114px; width: 114px;"></canvas>
                                <small><span class="fsize-2">51%<span></span></span></small>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="progress-box">
                            <h4>Server Load 2</h4>
                            <div class="circle-progress circle-progress-success-xl mx-auto">
                                <canvas width="142" height="142" style="height: 114px; width: 114px;"></canvas>
                                <small><span class="fsize-2">16%<span></span></span></small>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="progress-box">
                            <h4>Server Load 3</h4>
                            <div class="circle-progress circle-progress-danger-xl mx-auto">
                                <canvas width="142" height="142" style="height: 114px; width: 114px;"></canvas>
                                <small><span class="fsize-2">51%<span></span></span></small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="divider"></div>
                <div class="mt-3" style="position: relative;">
                    <h5 class="text-center card-title">Live Statistics</h5>
                    <div id="sparkline-carousel-3" style="min-height: 120px;">
                        <div id="apexcharts6tvaaaoh" class="apexcharts-canvas apexcharts6tvaaaoh"
                             style="width: 402px; height: 120px;">
                            <svg id="SvgjsSvg2176" width="402" height="120" xmlns="http://www.w3.org/2000/svg"
                                 version="1.1"
                                 class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                 style="background: transparent;">
                                <g id="SvgjsG2178" class="apexcharts-inner apexcharts-graphical"
                                   transform="translate(0, 0)">
                                    <defs id="SvgjsDefs2177">
                                        <clipPath id="gridRectMask6tvaaaoh">
                                            <rect id="SvgjsRect2181" width="405" height="123" x="-1.5" y="-1.5" rx="0"
                                                  ry="0" fill="#ffffff" opacity="1" stroke-width="0" stroke="none"
                                                  stroke-dasharray="0"></rect>
                                        </clipPath>
                                        <clipPath id="gridRectMarkerMask6tvaaaoh">
                                            <rect id="SvgjsRect2182" width="410" height="128" x="-4" y="-4" rx="0"
                                                  ry="0" fill="#ffffff" opacity="1" stroke-width="0" stroke="none"
                                                  stroke-dasharray="0"></rect>
                                        </clipPath>
                                    </defs>
                                    <rect id="SvgjsRect2180" width="0" height="120" x="0" y="0" rx="0" ry="0"
                                          fill="#b1b9c4" opacity="1" stroke-width="0" stroke-dasharray="0"
                                          class="apexcharts-xcrosshairs" filter="none" fill-opacity="0.9"></rect>
                                    <g id="SvgjsG2189" class="apexcharts-xaxis" transform="translate(0, 0)">
                                        <g id="SvgjsG2190" class="apexcharts-xaxis-texts-g"
                                           transform="translate(0, -4)"></g>
                                    </g>
                                    <g id="SvgjsG2193" class="apexcharts-grid">
                                        <line id="SvgjsLine2195" x1="0" y1="120" x2="402" y2="120" stroke="transparent"
                                              stroke-dasharray="0"></line>
                                        <line id="SvgjsLine2194" x1="0" y1="1" x2="0" y2="120" stroke="transparent"
                                              stroke-dasharray="0"></line>
                                    </g>
                                    <g id="SvgjsG2184" class="apexcharts-line-series apexcharts-plot-series">
                                        <g id="SvgjsG2185" class="apexcharts-series series-1" data:longestSeries="true"
                                           rel="1" data:realIndex="0">
                                            <path id="apexcharts-line-0"
                                                  d="M 8.375 53.401849948612536C 14.2375 53.401849948612536 19.2625 44.76875642343268 25.125 44.76875642343268C 30.9875 44.76875642343268 36.0125 66.96813977389516 41.875 66.96813977389516C 47.7375 66.96813977389516 52.7625 64.50154162384378 58.625 64.50154162384378C 64.4875 64.50154162384378 69.5125 39.8355601233299 75.375 39.8355601233299C 81.2375 39.8355601233299 86.2625 86.70092497430628 92.125 86.70092497430628C 97.9875 86.70092497430628 103.0125 53.401849948612536 108.875 53.401849948612536C 114.7375 53.401849948612536 119.7625 90.40082219938336 125.625 90.40082219938336C 131.4875 90.40082219938336 136.5125 54.635149023638235 142.375 54.635149023638235C 148.2375 54.635149023638235 153.2625 86.70092497430628 159.125 86.70092497430628C 164.9875 86.70092497430628 170.0125 69.43473792394656 175.875 69.43473792394656C 181.7375 69.43473792394656 186.7625 57.10174717368962 192.625 57.10174717368962C 198.4875 57.10174717368962 203.5125 62.03494347379239 209.375 62.03494347379239C 215.2375 62.03494347379239 220.2625 76.83453237410072 226.125 76.83453237410072C 231.9875 76.83453237410072 237.0125 96.56731757451182 242.875 96.56731757451182C 248.7375 96.56731757451182 253.7625 5.3031860226104754 259.625 5.3031860226104754C 265.4875 5.3031860226104754 270.5125 50.935251798561154 276.375 50.935251798561154C 282.2375 50.935251798561154 287.2625 81.76772867420348 293.125 81.76772867420348C 298.9875 81.76772867420348 304.0125 73.13463514902364 309.875 73.13463514902364C 315.7375 73.13463514902364 320.7625 76.83453237410072 326.625 76.83453237410072C 332.4875 76.83453237410072 337.5125 63.26824254881809 343.375 63.26824254881809C 349.2375 63.26824254881809 354.2625 43.53545734840698 360.125 43.53545734840698C 365.9875 43.53545734840698 371.0125 74.36793422404932 376.875 74.36793422404932C 382.7375 74.36793422404932 387.7625 71.90133607399794 393.625 71.90133607399794"
                                                  fill="none" fill-opacity="1" stroke="rgba(58,196,125,0.85)"
                                                  stroke-opacity="1" stroke-linecap="butt" stroke-width="3"
                                                  stroke-dasharray="0" class="apexcharts-line" index="0"
                                                  clip-path="url(#gridRectMask6tvaaaoh)"
                                                  pathTo="M 8.375 53.401849948612536C 14.2375 53.401849948612536 19.2625 44.76875642343268 25.125 44.76875642343268C 30.9875 44.76875642343268 36.0125 66.96813977389516 41.875 66.96813977389516C 47.7375 66.96813977389516 52.7625 64.50154162384378 58.625 64.50154162384378C 64.4875 64.50154162384378 69.5125 39.8355601233299 75.375 39.8355601233299C 81.2375 39.8355601233299 86.2625 86.70092497430628 92.125 86.70092497430628C 97.9875 86.70092497430628 103.0125 53.401849948612536 108.875 53.401849948612536C 114.7375 53.401849948612536 119.7625 90.40082219938336 125.625 90.40082219938336C 131.4875 90.40082219938336 136.5125 54.635149023638235 142.375 54.635149023638235C 148.2375 54.635149023638235 153.2625 86.70092497430628 159.125 86.70092497430628C 164.9875 86.70092497430628 170.0125 69.43473792394656 175.875 69.43473792394656C 181.7375 69.43473792394656 186.7625 57.10174717368962 192.625 57.10174717368962C 198.4875 57.10174717368962 203.5125 62.03494347379239 209.375 62.03494347379239C 215.2375 62.03494347379239 220.2625 76.83453237410072 226.125 76.83453237410072C 231.9875 76.83453237410072 237.0125 96.56731757451182 242.875 96.56731757451182C 248.7375 96.56731757451182 253.7625 5.3031860226104754 259.625 5.3031860226104754C 265.4875 5.3031860226104754 270.5125 50.935251798561154 276.375 50.935251798561154C 282.2375 50.935251798561154 287.2625 81.76772867420348 293.125 81.76772867420348C 298.9875 81.76772867420348 304.0125 73.13463514902364 309.875 73.13463514902364C 315.7375 73.13463514902364 320.7625 76.83453237410072 326.625 76.83453237410072C 332.4875 76.83453237410072 337.5125 63.26824254881809 343.375 63.26824254881809C 349.2375 63.26824254881809 354.2625 43.53545734840698 360.125 43.53545734840698C 365.9875 43.53545734840698 371.0125 74.36793422404932 376.875 74.36793422404932C 382.7375 74.36793422404932 387.7625 71.90133607399794 393.625 71.90133607399794"
                                                  pathFrom="M -1 120L -1 120L 25.125 120L 41.875 120L 58.625 120L 75.375 120L 92.125 120L 108.875 120L 125.625 120L 142.375 120L 159.125 120L 175.875 120L 192.625 120L 209.375 120L 226.125 120L 242.875 120L 259.625 120L 276.375 120L 293.125 120L 309.875 120L 326.625 120L 343.375 120L 360.125 120L 376.875 120L 393.625 120"></path>
                                            <g id="SvgjsG2186" class="apexcharts-series-markers-wrap"></g>
                                            <g id="SvgjsG2187" class="apexcharts-datalabels"></g>
                                        </g>
                                    </g>
                                    <line id="SvgjsLine2196" x1="0" y1="0" x2="402" y2="0" stroke="#b6b6b6"
                                          stroke-dasharray="0" stroke-width="1" class="apexcharts-ycrosshairs"></line>
                                    <line id="SvgjsLine2197" x1="0" y1="0" x2="402" y2="0" stroke-dasharray="0"
                                          stroke-width="0" class="apexcharts-ycrosshairs-hidden"></line>
                                    <g id="SvgjsG2198" class="apexcharts-yaxis-annotations"></g>
                                    <g id="SvgjsG2199" class="apexcharts-xaxis-annotations"></g>
                                    <g id="SvgjsG2200" class="apexcharts-point-annotations"></g>
                                </g>
                                <g id="SvgjsG2191" class="apexcharts-yaxis" rel="0" transform="translate(-35, 0)">
                                    <g id="SvgjsG2192" class="apexcharts-yaxis-texts-g"></g>
                                </g>
                            </svg>
                            <div class="apexcharts-legend"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="widget-chart p-0">
                                <div class="widget-chart-content">
                                    <div class="widget-numbers text-warning fsize-3">43</div>
                                    <div class="widget-subheading pt-1">Packages</div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="widget-chart p-0">
                                <div class="widget-chart-content">
                                    <div class="widget-numbers text-danger fsize-3">65</div>
                                    <div class="widget-subheading pt-1">Dropped</div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="widget-chart p-0">
                                <div class="widget-chart-content">
                                    <div class="widget-numbers text-success fsize-3">18</div>
                                    <div class="widget-subheading pt-1">Invalid</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="divider"></div>
                    <div class="text-center mt-2 d-block">
                        <button class="mr-2 border-0 btn-transition btn btn-outline-danger">Escalate Issue</button>
                        <button class="border-0 btn-transition btn btn-outline-success">Support Center</button>
                    </div>
                    <div class="resize-triggers">
                        <div class="expand-trigger">
                            <div style="width: 403px; height: 289px;"></div>
                        </div>
                        <div class="contract-trigger"></div>
                    </div>
                </div>
            </div>
            <h3 class="drawer-heading">File Transfers</h3>
            <div class="drawer-section p-0">
                <div class="files-box">
                    <ul class="list-group list-group-flush">
                        <li class="pt-2 pb-2 pr-2 list-group-item">
                            <div class="widget-content p-0">
                                <div class="widget-content-wrapper">
                                    <div class="widget-content-left opacity-6 fsize-2 mr-3 text-primary center-elem">
                                        <i class="fa fa-file-alt"></i>
                                    </div>
                                    <div class="widget-content-left">
                                        <div class="widget-heading font-weight-normal">TPSReport.docx</div>
                                    </div>
                                    <div class="widget-content-right widget-content-actions">
                                        <button class="btn-icon btn-icon-only btn btn-link btn-sm">
                                            <i class="fa fa-cloud-download-alt"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="pt-2 pb-2 pr-2 list-group-item">
                            <div class="widget-content p-0">
                                <div class="widget-content-wrapper">
                                    <div class="widget-content-left opacity-6 fsize-2 mr-3 text-warning center-elem">
                                        <i class="fa fa-file-archive"></i>
                                    </div>
                                    <div class="widget-content-left">
                                        <div class="widget-heading font-weight-normal">Latest_photos.zip</div>
                                    </div>
                                    <div class="widget-content-right widget-content-actions">
                                        <button class="btn-icon btn-icon-only btn btn-link btn-sm">
                                            <i class="fa fa-cloud-download-alt"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="pt-2 pb-2 pr-2 list-group-item">
                            <div class="widget-content p-0">
                                <div class="widget-content-wrapper">
                                    <div class="widget-content-left opacity-6 fsize-2 mr-3 text-danger center-elem">
                                        <i class="fa fa-file-pdf"></i>
                                    </div>
                                    <div class="widget-content-left">
                                        <div class="widget-heading font-weight-normal">Annual Revenue.pdf</div>
                                    </div>
                                    <div class="widget-content-right widget-content-actions">
                                        <button class="btn-icon btn-icon-only btn btn-link btn-sm">
                                            <i class="fa fa-cloud-download-alt"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="pt-2 pb-2 pr-2 list-group-item">
                            <div class="widget-content p-0">
                                <div class="widget-content-wrapper">
                                    <div class="widget-content-left opacity-6 fsize-2 mr-3 text-success center-elem">
                                        <i class="fa fa-file-excel"></i>
                                    </div>
                                    <div class="widget-content-left">
                                        <div class="widget-heading font-weight-normal">Analytics_GrowthReport.xls</div>
                                    </div>
                                    <div class="widget-content-right widget-content-actions">
                                        <button class="btn-icon btn-icon-only btn btn-link btn-sm">
                                            <i class="fa fa-cloud-download-alt"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <h3 class="drawer-heading">Tasks in Progress</h3>
            <div class="drawer-section p-0">
                <div class="todo-box">
                    <ul class="todo-list-wrapper list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="todo-indicator bg-warning"></div>
                            <div class="widget-content p-0">
                                <div class="widget-content-wrapper">
                                    <div class="widget-content-left mr-2">
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" id="exampleCustomCheckbox1266"
                                                   class="custom-control-input">
                                            <label class="custom-control-label"
                                                   for="exampleCustomCheckbox1266">&nbsp;</label>
                                        </div>
                                    </div>
                                    <div class="widget-content-left">
                                        <div class="widget-heading">Wash the car
                                            <div class="badge badge-danger ml-2">Rejected</div>
                                        </div>
                                        <div class="widget-subheading"><i>Written by Bob</i></div>
                                    </div>
                                    <div class="widget-content-right widget-content-actions">
                                        <button class="border-0 btn-transition btn btn-outline-success">
                                            <i class="fa fa-check"></i>
                                        </button>
                                        <button class="border-0 btn-transition btn btn-outline-danger">
                                            <i class="fa fa-trash-alt"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="todo-indicator bg-focus"></div>
                            <div class="widget-content p-0">
                                <div class="widget-content-wrapper">
                                    <div class="widget-content-left mr-2">
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" id="exampleCustomCheckbox1666"
                                                   class="custom-control-input">
                                            <label class="custom-control-label"
                                                   for="exampleCustomCheckbox1666">&nbsp;</label>
                                        </div>
                                    </div>
                                    <div class="widget-content-left">
                                        <div class="widget-heading">Task with hover dropdown menu</div>
                                        <div class="widget-subheading">
                                            <div>By Johnny
                                                <div class="badge badge-pill badge-info ml-2">NEW</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content-right widget-content-actions">
                                        <div class="d-inline-block dropdown">
                                            <button type="button" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false" class="border-0 btn-transition btn btn-link">
                                                <i class="fa fa-ellipsis-h"></i>
                                            </button>
                                            <div tabindex="-1" role="menu" aria-hidden="true"
                                                 class="dropdown-menu dropdown-menu-right">
                                                <h6 tabindex="-1" class="dropdown-header">Header</h6>
                                                <button type="button" disabled="" tabindex="-1"
                                                        class="disabled dropdown-item">Action
                                                </button>
                                                <button type="button" tabindex="0" class="dropdown-item">Another
                                                    Action
                                                </button>
                                                <div tabindex="-1" class="dropdown-divider"></div>
                                                <button type="button" tabindex="0" class="dropdown-item">Another
                                                    Action
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="todo-indicator bg-primary"></div>
                            <div class="widget-content p-0">
                                <div class="widget-content-wrapper">
                                    <div class="widget-content-left mr-2">
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" id="exampleCustomCheckbox4777"
                                                   class="custom-control-input">
                                            <label class="custom-control-label"
                                                   for="exampleCustomCheckbox4777">&nbsp;</label>
                                        </div>
                                    </div>
                                    <div class="widget-content-left flex2">
                                        <div class="widget-heading">Badge on the right task</div>
                                        <div class="widget-subheading">This task has show on hover actions!</div>
                                    </div>
                                    <div class="widget-content-right widget-content-actions">
                                        <button class="border-0 btn-transition btn btn-outline-success">
                                            <i class="fa fa-check"></i>
                                        </button>
                                    </div>
                                    <div class="widget-content-right ml-3">
                                        <div class="badge badge-pill badge-success">Latest Task</div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="todo-indicator bg-info"></div>
                            <div class="widget-content p-0">
                                <div class="widget-content-wrapper">
                                    <div class="widget-content-left mr-2">
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" id="exampleCustomCheckbox2444"
                                                   class="custom-control-input">
                                            <label class="custom-control-label"
                                                   for="exampleCustomCheckbox2444">&nbsp;</label>
                                        </div>
                                    </div>
                                    <div class="widget-content-left mr-3">
                                        <div class="widget-content-left">
                                            <img width="42" class="rounded" src="assets/images/avatars/1.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="widget-content-left">
                                        <div class="widget-heading">Go grocery shopping</div>
                                        <div class="widget-subheading">A short description ...</div>
                                    </div>
                                    <div class="widget-content-right widget-content-actions">
                                        <button class="border-0 btn-transition btn btn-sm btn-outline-success">
                                            <i class="fa fa-check"></i>
                                        </button>
                                        <button class="border-0 btn-transition btn btn-sm btn-outline-danger">
                                            <i class="fa fa-trash-alt"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="todo-indicator bg-success"></div>
                            <div class="widget-content p-0">
                                <div class="widget-content-wrapper">
                                    <div class="widget-content-left mr-2">
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" id="exampleCustomCheckbox3222"
                                                   class="custom-control-input">
                                            <label class="custom-control-label"
                                                   for="exampleCustomCheckbox3222">&nbsp;</label>
                                        </div>
                                    </div>
                                    <div class="widget-content-left flex2">
                                        <div class="widget-heading">Development Task</div>
                                        <div class="widget-subheading">Finish React ToDo List App</div>
                                    </div>
                                    <div class="widget-content-right">
                                        <div class="badge badge-warning mr-2">69</div>
                                    </div>
                                    <div class="widget-content-right">
                                        <button class="border-0 btn-transition btn btn-outline-success">
                                            <i class="fa fa-check"></i>
                                        </button>
                                        <button class="border-0 btn-transition btn btn-outline-danger">
                                            <i class="fa fa-trash-alt"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <h3 class="drawer-heading">Urgent Notifications</h3>
            <div class="drawer-section">
                <div class="notifications-box">
                    <div class="vertical-time-simple vertical-without-time vertical-timeline vertical-timeline--one-column">
                        <div class="vertical-timeline-item dot-danger vertical-timeline-element">
                            <div>
                                <span class="vertical-timeline-element-icon bounce-in"></span>
                                <div class="vertical-timeline-element-content bounce-in">
                                    <h4 class="timeline-title">All Hands Meeting</h4>
                                    <span class="vertical-timeline-element-date"></span>
                                </div>
                            </div>
                        </div>
                        <div class="vertical-timeline-item dot-warning vertical-timeline-element">
                            <div>
                                <span class="vertical-timeline-element-icon bounce-in"></span>
                                <div class="vertical-timeline-element-content bounce-in">
                                    <p>Yet another one, at <span class="text-success">15:00 PM</span></p>
                                    <span class="vertical-timeline-element-date"></span>
                                </div>
                            </div>
                        </div>
                        <div class="vertical-timeline-item dot-success vertical-timeline-element">
                            <div>
                                <span class="vertical-timeline-element-icon bounce-in"></span>
                                <div class="vertical-timeline-element-content bounce-in">
                                    <h4 class="timeline-title">Build the production release
                                        <div class="badge badge-danger ml-2">NEW</div>
                                    </h4>
                                    <span class="vertical-timeline-element-date"></span>
                                </div>
                            </div>
                        </div>
                        <div class="vertical-timeline-item dot-primary vertical-timeline-element">
                            <div>
                                <span class="vertical-timeline-element-icon bounce-in"></span>
                                <div class="vertical-timeline-element-content bounce-in">
                                    <h4 class="timeline-title">Something not important
                                        <div class="avatar-wrapper mt-2 avatar-wrapper-overlap">
                                            <div class="avatar-icon-wrapper avatar-icon-sm">
                                                <div class="avatar-icon">
                                                    <img src="assets/images/avatars/1.jpg" alt="">
                                                </div>
                                            </div>
                                            <div class="avatar-icon-wrapper avatar-icon-sm">
                                                <div class="avatar-icon">
                                                    <img src="assets/images/avatars/2.jpg" alt="">
                                                </div>
                                            </div>
                                            <div class="avatar-icon-wrapper avatar-icon-sm">
                                                <div class="avatar-icon">
                                                    <img src="assets/images/avatars/3.jpg" alt="">
                                                </div>
                                            </div>
                                            <div class="avatar-icon-wrapper avatar-icon-sm">
                                                <div class="avatar-icon">
                                                    <img src="assets/images/avatars/4.jpg" alt="">
                                                </div>
                                            </div>
                                            <div class="avatar-icon-wrapper avatar-icon-sm">
                                                <div class="avatar-icon">
                                                    <img src="assets/images/avatars/5.jpg" alt="">
                                                </div>
                                            </div>
                                            <div class="avatar-icon-wrapper avatar-icon-sm">
                                                <div class="avatar-icon">
                                                    <img src="assets/images/avatars/6.jpg" alt="">
                                                </div>
                                            </div>
                                            <div class="avatar-icon-wrapper avatar-icon-sm">
                                                <div class="avatar-icon">
                                                    <img src="assets/images/avatars/7.jpg" alt="">
                                                </div>
                                            </div>
                                            <div class="avatar-icon-wrapper avatar-icon-sm">
                                                <div class="avatar-icon">
                                                    <img src="assets/images/avatars/8.jpg" alt="">
                                                </div>
                                            </div>
                                            <div class="avatar-icon-wrapper avatar-icon-sm avatar-icon-add">
                                                <div class="avatar-icon"><i>+</i></div>
                                            </div>
                                        </div>
                                    </h4>
                                    <span class="vertical-timeline-element-date"></span>
                                </div>
                            </div>
                        </div>
                        <div class="vertical-timeline-item dot-info vertical-timeline-element">
                            <div>
                                <span class="vertical-timeline-element-icon bounce-in"></span>
                                <div class="vertical-timeline-element-content bounce-in">
                                    <h4 class="timeline-title">This dot has an info state</h4>
                                    <span class="vertical-timeline-element-date"></span>
                                </div>
                            </div>
                        </div>
                        <div class="vertical-timeline-item dot-dark vertical-timeline-element">
                            <div>
                                <span class="vertical-timeline-element-icon is-hidden"></span>
                                <div class="vertical-timeline-element-content is-hidden">
                                    <h4 class="timeline-title">This dot has a dark state</h4>
                                    <span class="vertical-timeline-element-date"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
            </div>
            <div class="ps__rail-y" style="top: 0px; height: 754px; right: 0px;">
                <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 405px;"></div>
            </div>
        </div>
    </div>
</div>
<div class="app-drawer-overlay animated fadeIn d-none"></div>
<section>

<!--    <nav class="navbar navbar-expand-lg navbar-light bg_transparent pt-3 pb-3 fixed-top">-->
<!--        <div class="container">-->
<!--            <a class="navbar-brand" href="--><?//=\yii\helpers\Url::to(['site/index']) ?><!--"><img src="/img/logo.png" alt="logo" width="60" class="logo"></a>-->
<!--            <span class="navbar-text d-md-none d-block">-->
<!--      <a href="tel:89636847261" class="btn br-50 bg_dark_blue text-light"><img src="/img/phone-call.png" alt="logo" width="18"></a>-->
<!--    </span>-->
<!--            <div class="hamburger hamburger--elastic navbar-toggler border-0 collapsed" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">-->
<!--                <div class="hamburger-box navbar-toggler border-0 collapsed">-->
<!--                    <div class="hamburger-inner"></div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">-->
<!--                <div class="navbar-nav">-->
<!--                    <a class="nav-item nav-link active" href="--><?//=\yii\helpers\Url::to(['site/index']) ?><!--">Home <span class="sr-only">(current)</span></a>-->
<!--                    <a class="nav-item nav-link" href="--><?//=\yii\helpers\Url::to(['site/about']) ?><!--">О компании</a>-->
<!--                    <a class="nav-item nav-link" href="--><?//=\yii\helpers\Url::to(['site/services']) ?><!--">Услуги</a>-->
<!--                    <a class="nav-item nav-link" href="--><?//=\yii\helpers\Url::to(['site/contact']) ?><!--">Контакты</a>-->
<!--                    <a class="nav-item nav-link " href="#">Disabled</a>-->
<!--                </div>-->
<!--            </div>-->
<!--            <span class="navbar-text d-none d-md-block">-->
<!--      <a href="tel:89636847261" class="btn br-50 bg_dark_blue text-light"><img src="/img/phone-call.png" alt="logo" width="18"> 89636847261</a>-->
<!--    </span>-->
<!--        </div>-->
<!--    </nav>-->
</section>

<!--<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">-->
<!--    <div class="modal-dialog" role="document">-->
<!--        <div class="modal-content">-->
<!--            <div class="modal-header">-->
<!--                <h5 class="modal-title" id="exampleModalLongTitle">Удалить</h5>-->
<!--                <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
<!--                    <span aria-hidden="true">&times;</span>-->
<!--                </button>-->
<!--            </div>-->
<!--            <div class="modal-body">-->
<!--                ...-->
<!--            </div>-->
<!--            <div class="modal-footer">-->
<!--                <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>-->
<!--                <a href="#" type="button" class="btn btn-danger" data-method="post">Удалить</a>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->

<?php

    Modal::begin( [
        'id' => 'exampleModalCenter',
        'title' => '<h5>Удаление</h5>',
        'footer' => '<button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>'.Html::a('Удалить', '#', ['class' => 'btn btn-danger', 'data-method' => 'post']),
    ] );
    Modal::end();

?>


<!--Modal create user-->
<div class="modal fade" id="modalCreateUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Добавить сотрудника</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                $form = ActiveForm::begin(['id' => 'createUser', 'action' => '/department/create-user', 'enableAjaxValidation' => false,
                    'enableClientValidation' => true,]); ?>

                <?= $form->field($userform, 'username')->textInput(['maxlength' => true]) ?>
                <?= $form->field($userform, 'fio')->textInput(['maxlength' => true]) ?>

                <?= $form->field($userform, 'create_at')->hiddenInput(['value' => time()])->label
                (false) ?>
                <?= $form->field($userform, 'email')->textInput() ?>
                <?= $form->field($userform, 'password')->passwordInput() ?>
                <?= $form->field($userform, 'department_id')->hiddenInput(['value' => \Yii::$app->request->get('id')])
                    ->label
                (false) ?>
                <?php $cityId = \app\models\Department::find()->where(['id' => \Yii::$app->request->get('id')])->one
                (); ?>
                <?php $cityId = \app\models\Branch::find()->where(['id' => $cityId->branch_id])->one(); ?>
                <?= $form->field($userform, 'city_id')->hiddenInput(['value' => $cityId->id])
                    ->label
                    (false) ?>


                <div class="form-group">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>
<!--Modal create user end-->
<div class="modal fade" id="modalCreateQuestion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Добавить вопрос</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <?php $form = ActiveForm::begin(['action' => '/question/create']); ?>

                <?= $form->field($question, 'name')->textInput(['maxlength' => true]) ?>

                <?= $form->field($question, 'user_id')->hiddenInput(['value' => \Yii::$app->getUser()->id])->label
                (false) ?>

                <?= $form->field($question, 'test_id')->hiddenInput(['value' => \Yii::$app->request->get('id')])->label
                (false) ?>

                <?= $form->field($question, 'create_at')->hiddenInput(['value' => time()])->label(false) ?>

                <?= $form->field($question, 'update_at')->hiddenInput(['value' => time()])->label(false) ?>

                <div class="form-group">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalCreateAnswer" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Добавить вариант ответа</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <?php $form = ActiveForm::begin(['action' => '/answer/create']); ?>
                <?php for ($i = 0; $i < 4; $i++) { ?>
                    <?= $form->field($answer, "[$i]name")->textInput(['maxlength' => true]) ?>
                    <?= $form->field($answer, "[$i]user_id")->hiddenInput(['value' => \Yii::$app->getUser()->id])->label(false) ?>
                                    <?= $form->field($answer, "[$i]test_id")->hiddenInput(['value' => \Yii::$app->request->get('id')])->label
                                    (false) ?>
                                    <?= $form->field($answer, "[$i]question_id")->hiddenInput(['value' =>
                        '', 'id' => "answer-question_id-".$i])
                                        ->label
                                    (false) ?>

                                    <?= $form->field($answer, "[$i]create_at")->hiddenInput(['value' => time()])->label(false) ?>

                <?php } ?>
                <?= $form->field($answer, "test_id")->hiddenInput(['value' => \Yii::$app->request->get('id')])->label
                (false) ?>

                <div class="form-group">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?> <button class="border-0 btn-transition btn btn-outline-success" data-toggle="modal" data-target="#modalCreateAnswer" data-id="109" id="createAnswer">
                        <i class="fa fa-plus"></i>
                    </button>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>
<?php $this->endBody() ?>
<!-- Modal delete -->
<div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
<!--     Modal create question-->
<?php
$js = <<<JS


function setupWebSocket(){              
ws = new WebSocket("ws://127.0.0.1:8090");
pingTimeout: 30000;

    let btn = $('#btn');
    let inp = $('.redactor-editor');
    let subscribe = $('#subscribe');
    let idElement = $('.chat-box-wrapper');
    
    ws.onopen = function() {
        var at = idElement.last().data('id');
         console.log(at)
    
    btn.on('click', function (e){
        //console.log(inp.html())
        e.preventDefault();
         let obj = {
             'type': 'UserMessage',
             'user_id': $(this).data('user'),
             'message': inp.html(),
             'ip': $(this).data('ip')
         };
       ws.send(JSON.stringify(obj)); 
       inp.html('');
       })
       $(document).keyup(function(e) {
            let obj111 = {
             'type': 'eee',
            
         };
	//console.dir(e);
});
         
         
         // редактирование сообщений
$('#subscribe').on('click', '.editable', function(){
    var th = $(this);
    console.log(th);
    th.editable('click', function (){
         let object = {
                'type': 'Editable',
                'user_id': th.data('user_id'),
                'id': th.data('id'),
                'mess': th.html()
            };
         
         function isOpen(ws) {
                return ws.readyState === ws.OPEN
            }

            console.log(object);
            if (!isOpen(ws)) return;
            ws.send(JSON.stringify(object));
    });
});
    };
    
    
ws.onmessage = function(e) {
    let myobj = JSON.parse(e.data);
     console.log(myobj);
    let count = myobj.countMessage;
    try {
    var userID = myobj.idUSER.indexOf(String(btn.data('user')));
    
   
    } catch (e) {
  console.log(e)
}

if (myobj.type == 'EditedMessage'){
   // $('.chat-box').data('id='+myobj.messageID).html(myobj.message);
    $(".chat-box[data-id="+myobj.messageID+"]").html(myobj.message);
    var ellll = $(".chat-box[data-id="+myobj.messageID+"]");
    //console.log(ellll.data('user_id'));
    ellll.html(myobj.message);
}
    
    // subscribe.append("<div class='chat-box-wrapper'><div class='chat-box'>"+myobj.user_id+" - "+myobj
    // .message+"</div></div>");
    
   
    // subscribe.prepend('<div class="chat-box-wrapper"><div class="chat-box">'+(myobj.message || '-')+'</div></div>');
    if  (myobj.avatar != null){ 
             var avatar = '<img src="/files/avatar/'+(myobj.user_id)+'/'+(myobj.avatar)+'" alt="">';
        }else{ 
            avatar = '<img src="/img/ava.jpg" alt="">';
       }
    
    if (myobj.message != null && myobj.type == 'JsGetMessage'){
        if (document.location.pathname == '/chat'){
           $('#subscribe').animate({
     scrollTop: $('#subscribe').offset().top = 1000000
       }, 200 
   ); 
        }
         
        if  (myobj.user_id == btn.data('user')){
            //$('.badge_count_message').text(count[userID]);
            subscribe.append('<div class="float-right ml-auto"><div class="chat-box-wrapper chat-box-wrapper-right"><div>' +
             '<div class="chat-box bg-info text-white editable" data-id="'+myobj.messageID+'" data-user_id="'+myobj.user_id+'">'+
             (myobj
             .message)
             +'</div>' +
              '<small class="opacity-6">' +
               '<i class="fa fa-calendar-alt mr-1"></i>'+(myobj.create_at)+'--'+(myobj.username)+'</small></div>' +
               '<div>' +
                '<div class="avatar-icon-wrapper ml-1">' +
                 '<div class="badge badge-bottom btn-shine badge-success badge-dot badge-dot-lg"></div>' +
                  '<div class="avatar-icon avatar-icon-lg rounded">'+avatar+'</div></div></div></div></div>');
        }else{
            //$('.badge_count_message').text(count[userID]);
           subscribe.append('<div class="chat-box-wrapper"><div>' +
      '<div class="avatar-icon-wrapper mr-1">' +
       '<div class="badge badge-bottom btn-shine badge-success badge-dot badge-dot-lg"></div>' +
        '<div class="avatar-icon avatar-icon-lg rounded">'+avatar+'</div>' +
         '</div></div><div><div class="chat-box" data-id="'+myobj.messageID+'" data-user_id="'+myobj.user_id+'">'+(myobj.message)+'</div><small class="opacity-6"><i class="fa fa-calendar-alt mr-1"></i>'+(myobj.create_at)+'--'+(myobj.username)+'</small></div>' +
          '</div>'); 
        }
       
        if (myobj.user_id != btn.data('user')){
            var numCount = $('.ml-auto.badge.badge-pill.badge-info');
           
            var h = $('.chat-box').text();
            numCount.text(600);
          
          var audio = new Audio('/files/audio/notification-sound.mp3');
          var playPromise = audio.play();
            toastr.success('От сотрудника '+myobj.username, 'Новое сообщение', {
                   timeOut: 5000,
                   closeButton: true,
                   progressBar: true
               });
        }
        
    }
    
};

ws.onclose = function(e) {
    setTimeout(function() {
      setupWebSocket();
    }, 1000);
    console.log('Disconnected!');
};
};
    
    setupWebSocket();

JS;
$this->registerJs($js);

?>
</body>
</html>
<?php $this->endPage();
