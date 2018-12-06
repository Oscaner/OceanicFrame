<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */



use yii\helpers\Html;

$this -> title = $name;
?>

<style type="text/css">
    .layadmin-user-login-main {
        width: auto;
    }
</style>

<div class="layui-fluid">
    <div class="layadmin-tips">

        <i class="layui-icon" face>&#xe664;</i>
    
        <div class="layui-text" style="font-size: 20px;">
            <?= Html::encode($this->title) ?> <br>
            <?= nl2br(Html::encode($message)) ?>
        </div>
    
    </div>

</div>
