<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\SmsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Receipt';
$this->params['breadcrumbs'][] = $this->title;
?>

<section class="content">
<div class="sms-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

     <div class="col-md-12">
            <div class="row">
                <div class="pull-right">
        <?= Html::a('Create Receipt', ['create'], ['class' => 'btn btn-success']) ?>
     </div>
            </div>
        </div>
    <div class="col-lg-12 col-md-12">&nbsp;</div>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-body">
                        
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'email:email',
            'phone',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
                     </div>
                </div>
            </div>
    </div>
</section>
