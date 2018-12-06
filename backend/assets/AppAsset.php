<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        '/resource/backend/layui/css/layui.css',
        '/resource/backend/others/css/oframe.css',
        '/resource/backend/others/css/ali-icon.css',
        '/resource/backend/layui/css/modules/layer/default/layer.css',
        '/resource/backend/style/admin.css',
        '/resource/backend/style/login.css',
    ];
    public $js = [
        '/resource/backend/layui/layui.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'oceanickang\yii\material\font\MaterialDesignIconicFontAsset',
    ];
    /**
     * @inheritdoc
     */
    public $jsOptions = [
        // 'position' => \yii\web\View::POS_HEAD,   // 这是设置所有js放置的位置
    ];

    // echarts
    public static function addECharts($view) {

        $view -> registerJsFile('/resource/backend/others/js/echarts.min.js', ['position' => $view::POS_HEAD]);

    }

}
