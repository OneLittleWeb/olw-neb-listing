@extends('admin.master_admin')
@section('title', 'Add New Organizations')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
@endsection
@section('content')
    <div class="container-fluid dashboard-inner-body-container">
        <div class="breadcrumb-content d-sm-flex align-items-center justify-content-between mb-4">
            <div class="section-heading">
                <h2 class="sec__title font-size-24 mb-0">Howdy, {{auth()->user()->name ?? "Guest"}}</h2>
            </div>
            <ul class="list-items bread-list bread-list-2">
                <li><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li>Organizations</li>
            </ul>
        </div><!-- end breadcrumb-content -->
        <div class="row">
            <div class="col-md-12">
                <div class="block-card dashboard-card mb-4 px-0">
                    <div
                        class="block-card-header d-flex flex-wrap align-items-center justify-content-between px-4 border-bottom-0 pb-0">
                        <h2 class="widget-title pb-0">Add New Organizations</h2>
                        <a href="{{route('admin.organization.index')}}" class="btn btn-info">View All Organizations<i
                                class="la la-plus-circle ml-1"></i></a>
                    </div>
                    <div class="block-card-body">
                        <div class="block-card mb-4">
                            <div class="block-card-header">
                                <h2 class="widget-title">General Information</h2>
                                <div class="stroke-shape"></div>
                            </div><!-- end block-card-header -->
                            <div class="block-card-body">
                                <form method="post" class="form-box row">
                                    <div class="col-lg-12">
                                        <div class="input-box">
                                            <label class="label-text d-flex align-items-center ">Listing Title
                                                <i class="la la-question tip ml-1" data-toggle="tooltip"
                                                   data-placement="top"
                                                   title="Put your listing title here and tell the name of your business to the world."></i>
                                            </label>
                                            <div class="form-group">
                                                <span class="la la-briefcase form-icon"></span>
                                                <input class="form-control" type="text" name="text"
                                                       placeholder="Example: Super Duper Burgers">
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-12 -->
                                    <div class="col-md-6">
                                        <div class="input-box">
                                            <label class="label-text">Category</label>
                                            <div class="form-group user-chosen-select-container">
                                                <select class="user-chosen-select">
                                                    @foreach($categories as $category)
                                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div><!-- end form-group -->
                                        </div>
                                    </div><!-- end col-lg-12 -->


                                    <div class="col-lg-12">
                                        <div class="input-box">
                                            <label class="label-text">Description</label>
                                            <div class="form-group">
                                                        <textarea class="message-control form-control user-text-editor"
                                                                  name="message"></textarea>
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-12 -->
                                </form>
                            </div><!-- end block-card-body -->
                        </div><!-- end block-card -->
                        <div class="block-card mb-4">
                            <div class="block-card-header">
                                <h2 class="widget-title">Location/Contact</h2>
                                <div class="stroke-shape"></div>
                            </div><!-- end block-card-header -->
                            <div class="block-card-body">
                                <form method="post" class="form-box row">
                                    <div class="col-md-12">
                                        <div class="input-box">
                                            <label class="location">Enter Location: (Autocomplete)</label>
                                            <div class="form-group">
                                                <span class="la la-map form-icon"></span>
                                                <input class="form-control" id="searchTextField" type="text"
                                                       placeholder="ex. new york">
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-6 -->
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">Longitude</label>
                                            <div class="form-group">
                                                <span class="la la-map form-icon"></span>
                                                <input class="form-control" id="longitude" type="text"
                                                       placeholder="Map Longitude">
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-6 -->
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">Latitude</label>
                                            <div class="form-group">
                                                <span class="la la-map form-icon"></span>
                                                <input class="form-control" id="latitude" type="text"
                                                       placeholder="Map Latitude">
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-6 -->
                                    <div class="col-lg-12">
                                        <div class="input-box">
                                            <div class="form-group map-container" id="result">
                                                <iframe
                                                    width="1200"
                                                    height="450"
                                                    frameborder="0"
                                                    src="https://maps.google.com/maps?q=10.305385,77.923029&hl=es;z=14&output=embed"></iframe>
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-12 -->

                                    <div class="col-md-6">
                                        <div class="input-box">
                                            <label class="label-text">Add Custom Address</label>
                                            <div class="form-group">
                                                <span class="la la-map-marker form-icon"></span>
                                                <input class="form-control" type="text" id="address" name="address"
                                                       placeholder="Add address here">
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-12 -->
                                     <div class="col-md-6">
                                        <div class="input-box">
                                            <label class="label-text d-flex align-items-center">Web
                                                Address</label>
                                            <div class="form-group">
                                                <span class="la la-globe form-icon"></span>
                                                <input class="form-control" type="text" id="website" name="website"
                                                       placeholder="http://www.companyaddress.com">
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-12 -->
                                    <div class="col-lg-12">
                                        <div class="input-box">
                                            <label class="label-text">Iframe</label>
                                            <div class="form-group">
                                                <textarea class="form-control" id="code" name="iframe"></textarea>
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-6 -->
                                    <div class="col-lg-4">
                                        <div class="input-box">
                                            <label class="label-text d-flex align-items-center">City
                                                <i class="la la-question tip ml-1" data-toggle="tooltip"
                                                   data-placement="top"
                                                   title="Provide your city name for your business to show up on the map and your customer can get direction. "></i>
                                            </label>
                                            <div class="form-group">
                                                 <span class="la la-city form-icon"></span>
                                                <input type="text" name="city" id="city" placeholder="ex. New York" class="form-control">
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-6 -->
                                    <div class="col-lg-4">
                                        <div class="input-box">
                                            <label class="label-text">Phone</label>
                                            <div class="form-group">
                                                <span class="la la-phone form-icon"></span>
                                                <input class="form-control" type="text" id="phone" name="phone"
                                                       placeholder="111-111-1234">
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-6 -->
                                     <div class="col-lg-4">
                                        <div class="input-box">
                                            <label class="label-text">Plus Code</label>
                                            <div class="form-group">
                                                <span class="la la-phone form-icon"></span>
                                                <input class="form-control" type="text" id="plus_code" name="plus_code"
                                                       placeholder="6VF7+R6 Omaha, NE, USA">
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-6 -->
                                </form>
                            </div><!-- end block-card-body -->
                        </div><!-- end block-card -->
                        <div class="block-card mb-4">
                            <div class="block-card-header">
                                <h2 class="widget-title">Opening Hours</h2>
                                <div class="stroke-shape"></div>
                            </div><!-- end block-card-header -->
                            <div class="block-card-body">
                                <div class="form-box table-responsive">
                                    <table class="table time-list mb-0">
                                        <thead>
                                        <tr>
                                            <th class="w-50">Days</th>
                                            <th>Open</th>
                                            <th>Close</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr class="business-opening-wrap">
                                            <td class="business-day">Monday</td>
                                            <td class="user-chosen-select-container">
                                                <select class="user-chosen-select" name="monday_open" id="monday_open">
                                                    <option value="closed">Closed</option>
                                                    <option value="open-24-hours">Open 24 Hours</option>
                                                    <option value="12:15 am">12:15 am</option>
                                                    <option value="12:30 am">12:30 am</option>
                                                    <option value="12:45 am">12:45 am</option>
                                                    <option value="01:00 am">01:00 am</option>
                                                    <option value="01:15 am">01:15 am</option>
                                                    <option value="01:30 am">01:30 am</option>
                                                    <option value="01:45 am">01:45 am</option>
                                                    <option value="02:00 am">02:00 am</option>
                                                    <option value="02:15 am">02:15 am</option>
                                                    <option value="02:30 am">02:30 am</option>
                                                    <option value="02:45 am">02:45 am</option>
                                                    <option value="03:00 am">03:00 am</option>
                                                    <option value="03:15 am">03:15 am</option>
                                                    <option value="03:30 am">03:30 am</option>
                                                    <option value="03:45 am">03:45 am</option>
                                                    <option value="04:00 am">04:00 am</option>
                                                    <option value="04:15 am">04:15 am</option>
                                                    <option value="04:30 am">04:30 am</option>
                                                    <option value="04:45 am">04:45 am</option>
                                                    <option value="05:00 am">05:00 am</option>
                                                    <option value="05:15 am">05:15 am</option>
                                                    <option value="05:30 am">05:30 am</option>
                                                    <option value="05:45 am">05:45 am</option>
                                                    <option value="06:00 am">06:00 am</option>
                                                    <option value="06:15 am">06:15 am</option>
                                                    <option value="06:30 am">06:30 am</option>
                                                    <option value="06:45 am">06:45 am</option>
                                                    <option value="07:00 am">07:00 am</option>
                                                    <option value="07:15 am">07:15 am</option>
                                                    <option value="07:30 am">07:30 am</option>
                                                    <option value="07:45 am">07:45 am</option>
                                                    <option value="08:00 am">08:00 am</option>
                                                    <option value="08:15 am">08:15 am</option>
                                                    <option value="08:30 am">08:30 am</option>
                                                    <option value="08:45 am">08:45 am</option>
                                                    <option value="09:00 am">09:00 am</option>
                                                    <option value="09:15 am">09:15 am</option>
                                                    <option value="09:30 am">09:30 am</option>
                                                    <option value="09:45 am">09:45 am</option>
                                                    <option value="10:00 am">10:00 am</option>
                                                    <option value="10:15 am">10:15 am</option>
                                                    <option value="10:30 am">10:30 am</option>
                                                    <option value="10:45 am">10:45 am</option>
                                                    <option value="11:00 am">11:00 am</option>
                                                    <option value="11:15 am">11:15 am</option>
                                                    <option value="11:30 am">11:30 am</option>
                                                    <option value="11:45 am">11:45 am</option>
                                                    <option value="12:00 pm">12:00 pm</option>
                                                    <option value="12:15 pm">12:15 pm</option>
                                                    <option value="12:30 pm">12:30 pm</option>
                                                    <option value="12:45 pm">12:45 pm</option>
                                                    <option value="01:00 pm">01:00 pm</option>
                                                    <option value="01:15 pm">01:15 pm</option>
                                                    <option value="01:30 pm">01:30 pm</option>
                                                    <option value="01:45 pm">01:45 pm</option>
                                                    <option value="02:00 pm">02:00 pm</option>
                                                    <option value="02:15 pm">02:15 pm</option>
                                                    <option value="02:30 pm">02:30 pm</option>
                                                    <option value="02:45 pm">02:45 pm</option>
                                                    <option value="03:00 pm">03:00 pm</option>
                                                    <option value="03:15 pm">03:15 pm</option>
                                                    <option value="03:30 pm">03:30 pm</option>
                                                    <option value="03:45 pm">03:45 pm</option>
                                                    <option value="04:00 pm">04:00 pm</option>
                                                    <option value="04:15 pm">04:15 pm</option>
                                                    <option value="04:30 pm">04:30 pm</option>
                                                    <option value="04:45 pm">04:45 pm</option>
                                                    <option value="05:00 pm">05:00 pm</option>
                                                    <option value="05:15 pm">05:15 pm</option>
                                                    <option value="05:30 pm">05:30 pm</option>
                                                    <option value="05:45 pm">05:45 pm</option>
                                                    <option value="06:00 pm">06:00 pm</option>
                                                    <option value="06:15 pm">06:15 pm</option>
                                                    <option value="06:30 pm">06:30 pm</option>
                                                    <option value="06:45 pm">06:45 pm</option>
                                                    <option value="07:00 pm">07:00 pm</option>
                                                    <option value="07:15 pm">07:15 pm</option>
                                                    <option value="07:30 pm">07:30 pm</option>
                                                    <option value="07:45 pm">07:45 pm</option>
                                                    <option value="08:00 pm">08:00 pm</option>
                                                    <option value="08:15 pm">08:15 pm</option>
                                                    <option value="08:30 pm">08:30 pm</option>
                                                    <option value="08:45 pm">08:45 pm</option>
                                                    <option value="09:00 pm">09:00 pm</option>
                                                    <option value="09:15 pm">09:15 pm</option>
                                                    <option value="09:30 pm">09:30 pm</option>
                                                    <option value="09:45 pm">09:45 pm</option>
                                                    <option value="10:00 pm">10:00 pm</option>
                                                    <option value="10:15 pm">10:15 pm</option>
                                                    <option value="10:30 pm">10:30 pm</option>
                                                    <option value="10:45 pm">10:45 pm</option>
                                                    <option value="11:00 pm">11:00 pm</option>
                                                    <option value="11:15 pm">11:15 pm</option>
                                                    <option value="11:30 pm">11:30 pm</option>
                                                    <option value="11:45 pm">11:45 pm</option>
                                                    <option value="12:00 am">12:00 am</option>
                                                </select>
                                            </td><!-- .business-hour-open -->
                                            <td class="user-chosen-select-container">
                                                <select class="user-chosen-select" name="monday_closed" id="monday_closed">
                                                    <option value="closed">Closed</option>
                                                    <option value="open-24-hours">Open 24 Hours</option>
                                                    <option value="12:15 am">12:15 am</option>
                                                    <option value="12:30 am">12:30 am</option>
                                                    <option value="12:45 am">12:45 am</option>
                                                    <option value="01:00 am">01:00 am</option>
                                                    <option value="01:15 am">01:15 am</option>
                                                    <option value="01:30 am">01:30 am</option>
                                                    <option value="01:45 am">01:45 am</option>
                                                    <option value="02:00 am">02:00 am</option>
                                                    <option value="02:15 am">02:15 am</option>
                                                    <option value="02:30 am">02:30 am</option>
                                                    <option value="02:45 am">02:45 am</option>
                                                    <option value="03:00 am">03:00 am</option>
                                                    <option value="03:15 am">03:15 am</option>
                                                    <option value="03:30 am">03:30 am</option>
                                                    <option value="03:45 am">03:45 am</option>
                                                    <option value="04:00 am">04:00 am</option>
                                                    <option value="04:15 am">04:15 am</option>
                                                    <option value="04:30 am">04:30 am</option>
                                                    <option value="04:45 am">04:45 am</option>
                                                    <option value="05:00 am">05:00 am</option>
                                                    <option value="05:15 am">05:15 am</option>
                                                    <option value="05:30 am">05:30 am</option>
                                                    <option value="05:45 am">05:45 am</option>
                                                    <option value="06:00 am">06:00 am</option>
                                                    <option value="06:15 am">06:15 am</option>
                                                    <option value="06:30 am">06:30 am</option>
                                                    <option value="06:45 am">06:45 am</option>
                                                    <option value="07:00 am">07:00 am</option>
                                                    <option value="07:15 am">07:15 am</option>
                                                    <option value="07:30 am">07:30 am</option>
                                                    <option value="07:45 am">07:45 am</option>
                                                    <option value="08:00 am">08:00 am</option>
                                                    <option value="08:15 am">08:15 am</option>
                                                    <option value="08:30 am">08:30 am</option>
                                                    <option value="08:45 am">08:45 am</option>
                                                    <option value="09:00 am">09:00 am</option>
                                                    <option value="09:15 am">09:15 am</option>
                                                    <option value="09:30 am">09:30 am</option>
                                                    <option value="09:45 am">09:45 am</option>
                                                    <option value="10:00 am">10:00 am</option>
                                                    <option value="10:15 am">10:15 am</option>
                                                    <option value="10:30 am">10:30 am</option>
                                                    <option value="10:45 am">10:45 am</option>
                                                    <option value="11:00 am">11:00 am</option>
                                                    <option value="11:15 am">11:15 am</option>
                                                    <option value="11:30 am">11:30 am</option>
                                                    <option value="11:45 am">11:45 am</option>
                                                    <option value="12:00 pm">12:00 pm</option>
                                                    <option value="12:15 pm">12:15 pm</option>
                                                    <option value="12:30 pm">12:30 pm</option>
                                                    <option value="12:45 pm">12:45 pm</option>
                                                    <option value="01:00 pm">01:00 pm</option>
                                                    <option value="01:15 pm">01:15 pm</option>
                                                    <option value="01:30 pm">01:30 pm</option>
                                                    <option value="01:45 pm">01:45 pm</option>
                                                    <option value="02:00 pm">02:00 pm</option>
                                                    <option value="02:15 pm">02:15 pm</option>
                                                    <option value="02:30 pm">02:30 pm</option>
                                                    <option value="02:45 pm">02:45 pm</option>
                                                    <option value="03:00 pm">03:00 pm</option>
                                                    <option value="03:15 pm">03:15 pm</option>
                                                    <option value="03:30 pm">03:30 pm</option>
                                                    <option value="03:45 pm">03:45 pm</option>
                                                    <option value="04:00 pm">04:00 pm</option>
                                                    <option value="04:15 pm">04:15 pm</option>
                                                    <option value="04:30 pm">04:30 pm</option>
                                                    <option value="04:45 pm">04:45 pm</option>
                                                    <option value="05:00 pm">05:00 pm</option>
                                                    <option value="05:15 pm">05:15 pm</option>
                                                    <option value="05:30 pm">05:30 pm</option>
                                                    <option value="05:45 pm">05:45 pm</option>
                                                    <option value="06:00 pm">06:00 pm</option>
                                                    <option value="06:15 pm">06:15 pm</option>
                                                    <option value="06:30 pm">06:30 pm</option>
                                                    <option value="06:45 pm">06:45 pm</option>
                                                    <option value="07:00 pm">07:00 pm</option>
                                                    <option value="07:15 pm">07:15 pm</option>
                                                    <option value="07:30 pm">07:30 pm</option>
                                                    <option value="07:45 pm">07:45 pm</option>
                                                    <option value="08:00 pm">08:00 pm</option>
                                                    <option value="08:15 pm">08:15 pm</option>
                                                    <option value="08:30 pm">08:30 pm</option>
                                                    <option value="08:45 pm">08:45 pm</option>
                                                    <option value="09:00 pm">09:00 pm</option>
                                                    <option value="09:15 pm">09:15 pm</option>
                                                    <option value="09:30 pm">09:30 pm</option>
                                                    <option value="09:45 pm">09:45 pm</option>
                                                    <option value="10:00 pm">10:00 pm</option>
                                                    <option value="10:15 pm">10:15 pm</option>
                                                    <option value="10:30 pm">10:30 pm</option>
                                                    <option value="10:45 pm">10:45 pm</option>
                                                    <option value="11:00 pm">11:00 pm</option>
                                                    <option value="11:15 pm">11:15 pm</option>
                                                    <option value="11:30 pm">11:30 pm</option>
                                                    <option value="11:45 pm">11:45 pm</option>
                                                    <option value="12:00 am">12:00 am</option>
                                                </select>
                                            </td><!-- .business-hour-open -->
                                        </tr><!-- .business-opening-wrap -->
                                        <tr class="business-opening-wrap">
                                            <td class="business-day">Tuesday</td>
                                            <td class="user-chosen-select-container">
                                                <select class="user-chosen-select" name="tuesday_open" id="tuesday_open">
                                                    <option value="closed">Closed</option>
                                                    <option value="open-24-hours">Open 24 Hours</option>
                                                    <option value="12:15 am">12:15 am</option>
                                                    <option value="12:30 am">12:30 am</option>
                                                    <option value="12:45 am">12:45 am</option>
                                                    <option value="01:00 am">01:00 am</option>
                                                    <option value="01:15 am">01:15 am</option>
                                                    <option value="01:30 am">01:30 am</option>
                                                    <option value="01:45 am">01:45 am</option>
                                                    <option value="02:00 am">02:00 am</option>
                                                    <option value="02:15 am">02:15 am</option>
                                                    <option value="02:30 am">02:30 am</option>
                                                    <option value="02:45 am">02:45 am</option>
                                                    <option value="03:00 am">03:00 am</option>
                                                    <option value="03:15 am">03:15 am</option>
                                                    <option value="03:30 am">03:30 am</option>
                                                    <option value="03:45 am">03:45 am</option>
                                                    <option value="04:00 am">04:00 am</option>
                                                    <option value="04:15 am">04:15 am</option>
                                                    <option value="04:30 am">04:30 am</option>
                                                    <option value="04:45 am">04:45 am</option>
                                                    <option value="05:00 am">05:00 am</option>
                                                    <option value="05:15 am">05:15 am</option>
                                                    <option value="05:30 am">05:30 am</option>
                                                    <option value="05:45 am">05:45 am</option>
                                                    <option value="06:00 am">06:00 am</option>
                                                    <option value="06:15 am">06:15 am</option>
                                                    <option value="06:30 am">06:30 am</option>
                                                    <option value="06:45 am">06:45 am</option>
                                                    <option value="07:00 am">07:00 am</option>
                                                    <option value="07:15 am">07:15 am</option>
                                                    <option value="07:30 am">07:30 am</option>
                                                    <option value="07:45 am">07:45 am</option>
                                                    <option value="08:00 am">08:00 am</option>
                                                    <option value="08:15 am">08:15 am</option>
                                                    <option value="08:30 am">08:30 am</option>
                                                    <option value="08:45 am">08:45 am</option>
                                                    <option value="09:00 am">09:00 am</option>
                                                    <option value="09:15 am">09:15 am</option>
                                                    <option value="09:30 am">09:30 am</option>
                                                    <option value="09:45 am">09:45 am</option>
                                                    <option value="10:00 am">10:00 am</option>
                                                    <option value="10:15 am">10:15 am</option>
                                                    <option value="10:30 am">10:30 am</option>
                                                    <option value="10:45 am">10:45 am</option>
                                                    <option value="11:00 am">11:00 am</option>
                                                    <option value="11:15 am">11:15 am</option>
                                                    <option value="11:30 am">11:30 am</option>
                                                    <option value="11:45 am">11:45 am</option>
                                                    <option value="12:00 pm">12:00 pm</option>
                                                    <option value="12:15 pm">12:15 pm</option>
                                                    <option value="12:30 pm">12:30 pm</option>
                                                    <option value="12:45 pm">12:45 pm</option>
                                                    <option value="01:00 pm">01:00 pm</option>
                                                    <option value="01:15 pm">01:15 pm</option>
                                                    <option value="01:30 pm">01:30 pm</option>
                                                    <option value="01:45 pm">01:45 pm</option>
                                                    <option value="02:00 pm">02:00 pm</option>
                                                    <option value="02:15 pm">02:15 pm</option>
                                                    <option value="02:30 pm">02:30 pm</option>
                                                    <option value="02:45 pm">02:45 pm</option>
                                                    <option value="03:00 pm">03:00 pm</option>
                                                    <option value="03:15 pm">03:15 pm</option>
                                                    <option value="03:30 pm">03:30 pm</option>
                                                    <option value="03:45 pm">03:45 pm</option>
                                                    <option value="04:00 pm">04:00 pm</option>
                                                    <option value="04:15 pm">04:15 pm</option>
                                                    <option value="04:30 pm">04:30 pm</option>
                                                    <option value="04:45 pm">04:45 pm</option>
                                                    <option value="05:00 pm">05:00 pm</option>
                                                    <option value="05:15 pm">05:15 pm</option>
                                                    <option value="05:30 pm">05:30 pm</option>
                                                    <option value="05:45 pm">05:45 pm</option>
                                                    <option value="06:00 pm">06:00 pm</option>
                                                    <option value="06:15 pm">06:15 pm</option>
                                                    <option value="06:30 pm">06:30 pm</option>
                                                    <option value="06:45 pm">06:45 pm</option>
                                                    <option value="07:00 pm">07:00 pm</option>
                                                    <option value="07:15 pm">07:15 pm</option>
                                                    <option value="07:30 pm">07:30 pm</option>
                                                    <option value="07:45 pm">07:45 pm</option>
                                                    <option value="08:00 pm">08:00 pm</option>
                                                    <option value="08:15 pm">08:15 pm</option>
                                                    <option value="08:30 pm">08:30 pm</option>
                                                    <option value="08:45 pm">08:45 pm</option>
                                                    <option value="09:00 pm">09:00 pm</option>
                                                    <option value="09:15 pm">09:15 pm</option>
                                                    <option value="09:30 pm">09:30 pm</option>
                                                    <option value="09:45 pm">09:45 pm</option>
                                                    <option value="10:00 pm">10:00 pm</option>
                                                    <option value="10:15 pm">10:15 pm</option>
                                                    <option value="10:30 pm">10:30 pm</option>
                                                    <option value="10:45 pm">10:45 pm</option>
                                                    <option value="11:00 pm">11:00 pm</option>
                                                    <option value="11:15 pm">11:15 pm</option>
                                                    <option value="11:30 pm">11:30 pm</option>
                                                    <option value="11:45 pm">11:45 pm</option>
                                                    <option value="12:00 am">12:00 am</option>

                                                </select>
                                            </td><!-- .business-hour-open -->
                                            <td class="user-chosen-select-container">
                                                <select class="user-chosen-select" name="tuesday_closed" id="tuesday_closed">
                                                    <option value="closed">Closed</option>
                                                    <option value="open-24-hours">Open 24 Hours</option>
                                                    <option value="12:15 am">12:15 am</option>
                                                    <option value="12:30 am">12:30 am</option>
                                                    <option value="12:45 am">12:45 am</option>
                                                    <option value="01:00 am">01:00 am</option>
                                                    <option value="01:15 am">01:15 am</option>
                                                    <option value="01:30 am">01:30 am</option>
                                                    <option value="01:45 am">01:45 am</option>
                                                    <option value="02:00 am">02:00 am</option>
                                                    <option value="02:15 am">02:15 am</option>
                                                    <option value="02:30 am">02:30 am</option>
                                                    <option value="02:45 am">02:45 am</option>
                                                    <option value="03:00 am">03:00 am</option>
                                                    <option value="03:15 am">03:15 am</option>
                                                    <option value="03:30 am">03:30 am</option>
                                                    <option value="03:45 am">03:45 am</option>
                                                    <option value="04:00 am">04:00 am</option>
                                                    <option value="04:15 am">04:15 am</option>
                                                    <option value="04:30 am">04:30 am</option>
                                                    <option value="04:45 am">04:45 am</option>
                                                    <option value="05:00 am">05:00 am</option>
                                                    <option value="05:15 am">05:15 am</option>
                                                    <option value="05:30 am">05:30 am</option>
                                                    <option value="05:45 am">05:45 am</option>
                                                    <option value="06:00 am">06:00 am</option>
                                                    <option value="06:15 am">06:15 am</option>
                                                    <option value="06:30 am">06:30 am</option>
                                                    <option value="06:45 am">06:45 am</option>
                                                    <option value="07:00 am">07:00 am</option>
                                                    <option value="07:15 am">07:15 am</option>
                                                    <option value="07:30 am">07:30 am</option>
                                                    <option value="07:45 am">07:45 am</option>
                                                    <option value="08:00 am">08:00 am</option>
                                                    <option value="08:15 am">08:15 am</option>
                                                    <option value="08:30 am">08:30 am</option>
                                                    <option value="08:45 am">08:45 am</option>
                                                    <option value="09:00 am">09:00 am</option>
                                                    <option value="09:15 am">09:15 am</option>
                                                    <option value="09:30 am">09:30 am</option>
                                                    <option value="09:45 am">09:45 am</option>
                                                    <option value="10:00 am">10:00 am</option>
                                                    <option value="10:15 am">10:15 am</option>
                                                    <option value="10:30 am">10:30 am</option>
                                                    <option value="10:45 am">10:45 am</option>
                                                    <option value="11:00 am">11:00 am</option>
                                                    <option value="11:15 am">11:15 am</option>
                                                    <option value="11:30 am">11:30 am</option>
                                                    <option value="11:45 am">11:45 am</option>
                                                    <option value="12:00 pm">12:00 pm</option>
                                                    <option value="12:15 pm">12:15 pm</option>
                                                    <option value="12:30 pm">12:30 pm</option>
                                                    <option value="12:45 pm">12:45 pm</option>
                                                    <option value="01:00 pm">01:00 pm</option>
                                                    <option value="01:15 pm">01:15 pm</option>
                                                    <option value="01:30 pm">01:30 pm</option>
                                                    <option value="01:45 pm">01:45 pm</option>
                                                    <option value="02:00 pm">02:00 pm</option>
                                                    <option value="02:15 pm">02:15 pm</option>
                                                    <option value="02:30 pm">02:30 pm</option>
                                                    <option value="02:45 pm">02:45 pm</option>
                                                    <option value="03:00 pm">03:00 pm</option>
                                                    <option value="03:15 pm">03:15 pm</option>
                                                    <option value="03:30 pm">03:30 pm</option>
                                                    <option value="03:45 pm">03:45 pm</option>
                                                    <option value="04:00 pm">04:00 pm</option>
                                                    <option value="04:15 pm">04:15 pm</option>
                                                    <option value="04:30 pm">04:30 pm</option>
                                                    <option value="04:45 pm">04:45 pm</option>
                                                    <option value="05:00 pm">05:00 pm</option>
                                                    <option value="05:15 pm">05:15 pm</option>
                                                    <option value="05:30 pm">05:30 pm</option>
                                                    <option value="05:45 pm">05:45 pm</option>
                                                    <option value="06:00 pm">06:00 pm</option>
                                                    <option value="06:15 pm">06:15 pm</option>
                                                    <option value="06:30 pm">06:30 pm</option>
                                                    <option value="06:45 pm">06:45 pm</option>
                                                    <option value="07:00 pm">07:00 pm</option>
                                                    <option value="07:15 pm">07:15 pm</option>
                                                    <option value="07:30 pm">07:30 pm</option>
                                                    <option value="07:45 pm">07:45 pm</option>
                                                    <option value="08:00 pm">08:00 pm</option>
                                                    <option value="08:15 pm">08:15 pm</option>
                                                    <option value="08:30 pm">08:30 pm</option>
                                                    <option value="08:45 pm">08:45 pm</option>
                                                    <option value="09:00 pm">09:00 pm</option>
                                                    <option value="09:15 pm">09:15 pm</option>
                                                    <option value="09:30 pm">09:30 pm</option>
                                                    <option value="09:45 pm">09:45 pm</option>
                                                    <option value="10:00 pm">10:00 pm</option>
                                                    <option value="10:15 pm">10:15 pm</option>
                                                    <option value="10:30 pm">10:30 pm</option>
                                                    <option value="10:45 pm">10:45 pm</option>
                                                    <option value="11:00 pm">11:00 pm</option>
                                                    <option value="11:15 pm">11:15 pm</option>
                                                    <option value="11:30 pm">11:30 pm</option>
                                                    <option value="11:45 pm">11:45 pm</option>
                                                    <option value="12:00 am">12:00 am</option>

                                                </select>
                                            </td><!-- .business-hour-open -->
                                        </tr><!-- .business-opening-wrap -->
                                        <tr class="business-opening-wrap">
                                            <td class="business-day">Wednesday</td>
                                            <td class="user-chosen-select-container">
                                                <select class="user-chosen-select" name="wednesday_open" id="wednesday_open">
                                                    <option value="closed">Closed</option>
                                                    <option value="open-24-hours">Open 24 Hours</option>
                                                    <option value="12:15 am">12:15 am</option>
                                                    <option value="12:30 am">12:30 am</option>
                                                    <option value="12:45 am">12:45 am</option>
                                                    <option value="01:00 am">01:00 am</option>
                                                    <option value="01:15 am">01:15 am</option>
                                                    <option value="01:30 am">01:30 am</option>
                                                    <option value="01:45 am">01:45 am</option>
                                                    <option value="02:00 am">02:00 am</option>
                                                    <option value="02:15 am">02:15 am</option>
                                                    <option value="02:30 am">02:30 am</option>
                                                    <option value="02:45 am">02:45 am</option>
                                                    <option value="03:00 am">03:00 am</option>
                                                    <option value="03:15 am">03:15 am</option>
                                                    <option value="03:30 am">03:30 am</option>
                                                    <option value="03:45 am">03:45 am</option>
                                                    <option value="04:00 am">04:00 am</option>
                                                    <option value="04:15 am">04:15 am</option>
                                                    <option value="04:30 am">04:30 am</option>
                                                    <option value="04:45 am">04:45 am</option>
                                                    <option value="05:00 am">05:00 am</option>
                                                    <option value="05:15 am">05:15 am</option>
                                                    <option value="05:30 am">05:30 am</option>
                                                    <option value="05:45 am">05:45 am</option>
                                                    <option value="06:00 am">06:00 am</option>
                                                    <option value="06:15 am">06:15 am</option>
                                                    <option value="06:30 am">06:30 am</option>
                                                    <option value="06:45 am">06:45 am</option>
                                                    <option value="07:00 am">07:00 am</option>
                                                    <option value="07:15 am">07:15 am</option>
                                                    <option value="07:30 am">07:30 am</option>
                                                    <option value="07:45 am">07:45 am</option>
                                                    <option value="08:00 am">08:00 am</option>
                                                    <option value="08:15 am">08:15 am</option>
                                                    <option value="08:30 am">08:30 am</option>
                                                    <option value="08:45 am">08:45 am</option>
                                                    <option value="09:00 am">09:00 am</option>
                                                    <option value="09:15 am">09:15 am</option>
                                                    <option value="09:30 am">09:30 am</option>
                                                    <option value="09:45 am">09:45 am</option>
                                                    <option value="10:00 am">10:00 am</option>
                                                    <option value="10:15 am">10:15 am</option>
                                                    <option value="10:30 am">10:30 am</option>
                                                    <option value="10:45 am">10:45 am</option>
                                                    <option value="11:00 am">11:00 am</option>
                                                    <option value="11:15 am">11:15 am</option>
                                                    <option value="11:30 am">11:30 am</option>
                                                    <option value="11:45 am">11:45 am</option>
                                                    <option value="12:00 pm">12:00 pm</option>
                                                    <option value="12:15 pm">12:15 pm</option>
                                                    <option value="12:30 pm">12:30 pm</option>
                                                    <option value="12:45 pm">12:45 pm</option>
                                                    <option value="01:00 pm">01:00 pm</option>
                                                    <option value="01:15 pm">01:15 pm</option>
                                                    <option value="01:30 pm">01:30 pm</option>
                                                    <option value="01:45 pm">01:45 pm</option>
                                                    <option value="02:00 pm">02:00 pm</option>
                                                    <option value="02:15 pm">02:15 pm</option>
                                                    <option value="02:30 pm">02:30 pm</option>
                                                    <option value="02:45 pm">02:45 pm</option>
                                                    <option value="03:00 pm">03:00 pm</option>
                                                    <option value="03:15 pm">03:15 pm</option>
                                                    <option value="03:30 pm">03:30 pm</option>
                                                    <option value="03:45 pm">03:45 pm</option>
                                                    <option value="04:00 pm">04:00 pm</option>
                                                    <option value="04:15 pm">04:15 pm</option>
                                                    <option value="04:30 pm">04:30 pm</option>
                                                    <option value="04:45 pm">04:45 pm</option>
                                                    <option value="05:00 pm">05:00 pm</option>
                                                    <option value="05:15 pm">05:15 pm</option>
                                                    <option value="05:30 pm">05:30 pm</option>
                                                    <option value="05:45 pm">05:45 pm</option>
                                                    <option value="06:00 pm">06:00 pm</option>
                                                    <option value="06:15 pm">06:15 pm</option>
                                                    <option value="06:30 pm">06:30 pm</option>
                                                    <option value="06:45 pm">06:45 pm</option>
                                                    <option value="07:00 pm">07:00 pm</option>
                                                    <option value="07:15 pm">07:15 pm</option>
                                                    <option value="07:30 pm">07:30 pm</option>
                                                    <option value="07:45 pm">07:45 pm</option>
                                                    <option value="08:00 pm">08:00 pm</option>
                                                    <option value="08:15 pm">08:15 pm</option>
                                                    <option value="08:30 pm">08:30 pm</option>
                                                    <option value="08:45 pm">08:45 pm</option>
                                                    <option value="09:00 pm">09:00 pm</option>
                                                    <option value="09:15 pm">09:15 pm</option>
                                                    <option value="09:30 pm">09:30 pm</option>
                                                    <option value="09:45 pm">09:45 pm</option>
                                                    <option value="10:00 pm">10:00 pm</option>
                                                    <option value="10:15 pm">10:15 pm</option>
                                                    <option value="10:30 pm">10:30 pm</option>
                                                    <option value="10:45 pm">10:45 pm</option>
                                                    <option value="11:00 pm">11:00 pm</option>
                                                    <option value="11:15 pm">11:15 pm</option>
                                                    <option value="11:30 pm">11:30 pm</option>
                                                    <option value="11:45 pm">11:45 pm</option>
                                                    <option value="12:00 am">12:00 am</option>

                                                </select>
                                            </td><!-- .business-hour-open -->
                                            <td class="user-chosen-select-container">
                                                <select class="user-chosen-select" name="wednesday_closed" id="wednesday_closed">
                                                    <option value="closed">Closed</option>
                                                    <option value="open-24-hours">Open 24 Hours</option>
                                                    <option value="12:15 am">12:15 am</option>
                                                    <option value="12:30 am">12:30 am</option>
                                                    <option value="12:45 am">12:45 am</option>
                                                    <option value="01:00 am">01:00 am</option>
                                                    <option value="01:15 am">01:15 am</option>
                                                    <option value="01:30 am">01:30 am</option>
                                                    <option value="01:45 am">01:45 am</option>
                                                    <option value="02:00 am">02:00 am</option>
                                                    <option value="02:15 am">02:15 am</option>
                                                    <option value="02:30 am">02:30 am</option>
                                                    <option value="02:45 am">02:45 am</option>
                                                    <option value="03:00 am">03:00 am</option>
                                                    <option value="03:15 am">03:15 am</option>
                                                    <option value="03:30 am">03:30 am</option>
                                                    <option value="03:45 am">03:45 am</option>
                                                    <option value="04:00 am">04:00 am</option>
                                                    <option value="04:15 am">04:15 am</option>
                                                    <option value="04:30 am">04:30 am</option>
                                                    <option value="04:45 am">04:45 am</option>
                                                    <option value="05:00 am">05:00 am</option>
                                                    <option value="05:15 am">05:15 am</option>
                                                    <option value="05:30 am">05:30 am</option>
                                                    <option value="05:45 am">05:45 am</option>
                                                    <option value="06:00 am">06:00 am</option>
                                                    <option value="06:15 am">06:15 am</option>
                                                    <option value="06:30 am">06:30 am</option>
                                                    <option value="06:45 am">06:45 am</option>
                                                    <option value="07:00 am">07:00 am</option>
                                                    <option value="07:15 am">07:15 am</option>
                                                    <option value="07:30 am">07:30 am</option>
                                                    <option value="07:45 am">07:45 am</option>
                                                    <option value="08:00 am">08:00 am</option>
                                                    <option value="08:15 am">08:15 am</option>
                                                    <option value="08:30 am">08:30 am</option>
                                                    <option value="08:45 am">08:45 am</option>
                                                    <option value="09:00 am">09:00 am</option>
                                                    <option value="09:15 am">09:15 am</option>
                                                    <option value="09:30 am">09:30 am</option>
                                                    <option value="09:45 am">09:45 am</option>
                                                    <option value="10:00 am">10:00 am</option>
                                                    <option value="10:15 am">10:15 am</option>
                                                    <option value="10:30 am">10:30 am</option>
                                                    <option value="10:45 am">10:45 am</option>
                                                    <option value="11:00 am">11:00 am</option>
                                                    <option value="11:15 am">11:15 am</option>
                                                    <option value="11:30 am">11:30 am</option>
                                                    <option value="11:45 am">11:45 am</option>
                                                    <option value="12:00 pm">12:00 pm</option>
                                                    <option value="12:15 pm">12:15 pm</option>
                                                    <option value="12:30 pm">12:30 pm</option>
                                                    <option value="12:45 pm">12:45 pm</option>
                                                    <option value="01:00 pm">01:00 pm</option>
                                                    <option value="01:15 pm">01:15 pm</option>
                                                    <option value="01:30 pm">01:30 pm</option>
                                                    <option value="01:45 pm">01:45 pm</option>
                                                    <option value="02:00 pm">02:00 pm</option>
                                                    <option value="02:15 pm">02:15 pm</option>
                                                    <option value="02:30 pm">02:30 pm</option>
                                                    <option value="02:45 pm">02:45 pm</option>
                                                    <option value="03:00 pm">03:00 pm</option>
                                                    <option value="03:15 pm">03:15 pm</option>
                                                    <option value="03:30 pm">03:30 pm</option>
                                                    <option value="03:45 pm">03:45 pm</option>
                                                    <option value="04:00 pm">04:00 pm</option>
                                                    <option value="04:15 pm">04:15 pm</option>
                                                    <option value="04:30 pm">04:30 pm</option>
                                                    <option value="04:45 pm">04:45 pm</option>
                                                    <option value="05:00 pm">05:00 pm</option>
                                                    <option value="05:15 pm">05:15 pm</option>
                                                    <option value="05:30 pm">05:30 pm</option>
                                                    <option value="05:45 pm">05:45 pm</option>
                                                    <option value="06:00 pm">06:00 pm</option>
                                                    <option value="06:15 pm">06:15 pm</option>
                                                    <option value="06:30 pm">06:30 pm</option>
                                                    <option value="06:45 pm">06:45 pm</option>
                                                    <option value="07:00 pm">07:00 pm</option>
                                                    <option value="07:15 pm">07:15 pm</option>
                                                    <option value="07:30 pm">07:30 pm</option>
                                                    <option value="07:45 pm">07:45 pm</option>
                                                    <option value="08:00 pm">08:00 pm</option>
                                                    <option value="08:15 pm">08:15 pm</option>
                                                    <option value="08:30 pm">08:30 pm</option>
                                                    <option value="08:45 pm">08:45 pm</option>
                                                    <option value="09:00 pm">09:00 pm</option>
                                                    <option value="09:15 pm">09:15 pm</option>
                                                    <option value="09:30 pm">09:30 pm</option>
                                                    <option value="09:45 pm">09:45 pm</option>
                                                    <option value="10:00 pm">10:00 pm</option>
                                                    <option value="10:15 pm">10:15 pm</option>
                                                    <option value="10:30 pm">10:30 pm</option>
                                                    <option value="10:45 pm">10:45 pm</option>
                                                    <option value="11:00 pm">11:00 pm</option>
                                                    <option value="11:15 pm">11:15 pm</option>
                                                    <option value="11:30 pm">11:30 pm</option>
                                                    <option value="11:45 pm">11:45 pm</option>
                                                    <option value="12:00 am">12:00 am</option>

                                                </select>
                                            </td><!-- .business-hour-open -->
                                        </tr><!-- .business-opening-wrap -->
                                        <tr class="business-opening-wrap">
                                            <td class="business-day">Thursday</td>
                                            <td class="user-chosen-select-container">
                                                <select class="user-chosen-select" name="thursday_open" id="thursday_open">
                                                    <option value="closed">Closed</option>
                                                    <option value="open-24-hours">Open 24 Hours</option>
                                                    <option value="12:15 am">12:15 am</option>
                                                    <option value="12:30 am">12:30 am</option>
                                                    <option value="12:45 am">12:45 am</option>
                                                    <option value="01:00 am">01:00 am</option>
                                                    <option value="01:15 am">01:15 am</option>
                                                    <option value="01:30 am">01:30 am</option>
                                                    <option value="01:45 am">01:45 am</option>
                                                    <option value="02:00 am">02:00 am</option>
                                                    <option value="02:15 am">02:15 am</option>
                                                    <option value="02:30 am">02:30 am</option>
                                                    <option value="02:45 am">02:45 am</option>
                                                    <option value="03:00 am">03:00 am</option>
                                                    <option value="03:15 am">03:15 am</option>
                                                    <option value="03:30 am">03:30 am</option>
                                                    <option value="03:45 am">03:45 am</option>
                                                    <option value="04:00 am">04:00 am</option>
                                                    <option value="04:15 am">04:15 am</option>
                                                    <option value="04:30 am">04:30 am</option>
                                                    <option value="04:45 am">04:45 am</option>
                                                    <option value="05:00 am">05:00 am</option>
                                                    <option value="05:15 am">05:15 am</option>
                                                    <option value="05:30 am">05:30 am</option>
                                                    <option value="05:45 am">05:45 am</option>
                                                    <option value="06:00 am">06:00 am</option>
                                                    <option value="06:15 am">06:15 am</option>
                                                    <option value="06:30 am">06:30 am</option>
                                                    <option value="06:45 am">06:45 am</option>
                                                    <option value="07:00 am">07:00 am</option>
                                                    <option value="07:15 am">07:15 am</option>
                                                    <option value="07:30 am">07:30 am</option>
                                                    <option value="07:45 am">07:45 am</option>
                                                    <option value="08:00 am">08:00 am</option>
                                                    <option value="08:15 am">08:15 am</option>
                                                    <option value="08:30 am">08:30 am</option>
                                                    <option value="08:45 am">08:45 am</option>
                                                    <option value="09:00 am">09:00 am</option>
                                                    <option value="09:15 am">09:15 am</option>
                                                    <option value="09:30 am">09:30 am</option>
                                                    <option value="09:45 am">09:45 am</option>
                                                    <option value="10:00 am">10:00 am</option>
                                                    <option value="10:15 am">10:15 am</option>
                                                    <option value="10:30 am">10:30 am</option>
                                                    <option value="10:45 am">10:45 am</option>
                                                    <option value="11:00 am">11:00 am</option>
                                                    <option value="11:15 am">11:15 am</option>
                                                    <option value="11:30 am">11:30 am</option>
                                                    <option value="11:45 am">11:45 am</option>
                                                    <option value="12:00 pm">12:00 pm</option>
                                                    <option value="12:15 pm">12:15 pm</option>
                                                    <option value="12:30 pm">12:30 pm</option>
                                                    <option value="12:45 pm">12:45 pm</option>
                                                    <option value="01:00 pm">01:00 pm</option>
                                                    <option value="01:15 pm">01:15 pm</option>
                                                    <option value="01:30 pm">01:30 pm</option>
                                                    <option value="01:45 pm">01:45 pm</option>
                                                    <option value="02:00 pm">02:00 pm</option>
                                                    <option value="02:15 pm">02:15 pm</option>
                                                    <option value="02:30 pm">02:30 pm</option>
                                                    <option value="02:45 pm">02:45 pm</option>
                                                    <option value="03:00 pm">03:00 pm</option>
                                                    <option value="03:15 pm">03:15 pm</option>
                                                    <option value="03:30 pm">03:30 pm</option>
                                                    <option value="03:45 pm">03:45 pm</option>
                                                    <option value="04:00 pm">04:00 pm</option>
                                                    <option value="04:15 pm">04:15 pm</option>
                                                    <option value="04:30 pm">04:30 pm</option>
                                                    <option value="04:45 pm">04:45 pm</option>
                                                    <option value="05:00 pm">05:00 pm</option>
                                                    <option value="05:15 pm">05:15 pm</option>
                                                    <option value="05:30 pm">05:30 pm</option>
                                                    <option value="05:45 pm">05:45 pm</option>
                                                    <option value="06:00 pm">06:00 pm</option>
                                                    <option value="06:15 pm">06:15 pm</option>
                                                    <option value="06:30 pm">06:30 pm</option>
                                                    <option value="06:45 pm">06:45 pm</option>
                                                    <option value="07:00 pm">07:00 pm</option>
                                                    <option value="07:15 pm">07:15 pm</option>
                                                    <option value="07:30 pm">07:30 pm</option>
                                                    <option value="07:45 pm">07:45 pm</option>
                                                    <option value="08:00 pm">08:00 pm</option>
                                                    <option value="08:15 pm">08:15 pm</option>
                                                    <option value="08:30 pm">08:30 pm</option>
                                                    <option value="08:45 pm">08:45 pm</option>
                                                    <option value="09:00 pm">09:00 pm</option>
                                                    <option value="09:15 pm">09:15 pm</option>
                                                    <option value="09:30 pm">09:30 pm</option>
                                                    <option value="09:45 pm">09:45 pm</option>
                                                    <option value="10:00 pm">10:00 pm</option>
                                                    <option value="10:15 pm">10:15 pm</option>
                                                    <option value="10:30 pm">10:30 pm</option>
                                                    <option value="10:45 pm">10:45 pm</option>
                                                    <option value="11:00 pm">11:00 pm</option>
                                                    <option value="11:15 pm">11:15 pm</option>
                                                    <option value="11:30 pm">11:30 pm</option>
                                                    <option value="11:45 pm">11:45 pm</option>
                                                    <option value="12:00 am">12:00 am</option>

                                                </select>
                                            </td><!-- .business-hour-open -->
                                            <td class="user-chosen-select-container">
                                                <select class="user-chosen-select" name="thursday_closed" id="thursday_closed">
                                                    <option value="closed">Closed</option>
                                                    <option value="open-24-hours">Open 24 Hours</option>
                                                    <option value="12:15 am">12:15 am</option>
                                                    <option value="12:30 am">12:30 am</option>
                                                    <option value="12:45 am">12:45 am</option>
                                                    <option value="01:00 am">01:00 am</option>
                                                    <option value="01:15 am">01:15 am</option>
                                                    <option value="01:30 am">01:30 am</option>
                                                    <option value="01:45 am">01:45 am</option>
                                                    <option value="02:00 am">02:00 am</option>
                                                    <option value="02:15 am">02:15 am</option>
                                                    <option value="02:30 am">02:30 am</option>
                                                    <option value="02:45 am">02:45 am</option>
                                                    <option value="03:00 am">03:00 am</option>
                                                    <option value="03:15 am">03:15 am</option>
                                                    <option value="03:30 am">03:30 am</option>
                                                    <option value="03:45 am">03:45 am</option>
                                                    <option value="04:00 am">04:00 am</option>
                                                    <option value="04:15 am">04:15 am</option>
                                                    <option value="04:30 am">04:30 am</option>
                                                    <option value="04:45 am">04:45 am</option>
                                                    <option value="05:00 am">05:00 am</option>
                                                    <option value="05:15 am">05:15 am</option>
                                                    <option value="05:30 am">05:30 am</option>
                                                    <option value="05:45 am">05:45 am</option>
                                                    <option value="06:00 am">06:00 am</option>
                                                    <option value="06:15 am">06:15 am</option>
                                                    <option value="06:30 am">06:30 am</option>
                                                    <option value="06:45 am">06:45 am</option>
                                                    <option value="07:00 am">07:00 am</option>
                                                    <option value="07:15 am">07:15 am</option>
                                                    <option value="07:30 am">07:30 am</option>
                                                    <option value="07:45 am">07:45 am</option>
                                                    <option value="08:00 am">08:00 am</option>
                                                    <option value="08:15 am">08:15 am</option>
                                                    <option value="08:30 am">08:30 am</option>
                                                    <option value="08:45 am">08:45 am</option>
                                                    <option value="09:00 am">09:00 am</option>
                                                    <option value="09:15 am">09:15 am</option>
                                                    <option value="09:30 am">09:30 am</option>
                                                    <option value="09:45 am">09:45 am</option>
                                                    <option value="10:00 am">10:00 am</option>
                                                    <option value="10:15 am">10:15 am</option>
                                                    <option value="10:30 am">10:30 am</option>
                                                    <option value="10:45 am">10:45 am</option>
                                                    <option value="11:00 am">11:00 am</option>
                                                    <option value="11:15 am">11:15 am</option>
                                                    <option value="11:30 am">11:30 am</option>
                                                    <option value="11:45 am">11:45 am</option>
                                                    <option value="12:00 pm">12:00 pm</option>
                                                    <option value="12:15 pm">12:15 pm</option>
                                                    <option value="12:30 pm">12:30 pm</option>
                                                    <option value="12:45 pm">12:45 pm</option>
                                                    <option value="01:00 pm">01:00 pm</option>
                                                    <option value="01:15 pm">01:15 pm</option>
                                                    <option value="01:30 pm">01:30 pm</option>
                                                    <option value="01:45 pm">01:45 pm</option>
                                                    <option value="02:00 pm">02:00 pm</option>
                                                    <option value="02:15 pm">02:15 pm</option>
                                                    <option value="02:30 pm">02:30 pm</option>
                                                    <option value="02:45 pm">02:45 pm</option>
                                                    <option value="03:00 pm">03:00 pm</option>
                                                    <option value="03:15 pm">03:15 pm</option>
                                                    <option value="03:30 pm">03:30 pm</option>
                                                    <option value="03:45 pm">03:45 pm</option>
                                                    <option value="04:00 pm">04:00 pm</option>
                                                    <option value="04:15 pm">04:15 pm</option>
                                                    <option value="04:30 pm">04:30 pm</option>
                                                    <option value="04:45 pm">04:45 pm</option>
                                                    <option value="05:00 pm">05:00 pm</option>
                                                    <option value="05:15 pm">05:15 pm</option>
                                                    <option value="05:30 pm">05:30 pm</option>
                                                    <option value="05:45 pm">05:45 pm</option>
                                                    <option value="06:00 pm">06:00 pm</option>
                                                    <option value="06:15 pm">06:15 pm</option>
                                                    <option value="06:30 pm">06:30 pm</option>
                                                    <option value="06:45 pm">06:45 pm</option>
                                                    <option value="07:00 pm">07:00 pm</option>
                                                    <option value="07:15 pm">07:15 pm</option>
                                                    <option value="07:30 pm">07:30 pm</option>
                                                    <option value="07:45 pm">07:45 pm</option>
                                                    <option value="08:00 pm">08:00 pm</option>
                                                    <option value="08:15 pm">08:15 pm</option>
                                                    <option value="08:30 pm">08:30 pm</option>
                                                    <option value="08:45 pm">08:45 pm</option>
                                                    <option value="09:00 pm">09:00 pm</option>
                                                    <option value="09:15 pm">09:15 pm</option>
                                                    <option value="09:30 pm">09:30 pm</option>
                                                    <option value="09:45 pm">09:45 pm</option>
                                                    <option value="10:00 pm">10:00 pm</option>
                                                    <option value="10:15 pm">10:15 pm</option>
                                                    <option value="10:30 pm">10:30 pm</option>
                                                    <option value="10:45 pm">10:45 pm</option>
                                                    <option value="11:00 pm">11:00 pm</option>
                                                    <option value="11:15 pm">11:15 pm</option>
                                                    <option value="11:30 pm">11:30 pm</option>
                                                    <option value="11:45 pm">11:45 pm</option>
                                                    <option value="12:00 am">12:00 am</option>

                                                </select>
                                            </td><!-- .business-hour-open -->
                                        </tr><!-- .business-opening-wrap -->
                                        <tr class="business-opening-wrap">
                                            <td class="business-day">Friday</td>
                                            <td class="user-chosen-select-container"  >
                                                <select class="user-chosen-select" name="friday_open" id="friday_open">
                                                    <option value="closed">Closed</option>
                                                    <option value="open-24-hours">Open 24 Hours</option>
                                                    <option value="12:15 am">12:15 am</option>
                                                    <option value="12:30 am">12:30 am</option>
                                                    <option value="12:45 am">12:45 am</option>
                                                    <option value="01:00 am">01:00 am</option>
                                                    <option value="01:15 am">01:15 am</option>
                                                    <option value="01:30 am">01:30 am</option>
                                                    <option value="01:45 am">01:45 am</option>
                                                    <option value="02:00 am">02:00 am</option>
                                                    <option value="02:15 am">02:15 am</option>
                                                    <option value="02:30 am">02:30 am</option>
                                                    <option value="02:45 am">02:45 am</option>
                                                    <option value="03:00 am">03:00 am</option>
                                                    <option value="03:15 am">03:15 am</option>
                                                    <option value="03:30 am">03:30 am</option>
                                                    <option value="03:45 am">03:45 am</option>
                                                    <option value="04:00 am">04:00 am</option>
                                                    <option value="04:15 am">04:15 am</option>
                                                    <option value="04:30 am">04:30 am</option>
                                                    <option value="04:45 am">04:45 am</option>
                                                    <option value="05:00 am">05:00 am</option>
                                                    <option value="05:15 am">05:15 am</option>
                                                    <option value="05:30 am">05:30 am</option>
                                                    <option value="05:45 am">05:45 am</option>
                                                    <option value="06:00 am">06:00 am</option>
                                                    <option value="06:15 am">06:15 am</option>
                                                    <option value="06:30 am">06:30 am</option>
                                                    <option value="06:45 am">06:45 am</option>
                                                    <option value="07:00 am">07:00 am</option>
                                                    <option value="07:15 am">07:15 am</option>
                                                    <option value="07:30 am">07:30 am</option>
                                                    <option value="07:45 am">07:45 am</option>
                                                    <option value="08:00 am">08:00 am</option>
                                                    <option value="08:15 am">08:15 am</option>
                                                    <option value="08:30 am">08:30 am</option>
                                                    <option value="08:45 am">08:45 am</option>
                                                    <option value="09:00 am">09:00 am</option>
                                                    <option value="09:15 am">09:15 am</option>
                                                    <option value="09:30 am">09:30 am</option>
                                                    <option value="09:45 am">09:45 am</option>
                                                    <option value="10:00 am">10:00 am</option>
                                                    <option value="10:15 am">10:15 am</option>
                                                    <option value="10:30 am">10:30 am</option>
                                                    <option value="10:45 am">10:45 am</option>
                                                    <option value="11:00 am">11:00 am</option>
                                                    <option value="11:15 am">11:15 am</option>
                                                    <option value="11:30 am">11:30 am</option>
                                                    <option value="11:45 am">11:45 am</option>
                                                    <option value="12:00 pm">12:00 pm</option>
                                                    <option value="12:15 pm">12:15 pm</option>
                                                    <option value="12:30 pm">12:30 pm</option>
                                                    <option value="12:45 pm">12:45 pm</option>
                                                    <option value="01:00 pm">01:00 pm</option>
                                                    <option value="01:15 pm">01:15 pm</option>
                                                    <option value="01:30 pm">01:30 pm</option>
                                                    <option value="01:45 pm">01:45 pm</option>
                                                    <option value="02:00 pm">02:00 pm</option>
                                                    <option value="02:15 pm">02:15 pm</option>
                                                    <option value="02:30 pm">02:30 pm</option>
                                                    <option value="02:45 pm">02:45 pm</option>
                                                    <option value="03:00 pm">03:00 pm</option>
                                                    <option value="03:15 pm">03:15 pm</option>
                                                    <option value="03:30 pm">03:30 pm</option>
                                                    <option value="03:45 pm">03:45 pm</option>
                                                    <option value="04:00 pm">04:00 pm</option>
                                                    <option value="04:15 pm">04:15 pm</option>
                                                    <option value="04:30 pm">04:30 pm</option>
                                                    <option value="04:45 pm">04:45 pm</option>
                                                    <option value="05:00 pm">05:00 pm</option>
                                                    <option value="05:15 pm">05:15 pm</option>
                                                    <option value="05:30 pm">05:30 pm</option>
                                                    <option value="05:45 pm">05:45 pm</option>
                                                    <option value="06:00 pm">06:00 pm</option>
                                                    <option value="06:15 pm">06:15 pm</option>
                                                    <option value="06:30 pm">06:30 pm</option>
                                                    <option value="06:45 pm">06:45 pm</option>
                                                    <option value="07:00 pm">07:00 pm</option>
                                                    <option value="07:15 pm">07:15 pm</option>
                                                    <option value="07:30 pm">07:30 pm</option>
                                                    <option value="07:45 pm">07:45 pm</option>
                                                    <option value="08:00 pm">08:00 pm</option>
                                                    <option value="08:15 pm">08:15 pm</option>
                                                    <option value="08:30 pm">08:30 pm</option>
                                                    <option value="08:45 pm">08:45 pm</option>
                                                    <option value="09:00 pm">09:00 pm</option>
                                                    <option value="09:15 pm">09:15 pm</option>
                                                    <option value="09:30 pm">09:30 pm</option>
                                                    <option value="09:45 pm">09:45 pm</option>
                                                    <option value="10:00 pm">10:00 pm</option>
                                                    <option value="10:15 pm">10:15 pm</option>
                                                    <option value="10:30 pm">10:30 pm</option>
                                                    <option value="10:45 pm">10:45 pm</option>
                                                    <option value="11:00 pm">11:00 pm</option>
                                                    <option value="11:15 pm">11:15 pm</option>
                                                    <option value="11:30 pm">11:30 pm</option>
                                                    <option value="11:45 pm">11:45 pm</option>
                                                    <option value="12:00 am">12:00 am</option>

                                                </select>
                                            </td><!-- .business-hour-open -->
                                            <td class="user-chosen-select-container">
                                                <select class="user-chosen-select" name="friday_closed" id="friday_closed">
                                                    <option value="closed">Closed</option>
                                                    <option value="open-24-hours">Open 24 Hours</option>
                                                    <option value="12:15 am">12:15 am</option>
                                                    <option value="12:30 am">12:30 am</option>
                                                    <option value="12:45 am">12:45 am</option>
                                                    <option value="01:00 am">01:00 am</option>
                                                    <option value="01:15 am">01:15 am</option>
                                                    <option value="01:30 am">01:30 am</option>
                                                    <option value="01:45 am">01:45 am</option>
                                                    <option value="02:00 am">02:00 am</option>
                                                    <option value="02:15 am">02:15 am</option>
                                                    <option value="02:30 am">02:30 am</option>
                                                    <option value="02:45 am">02:45 am</option>
                                                    <option value="03:00 am">03:00 am</option>
                                                    <option value="03:15 am">03:15 am</option>
                                                    <option value="03:30 am">03:30 am</option>
                                                    <option value="03:45 am">03:45 am</option>
                                                    <option value="04:00 am">04:00 am</option>
                                                    <option value="04:15 am">04:15 am</option>
                                                    <option value="04:30 am">04:30 am</option>
                                                    <option value="04:45 am">04:45 am</option>
                                                    <option value="05:00 am">05:00 am</option>
                                                    <option value="05:15 am">05:15 am</option>
                                                    <option value="05:30 am">05:30 am</option>
                                                    <option value="05:45 am">05:45 am</option>
                                                    <option value="06:00 am">06:00 am</option>
                                                    <option value="06:15 am">06:15 am</option>
                                                    <option value="06:30 am">06:30 am</option>
                                                    <option value="06:45 am">06:45 am</option>
                                                    <option value="07:00 am">07:00 am</option>
                                                    <option value="07:15 am">07:15 am</option>
                                                    <option value="07:30 am">07:30 am</option>
                                                    <option value="07:45 am">07:45 am</option>
                                                    <option value="08:00 am">08:00 am</option>
                                                    <option value="08:15 am">08:15 am</option>
                                                    <option value="08:30 am">08:30 am</option>
                                                    <option value="08:45 am">08:45 am</option>
                                                    <option value="09:00 am">09:00 am</option>
                                                    <option value="09:15 am">09:15 am</option>
                                                    <option value="09:30 am">09:30 am</option>
                                                    <option value="09:45 am">09:45 am</option>
                                                    <option value="10:00 am">10:00 am</option>
                                                    <option value="10:15 am">10:15 am</option>
                                                    <option value="10:30 am">10:30 am</option>
                                                    <option value="10:45 am">10:45 am</option>
                                                    <option value="11:00 am">11:00 am</option>
                                                    <option value="11:15 am">11:15 am</option>
                                                    <option value="11:30 am">11:30 am</option>
                                                    <option value="11:45 am">11:45 am</option>
                                                    <option value="12:00 pm">12:00 pm</option>
                                                    <option value="12:15 pm">12:15 pm</option>
                                                    <option value="12:30 pm">12:30 pm</option>
                                                    <option value="12:45 pm">12:45 pm</option>
                                                    <option value="01:00 pm">01:00 pm</option>
                                                    <option value="01:15 pm">01:15 pm</option>
                                                    <option value="01:30 pm">01:30 pm</option>
                                                    <option value="01:45 pm">01:45 pm</option>
                                                    <option value="02:00 pm">02:00 pm</option>
                                                    <option value="02:15 pm">02:15 pm</option>
                                                    <option value="02:30 pm">02:30 pm</option>
                                                    <option value="02:45 pm">02:45 pm</option>
                                                    <option value="03:00 pm">03:00 pm</option>
                                                    <option value="03:15 pm">03:15 pm</option>
                                                    <option value="03:30 pm">03:30 pm</option>
                                                    <option value="03:45 pm">03:45 pm</option>
                                                    <option value="04:00 pm">04:00 pm</option>
                                                    <option value="04:15 pm">04:15 pm</option>
                                                    <option value="04:30 pm">04:30 pm</option>
                                                    <option value="04:45 pm">04:45 pm</option>
                                                    <option value="05:00 pm">05:00 pm</option>
                                                    <option value="05:15 pm">05:15 pm</option>
                                                    <option value="05:30 pm">05:30 pm</option>
                                                    <option value="05:45 pm">05:45 pm</option>
                                                    <option value="06:00 pm">06:00 pm</option>
                                                    <option value="06:15 pm">06:15 pm</option>
                                                    <option value="06:30 pm">06:30 pm</option>
                                                    <option value="06:45 pm">06:45 pm</option>
                                                    <option value="07:00 pm">07:00 pm</option>
                                                    <option value="07:15 pm">07:15 pm</option>
                                                    <option value="07:30 pm">07:30 pm</option>
                                                    <option value="07:45 pm">07:45 pm</option>
                                                    <option value="08:00 pm">08:00 pm</option>
                                                    <option value="08:15 pm">08:15 pm</option>
                                                    <option value="08:30 pm">08:30 pm</option>
                                                    <option value="08:45 pm">08:45 pm</option>
                                                    <option value="09:00 pm">09:00 pm</option>
                                                    <option value="09:15 pm">09:15 pm</option>
                                                    <option value="09:30 pm">09:30 pm</option>
                                                    <option value="09:45 pm">09:45 pm</option>
                                                    <option value="10:00 pm">10:00 pm</option>
                                                    <option value="10:15 pm">10:15 pm</option>
                                                    <option value="10:30 pm">10:30 pm</option>
                                                    <option value="10:45 pm">10:45 pm</option>
                                                    <option value="11:00 pm">11:00 pm</option>
                                                    <option value="11:15 pm">11:15 pm</option>
                                                    <option value="11:30 pm">11:30 pm</option>
                                                    <option value="11:45 pm">11:45 pm</option>
                                                    <option value="12:00 am">12:00 am</option>

                                                </select>
                                            </td><!-- .business-hour-open -->
                                        </tr><!-- .business-opening-wrap -->
                                        <tr class="business-opening-wrap">
                                            <td class="business-day">Saturday</td>
                                            <td class="user-chosen-select-container">
                                                <select class="user-chosen-select" name="saturday_open" id="saturday_open">
                                                    <option value="closed">Closed</option>
                                                    <option value="open-24-hours">Open 24 Hours</option>
                                                    <option value="12:15 am">12:15 am</option>
                                                    <option value="12:30 am">12:30 am</option>
                                                    <option value="12:45 am">12:45 am</option>
                                                    <option value="01:00 am">01:00 am</option>
                                                    <option value="01:15 am">01:15 am</option>
                                                    <option value="01:30 am">01:30 am</option>
                                                    <option value="01:45 am">01:45 am</option>
                                                    <option value="02:00 am">02:00 am</option>
                                                    <option value="02:15 am">02:15 am</option>
                                                    <option value="02:30 am">02:30 am</option>
                                                    <option value="02:45 am">02:45 am</option>
                                                    <option value="03:00 am">03:00 am</option>
                                                    <option value="03:15 am">03:15 am</option>
                                                    <option value="03:30 am">03:30 am</option>
                                                    <option value="03:45 am">03:45 am</option>
                                                    <option value="04:00 am">04:00 am</option>
                                                    <option value="04:15 am">04:15 am</option>
                                                    <option value="04:30 am">04:30 am</option>
                                                    <option value="04:45 am">04:45 am</option>
                                                    <option value="05:00 am">05:00 am</option>
                                                    <option value="05:15 am">05:15 am</option>
                                                    <option value="05:30 am">05:30 am</option>
                                                    <option value="05:45 am">05:45 am</option>
                                                    <option value="06:00 am">06:00 am</option>
                                                    <option value="06:15 am">06:15 am</option>
                                                    <option value="06:30 am">06:30 am</option>
                                                    <option value="06:45 am">06:45 am</option>
                                                    <option value="07:00 am">07:00 am</option>
                                                    <option value="07:15 am">07:15 am</option>
                                                    <option value="07:30 am">07:30 am</option>
                                                    <option value="07:45 am">07:45 am</option>
                                                    <option value="08:00 am">08:00 am</option>
                                                    <option value="08:15 am">08:15 am</option>
                                                    <option value="08:30 am">08:30 am</option>
                                                    <option value="08:45 am">08:45 am</option>
                                                    <option value="09:00 am">09:00 am</option>
                                                    <option value="09:15 am">09:15 am</option>
                                                    <option value="09:30 am">09:30 am</option>
                                                    <option value="09:45 am">09:45 am</option>
                                                    <option value="10:00 am">10:00 am</option>
                                                    <option value="10:15 am">10:15 am</option>
                                                    <option value="10:30 am">10:30 am</option>
                                                    <option value="10:45 am">10:45 am</option>
                                                    <option value="11:00 am">11:00 am</option>
                                                    <option value="11:15 am">11:15 am</option>
                                                    <option value="11:30 am">11:30 am</option>
                                                    <option value="11:45 am">11:45 am</option>
                                                    <option value="12:00 pm">12:00 pm</option>
                                                    <option value="12:15 pm">12:15 pm</option>
                                                    <option value="12:30 pm">12:30 pm</option>
                                                    <option value="12:45 pm">12:45 pm</option>
                                                    <option value="01:00 pm">01:00 pm</option>
                                                    <option value="01:15 pm">01:15 pm</option>
                                                    <option value="01:30 pm">01:30 pm</option>
                                                    <option value="01:45 pm">01:45 pm</option>
                                                    <option value="02:00 pm">02:00 pm</option>
                                                    <option value="02:15 pm">02:15 pm</option>
                                                    <option value="02:30 pm">02:30 pm</option>
                                                    <option value="02:45 pm">02:45 pm</option>
                                                    <option value="03:00 pm">03:00 pm</option>
                                                    <option value="03:15 pm">03:15 pm</option>
                                                    <option value="03:30 pm">03:30 pm</option>
                                                    <option value="03:45 pm">03:45 pm</option>
                                                    <option value="04:00 pm">04:00 pm</option>
                                                    <option value="04:15 pm">04:15 pm</option>
                                                    <option value="04:30 pm">04:30 pm</option>
                                                    <option value="04:45 pm">04:45 pm</option>
                                                    <option value="05:00 pm">05:00 pm</option>
                                                    <option value="05:15 pm">05:15 pm</option>
                                                    <option value="05:30 pm">05:30 pm</option>
                                                    <option value="05:45 pm">05:45 pm</option>
                                                    <option value="06:00 pm">06:00 pm</option>
                                                    <option value="06:15 pm">06:15 pm</option>
                                                    <option value="06:30 pm">06:30 pm</option>
                                                    <option value="06:45 pm">06:45 pm</option>
                                                    <option value="07:00 pm">07:00 pm</option>
                                                    <option value="07:15 pm">07:15 pm</option>
                                                    <option value="07:30 pm">07:30 pm</option>
                                                    <option value="07:45 pm">07:45 pm</option>
                                                    <option value="08:00 pm">08:00 pm</option>
                                                    <option value="08:15 pm">08:15 pm</option>
                                                    <option value="08:30 pm">08:30 pm</option>
                                                    <option value="08:45 pm">08:45 pm</option>
                                                    <option value="09:00 pm">09:00 pm</option>
                                                    <option value="09:15 pm">09:15 pm</option>
                                                    <option value="09:30 pm">09:30 pm</option>
                                                    <option value="09:45 pm">09:45 pm</option>
                                                    <option value="10:00 pm">10:00 pm</option>
                                                    <option value="10:15 pm">10:15 pm</option>
                                                    <option value="10:30 pm">10:30 pm</option>
                                                    <option value="10:45 pm">10:45 pm</option>
                                                    <option value="11:00 pm">11:00 pm</option>
                                                    <option value="11:15 pm">11:15 pm</option>
                                                    <option value="11:30 pm">11:30 pm</option>
                                                    <option value="11:45 pm">11:45 pm</option>
                                                    <option value="12:00 am">12:00 am</option>

                                                </select>
                                            </td><!-- .business-hour-open -->
                                            <td class="user-chosen-select-container">
                                                <select class="user-chosen-select" name="saturday_closed" id="saturday_closed">
                                                    <option value="closed">Closed</option>
                                                    <option value="open-24-hours">Open 24 Hours</option>
                                                    <option value="12:15 am">12:15 am</option>
                                                    <option value="12:30 am">12:30 am</option>
                                                    <option value="12:45 am">12:45 am</option>
                                                    <option value="01:00 am">01:00 am</option>
                                                    <option value="01:15 am">01:15 am</option>
                                                    <option value="01:30 am">01:30 am</option>
                                                    <option value="01:45 am">01:45 am</option>
                                                    <option value="02:00 am">02:00 am</option>
                                                    <option value="02:15 am">02:15 am</option>
                                                    <option value="02:30 am">02:30 am</option>
                                                    <option value="02:45 am">02:45 am</option>
                                                    <option value="03:00 am">03:00 am</option>
                                                    <option value="03:15 am">03:15 am</option>
                                                    <option value="03:30 am">03:30 am</option>
                                                    <option value="03:45 am">03:45 am</option>
                                                    <option value="04:00 am">04:00 am</option>
                                                    <option value="04:15 am">04:15 am</option>
                                                    <option value="04:30 am">04:30 am</option>
                                                    <option value="04:45 am">04:45 am</option>
                                                    <option value="05:00 am">05:00 am</option>
                                                    <option value="05:15 am">05:15 am</option>
                                                    <option value="05:30 am">05:30 am</option>
                                                    <option value="05:45 am">05:45 am</option>
                                                    <option value="06:00 am">06:00 am</option>
                                                    <option value="06:15 am">06:15 am</option>
                                                    <option value="06:30 am">06:30 am</option>
                                                    <option value="06:45 am">06:45 am</option>
                                                    <option value="07:00 am">07:00 am</option>
                                                    <option value="07:15 am">07:15 am</option>
                                                    <option value="07:30 am">07:30 am</option>
                                                    <option value="07:45 am">07:45 am</option>
                                                    <option value="08:00 am">08:00 am</option>
                                                    <option value="08:15 am">08:15 am</option>
                                                    <option value="08:30 am">08:30 am</option>
                                                    <option value="08:45 am">08:45 am</option>
                                                    <option value="09:00 am">09:00 am</option>
                                                    <option value="09:15 am">09:15 am</option>
                                                    <option value="09:30 am">09:30 am</option>
                                                    <option value="09:45 am">09:45 am</option>
                                                    <option value="10:00 am">10:00 am</option>
                                                    <option value="10:15 am">10:15 am</option>
                                                    <option value="10:30 am">10:30 am</option>
                                                    <option value="10:45 am">10:45 am</option>
                                                    <option value="11:00 am">11:00 am</option>
                                                    <option value="11:15 am">11:15 am</option>
                                                    <option value="11:30 am">11:30 am</option>
                                                    <option value="11:45 am">11:45 am</option>
                                                    <option value="12:00 pm">12:00 pm</option>
                                                    <option value="12:15 pm">12:15 pm</option>
                                                    <option value="12:30 pm">12:30 pm</option>
                                                    <option value="12:45 pm">12:45 pm</option>
                                                    <option value="01:00 pm">01:00 pm</option>
                                                    <option value="01:15 pm">01:15 pm</option>
                                                    <option value="01:30 pm">01:30 pm</option>
                                                    <option value="01:45 pm">01:45 pm</option>
                                                    <option value="02:00 pm">02:00 pm</option>
                                                    <option value="02:15 pm">02:15 pm</option>
                                                    <option value="02:30 pm">02:30 pm</option>
                                                    <option value="02:45 pm">02:45 pm</option>
                                                    <option value="03:00 pm">03:00 pm</option>
                                                    <option value="03:15 pm">03:15 pm</option>
                                                    <option value="03:30 pm">03:30 pm</option>
                                                    <option value="03:45 pm">03:45 pm</option>
                                                    <option value="04:00 pm">04:00 pm</option>
                                                    <option value="04:15 pm">04:15 pm</option>
                                                    <option value="04:30 pm">04:30 pm</option>
                                                    <option value="04:45 pm">04:45 pm</option>
                                                    <option value="05:00 pm">05:00 pm</option>
                                                    <option value="05:15 pm">05:15 pm</option>
                                                    <option value="05:30 pm">05:30 pm</option>
                                                    <option value="05:45 pm">05:45 pm</option>
                                                    <option value="06:00 pm">06:00 pm</option>
                                                    <option value="06:15 pm">06:15 pm</option>
                                                    <option value="06:30 pm">06:30 pm</option>
                                                    <option value="06:45 pm">06:45 pm</option>
                                                    <option value="07:00 pm">07:00 pm</option>
                                                    <option value="07:15 pm">07:15 pm</option>
                                                    <option value="07:30 pm">07:30 pm</option>
                                                    <option value="07:45 pm">07:45 pm</option>
                                                    <option value="08:00 pm">08:00 pm</option>
                                                    <option value="08:15 pm">08:15 pm</option>
                                                    <option value="08:30 pm">08:30 pm</option>
                                                    <option value="08:45 pm">08:45 pm</option>
                                                    <option value="09:00 pm">09:00 pm</option>
                                                    <option value="09:15 pm">09:15 pm</option>
                                                    <option value="09:30 pm">09:30 pm</option>
                                                    <option value="09:45 pm">09:45 pm</option>
                                                    <option value="10:00 pm">10:00 pm</option>
                                                    <option value="10:15 pm">10:15 pm</option>
                                                    <option value="10:30 pm">10:30 pm</option>
                                                    <option value="10:45 pm">10:45 pm</option>
                                                    <option value="11:00 pm">11:00 pm</option>
                                                    <option value="11:15 pm">11:15 pm</option>
                                                    <option value="11:30 pm">11:30 pm</option>
                                                    <option value="11:45 pm">11:45 pm</option>
                                                    <option value="12:00 am">12:00 am</option>

                                                </select>
                                            </td><!-- .business-hour-open -->
                                        </tr><!-- .business-opening-wrap -->
                                        <tr class="business-opening-wrap">
                                            <td class="business-day">Sunday</td>
                                            <td class="user-chosen-select-container">
                                                <select class="user-chosen-select" name="sunday_open" id="sunday_open">
                                                    <option value="closed">Closed</option>
                                                    <option value="open-24-hours">Open 24 Hours</option>
                                                    <option value="12:15 am">12:15 am</option>
                                                    <option value="12:30 am">12:30 am</option>
                                                    <option value="12:45 am">12:45 am</option>
                                                    <option value="01:00 am">01:00 am</option>
                                                    <option value="01:15 am">01:15 am</option>
                                                    <option value="01:30 am">01:30 am</option>
                                                    <option value="01:45 am">01:45 am</option>
                                                    <option value="02:00 am">02:00 am</option>
                                                    <option value="02:15 am">02:15 am</option>
                                                    <option value="02:30 am">02:30 am</option>
                                                    <option value="02:45 am">02:45 am</option>
                                                    <option value="03:00 am">03:00 am</option>
                                                    <option value="03:15 am">03:15 am</option>
                                                    <option value="03:30 am">03:30 am</option>
                                                    <option value="03:45 am">03:45 am</option>
                                                    <option value="04:00 am">04:00 am</option>
                                                    <option value="04:15 am">04:15 am</option>
                                                    <option value="04:30 am">04:30 am</option>
                                                    <option value="04:45 am">04:45 am</option>
                                                    <option value="05:00 am">05:00 am</option>
                                                    <option value="05:15 am">05:15 am</option>
                                                    <option value="05:30 am">05:30 am</option>
                                                    <option value="05:45 am">05:45 am</option>
                                                    <option value="06:00 am">06:00 am</option>
                                                    <option value="06:15 am">06:15 am</option>
                                                    <option value="06:30 am">06:30 am</option>
                                                    <option value="06:45 am">06:45 am</option>
                                                    <option value="07:00 am">07:00 am</option>
                                                    <option value="07:15 am">07:15 am</option>
                                                    <option value="07:30 am">07:30 am</option>
                                                    <option value="07:45 am">07:45 am</option>
                                                    <option value="08:00 am">08:00 am</option>
                                                    <option value="08:15 am">08:15 am</option>
                                                    <option value="08:30 am">08:30 am</option>
                                                    <option value="08:45 am">08:45 am</option>
                                                    <option value="09:00 am">09:00 am</option>
                                                    <option value="09:15 am">09:15 am</option>
                                                    <option value="09:30 am">09:30 am</option>
                                                    <option value="09:45 am">09:45 am</option>
                                                    <option value="10:00 am">10:00 am</option>
                                                    <option value="10:15 am">10:15 am</option>
                                                    <option value="10:30 am">10:30 am</option>
                                                    <option value="10:45 am">10:45 am</option>
                                                    <option value="11:00 am">11:00 am</option>
                                                    <option value="11:15 am">11:15 am</option>
                                                    <option value="11:30 am">11:30 am</option>
                                                    <option value="11:45 am">11:45 am</option>
                                                    <option value="12:00 pm">12:00 pm</option>
                                                    <option value="12:15 pm">12:15 pm</option>
                                                    <option value="12:30 pm">12:30 pm</option>
                                                    <option value="12:45 pm">12:45 pm</option>
                                                    <option value="01:00 pm">01:00 pm</option>
                                                    <option value="01:15 pm">01:15 pm</option>
                                                    <option value="01:30 pm">01:30 pm</option>
                                                    <option value="01:45 pm">01:45 pm</option>
                                                    <option value="02:00 pm">02:00 pm</option>
                                                    <option value="02:15 pm">02:15 pm</option>
                                                    <option value="02:30 pm">02:30 pm</option>
                                                    <option value="02:45 pm">02:45 pm</option>
                                                    <option value="03:00 pm">03:00 pm</option>
                                                    <option value="03:15 pm">03:15 pm</option>
                                                    <option value="03:30 pm">03:30 pm</option>
                                                    <option value="03:45 pm">03:45 pm</option>
                                                    <option value="04:00 pm">04:00 pm</option>
                                                    <option value="04:15 pm">04:15 pm</option>
                                                    <option value="04:30 pm">04:30 pm</option>
                                                    <option value="04:45 pm">04:45 pm</option>
                                                    <option value="05:00 pm">05:00 pm</option>
                                                    <option value="05:15 pm">05:15 pm</option>
                                                    <option value="05:30 pm">05:30 pm</option>
                                                    <option value="05:45 pm">05:45 pm</option>
                                                    <option value="06:00 pm">06:00 pm</option>
                                                    <option value="06:15 pm">06:15 pm</option>
                                                    <option value="06:30 pm">06:30 pm</option>
                                                    <option value="06:45 pm">06:45 pm</option>
                                                    <option value="07:00 pm">07:00 pm</option>
                                                    <option value="07:15 pm">07:15 pm</option>
                                                    <option value="07:30 pm">07:30 pm</option>
                                                    <option value="07:45 pm">07:45 pm</option>
                                                    <option value="08:00 pm">08:00 pm</option>
                                                    <option value="08:15 pm">08:15 pm</option>
                                                    <option value="08:30 pm">08:30 pm</option>
                                                    <option value="08:45 pm">08:45 pm</option>
                                                    <option value="09:00 pm">09:00 pm</option>
                                                    <option value="09:15 pm">09:15 pm</option>
                                                    <option value="09:30 pm">09:30 pm</option>
                                                    <option value="09:45 pm">09:45 pm</option>
                                                    <option value="10:00 pm">10:00 pm</option>
                                                    <option value="10:15 pm">10:15 pm</option>
                                                    <option value="10:30 pm">10:30 pm</option>
                                                    <option value="10:45 pm">10:45 pm</option>
                                                    <option value="11:00 pm">11:00 pm</option>
                                                    <option value="11:15 pm">11:15 pm</option>
                                                    <option value="11:30 pm">11:30 pm</option>
                                                    <option value="11:45 pm">11:45 pm</option>
                                                    <option value="12:00 am">12:00 am</option>

                                                </select>
                                            </td><!-- .business-hour-open -->
                                            <td class="user-chosen-select-container">
                                                <select class="user-chosen-select" name="sunday_closed" id="sunday_closed">
                                                    <option value="closed">Closed</option>
                                                    <option value="open-24-hours">Open 24 Hours</option>
                                                    <option value="12:15 am">12:15 am</option>
                                                    <option value="12:30 am">12:30 am</option>
                                                    <option value="12:45 am">12:45 am</option>
                                                    <option value="01:00 am">01:00 am</option>
                                                    <option value="01:15 am">01:15 am</option>
                                                    <option value="01:30 am">01:30 am</option>
                                                    <option value="01:45 am">01:45 am</option>
                                                    <option value="02:00 am">02:00 am</option>
                                                    <option value="02:15 am">02:15 am</option>
                                                    <option value="02:30 am">02:30 am</option>
                                                    <option value="02:45 am">02:45 am</option>
                                                    <option value="03:00 am">03:00 am</option>
                                                    <option value="03:15 am">03:15 am</option>
                                                    <option value="03:30 am">03:30 am</option>
                                                    <option value="03:45 am">03:45 am</option>
                                                    <option value="04:00 am">04:00 am</option>
                                                    <option value="04:15 am">04:15 am</option>
                                                    <option value="04:30 am">04:30 am</option>
                                                    <option value="04:45 am">04:45 am</option>
                                                    <option value="05:00 am">05:00 am</option>
                                                    <option value="05:15 am">05:15 am</option>
                                                    <option value="05:30 am">05:30 am</option>
                                                    <option value="05:45 am">05:45 am</option>
                                                    <option value="06:00 am">06:00 am</option>
                                                    <option value="06:15 am">06:15 am</option>
                                                    <option value="06:30 am">06:30 am</option>
                                                    <option value="06:45 am">06:45 am</option>
                                                    <option value="07:00 am">07:00 am</option>
                                                    <option value="07:15 am">07:15 am</option>
                                                    <option value="07:30 am">07:30 am</option>
                                                    <option value="07:45 am">07:45 am</option>
                                                    <option value="08:00 am">08:00 am</option>
                                                    <option value="08:15 am">08:15 am</option>
                                                    <option value="08:30 am">08:30 am</option>
                                                    <option value="08:45 am">08:45 am</option>
                                                    <option value="09:00 am">09:00 am</option>
                                                    <option value="09:15 am">09:15 am</option>
                                                    <option value="09:30 am">09:30 am</option>
                                                    <option value="09:45 am">09:45 am</option>
                                                    <option value="10:00 am">10:00 am</option>
                                                    <option value="10:15 am">10:15 am</option>
                                                    <option value="10:30 am">10:30 am</option>
                                                    <option value="10:45 am">10:45 am</option>
                                                    <option value="11:00 am">11:00 am</option>
                                                    <option value="11:15 am">11:15 am</option>
                                                    <option value="11:30 am">11:30 am</option>
                                                    <option value="11:45 am">11:45 am</option>
                                                    <option value="12:00 pm">12:00 pm</option>
                                                    <option value="12:15 pm">12:15 pm</option>
                                                    <option value="12:30 pm">12:30 pm</option>
                                                    <option value="12:45 pm">12:45 pm</option>
                                                    <option value="01:00 pm">01:00 pm</option>
                                                    <option value="01:15 pm">01:15 pm</option>
                                                    <option value="01:30 pm">01:30 pm</option>
                                                    <option value="01:45 pm">01:45 pm</option>
                                                    <option value="02:00 pm">02:00 pm</option>
                                                    <option value="02:15 pm">02:15 pm</option>
                                                    <option value="02:30 pm">02:30 pm</option>
                                                    <option value="02:45 pm">02:45 pm</option>
                                                    <option value="03:00 pm">03:00 pm</option>
                                                    <option value="03:15 pm">03:15 pm</option>
                                                    <option value="03:30 pm">03:30 pm</option>
                                                    <option value="03:45 pm">03:45 pm</option>
                                                    <option value="04:00 pm">04:00 pm</option>
                                                    <option value="04:15 pm">04:15 pm</option>
                                                    <option value="04:30 pm">04:30 pm</option>
                                                    <option value="04:45 pm">04:45 pm</option>
                                                    <option value="05:00 pm">05:00 pm</option>
                                                    <option value="05:15 pm">05:15 pm</option>
                                                    <option value="05:30 pm">05:30 pm</option>
                                                    <option value="05:45 pm">05:45 pm</option>
                                                    <option value="06:00 pm">06:00 pm</option>
                                                    <option value="06:15 pm">06:15 pm</option>
                                                    <option value="06:30 pm">06:30 pm</option>
                                                    <option value="06:45 pm">06:45 pm</option>
                                                    <option value="07:00 pm">07:00 pm</option>
                                                    <option value="07:15 pm">07:15 pm</option>
                                                    <option value="07:30 pm">07:30 pm</option>
                                                    <option value="07:45 pm">07:45 pm</option>
                                                    <option value="08:00 pm">08:00 pm</option>
                                                    <option value="08:15 pm">08:15 pm</option>
                                                    <option value="08:30 pm">08:30 pm</option>
                                                    <option value="08:45 pm">08:45 pm</option>
                                                    <option value="09:00 pm">09:00 pm</option>
                                                    <option value="09:15 pm">09:15 pm</option>
                                                    <option value="09:30 pm">09:30 pm</option>
                                                    <option value="09:45 pm">09:45 pm</option>
                                                    <option value="10:00 pm">10:00 pm</option>
                                                    <option value="10:15 pm">10:15 pm</option>
                                                    <option value="10:30 pm">10:30 pm</option>
                                                    <option value="10:45 pm">10:45 pm</option>
                                                    <option value="11:00 pm">11:00 pm</option>
                                                    <option value="11:15 pm">11:15 pm</option>
                                                    <option value="11:30 pm">11:30 pm</option>
                                                    <option value="11:45 pm">11:45 pm</option>
                                                    <option value="12:00 am">12:00 am</option>

                                                </select>
                                            </td><!-- .business-hour-open -->
                                        </tr><!-- .business-opening-wrap -->
                                        <tr class="business-opening-wrap">
                                            <td class="business-day w-50">Timezone</td>
                                            <td colspan="2" class="user-chosen-select-container">
                                                <select class="user-chosen-select">
                                                    <option value="0">Select a city</option>
                                                    <optgroup label="Africa">
                                                        <option value="Africa/Abidjan">Abidjan</option>
                                                        <option value="Africa/Accra">Accra</option>
                                                        <option value="Africa/Addis_Ababa">Addis Ababa</option>
                                                        <option value="Africa/Algiers">Algiers</option>
                                                        <option value="Africa/Asmara">Asmara</option>
                                                        <option value="Africa/Bamako">Bamako</option>
                                                        <option value="Africa/Bangui">Bangui</option>
                                                        <option value="Africa/Banjul">Banjul</option>
                                                        <option value="Africa/Bissau">Bissau</option>
                                                        <option value="Africa/Blantyre">Blantyre</option>
                                                        <option value="Africa/Brazzaville">Brazzaville</option>
                                                        <option value="Africa/Bujumbura">Bujumbura</option>
                                                        <option value="Africa/Cairo">Cairo</option>
                                                        <option value="Africa/Casablanca">Casablanca</option>
                                                        <option value="Africa/Ceuta">Ceuta</option>
                                                        <option value="Africa/Conakry">Conakry</option>
                                                        <option value="Africa/Dakar">Dakar</option>
                                                        <option value="Africa/Dar_es_Salaam">Dar es Salaam
                                                        </option>
                                                        <option value="Africa/Djibouti">Djibouti</option>
                                                        <option value="Africa/Douala">Douala</option>
                                                        <option value="Africa/El_Aaiun">El Aaiun</option>
                                                        <option value="Africa/Freetown">Freetown</option>
                                                        <option value="Africa/Gaborone">Gaborone</option>
                                                        <option value="Africa/Harare">Harare</option>
                                                        <option value="Africa/Johannesburg">Johannesburg
                                                        </option>
                                                        <option value="Africa/Juba">Juba</option>
                                                        <option value="Africa/Kampala">Kampala</option>
                                                        <option value="Africa/Khartoum">Khartoum</option>
                                                        <option value="Africa/Kigali">Kigali</option>
                                                        <option value="Africa/Kinshasa">Kinshasa</option>
                                                        <option value="Africa/Lagos">Lagos</option>
                                                        <option value="Africa/Libreville">Libreville</option>
                                                        <option value="Africa/Lome">Lome</option>
                                                        <option value="Africa/Luanda">Luanda</option>
                                                        <option value="Africa/Lubumbashi">Lubumbashi</option>
                                                        <option value="Africa/Lusaka">Lusaka</option>
                                                        <option value="Africa/Malabo">Malabo</option>
                                                        <option value="Africa/Maputo">Maputo</option>
                                                        <option value="Africa/Maseru">Maseru</option>
                                                        <option value="Africa/Mbabane">Mbabane</option>
                                                        <option value="Africa/Mogadishu">Mogadishu</option>
                                                        <option value="Africa/Monrovia">Monrovia</option>
                                                        <option value="Africa/Nairobi">Nairobi</option>
                                                        <option value="Africa/Ndjamena">Ndjamena</option>
                                                        <option value="Africa/Niamey">Niamey</option>
                                                        <option value="Africa/Nouakchott">Nouakchott</option>
                                                        <option value="Africa/Ouagadougou">Ouagadougou</option>
                                                        <option value="Africa/Porto-Novo">Porto-Novo</option>
                                                        <option value="Africa/Sao_Tome">Sao Tome</option>
                                                        <option value="Africa/Tripoli">Tripoli</option>
                                                        <option value="Africa/Tunis">Tunis</option>
                                                        <option value="Africa/Windhoek">Windhoek</option>
                                                    </optgroup>
                                                    <optgroup label="America">
                                                        <option value="America/Adak">Adak</option>
                                                        <option value="America/Anchorage">Anchorage</option>
                                                        <option value="America/Anguilla">Anguilla</option>
                                                        <option value="America/Antigua">Antigua</option>
                                                        <option value="America/Araguaina">Araguaina</option>
                                                        <option value="America/Argentina/Buenos_Aires">Argentina
                                                            - Buenos Aires
                                                        </option>
                                                        <option value="America/Argentina/Catamarca">Argentina -
                                                            Catamarca
                                                        </option>
                                                        <option value="America/Argentina/Cordoba">Argentina -
                                                            Cordoba
                                                        </option>
                                                        <option value="America/Argentina/Jujuy">Argentina -
                                                            Jujuy
                                                        </option>
                                                        <option value="America/Argentina/La_Rioja">Argentina -
                                                            La Rioja
                                                        </option>
                                                        <option value="America/Argentina/Mendoza">Argentina -
                                                            Mendoza
                                                        </option>
                                                        <option value="America/Argentina/Rio_Gallegos">Argentina
                                                            - Rio Gallegos
                                                        </option>
                                                        <option value="America/Argentina/Salta">Argentina -
                                                            Salta
                                                        </option>
                                                        <option value="America/Argentina/San_Juan">Argentina -
                                                            San Juan
                                                        </option>
                                                        <option value="America/Argentina/San_Luis">Argentina -
                                                            San Luis
                                                        </option>
                                                        <option value="America/Argentina/Tucuman">Argentina -
                                                            Tucuman
                                                        </option>
                                                        <option value="America/Argentina/Ushuaia">Argentina -
                                                            Ushuaia
                                                        </option>
                                                        <option value="America/Aruba">Aruba</option>
                                                        <option value="America/Asuncion">Asuncion</option>
                                                        <option value="America/Atikokan">Atikokan</option>
                                                        <option value="America/Bahia">Bahia</option>
                                                        <option value="America/Bahia_Banderas">Bahia Banderas
                                                        </option>
                                                        <option value="America/Barbados">Barbados</option>
                                                        <option value="America/Belem">Belem</option>
                                                        <option value="America/Belize">Belize</option>
                                                        <option value="America/Blanc-Sablon">Blanc-Sablon
                                                        </option>
                                                        <option value="America/Boa_Vista">Boa Vista</option>
                                                        <option value="America/Bogota">Bogota</option>
                                                        <option value="America/Boise">Boise</option>
                                                        <option value="America/Cambridge_Bay">Cambridge Bay
                                                        </option>
                                                        <option value="America/Campo_Grande">Campo Grande
                                                        </option>
                                                        <option value="America/Cancun">Cancun</option>
                                                        <option value="America/Caracas">Caracas</option>
                                                        <option value="America/Cayenne">Cayenne</option>
                                                        <option value="America/Cayman">Cayman</option>
                                                        <option value="America/Chicago">Chicago</option>
                                                        <option value="America/Chihuahua">Chihuahua</option>
                                                        <option value="America/Costa_Rica">Costa Rica</option>
                                                        <option value="America/Creston">Creston</option>
                                                        <option value="America/Cuiaba">Cuiaba</option>
                                                        <option value="America/Curacao">Curacao</option>
                                                        <option value="America/Danmarkshavn">Danmarkshavn
                                                        </option>
                                                        <option value="America/Dawson">Dawson</option>
                                                        <option value="America/Dawson_Creek">Dawson Creek
                                                        </option>
                                                        <option value="America/Denver">Denver</option>
                                                        <option value="America/Detroit">Detroit</option>
                                                        <option value="America/Dominica">Dominica</option>
                                                        <option value="America/Edmonton">Edmonton</option>
                                                        <option value="America/Eirunepe">Eirunepe</option>
                                                        <option value="America/El_Salvador">El Salvador</option>
                                                        <option value="America/Fortaleza">Fortaleza</option>
                                                        <option value="America/Fort_Nelson">Fort Nelson</option>
                                                        <option value="America/Glace_Bay">Glace Bay</option>
                                                        <option value="America/Goose_Bay">Goose Bay</option>
                                                        <option value="America/Grand_Turk">Grand Turk</option>
                                                        <option value="America/Grenada">Grenada</option>
                                                        <option value="America/Guadeloupe">Guadeloupe</option>
                                                        <option value="America/Guatemala">Guatemala</option>
                                                        <option value="America/Guayaquil">Guayaquil</option>
                                                        <option value="America/Guyana">Guyana</option>
                                                        <option value="America/Halifax">Halifax</option>
                                                        <option value="America/Havana">Havana</option>
                                                        <option value="America/Hermosillo">Hermosillo</option>
                                                        <option value="America/Indiana/Indianapolis">Indiana -
                                                            Indianapolis
                                                        </option>
                                                        <option value="America/Indiana/Knox">Indiana - Knox
                                                        </option>
                                                        <option value="America/Indiana/Marengo">Indiana -
                                                            Marengo
                                                        </option>
                                                        <option value="America/Indiana/Petersburg">Indiana -
                                                            Petersburg
                                                        </option>
                                                        <option value="America/Indiana/Tell_City">Indiana - Tell
                                                            City
                                                        </option>
                                                        <option value="America/Indiana/Vevay">Indiana - Vevay
                                                        </option>
                                                        <option value="America/Indiana/Vincennes">Indiana -
                                                            Vincennes
                                                        </option>
                                                        <option value="America/Indiana/Winamac">Indiana -
                                                            Winamac
                                                        </option>
                                                        <option value="America/Inuvik">Inuvik</option>
                                                        <option value="America/Iqaluit">Iqaluit</option>
                                                        <option value="America/Jamaica">Jamaica</option>
                                                        <option value="America/Juneau">Juneau</option>
                                                        <option value="America/Kentucky/Louisville">Kentucky -
                                                            Louisville
                                                        </option>
                                                        <option value="America/Kentucky/Monticello">Kentucky -
                                                            Monticello
                                                        </option>
                                                        <option value="America/Kralendijk">Kralendijk</option>
                                                        <option value="America/La_Paz">La Paz</option>
                                                        <option value="America/Lima">Lima</option>
                                                        <option value="America/Los_Angeles">Los Angeles</option>
                                                        <option value="America/Lower_Princes">Lower Princes
                                                        </option>
                                                        <option value="America/Maceio">Maceio</option>
                                                        <option value="America/Managua">Managua</option>
                                                        <option value="America/Manaus">Manaus</option>
                                                        <option value="America/Marigot">Marigot</option>
                                                        <option value="America/Martinique">Martinique</option>
                                                        <option value="America/Matamoros">Matamoros</option>
                                                        <option value="America/Mazatlan">Mazatlan</option>
                                                        <option value="America/Menominee">Menominee</option>
                                                        <option value="America/Merida">Merida</option>
                                                        <option value="America/Metlakatla">Metlakatla</option>
                                                        <option value="America/Mexico_City">Mexico City</option>
                                                        <option value="America/Miquelon">Miquelon</option>
                                                        <option value="America/Moncton">Moncton</option>
                                                        <option value="America/Monterrey">Monterrey</option>
                                                        <option value="America/Montevideo">Montevideo</option>
                                                        <option value="America/Montserrat">Montserrat</option>
                                                        <option value="America/Nassau">Nassau</option>
                                                        <option value="America/New_York">New York</option>
                                                        <option value="America/Nipigon">Nipigon</option>
                                                        <option value="America/Nome">Nome</option>
                                                        <option value="America/Noronha">Noronha</option>
                                                        <option value="America/North_Dakota/Beulah">North Dakota
                                                            - Beulah
                                                        </option>
                                                        <option value="America/North_Dakota/Center">North Dakota
                                                            - Center
                                                        </option>
                                                        <option value="America/North_Dakota/New_Salem">North
                                                            Dakota - New Salem
                                                        </option>
                                                        <option value="America/Nuuk">Nuuk</option>
                                                        <option value="America/Ojinaga">Ojinaga</option>
                                                        <option value="America/Panama">Panama</option>
                                                        <option value="America/Pangnirtung">Pangnirtung</option>
                                                        <option value="America/Paramaribo">Paramaribo</option>
                                                        <option value="America/Phoenix">Phoenix</option>
                                                        <option value="America/Port-au-Prince">Port-au-Prince
                                                        </option>
                                                        <option value="America/Port_of_Spain">Port of Spain
                                                        </option>
                                                        <option value="America/Porto_Velho">Porto Velho</option>
                                                        <option value="America/Puerto_Rico">Puerto Rico</option>
                                                        <option value="America/Punta_Arenas">Punta Arenas
                                                        </option>
                                                        <option value="America/Rainy_River">Rainy River</option>
                                                        <option value="America/Rankin_Inlet">Rankin Inlet
                                                        </option>
                                                        <option value="America/Recife">Recife</option>
                                                        <option value="America/Regina">Regina</option>
                                                        <option value="America/Resolute">Resolute</option>
                                                        <option value="America/Rio_Branco">Rio Branco</option>
                                                        <option value="America/Santarem">Santarem</option>
                                                        <option value="America/Santiago">Santiago</option>
                                                        <option value="America/Santo_Domingo">Santo Domingo
                                                        </option>
                                                        <option value="America/Sao_Paulo">Sao Paulo</option>
                                                        <option value="America/Scoresbysund">Scoresbysund
                                                        </option>
                                                        <option value="America/Sitka">Sitka</option>
                                                        <option value="America/St_Barthelemy">St Barthelemy
                                                        </option>
                                                        <option value="America/St_Johns">St Johns</option>
                                                        <option value="America/St_Kitts">St Kitts</option>
                                                        <option value="America/St_Lucia">St Lucia</option>
                                                        <option value="America/St_Thomas">St Thomas</option>
                                                        <option value="America/St_Vincent">St Vincent</option>
                                                        <option value="America/Swift_Current">Swift Current
                                                        </option>
                                                        <option value="America/Tegucigalpa">Tegucigalpa</option>
                                                        <option value="America/Thule">Thule</option>
                                                        <option value="America/Thunder_Bay">Thunder Bay</option>
                                                        <option value="America/Tijuana">Tijuana</option>
                                                        <option value="America/Toronto">Toronto</option>
                                                        <option value="America/Tortola">Tortola</option>
                                                        <option value="America/Vancouver">Vancouver</option>
                                                        <option value="America/Whitehorse">Whitehorse</option>
                                                        <option value="America/Winnipeg">Winnipeg</option>
                                                        <option value="America/Yakutat">Yakutat</option>
                                                        <option value="America/Yellowknife">Yellowknife</option>
                                                    </optgroup>
                                                    <optgroup label="Antarctica">
                                                        <option value="Antarctica/Casey">Casey</option>
                                                        <option value="Antarctica/Davis">Davis</option>
                                                        <option value="Antarctica/DumontDUrville">
                                                            DumontDUrville
                                                        </option>
                                                        <option value="Antarctica/Macquarie">Macquarie</option>
                                                        <option value="Antarctica/Mawson">Mawson</option>
                                                        <option value="Antarctica/McMurdo">McMurdo</option>
                                                        <option value="Antarctica/Palmer">Palmer</option>
                                                        <option value="Antarctica/Rothera">Rothera</option>
                                                        <option value="Antarctica/Syowa">Syowa</option>
                                                        <option value="Antarctica/Troll">Troll</option>
                                                        <option value="Antarctica/Vostok">Vostok</option>
                                                    </optgroup>
                                                    <optgroup label="Arctic">
                                                        <option value="Arctic/Longyearbyen">Longyearbyen
                                                        </option>
                                                    </optgroup>
                                                    <optgroup label="Asia">
                                                        <option value="Asia/Aden">Aden</option>
                                                        <option value="Asia/Almaty">Almaty</option>
                                                        <option value="Asia/Amman">Amman</option>
                                                        <option value="Asia/Anadyr">Anadyr</option>
                                                        <option value="Asia/Aqtau">Aqtau</option>
                                                        <option value="Asia/Aqtobe">Aqtobe</option>
                                                        <option value="Asia/Ashgabat">Ashgabat</option>
                                                        <option value="Asia/Atyrau">Atyrau</option>
                                                        <option value="Asia/Baghdad">Baghdad</option>
                                                        <option value="Asia/Bahrain">Bahrain</option>
                                                        <option value="Asia/Baku">Baku</option>
                                                        <option value="Asia/Bangkok">Bangkok</option>
                                                        <option value="Asia/Barnaul">Barnaul</option>
                                                        <option value="Asia/Beirut">Beirut</option>
                                                        <option value="Asia/Bishkek">Bishkek</option>
                                                        <option value="Asia/Brunei">Brunei</option>
                                                        <option value="Asia/Chita">Chita</option>
                                                        <option value="Asia/Choibalsan">Choibalsan</option>
                                                        <option value="Asia/Colombo">Colombo</option>
                                                        <option value="Asia/Damascus">Damascus</option>
                                                        <option value="Asia/Dhaka">Dhaka</option>
                                                        <option value="Asia/Dili">Dili</option>
                                                        <option value="Asia/Dubai">Dubai</option>
                                                        <option value="Asia/Dushanbe">Dushanbe</option>
                                                        <option value="Asia/Famagusta">Famagusta</option>
                                                        <option value="Asia/Gaza">Gaza</option>
                                                        <option value="Asia/Hebron">Hebron</option>
                                                        <option value="Asia/Ho_Chi_Minh">Ho Chi Minh</option>
                                                        <option value="Asia/Hong_Kong">Hong Kong</option>
                                                        <option value="Asia/Hovd">Hovd</option>
                                                        <option value="Asia/Irkutsk">Irkutsk</option>
                                                        <option value="Asia/Jakarta">Jakarta</option>
                                                        <option value="Asia/Jayapura">Jayapura</option>
                                                        <option value="Asia/Jerusalem">Jerusalem</option>
                                                        <option value="Asia/Kabul">Kabul</option>
                                                        <option value="Asia/Kamchatka">Kamchatka</option>
                                                        <option value="Asia/Karachi">Karachi</option>
                                                        <option value="Asia/Kathmandu">Kathmandu</option>
                                                        <option value="Asia/Khandyga">Khandyga</option>
                                                        <option value="Asia/Kolkata">Kolkata</option>
                                                        <option value="Asia/Krasnoyarsk">Krasnoyarsk</option>
                                                        <option value="Asia/Kuala_Lumpur">Kuala Lumpur</option>
                                                        <option value="Asia/Kuching">Kuching</option>
                                                        <option value="Asia/Kuwait">Kuwait</option>
                                                        <option value="Asia/Macau">Macau</option>
                                                        <option value="Asia/Magadan">Magadan</option>
                                                        <option value="Asia/Makassar">Makassar</option>
                                                        <option value="Asia/Manila">Manila</option>
                                                        <option value="Asia/Muscat">Muscat</option>
                                                        <option value="Asia/Nicosia">Nicosia</option>
                                                        <option value="Asia/Novokuznetsk">Novokuznetsk</option>
                                                        <option value="Asia/Novosibirsk">Novosibirsk</option>
                                                        <option value="Asia/Omsk">Omsk</option>
                                                        <option value="Asia/Oral">Oral</option>
                                                        <option value="Asia/Phnom_Penh">Phnom Penh</option>
                                                        <option value="Asia/Pontianak">Pontianak</option>
                                                        <option value="Asia/Pyongyang">Pyongyang</option>
                                                        <option value="Asia/Qatar">Qatar</option>
                                                        <option value="Asia/Qostanay">Qostanay</option>
                                                        <option value="Asia/Qyzylorda">Qyzylorda</option>
                                                        <option value="Asia/Riyadh">Riyadh</option>
                                                        <option value="Asia/Sakhalin">Sakhalin</option>
                                                        <option value="Asia/Samarkand">Samarkand</option>
                                                        <option value="Asia/Seoul">Seoul</option>
                                                        <option value="Asia/Shanghai">Shanghai</option>
                                                        <option value="Asia/Singapore">Singapore</option>
                                                        <option value="Asia/Srednekolymsk">Srednekolymsk
                                                        </option>
                                                        <option value="Asia/Taipei">Taipei</option>
                                                        <option value="Asia/Tashkent">Tashkent</option>
                                                        <option value="Asia/Tbilisi">Tbilisi</option>
                                                        <option value="Asia/Tehran">Tehran</option>
                                                        <option value="Asia/Thimphu">Thimphu</option>
                                                        <option value="Asia/Tokyo">Tokyo</option>
                                                        <option value="Asia/Tomsk">Tomsk</option>
                                                        <option value="Asia/Ulaanbaatar">Ulaanbaatar</option>
                                                        <option value="Asia/Urumqi">Urumqi</option>
                                                        <option value="Asia/Ust-Nera">Ust-Nera</option>
                                                        <option value="Asia/Vientiane">Vientiane</option>
                                                        <option value="Asia/Vladivostok">Vladivostok</option>
                                                        <option value="Asia/Yakutsk">Yakutsk</option>
                                                        <option value="Asia/Yangon">Yangon</option>
                                                        <option value="Asia/Yekaterinburg">Yekaterinburg
                                                        </option>
                                                        <option value="Asia/Yerevan">Yerevan</option>
                                                    </optgroup>
                                                    <optgroup label="Atlantic">
                                                        <option value="Atlantic/Azores">Azores</option>
                                                        <option value="Atlantic/Bermuda">Bermuda</option>
                                                        <option value="Atlantic/Canary">Canary</option>
                                                        <option value="Atlantic/Cape_Verde">Cape Verde</option>
                                                        <option value="Atlantic/Faroe">Faroe</option>
                                                        <option value="Atlantic/Madeira">Madeira</option>
                                                        <option value="Atlantic/Reykjavik">Reykjavik</option>
                                                        <option value="Atlantic/South_Georgia">South Georgia
                                                        </option>
                                                        <option value="Atlantic/Stanley">Stanley</option>
                                                        <option value="Atlantic/St_Helena">St Helena</option>
                                                    </optgroup>
                                                    <optgroup label="Australia">
                                                        <option value="Australia/Adelaide">Adelaide</option>
                                                        <option value="Australia/Brisbane">Brisbane</option>
                                                        <option value="Australia/Broken_Hill">Broken Hill
                                                        </option>
                                                        <option value="Australia/Currie">Currie</option>
                                                        <option value="Australia/Darwin">Darwin</option>
                                                        <option value="Australia/Eucla">Eucla</option>
                                                        <option value="Australia/Hobart">Hobart</option>
                                                        <option value="Australia/Lindeman">Lindeman</option>
                                                        <option value="Australia/Lord_Howe">Lord Howe</option>
                                                        <option value="Australia/Melbourne">Melbourne</option>
                                                        <option value="Australia/Perth">Perth</option>
                                                        <option value="Australia/Sydney">Sydney</option>
                                                    </optgroup>
                                                    <optgroup label="Europe">
                                                        <option value="Europe/Amsterdam">Amsterdam</option>
                                                        <option value="Europe/Andorra">Andorra</option>
                                                        <option value="Europe/Astrakhan">Astrakhan</option>
                                                        <option value="Europe/Athens">Athens</option>
                                                        <option value="Europe/Belgrade">Belgrade</option>
                                                        <option value="Europe/Berlin">Berlin</option>
                                                        <option value="Europe/Bratislava">Bratislava</option>
                                                        <option value="Europe/Brussels">Brussels</option>
                                                        <option value="Europe/Bucharest">Bucharest</option>
                                                        <option value="Europe/Budapest">Budapest</option>
                                                        <option value="Europe/Busingen">Busingen</option>
                                                        <option value="Europe/Chisinau">Chisinau</option>
                                                        <option value="Europe/Copenhagen">Copenhagen</option>
                                                        <option value="Europe/Dublin">Dublin</option>
                                                        <option value="Europe/Gibraltar">Gibraltar</option>
                                                        <option value="Europe/Guernsey">Guernsey</option>
                                                        <option value="Europe/Helsinki">Helsinki</option>
                                                        <option value="Europe/Isle_of_Man">Isle of Man</option>
                                                        <option value="Europe/Istanbul">Istanbul</option>
                                                        <option value="Europe/Jersey">Jersey</option>
                                                        <option value="Europe/Kaliningrad">Kaliningrad</option>
                                                        <option value="Europe/Kiev">Kiev</option>
                                                        <option value="Europe/Kirov">Kirov</option>
                                                        <option value="Europe/Lisbon">Lisbon</option>
                                                        <option value="Europe/Ljubljana">Ljubljana</option>
                                                        <option value="Europe/London">London</option>
                                                        <option value="Europe/Luxembourg">Luxembourg</option>
                                                        <option value="Europe/Madrid">Madrid</option>
                                                        <option value="Europe/Malta">Malta</option>
                                                        <option value="Europe/Mariehamn">Mariehamn</option>
                                                        <option value="Europe/Minsk">Minsk</option>
                                                        <option value="Europe/Monaco">Monaco</option>
                                                        <option value="Europe/Moscow">Moscow</option>
                                                        <option value="Europe/Oslo">Oslo</option>
                                                        <option value="Europe/Paris">Paris</option>
                                                        <option value="Europe/Podgorica">Podgorica</option>
                                                        <option value="Europe/Prague">Prague</option>
                                                        <option value="Europe/Riga">Riga</option>
                                                        <option value="Europe/Rome">Rome</option>
                                                        <option value="Europe/Samara">Samara</option>
                                                        <option value="Europe/San_Marino">San Marino</option>
                                                        <option value="Europe/Sarajevo">Sarajevo</option>
                                                        <option value="Europe/Saratov">Saratov</option>
                                                        <option value="Europe/Simferopol">Simferopol</option>
                                                        <option value="Europe/Skopje">Skopje</option>
                                                        <option value="Europe/Sofia">Sofia</option>
                                                        <option value="Europe/Stockholm">Stockholm</option>
                                                        <option value="Europe/Tallinn">Tallinn</option>
                                                        <option value="Europe/Tirane">Tirane</option>
                                                        <option value="Europe/Ulyanovsk">Ulyanovsk</option>
                                                        <option value="Europe/Uzhgorod">Uzhgorod</option>
                                                        <option value="Europe/Vaduz">Vaduz</option>
                                                        <option value="Europe/Vatican">Vatican</option>
                                                        <option value="Europe/Vienna">Vienna</option>
                                                        <option value="Europe/Vilnius">Vilnius</option>
                                                        <option value="Europe/Volgograd">Volgograd</option>
                                                        <option value="Europe/Warsaw">Warsaw</option>
                                                        <option value="Europe/Zagreb">Zagreb</option>
                                                        <option value="Europe/Zaporozhye">Zaporozhye</option>
                                                        <option value="Europe/Zurich">Zurich</option>
                                                    </optgroup>
                                                    <optgroup label="Indian">
                                                        <option value="Indian/Antananarivo">Antananarivo
                                                        </option>
                                                        <option value="Indian/Chagos">Chagos</option>
                                                        <option value="Indian/Christmas">Christmas</option>
                                                        <option value="Indian/Cocos">Cocos</option>
                                                        <option value="Indian/Comoro">Comoro</option>
                                                        <option value="Indian/Kerguelen">Kerguelen</option>
                                                        <option value="Indian/Mahe">Mahe</option>
                                                        <option value="Indian/Maldives">Maldives</option>
                                                        <option value="Indian/Mauritius">Mauritius</option>
                                                        <option value="Indian/Mayotte">Mayotte</option>
                                                        <option value="Indian/Reunion">Reunion</option>
                                                    </optgroup>
                                                    <optgroup label="Pacific">
                                                        <option value="Pacific/Apia">Apia</option>
                                                        <option value="Pacific/Auckland">Auckland</option>
                                                        <option value="Pacific/Bougainville">Bougainville
                                                        </option>
                                                        <option value="Pacific/Chatham">Chatham</option>
                                                        <option value="Pacific/Chuuk">Chuuk</option>
                                                        <option value="Pacific/Easter">Easter</option>
                                                        <option value="Pacific/Efate">Efate</option>
                                                        <option value="Pacific/Enderbury">Enderbury</option>
                                                        <option value="Pacific/Fakaofo">Fakaofo</option>
                                                        <option value="Pacific/Fiji">Fiji</option>
                                                        <option value="Pacific/Funafuti">Funafuti</option>
                                                        <option value="Pacific/Galapagos">Galapagos</option>
                                                        <option value="Pacific/Gambier">Gambier</option>
                                                        <option value="Pacific/Guadalcanal">Guadalcanal</option>
                                                        <option value="Pacific/Guam">Guam</option>
                                                        <option value="Pacific/Honolulu">Honolulu</option>
                                                        <option value="Pacific/Kiritimati">Kiritimati</option>
                                                        <option value="Pacific/Kosrae">Kosrae</option>
                                                        <option value="Pacific/Kwajalein">Kwajalein</option>
                                                        <option value="Pacific/Majuro">Majuro</option>
                                                        <option value="Pacific/Marquesas">Marquesas</option>
                                                        <option value="Pacific/Midway">Midway</option>
                                                        <option value="Pacific/Nauru">Nauru</option>
                                                        <option value="Pacific/Niue">Niue</option>
                                                        <option value="Pacific/Norfolk">Norfolk</option>
                                                        <option value="Pacific/Noumea">Noumea</option>
                                                        <option value="Pacific/Pago_Pago">Pago Pago</option>
                                                        <option value="Pacific/Palau">Palau</option>
                                                        <option value="Pacific/Pitcairn">Pitcairn</option>
                                                        <option value="Pacific/Pohnpei">Pohnpei</option>
                                                        <option value="Pacific/Port_Moresby">Port Moresby
                                                        </option>
                                                        <option value="Pacific/Rarotonga">Rarotonga</option>
                                                        <option value="Pacific/Saipan">Saipan</option>
                                                        <option value="Pacific/Tahiti">Tahiti</option>
                                                        <option value="Pacific/Tarawa">Tarawa</option>
                                                        <option value="Pacific/Tongatapu">Tongatapu</option>
                                                        <option value="Pacific/Wake">Wake</option>
                                                        <option value="Pacific/Wallis">Wallis</option>
                                                    </optgroup>
                                                    <optgroup label="UTC">
                                                        <option value="UTC">UTC</option>
                                                    </optgroup>
                                                    <optgroup label="Manual Offsets">
                                                        <option value="UTC-12">UTC-12</option>
                                                        <option value="UTC-11.5">UTC-11:30</option>
                                                        <option value="UTC-11">UTC-11</option>
                                                        <option value="UTC-10.5">UTC-10:30</option>
                                                        <option value="UTC-10">UTC-10</option>
                                                        <option value="UTC-9.5">UTC-9:30</option>
                                                        <option value="UTC-9">UTC-9</option>
                                                        <option value="UTC-8.5">UTC-8:30</option>
                                                        <option value="UTC-8">UTC-8</option>
                                                        <option value="UTC-7.5">UTC-7:30</option>
                                                        <option value="UTC-7">UTC-7</option>
                                                        <option value="UTC-6.5">UTC-6:30</option>
                                                        <option value="UTC-6">UTC-6</option>
                                                        <option value="UTC-5.5">UTC-5:30</option>
                                                        <option value="UTC-5">UTC-5</option>
                                                        <option value="UTC-4.5">UTC-4:30</option>
                                                        <option value="UTC-4">UTC-4</option>
                                                        <option value="UTC-3.5">UTC-3:30</option>
                                                        <option value="UTC-3">UTC-3</option>
                                                        <option value="UTC-2.5">UTC-2:30</option>
                                                        <option value="UTC-2">UTC-2</option>
                                                        <option value="UTC-1.5">UTC-1:30</option>
                                                        <option value="UTC-1">UTC-1</option>
                                                        <option value="UTC-0.5">UTC-0:30</option>
                                                        <option value="UTC+0">UTC+0</option>
                                                        <option value="UTC+0.5">UTC+0:30</option>
                                                        <option value="UTC+1">UTC+1</option>
                                                        <option value="UTC+1.5">UTC+1:30</option>
                                                        <option value="UTC+2">UTC+2</option>
                                                        <option value="UTC+2.5">UTC+2:30</option>
                                                        <option value="UTC+3">UTC+3</option>
                                                        <option value="UTC+3.5">UTC+3:30</option>
                                                        <option value="UTC+4">UTC+4</option>
                                                        <option value="UTC+4.5">UTC+4:30</option>
                                                        <option value="UTC+5">UTC+5</option>
                                                        <option value="UTC+5.5">UTC+5:30</option>
                                                        <option value="UTC+5.75">UTC+5:45</option>
                                                        <option value="UTC+6">UTC+6</option>
                                                        <option value="UTC+6.5">UTC+6:30</option>
                                                        <option value="UTC+7">UTC+7</option>
                                                        <option value="UTC+7.5">UTC+7:30</option>
                                                        <option value="UTC+8">UTC+8</option>
                                                        <option value="UTC+8.5">UTC+8:30</option>
                                                        <option value="UTC+8.75">UTC+8:45</option>
                                                        <option value="UTC+9">UTC+9</option>
                                                        <option value="UTC+9.5">UTC+9:30</option>
                                                        <option value="UTC+10">UTC+10</option>
                                                        <option value="UTC+10.5">UTC+10:30</option>
                                                        <option value="UTC+11">UTC+11</option>
                                                        <option value="UTC+11.5">UTC+11:30</option>
                                                        <option value="UTC+12">UTC+12</option>
                                                        <option value="UTC+12.75">UTC+12:45</option>
                                                        <option value="UTC+13">UTC+13</option>
                                                        <option value="UTC+13.75">UTC+13:45</option>
                                                        <option value="UTC+14">UTC+14</option>
                                                    </optgroup>
                                                </select>
                                            </td><!-- .business-hour-open -->
                                        </tr><!-- .business-opening-wrap -->
                                        </tbody>
                                    </table>
                                </div><!-- end contact-form-action -->
                            </div><!-- end block-card-body -->
                        </div><!-- end block-card -->
                        <div class="block-card mb-4">
                            <div class="block-card-header">
                                <h2 class="widget-title">Social Media</h2>
                                <div class="stroke-shape"></div>
                            </div><!-- end block-card-header -->
                            <div class="block-card-body">
                                <form method="post" class="form-box row">
                                     <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">Email<span
                                                    class="text-gray font-size-12">(optional)</span></label>
                                            <div class="form-group">
                                                <span class="la la-mail-bulk form-icon"></span>
                                                <input class="form-control" type="text" name="email"
                                                       placeholder="example@mail.com">
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-6 -->
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">Facebook Link <span
                                                    class="text-gray font-size-12">(optional)</span></label>
                                            <div class="form-group">
                                                <span class="la la-facebook-f form-icon"></span>
                                                <input class="form-control" type="text" name="facebook"
                                                       placeholder="https://">
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-12 -->
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">Twitter Link <span
                                                    class="text-gray font-size-12">(optional)</span></label>
                                            <div class="form-group">
                                                <span class="la la-twitter form-icon"></span>
                                                <input class="form-control" type="text" name="twitter"
                                                       placeholder="https://">
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-6 -->
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">Instagram Link<span
                                                    class="text-gray font-size-12">(optional)</span></label>
                                            <div class="form-group">
                                                <span class="la la-instagram form-icon"></span>
                                                <input class="form-control" type="text" name="instagram"
                                                       placeholder="https://">
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-6 -->
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">Skype Link<span
                                                    class="text-gray font-size-12">(optional)</span></label>
                                            <div class="form-group">
                                                <span class="la la-skype form-icon"></span>
                                                <input class="form-control" type="text" name="skype"
                                                       placeholder="https://">
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-6 -->
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">Linkedin Link<span
                                                    class="text-gray font-size-12">(optional)</span></label>
                                            <div class="form-group">
                                                <span class="la la-linkedin form-icon"></span>
                                                <input class="form-control" type="text" name="linkedin"
                                                       placeholder="https://">
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-6 -->
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">Youtube Link<span
                                                    class="text-gray font-size-12">(optional)</span></label>
                                            <div class="form-group">
                                                <span class="la la-youtube form-icon"></span>
                                                <input class="form-control" type="text" name="youtube"
                                                       placeholder="https://">
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-6 -->
                                     <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">Trip Advisor Link<span
                                                    class="text-gray font-size-12">(optional)</span></label>
                                            <div class="form-group">
                                                <span class="la la-tripadvisor form-icon"></span>
                                                <input class="form-control" type="text" name="tripadvisor"
                                                       placeholder="https://">
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-6 -->

                                </form>
                            </div><!-- end block-card-body -->
                        </div><!-- end block-card -->
                        <div class="block-card mb-4">
                            <div class="block-card-header">
                                <h2 class="widget-title">Media</h2>
                                <div class="stroke-shape"></div>
                            </div><!-- block-card-header -->
                            <div class="block-card-body">
                                <label class="label-text">Upload Business Logo</label>
                                <div class="file-upload-wrap file-upload-wrap-2">
                                    <input type="file" name="files[]"
                                           class="multi file-upload-input with-preview" multiple>
                                    <span class="file-upload-text"><i class="la la-photo mr-2"></i>Choose a file</span>
                                </div><!-- file-upload-wrap -->
                                <label class="label-text">Gallery Images</label>
                                <div class="file-upload-wrap">
                                    <input type="file" name="files[]"
                                           class="multi file-upload-input with-preview" multiple>
                                    <span class="file-upload-text"><i class="la la-upload mr-2"></i>Drop files here or click to upload</span>
                                </div><!-- file-upload-wrap -->

                            </div><!-- end block-card-body -->
                        </div><!-- end block-card -->
                        <div class="block-card mb-4">
                            <div class="block-card-header">
                                <h3 class="widget-title">Amenities</h3>
                                <div class="stroke-shape"></div>
                            </div><!-- block-card-header -->
                            <div class="block-card-body row">
                                <div class="col-lg-4 custom-checkbox">
                                    <input type="checkbox" id="securityCameras">
                                    <label for="securityCameras">Security Cameras</label>
                                </div><!-- end custom-checkbox -->
                                <div class="col-lg-4 custom-checkbox">
                                    <input type="checkbox" id="elevatorInBuilding">
                                    <label for="elevatorInBuilding">Elevator in Building</label>
                                </div><!-- end custom-checkbox -->
                                <div class="col-lg-4 custom-checkbox">
                                    <input type="checkbox" id="wirelessInternet">
                                    <label for="wirelessInternet">Wireless Internet</label>
                                </div><!-- end custom-checkbox -->
                                <div class="col-lg-4 custom-checkbox">
                                    <input type="checkbox" id="WheelchairAccessible">
                                    <label for="WheelchairAccessible">Wheelchair Accessible</label>
                                </div><!-- end custom-checkbox -->
                                <div class="col-lg-4 custom-checkbox">
                                    <input type="checkbox" id="LaundryRoomInBuilding">
                                    <label for="LaundryRoomInBuilding">Laundry Room in Building</label>
                                </div><!-- end custom-checkbox -->
                                <div class="col-lg-4 custom-checkbox">
                                    <input type="checkbox" id="AlarmSystem">
                                    <label for="AlarmSystem">Alarm System</label>
                                </div><!-- end custom-checkbox -->
                                <div class="col-lg-4 custom-checkbox">
                                    <input type="checkbox" id="SmokingAllowed">
                                    <label for="SmokingAllowed">Smoking Allowed</label>
                                </div><!-- end custom-checkbox -->
                                <div class="col-lg-4 custom-checkbox">
                                    <input type="checkbox" id="FreeParkingOnStreet">
                                    <label for="FreeParkingOnStreet">Free Parking on Street</label>
                                </div><!-- end custom-checkbox -->
                                <div class="col-lg-4 custom-checkbox">
                                    <input type="checkbox" id="FriendlyWorkspace">
                                    <label for="FriendlyWorkspace">Friendly Workspace</label>
                                </div><!-- end custom-checkbox -->
                                <div class="col-lg-4 custom-checkbox">
                                    <input type="checkbox" id="Electricity">
                                    <label for="Electricity">Electricity</label>
                                </div><!-- end custom-checkbox -->
                                <div class="col-lg-4 custom-checkbox">
                                    <input type="checkbox" id="AttachedGarage">
                                    <label for="AttachedGarage">Attached Garage</label>
                                </div><!-- end custom-checkbox -->
                                <div class="col-lg-4 custom-checkbox">
                                    <input type="checkbox" id="BikeParking">
                                    <label for="BikeParking">Bike Parking</label>
                                </div><!-- end custom-checkbox -->
                                <div class="col-lg-4 custom-checkbox">
                                    <input type="checkbox" id="Telephone">
                                    <label for="Telephone">Telephone</label>
                                </div><!-- end custom-checkbox -->
                            </div><!-- end block-card-body -->
                        </div><!-- end block-card -->
                        <div class="submit-wrap pt-4">
                            <div class="custom-checkbox">
                                <input type="checkbox" id="agreeChb2">
                                <label for="agreeChb2" class="text-gray">By continuing, you agree to Listhub's
                                    <a href="terms-and-conditions.html" class="text-color-2">Terms of
                                        Service</a> and
                                    acknowledge our <a href="privacy-policy.html" class="text-color-2">Privacy
                                        Policy</a>.
                                </label>
                            </div><!-- end custom-checkbox -->
                            <div class="btn-box mt-4">
                                <button type="submit" class="theme-btn gradient-btn border-0">Save & Preview
                                </button>
                            </div><!-- end btn-box -->
                        </div><!-- end submit-wrap -->
                    </div><!-- end block-card-body -->
                </div><!-- end block-card -->
            </div><!-- end col-lg-7 -->
        </div><!-- end row -->
    </div><!-- end dashboard-inner-body-container -->
