@extends('layouts.master')
@section('title', "Nebraskalisting")
@section('meta_description', "add")
@section('meta_keywords',"add")
@section('content')

    <div class="container" style="padding-top: 150px">
        <div class="row">
            @foreach($categories as $category)
                <div class="col-md-3">
                    <span class="font-weight-bold text-dark text-uppercase">{{ $category->name }}</span>
                </div>
            @endforeach
        </div>
    </div>

    <section class="category-area section--padding margin-top-50px">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 responsive-column">
                    <div class="category-item overflow-hidden">
                        <img src="#" data-src="images/cat-img-2.jpg" alt="category-image" class="cat-img lazy">
                        <div class="category-content d-flex align-items-center justify-content-center">
                            <a href="{{ route('city.index') }}"
                               class="category-link d-flex flex-column justify-content-center w-100 h-100">
                                <div class="icon-element mb-3 mx-auto">
                                    <span class="la la-cutlery"></span>
                                </div>
                                <div class="cat-content">
                                    <h4 class="cat__title mb-3">Restaurants</h4>
                                    <span class="badge">12 Cities</span>
                                </div>
                            </a>
                        </div>
                    </div><!-- end category-item -->
                </div><!-- end col-lg-3 -->
                <div class="col-lg-3 responsive-column">
                    <div class="category-item overflow-hidden">
                        <img src="#" data-src="images/cat-img-2.jpg" alt="category-image" class="cat-img lazy">
                        <div class="category-content d-flex align-items-center justify-content-center">
                            <a href="#" class="category-link d-flex flex-column justify-content-center w-100 h-100">
                                <div class="icon-element mb-3 mx-auto">
                                    <span class="la la-plane"></span>
                                </div>
                                <div class="cat-content">
                                    <h4 class="cat__title mb-3">Travels</h4>
                                    <span class="badge">55 Cities</span>
                                </div>
                            </a>
                        </div>
                    </div><!-- end category-item -->
                </div><!-- end col-lg-3 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>
@endsection
