@extends('layouts.master')
@section('title', "Nebraskalisting")
@section('meta_description', "add")
@section('meta_keywords',"add")
@section('content')
    <section class="category-area section--padding margin-top-50px">
        <div class="container">
            @if(count($categories))
                <div class="row">
                    @foreach($categories as $category)
                        <div class="col-lg-3 responsive-column">
                            <div class="category-item overflow-hidden">
                                <img src="{{asset('images/category/' . $category->background_image)}}"
                                     data-src="{{asset('images/category/' . $category->background_image)}}"
                                     alt="{{ $category->name }}" class="cat-img lazy">
                                <div class="category-content d-flex align-items-center justify-content-center">
                                    <a href="{{ route('category.business', $category->slug) }}"
                                       class="category-link d-flex flex-column justify-content-center w-100 h-100">
                                        <div class="icon-element mb-3 mx-auto">
                                            <span class="{{ $category->icon }}"></span>
                                        </div>
                                        <div class="cat-content">
                                            <h4 class="cat__title mb-3">{{ $category->name }}</h4>
                                        </div>
                                    </a>
                                </div>
                            </div><!-- end category-item -->
                        </div><!-- end col-lg-3 -->
                    @endforeach
                </div><!-- end row -->
            @else
                <div class="row">
                    <div class="col-lg-12">
                        <div
                            class="filter-bar d-flex flex-wrap margin-bottom-30px">
                            <p class="result-text font-weight-medium">No Category Found</p>
                        </div><!-- end filter-bar -->
                    </div><!-- end col-lg-12 -->
                </div>
            @endif
        </div><!-- end container -->
    </section>
@endsection
