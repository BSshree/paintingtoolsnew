<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\web\View;

//$this->title = 'Admin Login';
$this->params['breadcrumbs'][] = $this->title;
?>

 <?php
    $form = ActiveForm::begin([
                'id' => 'login-form-horizontal',              
                'fieldConfig' => [
                    'template' => "{input}\n{hint}\n{error}\n",
                    'horizontalCssClasses' => [
                        'offset' => 'col-sm-offset-4',
                        'wrapper' => 'col-sm-8',
                        'error' => '',
                        'hint' => '',
                    ],
                ],
    ]);
    ?> 
<div class="login-box">
<div class="login-box-body">
     <p class="login-box-msg">Sign in to start your session</p>
    <div class="form-group has-feedback">
<?= $form->field($model, 'username')->textInput(['autofocus' => true, "placeholder" => "Username"]) ?>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
     <div class="form-group has-feedback">
<?= $form->field($model, 'password')->textInput(['type' =>'password', "placeholder" => "Password"]) ?>
           <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
    <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>
    <div class="col-xs-4">                    
        <?php echo Html::submitButton('Login', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']); ?>
    </div> </div>

      
</div>
</div>
    <?php ActiveForm::end(); ?>

