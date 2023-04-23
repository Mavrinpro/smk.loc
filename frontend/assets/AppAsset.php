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
        'css/main.css',
//'https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css'
    ];
    public $js = [
        'js/main.js',
        //'https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js',
        //'https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js',
        //'https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js',
        'js/bootstrap-switch.min.js',
        'js/custom.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap4\BootstrapAsset',
        //'yii\bootstrap4\BootstrapAsset',
    ];
}
