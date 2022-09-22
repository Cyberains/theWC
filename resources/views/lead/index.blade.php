<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>The Women's Company</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon-icon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <!-- font icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <style>
        .select_option option:hover{background-color:yellow!important;}
    </style>
</head>

<body>



<!-- ======= Header ======= -->
<header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

        <div class="logo">
            <h1 class="text-light"><a href="index.php"><span><img src="assets/img/the_women-logo.png"></span></a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        </div>

        <nav id="navbar" class="navbar">
            <ul>
                <!--   <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                  <li><a class="nav-link scrollto" href="#contact">Contact</a></li> -->
                <li><a class="nav-link scrollto active" href="mailto:partner@thewomenscompany.in"><i aria-hidden="true" class="fa fa-envelope p-1"></i>partner@thewomenscompany.in</a></li>
                <li><a href="tel:+9643824343"><i aria-hidden="true" class="fa fa-phone p-1"></i>+91 9643-82-4343</a></li>

            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
    </div>
</header>
<!-- End Header -->
<div class="row section-bg" style="margin-right: auto !important; ">
    <div class="col-md-8 bg-section ml-2">
        <div class="owl-carousel owl-theme">
            <!--  <div class="item"><h4>1</h4></div>
             <div class="item"><h4>2</h4></div>
             <div class="item"><h4>3</h4></div> -->
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner" style=padding-left:20px!important;>
                    <div class="carousel-item active pt-4">
                        <img class="d-block w-100" src="assets/img/slide/01.png" alt="First slide" style="height: 500px;">
                    </div>
                    <div class="carousel-item pt-4">
                        <img class="d-block w-100" src="assets/img/slide/02.png" alt="Second slide" style="height: 500px;">
                    </div>
                    <div class="carousel-item pt-4">
                        <img class="d-block w-100" src="assets/img/slide/03.png" alt="Third slide" style="height: 500px;">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

        </div>
    </div>
    <div class="col-md-4">
        <div class="more-services">
            <div class="form_wrapper">
                <div class="form_container">
                    <div class="title_container">
                        <h2>Professional</h2>
                    </div>
                    <div class="row clearfix">
                        <div class="">
                            <form method="post" action="{{ route('post-lead') }}">
                                @csrf
                                <div class="input_field"> <span><i aria-hidden="true" class="fa fa-user"></i></span>
                                    <input type="text" name="name" placeholder="Name" required />
                                </div>
                                <div class="input_field"> <span><i aria-hidden="true" class="fa fa-phone"></i></span>
                                    <input type="text" name="phone" placeholder="Phone Number" required />
                                </div>
                                <div class="input_field"> <span><i aria-hidden="true" class="fa fa-envelope"></i></span>
                                    <input type="email" name="email" placeholder="Email" required />
                                </div>
                                <div class="input_field"> <span><i aria-hidden="true" class="fa fa-home"></i></span>
                                    <textarea class="form-control" name="work_location"  placeholder="Work Location" rows="1"></textarea>
                                </div>

                                <div class="input_field radio_option">
                                    <input type="radio" name="male" id="rd1">
                                    <label for="rd1">Male</label>
                                    <input type="radio" name="female" id="rd2">
                                    <label for="rd2">Female</label>
                                </div>
                                <div class="input_field select_option">
                                    <select name="professional_qualification">
                                        <option>Professional Qualification</option>
                                        <option>Home salon Specialist</option>
                                        <option>Spa Specialist (Female)</option>
                                        <option>Hair Care Specialist</option>
                                        <option>Bridal Makeup Expert </option>
                                        <option>Mehndi Expert  </option>
                                    </select>
                                    <div class="select_arrow"></div>
                                </div>
                                <div class="input_field select_option">
                                    <select name="total_work_experience">
                                        <option>Total Work Experience</option>
                                        <option>Fresher</option>
                                        <option>Upto 3 Years</option>
                                        <option>3 To 5 Years</option>
                                        <option>5 To 8 Years</option>
                                        <option>8+ Years</option>
                                    </select>
                                    <div class="select_arrow"></div>
                                </div>
                                <div class="input_field checkbox_option">
                                    <input type="checkbox" id="cb1" name="terms_condition">
                                    <label for="cb1">I agree with terms and conditions</label>
                                </div>
                                <input class="button" type="submit" value="Sign Up" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- End Hero -->
</div>
</div>




<!-- ======= Footer ======= -->
<footer id="footer">
    <div class="container">
        <div class="copyright">
            &copy; Copyright <strong><span>The Women's Company</span></strong>. All Rights Reserved
        </div>
        <div class="credits">

            <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="https://www.instagram.com/the_womens_company/" target="_blank" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="https://www.linkedin.com/company/the-womens-company/" target="_blank" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
        </div>

    </div>


</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>
<script>
    $('.owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:5
            }
        }
    })
</script>

</body>

</html>
