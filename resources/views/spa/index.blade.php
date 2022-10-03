

@extends("spa.main.master")
@section('style')
<style>
/* .carousel {
    padding: 76px 0px 0px 0px!important;
} */

</style>
@endsection
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

  <div class="overlay-right"></div>
    <section id="about" class="about-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-12 col-lg-8">
                    <div class="about-image text-center wow fadeInUp" data-wow-duration="1.5s" data-wow-offset="100">
                        <h4 class="size">GET US ON!</h4>
                            <img style="width:15%;" src="{{ url('public/assets/spa/images/icon/google play store button 1.jpg') }}" alt="services">
                            <img style="width:15%;" src="{{ url('public/assets/spa/images/icon/app_play_store_button1.png') }}" alt="services"><br>
                            <span class="text-fill blink-soft">Comming Soon...</span>
                    </div>
                    <div class="section-title text-center mt-30 pb-40">
                        <h4 class="title wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.6s" style="font-family: cardo;">
                            Hassel free Beauty service booking app, now your salon at home. It's just one click away.</h4>
                        <p class="text wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="1s">
                            Our aim is to provide the best beauty service at an affordable price with a "ZERO" commission from professionals.
                        </p>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->

            <div class="row">
                <div class="col-lg-6">
                    <div class="single-about d-sm-flex mt-30 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="1.2s">
                        <div class="about-icon">
                            <!-- <img src="images/icon-1.png" alt="Icon"> -->
                            <img src="{{ url('public/assets/spa/images/icon/availability.png') }}" alt="Icon">
                        </div>
                        <div class="about-content media-body">
                            <h4 class="about-title">Max service time availability</h4>
                            <p class="text">
                                Our professionals are available in your area from morning 6:30 AM to 9:30 PM. Just one click away.
                            </p>
                        </div>
                    </div> <!-- single about -->
                </div>
                <div class="col-lg-6">
                    <div class="single-about d-sm-flex mt-30 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="1.4s">
                        <div class="about-icon">
                            <img src="{{ url('public/assets/spa/images/icon/experience.png') }}" alt="Icon">
                        </div>
                        <div class="about-content media-body">
                            <h4 class="about-title">Experience and verified professionals.</h4>
                            <p class="text">We have a team of experienced professionals for your personal beauty service need, any time where.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="single-about d-sm-flex mt-30 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="1.6s">
                        <div class="about-icon">
                            <img src="{{ url('public/assets/spa/images/icon/booking.png') }}" alt="Icon">
                        </div>
                        <div class="about-content media-body">
                            <h4 class="about-title"> Hassel free booking process.</h4>
                            <p class="text">Our easy booking process allows you to book services of your choice for your doorstep in just a few clicks.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="single-about d-sm-flex mt-30 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="1.8s">
                        <div class="about-icon">
                            <img src="{{ url('public/assets/spa/images/icon/affordable.png') }}" alt="Icon">
                        </div>
                        <div class="about-content media-body">
                            <h4 class="about-title">Affordable pricing.</h4>
                            <p class="text">Our affordable and attractive pricing gives you the chance to book maximum services at a lower price.</p>
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
                        <div class="col-lg-3">
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
{{--            <div class="container">--}}
{{--                <div class="row align-items-center">--}}
{{--                    <div class="col-lg-5">--}}
{{--                        <div class="call-action-content mt-45">--}}
{{--                            <h3 class="action-title">Get latest updates!</h3>--}}
{{--                            <p class="text">We never spam your email</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-lg-7">--}}
{{--                        <div class="call-action-form mt-50">--}}
{{--                            <form action="#">--}}
{{--                                <input type="text" placeholder="Enter your email">--}}
{{--                                <div class="action-btn rounded-buttons">--}}
{{--                                    <a href="#"><button class="main-btn rounded-three">subscribe</button></a>--}}
{{--                                </div>--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
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
