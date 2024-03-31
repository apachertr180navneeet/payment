@extends('admin.layouts.app')
@section('style')
    <style>

    </style>
@endsection
@section('content')
<div class="container-fluid flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">Schemes /</span> List
    </h4>
    <div class="row">
        <div class="col-md-12 mb-2 text-end">
            <a class="btn btn-secondary btn-primary" href="{{route('admin.resources.scheme.create')}}">
                <span>
                    <i class="bx bx-plus me-0 me-sm-1"></i>
                    <span class="d-none d-sm-inline-block">
                        Add Scheme
                    </span>
                </span>
            </a>
        </div>
        <div class="col-xl-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-bordered" id="schemesTable">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($schemes as $scheme)
                                <tr>
                                    <td>{{ $scheme->name }}</td>
                                    <td>
                                        @if($scheme->status =='active')
                                            <span class="badge bg-label-success me-1">Active</span>
                                        @elseif($scheme->status =='pending')
                                            <span class="badge bg-label-warning me-1">Pending</span>
                                        @else
                                            <span class="badge bg-label-danger me-1">InActive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.resources.scheme.edit',$scheme->id) }}" class="btn rounded-pill btn-outline-warning">Edit</a>
                                        <button type="button" data-id="{{ $scheme->id }}" data-url="{{ route('admin.resources.scheme.delete',$scheme->id) }}" class="btn rounded-pill btn-outline-danger delete">Delete</button>
                                        @if($scheme->status =='active')
                                            <button type="button" data-id="{{ $scheme->id }}" data-status="inactive" data-url="{{ route('admin.resources.scheme.status',$scheme->id) }}" class="btn rounded-pill btn-outline-danger status">Inactive</button>
                                        @elseif($scheme->status =='pending')
                                            <button type="button" data-id="{{ $scheme->id }}" data-status="active" data-url="{{ route('admin.resources.scheme.status',$scheme->id) }}" class="btn rounded-pill btn-outline-success status">Active</button>
                                            <button type="button" data-id="{{ $scheme->id }}" data-status="inactive" data-url="{{ route('admin.resources.scheme.status',$scheme->id) }}" class="btn rounded-pill btn-outline-danger status">Inactive</button>
                                        @else
                                            <button type="button" data-id="{{ $scheme->id }}" data-status="active" data-url="{{ route('admin.resources.scheme.status',$scheme->id) }}" class="btn rounded-pill btn-outline-success status">Active</button>
                                        @endif
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
@section('script')
<script>
    $('#schemesTable').DataTable({
        processing: true,
    });
    // Status click handlers
    $(".status").click(function () {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
            }).then((result) => {
            if (result.isConfirmed) {

                var id = $(this).data("id");
                var token = $("meta[name='csrf-token']").attr("content");
                var url = $(this).data("url");
                var status = $(this).data("status");
                var data = {
                    id: id,
                    _token: token,
                    status: status,
                };

                $.ajax({
                    url: url,
                    type: 'GET',
                    data: data,
                    success: function () {
                        location.reload();
                    },
                });
                Swal.fire(
                'success'
                )
            }
        })
    });

    $(".delete").click(function () {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
            }).then((result) => {
            if (result.isConfirmed) {

                var id = $(this).data("id");
                var token = $("meta[name='csrf-token']").attr("content");
                var url = $(this).data("url");
                var data = {
                    id: id,
                    _token: token,
                    status: status,
                };

                $.ajax({
                    url: url,
                    type: 'GET',
                    data: data,
                    success: function () {
                        location.reload();
                    },
                });
                Swal.fire(
                'success'
                )
            }
        })
    });
</script>
@endsection
