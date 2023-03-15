@extends('layouts.master')
@section('title', "Nebraskalisting")
@section('meta_description', "add")
@section('meta_keywords',"add")
@section('content')
    <section class="hero-wrapper hero-bg-2 pb-0 overflow-hidden">
        <div class="overlay"></div><!-- end overlay -->
        <span class="line-bg line-bg1"></span>
        <span class="line-bg line-bg2"></span>
        <span class="line-bg line-bg3"></span>
        <span class="line-bg line-bg4"></span>
        <span class="line-bg line-bg5"></span>
        <span class="line-bg line-bg6"></span>

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="hero-heading text-center">
                        <div class="section-heading">
                            <h2 class="sec__title">Find The Best Places in your city</h2>
                            <p class="sec__desc">Nebraskalisting helps you find out what's happening in your city, Let's
                                explore.</p>
                        </div>
                    </div><!-- end hero-heading -->
                    <form action="{{ route('search') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="main-search-input main-search-input-2 position-relative z-index-2">
                            <div class="main-search-input-item">
                                <div class="form-box">
                                    <div class="input-box">
                                        <label class="label-text" for="looking_for">What are you <span
                                                class="required">*</span></label>
                                        <div class="form-group mb-0">
                                            <span class="la la-search form-icon"></span>
                                            <input class="typeahead form-control" type="search" name="looking_for"
                                                   id="looking_for"
                                                   placeholder="looking for?" required autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end main-search-input-item -->
                            <div class="main-search-input-item user-chosen-select-container">
                                <label class="label-text" for="search_location">Where to look? <span
                                        class="required">*</span></label>
                                <select class="user-chosen-select" name="search_location" id="search_location" required>
                                    <option value="">Select a Location</option>
                                    @foreach($cities as $city)
                                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                                    @endforeach
                                </select>
                            </div><!-- end main-search-input-item -->
                            <div class="main-search-input-item user-chosen-select-container">
                                <label class="label-text" for="search_category">What Category?</label>
                                <select class="user-chosen-select" name="search_category" id="search_category">
                                    <option value="">Select a Category</option>
                                    @foreach($categories as $category)
                                        <option class="text-capitalize"
                                                value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div><!-- end main-search-input-item -->
                            <div class="main-search-input-item">
                                <label class="label-text">Search</label>
                                <button class="theme-btn gradient-btn border-0 w-100" type="submit"><i
                                        class="la la-search mr-2"></i>Search Now
                                </button>
                            </div><!-- end main-search-input-item -->
                        </div><!-- end main-search-input -->
                    </form>
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container -->

        <!-- =======START CATEGORY AREA======= -->
        <section class="category-area position-relative bg-gray section--padding">
            <div class="container">
                <div class="row highlighted-categories justify-content-center">
                    @foreach($categories as $category)
                    <div class="col-lg-2 col-sm-6">
                        <div class="hero-category-item hero-category-item-layout-2">
                            <a href="{{ route('category.business', $category->slug) }}" class="d-block hero-cat-link">
                                <span class="icon-element mx-auto {{ $category->background }}"><i class="{{ $category->icon }}"></i></span>
                                {{ $category->name }}
                            </a>
                        </div>
                    </div><!-- end col-lg-2 -->
                    @endforeach
                </div>
            </div><!-- end container -->
        </section><!-- end category-area -->
        <!-- ================================
            END CATEGORY AREA
        ================================= -->
    </section><!-- end hero-wrapper -->
    <!-- ====START MAJOR CITY AREA==== -->
    <section class="category-area bg-white arrow-down-shape position-relative section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading text-center">
                        <div class="section-icon gradient-icon mb-3 mx-auto">
                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                 viewBox="0 0 438.891 438.891" xml:space="preserve">
                            <defs>
                                <linearGradient id="svg-gradient">
                                    <stop offset="5%" stop-color="#ff6b6b"/>
                                    <stop offset="95%" stop-color="#ffbb3d"/>
                                </linearGradient>
                            </defs>
                                <g>
                                    <path d="M347.968,57.503h-39.706V39.74c0-5.747-6.269-8.359-12.016-8.359h-30.824c-7.314-20.898-25.6-31.347-46.498-31.347
                                                c-20.668-0.777-39.467,11.896-46.498,31.347h-30.302c-5.747,0-11.494,2.612-11.494,8.359v17.763H90.923
                                                c-23.53,0.251-42.78,18.813-43.886,42.318v299.363c0,22.988,20.898,39.706,43.886,39.706h257.045
                                                c22.988,0,43.886-16.718,43.886-39.706V99.822C390.748,76.316,371.498,57.754,347.968,57.503z M151.527,52.279h28.735
                                                c5.016-0.612,9.045-4.428,9.927-9.404c3.094-13.474,14.915-23.146,28.735-23.51c13.692,0.415,25.335,10.117,28.212,23.51
                                                c0.937,5.148,5.232,9.013,10.449,9.404h29.78v41.796H151.527V52.279z M370.956,399.185c0,11.494-11.494,18.808-22.988,18.808
                                                H90.923c-11.494,0-22.988-7.314-22.988-18.808V99.822c1.066-11.964,10.978-21.201,22.988-21.42h39.706v26.645
                                                c0.552,5.854,5.622,10.233,11.494,9.927h154.122c5.98,0.327,11.209-3.992,12.016-9.927V78.401h39.706
                                                c12.009,0.22,21.922,9.456,22.988,21.42V399.185z"/>
                                    <path d="M179.217,233.569c-3.919-4.131-10.425-4.364-14.629-0.522l-33.437,31.869l-14.106-14.629
                                                c-3.919-4.131-10.425-4.363-14.629-0.522c-4.047,4.24-4.047,10.911,0,15.151l21.42,21.943c1.854,2.076,4.532,3.224,7.314,3.135
                                                c2.756-0.039,5.385-1.166,7.314-3.135l40.751-38.661c4.04-3.706,4.31-9.986,0.603-14.025
                                                C179.628,233.962,179.427,233.761,179.217,233.569z"/>
                                    <path d="M329.16,256.034H208.997c-5.771,0-10.449,4.678-10.449,10.449s4.678,10.449,10.449,10.449H329.16
                                                c5.771,0,10.449-4.678,10.449-10.449S334.931,256.034,329.16,256.034z"/>
                                    <path d="M179.217,149.977c-3.919-4.131-10.425-4.364-14.629-0.522l-33.437,31.869l-14.106-14.629
                                                c-3.919-4.131-10.425-4.364-14.629-0.522c-4.047,4.24-4.047,10.911,0,15.151l21.42,21.943c1.854,2.076,4.532,3.224,7.314,3.135
                                                c2.756-0.039,5.385-1.166,7.314-3.135l40.751-38.661c4.04-3.706,4.31-9.986,0.603-14.025
                                                C179.628,150.37,179.427,150.169,179.217,149.977z"/>
                                    <path d="M329.16,172.442H208.997c-5.771,0-10.449,4.678-10.449,10.449s4.678,10.449,10.449,10.449H329.16
                                                c5.771,0,10.449-4.678,10.449-10.449S334.931,172.442,329.16,172.442z"/>
                                    <path d="M179.217,317.16c-3.919-4.131-10.425-4.363-14.629-0.522l-33.437,31.869l-14.106-14.629
                                                c-3.919-4.131-10.425-4.363-14.629-0.522c-4.047,4.24-4.047,10.911,0,15.151l21.42,21.943c1.854,2.076,4.532,3.224,7.314,3.135
                                                c2.756-0.039,5.385-1.166,7.314-3.135l40.751-38.661c4.04-3.706,4.31-9.986,0.603-14.025
                                                C179.628,317.554,179.427,317.353,179.217,317.16z"/>
                                    <path d="M329.16,339.626H208.997c-5.771,0-10.449,4.678-10.449,10.449s4.678,10.449,10.449,10.449H329.16
                                                c5.771,0,10.449-4.678,10.449-10.449S334.931,339.626,329.16,339.626z"/>
                                </g>
                        </svg>
                        </div>
                        <h2 class="sec__title">Major Cities</h2>
                        <p class="sec__desc">Nebraska has four major cities: Omaha, Lincoln, Bellevue and Grand Island.
                            Omaha is the
                            largest and serves as the state's economic hub, while Lincoln is the capital and home to the
                            University of Nebraska. Bellevue is a smaller city located just south of Omaha.
                        </p>
                    </div><!-- end section-heading -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
            <div class="row mt-5">
                @foreach($major_cities as $major_city)
                    <div class="col-lg-3 responsive-column">
                        <div class="category-item overflow-hidden">
                            <img src="{{asset('images/city/' . $major_city->background_image)}}"
                                 data-src="{{asset('images/city/' . $major_city->background_image)}}"
                                 alt="category-image" class="lazy cat-img">
                            <div class="category-content d-flex align-items-center justify-content-center">
                                <a href="{{ route('category.index', $major_city->slug) }}"
                                   class="category-link d-flex flex-column justify-content-center w-100 h-100">
                                    <div class="cat-content">
                                        <h4 class="cat__title mb-3">{{ $major_city->name }}</h4>
                                    </div>
                                </a>
                            </div>
                        </div><!-- end category-item -->
                    </div><!-- end col-lg-3 -->
                @endforeach
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end category-area -->
    <!-- =======END MAJOR CITY AREA====== -->
    <!-- ====START MOST POPULAR CITY AREA==== -->
    <section class="category-area arrow-down-shape position-relative section-padding" style="background-color: #e9ecef">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading text-center">
                        <div class="section-icon gradient-icon mb-3 mx-auto">
                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                 viewBox="0 0 438.891 438.891" xml:space="preserve">
                            <defs>
                                <linearGradient id="svg-gradient">
                                    <stop offset="5%" stop-color="#ff6b6b"/>
                                    <stop offset="95%" stop-color="#ffbb3d"/>
                                </linearGradient>
                            </defs>
                                <g>
                                    <path d="M347.968,57.503h-39.706V39.74c0-5.747-6.269-8.359-12.016-8.359h-30.824c-7.314-20.898-25.6-31.347-46.498-31.347
                                                c-20.668-0.777-39.467,11.896-46.498,31.347h-30.302c-5.747,0-11.494,2.612-11.494,8.359v17.763H90.923
                                                c-23.53,0.251-42.78,18.813-43.886,42.318v299.363c0,22.988,20.898,39.706,43.886,39.706h257.045
                                                c22.988,0,43.886-16.718,43.886-39.706V99.822C390.748,76.316,371.498,57.754,347.968,57.503z M151.527,52.279h28.735
                                                c5.016-0.612,9.045-4.428,9.927-9.404c3.094-13.474,14.915-23.146,28.735-23.51c13.692,0.415,25.335,10.117,28.212,23.51
                                                c0.937,5.148,5.232,9.013,10.449,9.404h29.78v41.796H151.527V52.279z M370.956,399.185c0,11.494-11.494,18.808-22.988,18.808
                                                H90.923c-11.494,0-22.988-7.314-22.988-18.808V99.822c1.066-11.964,10.978-21.201,22.988-21.42h39.706v26.645
                                                c0.552,5.854,5.622,10.233,11.494,9.927h154.122c5.98,0.327,11.209-3.992,12.016-9.927V78.401h39.706
                                                c12.009,0.22,21.922,9.456,22.988,21.42V399.185z"/>
                                    <path d="M179.217,233.569c-3.919-4.131-10.425-4.364-14.629-0.522l-33.437,31.869l-14.106-14.629
                                                c-3.919-4.131-10.425-4.363-14.629-0.522c-4.047,4.24-4.047,10.911,0,15.151l21.42,21.943c1.854,2.076,4.532,3.224,7.314,3.135
                                                c2.756-0.039,5.385-1.166,7.314-3.135l40.751-38.661c4.04-3.706,4.31-9.986,0.603-14.025
                                                C179.628,233.962,179.427,233.761,179.217,233.569z"/>
                                    <path d="M329.16,256.034H208.997c-5.771,0-10.449,4.678-10.449,10.449s4.678,10.449,10.449,10.449H329.16
                                                c5.771,0,10.449-4.678,10.449-10.449S334.931,256.034,329.16,256.034z"/>
                                    <path d="M179.217,149.977c-3.919-4.131-10.425-4.364-14.629-0.522l-33.437,31.869l-14.106-14.629
                                                c-3.919-4.131-10.425-4.364-14.629-0.522c-4.047,4.24-4.047,10.911,0,15.151l21.42,21.943c1.854,2.076,4.532,3.224,7.314,3.135
                                                c2.756-0.039,5.385-1.166,7.314-3.135l40.751-38.661c4.04-3.706,4.31-9.986,0.603-14.025
                                                C179.628,150.37,179.427,150.169,179.217,149.977z"/>
                                    <path d="M329.16,172.442H208.997c-5.771,0-10.449,4.678-10.449,10.449s4.678,10.449,10.449,10.449H329.16
                                                c5.771,0,10.449-4.678,10.449-10.449S334.931,172.442,329.16,172.442z"/>
                                    <path d="M179.217,317.16c-3.919-4.131-10.425-4.363-14.629-0.522l-33.437,31.869l-14.106-14.629
                                                c-3.919-4.131-10.425-4.363-14.629-0.522c-4.047,4.24-4.047,10.911,0,15.151l21.42,21.943c1.854,2.076,4.532,3.224,7.314,3.135
                                                c2.756-0.039,5.385-1.166,7.314-3.135l40.751-38.661c4.04-3.706,4.31-9.986,0.603-14.025
                                                C179.628,317.554,179.427,317.353,179.217,317.16z"/>
                                    <path d="M329.16,339.626H208.997c-5.771,0-10.449,4.678-10.449,10.449s4.678,10.449,10.449,10.449H329.16
                                                c5.771,0,10.449-4.678,10.449-10.449S334.931,339.626,329.16,339.626z"/>
                                </g>
                        </svg>
                        </div>
                        <h2 class="sec__title">Most Popular Cities</h2>
                        <p class="sec__desc">Nebraska is a Midwestern state with many cities, including the largest
                            city, Omaha. Lincoln is the state capital. Each city offers unique attractions and
                            characteristics.
                        </p>
                    </div><!-- end section-heading -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
            <div class="row mt-5">
                @foreach($popular_cities as $popular_city)
                    <div class="col-lg-3 responsive-column">
                        <div class="category-item overflow-hidden">
                            <img src="{{asset('images/city/' . $popular_city->background_image)}}"
                                 data-src="{{asset('images/city/' . $popular_city->background_image)}}"
                                 alt="category-image" class="lazy cat-img">
                            <div class="category-content d-flex align-items-center justify-content-center">
                                <a href="{{ route('category.index', $popular_city->slug) }}"
                                   class="category-link d-flex flex-column justify-content-center w-100 h-100">
                                    <div class="cat-content">
                                        <h4 class="cat__title mb-3">{{ $popular_city->name }}</h4>
                                    </div>
                                </a>
                            </div>
                        </div><!-- end category-item -->
                    </div><!-- end col-lg-3 -->
                @endforeach
            </div><!-- end row -->
            <div class="more-btn-box pt-3 text-center">
                <a href="{{ route('city.index') }}" class="btn-gray hover-scale-2">Browse all cities <i
                        class="la la-arrow-right ml-2"></i></a>
            </div>
        </div><!-- end container -->
    </section><!-- end category-area -->
    <!-- =======END MOST POPULAR CITY AREA====== -->
    <div class="section-block"></div>
    <!-- ================================
        START HIW AREA
    ================================= -->
    <section class="hiw-area bg-dark pattern-bg padding-top-100px pb-0">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="hiw-content">
                        <div class="section-heading">
                            <div class="section-badge pb-3">
                                <span class="ribbon ribbon-lg">Working Process</span>
                            </div>
                            <h2 class="sec__title line-height-50 text-white">
                                Get Started With <span class="text-color-16">Nebraskalisting</span> It's Very Easy to
                                Start.
                            </h2>
                            <p class="sec__desc text-white-50">
                                Omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut
                                officiis debitis aut rerum necessitatibus saepe eveniet dolor sit amet.
                            </p>
                        </div><!-- end section-heading -->
                    </div>
                </div><!-- end col-lg-6 -->
                <div class="col-lg-6">
                    <div class="single-video-btn-box text-center">
                        <a class="icon-element icon-element-lg icon-element-white hover-scale mx-auto"
                           href="https://www.youtube.com/watch?v=GlrxcuEDyF8" data-fancybox="" title="Play Video">
                            <i class="la la-play"></i>
                        </a>
                        <p class="font-size-14 font-weight-medium pt-2">Video Tutorial</p>
                    </div>
                </div><!-- end col-lg-6 -->
            </div><!-- end row -->
            <div class="row hiw-info-box-wrap">
                <div class="col-lg-3 responsive-column">
                    <div class="info-box info--box">
                        <div class="info-icon gradient-icon">
                            <svg id="_x31_" viewBox="0 0 24 24" width="40" xmlns="http://www.w3.org/2000/svg">
                                <defs>
                                    <linearGradient id="svg-gradient">
                                        <stop offset="5%" stop-color="#ff6b6b"></stop>
                                        <stop offset="95%" stop-color="#ffbb3d"></stop>
                                    </linearGradient>
                                </defs>
                                <path
                                    d="m17 22c-2.757 0-5-2.243-5-5s2.243-5 5-5 5 2.243 5 5-2.243 5-5 5zm0-9c-2.206 0-4 1.794-4 4s1.794 4 4 4 4-1.794 4-4-1.794-4-4-4z"></path>
                                <path
                                    d="m23.5 24c-.128 0-.256-.049-.354-.146l-3.318-3.318c-.195-.195-.195-.512 0-.707s.512-.195.707 0l3.318 3.318c.195.195.195.512 0 .707-.097.097-.225.146-.353.146z"></path>
                                <path
                                    d="m10.5 21h-8c-1.378 0-2.5-1.121-2.5-2.5v-13c0-1.379 1.122-2.5 2.5-2.5h2c.276 0 .5.224.5.5s-.224.5-.5.5h-2c-.827 0-1.5.673-1.5 1.5v13c0 .827.673 1.5 1.5 1.5h8c.276 0 .5.224.5.5s-.224.5-.5.5z"></path>
                                <path
                                    d="m11.5 6h-6c-.827 0-1.5-.673-1.5-1.5v-2c0-.276.224-.5.5-.5h1.55c.233-1.14 1.242-2 2.45-2s2.217.86 2.45 2h1.55c.276 0 .5.224.5.5v2c0 .827-.673 1.5-1.5 1.5zm-6.5-3v1.5c0 .275.224.5.5.5h6c.276 0 .5-.225.5-.5v-1.5h-1.5c-.276 0-.5-.224-.5-.5 0-.827-.673-1.5-1.5-1.5s-1.5.673-1.5 1.5c0 .276-.224.5-.5.5z"></path>
                                <path
                                    d="m13.5 9h-10c-.276 0-.5-.224-.5-.5s.224-.5.5-.5h10c.276 0 .5.224.5.5s-.224.5-.5.5z"></path>
                                <path
                                    d="m12.5 12h-9c-.276 0-.5-.224-.5-.5s.224-.5.5-.5h9c.276 0 .5.224.5.5s-.224.5-.5.5z"></path>
                                <path
                                    d="m10 15h-6.5c-.276 0-.5-.224-.5-.5s.224-.5.5-.5h6.5c.276 0 .5.224.5.5s-.224.5-.5.5z"></path>
                                <path
                                    d="m16.5 10c-.276 0-.5-.224-.5-.5v-4c0-.827-.673-1.5-1.5-1.5h-2c-.276 0-.5-.224-.5-.5s.224-.5.5-.5h2c1.378 0 2.5 1.121 2.5 2.5v4c0 .276-.224.5-.5.5z"></path>
                            </svg>
                        </div><!-- end info-icon-->
                        <div class="info-content">
                            <h4 class="info__title">Pick a Keyword</h4>
                            <p class="info__desc">
                                Proin dapibus nisl ornare diam varius ecos tempus. Aenean a quam
                            </p>
                        </div><!-- end info-content -->
                    </div><!-- end info-box -->
                </div><!-- end col-lg-3 -->
                <div class="col-lg-3 responsive-column">
                    <div class="info-box info--box">
                        <div class="info-icon gradient-icon">
                            <svg width="40" version="1.1" id="Capa_221" xmlns="http://www.w3.org/2000/svg" x="0px"
                                 y="0px"
                                 viewBox="0 0 480 480" xml:space="preserve">
                            <defs>
                                <linearGradient id="svg-gradient2">
                                    <stop offset="5%" stop-color="#ff6b6b"></stop>
                                    <stop offset="95%" stop-color="#ffbb3d"></stop>
                                </linearGradient>
                            </defs>
                                <g>
                                    <path d="M240,0C156.053,0,88,68.053,88,152c0,40.448,26.16,102.096,77.744,183.2l67.504,106.184
                                        c2.37,3.729,7.314,4.831,11.043,2.461c0.991-0.63,1.831-1.47,2.461-2.461L314.256,335.2C365.84,254.096,392,192.448,392,152
                                        C392,68.053,323.947,0,240,0z M300.76,326.632L240,422.184l-60.76-95.552C129.312,248.112,104,189.36,104,152
                                        c0.084-75.076,60.924-135.916,136-136c75.076,0.084,135.916,60.924,136,136C376,189.36,350.688,248.112,300.76,326.632z"/>
                                </g>
                                <g>
                                    <path d="M240,80c-39.764,0-72,32.235-72,72c0,36.616,58.568,129.792,65.248,140.296c1.469,2.308,4.016,3.705,6.752,3.704
                                        c2.736,0.001,5.283-1.396,6.752-3.704C253.432,281.792,312,188.616,312,152C312,112.235,279.765,80,240,80z M240,272.848
                                        c-20.208-33.128-56-96.8-56-120.848c0.035-30.913,25.087-55.965,56-56c30.913,0.035,55.965,25.087,56,56
                                        C296,176.064,260.208,239.72,240,272.848z"/>
                                </g>
                                <g>
                                    <path d="M272.48,408.896l-0.912,16c59.112,3.328,84.656,14.16,88.224,19.136C354.776,451.448,312.104,464,240,464
                                        s-114.776-12.544-119.792-20c3.568-4.968,29.08-15.792,88.104-19.128l-0.904-16C176.312,410.664,104,417.6,104,444
                                        c0,28.416,85.488,36,136,36c50.512,0,136-7.584,136-36C376,417.6,303.6,410.648,272.48,408.896z"/>
                                </g>
                                <g>
                                    <path d="M240,112c-22.091,0-40,17.909-40,40s17.909,40,40,40c22.08-0.026,39.974-17.92,40-40C280,129.909,262.091,112,240,112z
                                         M240,176c-13.255,0-24-10.745-24-24s10.745-24,24-24s24,10.745,24,24S253.255,176,240,176z"/>
                                </g>
                        </svg>
                        </div><!-- end info-icon-->
                        <div class="info-content">
                            <h4 class="info__title">Select Location</h4>
                            <p class="info__desc">
                                Proin dapibus nisl ornare diam varius ecos tempus. Aenean a quam
                            </p>
                        </div><!-- end info-content -->
                    </div><!-- end info-box -->
                </div><!-- end col-lg-3 -->
                <div class="col-lg-3 responsive-column">
                    <div class="info-box info--box">
                        <div class="info-icon gradient-icon">
                            <svg width="40" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                 viewBox="0 0 512 512" xml:space="preserve">
                           <defs>
                               <linearGradient id="svg-gradient3">
                                   <stop offset="5%" stop-color="#ff6b6b"></stop>
                                   <stop offset="95%" stop-color="#ffbb3d"></stop>
                               </linearGradient>
                           </defs>
                                <g>
                                    <path d="M502,289.984h-8V50c0-27.57-22.43-50-50-50H68.002c-27.57,0-50,22.43-50,50v239.985h-8c-5.523,0-10,4.477-10,10v17
                                        c0,27.019,21.981,49,49,49h11.56c-7.945,16.915-8.736,36.501-1.844,54.216l33.231,85.424c1.539,3.956,5.318,6.377,9.322,6.377
                                        c1.206,0,2.432-0.22,3.623-0.683c5.147-2.002,7.696-7.798,5.694-12.945l-33.231-85.424c-5.842-15.017-3.909-31.929,5.172-45.24
                                        l16.481-24.16v19.385c0,5.523,4.477,10,10,10s10-4.477,10-10v-164.89c0-7.745,6.301-14.045,14.045-14.045
                                        s14.045,6.3,14.045,14.045v131.709c0,5.523,4.477,10,10,10s10-4.477,10-10v-47.067c0-7.745,6.3-14.045,14.045-14.045
                                        s14.045,6.3,14.045,14.045v47.067c0,5.523,4.477,10,10,10s10-4.477,10-10v-47.067c0-7.745,6.301-14.045,14.045-14.045
                                        s14.045,6.3,14.045,14.045v47.067c0,5.523,4.477,10,10,10s10-4.477,10-10v-47.067v-0.143c0-7.745,6.3-14.045,14.045-14.045
                                        s14.045,6.3,14.045,14.045v89.299c0,29.935-5.95,59.076-17.686,86.614l-16.884,39.62c-2.165,5.081,0.199,10.955,5.279,13.12
                                        c1.279,0.545,2.608,0.803,3.916,0.803c3.887,0,7.584-2.281,9.204-6.082l16.884-39.62c12.797-30.032,19.287-61.811,19.287-94.454
                                        v-5.859h151.629c27.019,0,49-21.981,49-49v-17C511.999,294.461,507.522,289.984,502,289.984z M73.14,345.984H49.002
                                        c-15.99,0-29-13.009-29-29v-7h77.696L73.14,345.984z M99.012,198.044v21.955h-7.013c-9.925,0-18-8.075-18-18
                                        c0-9.925,8.075-18,18-18h10.058C100.107,188.284,99.012,193.037,99.012,198.044z M164.057,183.999h35.588c9.925,0,18,8.075,18,18
                                        c0,9.925-8.075,18-18,18h-32.543v-21.955C167.102,193.037,166.006,188.284,164.057,183.999z M277.326,248.499
                                        c-9.415,0-17.948,3.843-24.117,10.04c-6.158-6.114-14.631-9.898-23.973-9.898c-9.378,0-17.882,3.812-24.045,9.966
                                        c-6.163-6.155-14.667-9.966-24.045-9.966c-5.007,0-9.76,1.095-14.045,3.044v-11.686h32.543c20.953,0,38-17.047,38-38
                                        s-17.047-38-38-38H91.999c-20.953,0-38,17.047-38,38s17.047,38,38,38h7.013v49.986h-61.01V50c0-16.542,13.458-30,30-30H444
                                        c16.542,0,30,13.458,30,30v196.013h-86.011c-5.523,0-10,4.477-10,10s4.477,10,10,10H474v23.972H311.371v-7.441
                                        C311.372,263.77,296.099,248.499,277.326,248.499z M492,316.984c0,15.991-13.009,29-29,29H311.371v-36H492V316.984z"></path>
                                </g>
                                <g>
                                    <path d="M355.22,248.939c-1.869-1.86-4.44-2.93-7.07-2.93c-2.64,0-5.21,1.07-7.07,2.93c-1.87,1.86-2.93,4.44-2.93,7.07
                                        c0,2.64,1.06,5.21,2.93,7.07c1.86,1.87,4.43,2.93,7.07,2.93c2.63,0,5.21-1.06,7.07-2.93c1.86-1.86,2.93-4.43,2.93-7.07
                                        C358.15,253.378,357.08,250.799,355.22,248.939z"></path>
                                </g>
                                <g>
                                    <path d="M179.231,112.929c-1.86-1.86-4.439-2.93-7.07-2.93c-2.64,0-5.21,1.07-7.07,2.93c-1.87,1.86-2.93,4.44-2.93,7.07
                                        c0,2.63,1.06,5.21,2.93,7.07c1.86,1.86,4.44,2.93,7.07,2.93c2.63,0,5.2-1.07,7.07-2.93c1.86-1.86,2.93-4.44,2.93-7.07
                                        C182.161,117.369,181.091,114.789,179.231,112.929z"></path>
                                </g>
                                <g>
                                    <path d="M135.958,109.999H63.999c-5.523,0-10,4.477-10,10c0,5.523,4.477,10,10,10h71.959c5.523,0,10-4.477,10-10
                                        C145.958,114.476,141.481,109.999,135.958,109.999z"></path>
                                </g>
                                <g>
                                    <path
                                        d="M227.644,54H64.052c-5.523,0-10,4.477-10,10s4.477,10,10,10h163.592c5.523,0,10-4.477,10-10S233.167,54,227.644,54z"></path>
                                </g>
                                <g>
                                    <path d="M428,125.571v-15.072c0-11.028-8.972-20-20-20h-35.167c-3.645,0-7.054,0.996-10,2.706c-2.946-1.71-6.355-2.706-10-2.706
                                        h-35.167c-11.028,0-20,8.972-20,20v14.694c-18.012,4.423-31.417,20.7-31.417,40.056v32.75c0,5.523,4.477,10,10,10h171.749
                                        c5.524,0,10.001-4.477,10.001-10v-32.75C458,146.404,445.292,130.482,428,125.571z M372.833,110.499H408v13.5h-35.167V110.499z
                                         M317.668,110.499h35.167v13.5h-35.167V110.499z M438.001,187.999L438.001,187.999h-151.75v-22.75
                                        c0-11.717,9.533-21.25,21.25-21.25h0.167h55.167h53.917c11.717,0,21.25,9.533,21.25,21.25V187.999z"></path>
                                </g>
                        </svg>
                        </div><!-- end info-icon-->
                        <div class="info-content">
                            <h4 class="info__title">Select Category</h4>
                            <p class="info__desc">
                                Proin dapibus nisl ornare diam varius ecos tempus. Aenean a quam
                            </p>
                        </div><!-- end info-content -->
                    </div><!-- end info-box -->
                </div><!-- end col-lg-3 -->
                <div class="col-lg-3 responsive-column">
                    <div class="info-box info--box">
                        <div class="info-icon gradient-icon">
                            <svg width="40" version="1.1" id="Capa_1211" xmlns="http://www.w3.org/2000/svg" x="0px"
                                 y="0px"
                                 viewBox="0 0 512 512" xml:space="preserve">
                               <defs>
                                   <linearGradient id="svg-gradient4">
                                       <stop offset="5%" stop-color="#ff6b6b"></stop>
                                       <stop offset="95%" stop-color="#ffbb3d"></stop>
                                   </linearGradient>
                               </defs>
                                <g>
                                    <path d="M251.328,196.704c-6.24-6.24-16.384-6.272-22.656-0.032L176,249.376l-20.672-20.704c-6.24-6.24-16.384-6.24-22.624,0
                                            s-6.24,16.384,0,22.624l32,32c3.104,3.136,7.2,4.704,11.296,4.704s8.192-1.568,11.328-4.672l64-64
                                            C257.568,213.088,257.568,202.944,251.328,196.704z"/>
                                </g>
                                <g>
                                    <path d="M251.328,324.704c-6.24-6.24-16.384-6.272-22.656-0.032L176,377.376l-20.672-20.672c-6.24-6.24-16.384-6.24-22.624,0
                                            s-6.24,16.384,0,22.624l32,32c3.104,3.104,7.2,4.672,11.296,4.672s8.192-1.568,11.328-4.672l64-64
                                            C257.568,341.088,257.568,330.944,251.328,324.704z"/>
                                </g>
                                <g>
                                    <path d="M368,224h-64c-8.832,0-16,7.168-16,16c0,8.832,7.168,16,16,16h64c8.832,0,16-7.168,16-16C384,231.168,376.832,224,368,224
                                            z"/>
                                </g>
                                <g>
                                    <path d="M368,352h-64c-8.832,0-16,7.168-16,16c0,8.832,7.168,16,16,16h64c8.832,0,16-7.168,16-16C384,359.168,376.832,352,368,352
                                            z"/>
                                </g>
                                <g>
                                    <path d="M416,64h-64V48c0-8.832-7.168-16-16-16h-34.72C294.656,13.376,276.864,0,256,0s-38.656,13.376-45.28,32H176
                                            c-8.832,0-16,7.168-16,16v16H96c-17.632,0-32,14.368-32,32v384c0,17.632,14.368,32,32,32h320c17.632,0,32-14.368,32-32V96
                                            C448,78.368,433.632,64,416,64z M192,64h32c8.832,0,16-7.168,16-16c0-8.832,7.168-16,16-16c8.832,0,16,7.168,16,16
                                            c0,8.832,7.168,16,16,16h32v32H192V64z M416,480H96V96h64v16c0,8.832,7.168,16,16,16h160c8.832,0,16-7.168,16-16V96h64V480z"/>
                                </g>
                        </svg>
                        </div><!-- end info-icon-->
                        <div class="info-content">
                            <h4 class="info__title">View Results</h4>
                            <p class="info__desc">
                                Proin dapibus nisl ornare diam varius ecos tempus. Aenean a quam
                            </p>
                        </div><!-- end info-content -->
                    </div><!-- end info-box -->
                </div><!-- end col-lg-3 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end hiw-area -->
    <!-- ================================
        END HIW AREA
    ================================= -->

    <!-- ================================
        START FUN-FACT AREA
    ================================= -->
    <section class="funfact-area bg-gradient-gray padding-top-150px padding-bottom-70px hiw-bottom-right-round">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 responsive-column">
                    <div class="counter-item d-flex align-items-center">
                        <div class="counter-icon section-icon flex-shrink-0 bg-opacity-1">
                            <svg class="svg-icon-color" version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                 viewBox="0 0 438.891 438.891" xml:space="preserve">
                            <g>
                                <path d="M347.968,57.503h-39.706V39.74c0-5.747-6.269-8.359-12.016-8.359h-30.824c-7.314-20.898-25.6-31.347-46.498-31.347
                                                c-20.668-0.777-39.467,11.896-46.498,31.347h-30.302c-5.747,0-11.494,2.612-11.494,8.359v17.763H90.923
                                                c-23.53,0.251-42.78,18.813-43.886,42.318v299.363c0,22.988,20.898,39.706,43.886,39.706h257.045
                                                c22.988,0,43.886-16.718,43.886-39.706V99.822C390.748,76.316,371.498,57.754,347.968,57.503z M151.527,52.279h28.735
                                                c5.016-0.612,9.045-4.428,9.927-9.404c3.094-13.474,14.915-23.146,28.735-23.51c13.692,0.415,25.335,10.117,28.212,23.51
                                                c0.937,5.148,5.232,9.013,10.449,9.404h29.78v41.796H151.527V52.279z M370.956,399.185c0,11.494-11.494,18.808-22.988,18.808
                                                H90.923c-11.494,0-22.988-7.314-22.988-18.808V99.822c1.066-11.964,10.978-21.201,22.988-21.42h39.706v26.645
                                                c0.552,5.854,5.622,10.233,11.494,9.927h154.122c5.98,0.327,11.209-3.992,12.016-9.927V78.401h39.706
                                                c12.009,0.22,21.922,9.456,22.988,21.42V399.185z"></path>
                                <path d="M179.217,233.569c-3.919-4.131-10.425-4.364-14.629-0.522l-33.437,31.869l-14.106-14.629
                                                c-3.919-4.131-10.425-4.363-14.629-0.522c-4.047,4.24-4.047,10.911,0,15.151l21.42,21.943c1.854,2.076,4.532,3.224,7.314,3.135
                                                c2.756-0.039,5.385-1.166,7.314-3.135l40.751-38.661c4.04-3.706,4.31-9.986,0.603-14.025
                                                C179.628,233.962,179.427,233.761,179.217,233.569z"></path>
                                <path d="M329.16,256.034H208.997c-5.771,0-10.449,4.678-10.449,10.449s4.678,10.449,10.449,10.449H329.16
                                                c5.771,0,10.449-4.678,10.449-10.449S334.931,256.034,329.16,256.034z"></path>
                                <path d="M179.217,149.977c-3.919-4.131-10.425-4.364-14.629-0.522l-33.437,31.869l-14.106-14.629
                                                c-3.919-4.131-10.425-4.364-14.629-0.522c-4.047,4.24-4.047,10.911,0,15.151l21.42,21.943c1.854,2.076,4.532,3.224,7.314,3.135
                                                c2.756-0.039,5.385-1.166,7.314-3.135l40.751-38.661c4.04-3.706,4.31-9.986,0.603-14.025
                                                C179.628,150.37,179.427,150.169,179.217,149.977z"></path>
                                <path d="M329.16,172.442H208.997c-5.771,0-10.449,4.678-10.449,10.449s4.678,10.449,10.449,10.449H329.16
                                                c5.771,0,10.449-4.678,10.449-10.449S334.931,172.442,329.16,172.442z"></path>
                                <path d="M179.217,317.16c-3.919-4.131-10.425-4.363-14.629-0.522l-33.437,31.869l-14.106-14.629
                                                c-3.919-4.131-10.425-4.363-14.629-0.522c-4.047,4.24-4.047,10.911,0,15.151l21.42,21.943c1.854,2.076,4.532,3.224,7.314,3.135
                                                c2.756-0.039,5.385-1.166,7.314-3.135l40.751-38.661c4.04-3.706,4.31-9.986,0.603-14.025
                                                C179.628,317.554,179.427,317.353,179.217,317.16z"></path>
                                <path d="M329.16,339.626H208.997c-5.771,0-10.449,4.678-10.449,10.449s4.678,10.449,10.449,10.449H329.16
                                                c5.771,0,10.449-4.678,10.449-10.449S334.931,339.626,329.16,339.626z"></path>
                            </g>
                        </svg>
                        </div>
                        <div class="counter-content pl-3">
                            <h3 class="counter__number text-color-3 mb-2">
                                <span class="counter">40,000</span>
                                <span class="count-symbol">+</span>
                            </h3>
                            <p class="counter__title">Nebraskalisting Pages</p>
                        </div><!-- end counter-content -->
                    </div><!-- end counter-item -->
                </div><!-- end col-lg-3 -->
                <div class="col-lg-3 responsive-column">
                    <div class="counter-item d-flex align-items-center">
                        <div class="counter-icon section-icon flex-shrink-0 bg-opacity-2">
                            <svg class="svg-icon-color-2" version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px"
                                 y="0px"
                                 viewBox="0 0 490.667 490.667" xml:space="preserve">
                            <g>
                                <path d="M245.333,85.333c-41.173,0-74.667,33.493-74.667,74.667s33.493,74.667,74.667,74.667S320,201.173,320,160
                                            C320,118.827,286.507,85.333,245.333,85.333z M245.333,213.333C215.936,213.333,192,189.397,192,160
                                            c0-29.397,23.936-53.333,53.333-53.333s53.333,23.936,53.333,53.333S274.731,213.333,245.333,213.333z"></path>
                            </g>
                                <g>
                                    <path d="M394.667,170.667c-29.397,0-53.333,23.936-53.333,53.333s23.936,53.333,53.333,53.333S448,253.397,448,224
                                            S424.064,170.667,394.667,170.667z M394.667,256c-17.643,0-32-14.357-32-32c0-17.643,14.357-32,32-32s32,14.357,32,32
                                            C426.667,241.643,412.309,256,394.667,256z"></path>
                                </g>
                                <g>
                                    <path d="M97.515,170.667c-29.419,0-53.333,23.936-53.333,53.333s23.936,53.333,53.333,53.333s53.333-23.936,53.333-53.333
                                            S126.933,170.667,97.515,170.667z M97.515,256c-17.643,0-32-14.357-32-32c0-17.643,14.357-32,32-32c17.643,0,32,14.357,32,32
                                            C129.515,241.643,115.157,256,97.515,256z"></path>
                                </g>
                                <g>
                                    <path d="M245.333,256c-76.459,0-138.667,62.208-138.667,138.667c0,5.888,4.779,10.667,10.667,10.667S128,400.555,128,394.667
                                            c0-64.704,52.629-117.333,117.333-117.333s117.333,52.629,117.333,117.333c0,5.888,4.779,10.667,10.667,10.667
                                            c5.888,0,10.667-4.779,10.667-10.667C384,318.208,321.792,256,245.333,256z"></path>
                                </g>
                                <g>
                                    <path d="M394.667,298.667c-17.557,0-34.752,4.8-49.728,13.867c-5.013,3.072-6.635,9.621-3.584,14.656
                                            c3.093,5.035,9.621,6.635,14.656,3.584C367.637,323.712,380.992,320,394.667,320c41.173,0,74.667,33.493,74.667,74.667
                                            c0,5.888,4.779,10.667,10.667,10.667c5.888,0,10.667-4.779,10.667-10.667C490.667,341.739,447.595,298.667,394.667,298.667z"></path>
                                </g>
                                <g>
                                    <path d="M145.707,312.512c-14.955-9.045-32.149-13.845-49.707-13.845c-52.928,0-96,43.072-96,96
                                            c0,5.888,4.779,10.667,10.667,10.667s10.667-4.779,10.667-10.667C21.333,353.493,54.827,320,96,320
                                            c13.675,0,27.029,3.712,38.635,10.752c5.013,3.051,11.584,1.451,14.656-3.584C152.363,322.133,150.741,315.584,145.707,312.512z"></path>
                                </g>
                        </svg>
                        </div>
                        <div class="counter-content pl-3">
                            <h3 class="counter__number text-color-4 mb-2">
                                <span class="counter">25,100</span>
                                <span class="count-symbol">+</span>
                            </h3>
                            <p class="counter__title">Happy Clients</p>
                        </div><!-- end counter-content -->
                    </div><!-- end counter-item -->
                </div><!-- end col-lg-3 -->
                <div class="col-lg-3 responsive-column">
                    <div class="counter-item d-flex align-items-center">
                        <div class="counter-icon section-icon flex-shrink-0 bg-opacity-3">
                            <svg class="svg-icon-color-3" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                                <g>
                                    <g>
                                        <path
                                            d="m475.571 189.773c-.912-.912-1.839-1.802-2.774-2.682v-28.821c0-28.659-23.316-51.975-51.975-51.975h-91.169v-26.12c0-27.886-22.687-50.572-50.572-50.572h-85.363c-27.886 0-50.572 22.686-50.572 50.572v26.12h-91.171c-28.659 0-51.975 23.316-51.975 51.975v231.351c0 28.659 23.316 51.975 51.975 51.975h108.516c4.142 0 7.5-3.358 7.5-7.5s-3.358-7.5-7.5-7.5h-108.516c-20.389 0-36.976-16.587-36.976-36.976v-151.3c14.686 21.784 38.844 36.677 66.519 38.728v27.306c0 15.595 12.688 28.283 28.283 28.283 15.596 0 28.284-12.688 28.284-28.283v-27.061h125.329c0 .12-.004.239-.004.359 0 25.539 7.659 49.898 21.877 70.467l-15.922 15.922c-5.56-1.573-11.79-.184-16.157 4.185l-61.159 61.159c-12.106 12.106-12.106 31.804 0 43.91 12.134 12.134 31.775 12.136 43.91 0l61.159-61.159c4.368-4.368 5.758-10.597 4.185-16.157l15.936-15.936c42.143 29.025 98.319 29.117 140.56.235v9.343c0 20.389-16.587 36.976-36.976 36.976h-118.464c-4.142 0-7.5 3.358-7.5 7.5s3.358 7.5 7.5 7.5h118.463c28.659 0 51.975-23.316 51.975-51.975v-21.407c.934-.878 1.861-1.768 2.774-2.681 48.569-48.569 48.575-127.186 0-175.761zm-317.427-109.598c0-19.615 15.958-35.573 35.573-35.573h85.363c19.615 0 35.573 15.958 35.573 35.573v26.12h-15.999v-26.12c0-10.793-8.781-19.574-19.574-19.574h-85.363c-10.793 0-19.574 8.781-19.574 19.574v26.12h-15.999zm30.998 26.12v-26.12c0-2.522 2.052-4.574 4.575-4.574h85.363c2.523 0 4.575 2.052 4.575 4.574v26.12zm-66.056 175.007h-26.568v-25.248c0-7.325 5.959-13.284 13.284-13.284s13.284 5.959 13.284 13.284zm-13.284 36.337c-7.325 0-13.284-5.959-13.284-13.284v-8.054h26.568v8.054c0 7.325-5.959 13.284-13.284 13.284zm28.283-55.344v-6.241c0-15.595-12.688-28.283-28.284-28.283-15.595 0-28.283 12.688-28.283 28.283v5.931c-37.233-3.336-66.519-34.696-66.519-72.782v-30.933c0-20.389 16.587-36.976 36.976-36.976h368.847c20.389 0 36.976 16.587 36.976 36.976v16.731c-47.425-32.537-114.229-28.988-157.987 14.771-19.815 19.814-32.114 45.141-35.467 72.522h-126.259zm87.267 200.395c-6.272 6.272-16.425 6.273-22.698 0-3.032-3.032-4.701-7.062-4.701-11.349s1.669-8.318 4.701-11.349l42.369-42.369 22.698 22.698zm61.159-61.159-8.184 8.184-22.698-22.698 8.184-8.184c.288-.287.665-.431 1.042-.431s.754.144 1.041.43c.002.001.003.003.005.004l20.61 20.61c.574.575.574 1.51 0 2.085zm5.662-17.635-10.726-10.726 13.167-13.167c1.672 1.885 3.4 3.733 5.197 5.529 1.801 1.801 3.649 3.527 5.531 5.194zm18.244-28.969c-20.641-20.64-32.008-48.084-32.008-77.274s11.367-56.634 32.008-77.274c42.706-42.707 111.836-42.713 154.548 0 42.707 42.706 42.713 111.836 0 154.548-42.708 42.708-111.836 42.713-154.548 0z"></path>
                                        <path
                                            d="m469.969 287.951c-4.047-.88-8.043 1.686-8.922 5.735-3.052 14.034-10.06 26.848-20.268 37.055-29.341 29.34-76.832 29.343-106.176 0-29.273-29.273-29.273-76.903 0-106.176 29.341-29.341 76.832-29.344 106.176 0 10.197 10.197 17.203 22.997 20.26 37.016.882 4.047 4.879 6.616 8.925 5.73 4.047-.882 6.612-4.878 5.73-8.925-3.67-16.832-12.076-32.194-24.308-44.427-35.203-35.203-92.181-35.207-127.388 0-35.121 35.121-35.121 92.267 0 127.388 35.12 35.12 92.265 35.122 127.388 0 12.245-12.245 20.654-27.624 24.318-44.474.879-4.047-1.688-8.041-5.735-8.922z"></path>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <div class="counter-content pl-3">
                            <h3 class="counter__number text-color-5 mb-2">
                                <span class="counter">12,100</span>
                                <span class="count-symbol">+</span>
                            </h3>
                            <p class="counter__title">Company Joined</p>
                        </div><!-- end counter-content -->
                    </div><!-- end counter-item -->
                </div><!-- end col-lg-3 -->
                <div class="col-lg-3 responsive-column">
                    <div class="counter-item d-flex align-items-center">
                        <div class="counter-icon section-icon flex-shrink-0 bg-opacity-4">
                            <svg class="svg-icon-color-4" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                                <g id="outline12">
                                    <path
                                        d="M344,273.992H320a23.865,23.865,0,0,0-5.14.585A7.919,7.919,0,0,0,312,274H280V222.641A36.684,36.684,0,0,0,243.359,186H232a8,8,0,0,0-8,8v28.562a62.323,62.323,0,0,1-8.859,32.032l-12.616,20.979-36.048,14.419H120a8,8,0,0,0-8,8v104a8,8,0,0,0,8,8h47.961c.014,0,.025.008.039.008h31.016l31.046,7.758A7.71,7.71,0,0,0,232,418h72a7.924,7.924,0,0,0,2.89-.583,23.916,23.916,0,0,0,5.11.575h24a24.026,24.026,0,0,0,24-24,23.708,23.708,0,0,0-3.211-11.766,23.767,23.767,0,0,0,4.969-36.234,23.627,23.627,0,0,0,0-32,23.9,23.9,0,0,0-17.758-40Zm-184,120H128v-88h32Zm142.242-48a23.438,23.438,0,0,0-3.031,27.767A23.948,23.948,0,0,0,288,393.992,23.7,23.7,0,0,0,289.477,402H232.984l-31.046-7.758A7.71,7.71,0,0,0,200,394H176V303.414l34.969-13.984c.105-.042.17-.133.273-.179a7.9,7.9,0,0,0,2.342-1.534c.061-.06.1-.134.158-.2a7.967,7.967,0,0,0,1.117-1.4l14.008-23.3A78.464,78.464,0,0,0,240,222.562V202h3.359A20.662,20.662,0,0,1,264,222.641v64.273a55.368,55.368,0,0,1-34.969,51.648,8,8,0,0,0,5.938,14.86A71.156,71.156,0,0,0,279.769,290h17.7a23.244,23.244,0,0,0,4.77,23.992,23.627,23.627,0,0,0,0,32Zm33.758,56H312a8,8,0,0,1,0-16h24a8,8,0,0,1,0,16Zm8-32H320a8,8,0,0,1,0-16h24a8,8,0,0,1,0,16Zm0-32H320a8,8,0,0,1,0-16h24a8,8,0,0,1,0,16Zm0-32H320a8,8,0,0,1,0-16h24a8,8,0,0,1,0,16Z"></path>
                                    <path
                                        d="M206.609,113.969l15.282,11.093-5.836,17.954a16,16,0,0,0,24.625,17.89l15.273-11.1,15.281,11.1a15.756,15.756,0,0,0,18.805.008,15.767,15.767,0,0,0,5.813-17.891l-5.836-17.961L305.3,113.969a16.006,16.006,0,0,0-9.406-28.953l-18.883.007-5.836-17.961v-.007a16,16,0,0,0-30.438.007L234.9,85.016H216.016a16.008,16.008,0,0,0-9.407,28.953ZM234.9,101.016a15.965,15.965,0,0,0,15.219-11.055l5.8-18.055a.843.843,0,0,1,.039.1l5.836,17.953a15.967,15.967,0,0,0,15.219,11.055h18.883L280.6,112.125A15.964,15.964,0,0,0,274.8,130l5.844,17.969-15.289-11.11a15.984,15.984,0,0,0-18.8.008l-15.274,11.094L237.109,130a15.968,15.968,0,0,0-5.812-17.891l-15.281-11.093Z"></path>
                                    <path
                                        d="M136.047,205.805l15.273,11.109a16,16,0,0,0,24.625-17.891l-5.836-17.961,15.282-11.1a16,16,0,0,0-9.407-28.945l-18.882.007-5.836-17.961v-.007a16,16,0,0,0-30.438.007l-5.836,17.954H96.109A16.006,16.006,0,0,0,86.7,169.969l15.281,11.093-5.836,17.954a15.774,15.774,0,0,0,5.813,17.9,15.756,15.756,0,0,0,18.805-.008Zm-24.656-37.7L96.109,157.016h18.883a15.967,15.967,0,0,0,15.219-11.055l5.8-18.055s.015.032.039.1l5.836,17.953A15.965,15.965,0,0,0,157.1,157.016h18.882l-15.281,11.1A15.953,15.953,0,0,0,154.891,186l5.836,17.969-15.282-11.11a15.983,15.983,0,0,0-18.8.008l-15.274,11.094L117.2,186A15.988,15.988,0,0,0,111.391,168.109Z"></path>
                                    <path
                                        d="M391.266,123.062v-.007a16,16,0,0,0-30.438.007l-5.836,17.954H336.109a16.006,16.006,0,0,0-9.406,28.953l15.281,11.093-5.836,17.954a15.774,15.774,0,0,0,5.813,17.9,15.756,15.756,0,0,0,18.805-.008l15.281-11.1,15.273,11.109a16,16,0,0,0,24.625-17.891l-5.836-17.961,15.282-11.1a16,16,0,0,0-9.407-28.945l-18.882.007Zm9.437,45.055A15.953,15.953,0,0,0,394.891,186l5.836,17.969-15.282-11.11a15.983,15.983,0,0,0-18.8.008l-15.274,11.094L357.2,186a15.988,15.988,0,0,0-5.812-17.891l-15.282-11.093h18.883a15.967,15.967,0,0,0,15.219-11.055l5.8-18.055s.015.032.039.1l5.836,17.953A15.965,15.965,0,0,0,397.1,157.016h18.882Z"></path>
                                    <path
                                        d="M256,16C123.664,16,16,123.664,16,256S123.664,496,256,496,496,388.336,496,256,388.336,16,256,16Zm0,464C132.484,480,32,379.516,32,256S132.484,32,256,32,480,132.484,480,256,379.516,480,256,480Z"></path>
                                    <path
                                        d="M432,256a175.64,175.64,0,0,1-25.82,91.82,8,8,0,1,0,13.64,8.36A191.6,191.6,0,0,0,448,256a193.977,193.977,0,0,0-1.625-25.031,8,8,0,1,0-15.859,2.062A179.013,179.013,0,0,1,432,256Z"></path>
                                    <path
                                        d="M80,256a179.013,179.013,0,0,1,1.484-22.969,8,8,0,1,0-15.859-2.062A193.977,193.977,0,0,0,64,256a190.874,190.874,0,0,0,15.258,75.133,8,8,0,0,0,14.719-6.266A175,175,0,0,1,80,256Z"></path>
                                </g>
                            </svg>
                        </div>
                        <div class="counter-content pl-3">
                            <h3 class="counter__number text-color-6 mb-2">
                                <span class="counter">18,200</span>
                                <span class="count-symbol">+</span>
                            </h3>
                            <p class="counter__title">Five Star Ratings</p>
                        </div><!-- end counter-content -->
                    </div><!-- end counter-item -->
                </div><!-- end col-lg-3 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end funfact-area -->
    <!-- ================================
        END FUN-FACT AREA
    ================================= -->

    <!-- ================================
           START BLOG AREA
    ================================= -->
    <section class="blog-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading text-center">
                        <div class="section-badge pb-3">
                            <span class="ribbon ribbon-lg">From Our Blog</span>
                        </div>
                        <h2 class="sec__title">Articles You Might <span class="text-color-16">Like.</span></h2>
                        <p class="sec__desc">
                            Morbi convallis bibendum urna ut viverra. Maecenas quis consequat libero, <br>
                            a feugiat eros. Nunc ut lacinia tortors.
                        </p>
                    </div><!-- end section-heading -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
            <div class="row padding-top-60px">
                <div class="col-lg-8">
                    <div class="card-item card-item-layout-5 js-tilt">
                        <div class="card-image">
                            <img src="{{asset('/images/img4.jpg')}}" data-src="{{asset('/images/img4.jpg')}}"
                                 class="card__img lazy"
                                 alt="blog image">
                            <span class="badge">July 3, 2020</span>
                        </div><!-- end card-image -->
                        <div class="card-content">
                            <ul class="listing-meta d-flex align-items-center pt-0">
                                <li>
                                    <a href="#" class="listing-cat-link">Health</a>,
                                    <a href="#" class="listing-cat-link">Salon</a>
                                </li>
                            </ul>
                            <h4 class="card-title pt-2">
                                <a href="#">The Best SPA Salons For Your Relaxation</a>
                            </h4>
                            <div class="avatar-photos pt-4">
                                <a href="#" class="user-thumb" data-toggle="tooltip" data-placement="top"
                                   title="Alex Smith">
                                    <img src="{{asset('/images/img4.jpg')}}" alt="Avatar image">
                                </a>
                                <a href="#" class="user-thumb" data-toggle="tooltip" data-placement="top"
                                   title="John Doe">
                                    <img src="{{asset('/images/img4.jpg')}}" alt="Avatar image">
                                </a>
                                <a href="#" class="user-thumb" data-toggle="tooltip" data-placement="top"
                                   title="Aron Finch">
                                    <img src="{{asset('/images/img4.jpg')}}" alt="Avatar image">
                                </a>
                            </div>
                        </div><!-- end card-content -->
                    </div><!-- end card-item -->
                </div><!-- end col-lg-8 -->
                <div class="col-lg-4 responsive-column">
                    <div class="card-item card-item-layout-5 js-tilt">
                        <div class="card-image">
                            <img src="{{asset('/images/img4.jpg')}}" data-src="{{asset('/images/img4.jpg')}}"
                                 class="card__img lazy"
                                 alt="blog image">
                            <span class="badge">June 25, 2020</span>
                        </div><!-- end card-image -->
                        <div class="card-content">
                            <ul class="listing-meta d-flex align-items-center pt-0">
                                <li>
                                    <a href="#" class="listing-cat-link">Music</a>,
                                    <a href="#" class="listing-cat-link">Club</a>
                                </li>
                            </ul>
                            <h4 class="card-title pt-2">
                                <a href="#">Rocko Band in Marquee Club</a>
                            </h4>
                            <div class="avatar-photos pt-4">
                                <a href="#" class="user-thumb" data-toggle="tooltip" data-placement="top"
                                   title="Kamran Adi">
                                    <img src="{{asset('/images/img4.jpg')}}" alt="Avatar image">
                                </a>
                                <a href="#" class="user-thumb" data-toggle="tooltip" data-placement="top"
                                   title="Wes Boss">
                                    <img src="{{asset('/images/img4.jpg')}}" alt="Avatar image">
                                </a>
                            </div>
                        </div><!-- end card-content -->
                    </div><!-- end card-item -->
                </div><!-- end col-lg-4 -->
                <div class="col-lg-4 responsive-column">
                    <div class="card-item card-item-layout-5 js-tilt">
                        <div class="card-image">
                            <img src="{{asset('/images/img4.jpg')}}" data-src="{{asset('/images/img4.jpg')}}"
                                 class="card__img lazy"
                                 alt="blog image">
                            <span class="badge">May 12, 2020</span>
                        </div><!-- end card-image -->
                        <div class="card-content">
                            <ul class="listing-meta d-flex align-items-center pt-0">
                                <li>
                                    <a href="#" class="listing-cat-link">Business</a>,
                                    <a href="#" class="listing-cat-link">Tips</a>
                                </li>
                            </ul>
                            <h4 class="card-title pt-2">
                                <a href="#">5 things to know about advertising on Dirto</a>
                            </h4>
                            <div class="avatar-photos pt-4">
                                <a href="#" class="user-thumb" data-toggle="tooltip" data-placement="top"
                                   title="Alex Smith">
                                    <img src="{{asset('/images/img4.jpg')}}" alt="Avatar image">
                                </a>
                                <a href="#" class="user-thumb" data-toggle="tooltip" data-placement="top"
                                   title="John Doe">
                                    <img src="{{asset('/images/img4.jpg')}}" alt="Avatar image">
                                </a>
                                <a href="#" class="user-thumb" data-toggle="tooltip" data-placement="top"
                                   title="Aron Finch">
                                    <img src="{{asset('/images/img4.jpg')}}" alt="Avatar image">
                                </a>
                            </div>
                        </div><!-- end card-content -->
                    </div><!-- end card-item -->
                </div><!-- end col-lg-4 -->
                <div class="col-lg-4 responsive-column">
                    <div class="card-item card-item-layout-5 js-tilt">
                        <div class="card-image">
                            <img src="{{asset('/images/img4.jpg')}}" data-src="{{asset('/images/img4.jpg')}}"
                                 class="card__img lazy"
                                 alt="blog image">
                            <span class="badge">April 22, 2020</span>
                        </div><!-- end card-image -->
                        <div class="card-content">
                            <ul class="listing-meta d-flex align-items-center pt-0">
                                <li>
                                    <a href="#" class="listing-cat-link">Yoga</a>,
                                    <a href="#" class="listing-cat-link">Tips</a>
                                </li>
                            </ul>
                            <h4 class="card-title pt-2">
                                <a href="#">The top yoga studio in every state offering virtual
                                    classes</a>
                            </h4>
                            <div class="avatar-photos pt-4">
                                <a href="#" class="user-thumb" data-toggle="tooltip" data-placement="top"
                                   title="Alex Smith">
                                    <img src="{{asset('/images/img4.jpg')}}" alt="Avatar image">
                                </a>
                                <a href="#" class="user-thumb" data-toggle="tooltip" data-placement="top"
                                   title="John Doe">
                                    <img src="{{asset('/images/img4.jpg')}}" alt="Avatar image">
                                </a>
                            </div>
                        </div><!-- end card-content -->
                    </div><!-- end card-item -->
                </div><!-- end col-lg-4 -->
                <div class="col-lg-4 responsive-column">
                    <div class="card-item card-item-layout-5 js-tilt">
                        <div class="card-image">
                            <img src="{{asset('/images/img4.jpg')}}" data-src="{{asset('/images/img4.jpg')}}"
                                 class="card__img lazy"
                                 alt="blog image">
                            <span class="badge">March 15, 2020</span>
                        </div><!-- end card-image -->
                        <div class="card-content">
                            <ul class="listing-meta d-flex align-items-center pt-0">
                                <li>
                                    <a href="#" class="listing-cat-link">Travel</a>,
                                    <a href="#" class="listing-cat-link">Restaurants</a>
                                </li>
                            </ul>
                            <h4 class="card-title pt-2">
                                <a href="#">Latin Street Food Tour Across North America</a>
                            </h4>
                            <div class="avatar-photos pt-4">
                                <a href="#" class="user-thumb" data-toggle="tooltip" data-placement="top"
                                   title="Alex Smith">
                                    <img src="{{asset('/images/img4.jpg')}}" alt="Avatar image">
                                </a>
                                <a href="#" class="user-thumb" data-toggle="tooltip" data-placement="top"
                                   title="John Doe">
                                    <img src="{{asset('/images/img4.jpg')}}" alt="Avatar image">
                                </a>
                            </div>
                        </div><!-- end card-content -->
                    </div><!-- end card-item -->
                </div><!-- end col-lg-4 -->
            </div><!-- end row -->
            <div class="more-btn-box d-flex flex-wrap align-items-center justify-content-between pt-4">
                <div>
                    <h4 class="pb-2 font-weight-semi-bold">Stay in the loop.</h4>
                    <p>View all blog posts and read more about topics you care about</p>
                </div>
                <a href="#" class="theme-btn gradient-btn">Read More Post<i
                        class="la la-arrow-right ml-2"></i></a>
            </div>
        </div><!-- end container -->
    </section><!-- end blog-area -->
    <!-- ================================
           START BLOG AREA
    ================================= -->

    <!-- ================================
        START CTA AREA
    ================================= -->
    <section class="cta-area cta-bg bg-fixed section-padding text-center">
        <div class="overlay opacity-9"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cta-content p-0">
                        <div class="section-heading">
                            <div class="section-badge pb-3">
                                <span class="ribbon ribbon-lg">Join with us</span>
                            </div>
                            <h2 class="sec__title mb-4 font-size-45 line-height-60 text-white">
                                Grow Your Marketing With <span class="text-color-16">Nebraskalisting</span> and <br>
                                Be Happy With Your Business.
                            </h2>
                            <p class="sec__desc text-white line-height-35 mb-3">
                                Your business deserves efficiently unleash cross-media information without cross-media
                                value
                                <br>
                                Quickly maximize timely deliverables for real-time schemas.
                            </p>
                        </div><!-- end section-heading -->
                        <div class="btn-box pt-4">
                            <a href="#" class="theme-btn gradient-btn" data-toggle="modal" data-target="#signUpModal"><i
                                    class="la la-user-plus mr-2"></i>Click Me to Start</a>
                        </div><!-- end btn-box -->
                    </div>
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end cta-area -->
    <!-- ================================
        END CTA AREA
    ================================= -->
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>

    <script>
        let path = "{{ route('autocomplete')}}";
        $('#looking_for').typeahead({
            source:  function (query, process) {
                return $.get(path, { term: query }, function (data) {
                    return process(data);
                });
            }
        });
    </script>
@endsection
