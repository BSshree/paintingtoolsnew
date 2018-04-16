<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Testimonials */

$this->title = "View Testimonials";
$this->params['breadcrumbs'][] = ['label' => 'Testimonials', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="testimonials-view">

    <h1><?php // Html::encode($this->title) ?></h1>

    <p>
        <?php // Html::a('Update', ['update', 'id' => $model->test_id], ['class' => 'btn btn-primary']) ?>
        <?php // Html::a('Delete', ['delete', 'id' => $model->test_id], [
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
            'test_id',
            'statement:ntext',
            'name:ntext',
//            'created_at',
//            'updated_at',
        ],
    ]) ?>

</div>
