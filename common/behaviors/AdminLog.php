<?php
namespace common\behaviors;

use Yii;
use yii\base\Behavior;
use yii\web\User;

/**
 * 登陆登出的行为
 *
 * Class AdminLog
 * @package common\behaviors
 */
class AdminLog extends Behavior
{
    /**
     * @var int
     */
    public $attribute = 'logged_at';

    /**
     * {@inheritdoc}
     */
    public function events()
    {
        return [
            User::EVENT_AFTER_LOGIN => 'afterLogin',
            User::EVENT_BEFORE_LOGOUT => 'beforeLogout',
        ];
    }

    /**
     * 登录事件
     *
     * @param $event
     * @return mixed
     */
    public function afterLogin($event)
    {
        $model = $event -> identity;
        // $model -> visit_count += 1;
        // $model -> last_time = time();
        // $model -> last_ip = Yii::$app -> request- > getUserIP();
        return $model -> save();
    }

    /**
     * 登出事件
     *
     * @param $event
     * @return mixed
     */
    public function beforeLogout($event)
    {
        $model = $event -> identity;

        return $model -> save();
    }

}