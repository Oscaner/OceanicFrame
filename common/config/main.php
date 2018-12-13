<?php
return [
    'language' => 'zh-CN',

    'sourceLanguage' => 'zh-cn',

    'timeZone' => 'Asia/Shanghai',

    'bootstrap' => [
        'queue'// 队列系统
    ],

    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],

    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',

    // 'on beforeRequest' => function ($event) {
    //     \yii\base\Event::on(
    //         \yii\base\Application::className(),
    //         \yii\base\Application::EVENT_BEFORE_REQUEST,
    //         // 自动检查 redis 是否可用，不可用换文件缓存
    //         // 会极大影响系统性能 不建议开启
    //         ['oframe\basics\services\modules\common\EventService', 'checkRedis']
    //     );
    // },

    'components' => [

        /** ------ 公共配置标识 ------ **/
        'config' => [
            'class' => 'oframe\basics\common\models\common\Config'
        ],

        /** --------- 缓存 --------- **/
        // 文件缓存
        'cache' => [
            'class' => 'yii\caching\FileCache',
            'cachePath' => '@common/runtime/cache',
            // 'class' => 'yii\redis\Cache', // redis接管缓存
        ],
        // redis 缓存
        'redis' => [
            'class' => 'yii\redis\Connection',
            'hostname' => 'localhost',
            'port' => 6379,
            'database' => 0,
            'password' => 'abcdef',
        ],
        // memcached 缓存
        'memcached' => [
            'class' => 'yii\caching\MemCache',
            'servers' => [
                // 分布式 连接池
                [
                    'host' => 'localhost', // ip 地址
                    'port' => 11211,       // 端口 11211
                    'weight' => 60,       // 权重
                ],
                [
                    'host' => 'localhost', // ip 地址
                    'port' => 11212,       // 端口 11212
                    'weight' => 40,        // 权重
                ],
            ],
            // 'keyPrefix' => '',     // key 的前缀
            // 'hashKey' => false,    // 对 key 进行 hash 操作
            // 'serializer' => false, // value 的序列化
            'useMemcached' => true,   // 使用 memcached 而不是 memcache
        ],
        // 'mongodb' => [
        //     'class' => '\yii\mongodb\Connection',
        //     // developer: 用户名
        //     // password: 密码
        //     // localhost: 服务器地址
        //     // 27017: 端口
        //     // mydatabase: 数据库名
        //     'dsn' => 'mongodb://developer:password@localhost:27017/mydatabase', 
        // ],

        /** ------ redis 队列 ------ **/
        'queue' => [
            'class' => 'yii\queue\redis\Queue',
            'redis' => 'redis', // 连接组件或它的配置
            'channel' => 'queue', // 队列通道密钥
            'as log' => 'yii\queue\LogBehavior', // 日志
            'ttr' => 5 * 60, // 如果一份作业在这段时间没有执行，它将返回队列进行重试
            'attempts' => 3, // 最大的尝试次数
        ],

        /** ------ 格式化时间 ------ **/
        'formatter' => [
            'dateFormat' => 'yyyy-MM-dd',
            'datetimeFormat' => 'yyyy-MM-dd HH:mm:ss',
            'decimalSeparator' => ',',
            'thousandSeparator' => ' ',
            'currencyCode' => 'CNY',
        ],

        /** ------ 路由配置 ------ **/
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            // 用于表明urlManager是否启用URL美化功能，在Yii1.1中称为path格式URL，    
            // Yii2.0中改称美化。   
            // 默认不启用。但实际使用中，特别是产品环境，一般都会启用。 
            'enablePrettyUrl' => true,

            // 是否启用严格解析，如启用严格解析，要求当前请求应至少匹配1个路由规则，    
            // 否则认为是无效路由。    
            // 这个选项仅在 enablePrettyUrl 启用后才有效。 
            // 'enableStrictParsing' => false,

            // 是否在URL中显示入口脚本。是对美化功能的进一步补充。  
            'showScriptName' => false, // 隐藏index.php

            // 指定续接在URL后面的一个后缀，如 .html 之类的。仅在 enablePrettyUrl 启用时有效。 
            'suffix' => '.html',
            'rules' => [

            ],
        ],

        /** ------ 前台路由配置 ------ **/
        'urlManagerFrontend' => [
            'class' => 'yii\web\urlManager',
            'scriptUrl' => '/index.php', // 代替'baseUrl'
            'enablePrettyUrl' => true,
            'showScriptName' => true,
            'suffix' => '.html',// 静态
        ],

        /** ------ 微信路由配置 ------ **/
        'urlManagerWechat' => [
            'class' => 'yii\web\urlManager',
            'scriptUrl' => '/wechat', // 代替'baseUrl'
            'enablePrettyUrl' => true,
            'showScriptName' => true,
            'suffix' => '.html',// 静态
        ],

    ],


    // 服务层
    'services' => [
        // 公共事件 服务
        'event' => [
            'class' => 'services\common\EventService',
        ],
        // Test 服务
        'test' => [
            'class' => 'services\common\TestService',
            'childService' => [
                'test_1' => [
                    'class' => 'services\common\test\TestService',
                ],
            ],
        ],

    ],
];
