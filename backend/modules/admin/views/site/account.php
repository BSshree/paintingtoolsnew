<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\PasswordResetRequestForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Account';
$this->params['breadcrumbs'][] = $this->title;

$datacountry = [
   "red" => "red",
    "green" => "green",
    "blue" => "blue",
    "orange" => "orange",
    "white" => "white",
    "black" => "black",
    "purple" => "purple",
    "cyan" => "cyan",
    "teal" => "teal"
];  

$countries = array(
        'Asia'=>array(
            '0'=>'--select--',
            'russia'=>'Russia',
            'india'=>'India',
            'america' =>'America',
            'australia' => 'Australia',
            'kenya'=>'Kenya',
            'zimbabwe'=>'Zimbabwe',
        ),
    )
        
    
?>





<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_content">
               <?php $form = ActiveForm::begin([
                   'id' => 'account-form',
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

               
              
                <?= $form->field($modeluser, 'email')->textInput() ?>
                
                <?= $form->field($modelpro, 'dob')->textInput() ?>
                <?= $form->field($modelpro, 'address')->textInput() ?>
                <?= $form->field($modelpro, 'country')->label('Country')->dropDownList($countries);  ?>
                <?= $form->field($modelpro, 'state')->textInput() ?>
                <?= $form->field($modelpro, 'city')->textInput() ?>
 <div class="box-footer">
                    <div class="form-group">
                        <div class="col-sm-0 col-sm-offset-2">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
                </div>
                    </div>
 </div>

            <?php ActiveForm::end(); ?>


            </div>
        </div>
    </div>
</div>
    </section>
</div>


        
        
        
        
        
        
        
        
        
        
        
        