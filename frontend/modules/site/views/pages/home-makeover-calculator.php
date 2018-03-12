<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;
use yii\widgets\DetailView;
use yii\helpers\Url;
use yii\bootstrap\Modal;

$this->title = 'Wall Dressup - Home-makeover-Calculator';
?>
<section class="slider-cont inner-page-heading">
    <div class="container">
        <h1>Home Makeover Calculator</h1>
    </div>
</section>
<section class="royal-play-cont"> 


    <div class="container"> 
        <div>
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="pricingcalcroyalplay modal-header ">
                        <h5 class="modal-title" id="exampleModalLongTitle">Home Make over Calculator</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> </button>
                    </div>
                    <form id="home-makeover-validate"  name="home-makeover" class="home-makeover-validate" method="post" action="">
                        <div class="modal-body">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="form-group pull-right">   
                                    <button type="button" class="btn btn-dark add-row-button" id="add-row-button"><i class="fas fa-plus "> </i> Add Row</button>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="myTable">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th scope="col">Room Name</th>
                                                <th scope="col">Plan Name</th>
                                                <th scope="col" class="home-price">Rate</th>
                                            </tr>
                                        </thead>
                                        <tbody class="tbody" id="tbody">
                                            <tr class="show-row">
                                                <td><div class="remove_row"><i class="fas fa-times-circle"></i></div></td>
                                                <td><input name="room-name[0]" type="text" class="form-control room-name"></td>
                                                <td><select class="custom-select home-makeover-select plan-name" name="plan-name[0]" >
                                                        <option selected value="" data-price="0">Select</option>
                                                        <option value="Hatchling Plan" data-price="3000">Hatchling Plan</option>
                                                        <option value="Baby Plan" data-price="6000">Baby Plan</option>
                                                        <option value="Transformation Plan" data-price="10000">Transformation Plan</option>
                                                    </select></td>
                                                <td class="text-center row-rate home-rate"><b> </b></td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                                <!--                                <div class="" id="mailme-show" style="display:none">
                                                                    <div class="form-group ">
                                                                        <div class="row mb-4">
                                                                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                <label> <b> Full Name </b> </label>
                                                                                <input name="name" type="text" class="form-control" id="name">
                                                                                <div class="form-control disabledbutton" id="met"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group ">
                                                                        <div class="row mb-4">
                                                                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                <label> <b> Email Address </b> </label>
                                                                                <input name="email" type="email" class="form-control" id="email">
                                                                                <div class="form-control disabledbutton" id="met"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <input type="hidden" name="total-price" id="total-price" value="0">
                                                                    <input type="submit" name="submit" class="btn btn1" id="final-mailme-id" value="Send"><div style="display:none" class="loading-image"><img src="themes/site_theme/images/ajax-loader.gif" alt=""></div>
                                                                    <br><br>
                                                                   
                                                                </div>-->


                                <div class="modal fade bd-example-modal-lg pricingcalc2" id="mailmepopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog  modal-sm modal-dialog-centered" role="document">
                                        <div class="modal-content2">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Mail me</h5>
                                                <button type="button" class="close" data-dismiss="modal"   aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="royal-mailme-popup" name="royal-mailme-popup"  method="post" actio="">
                                                    <div class="form-group">
                                                        <label class="control-label1">Full Name</label>
                                                        <input  type="text" id="name" name="name" class="form-control" placeholder="Enter Your Full Name" />
                                                        <div class="errorMessage"></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label1">Email address</label>
                                                        <input  type="text" id="email" name="email"  class="form-control" placeholder="Enter Your Email Address" />
                                                        <div class="errorMessage"></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label1">Phone</label>
                                                        <input  type="text" id="phone" name="phone" class="form-control" placeholder="Enter Your Phone Number" />
                                                        <div class="errorMessage"></div>
                                                    </div>
                                                    <div class="form-group center-block ">
                                                        <div class="row mb-4">
                                                            <div class="col-3 ">
                                                                <input type="submit" name="submit" class="button btn btn1 " id="final-mailme-home1" value="Send">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group mailme-show" style="display:none">
                                                        <div class="row mb-4">
                                                            <div class="col-3">
                                                                <div class="form-group" id="successMessage"> </div>
                                                                <div class="loading-image"><img src="themes/site_theme/images/ajax-loader.gif" alt=""> </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group"> 
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-right total1 "> Total : <span class="badge badge-secondary home-total"></span> </div>
                                    <input type="hidden" class="home-total" name="home-total" id="total-price" value="0">
                                </div>
                            </div>
                            <div class="modal-footer text-center">
                                <button type="button" class="btn btn2"data-toggle="modal" data-target="#Bookanotp">Book An Appointment</button>
                                <?php // Html::button('Book An Appointment', ['value' => Url::to('/bookotp'), 'class' => 'btn btn2  modalButton']) ?>
                                <!--<button type="button" class="btn btn1" id="mailme-id">Mail me</button>-->
                                <button type="button" class="btn btn1" id="mailme-home" data-toggle="modal" data-target="#mailmepopup">Mail me</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</section>



