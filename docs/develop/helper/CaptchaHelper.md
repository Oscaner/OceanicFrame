
### 图片验证类

基于 Yii2.0 的 captcha 验证码接口

命名空间：`namespace oframe\basics\common\helpers`

调用方式：`use oframe\basics\common\helpers\CaptchaHelper;`

```php
$captcha = new CaptchaHelper();

$captcha::setPhrase(); // 创建图片验证码

$captcha::getPhrase(); // 获取验证码字符

$captcha::base64();    // 获取验证码图片。若没有找到验证码，会自动创建一个。目前仅支持 base64 格式图片
```

### 默认参数

```php
/**
 * 默认配置
 * @Author OceanicKang 2018-11-03
 */
public static $config = [
    'minLength' => 5,        // 最少显示个数
    'maxLength' => 5,        // 最大显示个数
    'padding'   => 5,        // 间距
    'backColor' => 0xffffff, // 背景颜色
    'foreColor' => 0x1ab394, // 字体颜色
    'width'     => 80,       // 宽度
    'height'    => 40,       // 高度
    'offset'    => 4,        // 设置字符偏移量
];
```

> 可根据实际情况修改默认参数，在实例化类的时候附带 array 参数，如下：

```php
$captcha = new CaptchaHelper([
                        'minLength' => 3,
                        'maxLength' => 3,
                        'width' => 100,
                    ]);

// 或者

$config = [
    'minLength' => 3,
    'maxLength' => 3,
    'width' => 100,
];
$captcha = new CaptchaHelper($config);
```


