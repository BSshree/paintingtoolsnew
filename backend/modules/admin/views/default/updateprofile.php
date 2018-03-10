<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->title = 'Edit Profile';

$this->params['breadcrumbs'][] = $this->title;
?>
<!-- page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
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

                    echo $form->field($model, 'username')->textInput(['readonly' => 'readonly']);

                    echo $form->field($model, 'email')->textInput([]);
                    
                    ?>
                </div><!-- /.box-body -->
                <div class="box-footer">
                    <div class="form-group">
                        <div class="col-sm-0 col-sm-offset-2">
                            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
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
