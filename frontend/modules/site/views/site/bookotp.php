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
            <label class="control-label1">Phone Number</label>
            <input  type="number"  pattern="[0-9]{10}" id="phone" required="required" class="form-control" placeholder="Enter Your Phone Number" />
            <div class="errorMessage1"></div>
        </div>
        <button class="btn btn2 nextBtn float-right" data-form="phone" id="phone_form" >Send OTP <span aria-hidden="true">&rarr;</span></button>
<!--        <nav>
            <ul class="pager">
                <li class="next"><a class="nextBtn" href="#" data-form="phone" id="phone_form">Send OTP <span aria-hidden="true">&rarr;</span></a></li>
            </ul>
        </nav>-->

    </div>
</div>

<div class="panel panel-primary setup-content" id="step-2">
    <div class="panel-heading">
        <h3 class="panel-title">Verify OTP</h3>
    </div>
    <div class="panel-body">
        <div class="form-group">
            <label class="control-label1">OTP Number</label>
            <input id="otp_no" type="number" maxlength="2" required="required" class="form-control" placeholder="Enter Your OTP Number" />
            <div class="errorMessage"></div>
        </div>
    <button class="btn btn2 nextBtn float-left previous prevBtn" data-form="phone" id="phone_form" ><span aria-hidden="true">&larr;</span> Previous </button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <button class="btn btn2 nextBtn float-right next nextBtn" data-form="otp" id="otp_form" >Next <span aria-hidden="true">&rarr;</span></button>

<!--        <nav>
            <ul class="pager">
                <li class="previous"><a class="prevBtn" href="#"><span aria-hidden="true">&larr;</span> Previous</a></li>
                <li class="next"><a class="nextBtn" href="#" data-form="otp" id="otp_form">Next <span aria-hidden="true">&rarr;</span></a></li>
            </ul>
        </nav>-->

    </div>
</div>

<div class="panel panel-primary setup-content" id="step-3">
    <div class="panel-heading">
        <h3 class="panel-title">Book An Appointment</h3>
    </div>
   <div class="panel-body">
        <?php
        $form = ActiveForm::begin([
                    'id' => 'book-site',
                    'action' => ['/site/site/bookotp'],
                    'enableClientValidation' => true,
                    'enableAjaxValidation' => false,
                    'validateOnSubmit' => true,
                    'validateOnChange' => true,
                    'validateOnType' => true,
                    'fieldConfig' => [
                        //'template' => "<div class=\"form-group\"><label class=\"control-label1\">{label}</label>{input}<div class=\"errorMessage\">{error}</div></div>",
                        ],
        ]);

        
        echo $form->field($model, 'name1')->textInput(['class' => 'form-control','placeholder'=>'Enter Your Name']);
        echo $form->field($model, 'email1')->textInput(['class' => 'form-control','placeholder'=>'Enter Your Email Address']);

        $services = array(
                        '' => '--select--',
                        'General painting' => 'General painting',
                        'Gift a wall' => 'Gift a wall',
                        'Concept walls' => 'Concept walls',
                        'Designer walls' => 'Designer walls',
                        'Wallpapers' => 'Wallpapers',
                        'Royale play' => 'Royale play',
                        'Home makeover' => 'Home makeover',
                        'Potraits' => 'Potraits',
                        'Metal murals' => 'Metal murals',
                        'Statues' => 'Statues',
                    );
         
        echo $form->field($model, 'type_service')->textInput(['class' => 'form-control','data-type'=>'item','required'=>true])->dropDownList($services)->label('Service'); ?>
 
       <div  style="display:none"  class="show-plans">
        <?= $form->field($model, 'plan')->textInput(['value'=>''])->label('Plan'); ?>
    </div>
       
      <?php  echo $form->field($model, 'mess')->textarea(['rows' => '4','class' => 'form-control','maxlength' => true,'placeholder'=>'Enter Your Message'])->label('Message');

        ?>
    <div style="display:none" class="loading-image1"><img src="themes/site_theme/images/ajax-loader.gif" alt=""><br></div>
    

<!--        <nav>
            <ul class="pager">-->
                <!--<li class="next">-->
      <?= Html::submitButton('SUBMIT!', ['class' => 'btn btn2 float-right']) ?>
   <!--</li>-->
<!--            </ul>
        </nav>-->
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
