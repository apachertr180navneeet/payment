@extends('admin.layouts.app')
@section('style')
    <style>

    </style>
@endsection
@section('content')
<div class="container-fluid flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">Company /</span> Image
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

    {{--  Profile Image  --}}
    <div class="row">
        <div class="col-12">
          <div class="card">
            <h5 class="card-header">Profile Image Change</h5>
            <div class="card-body">
                <form action="{{route('admin.resources.company.profile.image')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="profileid" value="{{ $company->id }}">
                    <div class="input-group">
                      <input type="file" class="form-control" id="profileimage" name="profileimage" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                      <button class="btn btn-outline-primary" type="submit" id="inputGroupFileAddon04">Button</button>
                    </div>
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
    $('#schemesTable').DataTable({
        processing: true,
    });
</script>
@endsection
