<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;
use yii\widgets\DetailView;
use yii\helpers\Url;
use yii\bootstrap\Modal;

$this->title = 'Wall Dressup - Royale Play-Calculator';
?>
<section class="slider-cont inner-page-heading">
    <div class="container">
        <h1>Royale play Calculator</h1>
    </div>
</section>
<section class="royal-play-cont"> 


    <div class="container"> 
        <div>
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                  <div class="modal-content ">
                    <div class="pricingcalcroyalplay modal-header " >
                        <h5 class="modal-title" id="exampleModalLongTitle">Royal Play Painting Calculator</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">  </button>
                    </div>
                    <div class="modal-body" id="form-royaleplay">
                        <form id="royalplay-validate"  name="royalvalidate" class="royalplay-validate" method="post" action="">
                            <div class="form-group ">
                                <div class="row mb-4">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label> Wall Height </label>
                                        <input name="wall-height" type="text" class="form-control" id="w-height">
                                    </div>

                                </div>

                            </div>


                            <div class="form-group ">
                                <div class="row mb-4">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label> Wall Width </label>
                                        <input name="wall-width" type="text" class="form-control" id="w-width">
                                    </div>

                                </div>

                            </div>


                            <div class="form-group ">
                                <div class="row mb-4">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label> Royal Play Design </label>
                                        <select class="custom-select mr-sm-2" name="royal-design" id="inlineFormCustomSelect">
                                            <option selected value="">Choose...</option>
                                            <optgroup label="Royal Play"  value="0" id="royalplays" >
                                                <option value="Royale Play brushing" data-type="royalplays" data-metallic="80" data-nonmetallic="70" >Royale Play brushing </option>
                                                <option value="Royale Play spatula" data-type="royalplays" data-metallic="80" data-nonmetallic="70">Royale Play spatula</option>
                                                <option value="Royale Play combing"data-type="royalplays"  data-metallic="80" data-nonmetallic="70">Royale Play combing</option>
                                                <option value="Royale Play colourwash"data-type="royalplays"  data-metallic="80" data-nonmetallic="70">Royale Play colourwash</option>
                                                <option value="Royale Play ragging" data-type="royalplays" data-metallic="80" data-nonmetallic="70">Royale Play ragging</option>
                                                <option value="Royale Play sponging" data-type="royalplays" data-metallic="80" data-nonmetallic="70">Royale Play sponging</option>
                                                <option value="Royale Play dapple" data-type="royalplays" data-metallic="85"  data-nonmetallic="75">Royale Play dapple</option>
                                                <option value="Royale Play crinkle" data-type="royalplays" data-metallic="95" data-nonmetallic="85">Royale Play crinkle</option>
                                                <option value="Royale Play canvas" data-type="royalplays" data-metallic="85" data-nonmetallic="75">Royale Play canvas</option>
                                                <option value="Royale Play fizz" data-type="royalplays" data-metallic="85" data-nonmetallic="75">Royale Play fizz</option>
                                                <option value="Royale Play seahell" data-type="royalplays" data-metallic="85" data-nonmetallic="75">Royale Play seahell</option>
                                                <option value="Royale Play delta" data-type="royalplays" data-metallic="85" data-nonmetallic="75">Royale Play delta</option>
                                                <option value="Royale Play torrent" data-type="royalplays" data-metallic="95" data-nonmetallic="75">Royale Play torrent</option>
                                                <option value="Royale Play spiral" data-type="royalplays" data-metallic="85" data-nonmetallic="75">Royale Play spiral</option>
                                                <option value="Royale Play splash" data-type="royalplays" data-metallic="85" data-nonmetallic="85">Royale Play splash</option>
                                                <option value="Royale Play timber" data-type="royalplays" data-metallic="100" data-nonmetallic="85">Royale Play timber</option>
                                                <option value="Royale Play disc" data-type="royalplays" data-metallic="85" data-nonmetallic="85">Royale Play disc</option>
                                            </optgroup>
                                            <optgroup label="Royal Play Textile">
                                                <option value="Royale Play Textile Crushed silk" data-nonmetallic="85">Royale Play Textile Crushed silk </option>
                                                <option value="Royale Play Textile denim" data-nonmetallic="85">Royale Play Textile denim</option>
                                                <option value="Royale Play Textile Jute" data-nonmetallic="85">Royale Play Textile Jute</option>
                                                <option value="Royale Play Textile leather" data-nonmetallic="85">Royale Play Textile leather</option>
                                                <option value="Royale Play Textile kora grass" data-nonmetallic="85">Royale Play Textile kora grass</option>
                                                <option value="Royale Play Textile yarn" data-nonmetallic="85">Royale Play Textile yarn</option>
                                            </optgroup>
                                            <optgroup label="Royal Play Infinite">
                                                <option value="Royale Play Infinite Shale" data-type="royalplays" data-metallic="100" data-nonmetallic="100">Royale Play Infinite Shale </option>
                                                <option value="Royale Play Infinite Bricks" data-type="royalplays" data-metallic="120" data-nonmetallic="100">Royale Play Infinite Bricks</option>
                                                <option value="Royale Play Infinite Pebbles" data-type="royalplays" data-metallic="120" data-nonmetallic="100">Royale Play Infinite Pebbles</option>
                                                <option value="Royale Play Infinite Crossroad" data-type="royalplays" data-metallic="120" data-nonmetallic="100">Royale Play Infinite Crossroad</option>
                                                <option value="Royale Play Infinite Ripple" data-type="royalplays" data-metallic="120" data-nonmetallic="100">Royale Play Infinite Ripple</option>
                                                <option value="Royale Play Infinite Breeze" data-type="royalplays" data-metallic="120" data-nonmetallic="100">Royale Play Infinite Breeze</option>
                                            </optgroup>
                                            <optgroup label="Royal Play Dune">
                                                <option value="Royale Play Dune Drizzle" data-nonmetallic="125">Royale Play Dune Drizzle </option>
                                                <option value="Royale Play Dune Halo" data-nonmetallic="125">Royale Play Dune Halo</option>
                                            </optgroup>
                                            <optgroup label="Royal Play Safari">
                                                <option value="Royale Play Safari Classic" data-nonmetallic="125">Royale Play Safari Classic </option>
                                                <option value="Royale Play Safari Sleet" data-nonmetallic="125">Royale Play Safari Sleet</option>
                                            </optgroup>
                                            <optgroup label="Royal Play Antico">
                                                <option value="Royale Play Antico Linea" data-nonmetallic="250">Royale Play Antico Linea </option>
                                                <option value="Royale Play Antico Classicque" data-nonmetallic="250">Royale Play Antico Classicque</option>
                                            </optgroup>
                                            <optgroup label="Royal Play Stucco">
                                                <option value="Royale Play Stucco Marble" data-nonmetallic="125">Royale Play Stucco Marble </option>
                                                <option value="Royale Play Stucco Slate" data-nonmetallic="125">Royale Play Stucco Slate</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group1" style="display:none" id="metal">
                                <div class="row mb-4">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <!--            <label>  Metallic  </label>
                                                     <input name="" type="radio" class="form-control" value="70">70-->
                                        <div class="radio" >
                                            &nbsp;&nbsp;&nbsp; <label><input id="radio-nonmet" type="radio" value="val-nonmet" name="radio">Rs.<span id="nonmetallic"></span><br>Non-Metallic</label>
                                            &nbsp;&nbsp;&nbsp; <label><input id="radio-met"  type="radio" value="val-met" name="radio">Rs.<span id="metallic"></span><br>Metallic</label>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="row mb-4">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label>  Rate Per SqFt  </label>
                                        <input name="rate" type="text" class="form-control" id="met" readonly>
                                        <!--<div class="form-control disabledbutton" id="met"></div>-->
                                    </div>
                                </div>
                            </div>
                            <div class="" id="mailme-show-royal" style="display:none">
                                <div class="form-group ">
                                    <div class="row mb-4">
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <label>  Full Name  </label>
                                            <input name="name" type="text" class="form-control" id="name">
                                            <!--<div class="form-control disabledbutton" id="met"></div>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row mb-4">
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <label>  Email Address  </label>
                                            <input name="email" type="email" class="form-control" id="email">
                                            <!--<div class="form-control disabledbutton" id="met"></div>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row mb-4">
                                        <div class="col-3">
                                            <input type="submit" name="submit" class="button btn btn1" id="final-mailme-home" value="Send">
                                        </div>
                                    </div>
                                </div>
                                 <div class="form-group ">
                                    <div class="row mb-4">
                                        <div class="col-3">
                                         <div id="successMessage"> </div>
                                         <div class="loading-image"> </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div style="display:none" class="loading-image"><img src="themes/site_theme/images/ajax-loader.gif" alt=""></div>
                            <div class="form-group ">
                                <div class="row mb-4">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-right total1">
                                        Total :  <span class="badge badge-secondary" id="total-amount"></span>
                                    </div>
                                </div></div>
                            <div class="modal-footer text-center">
                                 <button type="button" class="btn btn2"data-toggle="modal" data-target="#Bookanotp">Book An Appointment</button>
                                 <button type="button" class="btn btn1" id="mailme-royal">Mail me</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
