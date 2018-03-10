<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;
use yii\widgets\DetailView;
?>
<section class="slider-cont inner-page-heading">
  <div class="container">
    <h1>Home Makeover </h1>
  </div>
</section>
<section class="homemake-over">
  <div class="container">
    <div class="row">
         <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-lg-4 col-xl-4">
        <div class="make-overthumb-cont make-overthumb-cont3">
          <div class="make-overt-paln-heading">
            <p>Hatchling Plan </p>
            <p class="make-over-price"> <span> ₹  3000</span></p>
            <p> <small> Per Room </small></p>
          </div>
          <div class="make-over-thumb-img"> <img src="themes/site_theme/images/home-make-over3.jpg"  alt=""></div>
        <div class="gp-txt2">
            <p><b>
                        
              *  Professional consulting<br>
              *  Placement of furniture<br>
              *  Colour schemes

                </b></p>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-lg-4 col-xl-4">
        <div class="make-overthumb-cont">
          <div class="make-overt-paln-heading">
            <p>Baby Plan </p>
            <p class="make-over-price"> <span> ₹  6000</span></p>
            <p> <small> Per Room </small></p>
          </div>
          <div class="make-over-thumb-img"> <img src="themes/site_theme/images/home-make-over.jpg"  alt=""></div>
         <div class="gp-txt2">
             <p><b>
                    * Includes Hatchling Plan Features<br>
                    *   Curtain ideas<br>
                    *  Furniture detailed images<br>
                   * Wall consulting  
             
                </b></p>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-lg-4 col-xl-4">
        <div class="make-overthumb-cont make-overthumb-cont2">
          <div class="make-overt-paln-heading">
            <p>Transfomers Plan </p>
            <p class="make-over-price"> <span> ₹  10,000</span></p>
            <p> <small> Per Room </small></p>
          </div>
          <div class="make-over-thumb-img"> <img src="themes/site_theme/images/home-make-over2.jpg"  alt=""></div>
        <div class="gp-txt2">
            <p><b>
                    * Includes Baby Plan Features<br>
                    *  Furniture sketch<br>
                    * Room transformation sketch<br>
             
                </b></p>
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
        <h2> Home make over gallery </h2>
      </div>
      <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="owl-carousel owl-theme" id="inner-gallery-carousel">
          <div class="item"> <img src="themes/site_theme/images/gallery1.jpg"  alt=""></div>
          <div class="item"> <img src="themes/site_theme/images/gallery2.jpg"  alt=""></div>
          <div class="item"> <img src="themes/site_theme/images/gallery3.jpg"  alt=""></div>
          <div class="item"> <img src="themes/site_theme/images/gallery4.jpg"  alt=""></div>
          <div class="item"> <img src="themes/site_theme/images/gallery5.jpg"  alt=""></div>
          <div class="item"> <img src="themes/site_theme/images/gallery6.jpg"  alt=""></div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php echo $this->render('@frontend/modules/site/views/partials/inner_testimonials'); ?> 

<div class="pricing-calculator-btn"><a href="/home-makeover-calculator" > 
     <img src="themes/site_theme/images/pricing-calculator-btn.png" alt="" class="pc1"></a>
     <a href="/home-makeover-calculator" >
     <img src="themes/site_theme/images/pricing-calculator-btn2.png" alt="" class="pc2"> </a>
</div>

<!-- Modal -->


