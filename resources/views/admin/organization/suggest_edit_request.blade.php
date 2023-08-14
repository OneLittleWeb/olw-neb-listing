@extends('admin.master_admin')
@section('title', 'Contact for claim')
@section('content')
    <div class="container-fluid dashboard-inner-body-container">
        <div class="breadcrumb-content d-sm-flex align-items-center justify-content-between mb-4">
            <div class="section-heading">
                <h2 class="sec__title font-size-24 mb-0">Howdy, {{auth()->user()->name ?? "Guest"}}</h2>
            </div>
            <ul class="list-items bread-list bread-list-2">
                <li><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li>Categories</li>
            </ul>
        </div><!-- end breadcrumb-content -->
        <div class="row">
            <div class="col-md-12">
                <div class="block-card dashboard-card mb-4 px-0">
                    <div class="block-card-body">
                        <div class="my-table table-responsive">
                            <table class="table align-items-center table-flush mb-0" id="edit_request_table">
                                <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th>Business Name</th>
                                    <th>Is It Closed</th>
                                    <th>Temporarily Closed</th>
                                    <th>Owner</th>
                                    <th>Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($suggest_edit_requests as $key => $edit_requests)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{ $edit_requests->organization->organization_name }}</td>
                                        <td>
                                            @if($edit_requests->is_it_closed)
                                                <span class="text-danger">Yes</span>
                                            @else
                                                <span class="text-success">No</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($edit_requests->temporarily_closed)
                                                <span class="text-danger">Yes</span>
                                            @else
                                                <span class="text-success">No</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($edit_requests->are_you_the_owner)
                                                <span class="text-success">Yes</span>
                                            @else
                                                <span class="text-danger">No</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($edit_requests->edit_status == 0)
                                                <span
                                                    class="badge badge-warning">Pending</span>
                                            @elseif($edit_requests->edit_status == 1)
                                                <span
                                                    class="badge badge-success">approved</span>
                                            @else
                                                <span
                                                    class="badge badge-danger">Rejected</span>
                                            @endif
                                        </td>
                                        <td class="text-center" style="width: 15%">
                                            <form class="d-inline" method="post"
                                                  action="{{ route('admin.claim.status.update', ['id' => $edit_requests->id, 'status' => 'approved']) }}">
                                                @csrf
                                                <button type="button" class="btn btn-sm btn-primary claim-approve"
                                                        data-toggle="tooltip" data-placement="top" title="Approve">
                                                    <i
                                                        class="fa fa-check" aria-hidden="true"></i></button>
                                            </form>

                                            <form method="post"
                                                  action="{{ route('admin.claim.status.update', ['id' => $edit_requests->id, 'status' => 'reject']) }}"
                                                  class="d-inline">
                                                @csrf
                                                <button type="button" class="btn btn-sm btn-danger claim-cancel"
                                                        data-toggle="tooltip" data-placement="top" title="Reject"><i
                                                        class="fa fa-times" aria-hidden="true"></i></button>
                                            </form>

                                            <div class="d-inline">
                                                <button type="submit" class="btn btn-sm btn-info d-inline"
                                                        data-toggle="tooltip" data-placement="top" title="Details">
                                                    <i
                                                        class="fa fa-eye" aria-hidden="true"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
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
    {{--    <script>--}}
    {{--        $(document).on('click', 'button.claim-approve', function () {--}}
    {{--            Swal.fire({--}}
    {{--                title: 'Are you sure?',--}}
    {{--                text: "Do you want to approve this business claim?",--}}
    {{--                icon: 'warning',--}}
    {{--                showCancelButton: true,--}}
    {{--                confirmButtonColor: '#3085d6',--}}
    {{--                cancelButtonColor: '#d33',--}}
    {{--                confirmButtonText: 'Yes, approve it!'--}}
    {{--            }).then((result) => {--}}
    {{--                if (result.isConfirmed) {--}}
    {{--                    $(this).parent('form').trigger('submit')--}}
    {{--                }--}}
    {{--            });--}}
    {{--        });--}}

    {{--        $(document).on('click', 'button.claim-cancel', function () {--}}
    {{--            Swal.fire({--}}
    {{--                title: 'Are you sure?',--}}
    {{--                text: "Do you want to cancel this business claim?",--}}
    {{--                icon: 'warning',--}}
    {{--                showCancelButton: true,--}}
    {{--                confirmButtonColor: '#3085d6',--}}
    {{--                cancelButtonColor: '#d33',--}}
    {{--                confirmButtonText: 'Yes, cancel it!'--}}
    {{--            }).then((result) => {--}}
    {{--                if (result.isConfirmed) {--}}
    {{--                    $(this).parent('form').trigger('submit')--}}
    {{--                }--}}
    {{--            });--}}
    {{--        });--}}
    {{--    </script>--}}

    <script>
        $(document).ready(function () {
            $('#edit_request_table').DataTable();
        });
    </script>
@endsection
