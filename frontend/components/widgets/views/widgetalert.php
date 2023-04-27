<?php
if (\Yii::$app->session->hasFlash('success')) {
    $session = Yii::$app->session;
    $language = $session->get('success');
    $toast = "toastr.success";
} else if (\Yii::$app->session->hasFlash('info')) {
    $session = Yii::$app->session;
    $language = $session->get('info');
    $toast = "toastr.info";
}else if (\Yii::$app->session->hasFlash('warning')) {
    $session = Yii::$app->session;
    $language = $session->get('warning');
    $toast = "toastr.warning";
} else if (\Yii::$app->session->hasFlash('error')) {
    $session = Yii::$app->session;
    $language = $session->get('error');
    $toast = "toastr.error";
}
$js = <<<JS
var re = $toast;
    re('Уведомление будет скрыто автоматически.', '$language', {
        timeOut: 5000,
        closeButton: true,
        progressBar: true
    });
 
     
JS;


$this->registerJs($js);
?>
