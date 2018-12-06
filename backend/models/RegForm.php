<?php
namespace backend\models;

use yii\base\Model;
use common\models\backend\Manager;

/**
 * Reg Form
 */
class RegForm extends Model
{
    public $mobile_phone; // 手机

    public $verifyCode; // 验证码

    public $password; // 密码

    public $confirm_password; // 确认密码

    public $username; // 用户名

    public $terms = true; // 同意用户协议

    public $email; // 电子邮箱

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mobile_phone', 'username', 'password', 'verifyCode', 'confirm_password', 'email'], 'required', 'message' => '{attribute}不能为空'],

            [['mobile_phone', 'username', 'email'], 'trim'],
            
            ['mobile_phone', 'unique', 'targetClass' => '\common\models\backend\Manager', 'message' => '该手机号已被注册'],
            ['mobile_phone', 'match', 'pattern'=>'/^1[345678]{1}\d{9}$/', 'message'=>'请填写正确的手机号'],

            ['username', 'unique', 'targetClass' => '\common\models\backend\Manager', 'message' => '该用户名已存在'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'email', 'message' => '请正确填写邮箱地址'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\backend\Manager', 'message' => '该邮箱已存在'],

            ['password', 'string', 'min' => 6],

            ['confirm_password', 'compare', 'compareAttribute' => 'password', 'message' => '两次密码不一致'],
        ];
    }


    public function attributeLabels()
    {
        return [
            'mobile_phone'     => '手机',
            'verifyCode'       => '验证码',
            'password'         => '密码',
            'confirm_password' => '确认密码',
            'username'         => '用户名',
            'email'            => '电子邮箱',
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function reg()
    {
        if (!$this -> validate()) {

            return null;

        }
        
        $user = new Manager();

        $user -> mobile_phone = $this -> mobile_phone;

        $user -> username = $this -> username;

        $user -> email = $this -> email;

        $user -> setPassword($this -> password);

        $user -> generateAuthKey();
        
        return $user -> save() ? $user : null;
    }

}