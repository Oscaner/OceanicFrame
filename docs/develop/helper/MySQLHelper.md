
### MySQL 助手类

用于数据库的备份、还原、修复、优化

命名空间：`namespace oframe\basics\common\helpers`

调用方式：`use oframe\basics\common\helpers\MySQLHelper;`

## 配置说明

| 配置项 | 参数类型 | 说明 | 默认 |
| :--- | :--- | :--- | :--- |
| host | string | 数据库地址 | 引用 `/common/config/main-local.php` |
| dbname | string | 数据库名称 | 引用 `/common/config/main-local.php` |
| port | int | 端口 | 3306 |
| username | string | 用户名 | 引用 `/common/config/main-local.php` |
| password | string | 密码 | 引用 `/common/config/main-local.php` |
| charset | string | 编码 | 引用 `/common/config/main-local.php` |
| tablePrefix | string | 表前缀 | 引用 `/common/config/main-local.php` |
| path | string | 备份地址 | 默认 `/common/backup/mysql/` |
| isCompress | int | 是否开启 gzip 压缩 | 1(开启) |
| isDownload | int | 压缩后是否自动下载 | 0(不自动) |
| safe_delimiter | string | 安全分隔符 | `';/* MySQLReback Separation */'` |  |

## 内置方法

#### 1、设置预备份数据库

```php
$sql = new MySQLHelper;

$dbname = ''; 
// or $dbname = 'dbname';
// or $dbname = ['dbname1', 'dbname2', ...];

$sql -> setDbname($dbname);
```

【说明】

- 空字符：默认，引用 `/common/config/main-local.php`
- 字符串：如 `'dbname'`，连接单个数据库
- 数组：如 `['dbname1', 'dbname2', ...]`，连接多个数据库

#### 2、备份

```php
$sql = new MySQLHelper;

$sql -> setDbname(); // 先连接数据库

$sql -> backup();
```

#### 3、恢复数据库

```php
$sql = new MySQLHelper;

$sql -> setDbname(); // 先连接数据库

$sql -> recover('文件名');
```

#### 4、数据表优化

```php
$sql = new MySQLHelper;

$sql -> setDbname(); // 先连接数据库

$tables = '';
// or $tables = 'table';
// or $tables = ['table1', 'table2', ...];

$sql -> optimize($tables);
```

【说明】

- 空字符：默认，优化数据库的所有表
- 字符串：如 `'table'`，优化单个表
- 数组：如 `['table1', 'table2', ...]`，优化多个表

#### 5、数据表修复

```php
$sql = new MySQLHelper;

$sql -> setDbname(); // 先连接数据库

$tables = '';
// or $tables = 'table';
// or $tables = ['table1', 'table2', ...];

$sql -> repair($tables);
```

【说明】

- 空字符：默认，修复数据库的所有表
- 字符串：如 `'table'`，修复单个表
- 数组：如 `['table1', 'table2', ...]`，修复多个表

### 示例

自行前往 【系统管理】 - 【数据库管理】 体验
