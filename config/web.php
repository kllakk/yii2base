<?php

$params = require(__DIR__ . '/params.php');
$modules = require(__DIR__ . '/modules.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => [
        'log',
        'app\components\Settings'
    ],
    'layout' => '@app/views/layouts/main',
    'components' => [
        'assetManager' => [
            //'linkAssets' => true,
            'bundles' => [
                'yii\web\YiiAsset' => false,
                'yii\web\JqueryAsset' => false,
                'yii\widgets\PjaxAsset' => false,
                'yii\widgets\ActiveFormAsset' => false,
                'yii\grid\GridViewAsset' => false,
                'yii\captcha\CaptchaAsset' => false,
                'yii\validators\ValidationAsset' => false,
                'yii\bootstrap\BootstrapAsset' => false,
                'yii\bootstrap\BootstrapThemeAsset' => false,
                'yii\bootstrap\BootstrapPluginAsset' => false,
                'yii\jui\JuiAsset' => false
            ],
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => getenv('COOKIE_VALIDATION_KEY'),
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'loginUrl'=> ['admin/default/login'],
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
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
        'db' => require(__DIR__ . '/db.php'),
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
//                '<module:admin>/<action:\w+>' => '<module>/default/<action>',
//                '<module:admin>/<action:\w+>/<id:\d+>' => '<module>/default/<action>',
            ],
        ],
    ],
    'params' => $params,
    'modules' => $modules,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
