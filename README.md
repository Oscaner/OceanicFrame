
> 注：由于第一版本任处于开发状态，大量功能还未完善，若想体验可自行安装，敬请谅解。等第一版本稳定后，我会搭建相关演示站点 (•̀ᴗ•́)و ̑̑

## 前言

OceanicFrame 项目的灵感来源于 [GitEE](https://gitee.com/explore) 里的一些开源项目

> 在这里必须得感谢一下各位开发者大大们的开源精神！！！

该项目基于 [Yii2.0](https://www.yiichina.com/) 框架

目的是为了集成管理系统开发中常见的基础功能，减少不必要的重复开发

做到开箱即用，让开发变得更加简单

## 特色


1. 多入口模式。 目前已确定的入口有 frontend(前台) 、 backend(后台) 、 wechat(微信) 、 api(Api接口)

2. 只做基层开发。 在 OceanicFrame 上不会开发过多的业务功能，令 OceanicFrame 在减少重复开发的同时又不失灵活性

3. 最小干扰升级。 OceanicFrame 的核心文件以 Composer 包进行管理，位于 `vendor/oceanickang/oframe-basics` 路径下，可通过 `composer update oframe-basics` 进行核心功能升级

4. 重写机制。 系统自带的各类文件均可被重写，而无需修改源码文件

5. 引入服务层。 适应更多底层服务，service 层调用请看 [服务层调用](/develop/system/service.md)

6. 应用 RESTful API 风格，使 API 开发更加简便规范 

7. RBAC 权限管理。 RBAC 和系统无缝对接，具体使用查看 [RBAC 权限管理](/app-guide/rbac.md)

8. 对接微信开发，集成了一款优秀的微信非官方 SDK [EasyWeChat](https://www.easywechat.com/)。 开发指南可参考 OceanicFrame 项目文档，或前往 [EasyWeChat](https://www.easywechat.com/) 查看其 SDK 文档

9. 整合第三方登录

10. 整合第三方支付

11. 详细的文档说明，便于开发者的二次开发

## 预备知识

* 具备 PHP 基础知识
* 具备 Yii2.0 基础开发知识
* 具备个人解决问题的能力。由于本人精力有限，非框架本身 Bug 或 比较有特色的建议，请尽量自行解决、自行完成
* 对微信开发有需求的用户，需要具备基本的 WeChat 开发知识
* 对 API 开发有需求的用户，需要具备基本的 RESTful API 开发知识
* 善于利用 谷哥 and 度娘，目前开发中的问题基本能通过网络获取到

【注】

还有，谢绝回答以下这类问题：
`为什么更新数据变成插入数据了呀？`
`为什么我数据库连接不上？`
`为什么我页面上数据显示不出来？`
`我这里可能有点问题，你能不能帮我看一下？（报错什么的全不给，就给一张代码图）`

## 项目文档

[OceanicFrame 文档手册](https://oceanickang.github.io/OceanicFrame/#/)

## 项目示例

> 我还没挂上站点，敬请期待吧

## 友情链接

My Blog：https://www.oceanickang.com/

感谢以下项目，排名不分先后

Yii2.0：https://www.yiichina.com/

EasyWeChat：https://www.easywechat.com/

Layui：https://www.layui.com/

## 版权信息

OceanicFrame 遵循 Apache2.0 开源协议发布，并提供免费使用

OceanicFrame 的模板来源 [layuiAdmin iframe版](http://www.layui.com/admin/)，基于 LPPL 付费协议，特此声明

本项目中包含的其他第三方源码等版权信息另行标注

Copyright © 2018-2018 by OceanicKang [www.oceanickang.com](https://www.oceanickang.com)


