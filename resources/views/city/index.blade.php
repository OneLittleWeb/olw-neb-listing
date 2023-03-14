@extends('layouts.master')
@section('title', "Nebraskalisting")
@section('meta_description', "add")
@section('meta_keywords',"add")
@section('content')
    <section class="category-area section--padding margin-top-50px">
        <div class="container">
            <div class="row">
                @foreach($cities as $city)
                    <div class="col-lg-3 responsive-column">
                        <div class="category-item overflow-hidden">
                            <img src="{{ asset('images/city/' . $city->background_image) }}" data-src="{{ asset('images/city/' . $city->background_image) }}" alt="{{ $city->name }}" class="cat-img lazy">
                            <div class="category-content d-flex align-items-center justify-content-center">
                                <a href="{{ route('category.index', $city->slug) }}"
                                   class="category-link d-flex flex-column justify-content-center w-100 h-100">
                                    <div class="cat-content">
                                        <h4 class="cat__title mb-3">{{ $city->name }}</h4>
                                    </div>
                                </a>
                            </div>
                        </div><!-- end category-item -->
                    </div><!-- end col-lg-3 -->
                @endforeach
            </div><!-- end row -->
        </div><!-- end container -->
    </section>
@endsection
