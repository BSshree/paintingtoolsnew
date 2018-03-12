<?php

use yii\bootstrap\Modal;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\ActiveForm;
?>
<footer class="footer-cont">
  <div class="footer-row1">
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 footer-part1">
          <h6> About us</h6>
          <p> <img src="themes/site_theme/images/footer-logo.png"  alt=""></p>
          <p> Lorem ipsum dolor sit amet, 
            consectetur adipiscing elit. Fusce luctus maximus rutrum. Vestibulum ligula erat, mattis eget</p>
          <p><a href="#" class="btn btn1"> Read More </a> </p>
        </div>
        <div class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-8 offset-xl-1">
          <div class="row">
            <div class="col-6 col-sm-3 col-md-4 col-lg-4 col-xl-4 footer-part1">
              <h6> About us</h6>
              <ul>
                <li><a href="#"> Home </a></li>
                <li><a href="#"> Whate We do </a></li>
                <li><a href="#"> Testimonials </a></li>
                <li><a href="#"> Gallery </a></li>
                <li><a href="#"> Faq </a></li>
                <li><a href="#"> Contact us</a></li>
              </ul>
            </div>
            <div class="col-6 col-sm-4 col-md-4 col-lg-4 col-xl-4 footer-part1">
              <h6> WHAT WE DO</h6>
              <ul>
                <li><a href="/gift-a-wall">Gift a wall</a></li>
                <li><a href="/general-painting">General Painting</a></li>
                <li><a href="#">Designer Walls</a></li>
                <li><a href="#">Wallpapers</a></li>
                <li><a href="/royale-play">Royale Play</a></li>
                <li><a href="/home-makeover">Home Makeovers</a></li>
                <li><a href="#">Potraits </a></li>
                <li><a href="#">Statues </a></li>
                <li><a href="#">Metal Murals</a></li>
              </ul>
            </div>
            <div class="col-12 col-sm-5 col-md-4 col-lg-4 col-xl-4 footer-part1">
              <h6>Get in touch</h6>
              <p><i class="fas fa-map-marker-alt"></i> 58, Thomson Street, Edison Avenue, Baltimore, USA </p>
              <p> <i class="fas fa-phone fa-flip-horizontal"></i> (364) 106-7572 </p>
              <p> <i class="fas fa-envelope"></i> <a href="mailto:support@walldressup.com">support@walldressup.com</a> </p>
              <p class="social-links"> <a href="#" target="_blank"><i class="fab fa-facebook-square"></i></a> <a href="#" target="_blank"><i class="fab fa-twitter-square"></i></a> <a href="#" target="_blank"><i class="fab fa-google-plus-square"></i></a> <a href="#" target="_blank"> <i class="fab fa-youtube-square"></i> </a> </p>
              <p> <a href="https://www.houzz.in/pro/walldressup/walldressupcom"> <img src="themes/site_theme/images/houzz.jpg"  alt=""> </a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="footer-row2">
    <div class="container"> Copyright  © 2018 walldressup.com.  All Rights Reserved . Developed by Sumanas Technologies | Website development company in India.</div>
    <input type='hidden' name='slug-name' id='slug-id'>
  </div>
