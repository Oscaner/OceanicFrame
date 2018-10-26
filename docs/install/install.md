## 环境需求

* PHP >= 7.0
* PHP curl 扩展
* PHP fileinfo 扩展
* PHP mysql 扩展
* PHP mysqli 扩展
* PHP openssl 扩展
* MySQL >= 5.6
* Apache or Nginx
* Composer 包管理工具
* Git 版本管理工具
* Node.js (可选，本地浏览文档手册需要用到)

## 工具准备

* [《Windows 下配置 PHP 环境变量》](https://blog.oceanickang.com/skill/Others_1383_2018_10_25.html)
* [《Windows 下配置 Composer 环境变量》](https://blog.oceanickang.com/skill/Others_1385_2018_10_25.html)
* [《Windows 下配置 Git 环境变量》](https://blog.oceanickang.com/skill/Others_1386_2018_10_25.html) 及 [《Git 文档笔记》](https://blog.oceanickang.com/skill/Others_1387_2018_10_25.html)
* [《Windows 下配置 Node.js 环境变量》](https://blog.oceanickang.com/skill/Others_438_2018_09_11.html) 及 [《如何本地查看 OceanicFrame 项目文档》](https://blog.oceanickang.com/skill/Others_1391_2018_10_25.html)

## 正式安装

1、 Git 克隆仓库

```
git clone git@github.com:OceanicKang/OceanicFrame.git

```

2、 进入根目录

```
cd OceanicFrame
```

3、 Composer 依赖安装

```
composer install 或者 php composer.phar install
```

4、 初始化项目（第一个选择 0，之后选择 yes）

```
php init
```

5、 配置数据库

> 修改 common/config/main-local.php 文件，请根据实际情况填写，或默认

6、 安装数据库

```
php ./yii migrate/up
```

7、 站点配置

> 将站点指向根目录下的 web 文件夹

8、 伪静态配置

> Apache 环境可忽略

> Nginx 环境需配置伪静态，请看 [伪静态](install/rewrite)


## 路由明细

> 前台路径： http://domain-name/ or http://domain-name/frontend

> 后台地址： http://domain-name/backend

> 微信地址： http://domain-name/wechat

> Api地址： http://domain-name/api

## 默认用户

> 后台默认用户名： admin

> 后台默认密码： 1234567890

## 附录说明

1、 建议更新依赖

```
composer update
```

2、 路由美化

> 系统默认开启了路由美化（静态路由），访问地址请附带后缀 <code>.html</code>


