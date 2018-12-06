<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

$this -> title = '重置密码';
$this -> params['breadcrumbs'][] = $this -> title;
?>

<div class="layadmin-user-login-box layadmin-user-login-body layui-form">

    <?php $form = ActiveForm::begin([
                    'fieldConfig' => [
                        'options' => ['class' => 'layui-form-item'],
                        'inputOptions' => ['class' => 'layui-input']
                    ]
                ]); ?>

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


    <div class="layui-form-item" style="margin-bottom: 20px;">
        <a href="<?php echo Url::to(['login']) ?>" class="layadmin-user-jump-change layadmin-link" style="margin-top: 7px;">返回登录</a>
    </div>

    <div class="layui-form-item">

        <?php echo Html::submitButton('重置密码', [
                        'class' => 'layui-btn layui-btn-fluid',
                        'lay-submit' => '',
                        'lay-filter' => 'LAY-user-reset-submit'
                    ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>