<?php

use yii\db\Migration;

class m181130_061401_sys_auth_1_rule extends Migration
{
    public function up()
    {
        /* 取消外键约束 */
        $this->execute('SET foreign_key_checks = 0');
        
        /* 创建表 */
        $this->createTable('{{%sys_auth_1_rule}}', [
            'name' => "varchar(64) NOT NULL",
            'data' => "blob NOT NULL",
            'append' => "int(10) NOT NULL",
            'updated' => "int(10) NOT NULL",
            'PRIMARY KEY (`name`)'
        ], "ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='系统 - 权限规则表'");
        
        /* 索引设置 */
        
        
        /* 表数据 */
        
        /* 设置外键约束 */
        $this->execute('SET foreign_key_checks = 1;');
    }

    public function down()
    {
        $this->execute('SET foreign_key_checks = 0');
        /* 删除表 */
        $this->dropTable('{{%sys_auth_1_rule}}');
        $this->execute('SET foreign_key_checks = 1;');
    }
}

