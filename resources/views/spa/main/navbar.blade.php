@section('styles')
<style>
/*    section {
  padding: 60px 0;
  overflow: hidden;
}

.sections-bg {
  background-color: #f6f6f6;
}

.section-header {
  text-align: center;
  padding-bottom: 60px;
}

.section-header h2 {
  font-size: 32px;
  font-weight: 600;
  margin-bottom: 20px;
  padding-bottom: 20px;
  position: relative;
}

.section-header h2:after {
  content: "";
  position: absolute;
  display: block;
  width: 50px;
  height: 3px;
  background: var(--color-primary);
  left: 0;
  right: 0;
  bottom: 0;
  margin: auto;
}

.section-header p {
  margin-bottom: 0;
  color: #6f6f6f;
}*/

/*--------------------------------------------------------------
# Breadcrumbs
--------------------------------------------------------------*/
/*.breadcrumbs .page-header {
  padding: 60px 0 60px 0;
  min-height: 20vh;
  position: relative;
  background-color: var(--color-primary);
}

.breadcrumbs .page-header h2 {
  font-size: 56px;
  font-weight: 500;
  color: #fff;
  font-family: var(--font-secondary);
}

.breadcrumbs .page-header p {
  color: rgba(255, 255, 255, 0.8);
}

.breadcrumbs nav {
  background-color: #f6f6f6;
  padding: 20px 0;
}

.breadcrumbs nav ol {
  display: flex;
  flex-wrap: wrap;
  list-style: none;
  margin: 0;
  padding: 0;
  font-size: 16px;
  font-weight: 600;
  color: var(--color-default);
}

.breadcrumbs nav ol a {
  color: var(--color-primary);
  transition: 0.3s;
}

.breadcrumbs nav ol a:hover {
  text-decoration: underline;
}

.breadcrumbs nav ol li+li {
  padding-left: 10px;
}

.breadcrumbs nav ol li+li::before {
  display: inline-block;
  padding-right: 10px;
  color: var(--color-secondary);
  content: "/";
}*/

/*--------------------------------------------------------------
# Scroll top button
--------------------------------------------------------------*/
/*.scroll-top {
  position: fixed;
  visibility: hidden;
  opacity: 0;
  right: 15px;
  bottom: -15px;
  z-index: 99999;
  background: var(--color-secondary);
  width: 44px;
  height: 44px;
  border-radius: 50px;
  transition: all 0.4s;
}

.scroll-top i {
  font-size: 24px;
  color: #fff;
  line-height: 0;
}

.scroll-top:hover {
  background: rgba(248, 90, 64, 0.8);
  color: #fff;
}

.scroll-top.active {
  visibility: visible;
  opacity: 1;
  bottom: 15px;
}

/*--------------------------------------------------------------
# Preloader
--------------------------------------------------------------*/
/*#preloader {
  position: fixed;
  inset: 0;
  z-index: 999999;
  overflow: hidden;
  background: #fff;
  transition: all 0.6s ease-out;
}

#preloader:before {
  content: "";
  position: fixed;
  top: calc(50% - 30px);
  left: calc(50% - 30px);
  border: 6px solid #fff;
  border-color: var(--color-primary) transparent var(--color-primary) transparent;
  border-radius: 50%;
  width: 60px;
  height: 60px;
  -webkit-animation: animate-preloader 1.5s linear infinite;
  animation: animate-preloader 1.5s linear infinite;
}

@-webkit-keyframes animate-preloader {
  0% {
    transform: rotate(0deg);
  }

  100% {
    transform: rotate(360deg);
  }
}

@keyframes animate-preloader {
  0% {
    transform: rotate(0deg);
  }

  100% {
    transform: rotate(360deg);
  }
}*/

