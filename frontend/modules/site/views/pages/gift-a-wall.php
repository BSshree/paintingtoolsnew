<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Modal;

$this->title ='Wall Dressup - Gift a wall';
?>
<section class="slider-cont inner-page-heading">
  <div class="container">
    <h1> Gift a wall </h1>
  </div>
</section>
<section class="pricing-cont1">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-10 col-xl-12 offset-lg-1 offset-xl-0 sub-heading1">
                <h2> Gift a wall to your loved ones and give them a memory to cherish for a lifetime! </h2>
            </div>
            <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-lg-4 col-xl-4">
                <div class="pricing-deatils1">
                    <div class="pricing-deatils-color1"> <span> Baby Plan </span> <br/>
                        <strong> 20K </strong><br/>
                        <small> Per service </small> </div>
                    <div class="pricing-feature-list">
                        <ul>
                            <li> Pre - paint site inspection </li>
                            <li> Professional advise </li>
                            <li> Care assured for your furniture </li>
                            <li> 1 year warranty for paint defects <br/>
                                <small> Term & Condition apply</small> </li>
                        </ul>
                    </div>
                    <div class="text-center book-btn-cont">
                        <a href="#" class="book-btn" data-toggle="modal" data-target="#Bookanotp" id="book1"> Book Now !</a>
            <?php //Html::button('Book Now !', ['value'=>Url::to('/bookotp'),'class' => 'book-btn  modalButton']) ?>
             </div>   </div>
            </div>
            <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-lg-4 col-xl-4">
                <div class="pricing-deatils1 pricing-deatils2">
                    <div class="best-plan"> Best Plan </div>
                    <div class="pricing-deatils-color1 pricing-deatils-color2"> <span> Big Head Plan </span> <br/>
                        <strong> 30K </strong><br/>
                        <small> Per service </small> </div>
                    <div class="pricing-feature-list">
                        <ul>
                            <li> Pre - paint site inspection </li>
                            <li> Professional advise </li>
                            <li> Care assured for your furniture </li>
                            <li> 1 year warranty for paint defects <br/>
                                <small> Term & Condition apply</small> </li>
                        </ul>
                    </div>
                    <div class="text-center book-btn-cont"> 
                      <a href="#" class="book-btn" data-toggle="modal" data-target="#Bookanotp" id="book2"> Book Now !</a>
                        <!--<a href="#" class="book-btn"> Book Now !</a>-->
                     <?php // Html::button('Book Now !', ['value'=>Url::to('/bookotp'),'class' => 'book-btn modalButton']) ?>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-lg-4 col-xl-4">
                <div class="pricing-deatils1">
                    <div class="pricing-deatils-color1 pricing-deatils-color3"> <span>Dummy Plan</span> <br/>
                        <strong> 20K </strong><br/>
                        <small> Per service </small> </div>
                    <div class="pricing-feature-list">
                        <ul>
                            <li> Pre - paint site inspection </li>
                            <li> Professional advise </li>
                            <li> Care assured for your furniture </li>
                            <li> 1 year warranty for paint defects <br/>
                                <small> Term & Condition apply</small> </li>
                        </ul>
                    </div>
                    <div class="text-center book-btn-cont">
                    <a href="#" class="book-btn" data-toggle="modal" data-target="#Bookanotp" id="book3"> Book Now !</a>
                    <?php // Html::button('Book Now !', ['value'=>Url::to('/bookotp'),'class' => 'book-btn  modalButton']) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</section>
<?php echo $this->render('@frontend/modules/site/views/partials/_gift_a_wall_gallery'); ?> 
<?php echo $this->render('@frontend/modules/site/views/partials/inner_testimonials'); ?> 
