<?php
use app\models\Notyfication;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;


$this->title = 'Уведомления';
$this->params['breadcrumbs'][] = $this->title;



//var_dump($model);
?>
<div class="row">
    <div class="col-lg-12">
        <div class="main-card mb-3 card">
            <div class="card-header">Уведомления</div>
            <div class="scroll-area-sm">
                <div class="scrollbar-container ps ps--active-y">
                    <div class="chat-wrapper p-1"><?php foreach($model as $noty): ?>
                        <div class="chat-box-wrapper">

                            <div>
                                <div class="avatar-icon-wrapper mr-1">
                                    <div class="badge badge-bottom btn-shine badge-success badge-dot badge-dot-lg"></div>
                                    <div class="avatar-icon avatar-icon-lg rounded">
                                        <img src="assets/images/avatars/2.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="chat-box"><?= $noty->text ?></div>
                                <small class="opacity-6">
                                    <i class="fa fa-calendar-alt mr-1"></i>
                                    <?= date('d.m.Y H:i', $noty->create_at) ?> <?php echo (date('d.m.Y') == date('d.m.Y', $noty->create_at))? '| Сегодня' : '' ?>
                                </small>
                            </div>
                        </div>
                        <?php endforeach; ?>



                    </div>

            </div>

        </div>

    </div>
</div>

