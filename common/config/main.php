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
        'except' => ['api/get-calls', 'api/get-orders', 'api/status-task', 'api/cron-task', 'api/get-abc', 'sup/get-chat', 'sup/get-glazcentre', 'sup/get-abc', 'api/cron-user', 'api/form-reload'], //
        // Разрешить доступ неавторизованным для экшена (API)
        'rules' => [
            [
                'actions' => ['login', 'signup'],
                'allow' => true,
            ],
            [

                'allow' => true,
                'roles' => ['@'],
            ],
        ],
    ],
];