</footer>
<?php
//$script = <<< JS
//        
//        $(document).ready(function () {
//        
//        
//        
//        });
//JS;
//$this->registerJs($script, View::POS_END);
?>
<?php
$sendotp = Yii::$app->getUrlManager()->createUrl("site/site/ajaxbookotp");
//echo '<pre>';print_r($sendotp); exit;   
$script = <<< JS

 $(document).ready(function () {
        

    var navListItems = $('div.setup-panel div a'),
        allWells = $('.setup-content'),
        allNextBtn = $('.nextBtn'),
        allPrevBtn = $('.prevBtn');

    allWells.hide();

    navListItems.click(function (e) {
        e.preventDefault();
        var _target = $($(this).attr('href')),
            _item = $(this);
        var nextStepWizard = $(this).text();
        
        if(nextStepWizard == 1)
            $('.stepwizard .progress-bar').animate({width:'0%'},0);
        if(nextStepWizard == 2)
            $('.stepwizard .progress-bar').animate({width:'33%'},0);
        if(nextStepWizard == 3)
            $('.stepwizard .progress-bar').animate({width:'66%'},0);
        if(nextStepWizard == 4)
            $('.stepwizard .progress-bar').animate({width:'100%'},0);
        

        if (!_item.hasClass('disabled')) {
            navListItems.removeClass('btn-success').addClass('btn-default');
            //navListItems.addClass('btn-default');
            _item.addClass('btn-success');
            allWells.hide();
            _target.show();
            _target.find('input:eq(0)').focus();
        }
    });

    
    allPrevBtn.click(function () {
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            prevStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().prev().children("a");

        prevStepWizard.removeAttr('disabled').trigger('click');    
    });
    

    $('div.setup-panel div a.btn-success').trigger('click');
        
                
    $("#otp_form").click(function(){  
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='url']");
                
        var otp_no = $("#otp_no").val();
        
        $(".show-item-hidden").show(); 
        $(".item-default-load").hide();
        var url = $(location).attr("href"),
            parts = url.split("/"),
            last_part = parts[parts.length-1];
        //var names = ['General painting', 'gift-a-wall', 'concept-walls', 'designer-walls', 'wall-paper', 'royale-play', 'home-makeover', 'Potraits/Metal murals/Statues'];
       
        if(last_part ){
        if( last_part=='royale-play-calculator'){
        last_part ="Royale play";
            }
        if( last_part=='home-makeover-calculator'){
        last_part ="Home makeover";
            }
        if( last_part=='general-painting-calculator'){
        last_part ="General painting";
            }
        //alert(last_part);
        var cap = last_part.charAt(0).toUpperCase() +last_part.slice(1);
        //alert(cap);
        var res_str = cap.replace(/-/g, ' ');    
              //  alert(res_str);
            $("#sms-type_service").val(res_str);
        }
//        if (jQuery.inArray(name, names)!='-1') {
//            alert(name + ' is in the array!');
//        } else {
//            alert(name + ' is NOT in the array...');
//        }
        
        $.ajax({
                url  : '{$sendotp}',
                type : 'POST',                   
                data: {
                  req_val: otp_no, 
                  form: 'otp'
                },
                success: function(data) {
                var result = JSON.parse( data );
                    if(result['mgs'] == "success"){
                        navListItems.eq(1).attr('disabled','');
                        $(".errorMessage").empty();
                        nextStepWizard.removeAttr('disabled').trigger('click');                    
                    }else{
                        $(".errorMessage").empty();
                        $(".errorMessage").html( '<div class="help-block">'+result['mgs']+'</div>' );
                    }
                }
           });         
    });
                
    $("#phone_form").click(function(){     

        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='url']");
                
        var phone_no = $("#phone").val();
        var filter = /^[0-9-+]+$/;
        if(filter.test(phone_no)){

        $.ajax({
                url  : '{$sendotp}',
                type : 'POST',                   
                data: {
                  req_val: phone_no, 
                  form: 'phone'
                },
                success: function(data) {

                var result = JSON.parse( data );
                    if(result['mgs'] == "success"){
                 $('#otp_no').val('');
                 $(".errorMessage").empty();
                        nextStepWizard.removeAttr('disabled').trigger('click');                    
                    }
                }
           });       
        }else{
            $(".errorMessage1").html( '<div class="help-block">Please Enter Your Phone Number</div>' );
        }
    });
    
                
                
       $('#book-site').on('beforeSubmit', function(e) {
            var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='url']");
                
    var form = $(this);
    var formData = form.serialize();
    $(".loading-image1").show();   
   
    $.ajax({
        url: form.attr("action"),
        type: form.attr("method"),
        data: formData,
        success: function (data) {
            if(data == 'success'){
                 navListItems.eq(2).attr('disabled','');
                nextStepWizard.removeAttr('disabled').trigger('click'); 
                 $(".loading-image1").hide(); 
            }
        },
        error: function () {
            alert("Something went wrong");
        }
    });
}).on('submit', function(e){
    e.preventDefault();
});   
    //____
                
    
    
                
                
                
}); 
       
JS;
$this->registerJs($script, View::POS_END);
?>

