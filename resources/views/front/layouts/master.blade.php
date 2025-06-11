<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="wpOceans">
    <link rel="shortcut icon" type="image/png" href="{{ asset('front_assets/assets/images/favicon.png') }}">
    <title> Soni Community</title>
    <link href="{{ asset('front_assets/assets/css/themify-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('front_assets/assets/css/flaticon_aidus.css') }}" rel="stylesheet">
    <link href="{{ asset('front_assets/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('front_assets/assets/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('front_assets/assets/css/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('front_assets/assets/css/owl.theme.css') }}" rel="stylesheet">
    <link href="{{ asset('front_assets/assets/css/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('front_assets/assets/css/slick-theme.css') }}" rel="stylesheet">
    <link href="{{ asset('front_assets/assets/css/swiper.min.css') }}" rel="stylesheet">
    <link href="{{ asset('front_assets/assets/css/owl.transitions.css') }}" rel="stylesheet">
    <link href="{{ asset('front_assets/assets/css/jquery.fancybox.css') }}" rel="stylesheet">
    <link href="{{ asset('front_assets/assets/css/odometer-theme-default.css') }}" rel="stylesheet">
    <link href="{{ asset('front_assets/assets/sass/style.css') }}" rel="stylesheet">
    <style>
        .uncolor-stars{
            color:grey !important;
        }
    </style>
</head>

<body>

    <!-- start page-wrapper -->
    <div class="page-wrapper">
        <!-- start preloader -->
        <div class="preloader">
            <div class="vertical-centered-box">
                <div class="content">
                    <div class="loader-circle"></div>
                    <div class="loader-line-mask">
                        <div class="loader-line"></div>
                    </div>
                    {{-- <img src="{{ asset('front_assets/assets/images/preloader.png') }}" alt=""> --}}
                    <img src="{{ asset('logo') }}/soni-logo.png" alt="" width="150" height="70">
                </div>
            </div>
        </div>
        <!-- end preloader -->
        <!-- Start header -->
        @include('front.layouts.partials.header')
        <!-- End header -->
        @yield('content')
        <!-- start footer -->
        @include('front.layouts.partials.footer')
        <!-- end footer -->
    </div>
    <!-- end of page-wrapper -->
    <!-- All JavaScript files
    ================================================== -->
    <script src="{{ asset('front_assets/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('front_assets/assets/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Plugins for this template -->
    <script src="{{ asset('front_assets/assets/js/modernizr.custom.js') }}"></script>
    <script src="{{ asset('front_assets/assets/js/jquery.dlmenu.js') }}"></script>
    <script src="{{ asset('front_assets/assets/js/jquery-plugin-collection.js') }}"></script>
    <!-- Custom script for this template -->
    <script src="{{ asset('front_assets/assets/js/script.js') }}"></script>
</body>

</html>
