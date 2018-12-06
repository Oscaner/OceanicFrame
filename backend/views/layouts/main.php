<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;
use common\widgets\Alert;

$Author_Info = Yii::$app -> params['Author_Info'];

AppAsset::register($this);
?>

<?php $this->beginPage() ?>

<!DOCTYPE html>
<html lang="<?= Yii::$app -> language ?>">
<head>
    <meta charset="<?= Yii::$app -> charset ?>">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <?= Html::csrfMetaTags() ?>

    <title><?= Html::encode($this->title) ?></title>

    <?php $this->head() ?>
</head>
<body>
    
<?php $this->beginBody() ?>

<?= Alert::widget() ?>

<div class="layadmin-user-login layadmin-user-display-show" id="LAY-user-login" style="display: none;">

    <div class="layadmin-user-login-main">


        <div class="layadmin-user-login-box layadmin-user-login-header">
            <h2><?php echo Yii::$app -> config -> get('WEB_SITE_LOGO_NAME') ?></h2>
            <p>基于 Yii2.0 的应用开发引擎</p>
        </div>

        <?= $content ?>
    
        <div class="layui-trans layadmin-user-login-footer">
          
            <p><?php echo Yii::$app -> config -> get('WEB_COPY_RIGHT'); ?></p>
            <p>
                <span><a href="<?php echo $Author_Info['docs_url'] ?>" target="_blank">获取文档</a></span>
                <span><a href="<?php echo $Author_Info['demo_url'] ?>" target="_blank">在线演示</a></span>
            </p>
            
        </div>

    </div>
    
</div>

<?php $this->endBody() ?>

<script>
    layui.config({
        base: '/resource/backend/' //静态资源所在路径
    }).extend({
        index: 'lib/index' //主入口模块
    }).use(['index', 'user'], function(){
        var $ = layui.$
        ,bases = (layui.layer, layui.laytpl, layui.setter, layui.view, layui.admin)
        ,body = $("body")
        ,setter = layui.setter
        ,admin = layui.admin
        ,form = layui.form
        ,body = $("body")

        form.render();

        bases.sendAuthCode({
            elem: "#LAY-user-getsmscode",
            elemPhone: "#LAY-user-login-mobilephone",
            elemVercode: "#LAY-user-login-verifyCode",
            ajax: {
                url: '<?php echo Url::to(['get-sms-code']) ?>',
            }
        });

    });

</script>

</body>
</html>
<?php $this->endPage() ?>
