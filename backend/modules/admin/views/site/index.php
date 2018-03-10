<?php
/* @var $this yii\web\View */

//$this->title = 'Painting Tools';
use yii\helpers\Html;
use yii\web\View;
?>

<section class="content-header">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">

<!--                    <p color="yellow"  > <span class="info-box-text"><a href="/webpanel/admin/receipt/create">
                                <h1 class="btn btn-success"><i>Receipts</i></h1></a></span></p>-->
                    <i> <?= Html::a('GENERATE RECEIPT', ['receipt/create'], ['class'=>'btn btn-success ']) ?></i>
                    <span class="info-box-number"> </span>
                </div>
            </div>
        </div>
    </div>
</section>