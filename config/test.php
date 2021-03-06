<?php
$params = require(__DIR__ . '/params.php');
$dbParams = require(__DIR__ . '/test_db.php');
$modules = require(__DIR__ . '/modules.php');

/**
 * Application configuration shared by all test types
 */
return [
    'id' => 'basic-tests',
    'basePath' => dirname(__DIR__),    
    'language' => 'en-US',
    'bootstrap' => [ 'app\components\Settings' ],
    'components' => [
        //'db' => $dbParams,
        'db' => require(__DIR__ . '/db.php'), // пока так
        'mailer' => [
            'useFileTransport' => true,
        ],
        'assetManager'=>[
            'basePath'=> __DIR__ . '/../tests/assets'
        ],
        'urlManager' => [
            'showScriptName' => true,
        ],
        'user' => [
            'identityClass' => 'app\models\User',
        ],        
        'request' => [
            'cookieValidationKey' => 'test',
            'enableCsrfValidation' => false,
            // but if you absolutely need it set cookie domain to localhost
            /*
            'csrfCookie' => [
                'domain' => 'localhost',
            ],
            */
        ],        
    ],
    'params' => $params,
    'modules' => $modules,
];
