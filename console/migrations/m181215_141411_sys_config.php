<?php

use yii\db\Migration;

class m181215_141411_sys_config extends Migration
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
        $this->insert('{{%sys_config}}',['id'=>'3','title'=>'网站名称','name'=>'WEB_SITE_TITLE','type'=>'text','extra'=>'','describe'=>'（看浏览器标签）','value'=>'OceanicFrame 框架','pid'=>'2','sort'=>'1','status'=>'1','level'=>'3','append'=>'1541414631','updated'=>'1544684642']);
        $this->insert('{{%sys_config}}',['id'=>'4','title'=>'前台站点','name'=>'WEB_SITE_DOMAIN','type'=>'text','extra'=>'','describe'=>'主要用于注册前台域名','value'=>'http://web.oframe.com','pid'=>'2','sort'=>'4','status'=>'1','level'=>'3','append'=>'1541414756','updated'=>'1544684646']);
        $this->insert('{{%sys_config}}',['id'=>'5','title'=>'缓存时间','name'=>'WEB_SITE_CACHE','type'=>'number','extra'=>'','describe'=>'分钟（本地开发一般推荐设置为 0，线上环境建议设置为 10）','value'=>'0','pid'=>'2','sort'=>'6','status'=>'1','level'=>'3','append'=>'1541414982','updated'=>'1544684650']);
        $this->insert('{{%sys_config}}',['id'=>'7','title'=>'上传文件类型','name'=>'WEB_FILE_TYPE','type'=>'text','extra'=>'','describe'=>'以半角 | 隔开，如：png|gif|jpg|jpeg|zip|rar','value'=>'png|gif|jpg|jpeg|zip|rar','pid'=>'2','sort'=>'7','status'=>'1','level'=>'3','append'=>'1541415162','updated'=>'1544684649']);
        $this->insert('{{%sys_config}}',['id'=>'9','title'=>'META关键字','name'=>'WEB_META_KEY','type'=>'textarea','extra'=>'','describe'=>'多个关键词用半角 , 号分割','value'=>'OceanicFrame,oceanickang,yii,php','pid'=>'2','sort'=>'8','status'=>'1','level'=>'3','append'=>'1541415337','updated'=>'1544684651']);
        $this->insert('{{%sys_config}}',['id'=>'10','title'=>'META描述','name'=>'WEB_META_DESCRIBE','type'=>'textarea','extra'=>'','describe'=>'','value'=>'OceanicFrame 是由 OceanicKang 开发的一款应用开发引擎','pid'=>'2','sort'=>'9','status'=>'1','level'=>'3','append'=>'1541415397','updated'=>'1544684653']);
        $this->insert('{{%sys_config}}',['id'=>'11','title'=>'版权信息','name'=>'WEB_COPY_RIGHT','type'=>'textarea','extra'=>'','describe'=>'','value'=>'&copy 2018 <a href=\"https://www.oceanickang.com\" target=\"_blank\">OceanicKang</a> 版权所有','pid'=>'2','sort'=>'10','status'=>'1','level'=>'3','append'=>'1541415445','updated'=>'1544684654']);
        $this->insert('{{%sys_config}}',['id'=>'12','title'=>'邮件服务','name'=>'SYS_EMAIL','type'=>'','extra'=>'','describe'=>'第三方邮箱接入','value'=>'','pid'=>'1','sort'=>'1','status'=>'1','level'=>'2','append'=>'1541415496','updated'=>'1541415538']);
        $this->insert('{{%sys_config}}',['id'=>'13','title'=>'SMTP服务器','name'=>'SYS_EMAIL_HOST','type'=>'text','extra'=>'','describe'=>'如：smtp.163.com','value'=>'smtp.163.com','pid'=>'12','sort'=>'2','status'=>'1','level'=>'3','append'=>'1541415607','updated'=>'1544684669']);
        $this->insert('{{%sys_config}}',['id'=>'14','title'=>'SMTP端口号','name'=>'SYS_EMAIL_PORT','type'=>'number','extra'=>'','describe'=>'一般为 25 或 465','value'=>'25','pid'=>'12','sort'=>'3','status'=>'1','level'=>'3','append'=>'1541415654','updated'=>'1544684671']);
        $this->insert('{{%sys_config}}',['id'=>'15','title'=>'发件人邮箱','name'=>'SYS_EMAIL_USERNAME','type'=>'text','extra'=>'','describe'=>'','value'=>'13216600972@163.com','pid'=>'12','sort'=>'4','status'=>'1','level'=>'3','append'=>'1541415765','updated'=>'1544684673']);
        $this->insert('{{%sys_config}}',['id'=>'16','title'=>'发件人昵称','name'=>'SYS_EMAIL_NICKNAME','type'=>'text','extra'=>'','describe'=>'','value'=>'OceanicFrame官方','pid'=>'12','sort'=>'5','status'=>'1','level'=>'3','append'=>'1541415792','updated'=>'1544684674']);
        $this->insert('{{%sys_config}}',['id'=>'17','title'=>'邮箱登入密码','name'=>'SYS_EMAIL_PASSWORD','type'=>'password','extra'=>'','describe'=>'','value'=>'','pid'=>'12','sort'=>'6','status'=>'1','level'=>'3','append'=>'1541415829','updated'=>'1544684675']);
        $this->insert('{{%sys_config}}',['id'=>'18','title'=>'LOGO','name'=>'WEB_SITE_LOGO_NAME','type'=>'text','extra'=>'','describe'=>'（看左上角）','value'=>'OceanicFrame','pid'=>'2','sort'=>'2','status'=>'1','level'=>'3','append'=>'1541585285','updated'=>'1544684643']);
        $this->insert('{{%sys_config}}',['id'=>'19','title'=>'缩略名','name'=>'WEB_SITE_AD_NAME','type'=>'text','extra'=>'','describe'=>'（看导航栏）','value'=>'OF','pid'=>'2','sort'=>'3','status'=>'1','level'=>'3','append'=>'1541585352','updated'=>'1544684645']);
        $this->insert('{{%sys_config}}',['id'=>'20','title'=>'SSL 加密','name'=>'SYS_EMAIL_ENCRYPTION','type'=>'statusRadio','extra'=>'','describe'=>'ON：开启，OFF：关闭','value'=>'0','pid'=>'12','sort'=>'7','status'=>'1','level'=>'3','append'=>'1541591696','updated'=>'1544684677']);
        $this->insert('{{%sys_config}}',['id'=>'21','title'=>'单页数据量','name'=>'WEB_PAGE_SIZE','type'=>'number','extra'=>'','describe'=>'条（0为默认，默认每页显示20条）','value'=>'0','pid'=>'2','sort'=>'5','status'=>'1','level'=>'3','append'=>'1542332971','updated'=>'1544684648']);
        $this->insert('{{%sys_config}}',['id'=>'22','title'=>'上传设置','name'=>'UPLOAD','type'=>'','extra'=>'','describe'=>'','value'=>'','pid'=>'0','sort'=>'0','status'=>'1','level'=>'1','append'=>'1543372236','updated'=>'1544680655']);
        $this->insert('{{%sys_config}}',['id'=>'23','title'=>'图片上传','name'=>'UPLOAD_IMAGES','type'=>'','extra'=>'','describe'=>'','value'=>'','pid'=>'22','sort'=>'0','status'=>'1','level'=>'2','append'=>'1543373545','updated'=>'1544680756']);
        $this->insert('{{%sys_config}}',['id'=>'24','title'=>'最大上传','name'=>'UPLOAD_IMAGES_MAX_SIZE','type'=>'number','extra'=>'','describe'=>'M（提示： 0 为不限制）','value'=>'2','pid'=>'23','sort'=>'4','status'=>'1','level'=>'3','append'=>'1543504646','updated'=>'1544684577']);
        $this->insert('{{%sys_config}}',['id'=>'25','title'=>'默认头像','name'=>'WEB_DEFAULT_AVATAR','type'=>'image','extra'=>'','describe'=>'','value'=>'/resources/common/img/head_img.png','pid'=>'2','sort'=>'11','status'=>'1','level'=>'3','append'=>'1544407971','updated'=>'1544684656']);
        $this->insert('{{%sys_config}}',['id'=>'26','title'=>'保留原名','name'=>'UPLOAD_IMAGES_ORIGIN_NAME','type'=>'statusRadio','extra'=>'','describe'=>'是否保留上传图片原名','value'=>'0','pid'=>'23','sort'=>'1','status'=>'1','level'=>'3','append'=>'1544681814','updated'=>'1544684528']);
        $this->insert('{{%sys_config}}',['id'=>'27','title'=>'上传方法','name'=>'UPLOAD_IMAGES_ACTION','type'=>'radioList','extra'=>'local=>本地上传,qiniu=>七牛上传,oss=>阿里OSS上传','describe'=>'注意：除了本地上传，其他均需要进行第三方接口设置','value'=>'local','pid'=>'23','sort'=>'3','status'=>'1','level'=>'3','append'=>'1544683129','updated'=>'1544684567']);
        $this->insert('{{%sys_config}}',['id'=>'28','title'=>'完整图片路径','name'=>'UPLOAD_IMAGES_FULL_PATH','type'=>'statusRadio','extra'=>'','describe'=>'是否开启返回完整的图片路径','value'=>'1','pid'=>'23','sort'=>'2','status'=>'1','level'=>'3','append'=>'1544683389','updated'=>'1544684544']);
        $this->insert('{{%sys_config}}',['id'=>'29','title'=>'图片类型','name'=>'UPLOAD_IMAGES_EXTENSIONS','type'=>'text','extra'=>'','describe'=>'请用半角逗号隔开，不填写即为不限制上传图片类型','value'=>'png,jpg,jpeg,gif,bmp','pid'=>'23','sort'=>'5','status'=>'1','level'=>'3','append'=>'1544683635','updated'=>'1544684890']);
        $this->insert('{{%sys_config}}',['id'=>'30','title'=>'图片主目录','name'=>'UPLOAD_IMAGES_MAIN_PATH','type'=>'text','extra'=>'','describe'=>'配合图片子目录','value'=>'images/','pid'=>'23','sort'=>'6','status'=>'1','level'=>'3','append'=>'1544683792','updated'=>'1544684584']);
        $this->insert('{{%sys_config}}',['id'=>'31','title'=>'图片子目录','name'=>'UPLOAD_IMAGES_SUB_PATH','type'=>'text','extra'=>'','describe'=>'配合图片主目录（Y:年，m:月，d:日）','value'=>'Y/m/d','pid'=>'23','sort'=>'7','status'=>'1','level'=>'3','append'=>'1544683851','updated'=>'1544684959']);
        $this->insert('{{%sys_config}}',['id'=>'32','title'=>'图片前缀','name'=>'UPLOAD_IMAGES_PREFIX','type'=>'text','extra'=>'','describe'=>'','value'=>'image_','pid'=>'23','sort'=>'8','status'=>'1','level'=>'3','append'=>'1544683883','updated'=>'1544684589']);
        $this->insert('{{%sys_config}}',['id'=>'33','title'=>'图片压缩','name'=>'UPLOAD_IMAGES_COMPRESS','type'=>'statusRadio','extra'=>'','describe'=>'是否开启图片压缩','value'=>'0','pid'=>'23','sort'=>'9','status'=>'1','level'=>'3','append'=>'1544683925','updated'=>'1544684592']);
        $this->insert('{{%sys_config}}',['id'=>'34','title'=>'压缩规则','name'=>'UPLOAD_IMAGES_COMPRESS_RULES','type'=>'textarea','extra'=>'','describe'=>'// 100不压缩，值越大越清晰，注意先后顺序
1024 * 100 => 100, // 0 - 100k 内不压缩
1024 * 1024 => 30, // 100k - 1M 区间压缩质量到30
1024 * 1024 * 2  => 20,   // 1M - 2M 区间压缩质量到20
1024 * 1024 * 1024  => 10, // 2M - 1G 区间压缩质量到20','value'=>'1024*100=>100,
1024*1024*1=>30,
1024*1024*2=>20,
1024*1024*1024=>10','pid'=>'23','sort'=>'10','status'=>'1','level'=>'3','append'=>'1544684238','updated'=>'1544684607']);
        
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

