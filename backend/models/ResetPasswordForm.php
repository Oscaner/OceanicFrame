<?php
namespace backend\models;

use Yii;
use yii\base\Model;
use yii\base\InvalidParamException;
use common\models\backend\Manager;

/**
 * Password reset form
 */
class ResetPasswordForm extends Model
{
    public $password;

    public $confirm_password;

    /**
     * @var \common\models\User
     */
    private $_user;

    /**
     * Creates a form model given a token.
     *
     * @param string $token
     * @param array $config name-value pairs that will be used to initialize the object properties
     * @throws \yii\base\InvalidParamException if token is empty or not valid
     */
    public function __construct(string $token = '', array $config = []) {

        if (empty($token) || !is_string($token)) {

            throw new \Exception('密码重置令牌不能为空');

        }

        $this -> _user = Manager::findByPasswordResetToken($token);

        if (!$this -> _user) {

            throw new \Exception('错误的密码重置令牌');

        }


        parent::__construct($config);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['password', 'confirm_password'], 'required', 'message' => '{attribute}不能为空'],
            ['password', 'string', 'min' => 6],

            ['confirm_password', 'compare', 'compareAttribute' => 'password', 'message' => '两次密码不一致'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'password'         => '密码',
            'confirm_password' => '确认密码',
        ];
    }


    /**
     * Resets password.
     *
     * @return bool if password was reset.
     */
    public function resetPassword()
    {
        $user = $this -> _user;

        $user -> setPassword($this -> password);

        $user -> removePasswordResetToken();

        return $user -> save(false);

    }

}