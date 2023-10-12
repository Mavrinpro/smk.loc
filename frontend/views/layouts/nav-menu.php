<?php
$noty = new \app\models\Notyfication();
$countMessage = new \app\models\ChatMessage();
?>
<div class="app-header header-shadow">
    <div class="app-header__logo">
        <div class="logo-src"><a href="/"><img src="http://smk.loc/assets/images/logo-inverse2.png" alt=""></a></div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                        data-class="closed-sidebar">
<span class="hamburger-box">
<span class="hamburger-inner"></span>
</span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
<span class="hamburger-box">
<span class="hamburger-inner"></span>
</span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
<span>
<button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
<span class="btn-icon-wrapper">
<i class="fa fa-ellipsis-v fa-w-6"></i>
</span>
</button>
</span>
    </div>
    <div class="app-header__content">
        <div class="app-header-left">
            <div class="search-wrapper">
                <div class="input-holder">
                    <input type="text" class="search-input" placeholder="Type to search">
                    <button class="search-icon"><span></span></button>
                </div>
                <button class="close"></button>
            </div>
            <ul class="header-megamenu nav">
                <!--                <li class="nav-item">-->
                <!--                    <a href="javascript:void(0);" data-placement="bottom" rel="popover-focus" data-offset="300"-->
                <!--                       data-toggle="popover-custom" class="nav-link" data-original-title="" title="">-->
                <!--                        <i class="nav-link-icon pe-7s-gift"> </i> Меню-->
                <!--                        <i class="fa fa-angle-down ml-2 opacity-5"></i>-->
                <!--                    </a>-->
                <!--                    <div class="rm-max-width">-->
                <!--                        <div class="d-none popover-custom-content">-->
                <!--                            <div class="dropdown-mega-menu">-->
                <!--                                <div class="grid-menu grid-menu-3col">-->
                <!--                                    <div class="no-gutters row">-->
                <!--                                        <div class="col-sm-6 col-xl-4">-->
                <!--                                            <ul class="nav flex-column">-->
                <!--                                                <li class="nav-item-header nav-item"> Overview</li>-->
                <!--                                                <li class="nav-item">-->
                <!--                                                    <a href="javascript:void(0);" class="nav-link">-->
                <!--                                                        <i class="nav-link-icon lnr-inbox"></i>-->
                <!--                                                        <span> Contacts</span>-->
                <!--                                                    </a>-->
                <!--                                                </li>-->
                <!--                                                <li class="nav-item">-->
                <!--                                                    <a href="javascript:void(0);" class="nav-link">-->
                <!--                                                        <i class="nav-link-icon lnr-book"></i>-->
                <!--                                                        <span> Incidents</span>-->
                <!--                                                        <div class="ml-auto badge badge-pill badge-danger">5</div>-->
                <!--                                                    </a>-->
                <!--                                                </li>-->
                <!--                                                <li class="nav-item">-->
                <!--                                                    <a href="javascript:void(0);" class="nav-link">-->
                <!--                                                        <i class="nav-link-icon lnr-picture"></i>-->
                <!--                                                        <span> Companies</span>-->
                <!--                                                    </a>-->
                <!--                                                </li>-->
                <!--                                                <li class="nav-item">-->
                <!--                                                    <a disabled="" href="javascript:void(0);"-->
                <!--                                                       class="nav-link disabled">-->
                <!--                                                        <i class="nav-link-icon lnr-file-empty"></i>-->
                <!--                                                        <span> Dashboards</span>-->
                <!--                                                    </a>-->
                <!--                                                </li>-->
                <!--                                            </ul>-->
                <!--                                        </div>-->
                <!--                                        <div class="col-sm-6 col-xl-4">-->
                <!--                                            <ul class="nav flex-column">-->
                <!--                                                <li class="nav-item-header nav-item"> Favourites</li>-->
                <!--                                                <li class="nav-item">-->
                <!--                                                    <a href="javascript:void(0);" class="nav-link"> Reports-->
                <!--                                                        Conversions </a>-->
                <!--                                                </li>-->
                <!--                                                <li class="nav-item">-->
                <!--                                                    <a href="javascript:void(0);" class="nav-link"> Quick Start-->
                <!--                                                        <div class="ml-auto badge badge-success">New</div>-->
                <!--                                                    </a>-->
                <!--                                                </li>-->
                <!--                                                <li class="nav-item">-->
                <!--                                                    <a href="javascript:void(0);" class="nav-link">Users &amp;-->
                <!--                                                        Groups</a>-->
                <!--                                                </li>-->
                <!--                                                <li class="nav-item">-->
                <!--                                                    <a href="javascript:void(0);" class="nav-link">Proprieties</a>-->
                <!--                                                </li>-->
                <!--                                            </ul>-->
                <!--                                        </div>-->
                <!--                                        <div class="col-sm-6 col-xl-4">-->
                <!--                                            <ul class="nav flex-column">-->
                <!--                                                <li class="nav-item-header nav-item">Sales &amp; Marketing</li>-->
                <!--                                                <li class="nav-item">-->
                <!--                                                    <a href="javascript:void(0);" class="nav-link">Queues </a>-->
                <!--                                                </li>-->
                <!--                                                <li class="nav-item">-->
                <!--                                                    <a href="javascript:void(0);" class="nav-link">Resource-->
                <!--                                                        Groups </a>-->
                <!--                                                </li>-->
                <!--                                                <li class="nav-item">-->
                <!--                                                    <a href="javascript:void(0);" class="nav-link">Goal Metrics-->
                <!--                                                        <div class="ml-auto badge badge-warning">3</div>-->
                <!--                                                    </a>-->
                <!--                                                </li>-->
                <!--                                                <li class="nav-item">-->
                <!--                                                    <a href="javascript:void(0);" class="nav-link">Campaigns</a>-->
                <!--                                                </li>-->
                <!--                                            </ul>-->
                <!--                                        </div>-->
                <!--                                    </div>-->
                <!--                                </div>-->
                <!--                            </div>-->
                <!--                        </div>-->
                <!--                    </div>-->
                <!--                </li>-->
                <li class="btn-group nav-item">
                    <a class="nav-link" data-toggle="dropdown" aria-expanded="false">
                        <span class="badge badge-pill badge-danger ml-0 mr-2">4</span> Настройки
                        <i class="fa fa-angle-down ml-2 opacity-5"></i>
                    </a>
                    <div tabindex="-1" role="menu" aria-hidden="true" class="rm-pointers dropdown-menu">
                        <div class="dropdown-menu-header">
                            <div class="dropdown-menu-header-inner bg-secondary">
                                <div class="menu-header-image opacity-5"
                                     style="background-image: url('assets/images/dropdown-header/abstract2.jpg');"></div>
                                <div class="menu-header-content">
                                    <h5 class="menu-header-title">Настройки системы</h5>
                                </div>
                            </div>
                        </div>
                        <div class="scroll-area-xs">
                            <div class="scrollbar-container ps">
                                <h6 tabindex="-1" class="dropdown-header">Key Figures</h6>
                                <a href="/gii" class="dropdown-item">CRUD Generator</a>
                                <a href="/settings" class="dropdown-item">Basic settings</a>
                                <button type="button" tabindex="0" class="dropdown-item">Accounts</button>
                                <div tabindex="-1" class="dropdown-divider"></div>
                                <button type="button" tabindex="0" class="dropdown-item">Products</button>
                                <button type="button" tabindex="0" class="dropdown-item">Rollup Queries</button>
                                <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                    <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                                </div>

                            </div>
                        </div>

                    </div>
                </li>
                <li class="dropdown nav-item">
                    <a aria-haspopup="true" data-toggle="dropdown" class="nav-link" aria-expanded="false">
                        <i class="nav-link-icon pe-7s-settings"></i> Проекты
                        <i class="fa fa-angle-down ml-2 opacity-5"></i>
                    </a>
                    <div tabindex="-1" role="menu" aria-hidden="true"
                         class="dropdown-menu-rounded dropdown-menu-lg rm-pointers dropdown-menu">
                        <div class="dropdown-menu-header">
                            <div class="dropdown-menu-header-inner bg-success">
                                <div class="menu-header-image opacity-1"
                                     style="background-image: url('assets/images/dropdown-header/abstract3.jpg');"></div>
                                <div class="menu-header-content text-left">
                                    <h5 class="menu-header-title">Overview</h5>
                                    <h6 class="menu-header-subtitle">Unlimited options</h6>
                                    <div class="menu-header-btn-pane">
                                        <button class="mr-2 btn btn-dark btn-sm">Settings</button>
                                        <button class="btn-icon btn-icon-only btn btn-warning btn-sm">
                                            <i class="pe-7s-config btn-icon-wrapper"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="button" tabindex="0" class="dropdown-item">
                            <i class="dropdown-icon lnr-file-empty"></i>Graphic Design
                        </button>
                        <button type="button" tabindex="0" class="dropdown-item">
                            <i class="dropdown-icon lnr-file-empty"> </i>App Development
                        </button>
                        <button type="button" tabindex="0" class="dropdown-item">
                            <i class="dropdown-icon lnr-file-empty"> </i>Icon Design
                        </button>
                        <div tabindex="-1" class="dropdown-divider"></div>
                        <button type="button" tabindex="0" class="dropdown-item">
                            <i class="dropdown-icon lnr-file-empty"></i>Miscellaneous
                        </button>
                        <button type="button" tabindex="0" class="dropdown-item">
                            <i class="dropdown-icon lnr-file-empty"></i>Frontend Dev
                        </button>
                    </div>
                </li>
            </ul>
        </div>
        <div class="app-header-right">
            <div class="header-dots">
                <!--                <div class="dropdown">-->
                <!--                    <button type="button" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown"-->
                <!--                            class="p-0 mr-2 btn btn-link">-->
                <!--<span class="icon-wrapper icon-wrapper-alt rounded-circle">-->
                <!--<span class="icon-wrapper-bg bg-primary"></span>-->
                <!--<i class="icon text-primary ion-android-apps"></i>-->
                <!--</span>-->
                <!--                    </button>-->
                <!--                    <div tabindex="-1" role="menu" aria-hidden="true"-->
                <!--                         class="dropdown-menu-xl rm-pointers dropdown-menu dropdown-menu-right">-->
                <!--                        <div class="dropdown-menu-header">-->
                <!--                            <div class="dropdown-menu-header-inner bg-plum-plate">-->
                <!--                                <div class="menu-header-image"-->
                <!--                                     style="background-image: url('assets/images/dropdown-header/abstract4.jpg');"></div>-->
                <!--                                <div class="menu-header-content text-white">-->
                <!--                                    <h5 class="menu-header-title">Grid Dashboard</h5>-->
                <!--                                    <h6 class="menu-header-subtitle">Easy grid navigation inside dropdowns</h6>-->
                <!--                                </div>-->
                <!--                            </div>-->
                <!--                        </div>-->
                <!--                        <div class="grid-menu grid-menu-xl grid-menu-3col">-->
                <!--                            <div class="no-gutters row">-->
                <!--                                <div class="col-sm-6 col-xl-4">-->
                <!--                                    <button class="btn-icon-vertical btn-square btn-transition btn btn-outline-link">-->
                <!--                                        <i class="pe-7s-world icon-gradient bg-night-fade btn-icon-wrapper btn-icon-lg mb-3"></i>-->
                <!--                                        Automation-->
                <!--                                    </button>-->
                <!--                                </div>-->
                <!--                                <div class="col-sm-6 col-xl-4">-->
                <!--                                    <button class="btn-icon-vertical btn-square btn-transition btn btn-outline-link">-->
                <!--                                        <i class="pe-7s-piggy icon-gradient bg-night-fade btn-icon-wrapper btn-icon-lg mb-3"> </i>-->
                <!--                                        Reports-->
                <!--                                    </button>-->
                <!--                                </div>-->
                <!--                                <div class="col-sm-6 col-xl-4">-->
                <!--                                    <button class="btn-icon-vertical btn-square btn-transition btn btn-outline-link">-->
                <!--                                        <i class="pe-7s-config icon-gradient bg-night-fade btn-icon-wrapper btn-icon-lg mb-3"> </i>-->
                <!--                                        Settings-->
                <!--                                    </button>-->
                <!--                                </div>-->
                <!--                                <div class="col-sm-6 col-xl-4">-->
                <!--                                    <button class="btn-icon-vertical btn-square btn-transition btn btn-outline-link">-->
                <!--                                        <i class="pe-7s-browser icon-gradient bg-night-fade btn-icon-wrapper btn-icon-lg mb-3"> </i>-->
                <!--                                        Content-->
                <!--                                    </button>-->
                <!--                                </div>-->
                <!--                                <div class="col-sm-6 col-xl-4">-->
                <!--                                    <button class="btn-icon-vertical btn-square btn-transition btn btn-outline-link">-->
                <!--                                        <i class="pe-7s-hourglass icon-gradient bg-night-fade btn-icon-wrapper btn-icon-lg mb-3"></i>-->
                <!--                                        Activity-->
                <!--                                    </button>-->
                <!--                                </div>-->
                <!--                                <div class="col-sm-6 col-xl-4">-->
                <!--                                    <button class="btn-icon-vertical btn-square btn-transition btn btn-outline-link">-->
                <!--                                        <i class="pe-7s-world icon-gradient bg-night-fade btn-icon-wrapper btn-icon-lg mb-3"> </i>-->
                <!--                                        Contacts-->
                <!--                                    </button>-->
                <!--                                </div>-->
                <!--                            </div>-->
                <!--                        </div>-->
                <!--                        <ul class="nav flex-column">-->
                <!--                            <li class="nav-item-divider nav-item"></li>-->
                <!--                            <li class="nav-item-btn text-center nav-item">-->
                <!--                                <button class="btn-shadow btn btn-primary btn-sm">Follow-ups</button>-->
                <!--                            </li>-->
                <!--                        </ul>-->
                <!--                    </div>-->
                <!--                </div>-->

                <div class="dropdown">
                    <button type="button" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown"
                            class="p-0 mr-2 btn">
