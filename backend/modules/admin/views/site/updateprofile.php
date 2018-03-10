<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\web\View;

$this->title = 'Edit Profile';

$this->params['breadcrumbs'][] = $this->title;
$countries = array(
    'Asia' => array(
        '0' => '--select--',
        'russia' => 'Russia',
        'india' => 'India',
        'america' => 'America',
        'australia' => 'Australia',
        'kenya' => 'Kenya',
        'zimbabwe' => 'Zimbabwe',
    ),
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
                            //  echo $form->field($model, 'company_code')->textInput();

                            echo $form->field($model, 'username')->textInput([]);

                            echo $form->field($model, 'email')->textInput([]);

//                    echo $form->field($model1, 'dob')->widget(\yii\jui\DatePicker::classname(), [
//                        //'language' => 'ru',
//                        'dateFormat' => 'yyyy-MM-dd',
//                        ]);
//                  
                            ?>
                        </div><!-- /.box-body -->
                        <div class="form-group">
                            <div class="col-sm-0 col-sm-offset-2">
<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
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
          format: 'yyyy-mm-dd',
          autoclose: true,
         
        }).on('changeDate', function (selected) {
            var dob = new Date(selected.date.valueOf());
          
        });

        
    });
JS;
$this->registerJs($script, View::POS_END);
?>
