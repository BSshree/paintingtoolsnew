<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Modal;

$this->title ='Wall Dressup - Designer walls';
?>
<section class="slider-cont inner-page-heading">
  <div class="container">
    <h1>Designers Wall</h1>
  </div>
</section>
<section class="general-painting1 designers-wall-cont">
  <div class="container">
    <div class="row">
      <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 heading1" id="1">
        <h2> Designers Wall Products</h2>
        <span> Decorate your walls</span> 
        
        
        </div>
      <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-lg-6 col-xl-6 designers-wall-thumb">
        <div class="general-painting-service1"> <a href=""> <img src="themes/site_theme/images/vastu-murals.jpg"  alt=""> </a>
          <div class="gp-txt1">
            <h2> vastu murals </h2>
            <p class="designerwalls-txt"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra nibh a augue vehicula tristique. Suspendisse vestibulum nisl quis elementum luctus. Donec dictum eget dolor vitae vehicula. Morbi sit amet ante in diam elementum iaculis eget sed sem. Etiam aliquam suscipit lacinia. Aenean odio tortor, facilisis vel tellus sed, malesuada imperdiet lacus.  </p>
            <p> <a href="#" class="btn btn1 btn1-1" data-toggle="modal" data-servicename="Designer walls" data-target="#Bookanotp"> Book Now ! </a> </p>
          </div>
        </div>
      </div>
      
      
      <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-lg-6 col-xl-6 designers-wall-thumb">
        <div class="general-painting-service1"> <a href=""> <img src="themes/site_theme/images/kerala-murals.jpg"  alt=""> </a>
          <div class="gp-txt1">
            <h2> Kerala murals </h2>
            <p class="designerwalls-txt"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra nibh a augue vehicula tristique. Suspendisse vestibulum nisl quis elementum luctus. Donec dictum eget dolor vitae vehicula. Morbi sit amet ante in diam elementum iaculis eget sed sem. Etiam aliquam suscipit lacinia. Aenean odio tortor, facilisis vel tellus sed, malesuada imperdiet lacus.  </p>
            <p> <a href="#" class="btn btn1 btn1-1" data-toggle="modal" data-servicename="Designer walls" data-target="#Bookanotp"> Book Now ! </a> </p>
          </div>
        </div>
      </div>
      
    </div>
  </div>
</section>


<div class="inner-gallery-cont">
  <div class="container">
    <div class="row">
      <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 heading1">
        <h2>Designers Wall gallery </h2>
      </div>
      <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
         <div class="owl-carousel owl-theme" id="inner-gallery-carousel">
        
          <!--<div class="item"> <img src="themes/site_theme/images/godd.jpg"  alt=""></div>-->
          <div class="item"> <img src="themes/site_theme/images/three.png"  alt=""></div>
          <div class="item"> <img src="themes/site_theme/images/v2.jpg"  alt=""></div>
            <div class="item"> <img src="themes/site_theme/images/one.png"  alt=""></div>
          <div class="item"> <img src="themes/site_theme/images/two.png"  alt=""></div>
          <!--<div class="item"> <img src="themes/site_theme/images/kerala-murals.jpg"  alt=""></div>-->
        </div>
      </div>
    </div>
  </div>
</div>

<?php echo $this->render('@frontend/modules/site/views/partials/inner_testimonials'); ?> 