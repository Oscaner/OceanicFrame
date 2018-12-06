
### Ajax 助手类

用于规范 Ajax 的数据返回格式以及状态码


命名空间：`namespace oframe\basics\common\helpers`

调用方式：`use oframe\basics\common\helpers\AjaxHelper;`

```php
$data = ['aaa', 'bbb', 'ccc'];

$response = Yii::$app -> response;

$response -> data = AjaxHelper::formatData(AjaxHelper::AJAX_SUCCESS, '', $data);

$response -> send();
```

### 默认状态码及说明

```php
const AJAX_SUCCESS       = '200'; // 请求成功
const AJAX_NOT_HAVE_DATA = '201'; // 没有数据 或者 没有更多数据
const AJAX_NOT_AUTH      = '401'; // 没有权限
const AJAX_NOT_FOUND     = '404'; // 未找到请求对象
const AJAX_NOT_VALIDATY  = '422'; // 数据验证有误
const AJAX_UNKNOW        = '500'; // 未知错误

/**
 * 说明
 *
 * @var array
 */
public static $behavior = [
    self::AJAX_SUCCESS       => '请求成功',
    self::AJAX_NOT_HAVE_DATA => '没有数据 或者 没有更多数据',
    self::AJAX_NOT_AUTH      => '没有权限',
    self::AJAX_NOT_FOUND     => '未找到请求对象',
    self::AJAX_NOT_VALIDATY  => '数据验证有误',
    self::AJAX_UNKNOW        => '未知错误',
];
```

### 内置方法

#### 1、格式化数据

> formatData($code = self::AJAX_UNKNOW, $message = '', $data = [])


| 参数 | 描述 | 是否必须 | 说明 |
| :------- | :------- | :------- | :------- |
| code | 状态码 | 可选 | 默认：AJAX_UNKNOW(500) |
| message | 状态描述 | 可选 | 默认或空字符：AjaxHelper::$behavior 中对应说明 |
| data | 需要发送的数据 | 可选 | 默认：空array |



