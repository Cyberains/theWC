<!doctype html>
<html lang="en">

<head>

    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--====== Title ======-->
    <title>Earlybasket</title>

  <!--   ==== ICON START ===== -->
  <link rel="stylesheet" type="text/css" href="css/et-line-font.css">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
<i class="fa fa-wrench"></i>
  <!-- ===== ICON END ==== -->

    <!--====== Favicon Icon ======-->

    <link rel="icon" sizes="57x57" href="{{ URL::asset('public/assets/img/spa/img/favicon.png') }}">

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="{{ URL::asset('public/assets/css/spa/bootstrap.min.css') }}">

    <!--====== Line Icons css ======-->
    <link rel="stylesheet" href="{{ URL::asset('public/assets/css/spa/LineIcons.css') }}">

    <!--====== Magnific Popup css ======-->
    <link rel="stylesheet" href="{{ URL::asset('public/assets/css/spa/magnific-popup.css') }}">

    <!--====== Slick css ======-->
    <link rel="stylesheet" href="{{ URL::asset('public/assets/css/spa/slick.css') }}">

    <!--====== Animate css ======-->
    <link rel="stylesheet" href="{{ URL::asset('public/assets/css/spa/animate.css') }}">

    <!--====== Default css ======-->
    <link rel="stylesheet" href="{{ URL::asset('public/assets/css/spa/default.css') }}">

    <!--====== Style css ======-->
    <link rel="stylesheet" href="{{ URL::asset('public/assets/css/spa/style.css') }}">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


</head>

