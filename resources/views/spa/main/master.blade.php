<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- font -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Dosis:200,300,400,500,600,700,800&display=swap">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <title>The Woman Company </title>
    <link rel="stylesheet" href="{{ URL::asset('public/assets/spa/css/bootstrap.min.css')}}">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link rel="shortcut icon" href="{{ URL::asset('public/assets/spa/images/img/favicon-1.PNG')}}" type="image/png">
    <link rel="stylesheet" href="{{ URL::asset('public/assets/spa/css/LineIcons.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('public/assets/spa/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('public/assets/spa/css/slick.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('public/assets/spa/css/animate.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('public/assets/spa/css/default.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('public/assets/spa/css/style.css')}}">
</head>

<body>
    @include('sweetalert::alert')
    @include("spa.main.navbar")
    <!-- body section -->
    @yield('content')
    <!-- Include Footer -->
    @include("spa.main.footer")

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
    @yield('script')
</body>

</html>
