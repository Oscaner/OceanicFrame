<?php

namespace common\models\backend;

class AuthItemChild extends \oframe\basics\common\models\backend\AuthItemChild
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%sys_auth_4_item_child}}';
    }


    public function init()
    {
        $this -> auth_rule       = AuthRule::className();
        $this -> auth_assignment = AuthAssignment::className();
        $this -> auth_item       = AuthItem::className();
        $this -> auth_item_child = AuthItemChild::className();

        parent::init();
    }

}
