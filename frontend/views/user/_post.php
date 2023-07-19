<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
?>
<ul class="todo-list-wrapper list-group list-group-flush">
    <li class="list-group-item">
        <div class="todo-indicator bg-focus"></div>
        <div class="widget-content p-0">
            <div class="widget-content-wrapper">

                <div class="widget-content-left">
                    <?php if ($model->status == 10){ ?>
                    <div class="widget-heading text-success"><?= $model->username ?></div>
                        <div class="widget-subheading">
                            <div>Активный

                            </div>
                        </div>
                    <?php }else{ ?>
                    <div class="widget-heading text-danger"><?= $model->username ?></div>
                        <div class="widget-subheading">
                            <div>Не активный

                            </div>
                        </div>
                    <?php } ?>

                </div>
                <div class="widget-content-right widget-content-actions">
                    <div class="d-inline-block dropdown">
                        <button type="button" aria-haspopup="true" data-toggle="dropdown" aria-expanded="false" class="border-0 btn-transition btn btn-link">
                            <i class="fa fa-ellipsis-h"></i>
                        </button>
                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right" style="">
                            <h6 tabindex="-1" class="dropdown-header">Header</h6>
                            <button type="button" disabled="" tabindex="-1" class="disabled dropdown-item">Action</button>
                            <button type="button" tabindex="0" class="dropdown-item">Another Action</button>
                            <button type="button" tabindex="0" class="dropdown-item">Удалить</button>
                            <?= Html::a('Delete', ['delete-user', 'id' => $model->id], [
                                //'class' => 'btn btn-danger',
                                'data' => [
                                    'confirm' => 'Are you sure you want to delete this item?',
                                    'method' => 'get',
                                ],
                            ]) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </li>
</ul>
