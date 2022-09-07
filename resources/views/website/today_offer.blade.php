<!doctype html>
<html lang="en">

<head>

    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--====== Title ======-->
    <title>Earlybasket | Offer</title>

    <!--   ==== ICON START ===== -->
    <link rel="stylesheet" type="text/css" href="css/et-line-font.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
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

<style type="text/css">
    
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

    *{
        margin:0;
        padding:0;
        box-sizing: border-box;
    } 
    
    .product-grid{
        text-align:center;
        padding:0 0 72px;
        border:1px solid rgba(0,0,0,.1);
        overflow:hidden;
        position:relative;
        z-index:1;
        box-shadow: 0 3px 20px rgba(0,0,0,0.08);
    }
    .product-grid .product-image{
        position:relative;
        transition:all .3s ease 0s
    }
    .product-grid .product-image a{
        display:block
    }
    .product-grid .product-image img{
        width:100%;
        height:auto
    }
    .product-grid .pic-1{
        opacity:1;
        transition:all .3s ease-out 0s
    }
    .product-grid:hover .pic-1{
        opacity:1
    }
    .product-grid .pic-2{
        opacity:0;
        position:absolute;
        top:0;
        left:0;
        transition:all .3s ease-out 0s
    }
    .product-grid:hover .pic-2{
        opacity:1
    }
    .product-grid .social{
        width:150px;
        padding:0;
        margin:0;
        list-style:none;
        opacity:0;
        transform:translateY(-50%) translateX(-50%);
        position:absolute;
        top:60%;
        left:50%;
        z-index:1;
        transition:all .3s ease 0s
    }
    .product-grid:hover .social{
        opacity:1;
        top:50%
    }
    .product-grid .social li{
        display:inline-block
    }
    .product-grid .social li a{
        color:#fff;
        background-color:#333;
        font-size:16px;
        line-height:40px;
        text-align:center;
        height:40px;
        width:40px;
        margin:0 2px;
        display:block;
        position:relative;
        transition:all .3s ease-in-out
    }
    .product-grid .social li a:hover{
        color:#fff;
        background-color:#ef5777
    }
    .product-grid .social li a:after,
    .product-grid .social li a:before{
        content:attr(data-tip);
        color:#fff;
        background-color:#000;
        font-size:12px;
        letter-spacing:1px;
        line-height:20px;
        padding:1px 5px;
        white-space:nowrap;
        opacity:0;
        transform:translateX(-50%);
        position:absolute;
        left:50%;
        top:-30px
    }
    .product-grid .social li a:after{
        content:'';
        height:15px;
        width:15px;
        border-radius:0;
        transform:translateX(-50%) rotate(45deg);
        top:-20px;
        z-index:-1
    }
    .product-grid .social li a:hover:after,
    .product-grid .social li a:hover:before{
        opacity:1
    }
    .product-grid .product-discount-label,
    .product-grid .product-new-label{
        color:#fff;
        background-color:#ef5777;
        font-size:12px;
        padding:2px 7px;
        display:block;
        position:absolute;
        top:10px;
        left:0
    }
    .product-grid .product-discount-label{
        background-color:#333;
        left:auto;
        right:0
    }
    .product-grid .rating{
        color:#FFD200;
        font-size:12px;
        padding:12px 0 0;
        margin:0;
        list-style:none;
        position:relative;
        z-index:-1
    }
    .product-grid .rating li.disable{
        color:rgba(0,0,0,.2)
    }
    .product-grid .product-content{
        background-color:#fff;
        text-align:center;
        padding:12px 0;
        margin:0 auto;
        position:absolute;
        left:0;
        right:0;
        bottom:0px;
        z-index:1;
        transition:all .3s
    }
    .product-grid:hover .product-content{
        bottom:0
    }
    .product-grid .title{
        font-size:13px;
        font-weight:400;
        letter-spacing:.5px;
        text-transform:capitalize;
        margin:0 0 10px;
        transition:all .3s ease 0s
    }
    .product-grid .title a{
        color:#828282
    }
    .product-grid .title a:hover,
    .product-grid:hover .title a{
        color:#ef5777
    }
    .product-grid .price{
        color:#333;
        font-size:17px; 
        font-weight:700;
        letter-spacing:.6px;
        margin-bottom:8px;
        text-align:center;
        transition:all .3s
    }
    .product-grid .price span{
        color:#999;
        font-size:13px;
        font-weight:400;
        text-decoration:line-through;
        margin-left:3px;
        display:inline-block
    }
    .product-grid .add-to-cart{
        color:#000;
        font-size:13px;
        font-weight:600
    }
    @media only screen and (max-width:990px){
        .product-grid{
            margin-bottom:30px
        }
    }

