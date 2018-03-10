<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;
use yii\widgets\DetailView;
use yii\helpers\Url;
use yii\bootstrap\Modal;

$this->title = 'Wall Dressup - General-painting-Calculator';
?>
<section class="slider-cont inner-page-heading">
    <div class="container">
        <h1>General Painting Calculator</h1>
    </div>
</section>
<section class="royal-play-cont"> 

    <div class="container"> 
        <div class="pricingcalc1">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">General Painting Calculator</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form name="general-painting-validate" id="general-painting-validate" method="post" action="">
                            <div class="form-group ">
                                <div class="row mb-4">
                                    <div class="col-12 col-sm-5 col-md-3 col-lg-3 col-xl-2">
                                        <label> Project Name </label><span class="required-field">*</span>
                                    </div>
                                    <div class="col-12 col-sm-5 col-md-4 col-lg-4 col-xl-4">
                                        <input name="project-name" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div id="accordion">
                                            <div class="card">
                                                <div class="card-header" id="headingOne">
                                                    <h5 class="mb-0">
                                                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" > Interior </button>
                                                    </h5>
                                                </div>
                                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                                    <div class="card-body">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <th></th>
                                                                        <th scope="col" class="text-center" style="width:120px">Fresh Paint</th>
                                                                        <th scope="col">Repaint</th>
                                                                        <th scope="col">Room Name</th>
                                                                        <th scope="col">Approx sq.ft</th>
                                                                        <th scope="col" style="width:150px">Paint</th>
                                                                        <th scope="col">Rate.sq.ft</th>
                                                                        <th scope="col">Amount</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody class="tbody1">
                                                                    <tr class="show-row"><td></td>
                                                                        <td scope="row" align="center"><div class="custom-control custom-radio">
