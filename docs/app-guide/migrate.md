
## 命令行

打开命令行窗口，进入项目根目录，执行如下命令：

```
> php ./yii migrate/backup all                     # 备份全部表
> php ./yii migrate/backup table1,table2,table3... # 备份多张表
> php ./yii migrate/backup table1                  # 备份一张表
> php ./yii migrate/up                             # 恢复全部表
```

#### 引用

[yii2命令行中使用migration备份和还原数据库](https://packagist.org/packages/e282486518/yii2-console-migration)

## Web窗口

位置：【系统管理】 - 【数据库管理】

![database.png](https://image.oceanickang.com/typecho/2018/11/26/382543905855448/database.png)

整体功能的实现引用了助手类 [MySQLHelper](/develop/helper/MySQLHelper.md)

【注】

1、修复数据表：尝试使用 `REPAIR` 命令修复损坏的表，仅能做简单修复

2、优化数据表：执行 `OPTIMIZE` 命令，可回收未释放的磁盘空间，建议每月执行一次

3、`MySQLHelper` 助手类是自行封装实现，可能存在未知 BUG。请在使用前做一次整体测试，以防出现问题。在遇到 Bug 的时候及时向作者反馈，谢谢