</style>

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
                                
                                      <li class="nav-item">
                                        <a class="page-scroll" href="#how-it-works">OUR PROCESS</a>
                                    </li>
                                
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#contact">CONTACT</a>
                                    </li>
                                </ul>
                            </div>

                        </nav> <!-- navbar -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- navbar area -->
        
        
    </section>
    <!--====== SAIDEBAR PART START ======-->
    
    <div class="overlay-right"></div>

    <!--====== SAIDEBAR PART ENDS ======-->
    
     <!--====== ABOUT PART START ======-->

    <section id="about" class="about-area" style="padding-top: 120px;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-12 col-lg-8">
                    <div class="about-image text-center wow fadeInUp" data-wow-duration="1.5s" data-wow-offset="100">
                        <h4 class="size">GET US ON!</h4>                        
                    </div>
                </div>
            </div> <!-- row -->
            
            <div class="row mt-4">

                @foreach($offerdata as $offer)

                    <div class="col-md-4">
                        <div class="product-grid">
                            <div class="product-image">
                                <a href="#">

                                    @if(isset($offer->productNameImage->productImage->first()->image))

                                    <img class="pic-1 ml-0" src="{{ asset('public/images/product/'.@$offer->productNameImage->productImage->first()->image) }}">

                                    @else

                                    <img class="pic-1 ml-0" src="{{ asset('public/assets/img/admin/image.jpg') }}" height="300px">

                                    @endif
                                    
                                </a>
                        
                                <span class="product-new-label">Offer</span>
                                <span class="counter-down product-discount-label" data-start="{{ $offer->start_date }}" data-end="{{ $offer->end_date }}" ></span>
                            </div>
                            <div class="product-content">
                                <h3 class="title"><a href="#">{{ $offer->productNameImage->title }}</a></h3>
                                <div class="price"><i class="fa fa-rupee"></i>{{
                                    $offer->productAttrName->selling_price }}<span class="ml-3"><i class="fa fa-rupee"></i>{{ $offer->productAttrName->mrp_price }}</span>
                                
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
   
    <!--====== FOOTER FOUR PART START ======-->

    <footer id="footer" class="footer-area">
        <div class="footer-widget bb-solid-1">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="footer-link">
                            <h6 class="footer-title">About</h6>
                            <p class="text-justify pt-3">
                               Shop on the go and buy groceries, fresh fruits & vegetables, cosmetics, Dairy Products and baby care products at Early Basket. We get it all delivered at your doorstep within hours & you can Shop direct from our stores. You not only save time but also money with our best prices and offers. 
                            </p>
                           
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
                            
                            <ul>
                                <p class="text-footer"><i class="fa fa-map-signs fw pr-1"></i>Shop No-10 & 11,Suncity Avenue,Sector-102,Gurgaon,Haryana,122001</p>
                                <li class="text-justify"><i class="fa fa-phone pr-1"></i><a href="tel:918008271800">    Call Now (+91) 800-8271-800</a></li>

                                <li><i class="fa fa-phone pr-1"></i><a href="tel:0124-793-7177">  Phone No : 0124-793-7177</a></li>
                               
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

    <a href="#" class="back-to-top"><i class="lni-chevron-up"></i></a>

    <script src="{{ URL::asset('public/assets/js/spa/vendor/jquery-1.12.4.min.js') }}"></script>

    <!--====== Bootstrap js ======-->
    <script src="{{ URL::asset('public/assets/js/spa/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('public/assets/js/spa/popper.min.js') }}"></script>

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


    $('.counter-down').each(function() {

        var start_date = $(this).attr('data-start'); 
        var final_date = $(this).attr('data-end');

        var element = $(this);
      
        // Set the date we're counting down to
        
        var dateTimeParts = final_date.split(' ');
        var timeParts = dateTimeParts[1].split(':');
        var dateParts = dateTimeParts[0].split('-');

        // Update the count down every 1 second
        setInterval(function() {

                // Get today's date and time
                //var countstartDate = new Date(dateParts[2], parseInt(dateParts[1], 10) - 1, dateParts[0], timeParts[0], timeParts[1]).getTime();

                var countendsdate = new Date(dateParts[2], parseInt(dateParts[1], 10) - 1, dateParts[0], timeParts[0], timeParts[1]).getTime();

                var now = new Date().getTime();

                // Find the distance between now and the count down date
                var distance = countendsdate - now;


                // Time calculations for days, hours, minutes and seconds
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                if (days.toString().length == 1) {
                    days = "0" + days;
                }

                if (hours.toString().length == 1) {
                    hours = "0" + hours;
                }

                if (minutes.toString().length == 1) {
                    minutes = "0" + minutes;
                }

                if (seconds.toString().length == 1) {
                    seconds = "0" + seconds;
                }

                // Display the result in the element with id="demo"
                element.html('Ends In: '+hours + ":"
                + minutes + ":" + seconds);

                //+days + " days " + ;

            }, 1000);

        

    });
     

    </script>

</body>

</html>
