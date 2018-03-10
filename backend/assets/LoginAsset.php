<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class LoginAsset extends AssetBundle
{
    public $basePath = '@webroot';
     public $baseUrl = '@web/themes/admin';
    public $css = [
       
        'bootstrap/css/bootstrap.min.css',
        'font-awesome/css/font-awesome.min.css',
        'css/ionicons.min.css',
        'css/AdminLTE.min.css',
       // 'css/blue.css',
         'css/square/blue.css',
    ];
    public $js = [
        'js/jquery.min.js',
         'bootstrap/js/bootstrap.min.js',
        'js/icheck.min.js',
        
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
