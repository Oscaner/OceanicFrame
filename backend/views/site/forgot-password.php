<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$src = Url::to(['reset-code']); // 验证码更新路由

$this -> title = '忘记密码';
$this -> params['breadcrumbs'][] = $this -> title;
?>

<div class="layadmin-user-login-box layadmin-user-login-body layui-form">

    <?php $form = ActiveForm::begin([
                    'fieldConfig' => [
                        'options' => ['class' => 'layui-form-item'],
                        'inputOptions' => ['class' => 'layui-input']
                    ]
                ]); ?>

    <?php echo $form -> field($model, 'email', [
                    'labelOptions' => ['class' => 'layadmin-user-login-icon layui-icon ali-icon ali-icon-email']
                ]) -> textInput([
                    'placeholder' => '邮箱',
                    'lay-verify' => 'email',
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
                    'class' => 'layui-input',
                    'placeholder' => '图形验证码',
                    'lay-verify' => 'required',
                ]) -> label(''); ?>

    <div class="layui-form-item" style="margin-bottom: 20px;">
        <a href="<?php echo Url::to(['login']) ?>" class="layadmin-user-jump-change layadmin-link" style="margin-top: 7px;">返回登录</a>
    </div>

    <div class="layui-form-item">

        <?php echo Html::submitButton('找回密码', [
                        'class' => 'layui-btn layui-btn-fluid',
                        'lay-submit' => '',
                        'lay-filter' => 'LAY-user-forget-submit'
                    ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>