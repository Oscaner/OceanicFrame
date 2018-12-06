<?php

use yii\db\Migration;

class m181130_061401_member extends Migration
{
    public function up()
    {
        /* 取消外键约束 */
        $this->execute('SET foreign_key_checks = 0');
        
        /* 创建表 */
        $this->createTable('{{%member}}', [
            'id' => "int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID'",
            'username' => "varchar(255) NOT NULL COMMENT '登录名'",
            'nickname' => "varchar(255) NOT NULL COMMENT '昵称'",
            'auth_key' => "varchar(32) NOT NULL COMMENT '自动登录key'",
            'password_hash' => "varchar(255) NOT NULL COMMENT '加密密码'",
            'password_reset_token' => "varchar(255) NULL COMMENT '重置密码token'",
            'head_img' => "varchar(255) NOT NULL COMMENT '头像'",
            'email' => "varchar(255) NOT NULL COMMENT '邮箱'",
            'mobile_phone' => "varchar(20) NOT NULL COMMENT '手机'",
            'status' => "tinyint(4) NOT NULL DEFAULT '10' COMMENT '状态'",
            'append' => "int(11) NOT NULL COMMENT '创建时间'",
            'updated' => "int(11) NOT NULL COMMENT '更新时间'",
            'PRIMARY KEY (`id`)'
        ], "ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='前台 - 用户信息表'");
        
        /* 索引设置 */
        $this->createIndex('username','{{%member}}','username',1);
        $this->createIndex('email','{{%member}}','email',1);
        $this->createIndex('password_reset_token','{{%member}}','password_reset_token',1);
        
        
        /* 表数据 */
        $this->insert('{{%member}}',['id'=>'1','username'=>'admin','nickname'=>'','auth_key'=>'yWz6JT7i2uT0QWSpr_FPYm24w5d515eN','password_hash'=>'$2y$13$372T8BmoDb8Ac0/H2MOp4.OW19eeq9/nrPfqPxLZwBfo.6ml.1TmC','password_reset_token'=>NULL,'head_img'=>'/resource/common/img/head_img.png','email'=>'2573226076@qq.com','mobile_phone'=>'','status'=>'10','append'=>'1540568423','updated'=>'1542255576']);
        
        /* 设置外键约束 */
        $this->execute('SET foreign_key_checks = 1;');
    }

    public function down()
    {
        $this->execute('SET foreign_key_checks = 0');
        /* 删除表 */
        $this->dropTable('{{%member}}');
        $this->execute('SET foreign_key_checks = 1;');
    }
}

