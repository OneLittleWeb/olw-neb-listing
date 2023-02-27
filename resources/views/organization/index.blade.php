@extends('layouts.master')
@section('title', "Nebraskalisting")
@section('meta_description', "add")
@section('meta_keywords',"add")
@section('content')
    <section class="card-area section-padding">
        <div class="container pt-5">
            <div class="row">
                <div class="col-lg-12">
                    <div
                        class="filter-bar d-flex flex-wrap justify-content-between align-items-center margin-bottom-30px">
                        <p class="result-text font-weight-medium">{{ "Showing " . $organizations->firstItem() . " to " . $organizations->lastItem() . " of " . $organizations->total() . " entries" }}</p>
                    </div><!-- end filter-bar -->
                </div><!-- end col-lg-12 -->
                <div class="col-lg-8">
                    <div class="row">
                        @forelse($organizations as $organization)
                            <div class="col-lg-12">
                                <div class="card-item card-item-list">
                                    <div class="card-image">
                                        <a href="#" class="d-block">
                                            <img src="{{ asset('images/' . $organization->organization_head_photo_file) }}" data-src="{{ asset('images/' . $organization->organization_head_photo_file) }}"
                                                 class="card__img lazy" alt="">
                                        </a>
                                    </div>
                                    <div class="card-content">
                                        <h4 class="card-title">
                                            <a href="#">{{ $organization->organization_name }}</a>
                                        </h4>
                                        <p class="card-sub"><a href="#"><i
                                                    class="la la-map-marker mr-1 text-color-2"></i>{{ $organization->organization_address }}
                                            </a></p>
                                        <ul class="listing-meta d-flex align-items-center">
                                            <li class="d-flex align-items-center">
                                                <span class="rate flex-shrink-0">{{ $organization->rate_stars }}</span>
                                                <span
                                                    class="rate-text">{{ $organization->reviews_total_count }} Ratings</span>
                                            </li>
                                            <li>
                                                <span class="price-range" data-toggle="tooltip" data-placement="top"
                                                      title="Pricey">
                                                    <strong class="font-weight-medium">$</strong>
                                                </span>
                                            </li>
                                            <li class="d-flex align-items-center">
                                                <i class="{{ $organization->category->icon }}"></i>&nbsp;&nbsp;<a
                                                    href="#"
                                                    class="listing-cat-link">{{ $organization->organization_category }}</a>
                                            </li>
                                        </ul>
                                        <ul class="info-list padding-top-20px">
                                            <li><span class="la la-link icon"></span>
                                                <a href="{{ 'https://' . $organization->organization_website }}"
                                                   target="_blank"> {{ $organization->organization_website }}</a>
                                            </li>
                                            <li><span class="la la-phone icon"></span>
                                                <a href="tel:{{ $organization->organization_phone_number }}">{{ $organization->organization_phone_number }}</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div><!-- end card-item -->
                            </div><!-- end col-lg-12 -->
                        @empty
                            <p>No organizations found</p>
                        @endforelse
                    </div><!-- end row -->
                    <div class="row">
                        <div class="col-lg-12 pt-3 text-center">
                            <div class="pagination-wrapper d-inline-block">
                                <div class="section-pagination">
                                    <nav aria-label="Page navigation">
                                        <ul class="pagination flex-wrap justify-content-center">
                                            <li class="page-item">
                                                <a class="page-link page-link-first" href="#"><i class="la la-long-arrow-left mr-1"></i> First</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#" aria-label="Previous">
                                                    <span aria-hidden="true"><i class="la la-angle-left"></i></span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link page-link-active" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item"><a class="page-link" href="#">4</a></li>
                                            <li class="page-item">
                                                <a class="page-link" href="#" aria-label="Next">
                                                    <span aria-hidden="true"><i class="la la-angle-right"></i></span>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link page-link-last" href="#">Last <i class="la la-long-arrow-right ml-1"></i></a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div><!-- end section-pagination -->
                            </div>
                        </div><!-- end col-lg-12 -->
                    </div><!-- end row -->
                </div><!-- end col-lg-8 -->
                <div class="col-lg-4">
                    <div class="sidebar mb-0">
                        <div class="sidebar-widget">
                            <h3 class="widget-title">Search</h3>
                            <div class="stroke-shape mb-4"></div>
                            <form action="#" class="form-box">
                                <div class="form-group">
                                    <span class="la la-search form-icon"></span>
                                    <input class="form-control" type="search" placeholder="What are you looking for?">
                                </div>
                                <div class="form-group user-chosen-select-container">
                                    <select class="user-chosen-select">
                                        <option value="0">Select a Location</option>
                                        <option value="AF">Afghanistan</option>
                                        <option value="AX">Åland Islands</option>
                                        <option value="AL">Albania</option>
                                        <option value="DZ">Algeria</option>
                                        <option value="AD">Andorra</option>
                                        <option value="AO">Angola</option>
                                        <option value="AI">Anguilla</option>
                                        <option value="AQ">Antarctica</option>
                                        <option value="AG">Antigua &amp; Barbuda</option>
                                    </select>
                                </div><!-- end form-group -->
                                <div class="form-group user-chosen-select-container">
                                    <select class="user-chosen-select">
                                        <option value="0">Select a category</option>
                                        <option value="1">All Category</option>
                                        <option value="2">Shops</option>
                                        <option value="3">Hotels</option>
                                        <option value="4">Foods & Restaurants</option>
                                        <option value="5">Fitness</option>
                                        <option value="6">Travel</option>
                                        <option value="7">Salons</option>
                                        <option value="8">Event</option>
                                        <option value="9">Business</option>
                                        <option value="10">Jobs</option>
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
                                    <a href="#" class="btn-gray btn-gray-lg open-filter-btn w-100"><i
                                            class="la la-clock mr-2"></i>Now Open</a>
                                    <button type="submit" class="theme-btn gradient-btn border-0 w-100 mt-3">
                                        <i class="la la-search mr-2"></i>Search Now
                                    </button>
                                </div><!-- end btn-box -->
                            </form>
                        </div><!-- end sidebar-widget -->
                        <div class="sidebar-widget">
                            <h3 class="widget-title">Filter by Features</h3>
                            <div class="stroke-shape mb-4"></div>
                            <div class="checkbox-wrap">
                                <div class="custom-checkbox">
                                    <input type="checkbox" id="elevatorInBuildingChb2">
                                    <label for="elevatorInBuildingChb2">Elevator in building</label>
                                </div><!-- end custom-checkbox -->
                                <div class="custom-checkbox">
                                    <input type="checkbox" id="goodForKidsChb">
                                    <label for="goodForKidsChb">Good for Kids</label>
                                </div><!-- end custom-checkbox -->
                                <div class="custom-checkbox">
                                    <input type="checkbox" id="goodForGroupsChb">
                                    <label for="goodForGroupsChb">Good for Groups</label>
                                </div><!-- end custom-checkbox -->
                                <div class="custom-checkbox">
                                    <input type="checkbox" id="likedBy-20-SomethingsChb">
                                    <label for="likedBy-20-SomethingsChb">Liked by 20-somethings</label>
                                </div><!-- end custom-checkbox -->
                                <div class="custom-checkbox">
                                    <input type="checkbox" id="likedBy-30-SomethingsChb">
                                    <label for="likedBy-30-SomethingsChb">Liked by 30-somethings</label>
                                </div><!-- end custom-checkbox -->
                                <div class="custom-checkbox">
                                    <input type="checkbox" id="likedBy-40-SomethingsChb">
                                    <label for="likedBy-40-SomethingsChb">Liked by 40-somethings</label>
                                </div><!-- end custom-checkbox -->
                                <div class="custom-checkbox">
                                    <input type="checkbox" id="wirelessInternetChb">
                                    <label for="wirelessInternetChb">Wireless Internet</label>
                                </div><!-- end custom-checkbox -->
                                <div class="collapse collapse-content" id="showMoreOptionCollapse">
                                    <div class="custom-checkbox">
                                        <input type="checkbox" id="friendlyWorkspaceChb2">
                                        <label for="friendlyWorkspaceChb2">Friendly workspace</label>
                                    </div><!-- end custom-checkbox -->
                                    <div class="custom-checkbox">
                                        <input type="checkbox" id="instantBookChb2">
                                        <label for="instantBookChb2">Instant Book</label>
                                    </div><!-- end custom-checkbox -->
                                    <div class="custom-checkbox">
                                        <input type="checkbox" id="freeParkingChb2">
                                        <label for="freeParkingChb2">Free parking</label>
                                    </div><!-- end custom-checkbox -->
                                    <div class="custom-checkbox">
                                        <input type="checkbox" id="smokingAllowedChb2">
                                        <label for="smokingAllowedChb2">Smoking allowed</label>
                                    </div><!-- end custom-checkbox -->
                                    <div class="custom-checkbox">
                                        <input type="checkbox" id="eventsChb">
                                        <label for="eventsChb">Events</label>
                                    </div><!-- end custom-checkbox -->
                                    <div class="custom-checkbox">
                                        <input type="checkbox" id="wheelchairAccessibleChb2">
                                        <label for="wheelchairAccessibleChb2">Wheelchair accessible</label>
                                    </div><!-- end custom-checkbox -->
                                    <div class="custom-checkbox">
                                        <input type="checkbox" id="alarmSystemChb">
                                        <label for="alarmSystemChb"> Alarm system</label>
                                    </div><!-- end custom-checkbox -->
                                    <div class="custom-checkbox">
                                        <input type="checkbox" id="electricityChb">
                                        <label for="electricityChb">Electricity</label>
                                    </div><!-- end custom-checkbox -->
                                    <div class="custom-checkbox">
                                        <input type="checkbox" id="attachedGarageChb">
                                        <label for="attachedGarageChb">Attached garage</label>
                                    </div><!-- end custom-checkbox -->
                                    <div class="custom-checkbox">
                                        <input type="checkbox" id="securityCamerasChb">
                                        <label for="securityCamerasChb">Security cameras</label>
                                    </div><!-- end custom-checkbox -->
                                </div>
                                <a class="collapse-btn" data-toggle="collapse" href="#showMoreOptionCollapse"
                                   role="button" aria-expanded="false" aria-controls="showMoreOptionCollapse">
                                    <span class="collapse-btn-hide">Show More <i class="la la-plus ml-1"></i></span>
                                    <span class="collapse-btn-show">Show Less <i class="la la-minus ml-1"></i></span>
                                </a>
                            </div>
                        </div><!-- end sidebar-widget -->
                        <div class="sidebar-widget">
                            <h3 class="widget-title">Filter by Neighborhoods</h3>
                            <div class="stroke-shape mb-4"></div>
                            <div class="checkbox-wrap">
                                <div class="custom-checkbox">
                                    <input type="checkbox" id="outerSunsetChb">
                                    <label for="outerSunsetChb">Outer Sunset</label>
                                </div><!-- end custom-checkbox -->
                                <div class="custom-checkbox">
                                    <input type="checkbox" id="forestHillChb">
                                    <label for="forestHillChb">Forest Hill</label>
                                </div><!-- end custom-checkbox -->
                                <div class="custom-checkbox">
                                    <input type="checkbox" id="stonestownChb">
                                    <label for="stonestownChb">Stonestown</label>
                                </div><!-- end custom-checkbox -->
                                <div class="custom-checkbox">
                                    <input type="checkbox" id="innerRichmondChb">
                                    <label for="innerRichmondChb">Inner Richmond</label>
                                </div><!-- end custom-checkbox -->
                                <div class="custom-checkbox">
                                    <input type="checkbox" id="alamoSquareChb">
                                    <label for="alamoSquareChb">Alamo Square</label>
                                </div><!-- end custom-checkbox -->
                                <div class="custom-checkbox">
                                    <input type="checkbox" id="fisherman'sWharfChb">
                                    <label for="fisherman'sWharfChb">Fisherman's Wharf</label>
                                </div><!-- end custom-checkbox -->
                                <div class="custom-checkbox">
                                    <input type="checkbox" id="glenParkChb">
                                    <label for="glenParkChb">Glen Park</label>
                                </div><!-- end custom-checkbox -->
                                <div class="custom-checkbox">
                                    <input type="checkbox" id="civicCenterChb">
                                    <label for="civicCenterChb">Civic Center</label>
                                </div><!-- end custom-checkbox -->
                                <div class="collapse collapse-content" id="showMoreOptionCollapse3">
                                    <div class="custom-checkbox">
                                        <input type="checkbox" id="coleValleyChb">
                                        <label for="coleValleyChb">Cole Valley</label>
                                    </div><!-- end custom-checkbox -->
                                    <div class="custom-checkbox">
                                        <input type="checkbox" id="crocker-AmazonChb">
                                        <label for="crocker-AmazonChb">Crocker-Amazon</label>
                                    </div><!-- end custom-checkbox -->
                                    <div class="custom-checkbox">
                                        <input type="checkbox" id="diamondHeightsChb">
                                        <label for="diamondHeightsChb">Diamond Heights</label>
                                    </div><!-- end custom-checkbox -->
                                    <div class="custom-checkbox">
                                        <input type="checkbox" id="duboceTriangleChb">
                                        <label for="duboceTriangleChb">Duboce Triangle</label>
                                    </div><!-- end custom-checkbox -->
                                    <div class="custom-checkbox">
                                        <input type="checkbox" id="fillmoreChb">
                                        <label for="fillmoreChb">Fillmore</label>
                                    </div><!-- end custom-checkbox -->
                                    <div class="custom-checkbox">
                                        <input type="checkbox" id="japantownChb">
                                        <label for="japantownChb">Japantown</label>
                                    </div><!-- end custom-checkbox -->
                                    <div class="custom-checkbox">
                                        <input type="checkbox" id="westwoodParkChb">
                                        <label for="westwoodParkChb">Westwood Park</label>
                                    </div><!-- end custom-checkbox -->
                                </div>
                                <a class="collapse-btn" data-toggle="collapse" href="#showMoreOptionCollapse3"
                                   role="button" aria-expanded="false" aria-controls="showMoreOptionCollapse3">
                                    <span class="collapse-btn-hide">Show More <i class="la la-plus ml-1"></i></span>
                                    <span class="collapse-btn-show">Show Less <i class="la la-minus ml-1"></i></span>
                                </a>
                            </div>
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
                                    <span class="collapse-btn-show">Show Less <i class="la la-minus ml-1"></i></span>
                                </a>
                            </div>
                        </div><!-- end sidebar-widget -->
                        <div class="sidebar-widget">
                            <h3 class="widget-title">Filter by Price</h3>
                            <div class="stroke-shape mb-4"></div>
                            <form action="#" class="form-box price-range-wrap price-range-wrap-2">
                                <div class="input-box d-flex align-items-center">
                                    <div class="form-group mb-0">
                                        <span class="form-icon dollar-icon text-color">$</span>
                                        <input class="form-control form-control-sm padding-left-25px" type="text"
                                               name="text" placeholder="5">
                                    </div>
                                    <span class="px-2">-</span>
                                    <div class="form-group mb-0">
                                        <span class="form-icon dollar-icon text-color">$</span>
                                        <input class="form-control form-control-sm padding-left-25px" type="text"
                                               name="text" placeholder="29">
                                    </div>
                                    <button class="btn-gray ml-3">Apply</button>
                                </div>
                            </form>
                        </div><!-- end sidebar-widget -->
                        <div class="sidebar-widget">
                            <div class="btn-box">
                                <button type="submit" class="theme-btn gradient-btn w-100 border-0">
                                    Apply Filter <i class="la la-arrow-right ml-1"></i>
                                </button>
                                <button type="submit" class="btn-gray btn-gray-lg mt-3 w-100">
                                    <i class="la la-redo-alt mr-1"></i> Reset Filters
                                </button>
                            </div>
                        </div><!-- end sidebar-widget -->
                    </div><!-- end sidebar -->
                </div><!-- end col-lg-4 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end card-area -->
@endsection
