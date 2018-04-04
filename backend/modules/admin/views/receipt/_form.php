<?php

use yii\bootstrap\Modal;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\ActiveForm;
?>
<!--<h2 class="recep-heading">Create Receipt</h2><br>-->

<div class="stepwizard">
    <div class="progress center-block">
        <div class="progress-bar progress-bar-success active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 13%">
        </div>
    </div>

    <div class="stepwizard-row setup-panel">
        <div class="stepwizard-step col-xs-3"> 
            <a href="#step-1" type="button" class="btn btn-success btn-circle">1</a>
            <p><small>Send OTP</small></p>
        </div>
        <div class="stepwizard-step col-xs-3"> 
            <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
            <p><small>Verify OTP</small></p>
        </div>
        <div class="stepwizard-step col-xs-3"> 
            <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
            <p><small>Generate Receipt</small></p>
        </div>
        <div class="stepwizard-step col-xs-3"> 
            <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
            <p><small>Finish</small></p>
        </div>
    </div>
</div>


<div class="panel panel-primary recp-body setup-content" id="step-1">
    <div class="panel-heading">
        <h3 class="panel-title">Send OTP</h3>
    </div>

    <div class="panel-body">
        
   <div class="form-group row">
    <label  class="col-sm-2 col-form-label">Phone Number</label>
    <div class="col-sm-6">
     <input  type="text" id="phone" required="required" class="form-control" placeholder="Enter Phone Number" />
     <div class="errorMessage1"></div>
    </div>
  </div>
  
  <div class="form-group row">
    <div class="col-sm-10">
     <button class="btn recp-btn center-block" data-form="phone" id="phone_form" >Send OTP <span aria-hidden="true">&rarr;</span></button>

    </div>
  </div>
    </div>
</div>

<div class="panel panel-primary recp-body setup-content" id="step-2">
    <div class="panel-heading">
        <h3 class="panel-title">Verify OTP</h3>
    </div>
    <div class="panel-body">
            
   <div class="form-group row">
    <label  class="col-sm-2 col-form-label">OTP Number</label>
    <div class="col-sm-6">
     <input id="otp_no" type="text" required="required" class="form-control" placeholder="Enter OTP Number" />
     <div class="errorMessage"></div><br>
    </div>
  </div>
  
  <div class="form-group row">
    <div class="col-sm-10">
     <button class="btn recp-btn nextBtn pull-left previous prevBtn" data-form="phone" id="phone_form" ><span aria-hidden="true">&larr;</span> Previous </button>
        <button class="btn recp-btn nextBtn center-block next nextBtn" data-form="otp" id="otp_form" >Next <span aria-hidden="true">&rarr;</span></button>
    </div>
  </div>
        
    </div>
</div>

<div class="panel panel-primary recp-body setup-content" id="step-3">
    <div class="panel-heading">
        <h3 class="panel-title">Generate Receipt</h3>
    </div>
    <div class="panel-body">


        <?php
        $form = ActiveForm::begin([
                    'id' => 'admin-form',
                    'action' => ['/admin/receipt/receipt'],
                    'options' => ['class' => 'form-horizontal', 'enctype' => 'multipart/form-data'],
                    'enableClientValidation' => true,
                    'enableAjaxValidation' => false,
                    'validateOnSubmit' => true,
                    'validateOnChange' => true,
                    'validateOnType' => true,
                    'fieldConfig' => [
                        'template' => "<div class=\"col-sm-5\">{label}{input}<div class=\"help-block\">{error}</div></div>",
                        'labelOptions' => ['class' => 'form-label'],
                    ],
                ])
        ?>
        <div class="box-body">
            <?php
            echo $form->field($model, 'name')->textInput(['border' => 'none', 'placeholder' => 'Enter Name', 'class' => 'form-control']);

            echo $form->field($model, 'email')->textInput(['border' => 'none', 'placeholder' => 'Enter Email Address', 'class' => 'form-control']);

            echo $form->field($model, 'phone')->textInput(['border' => 'none', 'placeholder' => 'Enter Phone Number','type'=>'number','id'=>'rec-ph']);

            echo $form->field($model, 'address')->textarea(['border' => 'none', 'placeholder' => 'Enter Address']);

            $services = array(
                '0' => '--select--',
                'service1' => 'service1',
                'service2' => 'service2',
                'service3' => 'service3',
            );


            echo $form->field($model, 'type_service')->textInput(['maxlength' => true, 'placeholder' => 'Enter Service']);

            echo $form->field($model, 'issued_by')->textInput(['maxlength' => true, 'placeholder' => 'Enter Issued By']);

            echo $form->field($model, 'issued_date')->textInput(['class' => 'form-control datepicker', 'id' => 'from_date', 'placeholder' => ' Enter Issued On'])
                    ->label('Issued On');

            echo $form->field($model, 'amount')->textInput(['maxlength' => true, 'placeholder' => 'Enter Amount']);

            $payment_modes = array(
                '' => '--select--',
                '1' => 'Cash',
                '2' => 'Cheque',
                '3' => 'Credit Card',
            );
            ?>
            <div>
                <?= $form->field($model, 'payment_mode')->textInput(['maxlength' => true, 'class' => 'form-control', 'placeholder' => 'Select Payment Mode'])->dropDownList($payment_modes) ?>
            </div>

            <div  id="sms-cheque_no" style="display:none">
                <?= $form->field($model, 'cheque_no')->textInput(['maxlength' => 8, 'class' => 'form-control', 'placeholder' => 'Enter 8 digits only'])->label('Cheque No'); ?>
            </div>

            <div  id="sms-credit_no" style="display:none">
                <?= $form->field($model, 'credit_no')->textInput(['maxlength' => 4, 'class' => 'form-control', 'placeholder' => 'Enter last 4 digits only', 'id' => 'credit'])->label('Credit Card No'); ?>
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
<div class="panel panel-primary recp-body setup-content" id="step-4">
    <div class="panel-heading">
        <h3 class="panel-title">Finish</h3>
    </div>
    <div class="panel-body">
        <h2>Request sent successfully</h2>
    </div>
