@extends("spa.main.master")
@section('content')
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

    <header class="intro parallax-window" data-parallax="scroll" data-speed="0.5" data-image-src="{{ url('public/assets/spa/images/img/img-bg.png') }}"
            style="background-image: url('public/assets/spa/images/img/img-bg.png');"
    >
        <div class="intro-body">
            <div class="container">
                <div class="row justify-content-center pt-5">
                    <div class="col-md-8 mt-120">
                        <h1 class="brand-heading text-capitalize font-pacifico mt-125 color-light animated" data-animation="fadeInUp" data-animation-delay="100">
                            The <span class="color-blue rotate mr10">Women's Company. </span> Lorem Ipsum!
                        </h1>
                        <p class="intro-text mt25 color-gray animated" data-animation="fadeInUp" data-animation-delay="200" style="color: #fff;">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            <br> items <b>Lorem Ipsum has been the industry's.</b>
                        </p>

                        <h5 class="brand-heading brand-sub-heading font-pacifico color-light">It is a long established fact that a reader .</h5>
                    </div>
                </div>
            </div>

            <div class="intro-direction">
                <a href="#how-it-works">
                    <div class="mouse-icon">
                        <div class="wheel"></div>
                    </div>
                </a>
            </div>

        </div>
    </header>
    <div class="overlay-right"></div>
    <section id="about" class="about-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-12 col-lg-8">
                    <div class="about-image text-center wow fadeInUp" data-wow-duration="1.5s" data-wow-offset="100">
                        <h4 class="size">GET US ON!</h4>
                            <img style="width:15%;" src="{{ url('public/assets/spa/images/icon/google play store button 1.jpg') }}" alt="services">
                            <img style="width:15%;" src="{{ url('public/assets/spa/images/icon/app_play_store_button1.png') }}" alt="services">
                    </div>
                    <div class="section-title text-center mt-30 pb-40">
                        <h4 class="title wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.6s" style="font-family: cardo;">Most hassle-free offline & online store with best delivery system.</h4>
                        <p class="text wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="1s">Early Basket main aim is to reach earliest at your Doorstep to provide all your Grocery Needs.</p>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->

            <div class="row">
                <div class="col-lg-6">
                    <div class="single-about d-sm-flex mt-30 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="1.2s">
                        <div class="about-icon">
                            <!-- <img src="images/icon-1.png" alt="Icon"> -->
                            <img src="{{ url('public/assets/spa/images/icon/001-groceries.png') }}" alt="Icon">
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
                            <img src="{{ url('public/assets/spa/images/icon/002-supermarket.png') }}" alt="Icon">
                        </div>
                        <div class="about-content media-body">
                            <h4 class="about-title">Availability of Standard Goods</h4>
                            <p class="text">We deal only in standard goods. We believe that customers should pay the right amount for the right goods and their quantity with best quality .</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="single-about d-sm-flex mt-30 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="1.6s">
                        <div class="about-icon">
                            <img src="{{ url('public/assets/spa/images/icon/004-money.png') }}" alt="Icon">
                        </div>
                        <div class="about-content media-body">
                            <h4 class="about-title"> Freedom of Selection</h4>
                            <p class="text">Customers enjoy full freedom of selection . As we don't keep any boundaries,  customers can select goods of their own choice.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="single-about d-sm-flex mt-30 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="1.8s">
                        <div class="about-icon">
                            <img src="{{ url('public/assets/spa/images/icon/005-discount.png') }}" alt="Icon">
                        </div>
                        <div class="about-content media-body">
                            <h4 class="about-title">Lower Prices</h4>
                            <p class="text"> Prices of goods are generally kept low at Early Basket. Thus, this is suitable for all kind of consumers.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="testimonial" class="testimonial-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-title text-center pb-20">
                        <h3 class="title">Services</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="row testimonial-active">
                        <div class="col-lg-4">
                            <div class="single-testimonial mt-30 mb-30 text-center">
                                <div class="testimonial-image">
                                    <img src="{{ url('public/assets/spa/images/author-3.jpg') }}" alt="Author">
                                </div>
                                <div class="testimonial-content">
                                    <h6 class="author-name">Isabela Moreira</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="single-testimonial mt-30 mb-30 text-center">
                                <div class="testimonial-image">
                                    <img src="{{ url('public/assets/spa/images/author-1.jpg') }}" alt="Author">
                                </div>
                                <div class="testimonial-content">
                                    <h6 class="author-name">Fiona</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="single-testimonial mt-30 mb-30 text-center">
                                <div class="testimonial-image">
                                    <img src="{{ url('public/assets/spa/images/author-2.jpg') }}" alt="Author">
                                </div>
                                <div class="testimonial-content">
                                    <h6 class="author-name">Elon Musk</h6>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="single-testimonial mt-30 mb-30 text-center">
                                <div class="testimonial-image">
                                    <img src="{{ url('public/assets/spa/images/author-2.jpg') }}" alt="Author">
                                </div>
                                <div class="testimonial-content">
                                    <h6 class="author-name">Elon Musk</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="single-testimonial mt-30 mb-30 text-center">
                                <div class="testimonial-image">
                                    <img src="{{ url('public/assets/spa/images/author-4.jpg') }}" alt="Author">
                                </div>
                                <div class="testimonial-content">
                                    <h6 class="author-name">Fajar Siddiq</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div id="how-it-works" class="pt75">
        <div class="container">
            <div class="row mb-4">

                <!-- title start -->
                <div class="col-md-12 text-center mt-3">
                    <h1 class="font-size-normal">
                        <small>How it works</small><br>
                        Select it &nbsp;<i class="fa fa-circle" style="font-size:6px;vertical-align: middle;"></i> &nbsp;Add it&nbsp; <i class="fa fa-circle" style="font-size:6px;vertical-align: middle;"></i> &nbsp;Get it
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
                        <img src="{{ url('public/assets/spa/images/icon/select_icon.png') }}" alt="Girl in a jacket" width="55" height="55">
                        <h5 class="pt-13">Select it</h5>
                        <p class="font ml-2 mr-2">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>

                    </div>
                </div>
                <!-- item one end -->

                <!-- item two start -->
                <div class="col-md-4 col-sm-6 col-xs-6 animated fadeInLeft visible" data-animation="fadeInLeft" data-animation-delay="200">
                    <div class="content-box content-box-icon-o-circle content-box-center">
                        <span class="icon-browser color-blue"></span>
                        <img src="{{ url('public/assets/spa/images/icon/add_icon.png') }}" alt="Girl in a jacket" width="55" height="55">

                        <h5 class="pt-13">Add it</h5>
                        <p class="font ml-2 mr-2">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>

                    </div>
                </div>
                <!-- item two end -->

                <!-- item three start -->
                <div class="col-md-4 col-sm-6 col-xs-6 animated fadeInRight visible" data-animation="fadeInRight" data-animation-delay="300">
                    <div class="content-box content-box-icon-o-circle content-box-center">
                        <span class="icon-bike color-blue"></span>
                        <div class="circle">
                            <img src="{{ url('public/assets/spa/images/icon/get_icon.png') }}" alt="Girl in a jacket" width="55" height="55">
                        </div>

                        <h5 class="pt-13">Get it</h5>
                        <p class="font ml-2 mr-2">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>

                    </div>
                </div>
                <!-- item three end -->

            </div>
        </div>
    </div>

    <section id="call-action" class="call-action-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5">
                        <div class="call-action-content mt-45">
                            <h3 class="action-title">Get latest updates!</h3>
                            <p class="text">We never spam your email</p>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="call-action-form mt-50">
                            <form action="#">
                                <input type="text" placeholder="Enter your email">
                                <div class="action-btn rounded-buttons">
                                    <a href="#"><button class="main-btn rounded-three">subscribe</button></a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

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
                                <li><i class="lni-money-location"></i> Visit : F-256 , 1st Floor , B-Block , Ansal API ,
                                    Palam Corporate Plaza, Palam Vihar Gurgaon (HR), 122017</li>
                                <li><i class="lni-phone-handset"></i><a href="tel:9643824343" style="color: #000;"> +91 9643-82-4343</a></li>
                                <!-- <li><i class="lni-envelope"></i> support@earlybasket.com</li> -->
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

