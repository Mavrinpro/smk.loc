<?php
return [
    'language' => 'ru-RU',
    'sourceLanguage' => 'ru',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
    // Доступ только авторизованным пользователям
    'as beforeRequest' => [
        'class' => 'yii\filters\AccessControl',
        'except' => ['confirm', 'reset-password'], //
        // Разрешить доступ неавторизованным для экшена (API)
        'rules' => [
            [
                'actions' => ['login', 'signup', 'confirm', 'reset-password', 'request-password-reset', 'ajax-select'],
                'allow' => true,
            ],
            [

                'allow' => true,
                'roles' => ['@'],
            ],
        ],
    ],
];
