@extends('layouts.master')
@section('title', "Nebraskalisting THE Local Business Directory | Claim Your Business")
@section('meta_description', "nebraskalisting, best places in nebraska")
@section('content')
    <section>
        <div class="container main_container">
            <div class="row">
                <div class="col-lg-12">
                    <div
                        class="breadcrumb-content breadcrumb-content-2 d-flex flex-wrap align-items-end justify-content-between margin-bottom-30px">
                        <div class="section-heading">
                            <ul class="list-items bread-list bread-list-2 bg-transparent rounded-0 p-0 text-capitalize">
                                <li><a href="{{ route('home') }}">Home</a></li>
                                <li>
                                    Claim Profile
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <h5 class="card-header">Claim Your Business Profile</h5>
                <div class="card-body text-dark">
                    <p class="card-text">Claim your ownership of <a
                            href="{{ route('city.wise.organization', ['city_slug' => $organization->city->slug, 'organization_slug' => $organization->slug]) }}">{{ $organization->organization_name }}</a>
                        profile page with one of the
                        methods below. After claiming a profile you will be able to edit all your business
                        information.</p>

                    <div class="main-search-input-item user-chosen-select-container margin-top-10px">
                        <label>Business state <span class="required">*</span></label>
                        <select class="user-chosen-select" name="search_city" id="search_city">
                            @foreach($cities as $search_city)
                                <option class="text-capitalize" value="{{ $search_city->id }}">{{ $search_city->name }},
                                    NE
                                </option>
                            @endforeach
                        </select>
                    </div><!-- end main-search-input-item -->

                    <div
                        class="main-search-input-item business-access-search-input-item user-chosen-select-container margin-top-10px">
                        <label>I have access to <span class="required">*</span></label>
                        <select class="user-chosen-select" name="search_city" id="search_city"
                                onchange="businessAccess(event)">
                            <option class="text-capitalize" value="">-</option>
                            @if($organization->organization_website)
                                <option class="text-capitalize" value="email_on_business_domain">Email on business
                                    domain
                                </option>
                            @endif
                            <option class="text-capitalize" value="nothing_out_of_this">Nothing out of this</option>
                        </select>
                    </div><!-- end main-search-input-item -->

                    <div id="business_verification_data_div">

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script>
        function businessAccess(event) {
            let selected_value = event.target.value;
            let business_verification_data = document.getElementById('business_verification_data_div');
            if (selected_value === 'email_on_business_domain') {
                business_verification_data.innerHTML = '<p class="padding-top-20px">We will send an email with registration link</p>' +
                    '                        <div' +
                    '                            class="main-search-input-item business-access-search-input-item input-group margin-top-20px">' +
                    '                            <input class="form-control rounded-0 looking-for" type="search" id="search-from-header"' +
                    '                                   name="looking_for" placeholder="What are you looking for?" autocomplete="off"' +
                    '                                   required>' +
                    '                            <div class="input-group-prepend">' +
                    '                                <span class="input-group-text"' +
                    '                                      id="inputGroupPrepend2">{{ '@' . $organization->organization_website }}</span>' +
                    '                            </div>' +
                    '                        </div>';
            } else if (selected_value === 'nothing_out_of_this') {
                business_verification_data.innerHTML = '<p class="padding-top-20px"><a href="#">Please contact us to continue the verification process</a></p>';
            } else {
                business_verification_data.innerHTML = '';
            }
        }
    </script>
@endsection
