<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\assets\AppAssetPaint;
use common\widgets\Alert;
use yii\bootstrap\Modal;

//AppAsset::register($this);
AppAssetPaint::register($this);

?>
<?php $this->beginPage() ?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
 <?php  echo $this->render('@frontend/modules/site/views/layouts/header'); ?> 

        <?= $content ?>
   
     <?php echo $this->render('@frontend/modules/site/views/layouts/footer'); ?> 

<?php $this->endBody() ?>
   
<script>
//$(document).ready(function() {
//    $("#formvalidate").validate({
//        rules: {
//              'name': {
//                required: true,
////		minlength:3
//		},
//		'phone': {
//		required:true,
//		number:true,
//		},
//		'email': {
//                required: true,
//                email: true
//                 },
//                'mess': {
//                required: true,
//		},
//           },
//        messages: {
//                'name': {
//		required :"Please Enter Your Name",
//		},
//		'phone':{
//		required: "Please Enter Your Phone Number",
//		number: "Please Enter Valid Phone Number"
//		},
//                'email': "Please Enter a Valid Email Address",
//                 'mess': {
//		required :"Please Enter Your Message",
//		},
//            },
//               
//    });
//    });

</script>
<?php
//    Modal::begin([
//        'header' =>'<h4>Book An Appointment</h4>',
//        'id' => 'modal',
//        'size' =>'modal-dialog',
//        
//    ]);
//    echo "<div id='modalContent'></div>";
//    Modal::end();
    ?>


</body>
</html>
<?php $this->endPage() ?>
