<?php

//use common\models\DlAdminCities;
//use common\models\DlCity;
//use yii\helpers\ArrayHelper;
use yii\helpers\Html;

use yii\web\View;
//use yii\widgets\ActiveForm;
//$session = Yii::$app->session;
//$cityid = $session->get('cityid');
?>

<header class="main-header">
    <a href="#" class="logo">
      <span class="logo-lg"><b>Wall </b>Dress up</span>
    </a>
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
         
          <!-- Notifications: style can be found in dropdown.less -->
         
          <!-- Tasks: style can be found in dropdown.less -->
      
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="/backend/web/themes/admin/img/avatar5.png" width="25" height="25" class="img-circle" alt="User Image">
           
              <span class="hidden-xs">Admin</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
              <img src="/backend/web/themes/admin/img/avatar5.png" width="25" height="25" class="img-circle" alt="User Image">

                <p>
                 Admin 
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
               
                   
                  
                    <div class="center-block">
                        
                      <?php echo Html::a('Edit Profile', ['/admin/site/profile'], $options = ['class' => 'btn btn-default btn-flat']); ?>                               

                        
                    </div>
                
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                   <?php //echo Html::a('Profile', ['/admin/default/profile'], $options = ['class' => 'btn btn-default btn-flat']); ?>                               
                   <?php echo Html::a('Change password', ['/admin/site/changepassword'], $options = ['class' => 'btn btn-default btn-flat']); ?>

                </div>
                <div class="pull-right">
                    <?= Html::a('Sign out', ['/admin/site/logout'], $options = ['class' => 'btn btn-default btn-flat']); ?>
                  
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
         
        </ul>
      </div>
    </nav>
  </header>

