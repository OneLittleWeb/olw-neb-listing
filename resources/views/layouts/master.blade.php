<!DOCTYPE html>
<html lang="en">
<head>
    @yield('meta')
    {{Meta::setContentType('text/html')
            ->addMeta('X-UA-Compatible', ['content' => 'ie=edge'])
            ->addMeta('author', ['content' => 'serpkick'])
            ->setFavicon(asset('/images/favicon.png'))
            ->setCanonical(request()->fullUrl())
            }}
    <title>@yield('title')</title>
    <meta name="description" content="@yield('meta_description')"/>
    <meta name="keywords" content="@yield('meta_keywords')">
    <meta property="og:image" content="@yield('sharingimg')">
    <meta property="og:image:width" content="968">
    <meta property="og:image:height" content="504">
    <meta property="og:title" content="@yield('title')"/>
    <meta property="og:description" content="@yield('meta_description')"/>
    <meta property="og:type" content="website"/>
    <meta data-rh="true" property="og:url" content="{!! request()->fullUrl() !!}"/>
    <meta data-rh="true" property="og:site_name" content="nebraskalisting"/>
    <meta data-rh="true" property="twitter:domain" content="{!! request()->fullUrl() !!}"/>
    <meta data-rh="true" property="twitter:url" content="{!! request()->fullUrl() !!}"/>
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
    <link rel="stylesheet" href="{{asset('plugins/ratings/src/css/star-rating-svg.css')}}">

    {{--    font awesome cdn--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
          integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    @yield('css')
    @yield('json-ld')
    @production
        <!-- Clarity tracking -->
        <script>
            (function (c, l, a, r, i, t, y) {
                c[a] = c[a] || function () {
                    (c[a].q = c[a].q || []).push(arguments)
                };
                t = l.createElement(r);
                t.async = 1;
                t.src = "https://www.clarity.ms/tag/" + i + "?ref=bwt";
                y = l.getElementsByTagName(r)[0];
                y.parentNode.insertBefore(t, y);
            })(window, document, "clarity", "script", "gisv7cfnth");
        </script>

        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-T89B1MD5QN"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());
            gtag('config', 'G-T89B1MD5QN');
        </script>
    @endproduction
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
<script src="{{asset('/js/custom.js')}}"></script>

@yield('js')
@include('sweetalert::alert')

</body>
</html>
