<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/../../vendor/oceanickang/oframe-basics/backend/config/params.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',

    'basePath' => dirname(__DIR__),

    'controllerNamespace' => 'backend\controllers',

    'bootstrap' => ['log'],

    'modules' => [
        /* 系统模块 */
        'sys' => [
            'class' => 'oframe\basics\backend\modules\sys\index',
        ],

    ],

    'components' => [

        'request' => [
            'csrfParam' => '_csrf-backend',
        ],

        'user' => [
            'identityClass' => 'common\models\backend\Manager',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
            'loginUrl' => ['site/login'],
            'as afterLogin' => 'common\behaviors\AdminLog',
            'as beforeLogout' => 'common\behaviors\AdminLog',
        ],

        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'oframe-backend',
            'timeout' => 60 * 60 * 2,
            // 'class' => 'yii\redis\Session' // 使用 redis 存储 session，实现跨服务器共用 session
        ],

        /** ------ 视图替换 ------ **/
        'view' => [
            'theme' => [
                'pathMap' => [
                    // 表示 @backend/views 优先于 @basics/backend/views 加载
                    '@basics/backend/views' => '@backend/views',
                    '@basics/backend/modules/sys/views' => '@backend/modules/sys/views',
                    '@basics/backend/modules/wechat/views' => '@backend/modules/wechat/views'
                ],
            ],
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
            'errorAction' => 'site/error',
        ],
        
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
       
    ],

    'params' => $params,
];
