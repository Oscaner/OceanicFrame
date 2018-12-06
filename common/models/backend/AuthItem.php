<?php

namespace common\models\backend;

use Yii;

class AuthItem extends \oframe\basics\common\models\backend\AuthItem
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%sys_auth_2_item}}';
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
     * 分配权限
     */
    public static function setAccreditAssign($parent, $children)
    {
        $data = [];

        if ($children) {

            foreach ($children as $k => $child) {

                $data[$k]['parent'] = $parent;

                $data[$k]['child'] = $child;

            }
            
        }

        $transaction = Yii::$app -> db -> beginTransaction();

        try {

            $result = AuthItemChild::deleteAll('parent = :parent', [':parent' => $parent]);

            if ($result !== 0 && !$result) throw new \Exception('权限预处理失败');

            $result = $data ? Yii::$app -> db -> createCommand() -> batchInsert(AuthItemChild::tableName(), [
                                    'parent',
                                    'child',
                                ], $data) -> execute() : true;

            if (!$result) throw new \Exception('分配权限失败');

            $transaction -> commit();

        } catch (\Exception $e) {

            $transaction -> rollback();

            return $e -> getMessage();

        }

        return true;
    }

    
}
