
### 说明

权限匹配规则在 `vendor/oceanickang/oframe-bascis/backend/controllers/BController.php`

本系统的 RBAC 权限匹配的原理是路由匹配

因此未登记进权限管理的路由将无法授权给任何人

后台核心管理账户默认拥有所有权限，请在 `backend/config/params.php` 中登记后台核心管理账户 ID

## 权限路由

![auth.png](https://image.oceanickang.com/typecho/2018/11/17/22215256252667/auth.png)

权限路由格式：`/module/controller/action`

若不知道 `module`、`controller`、`action` 请看 [《常用方法》](/develop/system/action) 最下方

建议开发者在开发过程中同步登记权限路由，而非后期让系统管理员去登记

## 角色管理

![role.png](https://image.oceanickang.com/typecho/2018/11/17/23611207301739/role.png)

## 分配权限

![auth-assign.png](https://image.oceanickang.com/typecho/2018/11/17/28468194967086/auth-assign.png)

## 分配角色

![role-assing.png](https://image.oceanickang.com/typecho/2018/11/17/29378681598024/role-assign.png)
