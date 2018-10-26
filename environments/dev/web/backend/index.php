<?php
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

require __DIR__ . '/../../vendor/autoload.php';
require __DIR__ . '/../../vendor/oceanickang/oframe-basics/yii/Yii.php';
require __DIR__ . '/../../common/config/bootstrap.php';
require __DIR__ . '/../../backend/config/bootstrap.php';

$config = yii\helpers\ArrayHelper::merge(
    require __DIR__ . '/../../common/config/main.php',
    require __DIR__ . '/../../common/config/main-local.php',
    require __DIR__ . '/../../backend/config/main.php',
    require __DIR__ . '/../../vendor/oceanickang/oframe-basics/backend/config/main.php',
    require __DIR__ . '/../../backend/config/main-local.php'
);

/**
 * yii class Map Custom
 * 
 */ 
$yiiClassMap = require(__DIR__ . '/../../common/config/YiiClassMap.php');
if(is_array($yiiClassMap) && !empty($yiiClassMap)){
    foreach($yiiClassMap as $namespace => $filePath){
        Yii::$classMap[$namespace] = $filePath;
    }
}

new oframe\basics\services\Application($config['services']);

unset($config['services']);

(new yii\web\Application($config))->run();
