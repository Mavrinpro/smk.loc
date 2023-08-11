<?php
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var \app\models\Protocol $protocol */

//$verifyLink = Yii::$app->urlManager->createAbsoluteUrl(['site/verify-email', 'token' => $user->verification_token]);
?>
<div class="verify-email">
    <p>Hello <?= Html::encode($protocol->id) ?>, <?= $user ?></p>

    <p>Follow the link below to verify your email: <?= Html::encode($protocol->name) ?></p>

<!--    <p>--><?//= Html::a(Html::encode($verifyLink), $verifyLink) ?><!--</p>-->
</div>
