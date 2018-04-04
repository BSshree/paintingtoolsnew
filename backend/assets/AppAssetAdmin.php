<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAssetAdmin extends AssetBundle {

    public $basePath = '@webroot';
    public $baseUrl = '@web/themes/admin';
    public $css = [
        'bootstrap/css/bootstrap.min.css',
        'font-awesome/css/font-awesome.min.css',
        'css/ionicons.min.css',
        'css/popup.css',
        //  'css/select2.min.css',
        'css/AdminLTE.min.css',
        'css/skins/_all-skins.min.css',
        'css/morris.js/morris.css',
        'css/jvectormap/jquery-jvectormap.css',
        // 'css/jquery-ui.min.css',
        'css/datepicker/bootstrap-datepicker.min.css',
        'css/datepicker/daterangepicker.css',
        //  'css/square/blue.css',
         'css/custom.css',
        // 'css/bootstrap-select.css',
        'bootstrap/css/bootstrap3-wysihtml5.min.css',
       
    ];
    public $js = [
//        'js/jquery.min.js',
        'js/jquery-ui.min.js',
        'bootstrap/js/bootstrap.min.js',
        // 'js/jquery1.11.4-ui.min.js',
        'js/raphael/raphael.min.js',
        'js/morris.js/morris.min.js',
        'js/jquery.knob.min.js',
        'js/moment.min.js',
        'js/daterangepicker.js',
        'js/bootstrap-datepicker.min.js',
        'js/bootstrap3-wysihtml5.all.min.js',
        'js/jquery.slimscroll.min.js',
        'js/fastclick.js',
        'js/adminlte.min.js',
//        'js/dashboard.js',
        'js/demo.js',
        'js/main.js',
        //   'js/select2.full.min.js',
       // 'js/app.js',
     //   'js/datepicker/bootstrap-datepicker.js',
      //  'js/bootstrap-select.js',
      //  'js/icheck.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

}
