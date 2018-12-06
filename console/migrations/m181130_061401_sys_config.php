<?php

use yii\db\Migration;

class m181130_061401_sys_config extends Migration
{
    public function up()
    {
        /* 取消外键约束 */
        $this->execute('SET foreign_key_checks = 0');
        
        /* 创建表 */
        $this->createTable('{{%sys_config}}', [
            'id' => "int(10) NOT NULL AUTO_INCREMENT COMMENT '主键'",
            'title' => "varchar(50) NOT NULL COMMENT '配置标题'",
            'name' => "varchar(30) NOT NULL COMMENT '配置标识'",
            'type' => "varchar(30) NOT NULL COMMENT '配置类型'",
            'extra' => "varchar(255) NOT NULL COMMENT '配置选项'",
            'describe' => "varchar(1000) NOT NULL COMMENT '配置说明'",
            'value' => "text NOT NULL COMMENT '配置值'",
            'pid' => "int(50) NOT NULL DEFAULT '0' COMMENT '上级id'",
            'sort' => "int(5) unsigned NOT NULL COMMENT '排序'",
            'status' => "tinyint(4) NOT NULL DEFAULT '1' COMMENT '是否隐藏[-1:删除;0:禁用;1:启用]'",
            'level' => "tinyint(4) NOT NULL DEFAULT '1' COMMENT '级别'",
            'append' => "int(10) unsigned NOT NULL COMMENT '添加时间'",
            'updated' => "int(10) unsigned NOT NULL COMMENT '修改时间'",
            'PRIMARY KEY (`id`)'
        ], "ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='系统 - 公共配置表'");
        
        /* 索引设置 */
        
        
        /* 表数据 */
        $this->insert('{{%sys_config}}',['id'=>'1','title'=>'系统设置','name'=>'SYS','type'=>'','extra'=>'','describe'=>'','value'=>'','pid'=>'0','sort'=>'0','status'=>'1','level'=>'1','append'=>'1541414444','updated'=>'1543208882']);
        $this->insert('{{%sys_config}}',['id'=>'2','title'=>'网站设置','name'=>'WEB_SITE','type'=>'','extra'=>'','describe'=>'网站相关设置','value'=>'','pid'=>'1','sort'=>'0','status'=>'1','level'=>'2','append'=>'1541414546','updated'=>'1543371059']);
        $this->insert('{{%sys_config}}',['id'=>'3','title'=>'网站名称','name'=>'WEB_SITE_TITLE','type'=>'text','extra'=>'','describe'=>'（看浏览器标签）','value'=>'OceanicFrame 框架','pid'=>'2','sort'=>'0','status'=>'1','level'=>'3','append'=>'1541414631','updated'=>'1543460510']);
        $this->insert('{{%sys_config}}',['id'=>'4','title'=>'前台站点','name'=>'WEB_SITE_DOMAIN','type'=>'text','extra'=>'','describe'=>'主要用于注册前台域名','value'=>'http://web.oframe.com','pid'=>'2','sort'=>'3','status'=>'1','level'=>'3','append'=>'1541414756','updated'=>'1542333422']);
        $this->insert('{{%sys_config}}',['id'=>'5','title'=>'缓存时间','name'=>'WEB_SITE_CACHE','type'=>'number','extra'=>'','describe'=>'分钟（本地开发一般推荐设置为 0，线上环境建议设置为 10）','value'=>'0','pid'=>'2','sort'=>'5','status'=>'1','level'=>'3','append'=>'1541414982','updated'=>'1543460336']);
        $this->insert('{{%sys_config}}',['id'=>'6','title'=>'最大文件上传','name'=>'WEB_MAX_FILE_SIZE','type'=>'number','extra'=>'','describe'=>'KB（1 M = 1024 KB，0表示不限制）','value'=>'0','pid'=>'2','sort'=>'6','status'=>'1','level'=>'3','append'=>'1541415054','updated'=>'1543460425']);
        $this->insert('{{%sys_config}}',['id'=>'7','title'=>'上传文件类型','name'=>'WEB_FILE_TYPE','type'=>'text','extra'=>'','describe'=>'以半角 | 隔开，如：png|gif|jpg|jpeg|zip|rar','value'=>'png|gif|jpg|jpeg|zip|rar','pid'=>'2','sort'=>'7','status'=>'1','level'=>'3','append'=>'1541415162','updated'=>'1542332995']);
        $this->insert('{{%sys_config}}',['id'=>'8','title'=>'首页标题','name'=>'WEB_SITE_INDEX_TITLE','type'=>'text','extra'=>'','describe'=>'','value'=>'OceanicFrame 框架','pid'=>'2','sort'=>'8','status'=>'-1','level'=>'3','append'=>'1541415238','updated'=>'1542504620']);
        $this->insert('{{%sys_config}}',['id'=>'9','title'=>'META关键字','name'=>'WEB_META_KEY','type'=>'textarea','extra'=>'','describe'=>'多个关键词用半角 , 号分割','value'=>'OceanicFrame,oceanickang,yii,php','pid'=>'2','sort'=>'8','status'=>'1','level'=>'3','append'=>'1541415337','updated'=>'1543502041']);
        $this->insert('{{%sys_config}}',['id'=>'10','title'=>'META描述','name'=>'WEB_META_DESCRIBE','type'=>'textarea','extra'=>'','describe'=>'','value'=>'OceanicFrame 是由 OceanicKang 开发的一款应用开发引擎','pid'=>'2','sort'=>'9','status'=>'1','level'=>'3','append'=>'1541415397','updated'=>'1542504630']);
        $this->insert('{{%sys_config}}',['id'=>'11','title'=>'版权信息','name'=>'WEB_COPY_RIGHT','type'=>'textarea','extra'=>'','describe'=>'','value'=>'&copy 2018 <a href=\"https://www.oceanickang.com\" target=\"_blank\">OceanicKang</a> 版权所有','pid'=>'2','sort'=>'10','status'=>'1','level'=>'3','append'=>'1541415445','updated'=>'1543460103']);
        $this->insert('{{%sys_config}}',['id'=>'12','title'=>'邮件服务','name'=>'SYS_EMAIL','type'=>'','extra'=>'','describe'=>'第三方邮箱接入','value'=>'','pid'=>'1','sort'=>'1','status'=>'1','level'=>'2','append'=>'1541415496','updated'=>'1541415538']);
        $this->insert('{{%sys_config}}',['id'=>'13','title'=>'SMTP服务器','name'=>'SYS_EMAIL_HOST','type'=>'text','extra'=>'','describe'=>'如：smtp.163.com','value'=>'smtp.163.com','pid'=>'12','sort'=>'0','status'=>'1','level'=>'3','append'=>'1541415607','updated'=>'1541415607']);
        $this->insert('{{%sys_config}}',['id'=>'14','title'=>'SMTP端口号','name'=>'SYS_EMAIL_PORT','type'=>'number','extra'=>'','describe'=>'一般为 25 或 465','value'=>'25','pid'=>'12','sort'=>'1','status'=>'1','level'=>'3','append'=>'1541415654','updated'=>'1541415888']);
        $this->insert('{{%sys_config}}',['id'=>'15','title'=>'发件人邮箱','name'=>'SYS_EMAIL_USERNAME','type'=>'text','extra'=>'','describe'=>'','value'=>'13216600972@163.com','pid'=>'12','sort'=>'2','status'=>'1','level'=>'3','append'=>'1541415765','updated'=>'1541415891']);
        $this->insert('{{%sys_config}}',['id'=>'16','title'=>'发件人昵称','name'=>'SYS_EMAIL_NICKNAME','type'=>'text','extra'=>'','describe'=>'','value'=>'OceanicFrame官方','pid'=>'12','sort'=>'3','status'=>'1','level'=>'3','append'=>'1541415792','updated'=>'1541415890']);
        $this->insert('{{%sys_config}}',['id'=>'17','title'=>'邮箱登入密码','name'=>'SYS_EMAIL_PASSWORD','type'=>'password','extra'=>'','describe'=>'','value'=>'','pid'=>'12','sort'=>'4','status'=>'1','level'=>'3','append'=>'1541415829','updated'=>'1541415892']);
        $this->insert('{{%sys_config}}',['id'=>'18','title'=>'LOGO','name'=>'WEB_SITE_LOGO_NAME','type'=>'text','extra'=>'','describe'=>'（看左上角）','value'=>'OceanicFrame','pid'=>'2','sort'=>'1','status'=>'1','level'=>'3','append'=>'1541585285','updated'=>'1543460493']);
        $this->insert('{{%sys_config}}',['id'=>'19','title'=>'缩略名','name'=>'WEB_SITE_AD_NAME','type'=>'text','extra'=>'','describe'=>'（看导航栏）','value'=>'OF','pid'=>'2','sort'=>'2','status'=>'1','level'=>'3','append'=>'1541585352','updated'=>'1543460474']);
        $this->insert('{{%sys_config}}',['id'=>'20','title'=>'SSL 加密','name'=>'SYS_EMAIL_ENCRYPTION','type'=>'statusRadio','extra'=>'','describe'=>'ON：开启，OFF：关闭','value'=>'0','pid'=>'12','sort'=>'5','status'=>'1','level'=>'3','append'=>'1541591696','updated'=>'1543503570']);
        $this->insert('{{%sys_config}}',['id'=>'21','title'=>'单页数据量','name'=>'WEB_PAGE_SIZE','type'=>'number','extra'=>'','describe'=>'条（0为默认，默认每页显示20条）','value'=>'0','pid'=>'2','sort'=>'4','status'=>'1','level'=>'3','append'=>'1542332971','updated'=>'1543460393']);
        $this->insert('{{%sys_config}}',['id'=>'22','title'=>'测试','name'=>'TEST','type'=>'','extra'=>'','describe'=>'','value'=>'','pid'=>'0','sort'=>'0','status'=>'1','level'=>'1','append'=>'1543372236','updated'=>'1543372236']);
        $this->insert('{{%sys_config}}',['id'=>'23','title'=>'测试 1','name'=>'TEST_1','type'=>'','extra'=>'','describe'=>'','value'=>'','pid'=>'22','sort'=>'0','status'=>'1','level'=>'2','append'=>'1543373545','updated'=>'1543373545']);
        $this->insert('{{%sys_config}}',['id'=>'24','title'=>'测试 1-1','name'=>'TEST_1_1','type'=>'text','extra'=>'','describe'=>'','value'=>'111','pid'=>'23','sort'=>'0','status'=>'1','level'=>'3','append'=>'1543504646','updated'=>'1543504646']);
        
        /* 设置外键约束 */
        $this->execute('SET foreign_key_checks = 1;');
    }

    public function down()
    {
        $this->execute('SET foreign_key_checks = 0');
        /* 删除表 */
        $this->dropTable('{{%sys_config}}');
        $this->execute('SET foreign_key_checks = 1;');
    }
}

