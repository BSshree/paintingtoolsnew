<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Faq */

$this->title = $model->faq_id;
$this->params['breadcrumbs'][] = ['label' => 'Faqs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="faq-view">


    <p>
        <?php //Html::a('Update', ['update', 'id' => $model->faq_id], ['class' => 'btn btn-primary']) ?>
        <?php //Html::a('Delete', ['delete', 'id' => $model->faq_id], [
//            'class' => 'btn btn-danger',
//            'data' => [
//                'confirm' => 'Are you sure you want to delete this item?',
//                'method' => 'post',
//            ],
//        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'faq_id',
            'question:ntext',
            'answer:ntext',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
