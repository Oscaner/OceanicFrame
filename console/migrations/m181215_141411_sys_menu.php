<?php

use yii\db\Migration;

class m181215_141411_sys_menu extends Migration
{
    public function up()
    {
        /* 取消外键约束 */
        $this->execute('SET foreign_key_checks = 0');
        
        /* 创建表 */
        $this->createTable('{{%sys_menu}}', [
            'id' => "int(11) NOT NULL AUTO_INCREMENT",
            'title' => "varchar(50) NOT NULL COMMENT '标题'",
            'describe' => "varchar(255) NOT NULL DEFAULT '' COMMENT '描述'",
            'pid' => "int(50) NOT NULL DEFAULT '0' COMMENT '上级id'",
            'url' => "varchar(50) NOT NULL DEFAULT '' COMMENT '链接地址'",
            'sort' => "int(5) NOT NULL DEFAULT '0' COMMENT '排序'",
            'status' => "tinyint(4) NOT NULL DEFAULT '1' COMMENT '是否显示'",
            'level' => "tinyint(1) NOT NULL DEFAULT '1' COMMENT '级别'",
            'type' => "varchar(10) NOT NULL DEFAULT 'side.menu' COMMENT 'side.menu:侧边菜单;sys.menu:系统菜单'",
            'icon_class' => "varchar(50) NOT NULL DEFAULT '' COMMENT '图标class'",
            'append' => "int(10) NOT NULL DEFAULT '0'",
            'updated' => "int(10) NOT NULL DEFAULT '0'",
            'PRIMARY KEY (`id`)'
        ], "ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='系统 - 菜单导航表'");
        
        /* 索引设置 */
        $this->createIndex('pid','{{%sys_menu}}','pid',0);
        
        
        /* 表数据 */
        $this->insert('{{%sys_menu}}',['id'=>'1','title'=>'用户权限','describe'=>'RBAC 权限管理','pid'=>'0','url'=>'RBAC','sort'=>'0','status'=>'1','level'=>'1','type'=>'sys.menu','icon_class'=>'zmdi zmdi-key','append'=>'1541412697','updated'=>'1541412697']);
        $this->insert('{{%sys_menu}}',['id'=>'2','title'=>'后台用户','describe'=>'后台用户管理','pid'=>'1','url'=>'/sys/manager/index','sort'=>'1','status'=>'1','level'=>'2','type'=>'sys.menu','icon_class'=>'zmdi zmdi-accounts','append'=>'1541412877','updated'=>'1544684743']);
        $this->insert('{{%sys_menu}}',['id'=>'3','title'=>'角色管理','describe'=>'用户角色分配','pid'=>'1','url'=>'/sys/rbac/role','sort'=>'2','status'=>'1','level'=>'2','type'=>'sys.menu','icon_class'=>'zmdi zmdi-accounts-list-alt','append'=>'1541412942','updated'=>'1544684744']);
        $this->insert('{{%sys_menu}}',['id'=>'4','title'=>'权限管理','describe'=>'角色的创建及权限分配','pid'=>'1','url'=>'/sys/rbac/accredit','sort'=>'3','status'=>'1','level'=>'2','type'=>'sys.menu','icon_class'=>'zmdi zmdi-key','append'=>'1541412975','updated'=>'1544684746']);
        $this->insert('{{%sys_menu}}',['id'=>'5','title'=>'网站设置','describe'=>'填写配置数据','pid'=>'0','url'=>'/sys/setting/config','sort'=>'0','status'=>'1','level'=>'1','type'=>'side.menu','icon_class'=>'layui-icon layui-icon-set','append'=>'1541413469','updated'=>'1544020742']);
        $this->insert('{{%sys_menu}}',['id'=>'9','title'=>'规则管理','describe'=>'暂无','pid'=>'1','url'=>'/sys/rbac/rule','sort'=>'4','status'=>'1','level'=>'2','type'=>'sys.menu','icon_class'=>'zmdi zmdi-tune','append'=>'1541814298','updated'=>'1544684747']);
        $this->insert('{{%sys_menu}}',['id'=>'10','title'=>'系统工具','describe'=>'','pid'=>'0','url'=>'TOOLS','sort'=>'1','status'=>'1','level'=>'1','type'=>'sys.menu','icon_class'=>'zmdi zmdi-input-composite','append'=>'1542852261','updated'=>'1544684749']);
        $this->insert('{{%sys_menu}}',['id'=>'11','title'=>'数据库管理','describe'=>'','pid'=>'10','url'=>'/sys/data/index','sort'=>'2','status'=>'1','level'=>'2','type'=>'sys.menu','icon_class'=>'zmdi zmdi-layers','append'=>'1542937647','updated'=>'1544684751']);
        $this->insert('{{%sys_menu}}',['id'=>'12','title'=>'系统信息','describe'=>'','pid'=>'10','url'=>'/sys/system/info','sort'=>'3','status'=>'1','level'=>'2','type'=>'sys.menu','icon_class'=>'zmdi zmdi-info','append'=>'1543284900','updated'=>'1544684753']);
        $this->insert('{{%sys_menu}}',['id'=>'13','title'=>'服务器信息','describe'=>'','pid'=>'10','url'=>'/sys/system/server','sort'=>'4','status'=>'1','level'=>'2','type'=>'sys.menu','icon_class'=>'zmdi zmdi-desktop-mac','append'=>'1543627617','updated'=>'1544684754']);
        
        /* 设置外键约束 */
        $this->execute('SET foreign_key_checks = 1;');
    }

    public function down()
    {
        $this->execute('SET foreign_key_checks = 0');
        /* 删除表 */
        $this->dropTable('{{%sys_menu}}');
        $this->execute('SET foreign_key_checks = 1;');
    }
}

