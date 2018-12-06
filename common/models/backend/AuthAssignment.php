<?php

namespace common\models\backend;

class AuthAssignment extends \oframe\basics\common\models\backend\AuthAssignment
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%sys_auth_3_assignment}}';
    }

    public function init()
    {
        $this -> auth_rule       = AuthRule::className();
        $this -> auth_assignment = AuthAssignment::className();
        $this -> auth_item       = AuthItem::className();
        $this -> auth_item_child = AuthItemChild::className();

        parent::init();
    }

    /**
     * 分配角色
     */
    public static function add($role_id, $user_id)
    {
        $model = self::findOne(['user_id' => $user_id]);

        !$model && $model = new self;

        $roles = AuthItem::getRoles();

        $model -> item_name = $roles[$role_id];

        $model -> user_id = $user_id;

        return !$model -> validate() ? 
                $model -> delete() :
                $model -> save();
    }

}
