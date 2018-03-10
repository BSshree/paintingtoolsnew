<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model common\models\Sms */

$this->title = $model->name;

?>
<!-- <img src="/backend/web/uploads/t5.jpg" alt="logo" width="42" height="42" align="left">-->
 <center><h1>Painting Tools</h1></center><hr>
 <?php
 $arr = [];
 $arr[] =  [
                'attribute'=>'name',
                'value' => $model->name,
                'template' => '<tr><th>{label}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><td><span class="red">{value}</span></td></tr>'
            ];
 $arr[] = [
                'attribute'=>'email',
                'value' => $model->email,
                'template' => '<tr><th>{label}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><td><span class="red">{value}</span></td></tr>'
            ];
  $arr[] = [
                'attribute'=>'phone',
                'value' => $model->phone,
                'template' => '<tr><th>{label}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><td><span class="red">{value}</span></td></tr>'
            ];
   $arr[] = [
                'attribute'=>'phone',
                'value' => $model->mess,
                'template' => '<tr><th>{label}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><td><span class="red">{value}</span></td></tr>'
            ];

 
 ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => $arr,
        'options' => [
            'class' => ['table striped hovered border bordered']
        ]
    ]) ?>

