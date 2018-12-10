<?php
namespace backend\rules;

use Yii;
use yii\rbac\Rule;

class ManagerDetailRule extends Rule
{
    public $name = 'managerDetail';

    public function execute($user, $item, $params)
    {
        return false;
    }
}