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
                            <div class="chat-box bg-info text-white editable" data-id="<?=
                            $chater->id ?>" data-user_id="<?= \Yii::$app->getUser()->id ?>"><?= $chater->text ?></div>
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
                        <div class="chat-box" data-id="<?=
                        $chater->id ?>" data-user_id="<?= \Yii::$app->getUser()->id ?>"><?= $chater->text ?></div>
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

window.onload = function() { 
  $('#subscribe').animate({
     scrollTop: $('#subscribe').offset().top = 1000000
       }, 200 
   );
}

JS;

$this->registerJs($js);
?>