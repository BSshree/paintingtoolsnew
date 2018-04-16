<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Testimonials */

$this->title = 'Update Testimonials';
$this->params['breadcrumbs'][] = ['label' => 'Testimonials', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->test_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="testimonials-update">

    <h1><?php // Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
