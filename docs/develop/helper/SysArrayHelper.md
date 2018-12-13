
根据项目实际需求自定义的一些操作 Array 方法（emmmm貌似有造轮子的嫌疑（//▽//））

后面还附带了一份 PHP 的常用函数，方便查阅

命名空间：`namespace oframe\basics\common\helpers`

继承自：`yii\helpers\BaseArrayHelper`

调用方式：`use oframe\basics\common\helpers\SysArrayHelper`

静态调用：如 `SysArrayHelper::itemsMerge($array, 'id', 'pid', $pid = 0)`

Yii2 数组助手类文档：[《助手类（Helpers）: Array 助手（ArrayHelper）》](https://www.yiichina.com/doc/guide/2.0/helper-array)

## SysArray 助手类方法

#### 1、递归分组

> itemsMerge($items, $idName = 'id', $pidName = 'pid', $pid = 0)

| 参数 | 描述 | 是否必须 |
| :------- | :------- | :------- |
| items | 待处理的数组 | 必须 |
| idName | id 的 key | 可选 |
| pidName | 父 id 的 key | 可选 |
| pid | 父 id 的 value | 可选 |

```php
$array = [
    0 => ['id' => 1, 'pid' => 0],
    1 => ['id' => 2, 'pid' => 0],
    2 => ['id' => 3, 'pid' => 1],
    3 => ['id' => 4, 'pid' => 2],
    4 => ['id' => 5, 'pid' => 1],
];

$array = SysArrayHelper::itemsMerge($array, 'id', 'pid', $pid = 0);

$array = [
    0 => [
        'id' => 1,
        'pid' => 0,
        'child' => [
            0 => ['id' => 3, 'pid' => 1],
            1 => ['id' => 5, 'pid' => 1],
        ]
    ],
    1 => [
        'id' => 2,
        'pid' => 0,
        'child' => [
            0 => ['id' => 4, 'pid' => 2],
        ]
    ],
];
```

#### 2、根据父 ID 返回所有子孙 ID

> getChildsId($cate, $pid)

| 参数 | 描述 | 是否必须 |
| :------- | :------- | :------- |
| cate | 数据 | 必须 |
| pid | 父id | 必须 |

```php
$array = [
    0 => ['id' => 1, 'pid' => 0],
    1 => ['id' => 2, 'pid' => 0],
    2 => ['id' => 3, 'pid' => 1],
    3 => ['id' => 4, 'pid' => 2],
    4 => ['id' => 5, 'pid' => 1],
    5 => ['id' => 6, 'pid' => 3],
    6 => ['id' => 7, 'pid' => 6]
];

$array = SysArrayHelper::getChildsId($array, 1);

$array = [
    0 => ['id' => 3, 'pid' => 1],
    1 => ['id' => 5, 'pid' => 1],
    5 => ['id' => 6, 'pid' => 3],
    6 => ['id' => 7, 'pid' => 6]
];
```


## 常用 PHP 函数

#### 1、分割字符串

> explode(separator, string, limit)

| 参数 | 描述 | 是否必须 | 说明 |
| :------- | :------- | :------- | :------- |
| separator | 规定在哪里分割字符串 | 必需 |  |
| string    | 要分割的字符串      | 必需 |  |
| limit | 规定所返回的数组元素的数目 | 可选 | 大于 0 - 返回包含最多 limit 个元素的数组 <br> 小于 0 - 返回包含除了最后的 -limit 个元素以外的所有元素的数组 <br> 等于0 - 返回包含一个元素的数组 |

```php
explode(",", $string); // 以逗号分隔字符串     return array
```

#### 2、搜索数组中是否存在指定的值

> in_array(search, array, type)

| 参数 | 描述 | 是否必须 |
| :------- | :------- | :------- |
| search | 规定要在数组搜索的值 | 必需 |
| array | 规定要搜索的数组      | 必需 |
| type | 如果设置该参数为 true，则检查搜索的数据与数组的值的类型是否相同 | 可选 |

```php
in_array("Mark", $people);  // 查找 peopel 数组中是否存在 Mark     return bool
```

#### 3、在数组中搜索某个键值，并返回对应的键名

> array_search(value, array, strict)

| 参数 | 描述 | 是否必须 | 说明 |
| :------- | :------- | :------- | :------- |
| value | 规定需要搜素的键值 | 必需 |  |
| array | 规定被搜索的数组      | 必需 |  |
| strict | 如果该参数被设置为 TRUE，则函数在数组中搜索数据类型和值都一致的元素 | 可选 | 如果设置为 true，则在数组中检查给定值的类型，数字 5 和字符串 5 是不同的 |

```php
array_search("red", $a);  // 查找 a 数组中键值为 red 的键名    return string|bool
```

#### 4、数组合并

> array_merge(array1, array2, array3, ...)

| 参数 | 描述 | 是否必须 |
| :------- | :------- | :------- |
| array1 | 规定数组 | 必需 |
| array2 | 规定数组 | 可选 |
| array2 | 规定数组 | 可选 |

```php
array_merge(array1, array2) // 合并数组 array1 和 array2     return array
```

#### 5、返回输入数组中某个单一列的值

> array_column(array, column_key, index_key)

| 参数 | 描述 | 是否必须 | 说明 |
| :------- | :------- | :------- | :------- |
| array | 规定要使用的多维数组（记录集） | 必需 | 无 |
| column_key | 需要返回值的列 | 必需 | 该参数也可以是 NULL，此时将返回整个数组（配合 index_key 参数来重置数组键的时候，非常有用 |
| index_key | 用作返回数组的索引/键的列 | 可选 | 无 |

```php
array_column($arr, "name", "id");  // 返回 arr 二维数组中键名为 name 的数据，并以 id 作为键值     return array
array_column($arr, null, "id");    // 返回 arr，并将键值改写为相应的 id 值                      return array
```

