@extends('admin.master_admin')
@section('title', 'Organizations')
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
                <li>Reviews</li>
            </ul>
        </div><!-- end breadcrumb-content -->
        <div class="row">
            <div class="col-md-12">
                <div class="block-card dashboard-card mb-4 px-0">
                    <div
                        class="block-card-header d-flex flex-wrap align-items-center justify-content-between px-4 border-bottom-0 pb-0">
                        <h2 class="widget-title pb-0">All Reviews</h2>
                    </div>
                    <div class="block-card-body">
                        <div class="my-table table-responsive">
                            <table class="table align-items-center table-flush mb-0" id="category_table">
                                <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th>Business Name</th>
                                    <th>Reviewer Name</th>
                                    <th>Review Date</th>
                                    <th>Review Rate Stars</th>
                                    <th>Review Thumbs</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($reviews as $key => $review)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{Str::title($review->organization->organization_name)}}</td>
                                        <td>{{Str::title($review->reviewer_name)}}</td>
                                        <td>{{$review->review_date}}</td>
                                        <td>{{$review->review_rate_stars}}</td>
                                        <td>{{$review->review_thumbs_up_value}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div><!-- end block-card-body -->
                    {{$reviews->links()}}
                </div><!-- end block-card -->
            </div><!-- end col-lg-7 -->
        </div><!-- end row -->
    </div><!-- end dashboard-inner-body-container -->
@endsection
@section('js')

@endsection
