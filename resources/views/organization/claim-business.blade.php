@extends('layouts.master')
@section('title', "Claim your business - Nebraskalisting")
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
                <div class="card-body">
                    <p class="card-text text-dark">Claim your ownership of <a href="{{ route('city.wise.organization', ['city_slug' => $organization->city->slug, 'organization_slug' => $organization->slug]) }}">{{ $organization->organization_name }}</a> profile page with one of the
                        methods below. After claiming a profile you will be able to edit all your business
                        information.</p>
                </div>
            </div>
        </div>
    </section>
@endsection
