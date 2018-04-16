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
          <p> <a href="/"><img src="themes/site_theme/images/footer-logo.png"  alt=""></a></p>
          <p> Lorem ipsum dolor sit amet, 
            consectetur adipiscing elit. Fusce luctus maximus rutrum. Vestibulum ligula erat, mattis eget</p>
          <p><a href="#" class="btn btn1"> Read More </a> </p>
        </div>
        <div class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-8 offset-xl-1">
          <div class="row">
            <div class="col-6 col-sm-3 col-md-4 col-lg-4 col-xl-4 footer-part1">
              <h6> About us</h6>
              <ul>
                <li><a href="/"> Home </a></li>
                <li><a href="/"> What We do </a></li>
                <li><a href="/testimonials"> Testimonials </a></li>
                <li><a href="/faq"> Faq </a></li>
                <li><a href="/contactus"> Contact us</a></li>
              </ul>
            </div>
            <div class="col-6 col-sm-4 col-md-4 col-lg-4 col-xl-4 footer-part1">
              <h6> WHAT WE DO</h6>
              <ul>
                <li><a href="/gift-a-wall">Gift a wall</a></li>
                <li><a href="/general-painting">General Painting</a></li>
                <li><a href="/designer-walls">Designer Walls</a></li>
                <li><a href="/wallpapers">Wallpapers</a></li>
                <li><a href="/royale-play">Royale Play</a></li>
                <li><a href="/home-makeover">Home Makeovers</a></li>
                <li><a href="/potraits-statues-murals#potrait" data-href="#potrait" class="potraitssection">Potraits </a></li>
                <li><a href="/potraits-statues-murals#statue" data-href="#statue" class="potraitssection">Statues </a></li>
                <li><a href="/potraits-statues-murals#mural" data-href="#mural" class="potraitssection">Metal Murals</a></li>
              </ul>
            </div>
            <div class="col-12 col-sm-5 col-md-4 col-lg-4 col-xl-4 footer-part1">
              <h6>Get in touch</h6>
              <p><i class="fas fa-map-marker-alt"></i> 2/216, New no: 9/123, Ghandhipuram, Thoppur, Madurai 625008  </p>
              <p> <i class="fas fa-phone fa-flip-horizontal"></i> +91 9976099780</p>
              <p> <i class="fas fa-envelope"></i> <a href="mailto:support@walldressup.com">support@walldressup.com</a> </p>
              <p class="social-links"> <a href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook-square"></i></a> <a href="https://twitter.com/" target="_blank"><i class="fab fa-twitter-square"></i></a> <a href="https://plus.google.com" target="_blank"><i class="fab fa-google-plus-square"></i></a> <a href="#" target="_blank"> <i class="fab fa-youtube-square"></i> </a> </p>
              <p> <a href="https://www.houzz.in/pro/walldressup/walldressupcom"> <img src="themes/site_theme/images/houzz.jpg"  alt=""> </a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="footer-row2">
    <div class="container"> Copyright  © 2018 walldressup.com.  All Rights Reserved. Developed by Sumanas Technologies | Website development company in India.</div>
    <input type='hidden' name='slug-name' id='slug-id'>
  </div>
</footer>

