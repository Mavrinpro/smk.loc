<?php
$session = Yii::$app->session;

if (\Yii::$app->session->hasFlash('success')) {
    $language = $session->get('success');
    $toast = "toastr.success";
} else if (\Yii::$app->session->hasFlash('info')) {
    $language = $session->get('info');
    $toast = "toastr.info";
}else if (\Yii::$app->session->hasFlash('warning')) {
    $language = $session->get('warning');
    $toast = "toastr.warning";
} else if (\Yii::$app->session->hasFlash('error')) {
    $language = $session->get('error');
    $toast = "toastr.error";
}
$js = <<<JS
var styleToast = $toast;
    styleToast('Уведомление будет скрыто автоматически.', '$language', {
        timeOut: 70000,
        closeButton: true,
        progressBar: true,
        positionClass:  "toast-top-full-width",
    });
 
     
JS;


$this->registerJs($js);
?>
