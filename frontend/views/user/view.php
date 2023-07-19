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
?>
    <div class="user-view">
        <p>
            <?= Html::a('Update ' . $this->title, ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'username',
                'auth_key',
                'password_hash',
                'password_reset_token',
                'email:email',
                'status',
                'created_at',
                'updated_at',
                'verification_token',
            ],
        ]) ?>
        <?php if ($userRole == 'superadmin' || $userRole == 'admin'): ?>
            <input type="checkbox" class="checkbox" id="box" checked/>
            <label for="box">Администратор</label>
        <?php endif; ?>
    </div>
<?php
// Узнать роль пользователя
$roles = Yii::$app->authManager->getRolesByUser(1);
$userRole = current(ArrayHelper::getColumn(Yii::$app->authManager->getRolesByUser($model->id), 'name'));
//echo $userRole;
//$item = $manager->getRole('user');


