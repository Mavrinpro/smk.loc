<?php

use app\models\Notyfication;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;


$this->title = 'Уведомления';
$this->params['breadcrumbs'][] = $this->title;

?>
    <div class="row">
    <div class="col-lg-12">
        <div class="main-card mb-3 card">
            <div class="card-header">Уведомления</div>


                    <div class="chat-wrapper p-1">
                        <?php if (sizeof($model) > 0): ?>
                        <?php foreach ($model as $noty): ?>
                            <div class="chat-box-wrapper">
                                <div>
                                    <div class="avatar-icon-wrapper mr-1" data-id="<?= $noty->id ?>"
                                         data-read="<?= $noty->read ?>">
                                        <?php if ($noty->read == true): ?>
                                            <div class="badge badge-bottom btn-shine badge-success badge-dot badge-dot-lg"></div>
                                        <?php else: ?>
                                            <div class="badge badge-bottom btn-shine badge-danger badge-dot
                                    badge-dot-lg"></div>
                                        <?php endif; ?>
                                        <div class="avatar-icon avatar-icon-lg rounded">
                                            <img src="/img/bot.png" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="chat-box"><?= $noty->text ?></div>
                                    <small class="opacity-6">
                                        <i class="fa fa-calendar-alt mr-1"></i>
                                        <?= date('d.m.Y H:i', $noty->create_at) ?> <?php echo (date('d.m.Y') == date('d.m.Y', $noty->create_at)) ? '| Сегодня' : '' ?>
                                    </small>
                                </div>
                            </div>
                        <?php endforeach; ?>

                        <?php else: ?>
                            <div class="chat-box-wrapper">Сообщений нет</div>
                        <?php endif; ?>
                    </div>


        </div>
    </div>
<?php

$js = <<<JS
  
function is_shown(target) {
	var wt = $(window).scrollTop(); 
	var wh = $(window).height();    
	var eh = $(target).outerHeight();  
	var et = $(target).offset().top;
 
	if (wt + wh >= et && wt + wh - eh * 2 <= et + (wh - eh)){
		return true;
	} else {
		return false;    
	}
}

if (is_shown('.avatar-icon-wrapper')) {
	//console.log(true);
	$('.avatar-icon-wrapper').each(function (){
        var th = $(this);
        if (th.data('read') == 0){
           setTimeout(function (){
             $.ajax({
            url: 'notyfication/ajax-read',
            type: 'POST',
            data: {
                id: th.data('id'),
                read: 1,
            },
            
            success: function(res){
                   
   
    var danger = $('.avatar-icon-wrapper').children('.badge-danger');
danger.removeClass('badge-danger').addClass('badge-success');
                      console.log(danger);           
            },
            error: function(){
               
                alert('Error!');
            }
        });   
           }, 2000) 
       
        }
	})
	 
}else{
    return false;
}

JS;

$this->registerJs($js);



