<?php
namespace common\enums;
/**
 * 状态枚举
 *
 * Class StatusEnum
 * @package common\enum
 */
class StatusEnum
{
    /**
     * 状态启用
     *
     * @var int [<description>]
     */
    const STATUS_ON = 1;
    /**
     * 状态禁用
     *
     * @var int [<description>]
     */
    const STATUS_OFF = 0;
    /**
     * 状态删除
     *
     * @var int [<description>]
     */
    const STATUS_DEL = -1;

    /**
     * @var array
     */
    public static $listExplain = [
        self::STATUS_ON  => '启用',
        self::STATUS_OFF => '禁用',
        self::STATUS_DEL => '删除',
    ];
    
}