<?php

require __DIR__ .'/../vendor/autoload.php';
(new Dotenv\Dotenv(__DIR__ . '/../'))->load();  // .env

define('YII_ENV', 'test');
defined('YII_DEBUG') or define('YII_DEBUG', true);

require_once(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');