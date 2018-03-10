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
                        
                                
                                <div class="form-group"> 
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-right total1"> Total : <span class="badge badge-secondary home-total"></span> </div>
                                </div>
                            </div>
                            <div class="modal-footer text-center">
                                 <button type="button" class="btn btn2"data-toggle="modal" data-target="#Bookanotp">Book An Appointment</button>
                                <?php // Html::button('Book An Appointment', ['value' => Url::to('/bookotp'), 'class' => 'btn btn2  modalButton']) ?>
                                <button type="button" class="btn btn1" id="mailme-id">Mail me</button>
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
            $("#total-price").val(total);
            $(".home-total").text(total);
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

                $(".loading-image").show();  
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
                    setTimeout(function(){  $("#successMessage").hide("slow"); $("#successMessage").html(""); }, 5000);
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
