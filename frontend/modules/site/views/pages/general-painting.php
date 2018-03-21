<?php
use yii\helpers\Html;
use yii\bootstrap\Modal;
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title ='Wall Dressup - General Painting';
?>
<section class="slider-cont inner-page-heading">
  <div class="container">
    <h1>General Painting </h1>
  </div>
</section>
<section class="general-painting1">
  <div class="container">
    <div class="row">
      <div class="col-12 col-sm-12  col-md-12 col-lg-10 col-xl-10 offset-lg-1  offset-xl-1">
        <div class="inner-tab-cont">
          <ul>
            <li> <a href="#1"> <img src="themes/site_theme/images/tab-icon1.png" alt=""> <span> Services </span> </a> </li>
            <li><a href="#2"><img src="themes/site_theme/images/tab-icon2.png" alt=""> <span>Features </span></a> </li>
            <li> <a href="#3"><img src="themes/site_theme/images/tab-icon3.png" alt=""> <span>Pricing </span></a> </li>
          </ul>
        </div>
      </div>
      <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 heading1" id="1">
        <h2> Services</h2>
        <span> General Painting Services </span> </div>
      <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-lg-4 col-xl-4">
        <div class="general-painting-service1"> <a href="#"> <img src="themes/site_theme/images/general-painting-1.jpg"  alt=""> </a>
          <div class="gp-txt1">
            <h2> Interior 
              Wall Paints </h2>
            <p> Lorem ipsum dolor sit amet, 
              consectetur adipiscing elit. Sed vel fringilla magna.</p>
            <p> <a href="" class="btn btn1 btn1-1"> Explore </a> </p>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-lg-4 col-xl-4">
        <div class="general-painting-service1"> <a href="#"> <img src="themes/site_theme/images/general-painting-2.jpg"  alt=""> </a>
          <div class="gp-txt1">
            <h2> Exterior 
              wall paints </h2>
            <p> Lorem ipsum dolor sit amet, 
              consectetur adipiscing elit. Sed vel fringilla magna.</p>
            <p> <a href="" class="btn btn1 btn1-1"> Explore </a> </p>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-lg-4 col-xl-4">
        <div class="general-painting-service1"> <a href="#"> <img src="themes/site_theme/images/general-painting-3.jpg"  alt=""> </a>
          <div class="gp-txt1">
            <h2>Metal
              enamel paints </h2>
            <p> Lorem ipsum dolor sit amet, 
              consectetur adipiscing elit. Sed vel fringilla magna.</p>
            <p> <a href="" class="btn btn1 btn1-1"> Explore </a> </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<div class="gp-features-cont" id="2">
  <div class="container">
    <div class="row">
      <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 heading1">
        <h2> Features</h2>
        <span>Lorem ipsum dolor amet, consectetur </span> </div>
      <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-lg-3 col-xl-3 gp-feature1">
        <p> <img src="themes/site_theme/images/gp-feature1.png" alt=""></p>
        <p> Suspendisse et 
          volutpat massa </p>
      </div>
      <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-lg-3 col-xl-3 gp-feature1">
        <p> <img src="themes/site_theme/images/gp-feature2.png" alt=""></p>
        <p> Proin sed eros <br/>
          vitae dolor </p>
      </div>
      <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-lg-3 col-xl-3 gp-feature1">
        <p> <img src="themes/site_theme/images/gp-feature3.png" alt=""></p>
        <p> Nam semper <br/>
          eleifend est </p>
      </div>
      <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-lg-3 col-xl-3 gp-feature1">
        <p> <img src="themes/site_theme/images/gp-feature3.png" alt=""></p>
        <p>Phasellus <br/>
          vitae nibh vel</p>
      </div>
    </div>
  </div>
