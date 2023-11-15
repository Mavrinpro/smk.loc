<?php
$session = Yii::$app->session;
$toast = "";

if (\Yii::$app->session->hasFlash('success')) {
    $message = $session->get('success');
    $toast = "toastr.success";
} else if (\Yii::$app->session->hasFlash('info')) {
    $message = $session->get('info');
    $toast = "toastr.info";
}else if (\Yii::$app->session->hasFlash('warning')) {
    $message = $session->get('warning');
    $toast = "toastr.warning";
} else if (\Yii::$app->session->hasFlash('error')) {
    $message = $session->get('error');
    $toast = "toastr.error";
}else{
    $toast = '555';
}
$js = <<<JS
var styleToast = $toast;
if (styleToast != '555'){
    styleToast('Уведомление будет скрыто автоматически.', '$message', {
        timeOut: 7000,
        closeButton: true,
        progressBar: true,
        positionClass:  "toast-top-full-width",
    });
}

JS;


$this->registerJs($js);
?>
