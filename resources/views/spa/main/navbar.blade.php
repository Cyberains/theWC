<section class="header-area bg-section">
    <div class="navbar-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg">
                        <a class="navbar-brand" href="/">
                            <img src="{{ url('public/assets/spa/images/img/800x300-done2.png') }}" alt="Logo">
                        </a>

                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarEight" aria-controls="navbarEight" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarEight">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item active">
                                    <a class="page-scroll" href="/">HOME</a>
                                </li>
                                <li class="nav-item">
                                    <a class="page-scroll" href="#about">ABOUT</a>
                                </li>
                                <li class="nav-item">
                                    <a class="page-scroll" href="#testimonial">Services</a>
                                </li>
                                <li class="nav-item">
                                    <a class="page-scroll" href="#how-it-works">OUR PROCESS</a>
                                </li>
                                <li class="nav-item">
                                    <a class="page-scroll" href="#contact">CONTACT</a>
                                </li>
                                <li class="nav-item">
                                    @if(Auth()->check())
                                        @if(Auth::user()->role=='Professional')
                                            <a class="page-scroll" href="{{ route('professional.dashboard') }}">Dashboard</a>
                                        @elseif(Auth::user()->role=='admin')
                                            <a class="page-scroll" href="{{ route('admin.dashboard') }}">Dashboard</a>
                                        @endif
                                    @else
                                        <a class="page-scroll" href="{{ route('login') }}">Login</a>
                                    @endif

                                </li>
                            </ul>
                        </div>
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
                        <div class="carousel-item  active">
                           <img class="d-block w-100" width="1349px;" height="347px;" src="{{ url('public/assets/spa/images/slider/slide-01.jpeg') }}">
                        </div>


                       <div class="carousel-item">
                         <img class="d-block w-100" height="347px;" src="{{ url('public/assets/spa/images/slider/slide-02.jpeg') }}">
                       </div>


                       <div class="carousel-item">
                          <img class="d-block w-100" height="347px;" src="{{ url('public/assets/spa/images/slider/slide-03.jpeg') }}">
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