<body>
    
    <!--====== PRELOADER PART START ======-->

    <div class="preloader">
        <div class="loader">
            <div class="ytp-spinner">
                <div class="ytp-spinner-container">
                    <div class="ytp-spinner-rotator">
                        <div class="ytp-spinner-left">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                        <div class="ytp-spinner-right">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--====== PRELOADER PART ENDS ======-->

    <!--====== NAVBAR PART START ======-->
    <section class="header-area">
        <div class="navbar-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="{{ route('spa.home') }}">
                               <!--  <img src="images/logo.png" alt="Logo"> -->
                               <img src="{{ URL::asset('public/assets/img/spa/img/800x300-done2.png') }}" alt="Logo">
                            </a>

                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarEight" aria-controls="navbarEight" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarEight">
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item active">
                                        <a class="page-scroll" href="#home">HOME</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#about">ABOUT</a>
                                    </li>
                                  <!--   <li class="nav-item">
                                        <a class="page-scroll" href="#portfolio">HOW IT WORKS</a>
                                    </li> -->
                                      <li class="nav-item">
                                        <a class="page-scroll" href="#how-it-works">OUR PROCESS</a>
                                    </li>
                                    <!-- <li class="nav-item">
                                        <a class="page-scroll" href="#pricing"> OUR TEAM</a>
                                    </li> -->
                                    <!-- <li class="nav-item">
                                        <a class="page-scroll" href="#testimonial">TESTIMONIAL</a>
                                    </li> -->
                                   
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#contact">CONTACT</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- 
                                <div class="navbar-btn d-none mt-15 d-lg-inline-block">
                                <a class="menu-bar" href="#side-menu-right"><i class="lni-menu"></i></a>
                            </div> -->
                        </nav> <!-- navbar -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- navbar area -->
        
        <div id="home" class="slider-area" style="padding-top: 70px">
            <div class="bd-example">
                <div id="carouselOne" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselOne" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselOne" data-slide-to="1"></li>
                        <li data-target="#carouselOne" data-slide-to="2"></li>
                    </ol>

                    <div class="carousel-inner">
                    @if($banners->count())
                     @foreach($banners as $key=>$item)
                     <?php $image =imageBasePath($item->image)  ?>
                        <div class="carousel-item bg_cover {{$key==0?'active':''}}" style="background-image: url({{ URL::asset($image) }})">
                            <div class="carousel-caption">
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-xl-6 col-lg-7 col-sm-10">
                                            <h2 class="carousel-title">Everything at your doorstep</h2>
                                        </div>
                                    </div> <!-- row -->
                                </div> <!-- container -->
                            </div> <!-- carousel caption -->
                        </div> <!-- carousel-item -->
                        @endforeach
                        @endif
 
                    </div> <!-- carousel-inner -->

                    <a class="carousel-control-prev" href="#carouselOne" role="button" data-slide="prev">
                        <i class="lni-arrow-left-circle"></i>
                    </a>

                    <a class="carousel-control-next" href="#carouselOne" role="button" data-slide="next">
                        <i class="lni-arrow-right-circle"></i>
                    </a>
                </div> <!-- carousel -->
            </div> <!-- bd-example -->
        </div>

    </section>
     <!--====== NAVBAR PART END ======-->

    <!--====== SAIDEBAR PART START ======-->

   <!--  <div class="sidebar-right">
        <div class="sidebar-close">
            <a class="close" href="#close"><i class="lni-close"></i></a>
        </div>
        <div class="sidebar-content">
            <div class="sidebar-logo text-center"> -->
                <!-- <a href="#"><img src="images/logo-alt.png" alt="Logo"></a> -->
              <!--   <a href="#"><img src="images/img/800x300-done2.png" alt="Logo"></a>
            </div> --> <!-- logo -->
          <!--   <div class="sidebar-menu">
                <ul>
                    <li><a href="#">ABOUT</a></li>
                    <li><a href="#">SERVICES</a></li>
                    <li><a href="#">RESOURCES</a></li>
                    <li><a href="#">CONTACT</a></li>
                </ul>
            </div>  --><!-- menu -->
            <!-- <div class="sidebar-social d-flex align-items-center justify-content-center">
                <span>FOLLOW US</span>
                <ul>
                    <li><a href="#"><i class="lni-twitter-original"></i></a></li>
                    <li><a href="#"><i class="lni-facebook-filled"></i></a></li>
                </ul>
            </div> --> <!-- sidebar social -->
        <!-- </div> --> <!-- content -->
    </div>
    <div class="overlay-right"></div>

    <!--====== SAIDEBAR PART ENDS ======-->
    
     <!--====== ABOUT PART START ======-->
  
    <section id="about" class="about-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-12 col-lg-8">
                    {{-- <div class="about-image text-center wow fadeInUp" data-wow-duration="1.5s" data-wow-offset="100">
                        <h4 class="size">GET US ON!</h4>
                        <!-- <img src="images/services.JPG" alt="services"> -->
                        <img style="width:15%;" src="{{ URL::asset('public/assets/img/spa/icon/google play store button 1.jpg') }}" alt="services">

                         <img style="width:15%;" src="{{ URL::asset('public/assets/img/spa/icon/app_play_store_button1.png') }}" alt="services">
                    </div> --}}
                    <div class="section-title text-center mt-30 pb-40">
                        <h4 class="title wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.6s" style="font-family: cardo;">Most hassle-free offline & online store with best delivery system.</h4>
                        <p class="text wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="1s">Early Basket main aim is to reach earliest at your Doorstep to provide all your Grocery Needs.</p>
                    </div> <!-- section title --> 
                </div>
            </div> <!-- row -->
            
            <div class="row">
                <div class="col-md-12">
                    <h3 class="text-center mb-3">What is Early Basket ?</h3>
                    <p>earlybasket.com (Innovative Retail Concepts India Private Limited) is Delhi NCR  largest online & offline food and grocery store. With over 18,000 products and over a 1000 brands in our catalogue you will find everything you are looking for. Right from fresh Fruits and Vegetables, Rice and Dals, Spices and Seasonings to Packaged products, Beverages, Personal care products, Meats – we have it all.</p>
                    <p>Choose from a wide range of options in every category, exclusively handpicked to help you find the best quality available at the lowest prices. Select a time slot for delivery and your order will be delivered right to your doorstep, anywhere in Delhi NCR, Gurgaon City ,Urban Areas & Rural Areas You can pay online using your debit / credit card or by cash / sodexo on delivery.We guarantee on time delivery, and the best quality!</p>
                </div>
                <div class="col-md-12">
                    <h3 class="text-center mb-3">Why should I use earlybasket.com?</h3>
                    <p>earlybasket.com allows you to walk away from the drudgery of grocery shopping and welcome an easy relaxed way of browsing and shopping for groceries. Discover new products and shop for all your food and grocery needs from the comfort of your home or office. No more getting stuck in traffic jams, paying for parking , standing in long queues and carrying heavy bags – get everything you need, when you need, right at your doorstep. Food shopping online is now easy as every product on your monthly shopping list, is now available online at earlybasket.com, Delhi NCR, best online & offline grocery store.</p>
                </div>
                <div class="col-lg-6">
                    <div class="single-about d-sm-flex mt-30 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="1.2s">
                        <div class="about-icon">
                            <!-- <img src="images/icon-1.png" alt="Icon"> -->
                             <img src="{{ URL::asset('public/assets/img/spa/icon/001-groceries.png') }}" alt="Icon">
                        </div>
                        <div class="about-content media-body">
                            <h4 class="about-title">
