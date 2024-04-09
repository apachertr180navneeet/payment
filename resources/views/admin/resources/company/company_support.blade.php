@extends('admin.layouts.app')
@section('style')
    <style>

    </style>
@endsection
@section('content')
<div class="container-fluid flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">Company /</span> Support
    </h4>
    {{--  Header  --}}
    <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="user-profile-header-banner">
              <img src="{{asset('assets/admin/img/pages/profile-banner.png')}}" alt="Banner image" class="rounded-top">
            </div>
            <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-4">
              <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
                @if(empty($company->logo))
                    <img src="{{asset('assets/admin/img/pages/profile-banner.png')}}" alt="Banner image" class="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img" style="height: 124px !important;">
                @else
                    <img src="{{ asset($company->logo) }}" alt="Banner image" class="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img" style="height: 124px !important;">
                @endif
              </div>
              <div class="flex-grow-1 mt-3 mt-sm-5">
                <div class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
                  <div class="user-profile-info">
                    <h4>{{ $company->companyname }}</h4>
                    <ul class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2">
                      <li class="list-inline-item fw-medium">
                        <i class="bx bx-pen"></i> {{ $company->domain }}
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>

    {{--  Navbar pills  --}}
    @include('admin.layouts.elements.company_menu')

    {{--  Company News Add  --}}
    <div class="row">
        <div class="col-12">
          <div class="card">
            <h5 class="card-header">Company Support</h5>
            <div class="card-body">
                <form action="{{route('admin.resources.company.support.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="companyid" value="{{ $company->id }}">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="number" class="form-label">Contact Number</label>
                            <textarea class="form-control" id="number" name="number" rows="3">{{$companynewsall->phone ?? ""}}</textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">Contact Email</label>
                            <textarea class="form-control" id="email" name="email" rows="3">{{$companynewsall->email ?? ""}}</textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Send</button>
                </form>
            </div>
            </div>
          </div>
        </div>
    </div>
</div>






@endsection
@section('script')
<script>
    $('#companyNewsTable').DataTable({
        processing: true,
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
