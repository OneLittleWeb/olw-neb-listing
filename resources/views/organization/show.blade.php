@extends('layouts.master')
@section('title', "Nebraskalisting")
@section('meta_description', "add")
@section('meta_keywords',"add")
@section('content')
    <!-- ========START FULL SCREEN SLIDER======= -->
    <section class="full-screen-slider-area" style="padding-top: 98px">
        <div class="full-screen-slider owl-trigger-action owl-trigger-action-2">
            <a href="images/single-listing-img1.jpg" class="fs-slider-item d-block" data-fancybox="gallery"
               data-caption="Showing image - 01">
                <img src="{{asset('images/photo_1ef21e70-a7f3-4a9b-9677-11e24cffb702.jpg')}}"
                     alt="single listing image">
            </a><!-- end fs-slider-item -->
            <a href="images/single-listing-img2.jpg" class="fs-slider-item d-block" data-fancybox="gallery"
               data-caption="Showing image - 02">
                <img src="{{asset('images/photo_1ef21e70-a7f3-4a9b-9677-11e24cffb702.jpg')}}"
                     alt="single listing image">
            </a><!-- end fs-slider-item -->
            <a href="images/single-listing-img3.jpg" class="fs-slider-item d-block" data-fancybox="gallery"
               data-caption="Showing image - 03">
                <img src="{{asset('images/photo_1ef21e70-a7f3-4a9b-9677-11e24cffb702.jpg')}}"
                     alt="single listing image">
            </a><!-- end fs-slider-item -->
            <a href="images/single-listing-img4.jpg" class="fs-slider-item d-block" data-fancybox="gallery"
               data-caption="Showing image - 04">
                <img src="{{asset('images/photo_1ef21e70-a7f3-4a9b-9677-11e24cffb702.jpg')}}"
                     alt="single listing image">
            </a><!-- end fs-slider-item -->
            <a href="images/single-listing-img5.jpg" class="fs-slider-item d-block" data-fancybox="gallery"
               data-caption="Showing image - 05">
                <img src="{{asset('images/photo_1ef21e70-a7f3-4a9b-9677-11e24cffb702.jpg')}}"
                     alt="single listing image">
            </a><!-- end fs-slider-item -->
            <a href="images/single-listing-img6.jpg" class="fs-slider-item d-block" data-fancybox="gallery"
               data-caption="Showing image - 06">
                <img src="{{asset('images/photo_1ef21e70-a7f3-4a9b-9677-11e24cffb702.jpg')}}"
                     alt="single listing image">
            </a><!-- end fs-slider-item -->
            <a href="images/single-listing-img7.jpg" class="fs-slider-item d-block" data-fancybox="gallery"
               data-caption="Showing image - 07">
                <img src="{{asset('images/photo_1ef21e70-a7f3-4a9b-9677-11e24cffb702.jpg')}}"
                     alt="single listing image">
            </a><!-- end fs-slider-item -->
            <a href="images/single-listing-img8.jpg" class="fs-slider-item d-block" data-fancybox="gallery"
               data-caption="Showing image - 08">
                <img src="{{asset('images/photo_1ef21e70-a7f3-4a9b-9677-11e24cffb702.jpg')}}"
                     alt="single listing image">
            </a><!-- end fs-slider-item -->
        </div>
    </section><!-- end full-screen-slider-area -->
    <!-- =====END FULL SCREEN SLIDER======= -->

    <!-- ======START BREADCRUMB AREA======== -->
    <section class="breadcrumb-area bg-gradient-gray py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div
                        class="breadcrumb-content breadcrumb-content-2 d-flex flex-wrap align-items-end justify-content-between">
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
                            <p class="sec__desc py-2 font-size-17"><i
                                    class="la la-map-marker mr-1 text-color-2"></i>{{ $organization->organization_address }}
                            </p>
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
                                <div class="star-rating-wrap d-flex align-items-center">
                                    @if($organization->rate_stars)
                                        <div class="organization_rating"
                                             data-rating="{{ $organization->rate_stars }}"></div>
                                    @endif
                                    <p class="font-size-14 pl-2 font-weight-medium">{{ $organization->reviews_total_count }}
                                        reviews</p>
                                </div>
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
                        <div class="block-card mb-4">
                            <div class="block-card-header">
                                <h2 class="widget-title">Reviews <span class="ml-1 text-color-2">({{ $organization->reviews->count() }})</span>
                                </h2>
                                <div class="stroke-shape"></div>
                            </div><!-- end block-card-header -->
                            <div class="block-card-body">
                                <div class="comments-list">
                                    @foreach($organization->reviews as $review)
                                        <div class="comment">
                                            <div class="user-thumb user-thumb-lg flex-shrink-0">
                                                <img src="{{ $review->reviewer_avatar_url }}" alt="author-img">
                                            </div>
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

                                                @if ($review->review_photos_urls)
                                                    <div
                                                        class="review-photos d-flex flex-wrap align-items-center ml-n1 mb-3">
                                                        @foreach(explode(',', $review->review_photos_urls) as $photo_url)
                                                            <a href="{{ $photo_url }}" class="d-inline-block"
                                                               data-fancybox="gallery">
                                                                <img class="lazy" src="{{ $photo_url }}"
                                                                     data-src="{{ $photo_url }}" alt="review image">
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
                                <div class="text-center">
                                    <div class="pagination-wrapper d-inline-block">
                                        <div class="section-pagination">
                                            <nav aria-label="Page navigation">
                                                <ul class="pagination flex-wrap justify-content-center">
                                                    <li class="page-item">
                                                        <a class="page-link page-link-first" href="#"><i
                                                                class="la la-long-arrow-left mr-1"></i> First</a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a class="page-link" href="#" aria-label="Previous">
                                                            <span aria-hidden="true"><i
                                                                    class="la la-angle-left"></i></span>
                                                            <span class="sr-only">Previous</span>
                                                        </a>
                                                    </li>
                                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                    <li class="page-item"><a class="page-link page-link-active"
                                                                             href="#">2</a></li>
                                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                    <li class="page-item">
                                                        <a class="page-link" href="#" aria-label="Next">
                                                            <span aria-hidden="true"><i
                                                                    class="la la-angle-right"></i></span>
                                                            <span class="sr-only">Next</span>
                                                        </a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a class="page-link page-link-last" href="#">Last <i
                                                                class="la la-long-arrow-right ml-1"></i></a>
                                                    </li>
                                                </ul>
                                            </nav>
                                        </div><!-- end section-pagination -->
                                    </div>
                                </div>
                            </div><!-- end block-card-body -->
                        </div><!-- end block-card -->
                        <div class="block-card" id="review">
                            <div class="block-card-header">
                                <h2 class="widget-title pb-1">Add a Review</h2>
                                <p>Your email address will not be published. Required fields are marked *</p>
                            </div><!-- end block-card-header -->
                            <div class="block-card-body">
                                <div
                                    class="add-rating-bars review-bars d-flex flex-row flex-wrap flex-grow-1 align-items-center justify-content-between">
                                    <div class="review-bars-item mx-0 mt-0">
                                        <span class="review-bars-name">Service</span>
                                        <div class="review-bars-inner pt-1">
                                            <form class="leave-rating">
                                                <input type="radio" name="rating" id="rating-1" value="1">
                                                <label for="rating-1" class="fa fa-star"></label>
                                                <input type="radio" name="rating" id="rating-2" value="2">
                                                <label for="rating-2" class="fa fa-star"></label>
                                                <input type="radio" name="rating" id="rating-3" value="3">
                                                <label for="rating-3" class="fa fa-star"></label>
                                                <input type="radio" name="rating" id="rating-4" value="4">
                                                <label for="rating-4" class="fa fa-star"></label>
                                                <input type="radio" name="rating" id="rating-5" value="5">
                                                <label for="rating-5" class="fa fa-star"></label>
                                            </form>
                                        </div>
                                    </div><!-- end review-bars-item -->
                                    <div class="review-bars-item mx-0 mt-0">
                                        <span class="review-bars-name">Value for Money</span>
                                        <div class="review-bars-inner pt-1">
                                            <form class="leave-rating">
                                                <input type="radio" name="rating" id="rating-6" value="1">
                                                <label for="rating-6" class="fa fa-star"></label>
                                                <input type="radio" name="rating" id="rating-7" value="2">
                                                <label for="rating-7" class="fa fa-star"></label>
                                                <input type="radio" name="rating" id="rating-8" value="3">
                                                <label for="rating-8" class="fa fa-star"></label>
                                                <input type="radio" name="rating" id="rating-9" value="4">
                                                <label for="rating-9" class="fa fa-star"></label>
                                                <input type="radio" name="rating" id="rating-10" value="5">
                                                <label for="rating-10" class="fa fa-star"></label>
                                            </form>
                                        </div>
                                    </div><!-- end review-bars-item -->
                                    <div class="review-bars-item mx-0 mt-0">
                                        <span class="review-bars-name">Quality</span>
                                        <div class="review-bars-inner pt-1">
                                            <form class="leave-rating">
                                                <input type="radio" name="rating" id="rating-11" value="1">
                                                <label for="rating-11" class="fa fa-star"></label>
                                                <input type="radio" name="rating" id="rating-12" value="2">
                                                <label for="rating-12" class="fa fa-star"></label>
                                                <input type="radio" name="rating" id="rating-13" value="3">
                                                <label for="rating-13" class="fa fa-star"></label>
                                                <input type="radio" name="rating" id="rating-14" value="4">
                                                <label for="rating-14" class="fa fa-star"></label>
                                                <input type="radio" name="rating" id="rating-15" value="5">
                                                <label for="rating-15" class="fa fa-star"></label>
                                            </form>
                                        </div>
                                    </div><!-- end review-bars-item -->
                                    <div class="review-bars-item mx-0 mt-0">
                                        <span class="review-bars-name">Location</span>
                                        <div class="review-bars-inner pt-1">
                                            <form class="leave-rating">
                                                <input type="radio" name="rating" id="rating-16" value="1">
                                                <label for="rating-16" class="fa fa-star"></label>
                                                <input type="radio" name="rating" id="rating-17" value="2">
                                                <label for="rating-17" class="fa fa-star"></label>
                                                <input type="radio" name="rating" id="rating-18" value="3">
                                                <label for="rating-18" class="fa fa-star"></label>
                                                <input type="radio" name="rating" id="rating-19" value="4">
                                                <label for="rating-19" class="fa fa-star"></label>
                                                <input type="radio" name="rating" id="rating-20" value="5">
                                                <label for="rating-20" class="fa fa-star"></label>
                                            </form>
                                        </div>
                                    </div><!-- end review-bars-item -->
                                </div><!-- end review-bars -->
                                <form method="post" class="form-box row pt-3">
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">Name</label>
                                            <div class="form-group">
                                                <span class="la la-user form-icon"></span>
                                                <input class="form-control" type="text" name="name"
                                                       placeholder="Your Name">
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-6 -->
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">Email</label>
                                            <div class="form-group">
                                                <span class="la la-envelope-o form-icon"></span>
                                                <input class="form-control" type="email" name="email"
                                                       placeholder="Email Address">
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-6 -->
                                    <div class="col-lg-12">
                                        <div class="input-box">
                                            <label class="label-text">Review</label>
                                            <div class="form-group">
                                                <span class="la la-pencil form-icon"></span>
                                                <textarea class="message-control form-control" name="message"
                                                          placeholder="Tell about your experience or leave a tip for others"></textarea>
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-12 -->
                                    <div class="col-lg-12">
                                        <div class="file-upload-wrap file-upload-wrap-2">
                                            <input type="file" name="files[]"
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
                        <div class="sidebar-widget">
                            <h3 class="widget-title">Opening Hours</h3>
                            <div class="stroke-shape mb-4"></div>
                            <ul class="list-items">
                                <li class="d-flex justify-content-between">Monday <span>9am - 5pm</span></li>
                                <li class="d-flex justify-content-between">Tuesday <span>9am - 5pm</span></li>
                                <li class="d-flex justify-content-between">Wednesday <span>9am - 5pm</span></li>
                                <li class="d-flex justify-content-between">Thursday <span>9am - 5pm</span></li>
                                <li class="d-flex justify-content-between">Friday <span>9am - 5am</span></li>
                                <li class="d-flex justify-content-between">Saturday <span>9am - 5am</span></li>
                                <li class="d-flex justify-content-between">Sunday <span
                                        class="text-color-2">Closed</span></li>
                            </ul>
                        </div><!-- end sidebar-widget -->
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
            emptyColor: 'lightgray',
            activeColor: '#FFA718',
            readOnly: true,
            useGradient: false
        });

        $(".organization_rating").starRating({
            totalStars: 5,
            starSize: 20,
            emptyColor: 'lightgray',
            activeColor: '#f9b851',
            readOnly: true,
            useGradient: false
        });
    </script>
@endsection