Availability of Variety Goods</h4>
                            <p class="text">We maintain a large variety of all the goods and thus, help customers in the selection of best goods.</p>
                        </div>
                    </div> <!-- single about -->
                </div>
                <div class="col-lg-6">
                    <div class="single-about d-sm-flex mt-30 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="1.4s">
                        <div class="about-icon">
                            <!-- <img src="images/icon-2.png" alt="Icon"> -->
                             <img src="{{ URL::asset('public/assets/img/spa/icon/002-supermarket.png') }}" alt="Icon">
                        </div>
                        <div class="about-content media-body">
                            <h4 class="about-title">Availability of Standard Goods</h4>
                            <p class="text">We deal only in standard goods. We believe that customers should pay the right amount for the right goods and their quantity with best quality .</p>
                        </div>
                    </div> <!-- single about -->
                </div>
                <div class="col-lg-6">
                    <div class="single-about d-sm-flex mt-30 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="1.6s">
                        <div class="about-icon">
                            <img src="{{ URL::asset('public/assets/img/spa/icon/004-money.png') }}" alt="Icon">
                        </div>
                        <div class="about-content media-body">
                            <h4 class="about-title"> Freedom of Selection</h4>
                            <p class="text">Customers enjoy full freedom of selection . As we don't keep any boundaries,  customers can select goods of their own choice.</p>
                        </div>
                    </div> <!-- single about -->
                </div>
                <div class="col-lg-6">
                    <div class="single-about d-sm-flex mt-30 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="1.8s">
                        <div class="about-icon">
                            <img src="{{ URL::asset('public/assets/img/spa/icon/005-discount.png') }}" alt="Icon">
                        </div>
                        <div class="about-content media-body">
                            <h4 class="about-title">Lower Prices</h4>
                            <p class="text"> Prices of goods are generally kept low at Early Basket. Thus, this is suitable for all kind of consumers.</p>
                        </div>
                    </div> <!-- single about -->
                </div>

            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== ABOUT PART ENDS ======-->
    
<!--=======test start ====== -->
<div id="how-it-works" class="pt75">
        <div class="container">
            <div class="row mb-4">

                <!-- title start -->
                <div class="col-md-12 text-center mt-3">
                    <h1 class="font-size-normal">
                        <small>How it works</small><br>
                        Top it &nbsp;<i class="fa fa-circle" style="font-size:6px;vertical-align: middle;"></i> &nbsp;Set it&nbsp; <i class="fa fa-circle" style="font-size:6px;vertical-align: middle;"></i> &nbsp;Get it
                        <small class="heading heading-solid center-block"></small>
                    </h1>
                </div>
                <!-- title end -->
            </div>

            <div class="row mt50">

                <!-- item one start -->
                <div class="col-md-4 col-sm-6 col-xs-6 animated fadeInLeft visible" data-animation="fadeInLeft" data-animation-delay="100">
                    <div class="content-box content-box-icon-o-circle content-box-center">
                        <span class="icon-wallet color-blue"></span>
                        <img src="{{ URL::asset('public/assets/img/spa/icon/010-wallet.png') }}" alt="Girl in a jacket" width="55" height="55">
                        <h5 class="pt-13">Topup &amp; Start</h5>
                        <p class="font ml-2 mr-2">Just register with your basic details and top-up your Earlybasket wallet with any pre-defined amount.</p>

                    </div>
                </div>
                <!-- item one end -->

                <!-- item two start -->
                <div class="col-md-4 col-sm-6 col-xs-6 animated fadeInLeft visible" data-animation="fadeInLeft" data-animation-delay="200">
                    <div class="content-box content-box-icon-o-circle content-box-center">
                        <span class="icon-browser color-blue"></span>
                         <img src="{{ URL::asset('public/assets/img/spa/icon/008-browser-2.png') }}" alt="Girl in a jacket" width="55" height="55">

                        <h5 class="pt-13">Set Order</h5>
                        <p class="font ml-2 mr-2">Create a repeat order or order anytime till midnight from a wide selection of 5000+ products for all or any of your daily needs.</p>

                    </div>
                </div>
                <!-- item two end -->

                <!-- item three start -->
                <div class="col-md-4 col-sm-6 col-xs-6 animated fadeInRight visible" data-animation="fadeInRight" data-animation-delay="300">
                    <div class="content-box content-box-icon-o-circle content-box-center">
                        <span class="icon-bike color-blue"></span>
                        <div class="circle">
                           <img src="{{ URL::asset('public/assets/img/spa/icon/004-road-bike.png') }}" alt="Girl in a jacket" width="55" height="55"> 
                        </div>
                        
                        <h5 class="pt-13">We Deliver</h5>
                        <p class="font ml-2 mr-2">Our excellent delivery team will place your order at your doorstep. Just open your door and pick it up anytime after 7:00 am</p>

                    </div>
                </div>
                <!-- item three end -->

            </div>
        </div>
    </div>

