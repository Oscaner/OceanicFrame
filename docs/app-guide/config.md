
配置模型调用：`use oframe\basics\common\models\common\Config;`

配合状态枚举：[StatusEnum](/develop/helper/StatusEnum.md)

## 添加配置标识

1、点击右上角的设置按钮（齿轮图案）进入系统设置界面

![系统设置界面](https://image.oceanickang.com/typecho/2018/11/04/45497738530449/setting-view.png)

2、选择配置管理，进入配置管理界面。点击添加新模块，填入相关信息

![填写信息](https://image.oceanickang.com/typecho/2018/11/04/456652546218465/add-config-1.png)

3、多个模块如下

![添加后](https://image.oceanickang.com/typecho/2018/11/04/466182982749581/add-config-2.png)

【注】每个表格中的第一行都是 `tab 选项卡` 的信息

## 填写配置值

在 【侧边栏】 - 【网站设置】 中进行填写

![set-config.png](https://image.oceanickang.com/typecho/2018/11/30/098611380891963/set-config.png)

## 调用配置标识

相关方法：

```php
Yii::$app -> config -> get('配置标识'); // 调用相关配置的值
Yii::$app -> config -> getAll();       // 获取所有配置标识及相应的值
```

在需要使用配置的地方调用如下代码

```php
Yii::$app -> config -> get('配置标识');
```

如，网站名称的配置标识为 `WEB_SITE_NAME`

则，我在网页 `<title></title>` 处可以这样使用：

```php
<head>

    <title><?php echo Yii::$app -> config -> get('WEB_SITE_NAME') ?></title>

</head>
```