$mailme = Yii::$app->getUrlManager()->createUrl("site/site/mailme");

$script = <<< JS

    
        jQuery(document).ready(function () {
        
            $('#inlineFormCustomSelect').change(function() {
             var nm = $(this).find(':selected').attr('data-type')
             var nonmel = $(this).find(':selected').attr("data-nonmetallic")
             var mel = $(this).find(':selected').attr("data-metallic")
        
                if(nm){
                    $('#met').val('');
                    $('#total-amount').text('');
                    $('#radio-met').prop('checked', false);
                    $('#radio-nonmet').prop('checked', false);
                    console.log(mel);
                    console.log( nonmel);
                    $("#nonmetallic").html(nonmel); 
                    $("#metallic").html(mel); 
                    $("#metal").show();
                   }
                else{
                    $("#met").val(nonmel);
                    var total_value = ($('#w-height').val()) * ($('#w-width').val()) * nonmel;
                    $('#total-amount').html(total_value);
                    $("#metal").hide();
                   }

                $('#radio-nonmet').click(function() {
//                if($('#radio-nonme').is(':checked')){
      if(  $('#radio-nonmet').attr('checked', true)){
                    $("#met").val(nonmel);
                    var total_value = ($('#w-height').val()) * ($('#w-width').val()) * nonmel;
                    $('#total-amount').html(total_value);
                               }
                        });
        
                $('#radio-met').click(function() {
//                if($('#radio-met').is(':checked')) {
         if(  $('#radio-met').attr('checked', true)){
                    $("#met").val(mel);
                    var total_value = ($('#w-height').val()) * ($('#w-width').val()) * mel;
                    $('#total-amount').html(total_value);

                           }
                      });
                      
        
            });
        
            $( "#w-height" ).keyup(function() {
                 var dInput = $(this).val();
                 var bla = $('#met').val();
                 var wid = $('#w-width').val();
                 $('#met').val(bla);
                 var total_value = dInput * wid * bla;
                 $('#total-amount').html(total_value);
        
              });
        
         $( "#w-width" ).keyup(function() {
                 var dInput = $(this).val();
                 var bla = $('#met').val();
                 var heig = $('#w-height').val();
                 $('#met').val(bla);
                 var total_value = dInput * heig * bla;
                 $('#total-amount').html(total_value);
        
              });
        
       //____
        
            $('#mailme-royal').click(function() {
            $("#mailme-show-royal").toggle('slow');
        
        });
         
                   

         $("#royalplay-validate").validate({
        rules: {
              'wall-height': {
                required: true,
                number: true,
                },
		'wall-width': {
		required:true,
                number: true,
		},
		'email': {
                required: true,
                email: true,
                 },
                'name': {
                required: true,
		},
                'royal-design':{
                    required:true,
                },
                'radio':{
                    required: true,
                }
           },
        messages: {
                'name': {
		required :"Please Enter Your Name",
		},
		'wall-height':{
		required: "Please Enter Height",
		number: "Please Enter Valid Height"
		},
                'wall-width':{
		required: "Please Enter Width",
		number: "Please Enter Valid Width"
		},
                'email': "Please Enter Valid Email Address",
                 'royal-design': {
		required :"Please Select Design",
		},
                'radio':{
                    required:"Please Select Option"
                },
               
            },
             
                errorPlacement: function(error, element) 
           {
            if ( element.is(":radio") ) 
            {
                error.appendTo( element.parents('.container') );
            }
            else 
            { // This is the default behavior 
                error.insertAfter( element );
            }
         },
   
          submitHandler: function(form) {
       
                var h1 = $('#w-height').val();
                var w1 = $('#w-width').val();
                var t1 = $('#total-amount').text();
                var d1 = $('#inlineFormCustomSelect').val();
                var r1 = $('#met').val();
                var n1 = $('#name').val();
                var e1 = $('#email').val();
            
            $(".loading-image").show();   
                
            $.ajax({
       
                type: 'POST',
                url: '{$mailme}',
                data:{
                    he1:h1, we1:w1, to1:t1, de1:d1, ra1:r1,na1:n1 ,em1:e1,
                    form: 'royal',
                     },
                success: function(data) {
                if(data == 'success'){
                 $("#successMessage").html( 'Your request has been send sucessfully!!' );
                 $("#successMessage").fadeOut(3000);
                $('#royalplay-validate')[0].reset(); 
                 $(".loading-image").hide(); 
                $('#radio-met').prop('checked', false);
                $('#radio-nonmet').prop('checked', false);
                $('#total-amount').text('');
                }
                
                },
            });

           }     
                
                
           });   
                
                
            //_______    
                
                
            
        
            });

        
        
        
        
JS;
$this->registerJs($script, View::POS_END);
?>