<!-- ====== test end =====-->

    <!--====== portfolio PART START ======-->
<?php 
// include 'how-it-works.php'; 
?>

    <!--====== portfolio PART ENDS ======-->
    
    <!--====== PRINICNG STYLE EIGHT START ======-->

    <?php 
    // include 'our-team.php';
     ?>

    <!--====== PRINICNG STYLE EIGHT ENDS ======-->
    
    <!--====== CALL TO ACTION TWO PART START ======-->

    <section id="call-action" class="call-action-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <div class="call-action-content mt-45">
                        <h3 class="action-title">Get latest updates!</h3>
                        <p class="text">We never spam your email</p>
                    </div> <!-- call action content -->
                </div>
                <div class="col-lg-7">
                    <div class="call-action-form mt-50">
                        <form action="#">
                            <input type="text" placeholder="Enter your email">
                            <div class="action-btn rounded-buttons">
                                <button class="main-btn rounded-three">subscribe</button>
                            </div>
                        </form>
                    </div> <!-- call action form -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== CALL TO ACTION TWO PART ENDS ======-->
    
    <!--====== TESTIMONIAL THREE PART START ======-->
<?php 
// include 'testimonial.php'; 
?>

    <!--====== TESTIMONIAL THREE PART ENDS ======-->
    
    <!--====== CLIENT LOGO PART START ======-->

    <section id="client" class="client-logo-area">
        <div class="container">
            <div class="row client-active">
                <div class="col-lg-3">
                    <div class="single-client text-center">
                        <img src="{{ URL::asset('public/assets/img/spa/icon/brand/Brittania.jpg') }}" alt="Logo">
                    </div> <!-- single client -->
                </div>
                <div class="col-lg-3">
                    <div class="single-client text-center">
                        <img src="{{ URL::asset('public/assets/img/spa/icon/brand/parle.jpg') }}" alt="Logo">
                    </div> <!-- single client -->
                </div>
                <div class="col-lg-3">
                    <div class="single-client text-center">
                        <img src="{{ URL::asset('public/assets/img/spa/icon/brand/detol_logo___2.png') }}" alt="Logo">
                    </div> <!-- single client -->
                </div>
                <div class="col-lg-3">
                    <div class="single-client text-center">
                        <img src="{{ URL::asset('public/assets/img/spa/icon/brand/Nivea   logo .jpg') }}" alt="Logo">
                    </div> <!-- single client -->
                </div>
                <div class="col-lg-3">
                    <div class="single-client text-center">
                        <img src="{{ URL::asset('public/assets/img/spa/icon/brand/dabur   logo .jpg') }}" alt="Logo">
                    </div> <!-- single client -->
                </div>
                <div class="col-lg-3">
                    <div class="single-client text-center">
                        <img src="{{ URL::asset('public/assets/img/spa/icon/brand/Herbica   logo .jpg') }}" alt="Logo">
                    </div> <!-- single client -->
                </div>
                <div class="col-lg-3">
                    <div class="single-client text-center">
                        <img src="{{ URL::asset('public/assets/img/spa/icon/brand/veeba.jpg') }}" alt="Logo">
                    </div> <!-- single client -->
                </div>
                <div class="col-lg-3">
                    <div class="single-client text-center">
                        <img src="{{ URL::asset('public/assets/img/spa/icon/brand/detol logo .jpg') }}" alt="Logo">
                    </div> <!-- single client -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== CLIENT LOGO PART ENDS ======-->
    
     



  <!--====== CONTACT TWO PART START ======-->

    <section id="contact" class="contact-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-title text-center pb-20">
                        <h3 class="title">Get in touch</h3>
                        <!-- <p class="text">Stop wasting time and money designing and managing a website that doesn’t get results. Happiness guaranteed!</p> -->
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="contact-two mt-50 wow fadeIn" data-wow-duration="1.5s" data-wow-delay="0.2s">
                        <h4 class="contact-title">CONTACT US</h4>
                        <!-- <p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam unde repellendus delectus facilis quia consequatur maxime perferendis! Sequi, modi consequatur.</p> -->
                        <ul class="contact-info">
                            <li><i class="lni-money-location"></i>Shop No-10 & 11,Suncity Avenue,Sector-102,Gurgaon,Haryana,122001</li>
                            <li><i class="lni-phone-handset"></i> +91-800-8271-800, 0124-793-7177</li>
                            <!-- <li><i class="lni-envelope"></i> support@earlybasket.com</li> -->
                        </ul>
                    </div> <!-- contact two -->
                </div>
                <div class="col-lg-6">
                    <div class="contact-form form-style-one mt-35 wow fadeIn" data-wow-duration="1.5s" data-wow-delay="0.5s">
                        <form  id="contact-form" action="{{ route('user.contact') }}" method="post">
                            @csrf
                            <div class="form-input mt-15">
                                <label>Name</label>
                                <div class="input-items default">
                                    <input type="text" placeholder="Name" name="name" required>
                                    <i class="lni-user"></i>
                                </div>
                            </div> <!-- form input -->
                            <div class="form-input mt-15">
                                <label>Email</label>
                                <div class="input-items default">
                                    <input type="email" placeholder="Email" name="email" required>
                                    <i class="lni-envelope"></i>
                                </div>
                            </div> <!-- form input -->
                             <div class="form-input mt-15">
                                <label>Phone</label>
                                <div class="input-items default">
                                    <input type="tel" placeholder="Phone" name="telNo" required>
                                    <i class="lni-phone-handset"></i>
                                </div>
                            </div> <!-- form input -->
                            <div class="form-input mt-15">
                                <label>Message</label>
                                <div class="input-items default">
                                    <textarea placeholder="Message" name="message" required></textarea>
                                    <i class="lni-pencil-alt"></i>
                                </div>
                            </div> <!-- form input -->
                            <p class="form-message"></p>
                            <div class="form-input rounded-buttons mt-20">
                                <button type="submit" name="btn" class="main-btn rounded-three">Submit</button>
                            </div> <!-- form input -->
                        </form>
                    </div> <!-- contact form -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== CONTACT TWO PART ENDS ======-->    
    <!--====== FOOTER FOUR PART START ======-->

    <footer id="footer" class="footer-area">
        <div class="footer-widget bb-solid-1">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="footer-link">
                            <h6 class="footer-title">About</h6>
                            <p class="text-justify pt-3">
                               earlybasket.com (Innovative Retail Concepts India Private Limited) is Delhi NCR  largest online & offline food and grocery store. With over 18,000 products and over a 1000 brands in our catalogue you will find everything you are looking for. 
                            </p>
                           <!--  <ul>
                                <li><a href="#">About</a></li>
                                <li><a href="#">Contact</a></li>
                                <li><a href="#">Profile</a></li>
                            </ul> -->
                        </div> <!-- footer link -->
                    </div>
                    <div class="col-lg-3 col-sm-6 margin-left">
                        <div class="footer-link">
                            <h6 class="footer-title">Popular Categories</h6>
                            <ul>
                                <li><a href="#">Health Drinks</a></li>
                                <li><a href="#">Wheat Atta</a></li>
                                <li><a href="#">Diapers & Wipes</a></li>
                                <li><a href="#">Sunflower Oil</a></li>
                            </ul>
                        </div> <!-- footer link -->
                    </div>
                    <div class="col-lg-3 col-sm-6 margin-left">
                        <div class="footer-link">
                            <h6 class="footer-title">Important Links</h6>
                            <ul>
                                <li><a href="{{ route('spa.privacy') }}">Privacy Policy</a></li>
                                <li><a href="{{ route('spa.terms') }}">Terms & Conditions</a></li>
                                <li><a href="{{ route('spa.disclaimer') }}">Disclaimer</a></li>
                                <!-- <li><a href="#">Bru</a></li> -->
                                <li><a href="{{ route('spa.refund') }}">Return and Refund Policy</a></li>
                            </ul>
                        </div> <!-- footer link -->
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="footer-link">
                            <h6 class="footer-title">Visit Our Store</h6>
                            <!-- <ul>
                                <li><a href="#">Support Center</a></li>
                                <li><a href="#">FAQ</a></li>
                                <li><a href="#">Terms & Conditions</a></li>
                            </ul> -->
                            <ul>
                                <p class="text-footer"><i class="fa fa-map-signs fw pr-1"></i>Shop No-10 & 11,Suncity Avenue,Sector-102,Gurgaon,Haryana,122001</p>
                                <li class="text-justify"><i class="fa fa-phone pr-1"></i><a href="tel:918008271800">    Call Now (+91) 800-8271-800</a></li>
