<?php

use yii\db\Migration;

class m181130_061401_sys_auth_4_item_child extends Migration
{
    public function up()
    {
        /* 取消外键约束 */
        $this->execute('SET foreign_key_checks = 0');
        
        /* 创建表 */
        $this->createTable('{{%sys_auth_4_item_child}}', [
            'parent' => "varchar(64) NOT NULL",
            'child' => "varchar(64) NOT NULL",
            'PRIMARY KEY (`parent`,`child`)'
        ], "ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='系统 - 角色权限表'");
        
        /* 索引设置 */
        $this->createIndex('child','{{%sys_auth_4_item_child}}','child',0);
        
        /* 外键约束设置 */
        $this->addForeignKey('fk_sys_auth_2_item_3828_00','{{%sys_auth_4_item_child}}', 'child', '{{%sys_auth_2_item}}', 'name', 'CASCADE', 'CASCADE' );
        $this->addForeignKey('fk_sys_auth_2_item_3828_01','{{%sys_auth_4_item_child}}', 'parent', '{{%sys_auth_2_item}}', 'name', 'CASCADE', 'CASCADE' );
        
        /* 表数据 */
        $this->insert('{{%sys_auth_4_item_child}}',['parent'=>'总管理员','child'=>'/sys/config/ajax-update']);
        $this->insert('{{%sys_auth_4_item_child}}',['parent'=>'总管理员','child'=>'/sys/config/delete']);
        $this->insert('{{%sys_auth_4_item_child}}',['parent'=>'总管理员','child'=>'/sys/config/edit']);
        $this->insert('{{%sys_auth_4_item_child}}',['parent'=>'总管理员','child'=>'/sys/config/index']);
        $this->insert('{{%sys_auth_4_item_child}}',['parent'=>'游客','child'=>'/sys/config/index']);
        $this->insert('{{%sys_auth_4_item_child}}',['parent'=>'总管理员','child'=>'/sys/config/recycle']);
        $this->insert('{{%sys_auth_4_item_child}}',['parent'=>'总管理员','child'=>'/sys/config/restore']);
        $this->insert('{{%sys_auth_4_item_child}}',['parent'=>'总管理员','child'=>'/sys/config/status-del']);
        $this->insert('{{%sys_auth_4_item_child}}',['parent'=>'总管理员','child'=>'/sys/data/backup']);
        $this->insert('{{%sys_auth_4_item_child}}',['parent'=>'总管理员','child'=>'/sys/data/backup-files']);
        $this->insert('{{%sys_auth_4_item_child}}',['parent'=>'游客','child'=>'/sys/data/backup-files']);
        $this->insert('{{%sys_auth_4_item_child}}',['parent'=>'总管理员','child'=>'/sys/data/delete']);
        $this->insert('{{%sys_auth_4_item_child}}',['parent'=>'总管理员','child'=>'/sys/data/download']);
        $this->insert('{{%sys_auth_4_item_child}}',['parent'=>'总管理员','child'=>'/sys/data/index']);
        $this->insert('{{%sys_auth_4_item_child}}',['parent'=>'游客','child'=>'/sys/data/index']);
        $this->insert('{{%sys_auth_4_item_child}}',['parent'=>'总管理员','child'=>'/sys/data/optimize']);
        $this->insert('{{%sys_auth_4_item_child}}',['parent'=>'总管理员','child'=>'/sys/data/recover']);
        $this->insert('{{%sys_auth_4_item_child}}',['parent'=>'总管理员','child'=>'/sys/data/repair']);
        $this->insert('{{%sys_auth_4_item_child}}',['parent'=>'总管理员','child'=>'/sys/menu/ajax-update']);
        $this->insert('{{%sys_auth_4_item_child}}',['parent'=>'总管理员','child'=>'/sys/menu/delete']);
        $this->insert('{{%sys_auth_4_item_child}}',['parent'=>'总管理员','child'=>'/sys/menu/edit']);
        $this->insert('{{%sys_auth_4_item_child}}',['parent'=>'总管理员','child'=>'/sys/menu/recycle']);
        $this->insert('{{%sys_auth_4_item_child}}',['parent'=>'总管理员','child'=>'/sys/menu/restore']);
        $this->insert('{{%sys_auth_4_item_child}}',['parent'=>'总管理员','child'=>'/sys/menu/side-menu']);
        $this->insert('{{%sys_auth_4_item_child}}',['parent'=>'游客','child'=>'/sys/menu/side-menu']);
        $this->insert('{{%sys_auth_4_item_child}}',['parent'=>'总管理员','child'=>'/sys/menu/status-del']);
        $this->insert('{{%sys_auth_4_item_child}}',['parent'=>'总管理员','child'=>'/sys/menu/sys-menu']);
        $this->insert('{{%sys_auth_4_item_child}}',['parent'=>'游客','child'=>'/sys/menu/sys-menu']);
        $this->insert('{{%sys_auth_4_item_child}}',['parent'=>'总管理员','child'=>'/sys/rbac/accredit']);
        $this->insert('{{%sys_auth_4_item_child}}',['parent'=>'游客','child'=>'/sys/rbac/accredit']);
        $this->insert('{{%sys_auth_4_item_child}}',['parent'=>'总管理员','child'=>'/sys/rbac/accredit-assign']);
        $this->insert('{{%sys_auth_4_item_child}}',['parent'=>'总管理员','child'=>'/sys/rbac/accredit-del']);
        $this->insert('{{%sys_auth_4_item_child}}',['parent'=>'总管理员','child'=>'/sys/rbac/accredit-edit']);
        $this->insert('{{%sys_auth_4_item_child}}',['parent'=>'总管理员','child'=>'/sys/rbac/ajax-update']);
        $this->insert('{{%sys_auth_4_item_child}}',['parent'=>'总管理员','child'=>'/sys/rbac/role']);
        $this->insert('{{%sys_auth_4_item_child}}',['parent'=>'游客','child'=>'/sys/rbac/role']);
        $this->insert('{{%sys_auth_4_item_child}}',['parent'=>'总管理员','child'=>'/sys/rbac/role-del']);
        $this->insert('{{%sys_auth_4_item_child}}',['parent'=>'总管理员','child'=>'/sys/rbac/role-edit']);
        $this->insert('{{%sys_auth_4_item_child}}',['parent'=>'总管理员','child'=>'/sys/rbac/rule']);
        $this->insert('{{%sys_auth_4_item_child}}',['parent'=>'游客','child'=>'/sys/rbac/rule']);
        $this->insert('{{%sys_auth_4_item_child}}',['parent'=>'总管理员','child'=>'/sys/setting/config']);
        $this->insert('{{%sys_auth_4_item_child}}',['parent'=>'游客','child'=>'/sys/setting/config']);
        $this->insert('{{%sys_auth_4_item_child}}',['parent'=>'总管理员','child'=>'/sys/setting/send-email']);
        $this->insert('{{%sys_auth_4_item_child}}',['parent'=>'总管理员','child'=>'/sys/setting/update']);
        
        /* 设置外键约束 */
        $this->execute('SET foreign_key_checks = 1;');
    }

    public function down()
    {
        $this->execute('SET foreign_key_checks = 0');
        /* 删除表 */
        $this->dropTable('{{%sys_auth_4_item_child}}');
        $this->execute('SET foreign_key_checks = 1;');
    }
}

