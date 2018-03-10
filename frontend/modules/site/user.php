<?php

namespace frontend\modules\site;

use Yii;
use yii\base\Module;

/**
 * user module definition class
 */
class user extends Module {

    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'frontend\modules\site\controllers';

    /**
     * @inheritdoc
     */
    public function init() {

         Yii::$app->session['module_name'] = "Module";
         
//        if (isset(Yii::$app->session['module_name'])) {
//            if (Yii::$app->session['module_name'] != 'admin') {
//                Yii::$app->user->logout();
//                Yii::$app->session['module_name'] = "admin";
//            }
//        } else {
//            Yii::$app->session['module_name'] = "admin";
//        }

        $this->layout = "@app/modules/site/views/layouts/main";

        //$homeurl = Yii::$app->getHomeUrl() . 't1/site/index/';
        //Yii::$app->setHomeUrl($homeurl);        
        
        parent::init(); 
           
       //$session = Yii::$app->session;
  
        Yii::$app->set('user', [
            'class' => 'yii\web\User',
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
//            // 'loginUrl' => ['yonetim/default/login'],
            'identityCookie' => ['name' => 'site', 'httpOnly' => true],
//            //  'idParam' => 'editor_id', //this is important !
            'returnUrl' => array('site/site/index'),
            'loginUrl' => array('site/site/login'),
        ]);

//        Yii::$app->view->theme = new Theme([
//            'pathMap' => ['@app/views' => '@app/themes/admin/views'],
//            'baseUrl' => '@web/themes/admin',
//        ]);
    }
    
}