<!--                                <li><i class="fa fa-phone pr-2"></i><a href="tel:1800-212-3667">Toll Free No : 1800-212-3667</a></li> -->
                                <li><i class="fa fa-phone pr-1"></i><a href="tel:0124-793-7177">  Phone No : 0124-793-7177</a></li>
                               <!--  <li class="text-justify"><i class="fab fa-whatsapp pr-2"></i><a href="https://api.whatsapp.com/send?phone=918008271800" target="_blank">(+91) 800-8271-800</a></li> -->
                                <li><i class="fa fa-envelope pr-1"></i><a href="mailto:contactus@earlybasket.com" target="_blank"> support@earlybasket.com</a></li>
                            </ul>
                        </div> <!-- footer link -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- footer widget -->
        
        <div class="footer-copyright">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5">
                        <div class="copyright text-center text-lg-left mt-10">
                            <p class="text">Copyright © 2021 All Rights Reserved By <a style="color: #d11f2f" rel="nofollow" href="https://earlybasket.com/" target="_blank">Early Basket</a></p>
                        </div> <!--  copyright -->
                    </div>
                    <div class="col-lg-2">
                        <div class="footer-logo text-center mt-10">
                            <!-- <a href="index.html"><img src="images/logo-2.svg" alt="Logo"></a> -->
                            <a href="{{ route('spa.home') }}"><img src="{{ URL::asset('public/assets/img/spa/img/favicon.png') }}" alt="Logo"></a>
                        </div> <!-- footer logo -->
                    </div>
                    <div class="col-lg-5">
                        <ul class="social text-center text-lg-right mt-10">
                            <li><a href="https://www.facebook.com/earlybasketapp/"><i class="lni-facebook-filled"></i></a></li>
                            <li><a href="#"><i class="lni-twitter-original"></i></a></li>
                            <li><a href="#"><i class="lni-instagram-original"></i></a></li>
                            <li><a href="#"><i class="lni-linkedin-original"></i></a></li>
                        </ul> <!-- social -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- footer copyright -->
    </footer>

    <!--====== FOOTER FOUR PART ENDS ======-->
    
    <!--====== BACK TOP TOP PART START ======-->

    <a href="#" class="back-to-top"><i class="lni-chevron-up"></i></a>

    <!--====== BACK TOP TOP PART ENDS ======-->  

    <!--====== PART START ======-->



    <!--====== PART ENDS ======-->










    <!--====== jquery js ======-->
    <script src="{{ URL::asset('public/assets/js/spa/vendor/modernizr-3.6.0.min.js') }}"></script>
    <script src="{{ URL::asset('public/assets/js/spa/vendor/jquery-1.12.4.min.js') }}"></script>

    <!--====== Bootstrap js ======-->
    <script src="{{ URL::asset('public/assets/js/spa/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('public/assets/js/spa/popper.min.js') }}"></script>

    <!--====== Slick js ======-->
    <script src="{{ URL::asset('public/assets/js/spa/slick.min.js') }}"></script>

    <!--====== Isotope js ======-->
    <script src="{{ URL::asset('public/assets/js/spa/isotope.pkgd.min.js') }}"></script>

    <!--====== Images Loaded js ======-->
    <script src="{{ URL::asset('public/assets/js/spa/imagesloaded.pkgd.min.js') }}"></script>

    <!--====== Magnific Popup js ======-->
    <script src="{{ URL::asset('public/assets/js/spa/jquery.magnific-popup.min.js') }}"></script>

    <!--====== Scrolling js ======-->
    <script src="{{ URL::asset('public/assets/js/spa/scrolling-nav.js') }}"></script>
    <script src="{{ URL::asset('public/assets/js/spa/jquery.easing.min.js') }}"></script>

    <!--====== wow js ======-->
    <script src="{{ URL::asset('public/assets/js/spa/wow.min.js') }}"></script>

    <!--====== Main js ======-->
    <script src="{{ URL::asset('public/assets/js/spa/main.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <script type="text/javascript">

    @if(Session::has('message'))

          toastr.options =
          {
            "closeButton" : true,
            "progressBar" : true
          }
          toastr.success("{{ session('message') }}");

    @endif

    </script>

</body>

</html>
