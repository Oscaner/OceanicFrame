<?php

/* @var $this yii\web\View */
/* @var $user common\models\User */

$resetLink = Yii::$app -> urlManager -> createAbsoluteUrl(['site/reset-password', 'token' => $user -> password_reset_token]);
?>
Hello <?= $user -> username ?>,

点击下面的链接重新设置密码：

<?= $resetLink ?>
