<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Testimonials */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="testimonials-form">

    <?php $form = ActiveForm::begin([
                                'id' => 'testimonials-form',
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


    <?= $form->field($model, 'statement')->textarea(['rows' => 6,'placeholder'=>'Statement']) ?>

    <?= $form->field($model, 'name')->textInput(['placeholder'=>'Name']) ?>

  
 <div class="form-group">
         <div class="col-sm-0 col-sm-offset-2">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
