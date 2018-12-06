
## 类重写

#### 原始重写方法

假如我们需要重写某个 Yii 的类方法,譬如： `yii\helpers\ArrayHelper`

那么首先需要新建一个类，继承，然后覆盖这个类的方法。

但是当我们的系统都成型了，我们需要在调用这个类的地方，将 `use yii\helpers\ArrayHelper` 改成 `use xxxxxx\helpers\ArrayHelper`

如果只是一两个文件中调用还方便，如果十来个二十来个文件呢

这将会造成大量的时间和精力浪费，不利于项目维护

于是就有了下面 `YiiClassMap 重写机制`

#### YiiClassMap 重写机制

通过配置文件的方式进行替换，无需进行大量重复的复制粘贴

【举个栗子】

我想重写 Yii 的 FileCache，即文件缓存类，添加缓存日志功能

那么我先在 `common/replace/common` 目录中添加重写后的 cache 类文件

然后在 `common/config/YiiClassMap.php` 中添加一条数组，内容如下：

```php
<?php

return [
    'yii\caching\Cache' => '@common/replace/common/Cache.php', // 重写cache 添加了日志功能
];
?>

```

【注意】

* 重写类文件的 `namespace` 要和被重写的类文件一致，如 要重写 `yii\caching\Cache`，那么重写后的 `common/replace/common/Cache.php` 文件的命名空间也应当是 `yii\caching\Cache`

* 重写类文件均在 `common/replace` 目录下

* 不同应用的重写类文件应当放在不同应用文件夹下，如 要重写 `backend` 中才会调用的类文件，那么我应当把重写类放在 `common/replace/backend` 目录下

## 视图重写

根据 Yii2.0 的模板路径优先级加载

如果想替换系统原先的视图文件，改写为自己的视图文件

可以在 `backend/modules/sys/views/` 目录下创建对应目录结构的视图文件进行替换

具体可参考 `backend/config/main.php` 文件中的配置：

```php
/** ------ 视图替换 ------ **/
'view' => [
    'theme' => [
        'pathMap' => [
            // 表示 @backend/views 优先于 @basics/backend/views 加载
            '@basics/backend/views' => '@backend/views',
            '@basics/backend/modules/sys/views' => '@backend/modules/sys/views',
        ],
    ],
],
```

## 模块重写

Yii2.0 的相关知识，直接在 `backend/config/main.php` 中，将如下对应的 `class` 指向自己的模块路径即可

```php
'modules' => [
    /* 系统模块 */
    'sys' => [
        'class' => 'oframe\basics\backend\modules\sys\index',
    ],

],
```

## 控制器重写

在 `main.php` 中与 `components` 同级添加 `controllerMap` 并把对应的 `class` 指向自己的控制器路径

```php
'controllerMap' => [
    // 文件上传公共控制器
    'file' => [
        'class' => 'oframe\basics\common\controllers\FileBaseController',
    ]
],
```



## 引用

类重写官方介绍：http://www.yiiframework.com/doc-2.0/guide-helper-overview.html#customizing-helper-classes

Yii2.0 的自动加载机制：http://www.digpage.com/autoload.html

控制器重写的简单应用：https://blog.csdn.net/gaoxuaiguoyi/article/details/50909446

类重写介绍来源：Terry博客

