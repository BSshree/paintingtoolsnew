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
                'attribute'=>'address',
                'value' => $model->address,
                'template' => '<tr><th>{label}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><td><span class="red">{value}</span></td></tr>'
            ];
 
 $arr[] = [
                'attribute'=>'type_service',
                'value' => $model->type_service,
                'template' => '<tr><th>{label}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><td><span class="red">{value}</span></td></tr>'
            ];
 $arr[] = [
                'attribute'=>'issued_date',
                'value' => $model->issued_date,
                'template' => '<tr><th>{label}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><td><span class="red">{value}</span></td></tr>'
            ];
 
 $arr[] = [
                'attribute'=>'issued_by',
                'value' => $model->issued_by,
                'template' => '<tr><th>{label}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><td><span class="red">{value}</span></td></tr>'
            ];
 $arr[] = [
                'attribute'=>'amount',
                'value' => $model->amount,
                'template' => '<tr><th>{label}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><td><span class="red">{value}</span></td></tr>'
            ];
 
 
 if($model->cheque_no){
 $arr[] =  [
                'attribute'=>'cheque_no',
                'value' => $model->cheque_no,
                'template' => '<tr><th>{label}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><td><span class="red">{value}</span></td></tr>'
            ];
 }
 
 if($model->credit_no){
     
     $arr[] = [
                'attribute'=>'credit_no',
                'value' => Yii::$app->session['Sms']['creditno'],
                'template' => '<tr><th>{label}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><td><span class="red">{value}</span></td></tr>'
            ];
     
 }
 
 
// $attributes = [
//            [
//                'attribute'=>'name',
//                'value' => $model->name,
//                'template' => '<tr><th>{label}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><td><span class="red">{value}</span></td></tr>'
//            ],
//             [
//                'attribute'=>'email',
//                'value' => $model->email,
//                'template' => '<tr><th>{label}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><td><span class="red">{value}</span></td></tr>'
//            ],
//             [
//                'attribute'=>'phone',
//                'value' => $model->phone,
//                'template' => '<tr><th>{label}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><td><span class="red">{value}</span></td></tr>'
//            ],
//             [
//                'attribute'=>'address',
//                'value' => $model->address,
//                'template' => '<tr><th>{label}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><td><span class="red">{value}</span></td></tr>'
//            ],
//             [
//                'attribute'=>'type_service',
//                'value' => $model->type_service,
//                'template' => '<tr><th>{label}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><td><span class="red">{value}</span></td></tr>'
//            ],
//             [
//                'attribute'=>'issued_date',
//                'value' => $model->issued_date,
//                'template' => '<tr><th>{label}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><td><span class="red">{value}</span></td></tr>'
//            ],
//             [
//                'attribute'=>'issued_by',
//                'value' => $model->issued_by,
//                'template' => '<tr><th>{label}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><td><span class="red">{value}</span></td></tr>'
//            ],
//            [
//                'attribute'=>'amount',
//                'value' => $model->amount,
//                'template' => '<tr><th>{label}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><td><span class="red">{value}</span></td></tr>'
//            ],
//            [
//                'attribute'=>'cheque_no',
//                'value' => $model->cheque_no,
//                'id' => 'chequeid',
//                'visible' => false,
//                'template' => '<tr><th>{label}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><td><span class="red">{value}</span></td></tr>'
//            ],
//            [
//                'attribute'=>'credit_no',
//                'value' => Yii::$app->session['Sms']['creditno'],
//                 'id' => 'creditid',
//               // 'visible' => $showDivision,
//                'template' => '<tr><th>{label}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><td><span class="red">{value}</span></td></tr>'
//            ],
//
//        ];
 ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => $arr,
        'options' => [
            'class' => ['table striped hovered border bordered']
        ]
    ]) ?>


 
 
<!--<p><img src="/backend/web/uploads/t5.jpg" alt="signature" width="42" height="42" align="right"> </p>-->