<!--                                                                                <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">
                                                                                <label class="custom-control-label" for="customRadio1"></label>-->
                                                                                <input type="radio" name="radio1[0]" class="rad-paint" value="fresh" data-val="0">

                                                                                <label class="custom-control-label" for="customRadio1" ></label>
                                                                            </div></th>
                                                                        <td><div class="custom-control custom-radio">
                                                                                <input type="radio" name="customRadio" class="rad2">
                                                                                <!--<input type="radio" name="customRadio" class="custom-control-input customRadio2">-->
                                                                                <label class="custom-control-label" id="r1" for="customRadio2"></label>
                                                                            </div></td>
                                                                        <td><input name="room-name1[0]" type="text" class="form-control int-room-name"></td>
                                                                        <td><input name="appr-sqft1[0]" type="text" class="form-control int-appr-sqft"></td>
                                                                        <td><select class="custom-select general-select">
                                                                            </select>
                                                                            <select class="custom-select int-fresh-paint" name="selecti1[0]"  style="display:none">
                                                                              <option value='Asian Paints Tractor Emulsion' data-price='21'>Asian Paints Tractor Emulsion</option>
                                                                                <option value='Asian Paints Apcolite Premium Emulsion' data-price='24'>Asian Paints Apcolite Premium Emulsion</option>
                                                                                <option value='Asian Paints Apcolite Advance Matt Emulsion' data-price='26'>Asian Paints Apcolite Advance Matt Emulsion</option>
                                                                                <option value='Asian Paints Royale Luxury Emulsion' data-price='30'>Asian Paints Royale Luxury Emulsion</option>
                                                                                <option value='Asian Paints Royale ATMOS' data-price='32'>Asian Paints Royale ATMOS</option>
                                                                                <option value='Asian Paints Royale ASPIRA' data-price='35'>Asian Paints Royale ASPIRA </option>"; 
                                                                            </select>
                                                                            <select class="custom-select int-re-paint" name="selectr1[0]" style="display:none">
                                                                                <option selected>Select</option>
                                                                                <option value="Asian Paints Tractor Emulsion" data-price="8">Asian Paints Tractor Emulsion</option>
                                                                                <option value="Asian Paints Apcolite Premium Emulsion" data-price="11">Asian Paints Apcolite Premium Emulsion</option>
                                                                                <option value="Asian Paints Apcolite Advance Matt Emulsion" data-price="15">Asian Paints Apcolite Advance Matt Emulsion</option>
                                                                                <option value="Asian Paints Royale Luxury Emulsion" data-price="19">Asian Paints Royale Luxury Emulsion</option>
                                                                                <option value="Asian Paints Royale ATMOS" data-price="20">Asian Paints Royale ATMOS</option>
                                                                                <option value="Asian Paints Royale ASPIRA" data-price="22">Asian Paints Royale ASPIRA</option>
                                                                            </select>
                                                                        </td>
                                                                        <td class="text-center general-rate"><b><span id="price"></span> </b></td>
                                                                        <td id="general-amount"><b> </b></td>
                                                                    </tr>
                                                                <div class="form-group">   
                                                                    <button type="button" class="btn btn-dark add-row-button" id="add-row-button1"><i class="fas fa-plus "> </i> Add Row</button>
                                                                </div>
                                                                </tbody>
                                                            </table>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" id="headingTwo">
                                                    <h5 class="mb-0">
                                                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo"> Exterior </button>
                                                    </h5>
                                                </div>
                                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                                    <div class="card-body">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <th></th>
                                                                        <th scope="col" class="text-center" style="width:120px">Fresh Paint</th>
                                                                        <th scope="col">Repaint</th>
                                                                        <th scope="col">Room Name</th>
                                                                        <th scope="col">Approx sq.ft</th>
                                                                        <th scope="col" style="width:150px">Paint</th>
                                                                        <th scope="col">Rate.sq.ft</th>
                                                                        <th scope="col">Amount</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody class="tbody2">
                                                                    <tr class="show-row2"><td></td>
                                                                        <td scope="row" align="center"> <div class="custom-control custom-radio">
                                                                                <!--<input type="radio"  name="customRadio" class="custom-control-input rad3">-->
                                                                                <input type="radio"  name="customRadio" class="rad3">
                                                                                <label class="custom-control-label" for="customRadio3"></label>
                                                                            </div></td>
                                                                        <td><div class="custom-control custom-radio">
                                                                                <!--<input type="radio"  name="customRadio" class="custom-control-input rad4">-->
                                                                                <input type="radio"  name="customRadio" class="rad4">
                                                                                <label class="custom-control-label" for="customRadio4"></label>
                                                                            </div></td>
                                                                        <td><input name="room-name2[0]" type="text" class="form-control" id="ext-room-name"></td>
                                                                        <td><input name="appr-sqft2[0]" type="text" class="form-control" id="ext-appr-sqft"></td>
                                                                        <td><select class="custom-select general-select2">
                                                                            </select>
                                                                            <select class="custom-select ext-fresh-paint" style="display:none">
                                                                                <option selected>Select</option>
                                                                                <option value="Asian Paints Ace" data-price="14">Asian Paints Ace</option>
                                                                                <option value="Asian Paints Apex" data-price="16">Asian Paints Apex</option>
                                                                                <option value="Asian Paints Apex Ultima" data-price="21">Asian Paints Apex Ultima </option>
                                                                                <option value="asian paints ultima protek" data-price="34">asian paints ultima protek</option>
                                                                            </select>
                                                                            <select class="custom-select ext-re-paint" style="display:none">
                                                                                <option selected>Select</option>
                                                                                <option value="Asian Paints Ace" data-price="11">Asian Paints Ace</option>
                                                                                <option value="Asian Paints Apex" data-price="14">Asian Paints Apex</option>
                                                                                <option value="Asian Paints Apex Ultima" data-price="17">Asian Paints Apex Ultima</option>
                                                                                <option value="Asian Paints Apex Ultima protek" data-price="22">Asian Paints Apex Ultima protek</option>
                                                                            </select>

                                                                        </td>
                                                                        <td class="text-center general-rate2"><b><span id="price"></span></b></td>
                                                                        <td id="general-amount2"><b> </b></td>
                                                                    </tr>
                                                                <div class="form-group">   
                                                                    <button type="button" class="btn btn-dark add-row-button" id="add-row-button2"><i class="fas fa-plus "> </i> Add Row</button>
                                                                </div>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" id="headingThree">
                                                    <h5 class="mb-0">
                                                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree"> Wood </button>
                                                    </h5>
                                                </div>
                                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                                    <div class="card-body">
                                                        <table class="table table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col" class="text-center">Enamel</th>
                                                                    <th scope="col" class="text-center">Polish</th>
                                                                    <th scope="col">Type</th>
                                                                    <th scope="col" style="width:150px">No.of 
                                                                        Door </th>
                                                                    <th scope="col">Rate.sq.ft</th>
                                                                    <th scope="col">Amount</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td><div class="custom-control custom-radio">
                                                                            <input type="radio" id="customRadio5" name="customRadio" class="custom-control-input">
                                                                            <label class="custom-control-label" for="customRadio5"></label>
                                                                        </div></td>
                                                                    <td><div class="custom-control custom-radio">
                                                                            <input type="radio" id="customRadio6" name="customRadio" class="custom-control-input">
                                                                            <label class="custom-control-label" for="customRadio6"></label>
                                                                        </div></td>
                                                                    <td><div class="custom-control custom-checkbox">
                                                                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                                            <label class="custom-control-label" for="customCheck1">Door</label>
                                                                        </div></td>
                                                                    <td><input name="" type="text" class="form-control"></td>
                                                                    <td class="text-center"><b> </b></td>
                                                                    <td><b> ₹ 2000</b></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="" id="mailme-show" style="display:none">
                                            <div class="form-group ">
                                                <div class="row mb-4">
                                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <label> <b> Full Name </b> </label>
                                                        <input name="name" type="text" class="form-control" id="name">
                                                        <!--<div class="form-control disabledbutton" id="met"></div>-->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <div class="row mb-4">
                                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <label> <b> Email Address </b> </label>
                                                        <input name="email" type="email" class="form-control" id="email">
                                                        <!--<div class="form-control disabledbutton" id="met"></div>-->
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" name="total-price" id="total-price" value="0">
                                            <input type="submit" name="submit" class="btn btn1" id="final-mailme-id" value="Send"><div style="display:none" class="loading-image"><img src="themes/site_theme/images/ajax-loader.gif" alt=""></div>
                                            <br><br>

                                        </div>
                                        <div class="form-group ">
                                            <div class="row mb-4">
                                                <div class="col-3">
                                                    <div id="successMessage"> </div>
                                                    <div class="loading-image"> </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-right">
                                           <b>Total : </b><span class="badge badge-secondary home-total total1">  </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="modal-footer text-center">
                            <?= Html::button('Book An Appointment', ['value' => Url::to('/bookotp'), 'class' => 'btn btn2  modalButton']) ?>
                            <button type="button" class="btn btn1" id="mailme-id">Mail me</button>
                            <?php // Html::submitButton('Mail me', ['class' => 'btn btn1'])  ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/html" id="form_tpl">
        <tr class="show-row">
            <td><div class="remove_row"><i class="fas fa-times-circle"></i></div></td>
            <td scope="row" align="center"><div class="custom-control custom-radio">
                    <input type="radio"  name="radio1[<%= element.i %>]" class="rad-paint" value="fresh" data-val="<%= element.i %>">
                    <label class="custom-control-label" for="customRadio1" ></label>
                </div></td>
            <td><div class="custom-control custom-radio">
                    <input type="radio"  name="radio1[<%= element.i %>]" class="rad-paint" value="repaint" data-val="<%= element.i %>" >
                    <label class="custom-control-label" for="customRadio2"></label>
                </div></td>
            <td><input name="room-name1[<%= element.i %>]" type="text" class="form-control int-room-name"></td>
            <td><input name="appr-sqft1[<%= element.i %>]" type="text" class="form-control int-appr-sqft"></td>
            <td class="paintclass">
            </td>
            <td class="text-center general-rate"><b><span class="fresh_price"></span> </b></td>
            <td class="text-center general-amount"><b><span class="general_amount"></span> </b></td>
        </tr>
    </script>
    <script type="text/html" id="form_tpl2">

        <tr class="show-row2">
            <td><div class="remove_row"><i class="fas fa-times-circle"></i></div></td>
            <th scope="row" align="center"> <div class="custom-control custom-radio">
                    <input type="radio"  name="radio2[<%= element.i %>]" class="custom-control-input rad3">
                    <label class="custom-control-label" for="customRadio3"></label>
                </div></th>
            <td><div class="custom-control custom-radio">
                    <input type="radio" name="radio2[<%= element.i %>]" class="custom-control-input rad4">
                    <label class="custom-control-label" for="customRadio4"></label>
                </div></td>
            <td><input name="room-name2[<%= element.i %>]" type="text" class="form-control ext-room-name"></td>
            <td><input name="appr-sqft2[<%= element.i %>]" type="text" class="form-control ext-appr-sqft"></td>
            <td><select class="custom-select" id="general-select2">
                </select>
                <select class="custom-select ext-fresh-paint" style="display:none">
                    <option selected>Select</option>
                    <option value="Asian Paints Ace" data-price="14">Asian Paints Ace</option>
                    <option value="Asian Paints Apex" data-price="16">Asian Paints Apex</option>
                    <option value="Asian Paints Apex Ultima" data-price="21">Asian Paints Apex Ultima </option>
                    <option value="asian paints ultima protek" data-price="34">asian paints ultima protek</option>
                </select>
                <select class="custom-select" id="ext-re-paint" style="display:none">
                    <option selected>Select</option>
                    <option value="Asian Paints Ace" data-price="11">Asian Paints Ace</option>
                    <option value="Asian Paints Apex" data-price="14">Asian Paints Apex</option>
                    <option value="Asian Paints Apex Ultima" data-price="17">Asian Paints Apex Ultima</option>
                    <option value="Asian Paints Apex Ultima protek" data-price="22">Asian Paints Apex Ultima protek</option>
                </select>

            </td>
            <td class="text-center general-rate2"><b><span id="price"></span></b></td>
            <td id="general-amount2"><b> </b></td>
        </tr>

    </script>
    <?php
    $mailme = Yii::$app->getUrlManager()->createUrl("site/site/mailmegeneral");

    $script = <<< JS

    
