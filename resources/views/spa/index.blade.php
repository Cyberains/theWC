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

    <section class="header-area bg-section">
        <div id="home" class="slider-area">
            <div class="bd-example">
                <div id="carouselOne" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselOne" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselOne" data-slide-to="1"></li>
                        <li data-target="#carouselOne" data-slide-to="2"></li>
                    </ol>

                    <div class="carousel-inner">
                        <div class="carousel-item  active">
                            <img class="d-block w-100" width="1349px;" height="auto;" src="{{ url('public/assets/spa/images/slider/slide-01.jpg') }}">
                        </div>

                        <div class="carousel-item">
                            <img class="d-block w-100" height="auto;" src="{{ url('public/assets/spa/images/slider/slide-02.jpg') }}">
                        </div>

                        <div class="carousel-item">
                            <img class="d-block w-100" height="auto;" src="{{ url('public/assets/spa/images/slider/slide-03.jpg') }}">
                        </div>
                    </div>

                    <a class="carousel-control-prev" href="#carouselOne" role="button" data-slide="prev">
                        <i class="lni-arrow-left-circle"></i>
                    </a>

                    <a class="carousel-control-next" href="#carouselOne" role="button" data-slide="next">
                        <i class="lni-arrow-right-circle"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
  <div class="overlay-right"></div>
    <section id="about" class="about-area">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-xl-12 col-lg-8">
                    <div class="about-image text-center wow fadeInUp" data-wow-duration="1.5s" data-wow-offset="100">
                        <h4 class="size">GET US ON!</h4>
                            <img  onclick="window.open('https://play.google.com/store/apps/details?id=com.epic.woman_company_professional', '_blank');"  class="app_img" src="{{ url('public/assets/spa/images/icon/google_play_store_button_1.jpg') }}" alt="services">
                            <img class="app_img" src="{{ url('public/assets/spa/images/icon/app_play_store_button1.png') }}" alt="services" style="background: #fff;border: none;border-radius: 9px;"><br><br>
                            <span class="text-fill blink-soft text-_com pb-2">Comming Soon...</span>
                    </div>
                    <div class="mx-auto">
                    <img src="{{ url('public/assets/spa/images/img/animation_banner.jpg') }}" class="img-fluid mx-auto" alt="Responsive image">
                </div>

                    <div class="container">
                        <div class="row">
                        <div class="col-md-7 align-items-center pt-2">
                            <div class="section-title text-center mt-30 pb-40">
                                <h4 class="title wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.6s" style="font-family: cardo; visibility: visible; animation-duration: 1.5s; animation-delay: 0.6s; animation-name: fadeInUp;">
                                Hassel free Beauty service booking app, now your salon at home. It's just one click away.</h4>
                                <p class="text text-justify wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="1s" style="visibility: visible; animation-duration: 1.5s; animation-delay: 1s; animation-name: fadeInUp;">
                                    Our aim is to provide the best beauty service at an affordable price with a "ZERO" commission from professionals.
                                </p>
                                <p class="text-justify" style="font-size: 16px; padding-top: 10px; color: #121212;">
                                The women's Company (TWC) is operated by Epic Corporations Pvt Ltd, TWC is India's first platform with "ZERO" commissions for beauty and salon professionals. We are committed to providing the best service at an affordable price range to our users. We charged a genuine price for beauty services with genuine products, our professionals use only genuine and certified products. TWC provides a variety of beauty services to its users on a daily basis. Any professional who is working for Women's beauty can join TWC and start income from the first day. We believe in women's empowerment and we love to work for women empower, our concept is based on women's empowerment only and we do work for that only. Our thinking is "If a woman will empower she can make the country empower".
                                </p>
                            </div>
                            <div>
                            </div>
                        </div>
                        <div class="col-md-5 pt-2">
                             <img src="{{ url('public/assets/spa/images/img/about.png') }}" alt="about">
                        </div>
                    </div>
                    </div>
                </div>
            </div>

           <div class="container">
                <div class="row">
                <div class="col-lg-6">
                    <div class="single-about d-sm-flex mt-30 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="1.2s">
                        <div class="about-icon">
                            <img src="{{ url('public/assets/spa/images/icon/availability.png') }}" alt="Icon">
                        </div>
                        <div class="about-content media-body">
                            <h4 class="about-title">Max service time availability</h4>
                            <p class="text">
                                Our professionals are available in your area from morning 6:30 AM to 9:30 PM. Just one click away.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="single-about d-sm-flex mt-30 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="1.4s">
                        <div class="about-icon">
                            <img src="{{ url('public/assets/spa/images/icon/experience.png') }}" alt="Icon">
                        </div>
                        <div class="about-content media-body">
                            <h4 class="about-title">Experience and verified professionals.</h4>
                            <p class="text">We have a team of experienced professionals for your personal beauty service need. Any time anywhere.</p>
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
                        @foreach($categories as $category)
                        <div class="col-lg-3">
                            <div class="single-testimonial mt-30 mb-30 text-center">
                                <div class="testimonial-image">
                                    <img src="{{ url('public/images/category/'.$category->image) }}" alt="Author">
                                </div>
                                <div class="testimonial-content">
                                    <h6 class="author-name">{{ $category->title }}</h6>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div id="how-it-works" class="pt75">
        <div class="container">
            <div class="row mb-4">

                <div class="col-md-12 text-center mt-3">
                    <h1 class="font-size-normal">
                        <small>How it works</small><br>
                        Select it &nbsp;<i class="fa fa-circle" style="font-size:6px;vertical-align: middle;"></i> &nbsp;Add it&nbsp; <i class="fa fa-circle" style="font-size:6px;vertical-align: middle;"></i> &nbsp;Get it
                        <small class="heading heading-solid center-block"></small>
                    </h1>
                </div>
            </div>

            <div class="row mt50">

                <div class="col-md-4 col-sm-6 col-xs-6 animated fadeInLeft visible" data-animation="fadeInLeft" data-animation-delay="100">
                    <div class="content-box content-box-icon-o-circle content-box-center">
                        <span class="icon-wallet color-blue"></span>
                        <img src="{{ url('public/assets/spa/images/icon/select_icon.png') }}" alt="Girl in a jacket" width="55" height="55">
                        <h5 class="pt-13">Select it</h5>
                        <p class="font ml-2 mr-2">Select your required beauty service from our wide range of services. In just one click.</p>

                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-6 animated fadeInLeft visible" data-animation="fadeInLeft" data-animation-delay="200">
                    <div class="content-box content-box-icon-o-circle content-box-center">
                        <span class="icon-browser color-blue"></span>
                        <img src="{{ url('public/assets/spa/images/icon/add_icon.png') }}" alt="Girl in a jacket" width="55" height="55">

                        <h5 class="pt-13">Add it</h5>
                        <p class="font ml-2 mr-2">Add service in your cart in just one select, now you are just one step away to book your beauty service.</p>

                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-6 animated fadeInRight visible" data-animation="fadeInRight" data-animation-delay="300">
                    <div class="content-box content-box-icon-o-circle content-box-center">
                        <span class="icon-bike color-blue"></span>
                        <div class="circle">
                            <img src="{{ url('public/assets/spa/images/icon/get_icon.png') }}" alt="Girl in a jacket" width="55" height="55">
                        </div>

                        <h5 class="pt-13">Get it</h5>
                        <p class="font ml-2 mr-2">Pay with many payment options and book your service. Enjoy your personal beauty service with your personal beauty technician.</p>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <section id="contact" class="contact-area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="section-title text-center pb-20">
                            <h3 class="title">Get in touch</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="contact-two mt-50 wow fadeIn" data-wow-duration="1.5s" data-wow-delay="0.2s">
                            <h4 class="contact-title">CONTACT US</h4>
                            <ul class="contact-info">
                                <li><i class="lni-money-location"></i> Visit : F-256 , 1st Floor , B-Block , Ansal API ,<br>
                                    &emsp;&ensp;Palam Corporate Plaza, Palam Vihar Gurgaon (HR), 122017</li>
                                <li><i class="lni-phone-handset"></i><a href="tel:9643824343" style="color: #000;"> +91 8860014004</a></li>
                            </ul>
                        </div>
                      <div class="row">
                            <div class="col-xl-12 col-lg-8">
                    <div class="about-image text-left wow fadeInUp" data-wow-duration="1.5s" data-wow-offset="100" style="visibility: visible; animation-duration: 1.5s; animation-name: fadeInUp;">
                        <h4 class="size">GET US ON!</h4>
                            <img  onclick="window.open('https://play.google.com/store/apps/details?id=com.epic.woman_company_professional', '_blank');"
                                  class="app_img"
                                  src="{{ url('public/assets/spa/images/icon/google_play_store_button_1.jpg') }}"
                                  alt="services">
                            <img class="app_img" src="{{ url('public/assets/spa/images/icon/app_play_store_button1.png') }}" alt="services" style="background: #fff;border: none;border-radius: 9px;"><br><br>
                            <span class="text-fill blink-soft">Comming Soon...</span>
                    </div>


                </div>
                      </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="contact-form form-style-one mt-35 wow fadeIn" data-wow-duration="1.5s" data-wow-delay="0.5s">
                            <form  id="contact-form" action="contact/us" method="post">
                                @csrf
                                <div class="form-input mt-15">
                                    <label>Name</label>
                                    <div class="input-items default">
                                        <input type="text" placeholder="Name" name="name">
                                        <i class="lni-user"></i>
                                    </div>
                                </div>
                                <div class="form-input mt-15">
                                    <label>Email</label>
                                    <div class="input-items default">
                                        <input type="email" placeholder="Email" name="email">
                                        <i class="lni-envelope"></i>
                                    </div>
                                </div>
                                <div class="form-input mt-15">
                                    <label>Phone</label>
                                    <div class="input-items default">
                                        <input type="tel" placeholder="Phone" name="phone">
                                        <i class="lni-phone-handset"></i>
                                    </div>
                                </div>
                                <div class="form-input mt-15">
                                    <label>Message</label>
                                    <div class="input-items default">
                                        <textarea placeholder="Message" name="message"></textarea>
                                        <i class="lni-pencil-alt"></i>
                                    </div>
                                </div>
                                <p class="form-message"></p>
                                <div class="form-input rounded-buttons mt-20">
                                    <button type="submit" class="main-btn rounded-three">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection
