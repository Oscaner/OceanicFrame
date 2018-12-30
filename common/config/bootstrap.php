<?php
Yii::setAlias('@common', dirname(__DIR__));
Yii::setAlias('@backup', dirname(__DIR__) . '/backup');
Yii::setAlias('@frontend', dirname(dirname(__DIR__)) . '/frontend');
Yii::setAlias('@backend', dirname(dirname(__DIR__)) . '/backend');
Yii::setAlias('@console', dirname(dirname(__DIR__)) . '/console');
Yii::setAlias('@services', dirname(dirname(__DIR__)) . '/services');
Yii::setAlias('@basics', dirname(dirname(__DIR__)) . '/vendor/oceanickang/oframe-basics');
Yii::setAlias('@attachment', dirname(dirname(__DIR__)) . '/web/attachment');// 绝对附件路径
Yii::setAlias('@attachurl', '/attachment'); // 相对附件路径
