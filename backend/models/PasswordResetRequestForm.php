<?php
namespace backend\models;

use Yii;
use yii\base\Model;
use common\models\backend\Manager;
use oframe\basics\common\helpers\CaptchaHelper;

/**
 * Password reset request form
 */
class PasswordResetRequestForm extends Model
{
    public $email;

    public $verifyCode;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['email', 'trim'],
            ['email', 'required', 'message' => '邮箱不能为空'],
            ['email', 'email', 'message' => '邮箱格式不正确'],
            ['email', 'exist',
                'targetClass' => '\common\models\backend\Manager',
                'filter' => ['status' => Manager::STATUS_ACTIVE],
                'message' => '该邮箱不存在'
            ],

            ['verifyCode', 'validateCode'],

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

    /**
     * Sends an email with a link, for resetting the password.
     *
     * @return bool whether the email was send
     */
    public function sendEmail()
    {
        /* @var $user User */
        $user = Manager::findOne([

            'status' => Manager::STATUS_ACTIVE,

            'email' => $this -> email,

        ]);

        if (!$user) {

            return false;

        }
        
        if (!Manager::isPasswordResetTokenValid($user -> password_reset_token)) {

            $user -> generatePasswordResetToken();

            if (!$user -> save()) {

                $this -> addError('sendEmail', 'Token 生成失败');

                return false;

            }
        }

        if (!Yii::$app -> config -> get('SYS_EMAIL_PASSWORD')) {

            $this -> addError('sendEmail', '邮件相关配置有误');

            return false;

        }

        try {

            $result = Yii::$app
                -> mailer
                -> compose('passwordResetToken-html', ['user' => $user])
                -> setFrom([
                    Yii::$app -> config -> get('SYS_EMAIL_USERNAME') => Yii::$app -> config -> get('SYS_EMAIL_NICKNAME')
                ])
                -> setTo($this -> email)
                -> setSubject(Yii::$app -> config -> get('SYS_EMAIL_NICKNAME') . '-重置密码')
                -> send();

        } catch (\Exception $e) {

            $this -> addError('sendEmail', '邮件发送失败');

            return false;

        }

        return $result;
    }
}
