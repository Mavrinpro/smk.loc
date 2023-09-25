<?php

use app\models\Orders;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var app\models\OrderSearch $searchModel */
/** @var app\models\Order $model */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Приказы';
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="orders-index">

        <p>
            <?= Html::a('<i class="fa fa-plus-circle"></i> Создать приказ', ['create'], ['class' => 'btn btn-success']) ?>

            <?= Html::a('<i class="fa fa-plus-circle"></i> Создать раздел файлов', ['/file-folder/create', 'department_id' => \Yii::$app->request->get('department_id')],
                ['class'
                => 'btn 
        btn-success']) ?>
        </p>

        <?php Pjax::begin(); ?>
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                //'id',
                'name',
                [
                    'attribute' => 'user_id',
                    'format' => 'raw',
                    'value' => function ($model) {

                        $userRole = current(ArrayHelper::getColumn(Yii::$app->authManager->getRolesByUser(Yii::$app->user->getId()), 'name'));

                        if ($userRole == 'admin' || $userRole == 'superadmin'){
                            return Html::activeDropDownList($model, 'user_id', ArrayHelper::map(\common\models\User::find()
                                ->asArray()
                                ->all
                                (), 'id', 'username'), ['class' => 'form-control', 'id' => 'sel-' . $model->id, 'data-id' =>
                                $model->id,
                                'prompt' => 'Выбрать сотрудника']);
                        }else{
                            return $model->user->username;
                        }


                    },
                    'label' => 'Сотрудник',
                    'filter' => \common\models\User::find()->select(['username', 'id'])
                        ->indexBy
                        ('id')->column(),
                ],
               // 'department_id',
                [
                        'attribute' => 'department_id',
                    'filter' => \app\models\Department::find()->select(['name', 'id'])
                        ->indexBy
                        ('id')->column(),

                ],
                //'branch_id',
                [
                    'attribute' => 'branch_id',
                    'filter' => \app\models\Branch::find()->select(['name', 'id'])
                        ->indexBy
                        ('id')->column(),

                ],
                //'user_id',
                //'create_at',
                //'update_at',
                //'user_id_update',
                [
                    'class' => ActionColumn::className(),
                    'urlCreator' => function ($action, $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'id' => $model->id]);
                    }
                ],
            ],
        ]); ?>

        <?php Pjax::end(); ?>

    </div>
<?php

$js = <<<JS
  
var sel = $('[id^="sel-"]');
sel.each(function (){
    $(this).change(function (){
        //$.pjax.reload({container:'#p0'});
    let id = $(this).val();
    let modelId = $(this).data('id');
    console.log($(this).data('id'));
    
    $.ajax({
                type: 'POST',
                url: '/order/change-user',
                data: {
                    id: id, 
                    modelId: modelId,
                    //action: 'loadmore'
                },
                dataType: 'json',
                // beforeSend: function (xhr) {
                //     button.addClass('border_none');
                //     button.html('<img src="ссылка на gif загрузчик"/>');
                // },
                success: function (data) {
                    console.log(data);
                    
                   if (data.count == 1){
                   toastr.success('Новый сотрудник: '+data.order.user_id, 'Сотрудник изменен!', {
                   timeOut: 5000,
                   closeButton: true,
                   progressBar: true
               });
                   }else{
                       toastr.error('Сотрудник не изменен', 'Что-то пошло не так', {
                   timeOut: 5000,
                   closeButton: true,
                   progressBar: true
               });
                   }
                }
            });
})
})

JS;

$this->registerJs($js);

?>