jQuery(document).ready(function () {
            
        
        _.templateSettings.variable = "element";
        var tpl = _.template($("#form_tpl").html());
        
        var counter = 1;
        $("body").on("click", "#add-row-button1", function (e) {
            e.preventDefault();
            var tplData = {
                i: counter
            };
            $(".tbody1").hide().append(tpl(tplData)).show('slow');
//            $('input[name="room-name1['+counter+']"]').rules("add", {
//                required: true
//            });
//            $('input[name="appr-sqft1['+counter+']"]').rules("add", {
//                required: true
//            });
//            $('input[name="radio1['+counter+']"]').rules("add", {
//                required: true
//            });
//             $('select[name="selecti1['+counter+']"]').rules("add", {
//                required: true
//            });
//             $('select[name="selectr1['+counter+']"]').rules("add", {
//                required: true
//            });
            counter += 1;
        });
            
       $('body').on('click','.remove_row',function(){
         $(this).closest('.show-row').remove();
//         general_amount();
        });
            
            
        _.templateSettings.variable1 = "element";
        var tpl1 = _.template($("#form_tpl2").html());
        
        var _counter = 1;
        $("body").on("click", "#add-row-button2", function (e) {
            e.preventDefault();
            var tplData = {
                i: _counter
            };
            $(".tbody2").hide().append(tpl1(tplData)).show('slow');
//            $('input[name="room-name2['+_counter+']"]').rules("add", {
//                required: true
//            });
//            $('input[name="appr-sqft2['+_counter+']"]').rules("add", {
//                required: true
//            });
//            $('input[name="radio2['+_counter+']"]').rules("add", {
//                required: true
//            });
//             $('select[name="selecti2['+_counter+']"]').rules("add", {
//                required: true
//            });
//             $('select[name="selectr2['+_counter+']"]').rules("add", {
//                required: true
//            });
            _counter += 1;
        });
            
            
            
       $('body').on('click','.remove_row',function(){
         $(this).closest('.show-row2').remove();
         general_amount();
        });
            
        
                    $('body').on('click', '.rad-paint' , function(){  
                                var _that= $(this).closest('tr');
                                 var indexval = $(this).data('val');
                                  var paintselect = ( $(this).val() == "fresh" ) ? getfreshpaint(indexval) : getrepaint(indexval);
                                  var val= _that.find('.paintclass').html(paintselect);
                                  var general_rate= _that.find('.fresh_price').text('');
                                   var general_amount= _that.find('.general_amount').text('');
                });
        
                   $('body').on('blur keyup','.int-appr-sqft',function(){
                                    var _that= $(this).closest('tr');
                                     var approx_rate=  _that.find('.int-appr-sqft').val();
                                     var freshpaint_price =_that.find(':selected').data('price'); 
                                calculate(approx_rate,freshpaint_price,_that);
              });
                
             $('body').on('change','.int-fresh-paint',function(){
                                var _that=$(this).closest('tr');
                                var freshpaint_price = $(this).find(':selected').data('price');   
                              var general_rate= _that.find('.fresh_price').text(freshpaint_price);
                                var approx_rate=  _that.find('.int-appr-sqft').val();
                                calculate(approx_rate,freshpaint_price,_that);
                });
                
             $('body').on('change','.int-re-paint',function(){
                                    var _that=$(this).closest('tr');
                                  var freshpaint_price = $(this).find(':selected').data('price');   
                                var general_rate=  _that.find('.fresh_price').text(freshpaint_price);
                                  var approx_rate=  _that.find('.int-appr-sqft').val();
                                    calculate(approx_rate,freshpaint_price,_that);
              });
   
            function calculate(approx_rate,freshpaint_price,_that){
        
                            var total_amount = (freshpaint_price) ? (approx_rate * freshpaint_price) : '';
                          _that.find('.general_amount').text(total_amount);
                                 var sum = 0;
                                   $(".general_amount").each(function() {
                                         sum +=parseInt($(this).html());
//                                    var currentElement = $('.general_amount').html();
//                                    sum += currentElement; 
           
              });
              $('.total1').text(sum);
                       }
            
   
            
            
    $("#general-painting-validate").validate({
        rules: {
            
		'email': {
                required: true,
                email: true,
                 },
                'name': {
                required: true,
		},
            
                'room-name1[0]':{
                    required:true,
                },
                'appr-sqft1[0]':{
                        required:true,
                    },
            'selecti1[0]':{
                        required:true,
                    },
            'selectr1[0]':{
                        required:true,
                    },
            'project-name':{
            required: true,
            },
           },
        messages: {
                'name': {
		required :"Please Enter Your Name",
		},
		'room-name1[0]':{
		required: "Please Enter Room Name",
		},
                'email': "Please Enter Valid Email Address",
               
            },
             
       submitHandler: function(form) {
         
//                var room = $('#room-namet').val();
//                var rate = $('#home-rate').val();
//                var plan = $('#home-makeover-select').val();
//                var n = $('#name').val();
//                var e = $('#email').val();
                
                $(".loading-image").show();  
                var form_data = $(form).serializeArray(); 
            
            $.ajax({
       
                type: 'POST',
                url: '{$mailme}',
                data:{
                    data: form_data, 
                    form: 'general',
                     },
                success: function(data) {
                if(data == 'success'){
                alert('finish');
                $("#successMessage").html( 'Your request has been send sucessfully!!' );
                }
                
                }
            });
               
           }     
      });
            
        function getfreshpaint(indexval){
           return '<select class="custom-select int-fresh-paint" name="selectfr["'+indexval+'"]" > '+
                  '<option selected>Select</option> ' +
                  '<option value="Asian Paints Tractor Emulsion" data-price="21">Asian Paints Tractor Emulsion</option> ' +
                  '<option value="Asian Paints Apcolite Premium Emulsion" data-price="24">Asian Paints Apcolite Premium Emulsion</option> ' +
                  '<option value="Asian Paints Apcolite Advance Matt Emulsion" data-price="26">Asian Paints Apcolite Advance Matt Emulsion</option> ' +
                  '<option value="Asian Paints Royale Luxury Emulsion" data-price="30">Asian Paints Royale Luxury Emulsion</option> ' + 
                  '<option value="Asian Paints Royale ATMOS" data-price="32">Asian Paints Royale ATMOS</option>' +
                  '<option value="Asian Paints Royale ASPIRA" data-price="35">Asian Paints Royale ASPIRA </option>' +
                  '</select>';
   }
            
   function getrepaint(indexval){
            return  '<select class="custom-select int-re-paint" name="selectr1[0]">'+
                       '<option selected>Select</option>'+
                       '<option value="Asian Paints Tractor Emulsion" data-price="8">Asian Paints Tractor Emulsion (8)</option>'+
                       '<option value="Asian Paints Apcolite Premium Emulsion" data-price="11">Asian Paints Apcolite Premium Emulsion</option>'+
                       '<option value="Asian Paints Apcolite Advance Matt Emulsion" data-price="15">Asian Paints Apcolite Advance Matt Emulsion</option>'+
                       '<option value="Asian Paints Royale Luxury Emulsion" data-price="19">Asian Paints Royale Luxury Emulsion</option>'+
                       '<option value="Asian Paints Royale ATMOS" data-price="20">Asian Paints Royale ATMOS</option>'+
                       '<option value="Asian Paints Royale ASPIRA" data-price="22">Asian Paints Royale ASPIRA</option>'+
                       '</select>';
    }
            
            //_______
   });
         
JS;
    $this->registerJs($script, View::POS_END);
    ?>

