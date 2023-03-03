@extends('layouts.master')
@section('title', "Nebraskalisting")
@section('meta_description', "add")
@section('meta_keywords',"add")
@section('content')
    <section class="card-area section-padding">
        <div class="container pt-5">
            @if(count($organizations))
                <div class="row">
                    <div class="col-lg-12">
                        <div
                            class="filter-bar d-flex flex-wrap justify-content-between align-items-center margin-bottom-30px">
                            <p class="result-text font-weight-medium">{{ "Showing " . $organizations->firstItem() . " to " . $organizations->lastItem() . " of " . $organizations->total() . " entries" }}</p>
                        </div><!-- end filter-bar -->
                    </div><!-- end col-lg-12 -->
                    <div class="col-lg-8">
                        <div class="row">
                            @foreach($organizations as $organization)
                                <div class="col-lg-12">
                                    <div class="card-item card-item-list">
                                        <div class="card-image">
                                            <a href="{{ route('city.wise.organization', ['city_slug' => $organization->city->slug, 'organization_slug' => $organization->slug]) }}"
                                               class="d-block">
                                                <img
                                                    src="{{ asset('images/' . $organization->organization_head_photo_file) }}"
                                                    data-src="{{ asset('images/' . $organization->organization_head_photo_file) }}"
                                                    class="card__img lazy" alt="">
                                            </a>
                                        </div>
                                        <div class="card-content">
                                            <h4 class="card-title">
                                                <a href="{{ route('city.wise.organization', ['city_slug' => $organization->city->slug, 'organization_slug' => $organization->slug]) }}">{{ $organization->organization_name }}</a>
                                            </h4>
                                            @if($organization->organization_address)
                                                <p class="card-sub">
                                                    <a href="#">
                                                        <i class="la la-map-marker mr-1 text-color-2"></i>{{ $organization->organization_address }}
                                                    </a>
                                                </p>
                                            @endif
                                            <ul class="listing-meta d-flex align-items-center">
                                                @if($organization->rate_stars && $organization->reviews_total_count)
                                                    <li class="d-flex align-items-center">
                                                        <span
                                                            class="rate flex-shrink-0">{{ $organization->rate_stars }}</span>
                                                        <span class="rate-text">{{ $organization->reviews_total_count }} Ratings</span>
                                                    </li>
                                                @endif
                                                <li>
                                                    <span class="price-range" data-toggle="tooltip" data-placement="top"
                                                          title="Pricey">
                                                        <strong class="font-weight-medium">$</strong>
                                                    </span>
                                                </li>
                                                <li class="d-flex align-items-center">
                                                    <i class="{{ $organization->category->icon }}"></i>&nbsp;&nbsp;
                                                    <a href="#"
                                                       class="listing-cat-link">{{ $organization->organization_category }}</a>
                                                </li>
                                            </ul>
                                            <ul class="info-list padding-top-20px">
                                                @if($organization->organization_website)
                                                    <li>
                                                        <span class="la la-link icon"></span>
                                                        <a href="{{ 'https://' . $organization->organization_website }}"
                                                           target="_blank"> {{ $organization->organization_website }}</a>
                                                    </li>
                                                @endif
                                                @if($organization->organization_phone_number)
                                                    <li>
                                                        <span class="la la-phone icon"></span>
                                                        <a href="tel:{{ $organization->organization_phone_number }}">{{ $organization->organization_phone_number }}</a>
                                                    </li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div><!-- end card-item -->
                                </div><!-- end col-lg-12 -->
                            @endforeach
                        </div><!-- end row -->
                        @if ($organizations->hasPages())
                            <div class="row">
                                <div class="col-lg-12 pt-3 text-center">
                                    <div class="pagination-wrapper d-inline-block">
                                        <div class="section-pagination">
                                            <nav aria-label="Page navigation">
                                                <ul class="pagination flex-wrap justify-content-center">
                                                    {{-- First Page Link --}}
                                                    @if ($organizations->onFirstPage())
                                                        <li class="page-item disabled" aria-disabled="true">
                                                            <a class="page-link page-link-first" href="#"
                                                               aria-hidden="true"><i
                                                                    class="la la-long-arrow-left mr-1"
                                                                    aria-hidden="true"></i> First</a>
                                                        </li>
                                                    @else
                                                        <li class="page-item">
                                                            <a class="page-link page-link-first"
                                                               href="{{ $organizations->url(1) }}" rel="first"><i
                                                                    class="la la-long-arrow-left mr-1"></i> First</a>
                                                        </li>
                                                    @endif
                                                    {{-- Previous Page Link --}}
                                                    @if ($organizations->onFirstPage())
                                                        <li class="page-item disabled" aria-disabled="true">
                                                            <a class="page-link" href="#" aria-label="Previous">
                                                            <span aria-hidden="true"><i
                                                                    class="la la-angle-left"></i></span>
                                                                <span class="sr-only" aria-hidden="true">Previous</span>
                                                            </a>
                                                        </li>
                                                    @else
                                                        <li class="page-item">
                                                            <a class="page-link"
                                                               href="{{ $organizations->previousPageUrl() }}"
                                                               aria-label="Previous" rel="prev">
                                                            <span aria-hidden="true"><i
                                                                    class="la la-angle-left"></i></span>
                                                                <span class="sr-only">Previous</span>
                                                            </a>
                                                        </li>
                                                    @endif
                                                    {{-- Pagination Elements --}}
                                                    @foreach ($organizations->links()->elements as $element)
                                                        {{-- "Three Dots" Separator --}}
                                                        @if (is_string($element))
                                                            <li class="page-item disabled" aria-disabled="true"><span
                                                                    class="page-link">{{ $element }}</span></li>
                                                        @endif
                                                        {{-- Array Of Links --}}
                                                        @if (is_array($element))
                                                            @foreach ($element as $page => $url)
                                                                @if ($page == $organizations->currentPage())
                                                                    <li class="page-item active"
                                                                        aria-current="page"><span
                                                                            class="page-link">{{ $page }}</span></li>
                                                                @else
                                                                    <li class="page-item"><a class="page-link"
                                                                                             href="{{ $url }}">{{ $page }}</a>
                                                                    </li>
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    @endforeach
                                                    {{-- Next Page Link --}}
                                                    @if ($organizations->hasMorePages())
                                                        <li class="page-item">
                                                            <a class="page-link"
                                                               href="{{ $organizations->nextPageUrl() }}"
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
                                                    @if ($organizations->hasMorePages())
                                                        <li class="page-item">
                                                            <a class="page-link page-link-last"
                                                               href="{{ $organizations->url($organizations->lastPage()) }}"
                                                               rel="last">Last <i
                                                                    class="la la-long-arrow-right ml-1"></i></a>
                                                        </li>
                                                    @else
                                                        <li class="page-item disabled" aria-disabled="true">
                                                            <a class="page-link page-link-last" href="#"
                                                               aria-hidden="true">Last
                                                                <i class="la la-long-arrow-right ml-1"
                                                                    aria-hidden="true"></i></a>
                                                        </li>
                                                    @endif
                                                </ul>
                                            </nav>
                                        </div><!-- end section-pagination -->
                                    </div>
                                </div><!-- end col-lg-12 -->
                            </div><!-- end row -->
                        @endif
                    </div><!-- end col-lg-8 -->
                    <div class="col-lg-4">
                        <div class="sidebar mb-0">
                            <div class="sidebar-widget">
                                <h3 class="widget-title">Search</h3>
                                <div class="stroke-shape mb-4"></div>
                                <form action="#" class="form-box">
                                    <div class="form-group">
                                        <span class="la la-search form-icon"></span>
                                        <input class="form-control" type="search"
                                               placeholder="What are you looking for?">
                                    </div>
                                    <div class="form-group user-chosen-select-container">
                                        <select class="user-chosen-select">
                                            <option value="0">Select a Location</option>
                                            <option value="AF">Afghanistan</option>
                                            <option value="AX">Åland Islands</option>
                                        </select>
                                    </div><!-- end form-group -->
                                    <div class="form-group user-chosen-select-container">
                                        <select class="user-chosen-select">
                                            <option value="0">Select a category</option>
                                            <option value="1">All Category</option>
                                            <option value="2">Shops</option>
                                            <option value="3">Hotels</option>
                                            <option value="4">Foods & Restaurants</option>
                                        </select>
                                    </div><!-- end form-group -->
                                    <div class="form-group user-chosen-select-container">
                                        <select class="user-chosen-select">
                                            <option value="0">Price Range</option>
                                            <option value="1">$ Inexpensive</option>
                                            <option value="2">$$ Moderate</option>
                                            <option value="3">$$$ Pricey</option>
                                            <option value="4">$$$$ Ultra High</option>
                                        </select>
                                    </div><!-- end form-group -->
                                    <div class="btn-box">
                                        <button type="submit" class="theme-btn gradient-btn border-0 w-100 mt-3">
                                            <i class="la la-search mr-2"></i>Search Now
                                        </button>
                                    </div><!-- end btn-box -->
                                </form>
                            </div><!-- end sidebar-widget -->
                            <div class="sidebar-widget">
                                <h3 class="widget-title">Filter by Category</h3>
                                <div class="stroke-shape mb-4"></div>
                                <div class="category-list">
                                    <a href="#" class="generic-img-card d-block hover-y overflow-hidden mb-3">
                                        <img src="images/img-loading.png" data-src="images/generic-small-img.jpg"
                                             alt="image" class="generic-img-card-img lazy">
                                        <div
                                            class="generic-img-card-content d-flex align-items-center justify-content-between">
                                            <span class="badge">Restaurants</span>
                                            <span class="generic-img-card-counter">238</span>
                                        </div>
                                    </a>
                                    <a href="#" class="generic-img-card d-block hover-y overflow-hidden mb-3">
                                        <img src="images/img-loading.png" data-src="images/generic-small-img-2.jpg"
                                             alt="image" class="generic-img-card-img lazy">
                                        <div
                                            class="generic-img-card-content d-flex align-items-center justify-content-between">
                                            <span class="badge">Food</span>
                                            <span class="generic-img-card-counter">111</span>
                                        </div>
                                    </a>
                                    <a href="#" class="generic-img-card d-block hover-y overflow-hidden mb-3">
                                        <img src="images/img-loading.png" data-src="images/generic-small-img-3.jpg"
                                             alt="image" class="generic-img-card-img lazy">
                                        <div
                                            class="generic-img-card-content d-flex align-items-center justify-content-between">
                                            <span class="badge">Hotel</span>
                                            <span class="generic-img-card-counter">222</span>
                                        </div>
                                    </a>
                                    <a href="#" class="generic-img-card d-block hover-y overflow-hidden mb-3">
                                        <img src="images/img-loading.png" data-src="images/generic-small-img-4.jpg"
                                             alt="image" class="generic-img-card-img lazy">
                                        <div
                                            class="generic-img-card-content d-flex align-items-center justify-content-between">
                                            <span class="badge">Events</span>
                                            <span class="generic-img-card-counter">123</span>
                                        </div>
                                    </a>
                                    <div class="collapse collapse-content" id="showMoreOptionCollapse2">
                                        <a href="#" class="generic-img-card d-block hover-y overflow-hidden mb-3">
                                            <img src="images/img-loading.png" data-src="images/generic-small-img-5.jpg"
                                                 alt="image" class="generic-img-card-img lazy">
                                            <div
                                                class="generic-img-card-content d-flex align-items-center justify-content-between">
                                                <span class="badge">Shopping</span>
                                                <span class="generic-img-card-counter">321</span>
                                            </div>
                                        </a>
                                        <a href="#" class="generic-img-card d-block hover-y overflow-hidden mb-3">
                                            <img src="images/img-loading.png" data-src="images/generic-small-img-6.jpg"
                                                 alt="image" class="generic-img-card-img lazy">
                                            <div
                                                class="generic-img-card-content d-flex align-items-center justify-content-between">
                                                <span class="badge">Travel</span>
                                                <span class="generic-img-card-counter">12</span>
                                            </div>
                                        </a>
                                        <a href="#" class="generic-img-card d-block hover-y overflow-hidden mb-3">
                                            <img src="images/img-loading.png" data-src="images/generic-small-img-7.jpg"
                                                 alt="image" class="generic-img-card-img lazy">
                                            <div
                                                class="generic-img-card-content d-flex align-items-center justify-content-between">
                                                <span class="badge">Jobs</span>
                                                <span class="generic-img-card-counter">133</span>
                                            </div>
                                        </a>
                                    </div>
                                    <a class="collapse-btn" data-toggle="collapse" href="#showMoreOptionCollapse2"
                                       role="button" aria-expanded="false" aria-controls="showMoreOptionCollapse2">
                                        <span class="collapse-btn-hide">Show More <i class="la la-plus ml-1"></i></span>
                                        <span class="collapse-btn-show">Show Less <i
                                                class="la la-minus ml-1"></i></span>
                                    </a>
                                </div>
                            </div><!-- end sidebar-widget -->
                        </div><!-- end sidebar -->
                    </div><!-- end col-lg-4 -->
                </div><!-- end row -->
            @else
                <div class="row">
                    <div class="col-lg-12">
                        <div
                            class="filter-bar d-flex flex-wrap margin-bottom-30px">
                            <p class="result-text font-weight-medium">No Business Found</p>
                        </div><!-- end filter-bar -->
                    </div><!-- end col-lg-12 -->
                </div>
            @endif
        </div><!-- end container -->
    </section><!-- end card-area -->
@endsection
