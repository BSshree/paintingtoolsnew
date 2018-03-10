<?php

use yii\bootstrap\Modal;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\ActiveForm;
?>


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
            <p><small>Book An Appointment</small></p>
        </div>
        <div class="stepwizard-step col-xs-3"> 
            <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
            <p><small>Finish</small></p>
        </div>
    </div>
</div>


<div class="panel panel-primary setup-content" id="step-1">
    <div class="panel-heading">
        <h3 class="panel-title">Send OTP</h3>
    </div>

    <div class="panel-body">
        <div class="form-group">
            <label class="control-label">Phone Number</label>
            <input  type="text" id="phone" required="required" class="form-control" placeholder="Enter Your Phone Number" />
            <div class="errorMessage1"></div>
        </div>

        <nav>
            <ul class="pager">
                <li class="next"><a class="nextBtn" href="#" data-form="phone" id="phone_form">Send OTP <span aria-hidden="true">&rarr;</span></a></li>
            </ul>
        </nav>

    </div>
</div>

<div class="panel panel-primary setup-content" id="step-2">
    <div class="panel-heading">
        <h3 class="panel-title">Verify OTP</h3>
    </div>
    <div class="panel-body">
        <div class="form-group">
            <label class="control-label">OTP Number</label>
            <input id="otp_no" type="text" required="required" class="form-control" placeholder="Enter Your OTP Number" />
            <div class="errorMessage"></div>
        </div>
        <nav>
            <ul class="pager">
                <li class="previous"><a class="prevBtn" href="#"><span aria-hidden="true">&larr;</span> Previous</a></li>
                <li class="next"><a class="nextBtn" href="#" data-form="otp" id="otp_form">Next <span aria-hidden="true">&rarr;</span></a></li>
            </ul>
        </nav>

    </div>
</div>

<div class="panel panel-primary setup-content" id="step-3">
    <div class="panel-heading">
        <h3 class="panel-title">Book An Appointment</h3>
    </div>
   <div class="panel-body">
        <?php
        $form = ActiveForm::begin([
                    'id' => 'book-form',
                    'action' => ['/admin/faq/bookotp'],
                    'enableClientValidation' => true,
                    'enableAjaxValidation' => false,
                    'validateOnSubmit' => true,
                    'validateOnChange' => true,
                    'validateOnType' => true,
                    'fieldConfig' => [
                        'template' => "<div class=\"form-group\"><label class=\"control-label\">{label}</label>{input}<div class=\"errorMessage\">{error}</div></div>",
                    ],
        ]);

        echo $form->field($model, 'name')->textInput(['class' => 'form-control','placeholder'=>'Enter Your Name']);

        echo $form->field($model, 'email')->textInput(['class' => 'form-control','placeholder'=>'Enter Your Email Address']);

      
         $services = array(
                        '' => '--select--',
                        'General Painting' => 'General Painting',
                        'Gift a wall' => 'Gift a wall',
                        'Concept Walls' => 'Concept Walls',
                        'Designer walls' => 'Designer walls',
                        'Wall paper' => 'Wall paper',
                        'Royale play' => 'Royale play',
                        'Home makeover' => 'Home makeover',
                        'Potraits/Metal murals/Statues' => 'Potraits/Metal murals/Statues',
                    );
         
        echo $form->field($model, 'type_service')->textInput(['class' => 'form-control'])->dropDownList($services)->label('Service');

        echo $form->field($model, 'mess')->textInput(['class' => 'form-control','maxlength' => true,'placeholder'=>'Enter Your Message'])->label('Message');

        ?>
       
        <nav>
            <ul class="pager">
                <li class="next"><?= Html::submitButton('SUBMIT!', ['class' => 'btn btn-success']) ?></li>
            </ul>
        </nav>
        <?php ActiveForm::end(); ?>
    </div>
</div>
<div class="panel panel-primary setup-content" id="step-4">
    <div class="panel-heading">
        <h3 class="panel-title">Finish</h3>
    </div>
    <div class="panel-body">
        <h2>Request sent successfully</h2>
    </div>
</div>

<?php
$sendotp = Yii::$app->getUrlManager()->createUrl("/admin/faq/ajaxbookotp");

$script = <<< JS

 $(document).ready(function () {
        

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
    
                
                
       $("#book_form").click(function(){     
                
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='url']");
                
       var form = $(this);
       var formData = form.serialize();
        $.ajax({
               url: form.attr("action"),
                type : 'POST',                   
               data: formData,
                success: function(data) {
                var result = JSON.parse( data );
                    if(result['mgs'] == "success"){
                        nextStepWizard.removeAttr('disabled').trigger('click');                    
                    }
                 },
            error: function () {
                alert("Something went wrong");
            }
           }); 
                
               
                
                
    });
                
                
    
}); 
       
JS;
$this->registerJs($script, View::POS_END);
?>
