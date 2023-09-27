<?php

use app\models\Chat;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap4\Modal;
use yii\bootstrap4\ActiveForm;
use yii\helpers\FileHelper;
use yii\helpers\ArrayHelper;
use vova07\imperavi\Widget;

/** @var yii\web\View $this */
/** @var app\models\Chat $model */


$this->title = 'Чат';
$this->params['breadcrumbs'][] = $this->title;

?>
    <style>
        .flex-column {
            max-height: 100vh;
            overflow-x: auto;
        }
    </style>
    <!-- здесь будут появляться входящие сообщения -->
    <div id="subscribe" class="chat-wrapper d-flex flex-column w-100">
        <?php foreach ($chat as $chater) { ?>
            <?php if ($chater->user_id == \Yii::$app->getUser()->id): ?>
                <div class="float-right ml-auto">
                    <div class="chat-box-wrapper chat-box-wrapper-right rex-<?= $chater->id ?>" data-id="<?= $chater->id ?>">
                        <div>
                            <div class="chat-box bg-info text-white"><?= $chater->text ?></div>
                            <small class="opacity-6">
                                <i class="fa fa-calendar-alt mr-1"></i>
                                <?= date('d.m.Y H:i', $chater->create_at) . '--' . $chater->user->username ?>
                            </small>
                        </div>
                        <div>
                            <div class="avatar-icon-wrapper ml-1">
                                <div class="badge badge-bottom btn-shine badge-success badge-dot badge-dot-lg"></div>
                                <div class="avatar-icon avatar-icon-lg rounded">
                                    <?php if (isset($chater->user->avatar)): ?>
                                        <img src="/files/avatar/<?= $chater->user_id ?>/<?= $chater->user->avatar ?>"
                                             alt="">
                                    <?php else: ?>
                                        <img src="/img/ava.jpg" alt="">
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <div class="chat-box-wrapper rex-<?= $chater->id ?>" data-id="<?= $chater->id ?>">
                    <div>
                        <div class="avatar-icon-wrapper mr-1">
                            <div class="badge badge-bottom btn-shine badge-success badge-dot badge-dot-lg">
                            </div>
                            <div class="avatar-icon avatar-icon-lg rounded">
                                <?php if (isset($chater->user->avatar)): ?>
                                    <img src="/files/avatar/<?= $chater->user_id ?>/<?= $chater->user->avatar ?>"
                                         alt="">
                                <?php else: ?>
                                    <img src="/img/ava.jpg" alt="">
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="chat-box"><?= $chater->text ?></div>
                        <small class="opacity-6">
                            <i class="fa fa-calendar-alt mr-1"></i>
                            <?= date('d.m.Y H:i', $chater->create_at) . '--' . $chater->user->username ?>
                        </small>
                    </div>
                </div>
            <?php endif; ?>
        <?php } ?>
    </div>
    <div class="col-12">
<!--        <form name="publish">-->
<!--            <textarea type="text" name="message" id="inp" class="form-control-lg form-control"></textarea>-->
<!--            <input type="submit" value="Отправить" id="btn2" class="btn btn-success btn-lg mt-3 btn-block"-->
<!--                   data-user="--><?//=
//            \Yii::$app->getUser
//            ()->id ?><!--" data-ip="--><?//= Yii::$app->request->userIP ?><!--">-->
<!--        </form>-->
        <?php $form = ActiveForm::begin(['id' => 'formsocket']) ?>
        <?= $form->field($model, 'text', [
            'inputOptions' => [
                'id' => 'uniqueID',
                'class' => 'sss'
            ]])->widget(Widget::className(), [

            'settings' => [
                'toolbarFixedTopOffset' => 100,
                'lang' => 'ru',
                'minHeight' => 100,
                'fileUpload' => Url::to(['/default/file-upload']),
                'plugins' => [
                    'clips',
                    'fullscreen',
                    'table',
                    'imagemanager',
                ],
                'clips' => [
                    ['Lorem ipsum...', 'Lorem...'],
                    ['red', '<span class="label-red">red</span>'],
                    ['green', '<span class="label-green">green</span>'],
                    ['blue', '<span class="label-blue">blue</span>'],
                ],
            ],
        ])->label(false); ?>
        <div class="form-group">
            <?= Html::submitButton('Отправить', ['class' => 'btn btn-success btn-lg btn-block', 'id' => 'btn', 'data-user' =>
                \Yii::$app->getUser()->id, 'data-ip' => Yii::$app->request->userIP ]) ?>
        </div>
        <?php $form = ActiveForm::end() ?>
    </div>


