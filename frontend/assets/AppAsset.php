<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/bootstrap-datepicker.min.css',
        'css/main.css',
        'css/site.css',
    ];
    public $js = [
        'js/main.js',
        'js/toastr.js',
        '//cdn.jsdelivr.net/npm/sweetalert2@11',
        'js/jquery.editable.min.js',
        'js/bootstrap-datepicker.min.js',
        'js/custom.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
    ];
}
