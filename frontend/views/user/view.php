<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var common\models\User $model */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
$userRole = current(ArrayHelper::getColumn(Yii::$app->authManager->getRolesByUser(\Yii::$app->getUser()->id), 'name'));
$userRole2 = current(ArrayHelper::getColumn(Yii::$app->authManager->getRolesByUser($model->id), 'name'));
?>
    <div class="user-view">
        <p>
            <?= Html::a('Изменить профиль ' . $this->title, ['update', 'id' => $model->id], ['class' => 'btn 
            btn-primary']) ?>
<!--            --><?//= Html::a('Delete', ['delete', 'id' => $model->id], [
//                'class' => 'btn btn-danger',
//                'data' => [
//                    'confirm' => 'Are you sure you want to delete this item?',
//                    'method' => 'post',
//                ],
//            ]) ?>
        </p>
        <img src="<?= isset($model->avatar)? '/files/avatar/'.$model->id.'/'.$model->avatar : '/img/ava.jpg' ?>"
             alt="avatar" width="50" class="rounded-circle mb-3">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                //'id',
                'username',
                'fio',
                //'password_hash',
                //'password_reset_token',
                'email:email',
                [
                    'attribute' => 'status',
                    'value' => function($model)
                    {
                        if ($model->status == 10){
                            return 'Активный';
                        }else if($model->status == 0){
                            return 'Удален';
                        }else{
                            return 'Не активный';
                        }
                    },
                ],
                //'created_at',
                [
                    'attribute' => 'created_at',
                    'label' => 'Дата регистрации',
                    'value' => function($model)
                    {
                        return date('d.m.Y H:i:s', $model->created_at);
                    },
                ],
                //'updated_at',
                [
                    'attribute' => 'updated_at',
                    'label' => 'Дата изменения',
                    'value' => function($model)
                    {
                        return date('d.m.Y H:i:s', $model->updated_at);
                    },
                ],
                'telegram_id',
            ],
        ]) ?>
        <?php if ($userRole == 'superadmin' || $userRole == 'admin'): ?>
            <?php if ($userRole2 == 'admin'): ?>
                <input type="checkbox" class="checkbox" id="box" data-id="<?php echo $model->id; ?>" checked/>
                <label for="box">Администратор</label>
            <?php else: ?>
                <input type="checkbox" class="checkbox" id="box" data-id="<?php echo $model->id; ?>"/>
                <label for="box">Администратор</label>
            <?php endif; ?>
        <?php endif; ?>
    </div>
<?php
// Узнать роль пользователя
$roles = Yii::$app->authManager->getRolesByUser(1);
$userRole = current(ArrayHelper::getColumn(Yii::$app->authManager->getRolesByUser($model->id), 'name'));
//echo $userRole;
//$item = $manager->getRole('user');


$js = <<<JS
var box = $('#box');
var check = '';
box.on('change', function (){
    if (box.is(':checked')){
        check = 1;
	
} else {
        check = 0;
	
}
    
    $.ajax({
            url: '/user/set-admin',
            type: 'POST',
            data: {
                id: $(this).data('id'),
                check: check
            },
           // dataType: 'JSON',
            success: function(res){
                 console.log(res);
            },
            error: function(){
                //search_form_header.find('.result_search').html('').css('display', 'none');
                alert('Error!');
            }
        })
})

let ws = new WebSocket("ws://127.0.0.1:8001/?user=tester01");

            ws.addEventListener('message', (event) => {
                console.info('Frontend got message: ' + event.data); // get from server
            })

            const func = () => {
                ws.send('Hello Martians!'); //send on server
            };
            setTimeout(func, 2 * 1000);

JS;

$this->registerJs($js);


