<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Faq */
/* @var $form yii\widgets\ActiveForm */
?>

<section class="content-header">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">

    <?php $form = ActiveForm::begin([
                                'id' => 'faq-form',
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

    <?= $form->field($model, 'question')->textarea(['rows' => 6,'placeholder'=>'Question']) ?>

    <?= $form->field($model, 'answer')->textarea(['rows' => 6,'placeholder'=>'Answer']) ?>

       <div class="form-group">
         <div class="col-sm-0 col-sm-offset-2">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>
    </div>
    <?php ActiveForm::end(); ?>
            </div>
            </div>
        </div>
    </div>
</section>

