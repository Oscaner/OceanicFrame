
### 说明

菜单模型调用：`use oframe\basics\common\models\backend\Menu;`

配合状态枚举：[StatusEnum](/develop/helper/StatusEnum.md)

> 侧边菜单标识： `Menu::TYPE_SIDE` <br>
> 系统菜单标识： `Menu::TYPE_SYS` <br>
> 调用侧边菜单信息缓存: `Yii::$app -> cache -> get(Menu::TYPE_SIDE)` <br>
> 调用系统菜单信息缓存: `Yii::$app -> cache -> get(Menu::TYPE_SYS)` <br>

## 侧边菜单

1、点击右上角的设置按钮（齿轮图案）进入系统设置界面

![系统设置界面](https://image.oceanickang.com/typecho/2018/11/04/45497738530449/setting-view.png)

2、选择侧边菜单，进入侧边菜单界面

![侧边菜单](https://image.oceanickang.com/typecho/2018/11/03/439151913339472/side-menu-view.png)

3、点击添加新菜单，填入相应菜单信息（注意：路由必须 '/' 开头，否则不生效)

![填写信息](https://image.oceanickang.com/typecho/2018/11/03/44068671152637/add-menu-1.png)

4、确定以后，刷新界面即可在侧边栏显示新添加的菜单

![添加后](https://image.oceanickang.com/typecho/2018/11/03/442151143156354/has-menu.png)

【注意】

1、图标栏右边的带圈加号用于添加子菜单，最多可添加三级菜单

2、若某菜单拥有子菜单，则该父级菜单的路由将失效，子菜单路由生效

3、删除的路由可在回收站查看

4、若在回收站里删除菜单，则该菜单将从数据库移除无法恢复，请谨慎操作

## 系统菜单

1、系统菜单主要用于管理 【系统管理】 界面的菜单，与侧边菜单操作相同

2、系统菜单必须添加二级菜单，一级菜单不生效

