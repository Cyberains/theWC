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

<style type="text/css">
    
    .privacy-area{

        margin-top: 120px;
        margin-bottom: 60px;
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
        

    </section>
     <!--====== NAVBAR PART END ======-->
    
     <!--====== PRIVACY PART START ======-->

    <section id="privacy" class="privacy-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="text-center">DISCLAIMER</h3>
                    <p>Last updated: 2020-11-23</p><br>
                    <h4>WEBSITE DISCLAIMER</h4>
                    <p>The information provided by EARLY BASKET (“Company”, “we”, “our”, “us”) on earlybasket.com (the “Site”) is for general informational purposes only. All information on the Site is provided in good faith, however we make no representation or warranty of any kind, express or implied, regarding the accuracy, adequacy, validity, reliability, availability, or completeness of any information on the Site.</p>
                    <p>UNDER NO CIRCUMSTANCE SHALL WE HAVE ANY LIABILITY TO YOU FOR ANY LOSS OR DAMAGE OF ANY KIND INCURRED AS A RESULT OF THE USE OF THE SITE OR RELIANCE ON ANY INFORMATION PROVIDED ON THE SITE. YOUR USE OF THE SITE AND YOUR RELIANCE ON ANY INFORMATION ON THE SITE IS SOLELY AT YOUR OWN RISK.</p>
                    <h4>EXTERNAL LINKS DISCLAIMER</h4>
                    <p>The Site may contain (or you may be sent through the Site) links to other websites or content belonging to or originating from third parties or links to websites and features. Such external links are not investigated, monitored, or checked for accuracy, adequacy, validity, reliability, availability or completeness by us.</p>
                    <p>For example, the outlined Disclaimer has been created using PolicyMaker.io, a free web application for generating high-quality legal documents. PolicyMaker’s disclaimer generator is an easy-to-use tool for creating an excellent sample Disclaimer template for a website, blog, eCommerce store or app.</p>
                    <p>WE DO NOT WARRANT, ENDORSE, GUARANTEE, OR ASSUME RESPONSIBILITY FOR THE ACCURACY OR RELIABILITY OF ANY INFORMATION OFFERED BY THIRD-PARTY WEBSITES LINKED THROUGH THE SITE OR ANY WEBSITE OR FEATURE LINKED IN ANY BANNER OR OTHER ADVERTISING. WE WILL NOT BE A PARTY TO OR IN ANY WAY BE RESPONSIBLE FOR MONITORING ANY TRANSACTION BETWEEN YOU AND THIRD-PARTY PROVIDERS OF PRODUCTS OR SERVICES.</p>
                    <h4>PROFESSIONAL DISCLAIMER</h4>
                    <p>The Site can not and does not contain medical advice. The information is provided for general informational and educational purposes only and is not a substitute for professional medical advice. Accordingly, before taking any actions based upon such information, we encourage you to consult with the appropriate professionals. We do not provide any kind of medical advice.</p>
                    <p>Content published on earlybasket.com is intended to be used and must be used for informational purposes only. It is very important to do your own analysis before making any decision based on your own personal circumstances. You should take independent medical advice from a professional or independently research and verify any information that you find on our Website and wish to rely upon.</p><br>
                    <p>THE USE OR RELIANCE OF ANY INFORMATION CONTAINED ON THIS SITE IS SOLELY AT YOUR OWN RISK.</p>
                    <h4>TESTIMONIALS DISCLAIMER</h4>
                    <p>The Site may contain testimonials by users of our products and/or services. These testimonials reflect the real-life experiences and opinions of such users. However, the experiences are personal to those particular users, and may not necessarily be representative of all users of our products and/or services. We do not claim, and you should not assume that all users will have the same experiences.</p>
                    <h4>YOUR INDIVIDUAL RESULTS MAY VARY.</h4>
                    <p>The testimonials on the Site are submitted in various forms such as text, audio and/or video, and are reviewed by us before being posted. They appear on the Site verbatim as given by the users, except for the correction of grammar or typing errors. Some testimonials may have been shortened for the sake of brevity, where the full testimonial contained extraneous information not relevant to the general public.</p>
                    <p>The views and opinions contained in the testimonials belong solely to the individual user and do not reflect our views and opinions.</p>
                    <h4>ERRORS AND OMISSIONS DISCLAIMER</h4>
                    <p>While we have made every attempt to ensure that the information contained in this site has been obtained from reliable sources, EARLY BASKET is not responsible for any errors or omissions or for the results obtained from the use of this information. All information in this site is provided “as is”, with no guarantee of completeness, accuracy, timeliness or of the results obtained from the use of this information, and without warranty of any kind, express or implied, including, but not limited to warranties of performance, merchantability, and fitness for a particular purpose.</p>
                    <p>In no event will EARLY BASKET, its related partnerships or corporations, or the partners, agents or employees thereof be liable to you or anyone else for any decision made or action taken in reliance on the information in this Site or for any consequential, special or similar damages, even if advised of the possibility of such damages.</p>
                    <h4>GUEST CONTRIBUTORS DISCLAIMER</h4>
                    <p>This Site may include content from guest contributors and any views or opinions expressed in such posts are personal and do not represent those of EARLY BASKET or any of its staff or affiliates unless explicitly stated.</p>
                    <h4>LOGOS AND TRADEMARKS DISCLAIMER</h4>
                    <p>All logos and trademarks of third parties referenced on earlybasket.com are the trademarks and logos of their respective owners. Any inclusion of such trademarks or logos does not imply or constitute any approval, endorsement or sponsorship of EARLY BASKET by such owners.</p>
                    <h4>CONTACT US</h4>
                    <p>Should you have any feedback, comments, requests for technical support or other inquiries, please contact us by email: support@earlybasket.com.</p><br>
                    <p>This Disclaimer was created by earlybasket.com on 2020-11-23.</p>
                </div>
            </div>
        </div> <!-- container -->
    </section>

    <!--====== PRIVACY PART ENDS ======-->
   
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
                                <!-- <li><i class="fa fa-phone pr-2"></i><a href="tel:1800-212-3667">Toll Free No : 1800-212-3667</a></li> -->
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
