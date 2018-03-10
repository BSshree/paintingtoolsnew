<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\PasswordResetRequestForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Register';
$this->params['breadcrumbs'][] = $this->title;


        
    
?>
<div class="login-box">
    <div class="login-box-body">
    <h1><?= Html::encode($this->title) ?></h1>
    <br>
    <p>Please fill out your details</p>
      

   
        <div class="form-group has-feedback">
            
            <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>

                <?= $form->field($modeluser, 'username')->textInput(['autofocus' => true]) ?>
                <?= $form->field($modeluser, 'password_hash')->passwordInput(['required']) ?>
                <?= $form->field($modeluser, 'email')->textInput() ?>
              
              
                <div class="form-group">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
        </div>
</div>
