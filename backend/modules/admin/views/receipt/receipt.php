<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Sms */
/* @var $form yii\widgets\ActiveForm */
$this->title = 'Create Receipt';
$this->params['breadcrumbs'][] = $this->title;
$issued = array(
    //'1'=>array(
    '0' => '--select--',
    'admin' => 'Admin',
        //),
        )
?>
<section class="content-header">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">
                    <?php
                        $form = ActiveForm::begin([
                                    'id' => 'admin-form',
                                    'options' => ['class' => 'form-horizontal', 'enctype' => 'multipart/form-data'],
                                    'enableClientValidation' => true,
                                    'enableAjaxValidation' => false,
                                    'validateOnSubmit' => true,
                                    'validateOnChange' => true,
                                    'validateOnType' => true,
                                    'fieldConfig' => [
                                        'template' => "{label}<div class=\"col-sm-5\">{input}<div class=\"errorMessage\">{error}</div></div>",
                                        'labelOptions' => ['class' => 'col-sm-2 control-label'],
                                    ],
                                ])
                        ?>
                    <div class="box-body">
                    <?php
                    echo $form->field($model, 'name')->textInput(['border' => 'none','placeholder'=>'Enter Name']);

                    echo $form->field($model, 'email')->textInput(['border' => 'none','placeholder'=>'Enter Email Address']);

                    echo $form->field($model, 'phone')->textInput(['border' => 'none','placeholder'=>'Enter Phone Number']);

                    echo $form->field($model, 'address')->textInput(['border' => 'none','placeholder'=>'Enter Address']);

                    $services = array(
                        '0' => '--select--',
                        'service1' => 'service1',
                        'service2' => 'service2',
                        'service3' => 'service3',
                    );


                    echo $form->field($model, 'type_service')->textInput(['maxlength' => true]);

                    echo $form->field($model, 'issued_by')->textInput(['maxlength' => true]);

                    echo $form->field($model, 'issued_date')->textInput(['class' => 'form-control datepicker', 'id' => 'from_date','placeholder'=>'Enter Service'])
                            ->label('Issued On');

                    echo $form->field($model, 'amount')->textInput(['maxlength' => true,'placeholder'=>'Enter Amount']);

                    $payment_modes = array(
                        '' => '--select--',
                        '1' => 'Cash',
                        '2' => 'Cheque',
                        '3' => 'Credit Card',
                    );
                    ?>
                        <div class="box-body">
                            <?= $form->field($model, 'payment_mode')->textInput(['maxlength' => true ,'placeholder'=>'Select Payment Mode'])->dropDownList($payment_modes) ?>
                        </div>

                        <div  id="sms-cheque_no" style="display:none">
                            <?= $form->field($model, 'cheque_no')->textInput(['maxlength' => 8,'placeholder'=>'Enter 8 digits only'])->label('Cheque No'); ?>
                        </div>

                        <div  id="sms-credit_no" style="display:none">
                            <?= $form->field($model, 'credit_no')->textInput(['maxlength' => 4 , 'placeholder' => 'Enter last 4 digits only','id'=>'credit'])->label('Credit Card No'); ?>
                        </div>

                    </div>
                    <div class="form-group">
                        <div class="col-sm-0 col-sm-offset-2">
                            <?= Html::submitButton('Submit', ['class' => 'btn btn-success']) ?>
                        </div>
                    </div>
                    <?php ActiveForm::end(); ?>

                </div>
            </div>
        </div>
    </div>

</section>

<?php
$script = <<< JS
    jQuery(document).ready(function () { 
        $("#from_date").datepicker({ 
        endDate: new Date(),
          format: 'yyyy-mm-dd',
          autoclose: true,
         
        }).on('changeDate', function (selected) {
            var dob = new Date(selected.date.valueOf());
          
        });

        
    });
        
       jQuery(document).ready(function () {
            $('#sms-payment_mode').change(function() {
                   $(this).find("option:selected").each(function(){
                       if($(this).attr("value")=="2"){
                            $("#sms-cheque_no").show();
                        }
                  else
                  {
                    $("#sms-cheque_no").hide();
                  }
        });
        
        
         $(this).find("option:selected").each(function(){
                       if($(this).attr("value")=="3"){
                            $("#sms-credit_no").show();
                        }
                  else
                  {
                    $("#sms-credit_no").hide();
                  }
        });
                
        
            });
        });
        
        
        
        
        
JS;
$this->registerJs($script, View::POS_END);
?>
