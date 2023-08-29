@extends('admin.master_admin')
@section('title', 'Business')
@section('content')
    <div class="container-fluid dashboard-inner-body-container">
        <div class="breadcrumb-content d-sm-flex align-items-center justify-content-between mb-4">
            <div class="section-heading">
                <h2 class="sec__title font-size-24 mb-0">Howdy, {{ auth()->user()->name ?? 'Guest' }}</h2>
            </div>
            <ul class="list-items bread-list bread-list-2">
                <li><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li>All Reviews</li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="block-card dashboard-card mb-4 px-0">
                    <div
                        class="block-card-header d-flex flex-wrap align-items-center justify-content-between px-4 border-bottom-0 pb-0">
                    </div>
                    <div class="block-card-body">
                        <div class="my-table table-responsive">
                            <table class="table table-bordered data_table" id="business_reviews_table">
                                <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th>Reviewer Name</th>
                                    <th>Business</th>
                                    <th>Review</th>
                                    <th>Rate Stars</th>
                                    <th>Review Date</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#business_reviews_table').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: "{{ route('admin.all.reviews') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'organization_name', name: 'organization_name'},
                    {data: 'reviewer_name', name: 'reviewer_name'},
                    {data: 'review_text_original', name: 'review_text_original'},
                    {data: 'review_rate_stars', name: 'review_rate_stars'},
                    {data: 'review_date', name: 'review_date'},
                    {
                        data: 'actions',
                        name: 'actions',
                        orderable: false,
                        searchable: false,
                        className: 'actions-column'
                    },
                ],
            });

            // Attach click event handlers for buttons
            $('#business_reviews_table').on('click', 'a.show-modal', function () {
                var reviewId = $(this).data('id');
                // Use reviewId to open the show modal
                $('#showModal').modal('show');
            });

            $('#business_reviews_table').on('click', 'a.edit-modal', function () {
                var reviewId = $(this).data('id');
                // Use reviewId to open the edit modal
                $('#editModal').modal('show');
            });

            $('#business_reviews_table').on('click', 'a.delete-modal', function () {
                var reviewId = $(this).data('id');
                // Use reviewId to open the delete modal
                $('#deleteModal').modal('show');
            });
        });
    </script>
@endsection
