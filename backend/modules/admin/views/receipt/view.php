<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Sms */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Sms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sms-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        
        <?= Html::a('Generate PDF', ['gen-pdf', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>
    
   <?php
   
     $arr = [];
 $arr[] =  [
                'attribute'=>'name',
                'value' => $model->name,
                'template' => '<table class="pdftab"><tr><th class="tab-lef">{label}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><td><span class="red">{value}</span></td></tr>'
            ];
 $arr[] = [
                'attribute'=>'email',
                'value' => $model->email,
                'template' => '<tr><th class="tab-lef">{label}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><td><span class="red">{value}</span></td></tr>'
            ];
  $arr[] = [
                'attribute'=>'phone',
                'value' => $model->phone,
                'template' => '<tr><th class="tab-lef">{label}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><td><span class="red">{value}</span></td></tr>'
            ];
  
 $arr[] = [
                'attribute'=>'address',
                'value' => $model->address,
                'template' => '<tr><th class="tab-lef">{label}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><td><span class="red">{value}</span></td></tr>'
            ];
 
 $arr[] = [
                'attribute'=>'type_service',
                'value' => $model->type_service,
                'template' => '<tr><th  class="tab-lef">{label}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><td><span class="red">{value}</span></td></tr>'
            ];
 $arr[] = [
                'attribute'=>'issued_date',
                'value' => $model->issued_date,
                'template' => '<tr><th class="tab-lef">{label}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><td><span class="red">{value}</span></td></tr>'
            ];
 
 $arr[] = [
                'attribute'=>'issued_by',
                'value' => $model->issued_by,
                'template' => '<tr><th class="tab-lef">{label}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><td><span class="red">{value}</span></td></tr>'
            ];
 $arr[] = [
                'attribute'=>'amount',
                'value' => $model->amount,
                'template' => '<tr><th class="tab-lef">{label}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><td><span class="red">{value}</span></td></tr>'
            ];
 
 
 if($model->cheque_no){
 $arr[] =  [
                'attribute'=>'cheque_no',
                'value' => $model->cheque_no,
                'template' => '<tr><th class="tab-lef">{label}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><td><span class="red">{value}</span></td></tr></table>'
            ];
 }
 
 if($model->credit_no){
     
     $arr[] = [
                'attribute'=>'credit_no',
                'value' => Yii::$app->session['Sms']['creditno'],
                'template' => '<tr><th class="tab-lef">{label}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><td><span class="red">{value}</span></td></tr></table>'
            ];
     
 }
 ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => $arr,
           
           
//            [
//                'attribute'=>'cheque_no',
//                'value' => $model->cheque_no,
//                'template' => '<tr><th>{label}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><td><span class="red">{value}</span></td></tr>'
//            ],
//            [
//                'attribute'=>'credit_no',
//                'value' => $model->cheque_no,
//                'template' => '<tr><th>{label}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><td><span class="red">{value}</span></td></tr>'
//            ],
//            'name',
//            'email:email',
//            'phone',
//            'address',
//            'type_service',
//           // 'issued_by',
//            'issued_date',
            
    ]) ?>

</div>
