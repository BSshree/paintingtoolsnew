<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model common\models\Sms */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="content-wrapper">
<div class="col-sm-5">
<div class="box-body">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true])->label('Phone Number') ?>

        <div class="col-sm-0 col-sm-offset-2">
        <?= Html::submitButton('Send OTP', ['class' => 'btn btn-primary','name' => 'button1','id' => 'sendotp']) ?>
    </div>
    
      <?php ActiveForm::end(); ?>


    <br><Br><br><br>
    <div class="verifyotp" style="display:none" id="verifyotp" >
    <?= $form->field($model, 'otp')->textInput([])->label('OTP Number') ?>
    <div class="otp" id="otp">
    <div class="col-sm-0 col-sm-offset-2">
       
        <?= Html::submitButton('Verify OTP', ['class' => 'btn btn-info','name' => 'button2']) ?>
   
    </div>
    </div>
    </div>    


</div>
</div>
    </div>
<!--<script>
    
     $("#sendotp").click(function () {
        alert('Hi')
        
        $("#otp").show();
        });
        
    
    </script>-->
<?php
$url=Yii::$app->getUrlManager()->createUrl("/admin/receipt/generatereceipt");
$script = <<< JS
    
       
       $("#sendotp").click(function () {
        
        $("#verifyotp").show();
        });
        
        
        

JS;
     
$this->registerJs($script, View::POS_END);
?>
