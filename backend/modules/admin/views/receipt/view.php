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

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute'=>'name',
                'value' => $model->name,
                'template' => '<tr><th>{label}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><td colspan="4"><span class="red">{value}</span></td></tr>',
            ],
             [
                'attribute'=>'email',
                'value' => $model->email,
                'template' => '<tr><th>{label}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><td colspan="4"><span class="red">{value}</span></td></tr>'
            ],
             [
                'attribute'=>'phone',
                'value' => $model->phone,
                'template' => '<tr><th>{label}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><td><span class="red">{value}</span></td></tr>'
            ],
             [
                'attribute'=>'address',
                'value' => $model->address,
                'template' => '<tr><th>{label}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><td><span class="red">{value}</span></td></tr>'
            ],
             [
                'attribute'=>'type_service',
                'value' => $model->type_service,
                'template' => '<tr><th>{label}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><td><span class="red">{value}</span></td></tr>'
            ],
             [
                'attribute'=>'issued_date',
                'value' => $model->issued_date,
                'template' => '<tr><th>{label}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><td><span class="red">{value}</span></td></tr>'
            ],
            [
                'attribute'=>'amount',
                'value' => $model->amount,
                'template' => '<tr><th>{label}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><td><span class="red">{value}</span></td></tr>'
            ],
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
            
        ],
    ]) ?>

</div>
