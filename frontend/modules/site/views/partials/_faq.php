<?php
use yii\bootstrap\Modal;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\ActiveForm;
?>
<section class="home-faq-cont">
  <div class="container">
    <div class="row">
      <div class="col-12 col-sm-12 col-md-6 col-lg-5 col-xl-5 home-contact-form">
        <div class="contact-form-cont">
          <div class="contact-form-heading">
            <h5> Request a  quote </h5>
            <span> Fill out the form below and get a free quote today.</span> </div>
            
            
            <form  id="formvalidate"  name="myForm" class="formValidate" method="post" action="">
          <div class="form-group">
              <input name="name" type="text" class="form-control" placeholder="Name" >
          </div>
          <div class="form-group">
            <input name="email" type="text" class="form-control" placeholder="Email" >
          </div>
          <div class="form-group">
            <input name="phone" type="text" class="form-control" placeholder="Phone">
          </div>
          <div class="form-group">
            <textarea name="mess" cols="" rows="" class="form-control msg" placeholder="Message"></textarea>
          </div>
          <div class="form-group text-center">
           <?php //echo $this->render('@frontend/modules/site/views/site/requestquote'); ?> 
                <?=  Html::submitButton('Send Message', ['class' => 'btn contact-btn1 contact-btn2']) ?>
              <!--<input type="submit" id="submit" name="submit" class="btn contact-btn1 contact-btn2" value="Send Message" >-->
          </div>
            </form>
        </div>
      </div>
      <div class="col-12 col-sm-12 col-md-6 col-lg-7 col-xl-6 faq-cont offset-xl-1 "> <span> HAVE SOME QUESTIONS? </span>
        <h5> Frequently asked questions </h5>
        
        <!-- Accordion begin -->
        <div class="accordion_example1 smk_accordion acc_with_icon"> 
          
          <!-- Section 1 -->
          <div class="accordion_in ">
            <div class="acc_head">
              <div class="acc_icon_expand"></div>
              Aliquam tincidunt mauris eu risus? </div>
            <div class="acc_content" style="display: none;">
              <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus hendrerit. Pellentesque aliquet nibh nec urna. In nisi neque, aliquet vel, dapibus id, mattis vel, nisi.</p>
            </div>
          </div>
          
          <!-- Section 2 -->
          <div class="accordion_in">
            <div class="acc_head">
              <div class="acc_icon_expand"></div>
              Vestibulum auctor dapibus neque? </div>
            <div class="acc_content" style="display: none;">
              <p>Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu 
                fugiat nulla pariatur.</p>
            </div>
          </div>
          
          <!-- Section 3 -->
          <div class="accordion_in ">
            <div class="acc_head">
              <div class="acc_icon_expand"></div>
              Cras ornare tristique elit? </div>
            <div class="acc_content" style="display: block;">
              <p>Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
          </div>
          
          <!-- Section 4 -->
          <div class="accordion_in ">
            <div class="acc_head">
              <div class="acc_icon_expand"></div>
              Cras ornare tristique elit? </div>
            <div class="acc_content" style="display: block;">
              <p>Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
          </div>
          
          <!-- Section 5 -->
          <div class="accordion_in ">
            <div class="acc_head">
              <div class="acc_icon_expand"></div>
              Cras ornare tristique elit? </div>
            <div class="acc_content" style="display: block;">
              <p>Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
$requestquote = Yii::$app->getUrlManager()->createUrl("site/site/ajaxrequestquote");
//echo '<pre>';print_r($requestquote); exit;   
$script = <<< JS

  
        
   
JS;
$this->registerJs($script, View::POS_END);
?>
