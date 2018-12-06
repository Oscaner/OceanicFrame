
## 编程规范

* 符合 PSR-1 或 PSR-2 的 PHP 编程 [PHP编程规范](/appendix/php-standard.md)

* 方法有注释，注释包括功能、参数、返回值，如有必要可附带示例

* 类属性、方法均以驼峰式命名，不能出现下划线

* 函数命名 小写字母加下划线

* 常量全部大写下划线分割

* 变量、函数名一律为小写格式

* 属性、类私有成员属性命名，开头小写驼峰

* 以标准计算机英文为蓝本，杜绝一切拼音、或拼音英文混杂的命名方式

* PHP 的内建值 true、false 和 null 必须全部采用小写字母书写

* 文件编码为 UTF-8，并关闭 UTF-8 BOM

* 常量与变量进行相等判断时，常量写在前面，如 `0 == $status` `null === $context`。这样可以减少不必要的小bug。

## 框架规范

* 自定义助手类统一放于 `common/helpers/` 目录，且方法必须均为 static 类型，即静态方法

* 公共模型统一放于 `common/models/` 目录，私有表单模型统一放于 `应用/模型` 下

* 状态枚举统一调用 `common/enums/[应用]StatusEnum.php` 中的常量及属性

* 资源文件在 `web/resource` 下对应的各应用文件夹内

* 每个应用下都应当有一个基类控制器，进行必要的统一操作。 各应用的基类控制器都需统一继承核心公共基类控制器，核心公共基类控制器的命名空间为 `oframe\basics\common\controllers\BaseController`。
如 backend 的 基类控制器 `backend\controllers\BController` 继承 `oframe\basics\backend\controllers\BController` 继承 `oframe\basics\common\controllers\BaseController`

* 进行 backend 开发时，统一继承 `backend\controllers\BController`。其他应用同理

* 路径别名在 `common/config/bootstrap.php` 中定义

* 类重写在 `common/config/YiiClasMap.php` 中定义，具体看 [重写机制](/develop/system/rewrite.md)

## 数据库规范

* 数据表必须添加注释，命名小写，多关键字下划线分割

* 数据字段必须添加注释， 命名小写，多关键字下划线分割

* `status` 状态字段类型为 `tinyint(4)`

* 假删除，即放入回收站，标记 `status` 为 -1

* 创建时间字段为 `append`，修改时间字段为 `updated`，类型为 `int(10)`

* 所有字段不允许 null 值
