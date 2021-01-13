<!--
    Starter pack for scss
    Made By:    Tajmirul Islam Akhand
    contact:    tasmirolislam@gmail.com
    facebook:   https://facebook.com/akhand.tajmirul
-->

<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>E-Shop</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ALL CSS -->


    <link rel="stylesheet" href="{{asset('public/frontend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/css/slick-theme.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/fonts/icofont.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/css/default.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/change_front/css/custom_style.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/change_front/css/responsive.css')}}">

    <!-- google font (Roboto) -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">

    {{-- <link rel="stylesheet" href="{{asset('public/frontend/css/style.css')}}"> --}}
</head>

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    {{-- <div class="go-to-top"><i class="icofont-rounded-up"></i></div> --}}
    <!-- go to top button -->
    <div class="preloader"><div class="preloader-inner"></div></div>
    <!-- end of preloader -->



    @include('layouts.frontend.header')

    @yield('content')

    @include('layouts.frontend.footer')


    <!-- ALL JS -->
    <script src="{{asset('public/frontend/js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/popper.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.zoom.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/mixitup.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/slick.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.countdown.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.countTo.js')}}"></script>
    <script src="{{asset('public/frontend/js/wow.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.sticky-sidebar.js')}}"></script>


    <script src="{{asset('public/frontend/change_front/js/custom_script.js')}}"></script>



    {{-- <script src="{{asset('public/frontend/js/main.js')}}"></script> --}}
</body>

</html>
