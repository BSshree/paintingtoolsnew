<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;
use yii\widgets\DetailView;
use yii\helpers\Url;
use yii\bootstrap\Modal;

$this->title = 'Wall Dressup - Wallpapers';
?>
<section class="slider-cont inner-page-heading">
    <div class="container">
        <h1>Designers Wall</h1>
    </div>
</section>
<section class="general-painting1 designers-wall-cont">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4"> 
                <div class="thumnails-cont"> 
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 heading1" id="1">
                            <h2> Basic Wallpapers</h2>
                            <span>₹2850 per roll</span> </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4 wallpaper-thumb">
                            <p> <img src="themes/site_theme/images/bas1.jpg"  alt=""></p>
                            <p> Classy Wall Paper 1 </p>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4 wallpaper-thumb">
                            <p> <img src="themes/site_theme/images/bas2.png"  alt=""></p>
                            <p> Classy Wall Paper 2 </p>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4 wallpaper-thumb">
                            <p> <img src="themes/site_theme/images/bas3.jpg"  alt=""></p>
                            <p> Classy Wall Paper 3 </p>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4 wallpaper-thumb">
                            <p> <img src="themes/site_theme/images/bas4.jpg"  alt=""></p>
                            <p> Classy Wall Paper 4 </p>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4 wallpaper-thumb">
                            <p> <img src="themes/site_theme/images/bas5.jpg"  alt=""></p>
                            <p> Classy Wall Paper 5 </p>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4 wallpaper-thumb">
                            <p> <img src="themes/site_theme/images/w6.png"  alt=""></p>
                            <p> Classy Wall Paper 6</p>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center"> 
                            <a href="#" class="btn btn1 btn1-1" data-toggle="modal" data-service="Wallpapers" data-target="#Bookanotp"> Book an appointment ! </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4"> 

                <div class="thumnails-cont"> 
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 heading1" id="1">
                            <h2>Regular Wallpapers</h2>
                            <span>₹4275 per roll</span> </div>


                        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4 wallpaper-thumb">
                            <p> <img src="themes/site_theme/images/w5.png"  alt=""></p>
                            <p> Classy Wall Paper 1 </p>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4 wallpaper-thumb">
                            <p> <img src="themes/site_theme/images/reg2.jpg"  alt=""></p>
                            <p> Classy Wall Paper 2 </p>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4 wallpaper-thumb">
                            <p> <img src="themes/site_theme/images/reg3.jpg"  alt=""></p>
                            <p> Classy Wall Paper 3 </p>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4 wallpaper-thumb">
                            <p> <img src="themes/site_theme/images/reg4.jpg"  alt=""></p>
                            <p> Classy Wall Paper 4 </p>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4 wallpaper-thumb">
                            <p> <img src="themes/site_theme/images/reg5.png"  alt=""></p>
                            <p> Classy Wall Paper 5 </p>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4 wallpaper-thumb">
                            <p> <img src="themes/site_theme/images/w1.png"  alt=""></p>
                            <p> Classy Wall Paper 6</p>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center"> 
                            <a href="#" class="btn btn1 btn1-1" data-toggle="modal" data-servicename="Wallpapers" data-target="#Bookanotp"> Book an appointment ! </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4 "> 
                <div class="thumnails-cont"> 
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 heading1" id="1">
                            <h2>Premium Wallpapers</h2>
                            <span>₹5415 per roll</span> </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4 wallpaper-thumb">
                            <p> <img src="themes/site_theme/images/pre2.png"  alt=""></p>
                            <p> Classy Wall Paper 1 </p>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4 wallpaper-thumb">
                            <p> <img src="themes/site_theme/images/pr5.png"  alt=""></p>
                            <p> Classy Wall Paper 2 </p>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4 wallpaper-thumb">
                            <p> <img src="themes/site_theme/images/pr6.png"  alt=""></p>
                            <p> Classy Wall Paper 3 </p>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4 wallpaper-thumb">
                            <p> <img src="themes/site_theme/images/pre4.jpg"  alt=""></p>
                            <p> Classy Wall Paper 4 </p>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4 wallpaper-thumb">
                            <p> <img src="themes/site_theme/images/pre3.jpg"  alt=""></p>
                            <p> Classy Wall Paper 5 </p>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4 wallpaper-thumb">
                            <p> <img src="themes/site_theme/images/pre1.png"  alt=""></p>
                            <p> Classy Wall Paper 6</p>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center"> 
                            <a href="#" class="btn btn1 btn1-1" data-toggle="modal" data-servicename="Wallpapers" data-target="#Bookanotp"> Book an appointment ! </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-10 wall-conten">
        <div class="gp-txt3">
            <p><b class="dis-bold">*Disclaimer:</b><br>
                <b>  1. The above online catalogue is just tentative and may vary any time. Kindly refer the physical catalogue for the actual product.<br>
                    2. Avail 10 % discount if you buy more than 1 roll.<br>
                    3. Each roll is 57 sq.ft
                </b></p>
        </div>
    </div>
</section>
<div class="inner-gallery-cont">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 heading1">
                <h2>Wallpapers  gallery </h2>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="owl-carousel owl-theme"  id="inner-gallery-carousel">
                    <div class="item"> <img src="themes/site_theme/images/wallpaper1.jpg"  alt=""></div>
                    <div class="item"> <img src="themes/site_theme/images/wallpaper2.jpg"  alt=""></div>
                    <div class="item"> <img src="themes/site_theme/images/wallpaper3.jpg"  alt=""></div>
                    <div class="item"> <img src="themes/site_theme/images/wallpaper4.jpg"  alt=""></div>
                    <div class="item"> <img src="themes/site_theme/images/wallpaper5.jpg"  alt=""></div>
                    <div class="item"> <img src="themes/site_theme/images/wallpaper6.jpg"  alt=""></div>
                </div>
            </div>
        </div>
    </div>
</div>