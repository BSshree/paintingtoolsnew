<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel common\models\FaqSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'FAQs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="faq-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <p>      <?= Html::button('Book An Appointment', ['value'=>Url::to('bookotp'),'class' => 'btn btn-success','id' =>'modalButton']) ?> </p>
 <?php
    Modal::begin([
        'header' =>'<h4>Book An Appointment</h4>',
        'id' => 'modal',
        'size' =>'modal-lg',
        
    ]);
    echo "<div id='modalContent'></div>";
    Modal::end();
    ?>
    <div class="col-md-12">
            <div class="row">
                <div class="pull-right">
                          <?= Html::a('Add FAQ', ['create'], ['class' => 'btn btn-success']) ?>
                </div>
            </div>
        </div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
//          /  ['class' => 'yii\grid\SerialColumn'],

            'faq_id',
            'question:ntext',
            'answer:ntext',
            ['class' => 'yii\grid\ActionColumn'],
                                             ],
                                  ]); 
            ?>
</div>
