<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [

    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'name' => 'СМК ГлазЦентр',
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'layout'=>'bootstrap',
    'modules' => [
        'redactor' => 'yii\redactor\RedactorModule',
        'gridview' => [
            'class' => 'kartik\grid\Module',
            // other module settings
        ]
    ],
    'components' => [
        'response' => [
            'formatters' => [
                'html' => [
                    'class' => 'yii\web\HtmlResponseFormatter',
                ],
                'pdf' => [
                    'class' => 'robregonm\pdf\PdfResponseFormatter',
                ],
            ],
        ],
        'authManager' => ['class' => 'yii\rbac\DbManager'],
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@app/views' => '@backend/views/src/views'
                ],
            ],
        ],
        'request' => [
            'csrfParam' => '_csrf-frontend',
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ]
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'maxSourceLines' => 10,
            'errorAction' => 'site/error',
        ],

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            //'suffix' => '.html',
            'rules' => [
                '' => 'site/index',
                'login' => 'site/login',
                'signup' => 'site/signup',
                'confirm' => 'site/confirm',

                '<controller:(department|doctors|review|tasks|branch|page|signup|layouts-mail|user|tracking|site|confirm|protocol)>/<action:(index|update|delete|view|create|change-password|userscore)>/<id:\d+>' =>
                    '<controller>/<action>',
                '<controller:\w+>/<page:\d+>' => '<controller>/index',
                ['class' => 'yii\rest\UrlRule', 'controller' => 'api'],
            ],

        ],
        'assetManager' => [
            'basePath' => '@webroot/assets',
            'baseUrl' => '@web/assets',
            'bundles' => [
                'kartik\form\ActiveFormAsset' => [
                    'bsDependencyEnabled' => false // do not load bootstrap assets for a specific asset bundle
                ],
            ],
        ],
        'request' => [
            'baseUrl' => ''
        ],


    ],
    'params' => $params,
];
