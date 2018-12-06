<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$src = Url::to(['reset-code']); // 验证码更新路由

$this -> title = '登入';
$this -> params['breadcrumbs'][] = $this -> title;
?>


<div class="layadmin-user-login-box layadmin-user-login-body layui-form">

    <?php $form = ActiveForm::begin([
                    'fieldConfig' => [
                        'options' => ['class' => 'layui-form-item'],
                        'inputOptions' => ['class' => 'layui-input']
                    ]
                ]); ?>

    <?php echo $form -> field($model, 'username', [
                    'labelOptions' => ['class' => 'layadmin-user-login-icon layui-icon layui-icon-username']
                ]) -> textInput([
                    'placeholder' => '登录名',
                    'lay-verify' => 'required',
                ]) -> label(''); ?>

    <?php echo $form -> field($model, 'password', [
                    'labelOptions' => ['class' => 'layadmin-user-login-icon layui-icon layui-icon-password']
                ]) -> passwordInput([
                    'placeholder' => '密码',
                    'lay-verify' => 'required',
                ]) -> label(''); ?>

    <?php echo $form -> field($model, 'verifyCode', [
                    'template' => " <div class=\"layui-form-item\">
                                        <div class=\"layui-row\">
                                            <div class=\"layui-col-xs7\">
                                                {label}
                                                {input}
                                            </div>
                                            <div class=\"layui-col-xs5\">
                                                <div style=\"margin-left: 10px;\">
                                                    <img src=\"{$verify_img}\" class=\"layadmin-user-login-codeimg\" id=\"LAY-user-get-vercode\">
                                                </div>
                                            </div>
                                            {error}
                                            <script>
                                                $(\"#LAY-user-get-vercode\").click(function () {
                                                    var self = this;
                                                    $.get(\"{$src}\", function (result) {
                                                        self.src = result.data.base64;
                                                    })
                                                })
                                            </script>
                                        </div>
                                    </div>",
                    'labelOptions' => ['class' => 'layadmin-user-login-icon layui-icon layui-icon-vercode']
                ]) -> textInput([
                    'placeholder' => '图形验证码',
                    'lay-verify' => 'required',
                ]) -> label(''); ?>

    <?php $forgot_password_url = Url::to(['forgot-password']); ?>

    <?php echo $form -> field($model, 'rememberMe', [
                    
                ]) -> checkbox([
                    'template' => " <div class=\"layui-form-item\" style=\"margin-bottom: 20px;\">
                                        {input}
                                        <a href=\"{$forgot_password_url}\" class=\"layadmin-user-jump-change layadmin-link\" style=\"margin-top: 7px;\">忘记密码？</a>
                                    </div>",
                    'title' => '记住密码',
                    'lay-skin' => 'primary',
                ]); ?>

    <div class="layui-form-item">

        <?php echo Html::submitButton('登 入', [
                        'class' => 'layui-btn layui-btn-fluid',
                        'lay-submit' => '',
                        'lay-filter' => 'LAY-user-login-submit'
                    ]) ?>

    </div>


    <div class="layui-trans layui-form-item layadmin-user-login-other">
        
        <label>社交账号登入</label>
        <a href="javascript:;"><i class="layui-icon layui-icon-login-qq"></i></a>
        <a href="javascript:;"><i class="layui-icon layui-icon-login-wechat"></i></a>
        <a href="javascript:;"><i class="layui-icon layui-icon-login-weibo"></i></a>
  
        <a href="<?php echo Url::to(['register']) ?>" class="layadmin-user-jump-change layadmin-link">注册帐号</a>
    </div>

    <?php ActiveForm::end(); ?>
</div>

