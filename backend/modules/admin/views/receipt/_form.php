<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model common\models\Sms */
/* @var $form yii\widgets\ActiveForm */
?>

<section class="content-header">
    <div class="row">
        <div class="col-sm-5">
            <div class="x_panel">
                <div class="x_content">
                    <div class="box-body">
                        <?php //echo "<pre>"; print_r(Yii::$app->session['Sms']['back']); exit; ?>
                        <?php if(!Yii::$app->session['Sms']['phone']) {  ?>
                        
                          <?php $form = ActiveForm::begin(); ?>
                            <?= $form->field($model, 'phone')->textInput(['maxlength' => true])->label('Phone Number') ?>
                            <div class="col-sm-0 col-sm-offset-2" id="form1"><br>
                                <?= Html::submitButton('Send OTP', ['class' => 'btn btn-primary', 'name' => 'button1']); ?>
                            </div>
                            <?php ActiveForm::end(); ?>
                           
                        <?php  } else{ ?>
                        <?php ?>
                             <?php $form = ActiveForm::begin(['enableClientValidation' => false]); ?>
                            <?= $form->field($model, 'phone')->textInput(['value' => Yii::$app->session['Sms']['phone']])->label('Phone Number') ?>
                            <div class="col-sm-0 col-sm-offset-2" id="form2">
                                <?= Html::submitButton('Send OTP again', ['class' => 'btn btn-primary', 'name' => 'button3']); ?>
                            </div>
                            <?php ActiveForm::end(); ?>
                      
                        <?php } ?>

                        
                       

                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
//$script = <<< JS
//    
//       $("#sendotp").click(function () {
//        
//        $("#verifyotp").show();
//        });
//JS;
//     
//$this->registerJs($script, View::POS_END);
?>