<span class="icon-wrapper icon-wrapper-alt rounded-circle">
<span class="icon-wrapper-bg bg-success"></span>
<i class="pe-7s-chat text-success"></i>
<span class="badge badge-pill badge-danger badge_count_message"><?= $countMessage->messageCount(\Yii::$app->getUser()
        ->id) ?></span>
</span>
                    </button>

                </div>
                <div class="dropdown">
                    <?php if (sizeof($noty->showNotyficationOnHead()) > 0): ?>
                        <button type="button" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown"
                                class="p-0 mr-2 btn btn-link">
<span class="icon-wrapper icon-wrapper-alt rounded-circle">
<span class="icon-wrapper-bg bg-danger"></span>
<i class="icon text-danger icon-anim-pulse ion-android-notifications"></i>
<span class="badge badge-dot badge-dot-sm badge-danger">Notifications</span>
</span>
                        </button>
                    <?php else: ?>
                        <button type="button" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown"
                                class="p-0 mr-2 btn btn-link">
<span class="icon-wrapper icon-wrapper-alt rounded-circle">
<span class="icon-wrapper-bg bg-success"></span>
<i class="icon text-success ion-android-notifications"></i>
<span class="badge badge-dot badge-dot-sm badge-success">Notifications</span>
</span>
                        </button>
                    <?php endif; ?>
                    <div tabindex="-1" role="menu" aria-hidden="true"
                         class="dropdown-menu-xl rm-pointers dropdown-menu dropdown-menu-right">
                        <div class="dropdown-menu-header mb-0">
                            <div class="dropdown-menu-header-inner bg-deep-blue">
                                <div class="menu-header-image opacity-1"
                                     style="background-image: url('assets/images/dropdown-header/city3.jpg');"></div>
                                <div class="menu-header-content text-dark">
                                    <h5 class="menu-header-title">Уведомления</h5>
                                    <?php if (sizeof($noty->showNotyficationOnHead()) > 0): ?>
                                        <h6 class="menu-header-subtitle">У вас есть <b><?=
                                                sizeof($noty->showNotyficationOnHead());
                                                ?></b> непрочитанных собщения</h6>
                                    <?php else: ?>
                                        <h6 class="menu-header-subtitle">Новых сообщений нет</h6>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>


                        <ul class="nav flex-column">
                            <li class="nav-item-divider nav-item"></li>
                            <li class="nav-item-btn text-center nav-item">
                                <a href="/notyfication" class="btn-shadow btn-wide btn-pill btn btn-focus
                                btn-sm">Смотреть все
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="header-btn-lg pr-0">
                <div class="widget-content p-0">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="btn-group">
                                <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                   class="p-0 btn">
                                    <?php if (isset(\Yii::$app->user->identity->avatar)): ?>
                                        <img width="42" class="rounded-circle"
                                             src="<?= '/files/avatar/' . \Yii::$app->user->identity->id . '/' .
                                             \Yii::$app->user->identity->avatar; ?>" alt="avatar">
                                    <?php else: ?>
                                        <img width="42" class="rounded-circle" src="/img/ava.jpg" alt="avatar">
                                    <?php endif; ?>
                                    <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                </a>
                                <div tabindex="-1" role="menu" aria-hidden="true"
                                     class="rm-pointers dropdown-menu-lg dropdown-menu dropdown-menu-right">
                                    <div class="dropdown-menu-header">
                                        <div class="dropdown-menu-header-inner bg-info">
                                            <div class="menu-header-image opacity-2"
                                                 style="background-image: url('assets/images/dropdown-header/city3.jpg');"></div>
                                            <div class="menu-header-content text-left">
                                                <div class="widget-content p-0">
                                                    <div class="widget-content-wrapper">
                                                        <div class="widget-content-left mr-3">
                                                            <img width="42" class="rounded-circle"
                                                                 src="files/avatar/"<?=
                                                            \Yii::$app->user->identity->avatar; ?> alt="">
                                                        </div>
                                                        <div class="widget-content-left">
                                                            <div class="widget-heading"><?=
                                                                \Yii::$app->user->identity->fio; ?></div>
                                                            <div class="widget-subheading opacity-8"><?= \Yii::$app->user->identity->username; ?>
                                                            </div>
                                                        </div>
                                                        <div class="widget-content-right mr-2">
                                                            <!--                                                            <button class="btn-pill btn-shadow btn-shine btn btn-focus">-->
                                                            <!--                                                                Logout-->
                                                            <!--                                                            </button>-->
                                                            <?php if (!Yii::$app->user->isGuest) { ?>
                                                                <?= \yii\helpers\Html::a('Выйти', ['site/logout'], ['data' => ['method' => 'post'], 'class' => 'btn-pill btn-shadow btn-shine btn btn-focus']) ?>
                                                            <?php } ?>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="scroll-area-xs" style="height: 150px;">
                                        <div class="scrollbar-container ps">
                                            <ul class="nav flex-column">
                                                <li class="nav-item-header nav-item">Activity</li>
                                                <li class="nav-item">
                                                    <a href="javascript:void(0);" class="nav-link">Chat
                                                        <div class="ml-auto badge badge-pill badge-info">8</div>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="javascript:void(0);" class="nav-link">Recover
                                                        Password</a>
                                                </li>
                                                <li class="nav-item-header nav-item">My Account
                                                </li>
                                                <li class="nav-item">
                                                    <a href="javascript:void(0);" class="nav-link">Settings
                                                        <div class="ml-auto badge badge-success">New</div>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="javascript:void(0);" class="nav-link">Messages
                                                        <div class="ml-auto badge badge-warning">512</div>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="javascript:void(0);" class="nav-link">Logs</a>
                                                </li>
                                            </ul>
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
                                    <!--                                    <ul class="nav flex-column">-->
                                    <!--                                        <li class="nav-item-divider mb-0 nav-item"></li>-->
                                    <!--                                    </ul>-->
                                    <!--                                    <div class="grid-menu grid-menu-2col">-->
                                    <!--                                        <div class="no-gutters row">-->
                                    <!--                                            <div class="col-sm-6">-->
                                    <!--                                                <button class="btn-icon-vertical btn-transition btn-transition-alt pt-2 pb-2 btn btn-outline-warning">-->
                                    <!--                                                    <i class="pe-7s-chat icon-gradient bg-amy-crisp btn-icon-wrapper mb-2"></i>-->
                                    <!--                                                    Message Inbox-->
                                    <!--                                                </button>-->
                                    <!--                                            </div>-->
                                    <!--                                            <div class="col-sm-6">-->
                                    <!--                                                <button class="btn-icon-vertical btn-transition btn-transition-alt pt-2 pb-2 btn btn-outline-danger">-->
                                    <!--                                                    <i class="pe-7s-ticket icon-gradient bg-love-kiss btn-icon-wrapper mb-2"></i>-->
                                    <!--                                                    <b>Support Tickets</b>-->
                                    <!--                                                </button>-->
                                    <!--                                            </div>-->
                                    <!--                                        </div>-->
                                    <!--                                    </div>-->
                                    <ul class="nav flex-column">
                                        <li class="nav-item-divider nav-item">
                                        </li>
                                        <li class="nav-item-btn text-center nav-item">
                                            <?=
                                            \yii\helpers\Html::a('Профиль', ['user/view', 'id' =>
                                                \Yii::$app->user->identity->id], ['data' => ['method' =>
                                                'post'], 'class' => 'btn-wide btn btn-primary btn-sm']) ?>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content-left  ml-3 header-user-info">
                            <div class="widget-heading"> <?= \Yii::$app->user->identity->username; ?></div>

                        </div>
                        <div class="widget-content-right header-user-info ml-3">
                            <button type="button" class="btn-shadow p-1 btn btn-primary btn-sm show-toastr-example">
                                <i class="fa text-white fa-calendar pr-1 pl-1"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-btn-lg">
                <button type="button" class="hamburger hamburger--elastic open-right-drawer">
<span class="hamburger-box">
<span class="hamburger-inner"></span>
</span>
                </button>
            </div>
        </div>
    </div>
</div>