/*--------------------------------------------------------------
# Disable aos animation delay on mobile devices
--------------------------------------------------------------*/
/*@media screen and (max-width: 768px) {
  [data-aos-delay] {
    transition-delay: 0 !important;
  }
}
*/
/*--------------------------------------------------------------
# Header
--------------------------------------------------------------*/
/*.topbar {
  background: #00796b;
  height: 40px;
  font-size: 14px;
  transition: all 0.5s;
  color: #fff;
  padding: 0;
}

.topbar .contact-info i {
  font-style: normal;
  color: #fff;
  line-height: 0;
}

.topbar .contact-info i a,
.topbar .contact-info i span {
  padding-left: 5px;
  color: #fff;
}

@media (max-width: 575px) {

  .topbar .contact-info i a,
  .topbar .contact-info i span {
    font-size: 13px;
  }
}

.topbar .contact-info i a {
  line-height: 0;
  transition: 0.3s;
}

.topbar .contact-info i a:hover {
  color: #fff;
  text-decoration: underline;
}

.topbar .social-links a {
  color: rgba(255, 255, 255, 0.7);
  line-height: 0;
  transition: 0.3s;
  margin-left: 20px;
}

.topbar .social-links a:hover {
  color: #fff;
}

.header {
  transition: all 0.5s;
  z-index: 997;
  height: 90px;
  background-color: var(--color-primary);
}

.header.sticked {
  position: fixed;
  top: 0;
  right: 0;
  left: 0;
  height: 70px;
  box-shadow: 0px 2px 20px rgba(0, 0, 0, 0.1);
}

.header .logo img {
  max-height: 40px;
  margin-right: 6px;
}

.header .logo h1 {
  font-size: 30px;
  margin: 0;
  font-weight: 600;
  letter-spacing: 0.8px;
  color: #fff;
  font-family: var(--font-primary);
}

.header .logo h1 span {
  color: #f96f59;
}

.sticked-header-offset {
  margin-top: 70px;
}

section {
  scroll-margin-top: 70px;
}*/

/*--------------------------------------------------------------
# Desktop Navigation
--------------------------------------------------------------*/
/*@media (min-width: 1280px) {
  .navbar {
    padding: 0;
  }

  .navbar ul {
    margin: 0;
    padding: 0;
    display: flex;
    list-style: none;
    align-items: center;
  }

  .navbar li {
    position: relative;
  }

  .navbar>ul>li {
    white-space: nowrap;
    padding: 10px 0 10px 28px;
  }

  .navbar a,
  .navbar a:focus {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 3px;
    font-family: var(--font-secondary);
    font-size: 16px;
    font-weight: 600;
    color: rgba(255, 255, 255, 0.6);
    white-space: nowrap;
    transition: 0.3s;
    position: relative;
  }

  .navbar a i,
  .navbar a:focus i {
    font-size: 12px;
    line-height: 0;
    margin-left: 5px;
  }

  .navbar>ul>li>a:before {
    content: "";
    position: absolute;
    width: 100%;
    height: 2px;
    bottom: -6px;
    left: 0;
    background-color: var(--color-secondary);
    visibility: hidden;
    width: 0px;
    transition: all 0.3s ease-in-out 0s;
  }

  .navbar a:hover:before,
  .navbar li:hover>a:before,
  .navbar .active:before {
    visibility: visible;
    width: 100%;
  }

  .navbar a:hover,
  .navbar .active,
  .navbar .active:focus,
  .navbar li:hover>a {
    color: #fff;
  }

  .navbar .dropdown ul {
    display: block;
    position: absolute;
    left: 28px;
    top: calc(100% + 30px);
    margin: 0;
    padding: 10px 0;
    z-index: 99;
    opacity: 0;
    visibility: hidden;
    background: #fff;
    box-shadow: 0px 0px 30px rgba(127, 137, 161, 0.25);
    transition: 0.3s;
    border-radius: 4px;
  }

  .navbar .dropdown ul li {
    min-width: 200px;
  }

  .navbar .dropdown ul a {
    padding: 10px 20px;
    font-size: 15px;
    text-transform: none;
    font-weight: 600;
    color: #006a5d;
  }

  .navbar .dropdown ul a i {
    font-size: 12px;
  }

  .navbar .dropdown ul a:hover,
  .navbar .dropdown ul .active:hover,
  .navbar .dropdown ul li:hover>a {
    color: var(--color-secondary);
  }

  .navbar .dropdown:hover>ul {
    opacity: 1;
    top: 100%;
    visibility: visible;
  }

  .navbar .dropdown .dropdown ul {
    top: 0;
    left: calc(100% - 30px);
    visibility: hidden;
  }

  .navbar .dropdown .dropdown:hover>ul {
    opacity: 1;
    top: 0;
    left: 100%;
    visibility: visible;
  }
}

@media (min-width: 1280px) and (max-width: 1366px) {
  .navbar .dropdown .dropdown ul {
    left: -90%;
  }

  .navbar .dropdown .dropdown:hover>ul {
    left: -100%;
  }
}

@media (min-width: 1280px) {

  .mobile-nav-show,
  .mobile-nav-hide {
    display: none;
  }
}*/

