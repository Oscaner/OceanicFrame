<?php
namespace services\common;

use Yii;

class EventService extends \oframe\basics\services\Service
{
    /**
     * 检查 redis 是否可用，不可用换文件缓存
     * @Author OceanicKang 2018-11-05
     */
    public static function checkRedis($event) {
        //redis出错，用文件缓存
        try{

            Yii::$app -> redis -> exists("mobile");

        } catch (\Exception $e) {

            Yii::error($e, "redis_error") ;

            $cache = [

                'class' => 'yii\caching\FileCache',

                'cachePath' => '@common/runtime/cache'

            ];

            Yii::$app -> set("redis", $cache);
        } 
    }

}
