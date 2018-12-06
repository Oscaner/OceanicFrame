<?php
namespace backend\models;

use Yii;
use common\models\backend\Manager;
use oframe\basics\common\helpers\CaptchaHelper;

/**
 * Class LoginForm
 * @package jianyan\basics\common\models\sys
 */
class LoginForm extends \common\models\base\LoginForm
{
    public $rememberMe = true;

    public $verifyCode;

    public function rules()
    {
        return [
            [['username', 'password', 'verifyCode'], 'required', 'message' => '{attribute}不能为空'],
            ['password', 'validatePassword'],
            ['verifyCode', 'validateCode'],
            ['rememberMe', 'boolean'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'username'   => '用户名',
            'rememberMe' => '记住我',
            'password'   => '密码',
            'verifyCode' => '验证码',
        ];
    }

    public function validateCode($attribute, $params)
    {
        $captcha = new CaptchaHelper();

        if (!$code = $captcha -> getPhrase()) {

            $this -> addError($attribute, '验证码无效');

        } else if ($code !== $this -> verifyCode) {

            $this -> addError($attribute, '验证码错误');

        }

    }

    public function getUser()
    {
        if (null === $this -> _user) {

            $this -> _user = Manager::findByUsername($this -> username);

        }

        return $this -> _user;
    }

    public function login()
    {

        if ($this -> validate()) {

            return Yii::$app -> user -> login($this -> getUser(), $this -> rememberMe ? 3600 * 24 *30 : 0);

        } else {

            return false;

        }

    }
}

