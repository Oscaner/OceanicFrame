<?php

use yii\db\Migration;

class m181130_061401_sys_manager extends Migration
{
    public function up()
    {
        /* 取消外键约束 */
        $this->execute('SET foreign_key_checks = 0');
        
        /* 创建表 */
        $this->createTable('{{%sys_manager}}', [
            'id' => "int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID'",
            'role_id' => "int(11) NOT NULL COMMENT '角色id'",
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
        ], "ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='系统 - 管理员信息表'");
        
        /* 索引设置 */
        $this->createIndex('username','{{%sys_manager}}','username',1);
        $this->createIndex('email','{{%sys_manager}}','email',1);
        $this->createIndex('password_reset_token','{{%sys_manager}}','password_reset_token',1);
        
        
        /* 表数据 */
        $this->insert('{{%sys_manager}}',['id'=>'1','role_id'=>'19','username'=>'admin','nickname'=>'','auth_key'=>'yWz6JT7i2uT0QWSpr_FPYm24w5d515eN','password_hash'=>'$2y$13$8SrE9/KBrghyTJ2rKxilnu77q0IMgZpWWDkz1CiWYy.XrDugceKUq','password_reset_token'=>'efvFAziOm3A4bUWZzEf1SNjc4My6H-uC_1542694588','head_img'=>'/resource/common/img/head_img.png','email'=>'oceanickang@qq.com','mobile_phone'=>'','status'=>'10','append'=>'1540568423','updated'=>'1543146855']);
        $this->insert('{{%sys_manager}}',['id'=>'2','role_id'=>'35','username'=>'demo','nickname'=>'','auth_key'=>'','password_hash'=>'$2y$13$bY6MA9Ih9fCLiSGSyy5uyuRau.hnC9GHqk4zRgTojQKjfwXCoZwMi','password_reset_token'=>NULL,'head_img'=>'/resource/common/img/head_img.png','email'=>'','mobile_phone'=>'','status'=>'10','append'=>'1542509956','updated'=>'1543208783']);
        
        /* 设置外键约束 */
        $this->execute('SET foreign_key_checks = 1;');
    }

    public function down()
    {
        $this->execute('SET foreign_key_checks = 0');
        /* 删除表 */
        $this->dropTable('{{%sys_manager}}');
        $this->execute('SET foreign_key_checks = 1;');
    }
}