@endsection
</body>
    <script src="{{ url('public/assets/spa/js/vendor/modernizr-3.6.0.min.js') }}"></script>
    <script src="{{ url('public/assets/spa/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <!--====== Bootstrap js ======-->
    <script src="{{ url('public/assets/spa/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('public/assets/spa/js/popper.min.js') }}"></script>
    <!--====== Slick js ======-->
    <script src="{{ url('public/assets/spa/js/slick.min.js') }}"></script>
    <!--====== Isotope js ======-->
    <script src="{{ url('public/assets/spa/js/isotope.pkgd.min.js') }}"></script>
    <!--====== Images Loaded js ======-->
    <script src="{{ url('public/assets/spa/js/imagesloaded.pkgd.min.js') }}"></script>
    <!--====== Magnific Popup js ======-->
    <script src="{{ url('public/assets/spa/js/jquery.magnific-popup.min.js') }}"></script>
    <!--====== Scrolling js ======-->
    <script src="{{ url('public/assets/spa/js/scrolling-nav.js') }}"></script>
    <script src="{{ url('public/assets/spa/js/jquery.easing.min.js') }}"></script>
    <!--====== wow js ======-->
    <script src="{{ url('public/assets/spa/js/wow.min.js') }}"></script>
    <!--====== Main js ======-->
    <script src="{{ url('public/assets/spa/js/main.js') }}"></script>
</html>
