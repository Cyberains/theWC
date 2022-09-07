<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap Min CSS -->
    <!-- Owl Theme Default Min CSS -->
    <link rel="stylesheet" href="{{ URL::asset('public/assets/spa/css/owl.theme.default.min.css')}}">
    <!-- Owl Carousel Min CSS -->
    <link rel="stylesheet" href="{{ URL::asset('public/assets/spa/css/owl.carousel.min.css')}}">
    <!-- Animate Min CSS -->
    <link rel="stylesheet" href="{{ URL::asset('public/assets/spa/css/animate.min.css')}}">
    <!-- Boxicons Min CSS -->
    <link rel="stylesheet" href="{{ URL::asset('public/assets/spa/css/boxicons.min.css')}}">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="{{ URL::asset('public/assets/spa/css/flaticon.css')}}">
    <!-- Meanmenu Min CSS -->
    <link rel="stylesheet" href="{{ URL::asset('public/assets/spa/css/meanmenu.min.css')}}">
    <!-- Nice Select Min CSS -->
    <link rel="stylesheet" href="{{ URL::asset('public/assets/spa/css/nice-select.min.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ URL::asset('public/assets/spa/css/bootstrap.min.css')}}">

    <!-- Odometer Min CSS-->
    <link rel="stylesheet" href="{{ URL::asset('public/assets/spa/css/odometer.min.css')}}">
    <!-- Magnific Min CSS-->
    <link rel="stylesheet" href="{{ URL::asset('public/assets/spa/css/magnific-popup.min.css')}}">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ URL::asset('public/assets/spa/css/style.css')}}">
    <!-- <link rel="stylesheet" href="{{ URL::asset('public/assets/spa/css/style.scss')}}"> -->
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ URL::asset('public/assets/spa/css/responsive.css')}}">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="images/favicon.png">
    <!-- font -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Dosis:200,300,400,500,600,700,800&display=swap">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <!-- Title -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

    <title>Salon </title>
    <style>
        body {
            overflow-x: hidden;
            background-color: #f8f8f8;
        }

        .list-group-horizontal-lg .list-group-item {
            background-color: #00042c;
            ;
            border: none;
            color: white;
            padding-left: 5px;
        }

        .get_app_form {
            width: 100%;
            display: flex;
            border: 1px solid #e2e2e2;
            background: #fff;
            box-shadow: 0 2px 8px 0 rgb(0 0 0 / 8%);
            position: relative;
            margin-top: 35px;
        }

        .get_app_form .country_code {
            display: flex;
            width: 55px;
            justify-content: center;
            align-items: center;
            margin: 15px 0;
            border-right: 1px solid #e2e2e2;
            position: absolute;
            top: -15px;
            height: 57px;
        }

        .get_app_form input {
            height: 57px;
            width: 100%;
            padding-left: 65px;
            border: none;
        }

        .get_app_form input:focus {

            border: 1ps solid white;
        }

        .btn {
            width: 130px;
        }

        .download_app {
            display: flex;
            flex-direction: row;
            margin-top: 35px;
        }

        .download_app a {
            width: 244px;
            height: 78px;
        }

        .download_app a.apple_play {
            margin-left: 20px;
        }

        .footer_top {
            padding: 36px 0;
            font-size: 20px;
            font-weight: 500;
            background: #15164b;
        }

        .inner_container {
            width: 1050px;
            margin: 0 auto;
            padding: 0;
        }

        .link_divider {
            color: #fff;
        }

        .footer_link {
            display: flex;
            align-items: center;

        }

        .footer_link a {
            color: white;
            padding: 2px;
        }

        .footer_link a:hover {
            color: white;
        }
    </style>
</head>

<body>
    <!-- Include Header -->
    @include("spa.main.links")
    @include("spa.main.navbar")

    <!-- body section -->
    @yield('content')

    <!-- Include Footer -->
    @include("spa.main.footer")
    @include("spa.main.common_file")


    @yield('script')
    <script>
        // <!-- Http Errors -->
        const ajax_errors = {
            http_not_connected: "{{ transLang('http_not_connected') }}",
            request_forbidden: "{{ transLang('request_forbidden') }}",
            not_found_request: "{{ transLang('not_found_request') }}",
            session_expire: "{{ transLang('session_expire') }}",
            service_unavailable: "{{ transLang('service_unavailable') }}",
            parser_error: "{{ transLang('parser_error') }}",
            request_timeout: "{{ transLang('request_timeout') }}",
            request_abort: "{{ transLang('request_abort') }}"
        };

        function formatErrorMessage(jqXHR, exception) {
            if (jqXHR.status === 0) {
                return ajax_errors.http_not_connected;
            } else if (jqXHR.status == 400) {
                return ajax_errors.request_forbidden;
            } else if (jqXHR.status == 404) {
                return ajax_errors.not_found_request;
            } else if (jqXHR.status == 500) {
                return ajax_errors.session_expire;
            } else if (jqXHR.status == 503) {
                return ajax_errors.service_unavailable;
            } else if (exception === 'parsererror') {
                return ajax_errors.parser_error;
            } else if (jqXHR.status == 419 || exception === 'timeout') {
                return ajax_errors.request_timeout;
            } else if (exception === 'abort') {
                return ajax_errors.request_abort;
            } else {
                var message = '';
                try {
                    var r = jQuery.parseJSON(jqXHR.responseText);
                    if (jQuery.isEmptyObject(r) == false) {
                        $.each(r.errors, function(key, value) {
                            if (jQuery.isEmptyObject(r) != false) {
                                $.each(value, function(key, row) {
                                    message += '<p>' + row + '</p>';
                                });
                            } else {
                                message += '<p>' + value + '</p>';
                            }
                        });
                    }
                } catch (e) {
                    message = 'Uncaught Error.\n' + jqXHR.responseText;
                }
                return message;
            }
        }
    </script>
</body>

</html>