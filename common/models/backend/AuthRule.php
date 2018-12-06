<?php

namespace common\models\backend;

class AuthRule extends \oframe\basics\common\models\backend\AuthRule
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%sys_auth_1_rule}}';
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