<?php

$js = <<<JS

//$('#inp').redactor();




window.onload = function() { 
  $('#subscribe').animate({
     scrollTop: $('#subscribe').offset().top = 10000
       }, 200 
   );
}
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
        // Создаем новый observer (наблюдатель)
let observer = new IntersectionObserver(function (entries) {
    entries.forEach(function (entry) {
// Выводим в консоль сам элемент
        console.log(entry.target.className);
// Выводим в консоль true (если элемент виден) или false (если нет)
        console.log(entry.isIntersecting);
    });
});

// Задаем элемент для наблюдения
let el = document.querySelector('.rex-'+at);

// Прикрепляем его к «наблюдателю»
observer.observe(el);
    btn.on('click', function (e){
        console.log(inp.html())
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
       
    };
    
    

ws.onmessage = function(e) {
    let myobj = JSON.parse(e.data);
    
    
    // subscribe.append("<div class='chat-box-wrapper'><div class='chat-box'>"+myobj.user_id+" - "+myobj
    // .message+"</div></div>");
    
   
    // subscribe.prepend('<div class="chat-box-wrapper"><div class="chat-box">'+(myobj.message || '-')+'</div></div>');
    if  (myobj.avatar != null){ 
             var avatar = '<img src="/files/avatar/'+(myobj.user_id)+'/'+(myobj.avatar)+'" alt="">';
        }else{ 
            avatar = '<img src="/img/ava.jpg" alt="">';
       }
    
    if (myobj.message != null){
         $('#subscribe').animate({
     scrollTop: $('#subscribe').offset().top = 10000
       }, 200 
   );
        if  (myobj.user_id == btn.data('user')){
            subscribe.append('<div class="float-right ml-auto"><div class="chat-box-wrapper chat-box-wrapper-right"><div>' +
             '<div class="chat-box bg-info text-white">'+(myobj.message)+'</div>' +
              '<small class="opacity-6">' +
               '<i class="fa fa-calendar-alt mr-1"></i>'+(myobj.create_at)+'--'+(myobj.username)+'</small></div>' +
               '<div>' +
                '<div class="avatar-icon-wrapper ml-1">' +
                 '<div class="badge badge-bottom btn-shine badge-success badge-dot badge-dot-lg"></div>' +
                  '<div class="avatar-icon avatar-icon-lg rounded">'+avatar+'</div></div></div></div></div>');
        }else{
           subscribe.append('<div class="chat-box-wrapper"><div>' +
      '<div class="avatar-icon-wrapper mr-1">' +
       '<div class="badge badge-bottom btn-shine badge-success badge-dot badge-dot-lg"></div>' +
        '<div class="avatar-icon avatar-icon-lg rounded">'+avatar+'</div>' +
         '</div></div><div><div class="chat-box">'+(myobj.message)+'</div><small class="opacity-6"><i class="fa fa-calendar-alt mr-1"></i>'+(myobj.create_at)+'--'+(myobj.username)+'</small></div>' +
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
// ping-pong
// this.ws.onopen = function(){
//         setTimeout(setupWebSocket, 1000);
//     };
ws.onclose = function(e) {
    setTimeout(function() {
      setupWebSocket();
    }, 1000);
    console.log('Disconnected!');
};
};
    
    setupWebSocket();
    
    pushNotify();
            function pushNotify() {
            	if (!("Notification" in window)) {
            		// checking if the user's browser supports web push Notification
            		alert("Web browser does not support desktop notification");
            	} else if (Notification.permission === "granted") {
            		console.log("Permission to show web push notifications granted.");
            		// if notification permissions is granted,
            		// then create a Notification object
            		createNotification();
            	} else if (Notification.permission !== "denied") {
            		alert("Going to ask for permission to show web push notification");
            		// User should give explicit permission
            		Notification.requestPermission().then((permission) => {
            			// If the user accepts, let's create a notification
            			createNotification();
            		});
            	}
            	// User has not granted to show web push notifications via Browser
            	// Let's honor his decision and not keep pestering anymore
            }

            function createNotification() {
            	var notification = new Notification('Web Push Notification', {
            		icon: 'https://phppot.com/badge.png',
            		body: 'New article published!',
            	});
            	// url that needs to be opened on clicking the notification
            	// finally everything boils down to click and visits right
            	notification.onclick = function() {
            		window.open('https://phppot.com');
            	};
            }
JS;

$this->registerJs($js);
?>