</div>

<?php
$sendotp = Yii::$app->getUrlManager()->createUrl("/admin/receipt/ajaxreceipt");

$script = <<< JS

 $(document).ready(function () {
        
         $(function() {
              $('body').on('keypress','#otp_no',function(event){
                    if (event.which != 8 && event.which != 0 && (event.which < 48 || event.which > 57)) {
                        return false;
                    }
                });
            });
         $(function() {
              $('body').on('keypress','#phone',function(event){
                    if (event.which != 8 && event.which != 0 && (event.which < 48 || event.which > 57)) {
                        return false;
                    }
                });
            });
        
         $(function() {
              $('body').on('keypress','#rec-ph',function(event){
                    if (event.which != 8 && event.which != 0 && (event.which < 48 || event.which > 57)) {
                        return false;
                    }
                });
            });
        
        $("#from_date").datepicker({ 
        endDate: new Date(),
          format: 'yyyy-mm-dd',
          autoclose: true,
         
        }).on('changeDate', function (selected) {
            var dob = new Date(selected.date.valueOf());
          
        });
        
        
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
        

    var navListItems = $('div.setup-panel div a'),
        allWells = $('.setup-content'),
        allNextBtn = $('.nextBtn'),
        allPrevBtn = $('.prevBtn');

    allWells.hide();

    navListItems.click(function (e) {
        e.preventDefault();
        var _target = $($(this).attr('href')),
            _item = $(this);
        var nextStepWizard = $(this).text();
        
        if(nextStepWizard == 1)
            $('.stepwizard .progress-bar').animate({width:'0%'},0);
        if(nextStepWizard == 2)
            $('.stepwizard .progress-bar').animate({width:'33%'},0);
        if(nextStepWizard == 3)
            $('.stepwizard .progress-bar').animate({width:'66%'},0);
        if(nextStepWizard == 4)
            $('.stepwizard .progress-bar').animate({width:'100%'},0);
        

        if (!_item.hasClass('disabled')) {
            navListItems.removeClass('btn-success').addClass('btn-default');
            //navListItems.addClass('btn-default');
            _item.addClass('btn-success');
            allWells.hide();
            _target.show();
            _target.find('input:eq(0)').focus();
        }
    });

    
    allPrevBtn.click(function () {
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            prevStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().prev().children("a");

        prevStepWizard.removeAttr('disabled').trigger('click');    
    });
    

    $('div.setup-panel div a.btn-success').trigger('click');
        
                
    $("#otp_form").click(function(){        
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='url']");
                
        var otp_no = $("#otp_no").val();
        $.ajax({
                url  : '{$sendotp}',
                type : 'POST',                   
                data: {
                  req_val: otp_no, 
                  form: 'otp'
                },
                success: function(data) {
                var result = JSON.parse( data );
                    if(result['mgs'] == "success"){
                        navListItems.eq(1).attr('disabled','');
                        $(".errorMessage").empty();
                        nextStepWizard.removeAttr('disabled').trigger('click');                    
                    }else{
                        $(".errorMessage").empty();
                        $(".errorMessage").html( '<div class="help-block">'+result['mgs']+'</div>' );
                    }
                }
           });         
    });
                
    $("#phone_form").click(function(){     
                
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='url']");
                
        var phone_no = $("#phone").val();
        var filter = /^[0-9-+]+$/;
        if(filter.test(phone_no)){
        $.ajax({
                url  : '{$sendotp}',
                type : 'POST',                   
                data: {
                  req_val: phone_no, 
                  form: 'phone'
                },
                success: function(data) {
                var result = JSON.parse( data );
                    if(result['mgs'] == "success"){
                    $('#otp_no').val('');
                $(".errorMessage").empty();
                        nextStepWizard.removeAttr('disabled').trigger('click');                    
                    }
                }
           });       
        }else{
            $(".errorMessage1").html( '<div class="help-block">Please Enter Your Phone Number</div>' );
        }
    });
    
                
                

                
                
    
}); 
       
                
                 $(function() {
              $('body').on('keypress','#phone',function(event){
                    if (event.which != 8 && event.which != 0 && (event.which < 48 || event.which > 57)) {
                        return false;
                    }
                });
            });
                
JS;
$this->registerJs($script, View::POS_END);
?>
