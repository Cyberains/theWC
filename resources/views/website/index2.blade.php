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
   
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <i class="fa fa-wrench"></i>
    <!-- ===== ICON END ==== -->

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="{{ URL::asset('public/assets/img/spa/img/favicon.png') }}" type="image/png">

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

    <!--====== NAVBAR PART START ======-->
 <section class="header-area">
        <div class="navbar-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="#">
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
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#pricing"> OUR TEAM</a>
                                    </li>
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
        
        <div id="home" class="slider-area">
            <div class="bd-example">
                <div id="carouselOne" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselOne" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselOne" data-slide-to="1"></li>
                        <li data-target="#carouselOne" data-slide-to="2"></li>
                    </ol>

                    <div class="carousel-inner">
                        <div class="carousel-item bg_cover active" style="background-image: url({{ URL::asset('public/assets/img/spa/slider-11.jpg') }})">
                            <div class="carousel-caption">
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-xl-6 col-lg-7 col-sm-10">
                                            <h2 class="carousel-title">Everything at your doorstep</h2>
                                           <!--  <ul class="carousel-btn rounded-buttons">
                                                <li><a class="main-btn rounded-three" href="#">GET STARTED</a></li>
                                                <li><a class="main-btn rounded-one" href="#">DOWNLOAD</a></li>
                                            </ul> -->
                                        </div>
                                    </div> <!-- row -->
                                </div> <!-- container -->
                            </div> <!-- carousel caption -->
                        </div> <!-- carousel-item -->

                        <div class="carousel-item bg_cover" style="background-image: url({{ URL::asset('public/assets/img/spa/slider-013.jpg') }})">
                            <div class="carousel-caption">
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-xl-6 col-lg-7 col-sm-10">
                                          <!--   <h2 class="carousel-title">Everything at your doorstep</h2> -->
                                            <!-- <ul class="carousel-btn rounded-buttons">
                                                <li><a class="main-btn rounded-three" href="#">GET STARTED</a></li>
                                                <li><a class="main-btn rounded-one" href="#">DOWNLOAD</a></li>
                                            </ul> -->
                                        </div>
                                    </div> <!-- row -->
                                </div> <!-- container -->
                            </div> <!-- carousel caption -->
                        </div> <!-- carousel-item -->

                        <div class="carousel-item bg_cover" style="background-image: url({{ URL::asset('public/assets/img/spa/slider-014.jpg') }})">
                            <div class="carousel-caption">
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-xl-6 col-lg-7 col-sm-10">
                                           <!--  <h2 class="carousel-title">Everything at your doorstep</h2> -->
                                           <!--  <ul class="carousel-btn rounded-buttons">
                                                <li><a class="main-btn rounded-three" href="#">GET STARTED</a></li>
                                                <li><a class="main-btn rounded-one" href="#">DOWNLOAD</a></li>
                                            </ul> -->
                                        </div>
                                    </div> <!-- row -->
                                </div> <!-- container -->
                            </div> <!-- carousel caption -->
                        </div> <!-- carousel-item -->
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

    <!--====== NAVBAR PART ENDS ======-->

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
                    <div class="about-image text-center wow fadeInUp" data-wow-duration="1.5s" data-wow-offset="100">
                        <h4 class="size">GET US ON!</h4>
                        <!-- <img src="images/services.JPG" alt="services"> -->
                        <img style="width:15%;" src="{{ URL::asset('public/assets/img/spa/icon/google play store button 1.jpg') }}" alt="services">

                         <img style="width:15%;" src="{{ URL::asset('public/assets/img/spa/icon/app_play_store_button1.png') }}" alt="services">
                    </div>
                    <div class="section-title text-center mt-30 pb-40">
                        <h4 class="title wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.6s">Most hassle-free offline & online store with best delivery system.</h4>
                        <p class="text wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="1s">Early Basket main aim is to reach earliest at your Doorstep to provide all your Grocery Needs.</p>
                    </div> <!-- section title --> 
                </div>
            </div> <!-- row -->
            
            <div class="row">
                <div class="col-lg-6">
                    <div class="single-about d-sm-flex mt-30 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="1.2s">
                        <div class="about-icon">
                            <!-- <img src="images/icon-1.png" alt="Icon"> -->
                             <img src="{{ URL::asset('public/assets/img/spa/icon-01.jpg') }}" alt="Icon">
                        </div>
                        <div class="about-content media-body">
                            <h4 class="about-title">
                                Availability of Variety Goods</h4>
                            <p class="text">we maintain a large variety of all the goods and thus, help customers in the selection of best goods.</p>
                        </div>
                    </div> <!-- single about -->
                </div>
                <div class="col-lg-6">
                    <div class="single-about d-sm-flex mt-30 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="1.4s">
                        <div class="about-icon">
                            <!-- <img src="images/icon-2.png" alt="Icon"> -->
                             <img src="{{ URL::asset('public/assets/img/spa/icon-02.jpg') }}" alt="Icon">
                        </div>
                        <div class="about-content media-body">
                            <h4 class="about-title">Availability of Standard Goods</h4>
                            <p class="text">we deal only in standard goods. Customers believe that they are paying the right price for the right goods of the right quantity..</p>
                        </div>
                    </div> <!-- single about -->
                </div>
                <div class="col-lg-6">
                    <div class="single-about d-sm-flex mt-30 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="1.6s">
                        <div class="about-icon">
                            <img src="{{ URL::asset('public/assets/img/spa/icon-03.jpg') }}" alt="Icon">
                        </div>
                        <div class="about-content media-body">
                            <h4 class="about-title"> Freedom of Selection</h4>
                            <p class="text">Customers enjoy full freedom of selection . As salesman are not appointed in the markets, customers select goods of their choice on their own.</p>
                        </div>
                    </div> <!-- single about -->
                </div>
                <div class="col-lg-6">
                    <div class="single-about d-sm-flex mt-30 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="1.8s">
                        <div class="about-icon">
                            <img src="{{ URL::asset('public/assets/img/spa/icon-04.jpg') }}" alt="Icon">
                        </div>
                        <div class="about-content media-body">
                            <h4 class="about-title">Lower Prices</h4>
                            <p class="text"> Prices of goods are generally kept low at the Early Basket. Thus, this market are suitable for both rich and poor people.</p>
                        </div>
                    </div> <!-- single about -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== ABOUT PART ENDS ======-->
    
    <!-- =======test start ====== -->

    <div id="how-it-works" class="pt75">
        <div class="container">
            <div class="row mt-4">

                <!-- title start -->
                <div class="col-md-12 text-center">
                    <h1 class="font-size-normal">
                        <small>How it works</small>
                        Top it &nbsp;<i class="fa fa-circle" style="font-size:6px;vertical-align: middle;"></i> &nbsp;Set it&nbsp; <i class="fa fa-circle" style="font-size:6px;vertical-align: middle;"></i> &nbsp;Get it
                        <small class="heading heading-solid center-block"></small>
                    </h1>
                </div>
                <!-- title end -->
            </div>

            <div class="row mt50 mb-4">

                <!-- item one start -->
                <div class="col-md-4 col-sm-6 col-xs-6 animated fadeInLeft visible" data-animation="fadeInLeft" data-animation-delay="100">
                    <div class="content-box content-box-icon-o-circle content-box-center">
                        <span class="icon-wallet color-blue"></span>
                        <img src="{{ URL::asset('public/assets/img/spa/icon/010-wallet.png') }}" alt="Girl in a jacket" width="40" height="40">
                        <h5>Topup &amp; Start</h5>
                        <p>Just register with your basic details and top-up your Earlybasket wallet with any pre-defined amount.</p>

                    </div>
                </div>
                <!-- item one end -->

                <!-- item two start -->
                <div class="col-md-4 col-sm-6 col-xs-6 animated fadeInLeft visible" data-animation="fadeInLeft" data-animation-delay="200">
                    <div class="content-box content-box-icon-o-circle content-box-center">
                        <span class="icon-browser color-blue"></span>
                         <img src="{{ URL::asset('public/assets/img/spa/icon/008-browser-2.png') }}" alt="Girl in a jacket" width="40" height="40">

                        <h5>Set Order</h5>
                        <p>Create a repeat order or order anytime till midnight from a wide selection of 5000+ products for all or any of your daily needs.</p>

                    </div>
                </div>
                <!-- item two end -->

                <!-- item three start -->
                <div class="col-md-4 col-sm-6 col-xs-6 animated fadeInRight visible" data-animation="fadeInRight" data-animation-delay="300">
                    <div class="content-box content-box-icon-o-circle content-box-center">
                        <span class="icon-bike color-blue"></span>
                        <div class="circle">
                           <img src="{{ URL::asset('public/assets/img/spa/icon/004-road-bike.png') }}" alt="Girl in a jacket" width="40" height="40"> 
                        </div>
                        
                        <h5>We Deliver</h5>
                        <p>Our excellent delivery team will place your order at your doorstep. Just open your door and pick it up anytime after 7:00 am</p>

                    </div>
                </div>
                <!-- item three end -->

            </div>
        </div>
    </div>


    <!-- ====== test end ===== -->
    
    <!--====== PRINICNG STYLE EIGHT START ======-->

    <!--====== PRINICNG STYLE EIGHT START ======-->

    <section id="pricing" class="pricing-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-title text-center pb-20">
                        <h3 class="title">Our Team</h3>
                        <p class="text">We push each other to get better; we could never be as good alone as we are together!</p>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row justify-content-center">                
                <div class="col-lg-4 col-md-7 col-sm-9">
                    <div class="pricing-style-one mt-40 wow fadeIn" data-wow-duration="1.5s" data-wow-delay="0.2s">
                        <div class="pricing-icon text-center">
                            <img src="{{ URL::asset('public/assets/img/spa/wman.svg') }}" alt="">
                        </div>
                        <div class="pricing-header text-center">
                            <h5 class="sub-title">Ajay Chauhan</h5>
                            <!-- <p class="month"><span class="price">$ 199</span>/month</p> -->
                        </div>
                        <div class="pricing-list">
                            <ul>
                                <li><i class="lni-check-mark-circle"></i> Co-Founder & CEO</li>
                                
                            </ul>
                        </div>
                       <!--  <div class="pricing-btn rounded-buttons text-center">
                            <a class="main-btn rounded-three" href="#">GET STARTED</a>
                        </div> -->
                    </div> <!-- pricing style one -->
                </div>
                
                <div class="col-lg-4 col-md-7 col-sm-9">
                    <div class="pricing-style-one mt-40 wow fadeIn" data-wow-duration="1.5s" data-wow-delay="0.5s">
                        <div class="pricing-icon text-center">
                            <img src="{{ URL::asset('public/assets/img/spa/wman.svg') }}" alt="">
                        </div>
                        <div class="pricing-header text-center">
                            <h5 class="sub-title">Kamal Gupta</h5>
                            <!-- <p class="month"><span class="price">$ 399</span>/month</p> -->
                        </div>
                        <div class="pricing-list">
                            <ul>
                                <li><i class="lni-check-mark-circle"></i> Founder</li>
                                
                            </ul>
                        </div>
                        <!-- <div class="pricing-btn rounded-buttons text-center">
                            <a class="main-btn rounded-three" href="#">GET STARTED</a>
                        </div> -->
                    </div> <!-- pricing style one -->
                </div>
                
                <div class="col-lg-4 col-md-7 col-sm-9">
                    <div class="pricing-style-one mt-40 wow fadeIn" data-wow-duration="1.5s" data-wow-delay="0.8s">
                        <div class="pricing-icon text-center">
                            <img src="{{ URL::asset('public/assets/img/spa/wman.svg') }}" alt="">
                        </div>
                        <div class="pricing-header text-center">
                            <h5 class="sub-title">Mona Gupta</h5>
                           <!--  <p class="month"><span class="price">$ 699</span>/month</p>
 -->                    </div>
                        <div class="pricing-list">
                            <ul>
                                <li><i class="lni-check-mark-circle"></i> Co-Founder</li>
                                
                            </ul>
                        </div>
                       <!--  <div class="pricing-btn rounded-buttons text-center">
                            <a class="main-btn rounded-three" href="#">GET STARTED</a>
                        </div>
 -->                    </div> <!-- pricing style one -->
                </div>
                <!-- === OUR TEAM STYLE FOUR === -->
                  
              
               
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== PRINICNG STYLE EIGHT ENDS ======-->
    

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
                        <img src="{{ URL::asset('public/assets/img/spa/icon/brand/veeba.JPG') }}" alt="Logo">
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
                            <li><i class="lni-money-location"></i> Shop No-10 & 11,Suncity Avenue,Sector-102,Gurgaon,Haryana,122001</li>
                            <li><i class="lni-phone-handset"></i> +91-800-8271-800, 0124-793-7177</li>
                            <li><i class="lni-envelope"></i> support@earlybasket.com</li>
                        </ul>
                    </div> <!-- contact two -->
                </div>
                <div class="col-lg-6">
                    <div class="contact-form form-style-one mt-35 wow fadeIn" data-wow-duration="1.5s" data-wow-delay="0.5s">
                        <form  id="contact-form" action="index.php" method="post">
                            <div class="form-input mt-15">
                                <label>Name</label>
                                <div class="input-items default">
                                    <input type="text" placeholder="Name" name="name">
                                    <i class="lni-user"></i>
                                </div>
                            </div> <!-- form input -->
                            <div class="form-input mt-15">
                                <label>Email</label>
                                <div class="input-items default">
                                    <input type="email" placeholder="Email" name="email">
                                    <i class="lni-envelope"></i>
                                </div>
                            </div> <!-- form input -->
                             <div class="form-input mt-15">
                                <label>Phone</label>
                                <div class="input-items default">
                                    <input type="tel" placeholder="Phone" name="telNo">
                                    <i class="lni-phone-handset"></i>
                                </div>
                            </div> <!-- form input -->
                            <div class="form-input mt-15">
                                <label>Message</label>
                                <div class="input-items default">
                                    <textarea placeholder="Message" name="message"></textarea>
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

    {{-- <footer id="footer" class="footer-area">
        <div class="footer-widget bb-solid-1">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="footer-link">
                            <h6 class="footer-title">Company</h6>
                            <ul>
                                <li><a href="#">About</a></li>
                                <li><a href="#">Contact</a></li>
                                <li><a href="#">Profile</a></li>
                            </ul>
                        </div> <!-- footer link -->
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="footer-link">
                            <h6 class="footer-title">Solutions</h6>
                            <ul>
                                <li><a href="#">Facilities Services</a></li>
                                <li><a href="#">Workplace Staffing</a></li>
                                <li><a href="#">Project Management</a></li>
                            </ul>
                        </div> <!-- footer link -->
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="footer-link">
                            <h6 class="footer-title">Product & Services</h6>
                            <ul>
                                <li><a href="#">Products</a></li>
                                <li><a href="#">Business</a></li>
                                <li><a href="#">Developer</a></li>
                            </ul>
                        </div> <!-- footer link -->
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="footer-link">
                            <h6 class="footer-title">Help & Suuport</h6>
                            <ul>
                                <li><a href="#">Support Center</a></li>
                                <li><a href="#">FAQ</a></li>
                                <li><a href="#">Terms & Conditions</a></li>
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
                            <p class="text">Crafted by <a style="color: #38f9d7" rel="nofollow" href="#">Epic Corporation</a> and UI Elements from <a style="color: #38f9d7" rel="nofollow" href="#">Epicedu.in</a></p>
                        </div> <!--  copyright -->
                    </div>
                    <div class="col-lg-2">
                        <div class="footer-logo text-center mt-10">
                            <!-- <a href="index.html"><img src="images/logo-2.svg" alt="Logo"></a> -->
                            <a href="{{ route('spa.home') }}"><img src="{{ URL::asset('public/assets/img/spa/img/favicon-1.png') }}" alt="Logo"></a>
                        </div> <!-- footer logo -->
                    </div>
                    <div class="col-lg-5">
                        <ul class="social text-center text-lg-right mt-10">
                            <li><a href="#"><i class="lni-facebook-filled"></i></a></li>
                            <li><a href="#"><i class="lni-twitter-original"></i></a></li>
                            <li><a href="#"><i class="lni-instagram-original"></i></a></li>
                            <li><a href="#"><i class="lni-linkedin-original"></i></a></li>
                        </ul> <!-- social -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- footer copyright -->
    </footer> --}}

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

</body>

</html>
