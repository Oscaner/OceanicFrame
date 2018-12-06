<?php
namespace backend\controllers;

use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * Backend 基类控制器
 */
class BController extends \oframe\basics\backend\controllers\BController
{
    public function init()
    {
        Yii::$app -> set('mailer', [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => false,
            'viewPath' => '@common/mail',
            'transport' => [
                'class'      => 'Swift_SmtpTransport',
                'host'       => Yii::$app -> config -> get('SYS_EMAIL_HOST'),
                'username'   => Yii::$app -> config -> get('SYS_EMAIL_USERNAME'),
                'password'   => Yii::$app -> config -> get('SYS_EMAIL_PASSWORD'),
                'port'       => Yii::$app -> config -> get('SYS_EMAIL_PORT'),
                'encryption' => empty(Yii::$app -> config -> get('SYS_EMAIL_ENCRYPTION')) ? 'tls' : 'ssl',
            ],
        ]);

        return parent::init();
    }
    
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error', 'reset-code', 'register', 'get-sms-code', 'forgot-password', 'reset-password'],
                        'allow' => true,
                    ],
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post', 'get'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }


}