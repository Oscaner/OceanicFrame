
### 系统信息类

根据项目实际需求自定义的一些操作获取系统信息的方法

命名空间：`namespace oframe\basics\common\helpers`

调用方式：`use oframe\basics\common\helpers\SystemHelper`

静态调用：如 `SystemHelper::getFileTypeToEN()`

#### 1、获取文件类型

> getFileTypeToEN($fileName) <br>
> getFileTypeToCN($fileName)

| 参数 | 描述 | 是否必须 |
| :------- | :------- | :------- |
| fileName | 文件名 | 必须 |

```php
$txt = SystemHelper::getFileTypeToEN('demo.txt');

echo $txt; // txt
```

文件扩展名的中文名称可在 `/common/config/params.php` 中进行修改

#### 2、获取文件夹大小

> getDirSize($dir)


| 参数 | 描述 | 是否必须 |
| :------- | :------- | :------- |
| dir | 文件夹路径 | 必须 |
