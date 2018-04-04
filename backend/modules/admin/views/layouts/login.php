<?php

use backend\assets\LoginAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

LoginAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en-US"  class="hold-transition login-page">
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin Login</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />    
        <?php $this->head() ?>
    </head>
   
        <?php $this->beginBody() ?>
    <body class="hold-transition login-page">
       
            <div class="login-logo">
                <bR><Br>
                <a href="#"><b>Wall Dressup</b></a>
            </div>
          
                 <form action="#" method="post">
                     
                     </form>
           
                <?= Alert::widget() ?>
                <?php echo $content ?>    
           
                <?php $this->endBody() ?>
            
                </body>
                </html>
                <?php $this->endPage() ?>