@endsection
@section('js')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDZruSH0153zHVC2iFBJxWmXnHqAWSn5gw&v=3.exp&sensor=false&libraries=places"></script>
    <script>
        let places, input, address, city, plus_code, phone, website, country;
        var latitude, longitude, html
        google.maps.event.addDomListener(window, "load", function () {
            var places = new google.maps.places.Autocomplete(
                document.getElementById("searchTextField")
            );
            google.maps.event.addListener(places, "place_changed", function () {
                var place = places.getPlace();
                console.log(place);
                latitude = place.geometry.location.lat();
                longitude = place.geometry.location.lng();
                address = place.formatted_address;
                city = place.address_components[0].long_name;
                plus_code = place.plus_code.compound_code;
                if (place.formatted_phone_number){
                    phone = place.formatted_phone_number;
                    $("#phone").val(phone)
                }
                if (place.website){
                    website = place.website;
                    $("#website").val(website)
                }
                html = `<iframe
                    width="600"
                    height="450"
                    style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                    src="https://maps.google.com/maps?q=${latitude},${longitude}&hl=es;z=14&output=embed">
                  </iframe>;`
                $("#result").html(html)
                $("#code").val(html)
                $("#longitude").val(longitude)
                $("#latitude").val(latitude)
                $("#address").val(address)
                $("#city").val(city)
                $("#plus_code").val(plus_code)


            });
        });
    </script>
@endsection
