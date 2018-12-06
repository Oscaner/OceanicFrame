<?php

use yii\db\Migration;

class m181130_061401_sys_auth_2_item extends Migration
{
    public function up()
    {
        /* 取消外键约束 */
        $this->execute('SET foreign_key_checks = 0');
        
        /* 创建表 */
        $this->createTable('{{%sys_auth_2_item}}', [
            'name' => "varchar(64) NOT NULL",
            'type' => "smallint(6) NOT NULL",
            'description' => "text NOT NULL",
            'rule_name' => "varchar(64) NULL",
            'data' => "blob NULL",
            'id' => "int(11) NOT NULL COMMENT 'id'",
            'pid' => "int(11) NOT NULL DEFAULT '0' COMMENT '父id'",
            'level' => "tinyint(4) NOT NULL DEFAULT '1' COMMENT '级别'",
            'sort' => "int(5) NOT NULL DEFAULT '0' COMMENT '排序'",
            'append' => "int(10) NOT NULL",
            'updated' => "int(10) NOT NULL",
            'PRIMARY KEY (`name`)'
        ], "ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='系统 - 角色路由表'");
        
        /* 索引设置 */
        $this->createIndex('rule_name','{{%sys_auth_2_item}}','rule_name',0);
        $this->createIndex('type','{{%sys_auth_2_item}}','type',0);
        
        /* 外键约束设置 */
        $this->addForeignKey('fk_sys_auth_1_rule_2974_00','{{%sys_auth_2_item}}', 'rule_name', '{{%sys_auth_1_rule}}', 'name', 'CASCADE', 'CASCADE' );
        
        /* 表数据 */
        $this->insert('{{%sys_auth_2_item}}',['name'=>'/','type'=>'2','description'=>'暂未配置权限','rule_name'=>NULL,'data'=>NULL,'id'=>'43','pid'=>'42','level'=>'3','sort'=>'0','append'=>'1543208278','updated'=>'1543208278']);
        $this->insert('{{%sys_auth_2_item}}',['name'=>'/sys/config/ajax-update','type'=>'2','description'=>'开启|关闭|排序','rule_name'=>NULL,'data'=>NULL,'id'=>'33','pid'=>'5','level'=>'3','sort'=>'2','append'=>'1542248056','updated'=>'1542248066']);
        $this->insert('{{%sys_auth_2_item}}',['name'=>'/sys/config/delete','type'=>'2','description'=>'彻底删除','rule_name'=>NULL,'data'=>NULL,'id'=>'18','pid'=>'5','level'=>'3','sort'=>'6','append'=>'1541987367','updated'=>'1542248070']);
        $this->insert('{{%sys_auth_2_item}}',['name'=>'/sys/config/edit','type'=>'2','description'=>'编辑|新增','rule_name'=>NULL,'data'=>NULL,'id'=>'14','pid'=>'5','level'=>'3','sort'=>'1','append'=>'1541987179','updated'=>'1541987383']);
        $this->insert('{{%sys_auth_2_item}}',['name'=>'/sys/config/index','type'=>'2','description'=>'配置列表','rule_name'=>NULL,'data'=>NULL,'id'=>'13','pid'=>'5','level'=>'3','sort'=>'0','append'=>'1541987140','updated'=>'1542696176']);
        $this->insert('{{%sys_auth_2_item}}',['name'=>'/sys/config/recycle','type'=>'2','description'=>'回收站','rule_name'=>NULL,'data'=>NULL,'id'=>'16','pid'=>'5','level'=>'3','sort'=>'3','append'=>'1541987238','updated'=>'1542248068']);
        $this->insert('{{%sys_auth_2_item}}',['name'=>'/sys/config/restore','type'=>'2','description'=>'回收站还原','rule_name'=>NULL,'data'=>NULL,'id'=>'17','pid'=>'5','level'=>'3','sort'=>'4','append'=>'1541987262','updated'=>'1542248069']);
        $this->insert('{{%sys_auth_2_item}}',['name'=>'/sys/config/status-del','type'=>'2','description'=>'状态删除','rule_name'=>NULL,'data'=>NULL,'id'=>'15','pid'=>'5','level'=>'3','sort'=>'5','append'=>'1541987209','updated'=>'1542248069']);
        $this->insert('{{%sys_auth_2_item}}',['name'=>'/sys/data/backup','type'=>'2','description'=>'备份数据库','rule_name'=>NULL,'data'=>NULL,'id'=>'50','pid'=>'45','level'=>'3','sort'=>'4','append'=>'1543208518','updated'=>'1543208657']);
        $this->insert('{{%sys_auth_2_item}}',['name'=>'/sys/data/backup-files','type'=>'2','description'=>'备份文件列表','rule_name'=>NULL,'data'=>NULL,'id'=>'47','pid'=>'45','level'=>'3','sort'=>'1','append'=>'1543208419','updated'=>'1543209185']);
        $this->insert('{{%sys_auth_2_item}}',['name'=>'/sys/data/delete','type'=>'2','description'=>'删除备份文件','rule_name'=>NULL,'data'=>NULL,'id'=>'51','pid'=>'45','level'=>'3','sort'=>'7','append'=>'1543208569','updated'=>'1543208663']);
        $this->insert('{{%sys_auth_2_item}}',['name'=>'/sys/data/download','type'=>'2','description'=>'下载备份文件','rule_name'=>NULL,'data'=>NULL,'id'=>'53','pid'=>'45','level'=>'3','sort'=>'6','append'=>'1543208620','updated'=>'1543208660']);
        $this->insert('{{%sys_auth_2_item}}',['name'=>'/sys/data/index','type'=>'2','description'=>'数据列表','rule_name'=>NULL,'data'=>NULL,'id'=>'46','pid'=>'45','level'=>'3','sort'=>'0','append'=>'1543208390','updated'=>'1543208390']);
        $this->insert('{{%sys_auth_2_item}}',['name'=>'/sys/data/optimize','type'=>'2','description'=>'优化数据表','rule_name'=>NULL,'data'=>NULL,'id'=>'48','pid'=>'45','level'=>'3','sort'=>'2','append'=>'1543208470','updated'=>'1543209186']);
        $this->insert('{{%sys_auth_2_item}}',['name'=>'/sys/data/recover','type'=>'2','description'=>'还原数据库','rule_name'=>NULL,'data'=>NULL,'id'=>'52','pid'=>'45','level'=>'3','sort'=>'5','append'=>'1543208595','updated'=>'1543208659']);
        $this->insert('{{%sys_auth_2_item}}',['name'=>'/sys/data/repair','type'=>'2','description'=>'修复数据表','rule_name'=>NULL,'data'=>NULL,'id'=>'49','pid'=>'45','level'=>'3','sort'=>'3','append'=>'1543208493','updated'=>'1543209187']);
        $this->insert('{{%sys_auth_2_item}}',['name'=>'/sys/menu/ajax-update','type'=>'2','description'=>'开启|关闭|排序','rule_name'=>NULL,'data'=>NULL,'id'=>'32','pid'=>'3','level'=>'3','sort'=>'3','append'=>'1542247955','updated'=>'1542248009']);
        $this->insert('{{%sys_auth_2_item}}',['name'=>'/sys/menu/delete','type'=>'2','description'=>'彻底删除','rule_name'=>NULL,'data'=>NULL,'id'=>'12','pid'=>'3','level'=>'3','sort'=>'7','append'=>'1541985769','updated'=>'1542247986']);
        $this->insert('{{%sys_auth_2_item}}',['name'=>'/sys/menu/edit','type'=>'2','description'=>'编辑|新增','rule_name'=>NULL,'data'=>NULL,'id'=>'8','pid'=>'3','level'=>'3','sort'=>'2','append'=>'1541985634','updated'=>'1541985778']);
        $this->insert('{{%sys_auth_2_item}}',['name'=>'/sys/menu/recycle','type'=>'2','description'=>'回收站','rule_name'=>NULL,'data'=>NULL,'id'=>'10','pid'=>'3','level'=>'3','sort'=>'4','append'=>'1541985712','updated'=>'1542247983']);
        $this->insert('{{%sys_auth_2_item}}',['name'=>'/sys/menu/restore','type'=>'2','description'=>'回收站还原','rule_name'=>NULL,'data'=>NULL,'id'=>'11','pid'=>'3','level'=>'3','sort'=>'5','append'=>'1541985748','updated'=>'1542247984']);
        $this->insert('{{%sys_auth_2_item}}',['name'=>'/sys/menu/side-menu','type'=>'2','description'=>'侧边菜单列表','rule_name'=>NULL,'data'=>NULL,'id'=>'6','pid'=>'3','level'=>'3','sort'=>'0','append'=>'1541985529','updated'=>'1542696189']);
        $this->insert('{{%sys_auth_2_item}}',['name'=>'/sys/menu/status-del','type'=>'2','description'=>'状态删除','rule_name'=>NULL,'data'=>NULL,'id'=>'9','pid'=>'3','level'=>'3','sort'=>'6','append'=>'1541985690','updated'=>'1542247985']);
        $this->insert('{{%sys_auth_2_item}}',['name'=>'/sys/menu/sys-menu','type'=>'2','description'=>'系统菜单列表','rule_name'=>NULL,'data'=>NULL,'id'=>'7','pid'=>'3','level'=>'3','sort'=>'1','append'=>'1541985604','updated'=>'1542696199']);
        $this->insert('{{%sys_auth_2_item}}',['name'=>'/sys/rbac/accredit','type'=>'2','description'=>'权限列表','rule_name'=>NULL,'data'=>NULL,'id'=>'23','pid'=>'20','level'=>'3','sort'=>'0','append'=>'1542119431','updated'=>'1542119431']);
        $this->insert('{{%sys_auth_2_item}}',['name'=>'/sys/rbac/accredit-assign','type'=>'2','description'=>'分配权限','rule_name'=>NULL,'data'=>NULL,'id'=>'29','pid'=>'20','level'=>'3','sort'=>'4','append'=>'1542119971','updated'=>'1542248136']);
        $this->insert('{{%sys_auth_2_item}}',['name'=>'/sys/rbac/accredit-del','type'=>'2','description'=>'删除权限','rule_name'=>NULL,'data'=>NULL,'id'=>'25','pid'=>'20','level'=>'3','sort'=>'3','append'=>'1542119631','updated'=>'1542248135']);
        $this->insert('{{%sys_auth_2_item}}',['name'=>'/sys/rbac/accredit-edit','type'=>'2','description'=>'编辑|新增','rule_name'=>NULL,'data'=>NULL,'id'=>'24','pid'=>'20','level'=>'3','sort'=>'1','append'=>'1542119497','updated'=>'1542119649']);
        $this->insert('{{%sys_auth_2_item}}',['name'=>'/sys/rbac/ajax-update','type'=>'2','description'=>'开启|关闭|排序','rule_name'=>NULL,'data'=>NULL,'id'=>'41','pid'=>'1','level'=>'2','sort'=>'3','append'=>'1542682241','updated'=>'1542682285']);
        $this->insert('{{%sys_auth_2_item}}',['name'=>'/sys/rbac/role','type'=>'2','description'=>'角色列表','rule_name'=>NULL,'data'=>NULL,'id'=>'26','pid'=>'21','level'=>'3','sort'=>'0','append'=>'1542119670','updated'=>'1542119670']);
        $this->insert('{{%sys_auth_2_item}}',['name'=>'/sys/rbac/role-del','type'=>'2','description'=>'删除角色','rule_name'=>NULL,'data'=>NULL,'id'=>'28','pid'=>'21','level'=>'3','sort'=>'2','append'=>'1542119836','updated'=>'1542119982']);
        $this->insert('{{%sys_auth_2_item}}',['name'=>'/sys/rbac/role-edit','type'=>'2','description'=>'编辑|新增','rule_name'=>NULL,'data'=>NULL,'id'=>'27','pid'=>'21','level'=>'3','sort'=>'1','append'=>'1542119808','updated'=>'1542119981']);
        $this->insert('{{%sys_auth_2_item}}',['name'=>'/sys/rbac/rule','type'=>'2','description'=>'规则列表','rule_name'=>NULL,'data'=>NULL,'id'=>'30','pid'=>'22','level'=>'3','sort'=>'0','append'=>'1542120014','updated'=>'1542120014']);
        $this->insert('{{%sys_auth_2_item}}',['name'=>'/sys/setting/config','type'=>'2','description'=>'网站配置信息','rule_name'=>NULL,'data'=>NULL,'id'=>'54','pid'=>'36','level'=>'2','sort'=>'0','append'=>'1543504222','updated'=>'1543504460']);
        $this->insert('{{%sys_auth_2_item}}',['name'=>'/sys/setting/send-email','type'=>'2','description'=>'发送测试邮件','rule_name'=>NULL,'data'=>NULL,'id'=>'40','pid'=>'36','level'=>'2','sort'=>'2','append'=>'1542594001','updated'=>'1543504514']);
        $this->insert('{{%sys_auth_2_item}}',['name'=>'/sys/setting/update','type'=>'2','description'=>'更新配置','rule_name'=>NULL,'data'=>NULL,'id'=>'39','pid'=>'36','level'=>'2','sort'=>'1','append'=>'1542593944','updated'=>'1543504513']);
        $this->insert('{{%sys_auth_2_item}}',['name'=>'menu-setting','type'=>'2','description'=>'菜单 -- 网站设置','rule_name'=>NULL,'data'=>NULL,'id'=>'36','pid'=>'0','level'=>'1','sort'=>'0','append'=>'1542593114','updated'=>'1543504476']);
        $this->insert('{{%sys_auth_2_item}}',['name'=>'sys-extend','type'=>'2','description'=>'系统 -- 扩展','rule_name'=>NULL,'data'=>NULL,'id'=>'2','pid'=>'0','level'=>'1','sort'=>'1','append'=>'1541984345','updated'=>'1542593135']);
        $this->insert('{{%sys_auth_2_item}}',['name'=>'sys-extend-config','type'=>'2','description'=>'配置管理','rule_name'=>NULL,'data'=>NULL,'id'=>'5','pid'=>'2','level'=>'2','sort'=>'1','append'=>'1541985424','updated'=>'1542696148']);
        $this->insert('{{%sys_auth_2_item}}',['name'=>'sys-extend-menu','type'=>'2','description'=>'菜单管理','rule_name'=>NULL,'data'=>NULL,'id'=>'3','pid'=>'2','level'=>'2','sort'=>'0','append'=>'1541985010','updated'=>'1542696129']);
        $this->insert('{{%sys_auth_2_item}}',['name'=>'sys-rbac','type'=>'2','description'=>'系统 -- 用户权限','rule_name'=>NULL,'data'=>NULL,'id'=>'1','pid'=>'0','level'=>'1','sort'=>'2','append'=>'1541902533','updated'=>'1542593136']);
        $this->insert('{{%sys_auth_2_item}}',['name'=>'sys-rbac-accredit','type'=>'2','description'=>'权限管理','rule_name'=>NULL,'data'=>NULL,'id'=>'20','pid'=>'1','level'=>'2','sort'=>'2','append'=>'1542119326','updated'=>'1543207929']);
        $this->insert('{{%sys_auth_2_item}}',['name'=>'sys-rbac-manager','type'=>'2','description'=>'后台用户','rule_name'=>NULL,'data'=>NULL,'id'=>'42','pid'=>'1','level'=>'2','sort'=>'0','append'=>'1543207907','updated'=>'1543207907']);
        $this->insert('{{%sys_auth_2_item}}',['name'=>'sys-rbac-role','type'=>'2','description'=>'角色管理','rule_name'=>NULL,'data'=>NULL,'id'=>'21','pid'=>'1','level'=>'2','sort'=>'1','append'=>'1542119349','updated'=>'1543207928']);
        $this->insert('{{%sys_auth_2_item}}',['name'=>'sys-rbac-rule','type'=>'2','description'=>'规则管理','rule_name'=>NULL,'data'=>NULL,'id'=>'22','pid'=>'1','level'=>'2','sort'=>'3','append'=>'1542119381','updated'=>'1543207932']);
        $this->insert('{{%sys_auth_2_item}}',['name'=>'sys-tools','type'=>'2','description'=>'系统 -- 系统工具','rule_name'=>NULL,'data'=>NULL,'id'=>'44','pid'=>'0','level'=>'1','sort'=>'3','append'=>'1543208331','updated'=>'1543208706']);
        $this->insert('{{%sys_auth_2_item}}',['name'=>'sys-tools-database','type'=>'2','description'=>'数据库管理','rule_name'=>NULL,'data'=>NULL,'id'=>'45','pid'=>'44','level'=>'2','sort'=>'0','append'=>'1543208366','updated'=>'1543208366']);
        $this->insert('{{%sys_auth_2_item}}',['name'=>'总管理员','type'=>'1','description'=>'拥有所有权限','rule_name'=>NULL,'data'=>NULL,'id'=>'19','pid'=>'0','level'=>'1','sort'=>'0','append'=>'1542086514','updated'=>'1542086514']);
        $this->insert('{{%sys_auth_2_item}}',['name'=>'游客','type'=>'1','description'=>'仅拥有每个页面的查看权限','rule_name'=>NULL,'data'=>NULL,'id'=>'35','pid'=>'0','level'=>'1','sort'=>'0','append'=>'1542505021','updated'=>'1543208938']);
        
        /* 设置外键约束 */
        $this->execute('SET foreign_key_checks = 1;');
    }

    public function down()
    {
        $this->execute('SET foreign_key_checks = 0');
        /* 删除表 */
        $this->dropTable('{{%sys_auth_2_item}}');
        $this->execute('SET foreign_key_checks = 1;');
    }
}

