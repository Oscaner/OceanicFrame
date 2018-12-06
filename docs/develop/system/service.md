
模仿 Fecshop 实现的 service 服务层，并引用 [Fecshop官方文档](http://www.fecshop.com/doc/fecshop-guide/develop/cn-1.0/guide-fecshop-service-abc.html) 的服务说明

意图为各个应用系统提供底层服务，[《谈谈 MVCS 架构（转载）》](https://www.oceanickang.com/skill/Others_1850_2018_11_17.html)

## 原则约定

各个“应用系统”，譬如 frontend、backend、wechat，是一个独立的文件结构

他们都有独立的模块，里面有 controller（控制层) 、view（视图层），但是没有 model 层（引用 Fecshop 官方文档，和咱们的系统不相符）

在原则上约定，各个“应用系统”不能直接访问 model， 只能访问 Service（服务层），来进行数据的获取和处理工作，然后由 service 层 访问 model 层进行数据的获取处理等工作

## 服务层的功能粒度

首先，对于 model 层的函数粒度，对应的是数据的操作，譬如更改某一行数据，添加一行数据等，这个地球人都知道。

对于 service 层的函数粒度，一般是我们语言描述需求的最小粒度，

譬如：把一个产品加入购物车， 删除购物车的某个产品，调出某个分类下的产品，登录用户，计算产品的最终价格，等等，对于上面的这些最小的 语言描述粒度，会在服务层实现，然后直接访问该服务中的方法即可。

## 实现原理

引用 [yii2 给Yii 添加一个变量，Yii::$service，并像组件component那样可以添加单例配置](http://www.fancyecommerce.com/2016/07/27/yii2-%e7%bb%99yii-%e6%b7%bb%e5%8a%a0%e4%b8%80%e4%b8%aa%e5%8f%98%e9%87%8f%ef%bc%8c%e5%b9%b6%e5%83%8f%e7%bb%84%e4%bb%b6component%e9%82%a3%e6%a0%b7%e5%8f%af%e4%bb%a5%e6%b7%bb%e5%8a%a0%e5%8d%95%e4%be%8b/)

## 如何使用

1、在 `common\config\main.php` 中的 services (服务层) 注册相应服务类文件

```php
// 服务层
'services' => [
    // 测试 服务
    'test' => [
        'class' => 'services\common\TestService',
        'childService' => [
            'test_1' => [
                'class' => 'services\common\test\TestService',
            ],
        ],
    ],

]
```

2、编写父级服务 `services/common/TestService.php`，注意必须继承 `/oframe/basics/services/Service`

```php
<?php
namespace services\common;

/**
 * Class TestService
 * @package services\common
 */
class TestService extends \oframe\basics\services\Service
{
    public $text = '来自父 Test 服务的调用';

    public function p()
    {
        var_dump($this -> text);
    }
}
```

3、编写子服务 `services/common/test/TestService.php`，按需要继承，一般继承父级服务

```php
<?php
namespace services\common\test;

/**
 * Class TestService
 * @package services\common\test
 */
class TestService extends \services\common\TestService
{
    public function init()
    {
        $this -> text = '来自子 Test 服务的调用';

        return parent::init();
    }

}
```

4、访问服务

```php
Yii::$service -> test -> p();           // 访问父级 Test 服务
Yii::$service -> test -> test_1 -> p(); // 访问 Test 的子服务
```


