@extends('layouts.master')
@section('title', "Nebraskalisting")
@section('meta_description', "add")
@section('meta_keywords',"add")
@section('content')
    <!-- =======START FULL SCREEN SLIDER======= -->
    <section class="full-screen-slider-area" style="padding-top: 98px">
        @if($organization->organization_photos_files)
            <div class="full-screen-slider owl-trigger-action owl-trigger-action-2">
                @foreach(explode(',', $organization->organization_photos_files) as $photo_file)
                    <a href="{{ asset('images/business/' . $photo_file) }}" class="fs-slider-item d-block"
                       data-fancybox="gallery"
                       data-caption="Showing image - {{ $photo_file }}">
                        <img src="{{ asset('images/business/' . $photo_file) }}"
                             alt="single listing image" style="height: 355px">
                    </a><!-- end fs-slider-item -->
                @endforeach
            </div>
        @endif
    </section><!-- end full-screen-slider-area -->
    <!-- =====END FULL SCREEN SLIDER======= -->

    <!-- ======START BREADCRUMB AREA======== -->
    <section class="breadcrumb-area bg-gradient-gray py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-content breadcrumb-content-2 d-flex flex-wrap align-items-end justify-content-between">
                        <div class="section-heading">
                            <ul class="list-items bread-list bread-list-2 bg-transparent rounded-0 p-0 text-capitalize">
                                <li><a href="{{ route('home') }}">Home</a></li>
                                <li>
                                    <a href="{{ route('city.wise.organizations', ['city_slug' => $organization->city->slug, 'category_slug' => $organization->category->slug]) }}">{{ $organization->category->name }}</a>
                                </li>
                                <li>{{ $organization->organization_name }}</li>
                            </ul>
                            <div class="d-flex align-items-center pt-1">
                                <h2 class="sec__title mb-0">{{ $organization->organization_name }}</h2>
                            </div>
                            @if($organization->organization_address)
                                <p class="sec__desc py-2 font-size-17"><i
                                        class="la la-map-marker mr-1 text-color-2"></i>{{ $organization->organization_address }}
                                </p>
                            @endif
                            <p class="pb-2 font-weight-medium">
                            <span class="price-range mr-1 text-color font-size-16" data-toggle="tooltip"
                                  data-placement="top" title="Moderate">
                                <strong class="font-weight-medium">$</strong>
                                <strong class="font-weight-medium ml-n1">$</strong>
                            </span>
                                <span class="category-link text-capitalize">
                                <a href="#">{{ $organization->organization_category }}</a>
                            </span>
                            </p>
                            <div class="d-flex flex-wrap align-items-center">
                                @if($organization->rate_stars && $organization->reviews_total_count)
                                    <div class="star-rating-wrap d-flex align-items-center">
                                        <div class="organization_rating"
                                             data-rating="{{ $organization->rate_stars }}"></div>
                                        <p class="font-size-14 pl-2 font-weight-medium">{{ $organization->reviews_total_count }}
                                            reviews</p>
                                    </div>
                                @endif
                            </div>
                            <div class="btn-box pt-3">
                                <a href="#review" class="btn-gray mr-1"><i class="la la-star mr-1"></i>Write a
                                    Review</a>
                            </div>
                        </div>
                        <div class="btn-box d-flex align-items-center">
                            <span class="btn-gray mr-2"><i class="la la-eye mr-1"></i>Viewed - {{ $organization->views }}</span>
                        </div>
                    </div><!-- end breadcrumb-content -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end breadcrumb-area -->
    <!-- =======END BREADCRUMB AREA======= -->

    <!-- ========START LISTING DETAIL AREA======== -->
    <section class="listing-detail-area padding-top-60px padding-bottom-100px">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="listing-detail-wrap">
                        @if($organization->organization_short_description)
                            <div class="block-card mb-4">
                                <div class="block-card-header">
                                    <h2 class="widget-title">Description</h2>
                                    <div class="stroke-shape"></div>
                                </div><!-- end block-card-header -->
                                <div class="block-card-body">
                                    <p class="pb-3 font-weight-medium line-height-30">{{ $organization->organization_short_description }}</p>
                                </div><!-- end block-card-body -->
                            </div><!-- end block-card -->
                        @endif
                        <div class="block-card mb-4">
                            <div class="block-card-header">
                                <h2 class="widget-title">Location / Contact</h2>
                                <div class="stroke-shape"></div>
                            </div><!-- end block-card-header -->
                            <div class="block-card-body">
                                @if($organization->embed_map_code)
                                    <div class="map-container height-500">
                                        <div id="map">{!! $organization->embed_map_code !!}</div>
                                    </div>
                                @endif
                                <ul class="list-items list--items list-items-style-2 py-4">
                                    @if($organization->organization_address)
                                        <li><span class="text-color"><i
                                                    class="la la-map mr-2 text-color-2 font-size-18"></i>Address:</span>
                                            {{ $organization->organization_address }}
                                        </li>
                                    @endif
                                    @if($organization->organization_phone_number)
                                        <li><span class="text-color"><i
                                                    class="la la-phone mr-2 text-color-2 font-size-18"></i>Phone:</span><a
                                                href="tel:{{ $organization->organization_phone_number }}">{{ $organization->organization_phone_number }}</a>
                                        </li>
                                    @endif
                                    @if($organization->organization_email)
                                        <li><span class="text-color"><i
                                                    class="la la-envelope mr-2 text-color-2 font-size-18"></i>Email:</span><a
                                                href="mailto:{{$organization->organization_email}}">{{ $organization->organization_email }}</a>
                                        </li>
                                    @endif
                                    @if($organization->organization_website)
                                        <li><span class="text-color"><i
                                                    class="la la-globe mr-2 text-color-2 font-size-18"></i>Website:</span><a
                                                href="{{ 'https://' . $organization->organization_website }}"
                                                target="_blank">{{ $organization->organization_website }}</a>
                                        </li>
                                    @endif
                                </ul>
                                <ul class="social-profile social-profile-styled">
                                    @if($organization->organization_facebook)
                                        <li><a href="{{ $organization->organization_facebook }}" class="facebook-bg"
                                               data-toggle="tooltip" data-placement="top"
                                               title="Facebook" target="_blank"><i class="lab la-facebook-f"></i></a>
                                        </li>
                                    @endif
                                    @if($organization->organization_twitter)
                                        <li><a href="{{ $organization->organization_twitter }}" class="twitter-bg"
                                               data-toggle="tooltip" data-placement="top"
                                               title="Twitter"><i class="lab la-twitter"></i></a></li>
                                    @endif
                                    @if($organization->organization_instagram)
                                        <li><a href="{{ $organization->organization_instagram }}" class="instagram-bg"
                                               data-toggle="tooltip" data-placement="top"
                                               title="Instagram"><i class="lab la-instagram"></i></a></li>
                                    @endif
                                    @if($organization->organization_youTube)
                                        <li><a href="{{ $organization->organization_youTube }}" class="youtube-bg"
                                               data-toggle="tooltip" data-placement="top"
                                               title="Youtube"><i class="la la-youtube"></i></a></li>
                                    @endif
                                </ul>
                            </div><!-- end block-card-body -->
                        </div><!-- end block-card -->
                        @if($organization->rate_stars && $organization->reviews_total_count)
                            <div class="block-card mb-4">
                                <div class="block-card-header">
                                    <h2 class="widget-title">Rating Stats</h2>
                                    <div class="stroke-shape"></div>
                                </div><!-- end block-card-header -->
                                <div class="block-card-body">
                                    <div class="review-content d-flex flex-wrap align-items-center">
                                        <div class="review-rating-summary">
                                    <span class="stats-average__count">
                                       {{ $organization->rate_stars }}
                                    </span><!-- end stats-average__count -->
                                            <div class="star-rating-wrap">
                                                <p class="font-size-14 font-weight-medium">out of 5.0</p>
                                                <div class="organization_rating"
                                                     data-rating="{{ $organization->rate_stars }}"></div>
                                            </div>
                                        </div><!-- end review-rating-summary -->
                                        <div
                                            class="review-bars d-flex flex-row flex-wrap flex-grow-1 align-items-center">
                                            <div class="review-bars-item">
                                                <span class="review-bars-name">{{ $five_star_reviews }} reviews</span>
                                                <div class="review-bars-inner d-flex w-100 align-items-center">
                                            <span class="review-bars-review" data-rating="5.0">
                                                <span class="review-bars-review-inner"></span>
                                            </span>
                                                    <span class="pill">5.0</span>
                                                </div>
                                            </div><!-- end review-bars-item -->
                                            <div class="review-bars-item">
                                                <span class="review-bars-name">{{ $four_star_reviews }} reviews</span>
                                                <div class="review-bars-inner d-flex w-100 align-items-center">
                                            <span class="review-bars-review" data-rating="4.0">
                                                <span class="review-bars-review-inner"></span>
                                            </span>
                                                    <span class="pill">4.0</span>
                                                </div>
                                            </div><!-- end review-bars-item -->
                                            <div class="review-bars-item">
                                                <span class="review-bars-name">{{ $three_star_reviews }} reviews</span>
                                                <div class="review-bars-inner d-flex w-100 align-items-center">
                                            <span class="review-bars-review" data-rating="3.0">
                                                <span class="review-bars-review-inner"></span>
                                            </span>
                                                    <span class="pill">3.0</span>
                                                </div>
                                            </div><!-- end review-bars-item -->
                                            <div class="review-bars-item">
                                                <span class="review-bars-name">{{ $two_star_reviews }} reviews</span>
                                                <div class="review-bars-inner d-flex w-100 align-items-center">
                                            <span class="review-bars-review" data-rating="2.0">
                                                <span class="review-bars-review-inner"></span>
                                            </span>
                                                    <span class="pill">2.0</span>
                                                </div>
                                            </div><!-- end review-bars-item -->
                                            <div class="review-bars-item">
                                                <span class="review-bars-name">{{ $one_star_reviews }} reviews</span>
                                                <div class="review-bars-inner d-flex w-100 align-items-center">
                                            <span class="review-bars-review" data-rating="1.0">
                                                <span class="review-bars-review-inner"></span>
                                            </span>
                                                    <span class="pill">1.0</span>
                                                </div>
                                            </div><!-- end review-bars-item -->
                                        </div><!-- end review-bars -->
                                    </div><!-- end review-content -->
                                </div><!-- end block-card-body -->
                            </div><!-- end block-card -->
                        @endif
                        @if($organization->reviews->count())
                            <div class="block-card mb-4">
                                <div class="block-card-header">
                                    <h2 class="widget-title">Reviews <span class="ml-1 text-color-2">({{ $organization->reviews->count() }})</span>
                                    </h2>
                                    <div class="stroke-shape"></div>
                                </div><!-- end block-card-header -->
                                <div class="block-card-body">
                                    <div class="comments-list">
                                        @foreach($organization->reviews_paginator as $review)
                                            <div class="comment">
                                                @if($review->reviewer_avatar_url)
                                                    <div class="user-thumb user-thumb-lg flex-shrink-0">
                                                        <img src="{{ $review->reviewer_avatar_url }}" alt="author-img">
                                                    </div>
                                                @else
                                                    <div class="user-thumb user-thumb-lg flex-shrink-0">
                                                        <img src="{{ asset('images/bb.png') }}" alt="author-img">
                                                    </div>
                                                @endif
                                                <div class="comment-body">
                                                    <div
                                                        class="meta-data d-flex align-items-center justify-content-between">
                                                        <div>
                                                            <h4 class="comment__title">{{ $review->reviewer_name }}</h4>
                                                        </div>
                                                        <div class="star-rating-wrap text-center">
                                                            <div class="users_review_ratings"
                                                                 data-rating="{{ $review->review_rate_stars }}"></div>
                                                            <p class="font-size-13 font-weight-medium">{{ $review->review_date }}</p>
                                                        </div>
                                                    </div>
                                                    <p class="comment-desc">{{ $review->review_text_original }}</p>

                                                    @if($review->review_photos_files)
                                                        <div
                                                            class="review-photos d-flex flex-wrap align-items-center ml-n1 mb-3">
                                                            @foreach(explode(',', $review->review_photos_files) as $photo_file)
                                                                <a href="{{ asset('images/business/' . $photo_file) }}"
                                                                   class="d-inline-block" data-fancybox="gallery">
                                                                    <img class="lazy"
                                                                         src="{{ asset('images/business/' . $photo_file) }}"
                                                                         data-src="{{ asset('images/business/' . $photo_file) }}"
                                                                         alt="review image">
                                                                </a>
                                                            @endforeach
                                                        </div><!-- end review-photos -->
                                                    @endif
                                                    @if($review->review_thumbs_up_value)
                                                        <div
                                                            class="comment-action d-flex align-items-center justify-content-between float-right">
                                                            <p class="feedback-box ">
                                                                <button type="button" class="btn-gray btn-gray-sm mr-1">
                                                                    <i class="fa-solid fa-thumbs-up"></i> <span
                                                                        class="text-color font-weight-semi-bold">{{ $review->review_thumbs_up_value }}</span>
                                                                </button>
                                                            </p>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div><!-- end comment -->
                                        @endforeach
                                    </div>
                                    @if ($organization->reviews_paginator->hasPages())
                                        <div class="text-center">
                                            <div class="pagination-wrapper d-inline-block">
                                                <div class="section-pagination">
                                                    <nav aria-label="Page navigation">
                                                        <ul class="pagination flex-wrap justify-content-center">
                                                            {{-- First Page Link --}}
                                                            @if ($organization->reviews_paginator->onFirstPage())
                                                                <li class="page-item disabled" aria-disabled="true">
                                                                    <a class="page-link page-link-first" href="#"
                                                                       aria-hidden="true"><i
                                                                            class="la la-long-arrow-left mr-1"
                                                                            aria-hidden="true"></i> First</a>
                                                                </li>
                                                            @else
                                                                <li class="page-item">
                                                                    <a class="page-link page-link-first"
                                                                       href="{{ $organization->reviews_paginator->url(1) }}"
                                                                       rel="first"><i
                                                                            class="la la-long-arrow-left mr-1"></i>
                                                                        First</a>
                                                                </li>
                                                            @endif
                                                            {{-- Previous Page Link --}}
                                                            @if ($organization->reviews_paginator->onFirstPage())
                                                                <li class="page-item disabled" aria-disabled="true">
                                                                    <a class="page-link" href="#" aria-label="Previous">
                                                            <span aria-hidden="true"><i
                                                                    class="la la-angle-left"></i></span>
                                                                        <span class="sr-only"
                                                                              aria-hidden="true">Previous</span>
                                                                    </a>
                                                                </li>
                                                            @else
                                                                <li class="page-item">
                                                                    <a class="page-link"
                                                                       href="{{ $organization->reviews_paginator->previousPageUrl() }}"
                                                                       aria-label="Previous" rel="prev">
                                                            <span aria-hidden="true"><i
                                                                    class="la la-angle-left"></i></span>
                                                                        <span class="sr-only">Previous</span>
                                                                    </a>
                                                                </li>
                                                            @endif
                                                            {{-- Pagination Elements --}}
                                                            @foreach ($organization->reviews_paginator->links()->elements as $element)
                                                                {{-- "Three Dots" Separator --}}
                                                                @if (is_string($element))
                                                                    <li class="page-item disabled"
                                                                        aria-disabled="true"><span
                                                                            class="page-link">{{ $element }}</span></li>
                                                                @endif
                                                                {{-- Array Of Links --}}
                                                                @if (is_array($element))
                                                                    @foreach ($element as $page => $url)
                                                                        @if ($page == $organization->reviews_paginator->currentPage())
                                                                            <li class="page-item active"
                                                                                aria-current="page"><span
                                                                                    class="page-link">{{ $page }}</span>
                                                                            </li>
                                                                        @else
                                                                            <li class="page-item"><a class="page-link"
                                                                                                     href="{{ $url }}">{{ $page }}</a>
                                                                            </li>
                                                                        @endif
                                                                    @endforeach
                                                                @endif
                                                            @endforeach
                                                            {{-- Next Page Link --}}
                                                            @if ($organization->reviews_paginator->hasMorePages())
                                                                <li class="page-item">
                                                                    <a class="page-link"
                                                                       href="{{ $organization->reviews_paginator->nextPageUrl() }}"
                                                                       aria-label="Next" rel="next">
                                                        <span aria-hidden="true"><i
                                                                class="la la-angle-right"></i></span>
                                                                        <span class="sr-only">Next</span>
                                                                    </a>
                                                                </li>
                                                            @else
                                                                <li class="page-item disabled" aria-disabled="true">
                                                        <span class="page-link" aria-hidden="true"><i
                                                                class="la la-angle-right"></i></span>
                                                                    <span class="sr-only">Next</span>
                                                                </li>
                                                            @endif
                                                            {{-- Last Page Link --}}
                                                            @if ($organization->reviews_paginator->hasMorePages())
                                                                <li class="page-item">
                                                                    <a class="page-link page-link-last"
                                                                       href="{{ $organization->reviews_paginator->url($organization->reviews_paginator->lastPage()) }}"
                                                                       rel="last">Last <i
                                                                            class="la la-long-arrow-right ml-1"></i></a>
                                                                </li>
                                                            @else
                                                                <li class="page-item disabled" aria-disabled="true">
                                                                    <a class="page-link page-link-last" href="#"
                                                                       aria-hidden="true">Last
                                                                        <i
                                                                            class="la la-long-arrow-right ml-1"
                                                                            aria-hidden="true"></i></a>
                                                                </li>
                                                            @endif

                                                        </ul>
                                                    </nav>
                                                </div><!-- end section-pagination -->
                                            </div>
                                        </div>
                                    @endif

                                </div><!-- end block-card-body -->
                            </div><!-- end block-card -->
                        @endif
                        <div class="block-card" id="review">
                            <div class="block-card-header">
                                <h2 class="widget-title pb-1">Add a Review</h2>
                                <p>Your email address will not be published. Required fields are marked <span
                                        class="required">*</span></p>
                            </div><!-- end block-card-header -->
                            <div class="block-card-body">
                                <div
                                    class="add-rating-bars review-bars d-flex flex-row flex-wrap flex-grow-1 align-items-center">
                                    <span class="review-bars-name pr-3">Rate this business! <span
                                            class="required">*</span></span>
                                    <section class='rating-widget'>
                                        <!-- Rating Stars Box -->
                                        <div class='rating-stars text-center'>
                                            <ul id='stars'>
                                                <li class='star' title='Poor' data-value='1'>
                                                    <i class='fa fa-star fa-fw'></i>
                                                </li>
                                                <li class='star' title='Fair' data-value='2'>
                                                    <i class='fa fa-star fa-fw'></i>
                                                </li>
                                                <li class='star' title='Good' data-value='3'>
                                                    <i class='fa fa-star fa-fw'></i>
                                                </li>
                                                <li class='star' title='Excellent' data-value='4'>
                                                    <i class='fa fa-star fa-fw'></i>
                                                </li>
                                                <li class='star' title='WOW!!!' data-value='5'>
                                                    <i class='fa fa-star fa-fw'></i>
                                                </li>
                                            </ul>
                                        </div>
                                    </section>
                                </div><!-- end review-bars -->
                                <form method="post" action="{{ route('review.store') }}" class="form-box row pt-3"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="review_rate_stars" id="review_rate_stars">
                                    <input type="hidden" name="organization_guid"
                                           value="{{ $organization->organization_guid }}">
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text" for="reviewer_name">Name <span
                                                    class="required">*</span></label>
                                            <div class="form-group">
                                                <span class="la la-user form-icon"></span>
                                                <input class="form-control" type="text" name="reviewer_name"
                                                       id="reviewer_name"
                                                       placeholder="Your Name" value="{{ old('reviewer_name') }}"
                                                       required>
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-6 -->
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text" for="reviewer_email">Email</label>
                                            <div class="form-group">
                                                <span class="la la-envelope-o form-icon"></span>
                                                <input class="form-control" type="email" name="reviewer_email"
                                                       id="reviewer_email"
                                                       placeholder="Email Address" value="{{ old('reviewer_email') }}">
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-6 -->
                                    <div class="col-lg-12">
                                        <div class="input-box">
                                            <label class="label-text" for="review_text_original">Review</label>
                                            <div class="form-group">
                                                <span class="la la-pencil form-icon"></span>
                                                <textarea class="message-control form-control"
                                                          name="review_text_original"
                                                          id="review_text_original"
                                                          placeholder="Tell about your experience or leave a tip for others">{{ old('review_text_original') }}</textarea>
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-12 -->
                                    <div class="col-lg-12">
                                        <div class="file-upload-wrap file-upload-wrap-2">
                                            <input type="file" name="review_photos_files[]"
                                                   class="multi file-upload-input with-preview" multiple>
                                            <span class="file-upload-text"><i
                                                    class="la la-photo mr-2"></i>Add Photos</span>
                                        </div>
                                    </div><!-- end col-lg-12 -->
                                    <div class="col-lg-12">
                                        <div class="btn-box pt-3">
                                            <button class="theme-btn gradient-btn border-0">Submit Review<i
                                                    class="la la-arrow-right ml-2"></i></button>
                                        </div>
                                    </div><!-- end col-lg-12 -->
                                </form>
                            </div><!-- end block-card-body -->
                        </div><!-- end block-card -->
                    </div><!-- end listing-detail-wrap -->
                </div><!-- end col-lg-8 -->
                <div class="col-lg-4">
                    <div class="sidebar mb-0">
                        <div class="sidebar-widget">
                            <h3 class="widget-title">General Information</h3>
                            <div class="stroke-shape mb-4"></div>
                            <ul class="list-items list-items-style-2">
                                @if($organization->organization_website)
                                    <li><i class="la la-external-link mr-2 text-color-2 font-size-18"></i><a
                                            href="{{ 'https://' . $organization->organization_website }}"
                                            target="_blank">{{ $organization->organization_website }}</a></li>
                                @endif
                                @if($organization->organization_phone_number)
                                    <li><i class="la la-phone mr-2 text-color-2 font-size-18"></i><a
                                            href="tel:{{ $organization->organization_phone_number }}">{{ $organization->organization_phone_number }}</a>
                                    </li>
                                @endif
                                <li><i class="la la-map-signs mr-2 text-color-2 font-size-18"></i><a
                                        href="{{ $organization->gmaps_link }}" target="_blank">Get
                                        Directions</a></li>
                            </ul>
                        </div><!-- end sidebar-widget -->
                        @if($organization->organization_work_time)
                            <div class="sidebar-widget">
                                <h3 class="widget-title">Opening Hours</h3>
                                <div class="stroke-shape mb-4"></div>
                                <ul class="list-items">
                                    @foreach(explode(';', $organization->organization_work_time) as $work_times)
                                        @php
                                            $modified_work_time = str_replace('. Hide open hours for the week', '', $work_times);
                                            $updated_work_time = str_replace(', Hours might differ', '', $modified_work_time);
                                            $exploded_work_time = explode(',', $updated_work_time);
                                        @endphp
                                        <li class="d-flex justify-content-between">{{ $exploded_work_time[0] }}
                                            <span>{{ $exploded_work_time[1] }}</span></li>
                                    @endforeach
                                </ul>
                            </div><!-- end sidebar-widget -->
                        @endif
                    </div><!-- end sidebar -->
                </div><!-- end col-lg-4 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end listing-detail-area -->
    <!-- =======END LISTING DETAIL  AREA======= -->