/*--------------------------------------------------------------
# Mobile Navigation
--------------------------------------------------------------*/
/*@media (max-width: 1279px) {
  .navbar {
    position: fixed;
    top: 0;
    right: -100%;
    width: 100%;
    max-width: 400px;
    bottom: 0;
    transition: 0.3s;
    z-index: 9997;
  }

  .navbar ul {
    position: absolute;
    inset: 0;
    padding: 50px 0 10px 0;
    margin: 0;
    background: rgba(0, 131, 116, 0.9);
    overflow-y: auto;
    transition: 0.3s;
    z-index: 9998;
  }

  .navbar a,
  .navbar a:focus {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 10px 20px;
    font-family: var(--font-primary);
    font-size: 15px;
    font-weight: 600;
    color: rgba(255, 255, 255, 0.7);
    white-space: nowrap;
    transition: 0.3s;
  }

  .navbar a i,
  .navbar a:focus i {
    font-size: 12px;
    line-height: 0;
    margin-left: 5px;
  }

  .navbar a:hover,
  .navbar .active,
  .navbar .active:focus,
  .navbar li:hover>a {
    color: #fff;
  }

  .navbar .getstarted,
  .navbar .getstarted:focus {
    background: var(--color-primary);
    padding: 8px 20px;
    border-radius: 4px;
    margin: 15px;
    color: #fff;
  }

  .navbar .getstarted:hover,
  .navbar .getstarted:focus:hover {
    color: #fff;
    background: rgba(0, 131, 116, 0.8);
  }

  .navbar .dropdown ul,
  .navbar .dropdown .dropdown ul {
    position: static;
    display: none;
    padding: 10px 0;
    margin: 10px 20px;
    transition: all 0.5s ease-in-out;
    background-color: #007466;
    border: 1px solid #006459;
  }

  .navbar .dropdown>.dropdown-active,
  .navbar .dropdown .dropdown>.dropdown-active {
    display: block;
  }

  .mobile-nav-show {
    color: rgba(255, 255, 255, 0.6);
    font-size: 28px;
    cursor: pointer;
    line-height: 0;
    transition: 0.5s;
    z-index: 9999;
    margin-right: 10px;
  }

  .mobile-nav-hide {
    color: #fff;
    font-size: 32px;
    cursor: pointer;
    line-height: 0;
    transition: 0.5s;
    position: fixed;
    right: 20px;
    top: 20px;
    z-index: 9999;
  }

  .mobile-nav-active {
    overflow: hidden;
  }

  .mobile-nav-active .navbar {
    right: 0;
  }

  .mobile-nav-active .navbar:before {
    content: "";
    position: fixed;
    inset: 0;
    background: rgba(0, 106, 93, 0.8);
    z-index: 9996;
  }
}*/

</style>
@endsection


<!-- <section id="topbar" class="topbar d-flex align-items-center"><div class="container d-flex justify-content-center justify-content-md-between"><div class="contact-info d-flex align-items-center"> <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:contact@example.com">contact@example.com</a></i> <i class="bi bi-phone d-flex align-items-center ms-4"><span>+1 5589 55488 55</span></i></div><div class="social-links d-none d-md-flex align-items-center"> <a href="#" class="twitter"><i class="bi bi-twitter"></i></a> <a href="#" class="facebook"><i class="bi bi-facebook"></i></a> <a href="#" class="instagram"><i class="bi bi-instagram"></i></a> <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a></div></div></section>
<header id="header" class="header d-flex align-items-center"><div class="container-fluid container-xl d-flex align-items-center justify-content-between"> <a href="index.html" class="logo d-flex align-items-center"><h1>Impact<span>.</span></h1> </a><nav id="navbar" class="navbar"><ul><li><a href="#hero" class="active">Home</a></li><li><a href="#about">About</a></li><li><a href="#services">Services</a></li><li><a href="#portfolio">Portfolio</a></li><li><a href="#team">Team</a></li><li><a href="blog.html">Blog</a></li><li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a><ul><li><a href="#">Drop Down 1</a></li><li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a><ul><li><a href="#">Deep Drop Down 1</a></li><li><a href="#">Deep Drop Down 2</a></li><li><a href="#">Deep Drop Down 3</a></li><li><a href="#">Deep Drop Down 4</a></li><li><a href="#">Deep Drop Down 5</a></li></ul></li><li><a href="#">Drop Down 2</a></li><li><a href="#">Drop Down 3</a></li><li><a href="#">Drop Down 4</a></li></ul></li><li><a href="#contact">Contact</a></li></ul></nav> <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i> <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i></div></header> -->

  <section class="header-area bg-section">
    <div class="navbar-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg">
                        <a class="navbar-brand" href="/">
                            <img class="logo_img" src="{{ url('public/assets/spa/images/img/800x300-done2.png') }}" alt="Logo">
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
                    </nav> 
            </div> 
        </div> 
    </div> 
</section>  

