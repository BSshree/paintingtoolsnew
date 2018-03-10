<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Sms */
/* @var $form yii\widgets\ActiveForm */
$this->title = 'Create receipt';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="col-sm-5">
<div class="box-body">
                            <?php $form = ActiveForm::begin(['enableClientValidation' => false]); ?>
                            <?= $form->field($model, 'otp')->textInput([])->label('OTP Number') ?>
                            <div class="col-sm-0 col-sm-offset-2" id="form2">
                                <?= Html::submitButton('Verify OTP', ['class' => 'btn btn-info', 'name' => 'button2']); ?> 
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <?= Html::a('Back', ['create'], ['class' => 'btn btn-primary', 'name' => 'backbutton']); ?> 
                            </div>
                            <?php ActiveForm::end(); ?>
    
   

   
    </div>

</div>

</div>
