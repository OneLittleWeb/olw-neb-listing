@extends('admin.master_admin')
@section('title', 'Business')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css"/>
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection
@section('content')
    <div class="container-fluid dashboard-inner-body-container">
        <div class="breadcrumb-content d-sm-flex align-items-center justify-content-between mb-4">
            <div class="section-heading">
                <h2 class="sec__title font-size-24 mb-0">Howdy, {{ auth()->user()->name }}</h2>
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
                        <h2 class="widget-title pb-0">All Business</h2>
                    </div>
                    <div class="block-card-body">
                        <div class="my-table table-responsive">
                            <table class="table table-bordered data_table" id="organization_table">
                                <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Total Reviews</th>
                                    <th>Rate Stars</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div><!-- end block-card-body -->
                </div><!-- end block-card -->
            </div><!-- end col-lg-7 -->
        </div><!-- end row -->
    </div><!-- end dashboard-inner-body-container -->
@endsection
@section('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">
        $(function () {
            $.fn.dataTable.ext.errMode = 'throw';
            let table = $('.data_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.reviews.business') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'organization_name', name: 'organization_name'},
                    {data: 'reviews_total_count', name: 'reviews_total_count'},
                    {data: 'rate_stars', name: 'rate_stars'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });

        });
    </script>
@endsection
