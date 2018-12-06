<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use backend\models\LoginForm;
use backend\models\RegForm;
use backend\models\PasswordResetRequestForm;
use backend\models\ResetPasswordForm;
use oframe\basics\common\helpers\CaptchaHelper;
use oframe\basics\common\helpers\AjaxHelper;

/**
 * Site controller
 */
class SiteController extends \backend\controllers\BController
{
    /**
     * 默认布局文件
     * @var string
     */
    public $layout = 'main';

    /**
     * Displays homepage.
     * 
     * @return string
     */
    public function actionIndex()
    {
        return $this -> renderPartial('@basics/backend/views/main/index');
    }

    /**
     * 登录
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app -> user -> isGuest) {

            return $this -> goHome();

        }

        $model = new LoginForm();

        $captcha = new CaptchaHelper();

        if ($model -> load(Yii::$app -> request -> post())) {

            return $model -> login() ? 
                    $this -> message('登录成功', $this -> goBack()) :
                    $this -> message($this -> analysisError($model -> getFirstErrors()), $this -> redirect(['login']), 'error');

        } else {

            $model -> password = '';

            $captcha::setPhrase();

            return $this -> render('login', [

                'model' => $model,

                'verify_img' => $captcha::base64()

            ]);
        }
    }

    /**
     * 重置图片验证码
     *
     * @return json 
     */
    public function actionResetCode()
    {
        $captcha = new CaptchaHelper();

        $captcha::setPhrase();

        $data['base64'] = $captcha::base64();

        $response = Yii::$app -> response;

        $response -> data = AjaxHelper::formatData(AjaxHelper::AJAX_SUCCESS, '', $data);

        $response -> send();
    }

    /**
     * 注册
     *
     * @return string
     */
    public function actionRegister()
    {
        $model = new RegForm();

        if ($model -> load(Yii::$app -> request -> post())) {

            return $this -> message('后台禁止注册', $this -> redirect(['login']), 'warning');

            if ($user = $model -> reg()) {

                return $this -> message('注册成功', $this -> redirect(['login']));

            }

            return $this -> message($this -> analysisError($model -> getFirstErrors()), $this -> redirect(['reg']), 'error');

        }

        return $this -> render('register', [
            'model' => $model
        ]);
    }

    /**
     * 获取短信验证码
     *
     * @return json
     */
    public function actionGetSmsCode()
    {
        $response = Yii::$app -> response;

        $response -> data = AjaxHelper::formatData(0, '禁止注册', []);

        $response -> send();
    }

    /**
     * 忘记密码
     *
     * @return string
     */
    public function actionForgotPassword()
    {
        $model = new PasswordResetRequestForm();

        if (Yii::$app -> request -> isPost) {

            // return $this -> message('暂不支持修改密码', $this -> redirect(['forgot-password']), 'error');

            $post = Yii::$app -> request -> post();

            if ($model -> load($post) && $model -> validate() && $model -> sendEmail()) {

                return $this -> message('发送成功', $this -> redirect(['forgot-password']));

            }

            return $this -> message($this -> analysisError($model -> getFirstErrors()), $this -> redirect(['forgot-password']), 'error');

        }

        $captcha = new CaptchaHelper();

        $captcha::setPhrase();

        return $this -> render('forgot-password', [

            'model' => $model,

            'verify_img' => $captcha::base64()

        ]);
    }

    /**
     * 重置密码
     *
     * @return string
     */
    public function actionResetPassword(string $token = '')
    {
        try{

            $model = new ResetPasswordForm($token);

        } catch (\Exception $e) {

            return $this -> message($e -> getMessage(), $this -> redirect(['forgot-password']), 'error');

        }

        if (Yii::$app -> request -> isPost) {

            if ($model -> load(Yii::$app -> request -> post()) && $model -> validate() && $model -> resetPassword()) {

                return $this -> message('密码重置成功', $this -> goHome());

            }

            return $this -> message($this -> analysisError($model -> getFirstErrors()), $this -> redirect(['forgot-password']), 'error');

        }

        return $this -> render('reset-password', [

            'model' => $model

        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app -> user -> logout();

        return $this -> goHome();
    }

}
