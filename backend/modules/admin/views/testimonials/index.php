<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\TestimonialsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Testimonials';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="testimonials-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="col-md-12">
            <div class="row">
                <div class="pull-right">
                         <?= Html::a('Add Testimonials', ['create'], ['class' => 'btn btn-success']) ?>
                </div>
            </div>
        </div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
         //   ['class' => 'yii\grid\SerialColumn'],

            'test_id',
            'statement:ntext',
            'name:ntext',
            //'created_at',
          //  'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