<script type="text/html" id="form_tpl">
    <tr class="show-row">
        <td><div class="remove_row"><i class="fas fa-times-circle"></i></div></td>
        <td><input name="room-name[<%= element.i %>]" type="text" class="form-control room-name"></td>
        <td><select class="custom-select home-makeover-select plan-name" name="plan-name[<%= element.i %>]" >
                <option selected value="" data-price="0">Select</option>
                <option value="Hatchling Plan" data-price="3000">Hatchling Plan</option>
                <option value="Baby Plan" data-price="6000">Baby Plan</option>
                <option value="Transformation Plan" data-price="10000">Transformation Plan</option>
            </select></td>
        <td class="text-center row-rate home-rate"><b> </b></td>
    </tr>
</script>
<?php
$mailme = Yii::$app->getUrlManager()->createUrl("site/site/mailmehome");

$script = <<< JS

    
  $(document).ready(function () {
        
//        $('#add-row-button').click(function(){
//            var rate = $('.show-row:first').find('.home-rate b');
//            var _price = rate.text();
//            rate.text('');
//            $('.show-row:last').after($('.show-row:first').clone());
//            $('.show-row:first').find('.home-rate b').text(_price);
//        });
        
        
        _.templateSettings.variable = "element";
        var tpl = _.template($("#form_tpl").html());


        var counter = 1;
        $("body").on("click", "#add-row-button", function (e) {
            e.preventDefault();
            var tplData = {
                i: counter
            };
            $("#tbody").hide().append(tpl(tplData)).show('slow');
            $('input[name="room-name['+counter+']"]').rules("add", {
                required: true
            });
            $('select[name="plan-name['+counter+']"]').rules("add", {
                required: true
            });
            counter += 1; 
        });
        
        function home_amount(){
            var total = '0';

            $('.show-row .home-makeover-select').find(':selected').each(function() { 

                total = parseInt(total) + parseInt($(this).data('price'));
            });
            //$(".home-total").text(total);
            $(".home-total").html(total);
            $("#total-price").val(total);

        }
        $('body').on('change','.home-makeover-select',function(){
            var _planprice = $(this).find(':selected').data('price');            
            $(this).closest('.show-row').find('.home-rate b').text(_planprice);
           home_amount(); 
            
            
        });
         
        $('body').on('click','.remove_row',function(){
            $(this).closest('.show-row').remove();
         home_amount();
        });
        
        $('#mailme-id').click(function() {
//                $("#mailme-show").show(); 
            $("#mailme-show").toggle('slow');
        
        });

        $("#home-makeover-validate").validate({
            rules: {
                    'email': {
                    required: true,
                    email: true,
                     },
                    'name': {
                    required: true,
                    },
                    'phone': {
                    required: true,
                    number: true,
                    },
                    'room-name[0]':{
                        required:true,
                    },
                   'plan-name[0]':{
                        required:true,
                    },

               },
            messages: {
                    'name': {
                    required :"Please Enter Your Name",
                    },
                    'phone': {
                    required :"Please Enter Your Number",
                    },
                   'email': {
                    required :"Please Enter Your Email Address",
                    },
                    'room-name[0]':{
                    required: "Please Enter Room Name",
                    },
                    'email': "Please Enter Valid Email Address",

                },

           submitHandler: function(form) {

//                var room = $('#room-name').val();
//                var rate = $('.home-rate').val();
//                var plan = $('.home-makeover-select').val();
//                var n = $('#name').val();
//                var e = $('#email').val();

                $(".mailme-show").show();  
                var form_data = $(form).serializeArray(); 
                
                $.ajax({

                    type: 'POST',
                    url: '{$mailme}',
                    data:{
                        data: form_data, 
                        form: 'home',
                         },
                    success: function(data) {                    
                    if(data == 'success'){                    
                    $("#successMessage").html( 'Your request has been send sucessfully!!' );
//                    setTimeout(function(){  $("#successMessage").hide("slow"); $("#successMessage").html(""); }, 5000);
                    $('#home-makeover-validate')[0].reset(); 
                    $("#tbody tr.show-row").not(':first').remove();
                    $("#tbody tr.show-row:first .home-rate").text('');
                    $("#total-price").val('');
                    $(".home-total").text('');
                    $('#mailme-show').hide();
                    $(".loading-image").hide(); 
                    }

                    }
                });

               }     
          });

                
      });
JS;
$this->registerJs($script, View::POS_END);
?>
