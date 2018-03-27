<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
use yii\bootstrap\Modal;
?>
<header>
  <div class="header-row1">
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-12  col-md-4 col-lg-4 col-xl-4 logo"> <img src="themes/site_theme/images/logo.png"  alt=""></div>
        <div class="col-12 col-sm-12 col-md-8 col-lg-7 col-xl-6 header-right offset-xl-2 offset-lg-1">
          <div class="top-btn-cont">
               <!--<a href="#" data-toggle="modal" data-target="#exampleModalCenter">--> 
            <?php // Html::button('Book An Appointment', ['value'=>Url::to('/bookotp'),'class' => 'btn contact-btn1 modalButton', 'data-toggle'=>'modal', 'data-target'=>'#exampleModalCenter']) ?>
                 <!--</a>-->              
            <a href="#" class="btn contact-btn1" data-toggle="modal" data-target="#Bookanotp"><i class="fas fa-pencil-alt fa-flip-horizontal"></i> Book An Appointment </a>     
                <a href="" class="btn contact-btn1 contact-btn2 dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-map-marker-alt"></i> Operational In </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item operational-back" href="#"><i class="fas fa-map-marker-alt"></i> Madurai</a>
                  <a class="dropdown-item operational-back" href="#"><i class="fas fa-map-marker-alt"></i> Coimbatore</a>
                </div>
            </div>
          <div class="top-contact"> <span> <i class="fas fa-phone fa-flip-horizontal"></i> Call Us Now ! </span> (364) 106-7572 </div>
        </div>
      </div>
    </div>
  </div>
  <div class="header-row2">
    <div class="container">
      <nav id='cssmenu'>
        <div id="head-mobile"> Menu</div>
        <div class="button"></div>
        <ul class="main-menu">
          <li class="active"><a href="/" title="Home">Home</a> </li>
          <li><a href="#">What We do </i></a>
            <ul>
              <li> <a href="gift-a-wall">Gift a wall</a> </li>
              <li> <a href="general-painting">General painting </a> </li>  
              <li> <a href="designer-walls">Designer walls </a> </li>
              <li> <a href="wallpapers">Wallpapers </a> </li>
              <li><a href="royale-play"> Royale play </a> </li>
              <li> <a href="home-makeover">Home makeover</a> </li>
              <li> <a href="potraits-statues-murals">Potraits/Statues/Murals</a> </li>
              <li> <a href="concept-walls">Concept walls</a> </li>
            </ul>
          </li>
          <li><a href="#"> Testimonials </a> </li>
          <!--<li><a href="#">gallery </a> </li>-->
          <li><a href="#"> faq </a> </li>
          <li><a href="#"> Contact us </a> </li>
        </ul>
      </nav>
    </div>
  </div>
</header>
<!-- Modal -->
<div class="modal fade bd-example-modal-lg pricingcalc1" id="Bookanotp" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLongTitle">Book An Appointment</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
    </div>
    <div class="modal-body">
<!--      <div class="form-group ">
        <div class="row mb-4">
          <div class="col-12 col-sm-5 col-md-3 col-lg-3 col-xl-2">
            <label> Phone number </label>
          </div>
          <div class="col-12 col-sm-5 col-md-4 col-lg-4 col-xl-4">
            <input name="" type="text" class="form-control">
          </div>
        </div>
      </div>-->
     <?php
     $model = new common\models\Sms();
     echo $this->render('@frontend/modules/site/views/site/bookotp',['model'=>$model]); ?> 
    </div>
   </div>
</div>
</div>
<?php

$script = <<< JS
        
$(document).ready(function(){
  $(window).scroll(function(){
  	var scroll = $(window).scrollTop();
	  if (scroll > 10) {
	    $(".header-row2").css("background" , "#D3D3D3");
	  }

	  else{
		  $(".header-row2").css("background" , "white");  	
	  }
  })
})
        
JS;
$this->registerJs($script, View::POS_END);
?>
