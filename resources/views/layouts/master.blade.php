<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="robots" content="noindex,nofollow">
    <meta name="googlebot" content="noindex,nofollow">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="author" content="TechyDevs">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Favicon -->
    <link rel="icon" href="{{asset('/images/favicon.png')}}">
    <!-- Google Fonts -->
    <title>@yield('title')</title>
    <meta name="description" content="@yield('meta_description')"/>
    <meta name="keywords" content="@yield('meta_keywords')">
    <link rel="canonical" href="{{url()->current()}}"/>
    <meta property="og:image" content="@yield('sharingimg')">
    <meta property="og:image:width" content="968">
    <meta property="og:image:height" content="504">
    <meta property="og:title" content="@yield('title')"/>
    <meta property="og:description" content="@yield('meta_description')"/>
    <meta property="og:type" content="website"/>
    <meta data-rh="true" property="og:url" content="{{url()->current()}}"/>
    <meta data-rh="true" property="og:site_name" content="speedycalculator"/>
    <meta data-rh="true" property="twitter:domain" content="{{url()->current()}}"/>
    <meta data-rh="true" property="twitter:url" content="{{url()->current()}}"/>
    <meta data-rh="true" name="twitter:title" content="@yield('title')"/>
    <meta data-rh="true" name="twitter:description" content="@yield('meta_description')"/>
    <meta data-rh="true" name="twitter:image:src" content="@yield('sharingimg')"/>
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam:wght@100;300;400;500;600;700;800&display=swap"
          rel="stylesheet">
    <!-- Template CSS Files -->
    <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/line-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/animated-headline.css')}}">
    <link rel="stylesheet" href="{{asset('/css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset('/css/jquery.fancybox.css')}}">
    <link rel="stylesheet" href="{{asset('/css/chosen.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('/css/custom.css')}}">
    @yield('css')
</head>
<body>

@include('partials.header')

<main id="main">
   {{-- <div class="loader-container">
        <div class="loader-ripple">
            <div></div>
            <div></div>
        </div>
    </div>--}}
    @yield('content')
</main>
@include('partials.footer')
<a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
<script src="{{asset('/js/jquery-3.4.1.min.js')}}"></script>
<script src="{{asset('/js/jquery-ui.js')}}"></script>
<script src="{{asset('/js/popper.min.js')}}"></script>
<script src="{{asset('/js/bootstrap.min.js')}}"></script>
<script src="{{asset('/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('/js/jquery.fancybox.min.js')}}"></script>
<script src="{{asset('/js/animated-headline.js')}}"></script>
<script src="{{asset('/js/chosen.min.js')}}"></script>
<script src="{{asset('/js/moment.min.js')}}"></script>
<script src="{{asset('/js/datedropper.min.js')}}"></script>
<script src="{{asset('/js/waypoints.min.js')}}"></script>
<script src="{{asset('/js/jquery.counterup.min.js')}}"></script>
<script src="{{asset('/js/jquery-rating.js')}}"></script>
<script src="{{asset('/js/tilt.jquery.min.js')}}"></script>
<script src="{{asset('/js/jquery.lazy.min.js')}}"></script>
<script src="{{asset('/js/main.js')}}"></script>
</body>
</html>