@endsection

@section('js')
    <script src="{{asset('plugins/ratings/src/jquery.star-rating-svg.js')}}"></script>
    <script>
        $(".users_review_ratings").starRating({
            totalStars: 5,
            starSize: 18,
            starShape: 'rounded',
            emptyColor: 'lightgray',
            activeColor: '#FFA718',
            readOnly: true,
            useGradient: false
        });

        $(".organization_rating").starRating({
            totalStars: 5,
            starSize: 18,
            starShape: 'rounded',
            emptyColor: 'lightgray',
            activeColor: '#FFA718',
            readOnly: true,
            useGradient: false
        });

        $(".my-rating-9").starRating({
            initialRating: 3,
            disableAfterRate: false,
            onHover: function (currentIndex, currentRating, $el) {
                $('.live-rating').text(currentIndex);
            },
            onLeave: function (currentIndex, currentRating, $el) {
                $('.live-rating').text(currentRating);
            }
        });

        $(document).ready(function () {
            /* 1. Visualizing things on Hover - See next part for action on click */
            $('#stars li').on('mouseover', function () {
                let onStar = parseInt($(this).data('value'), 10); // The star currently mouse on

                // Now highlight all the stars that's not after the current hovered star
                $(this).parent().children('li.star').each(function (e) {
                    if (e < onStar) {
                        $(this).addClass('hover');
                    } else {
                        $(this).removeClass('hover');
                    }
                });

            }).on('mouseout', function () {
                $(this).parent().children('li.star').each(function (e) {
                    $(this).removeClass('hover');
                });
            });

            /* 2. Action to perform on click */
            $('#stars li').on('click', function () {
                let onStar = parseInt($(this).data('value'), 10); // The star currently selected
                let stars = $(this).parent().children('li.star');

                for (let i = 0; i < stars.length; i++) {
                    $(stars[i]).removeClass('selected');
                }

                for (let i = 0; i < onStar; i++) {
                    $(stars[i]).addClass('selected');
                }
                // JUST RESPONSE (Not needed)
                document.getElementById('review_rate_stars').value = parseInt($('#stars li.selected').last().data('value'), 10);
            });
        });
    </script>
@endsection
