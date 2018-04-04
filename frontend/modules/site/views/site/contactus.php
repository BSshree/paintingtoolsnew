<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = 'Wall Dressup- Contact us';
?>

<section class="slider-cont inner-page-heading">
  <div class="container">
    <h1> Get In Touch</h1>
  </div>
</section>
<section class="home-faq-cont">
  <div class="container">
    <div class="row">
      <div class="col-12 col-sm-12 col-md-6 col-lg-5 col-xl-5 home-contact-form">
        <div class="contact-form-cont">
          <div class="contact-form-heading">
            <h5>Contact us </h5>
            <span> We will get back to you soon.</span> </div>
            
            
        <form  id="contactus"  name="contactus" class="contactus" method="post" action="">
          <div class="form-group">
              <input name="name" id="cont-name" type="text" class="form-control" placeholder="Name" >
          </div>
          <div class="form-group">
            <input name="email" id="cont-email"  type="text" class="form-control" placeholder="Email" >
          </div>
          <div class="form-group">
            <input name="phone" id="cont-phone"  type="text" class="form-control" placeholder="Phone">
          </div>
          <div class="form-group"> 
            <textarea name="mess" id="cont-mess" cols="" rows="" class="form-control msg" placeholder="Message"></textarea>
          </div>
         
            <div class="form-group">
             <div class="g-recaptcha recaptx" data-sitekey="6LdCZU4UAAAAAFo-L00-OjH_qF-0J_I67y_5LpUC"></div>
                <!--<input class="form-control d-none" name="recapt" data-recaptcha="true" required data-error="Please complete the Captcha">-->
                <input type="hidden" class="hiddenRecaptcha required form-control" name="hiddenRecaptcha" id="hiddenRecaptcha-contact">
                <!--<div class="error"></div>-->
          </div>
            <div class="form-group text-center"><br>
              <input type="submit" id="cont-submit" name="submit" class="btn contact-btn1 contact-btn2" value="Submit" >
          </div>
           <div class="form-group cont-show" style="display:none">
            <!--<div class="row mb-4">-->
                <!--<div class="col-3">-->
                <div class="form-group " >
                  <p id="successcont"> </p>  
                </div>
                    <div class="loading-image1"><img src="themes/site_theme/images/re.gif" width="8%" height="8%" alt=""> </div>
                <!--</div>-->
            <!--</div>-->
            </div>
        </form>
        </div>
      </div>
      <div class="col-12 col-sm-12 col-md-6 col-lg-7 col-xl-6 faq-cont offset-xl-1 "> 
       
          <div class="contact-map-heading"><h5> GET IN TOUCH</h5></div>
     <iframe  style=" border:groove;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15722.77289371522!2d78.01493301333046!3d9.876084186423245!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3b00ce068662a4ef%3A0xd8ca7406b8ebb4af!2sThoppur%2C+Tamil+Nadu+625008!5e0!3m2!1sen!2sin!4v1522499694178" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
      </div>
    </div>
  </div>
</section>
