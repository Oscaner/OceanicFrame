<?php

use yii\db\Migration;

class m181215_141411_sys_auth_3_assignment extends Migration
{
    public function up()
    {
        /* 取消外键约束 */
        $this->execute('SET foreign_key_checks = 0');
        
        /* 创建表 */
        $this->createTable('{{%sys_auth_3_assignment}}', [
            'item_name' => "varchar(64) NOT NULL",
            'user_id' => "varchar(64) NOT NULL",
            'append' => "int(10) NOT NULL",
            'updated' => "int(11) NOT NULL",
            'PRIMARY KEY (`item_name`,`user_id`)'
        ], "ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='系统 - 角色分配表'");
        
        /* 索引设置 */
        $this->createIndex('auth_assignment_user_id_idx','{{%sys_auth_3_assignment}}','user_id',0);
        
        /* 外键约束设置 */
        $this->addForeignKey('fk_sys_auth_2_item_1908_00','{{%sys_auth_3_assignment}}', 'item_name', '{{%sys_auth_2_item}}', 'name', 'CASCADE', 'CASCADE' );
        
        /* 表数据 */
        $this->insert('{{%sys_auth_3_assignment}}',['item_name'=>'总管理员','user_id'=>'1','append'=>'1542507421','updated'=>'1543146855']);
        $this->insert('{{%sys_auth_3_assignment}}',['item_name'=>'游客','user_id'=>'2','append'=>'1542592889','updated'=>'1543208783']);
        
        /* 设置外键约束 */
        $this->execute('SET foreign_key_checks = 1;');
    }

    public function down()
    {
        $this->execute('SET foreign_key_checks = 0');
        /* 删除表 */
        $this->dropTable('{{%sys_auth_3_assignment}}');
        $this->execute('SET foreign_key_checks = 1;');
    }
}