<?php
$sendotp = Yii::$app->getUrlManager()->createUrl("site/site/ajaxbookotp");
$requestquote = Yii::$app->getUrlManager()->createUrl("site/site/requestquote");
$contactus = Yii::$app->getUrlManager()->createUrl("site/site/contactus");
//echo '<pre>';print_r($sendotp); exit;   
$script = <<< JS

 $(document).ready(function () {
     
    $("#Bookanotp").on('shown.bs.modal', function (e) {
        var servicename = $(e.relatedTarget).data('servicename');
       
        if(servicename){
             $("#sms-type_service").val(servicename);
        
        }
            if(servicename=="Gift a wall"){
          var giftname = $(e.relatedTarget).data('gift');
          $("#sms-plan").val(giftname);
          $(".show-plans").show();
        }
     }); 

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
        
//        $(".show-item-hidden").show(); 
//        $(".item-default-load").hide();
//        var url = $(location).attr("href"),
//            parts = url.split("/"),
//            last_part = parts[parts.length-1];
       
       
//        if(last_part ){
//        if( last_part=='royale-play-calculator'){
//        last_part ="Royale play";
//            }

//     if( last_part=='potraits-statues-murals'){
      // var potr = $('#metal-book').val();
        //var sta = $('#statue-book').data('pot')
        //var met = $('#metal-book').data('pot')
        //var potr = $(this).attr("data-id")
        //alert(potr);
        //alert(sta);
        //alert(met);
        

//        if($('#metal-book').val() != ''){
//        var potr = $('#metal-book').val();
//        }
//            else if($('#statue-book').val() != ''){
//        var potr = $('#statue-book').val();
//        }
//            else if($('#potrait-book').val() != ''){
//        var potr = $('#potrait-book').val();
//        }
        
        
       //if(potr == 'Metal murals'){
        //last_part =potr;
       // }
//         $( "#metal-book" ).click(function(){
//        alert('ji');
//                 last_part ="Potraits";
//        
//              });
        
//        if(potr){
//         last_part ="Potraits";
//        }
//         if(sta){
//         last_part ="Statues";
//        }
//         if(met){
//         last_part ="Metal murals";
//        }
//    }
        
        
//        if( last_part=='home-makeover-calculator'){
//        last_part ="Home makeover";
//            }
//        if( last_part=='general-painting-calculator'){
//        last_part ="General painting";
//            }

        //alert(last_part);
        //var cap = last_part.charAt(0).toUpperCase() +last_part.slice(1);
        //alert(cap);
        //var res_str = cap.replace(/-/g, ' ');    
              //  alert(res_str);
           // $("#sms-type_service").val(res_str);
        //}

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
        var gift = $("#giftawall").val();
        var filter = /^[0-9-+]+$/;
        if(filter.test(phone_no)){

        $.ajax({
                url  : '{$sendotp}',
                type : 'POST',                   
                data: {
                  req_val: phone_no, 
                  form: 'phone',
                gift1: gift
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
                 setTimeout(function(){  $('#Bookanotp').modal('hide');  location.reload(); }, 5000);
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
                
    
    
                
                
                
     
    $("#requestaquote").validate({
        rules: {
              'name': {
                required: true,
//		minlength:3
		},
		'phone': {
		required:true,
		number:true,
		},
		'email': {
                required: true,
                email: true
                 },
                'mess': {
                required: true,
		},
           },
        messages: {
                'name': {
		required :"Please Enter Your Name",
		},
		'phone':{
		required: "Please Enter Your Phone Number",
		number: "Please Enter Valid Phone Number"
		},
                'email': "Please Enter a Valid Email Address",
                 'mess': {
		required :"Please Enter Your Message",
		},
            },
                
              submitHandler: function(form) {
       
                var na = $('#req-name').val();
                var em = $('#req-email').val();
                var ph = $('#req-phone').val();
                var mes = $('#req-mess').val();
            
            $(".request-show").show();   
                
            $.ajax({
       
                type: 'POST',
                url: '{$requestquote}',
                data:{
                    na1:na, em1:em, ph1:ph, mes1:mes,
                    form: 'quote',
                     },
                success: function(data) {
                if(data == "success"){
                 $("#successrequest").html( 'Your request has been send sucessfully!!' );
                  setTimeout(function(){  $("#successrequest").hide("slow"); $("#successrequest").html("");
                   $(".request-show").hide(); }, 5000);
                  $('#requestaquote')[0].reset(); 
                  $(".loading-image").hide(); 
                }
                
                },
            });

           }     
                
                
               
    });
                
  $("#contactus").validate({
         ignore: ".ignore",
        rules: {
              'name': {
                required: true,
//		minlength:3
		},
		'phone': {
		required:true,
		number:true,
		},
		'email': {
                required: true,
                email: true
                 },
                'mess': {
                required: true,
		},
           hiddenRecaptcha: {
                required: function () {
                    if (grecaptcha.getResponse() == '') {
                        return true;
                    } else {
                        return false;
                    }
                }
            }
               
            },
          
        messages: {
                'name': {
		required :"Please Enter Your Name",
		},
		'phone':{
		required: "Please Enter Your Phone Number",
		number: "Please Enter Valid Phone Number"
		},
                'email': "Please Enter a Valid Email Address",
                 'mess': {
		required :"Please Enter Your Message",
		},
            },
                
              submitHandler: function(form) {
       
                var na = $('#cont-name').val();
                var em = $('#cont-email').val();
                var ph = $('#cont-phone').val();
                var mes = $('#cont-mess').val();
            
            $(".cont-show").show();   
                
            $.ajax({
       
                type: 'POST',
                url: '{$contactus}',
                data:{
                    na1:na, em1:em, ph1:ph, mes1:mes,
                    form: 'contact',
                     },
                success: function(data) {
                if(data == "success"){
                 $("#successcont").html( 'Your request has been send sucessfully!!' );
                  setTimeout(function(){  $("#successrequest").hide("slow"); $("#successcount").html("");
                   $(".cont-show").hide(); location.reload(); }, 5000);
                  $('#contactus')[0].reset(); 
                  $(".loading-image1").hide(); 
                }
                
                }
            });

           }     
    });
        

                
$(window).on("load", function () {           
    var urlHash = window.location.href.split("#")[1];
        if (urlHash &&  $('#' + urlHash).length )
                
          $('html,body').animate({
              scrollTop: $('#' + urlHash).offset().top - 150
          }, 500);        
});
$(document).on('click', '.potraitssection', function (event) {
    
    if(window.location.pathname == '/potraits-statues-murals'){
    event.preventDefault();
    $('html, body').animate({
        scrollTop: $($.attr(this, 'data-href')).offset().top - 150
    }, 500);
    }
});
                
  
   
   });

      
//   $(document).ready(function(){
//    if(window.location.hash) {
//               // location.hash='#statue';
//                alert('yes');
//      // # exists in URL
//    }
//    else {
//        alert('no');
//    }
//});


                
               

                
                
JS;
$this->registerJs($script, View::POS_END);
?>

