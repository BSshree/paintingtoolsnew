<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Sms */

$this->title = 'Create Receipt';
$this->params['breadcrumbs'][] = $this->title;
?>

    <?= $this->render('_form', [
        'model' => $model,
        'session_otp' => $session_otp,
        
    ]) ?>

    

