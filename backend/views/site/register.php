<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$src = Url::to(['get-sms-code']); // 短信发送路由

$this -> title = '注册';
$this -> params['breadcrumbs'][] = $this -> title;
?>

<div class="layadmin-user-login-box layadmin-user-login-body layui-form">

    <?php $form = ActiveForm::begin([
                    'fieldConfig' => [
                        'options' => ['class' => 'layui-form-item'],
                        'inputOptions' => ['class' => 'layui-input']
                    ]
                ]); ?>

    <?php echo $form -> field($model, 'mobile_phone', [
                    'labelOptions' => ['class' => 'layadmin-user-login-icon layui-icon layui-icon-cellphone']
                ]) -> textInput([
                    'id' => 'LAY-user-login-mobilephone',
                    'placeholder' => '手机',
                    'lay-verify' => 'phone'
                ]) -> label('') ?>

    <?php echo $form -> field($model, 'verifyCode', [
                    'template' => " <div class=\"layui-form-item\">
                                        <div class=\"layui-row\">
                                            <div class=\"layui-col-xs7\">
                                                {label}
                                                {input}
                                            </div>
                                            <div class=\"layui-col-xs5\">
                                                <div style=\"margin-left: 10px;\">
                                                    <button type=\"button\" class=\"layui-btn layui-btn-primary layui-btn-fluid\" id=\"LAY-user-getsmscode\">获取验证码</button>
                                                </div>
                                            </div>
                                            {error}
                                        </div>
                                    </div>",
                    'labelOptions' => ['class' => 'layadmin-user-login-icon layui-icon layui-icon-vercode']
                ]) -> textInput([
                    'id' => 'LAY-user-login-verifyCode',
                    'placeholder' => '验证码',
                    'lay-verify' => 'required'
                ]) -> label(''); ?>

    <?php echo $form -> field($model, 'password', [
                    'labelOptions' => ['class' => 'layadmin-user-login-icon layui-icon layui-icon-password']
                ]) -> passwordInput([
                    'placeholder' => '密码',
                    'lay-verify' => 'pass',
                ]) -> label(''); ?>

    <?php echo $form -> field($model, 'confirm_password', [
                    'labelOptions' => ['class' => 'layadmin-user-login-icon layui-icon layui-icon-password']
                ]) -> passwordInput([
                    'placeholder' => '确认密码',
                    'lay-verify' => 'required',
                ]) -> label(''); ?>

    <?php echo $form -> field($model, 'username', [
                    'labelOptions' => ['class' => 'layadmin-user-login-icon layui-icon layui-icon-username']
                ]) -> textInput([
                    'placeholder' => '用户名(用于登录)',
                    'lay-verify' => 'required',
                ]) -> label(''); ?>

    <?php echo $form -> field($model, 'email', [
                    'labelOptions' => ['class' => 'layadmin-user-login-icon layui-icon ali-icon ali-icon-email']
                ]) -> textInput([
                    'placeholder' => '邮箱(用于找回密码)',
                    'lay-verify' => 'required',
                ]) -> label(''); ?>

    <?php echo $form -> field($model, 'terms') -> checkbox([
                    'title' => '同意用户协议',
                    'lay-skin' => 'primary',
                ]) -> label(false) -> error(false); ?>

    <div class="layui-form-item">
        <?php echo Html::submitButton('注 册', [
                        'class' => 'layui-btn layui-btn-fluid',
                        'lay-submit' => '',
                        'lay-filter' => 'LAY-user-reg-submit'
                    ]) ?>
    </div>

    <div class="layui-trans layui-form-item layadmin-user-login-other">
        <label>社交账号注册</label>
        <a href="javascript:;"><i class="layui-icon layui-icon-login-qq"></i></a>
        <a href="javascript:;"><i class="layui-icon layui-icon-login-wechat"></i></a>
        <a href="javascript:;"><i class="layui-icon layui-icon-login-weibo"></i></a>
      
        <a href="<?php echo Url::to(['login']) ?>" class="layadmin-user-jump-change layadmin-link layui-hide-xs">用已有帐号登入</a>
        <a href="<?php echo Url::to(['login']) ?>" class="layadmin-user-jump-change layadmin-link layui-hide-sm layui-show-xs-inline-block">登入</a>
    </div>

    <?php ActiveForm::end(); ?>

  </div>