</div>
<section class="gp-features-pricing-cont" id="3">
  <div class="container">
    <div class="row">
      <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 heading1">
        <h2> Pricing</h2>
        <span>Lorem ipsum dolor amet, consectetur </span> </div>
      <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 gp-pricing-tab">
        <ul class="nav nav-pills mb-4 mt-2 justify-content-center" id="pills-tab" role="tablist">
          <li class="nav-item"> <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-1" role="tab" aria-controls="pills-1" aria-selected="true">Asian paints</a> </li>
          <li class="nav-item"> <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-2" role="tab" aria-controls="pills-2" aria-selected="false">Nerolac paints</a> </li>
          <li class="nav-item"> <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-3" role="tab" aria-controls="pills-3" aria-selected="false">Berger paints</a> </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-1" role="tabpanel" aria-labelledby="pills-home-tab">
            <div class="row">
              <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-lg-3 col-xl-3">
                <div class="gp-pricing-deatils">
                  <div class="gp-pricing-name"> Plan Name1 </div>
                  <div class="gp-pricing-txt">
                    <h5> 10K <br/>
                      <span> Per service</span> </h5>
                    <p> Duis aute irure dolor in reprehen derit in voluptate velit esse cillum dolore eu fugiat Excepteur sint </p>
                  </div>
                </div>
              </div>
              <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-lg-3 col-xl-3">
                <div class="gp-pricing-deatils">
                  <div class="gp-pricing-name"> Plan Name2 </div>
                  <div class="gp-pricing-txt">
                    <h5> 20K <br/>
                      <span> Per service</span> </h5>
                    <p> Duis aute irure dolor in reprehen derit in voluptate velit esse cillum dolore eu fugiat Excepteur sint </p>
                  </div>
                </div>
              </div>
              <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-lg-3 col-xl-3">
                <div class="gp-pricing-deatils">
                  <div class="gp-pricing-name"> Plan Name3 </div>
                  <div class="gp-pricing-txt">
                    <h5> 30K <br/>
                      <span> Per service</span> </h5>
                    <p> Duis aute irure dolor in reprehen derit in voluptate velit esse cillum dolore eu fugiat Excepteur sint </p>
                  </div>
                </div>
              </div>
              <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-lg-3 col-xl-3">
                <div class="gp-pricing-deatils">
                  <div class="gp-pricing-name"> Plan Name4 </div>
                  <div class="gp-pricing-txt">
                    <h5> 40K <br/>
                      <span> Per service</span> </h5>
                    <p> Duis aute irure dolor in reprehen derit in voluptate velit esse cillum dolore eu fugiat Excepteur sint </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="pills-2" role="tabpanel" aria-labelledby="pills-profile-tab">
            <div class="row">
              <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-lg-3 col-xl-3">
                <div class="gp-pricing-deatils">
                  <div class="gp-pricing-name"> Plan Name1 </div>
                  <div class="gp-pricing-txt">
                    <h5> 40K <br/>
                      <span> Per service</span> </h5>
                    <p> Duis aute irure dolor in reprehen derit in voluptate velit esse cillum dolore eu fugiat Excepteur sint </p>
                  </div>
                </div>
              </div>
              <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-lg-3 col-xl-3">
                <div class="gp-pricing-deatils">
                  <div class="gp-pricing-name"> Plan Name2 </div>
                  <div class="gp-pricing-txt">
                    <h5> 30K <br/>
                      <span> Per service</span> </h5>
                    <p> Duis aute irure dolor in reprehen derit in voluptate velit esse cillum dolore eu fugiat Excepteur sint </p>
                  </div>
                </div>
              </div>
              <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-lg-3 col-xl-3">
                <div class="gp-pricing-deatils">
                  <div class="gp-pricing-name"> Plan Name3 </div>
                  <div class="gp-pricing-txt">
                    <h5> 20K <br/>
                      <span> Per service</span> </h5>
                    <p> Duis aute irure dolor in reprehen derit in voluptate velit esse cillum dolore eu fugiat Excepteur sint </p>
                  </div>
                </div>
              </div>
              <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-lg-3 col-xl-3">
                <div class="gp-pricing-deatils">
                  <div class="gp-pricing-name"> Plan Name4 </div>
                  <div class="gp-pricing-txt">
                    <h5> 10K <br/>
                      <span> Per service</span> </h5>
                    <p> Duis aute irure dolor in reprehen derit in voluptate velit esse cillum dolore eu fugiat Excepteur sint </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="pills-3" role="tabpanel" aria-labelledby="pills-contact-tab">
            <div class="row">
              <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-lg-3 col-xl-3">
                <div class="gp-pricing-deatils">
                  <div class="gp-pricing-name"> Plan Name1 </div>
                  <div class="gp-pricing-txt">
                    <h5> 40K <br/>
                      <span> Per service</span> </h5>
                    <p> Duis aute irure dolor in reprehen derit in voluptate velit esse cillum dolore eu fugiat Excepteur sint </p>
                  </div>
                </div>
              </div>
              <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-lg-3 col-xl-3">
                <div class="gp-pricing-deatils">
                  <div class="gp-pricing-name"> Plan Name2 </div>
                  <div class="gp-pricing-txt">
                    <h5> 30K <br/>
                      <span> Per service</span> </h5>
                    <p> Duis aute irure dolor in reprehen derit in voluptate velit esse cillum dolore eu fugiat Excepteur sint </p>
                  </div>
                </div>
              </div>
              <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-lg-3 col-xl-3">
                <div class="gp-pricing-deatils">
                  <div class="gp-pricing-name"> Plan Name3 </div>
                  <div class="gp-pricing-txt">
                    <h5> 20K <br/>
                      <span> Per service</span> </h5>
                    <p> Duis aute irure dolor in reprehen derit in voluptate velit esse cillum dolore eu fugiat Excepteur sint </p>
                  </div>
                </div>
              </div>
              <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-lg-3 col-xl-3">
                <div class="gp-pricing-deatils">
                  <div class="gp-pricing-name"> Plan Name4 </div>
                  <div class="gp-pricing-txt">
                    <h5> 10K <br/>
                      <span> Per service</span> </h5>
                    <p> Duis aute irure dolor in reprehen derit in voluptate velit esse cillum dolore eu fugiat Excepteur sint </p>
                  </div>
                </div>
              </div>
            </div>
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
        <h2> General painting gallery </h2>
      </div>
      <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="owl-carousel owl-theme" id="inner-gallery-carousel">
          <div class="item"> <img src="themes/site_theme/images/0XVBNmMJHDb_9f8afe751acd73161c8774067551e067.jpg"  alt=""></div>
          <div class="item"> <img src="themes/site_theme/images/3BHK-DUPLEX-HOUSE-349031-149084.jpg"  alt=""></div>
          <div class="item"> <img src="themes/site_theme/images/5b.jpg"  alt=""></div>
          <div class="item"> <img src="themes/site_theme/images/6.jpg"  alt=""></div>
          <!--<div class="item"> <img src="themes/site_theme/images/88124867T-1507023474.jpeg"  alt=""></div>-->
          <!--<div class="item"> <img src="themes/site_theme/images/13902878300Elevation.JPG"  alt=""></div>-->
          <!--<div class="item"> <img src="themes/site_theme/images/baikunth-elevation-1382899.jpeg"  alt=""></div>-->
        </div>
      </div>
    </div>
  </div>
</div>
<?php echo $this->render('@frontend/modules/site/views/partials/inner_testimonials'); ?> 

<div class="pricing-calculator-btn"> <a href="/general-painting-calculator">
  <img src="themes/site_theme/images/pricing-calculator-btn.png" alt="" class="pc1"> </a>
  <a href="/general-painting-calculator"> 
  <img src="themes/site_theme/images/pricing-calculator-btn2.png" alt="" class="pc2"> </a>
</div>


