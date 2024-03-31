@extends('admin.layouts.app')
@section('style')
    <style>

    </style>
@endsection
@section('content')
<div class="container-fluid flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">Company /</span> Detail
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
                <img src="{{asset('assets/admin/img/avatars/1.png')}}" alt="user image" class="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img">
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
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-pills flex-column flex-sm-row mb-4">
                <li class="nav-item">
                    <a class="nav-link active" href=""><i class="bx bx-user me-1"></i> Company Details</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href=""><i class="bx bx-group me-1"></i> Company Logo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href=""><i class="bx bx-grid-alt me-1"></i> Company News</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href=""><i class="bx bx-link-alt me-1"></i> Company Notice </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href=""><i class="bx bx-link-alt me-1"></i> Company Support Information </a>
                </li>
            </ul>
        </div>
    </div>

    {{--  User Profile Content  --}}
    <div class="row">
        <div class="col-xl-4 col-lg-5 col-md-5">
            <!-- About User -->
            <div class="card mb-4">
                <div class="card-body">
                    <small class="text-muted text-uppercase">About</small>
                    <ul class="list-unstyled mb-4 mt-3">
                        <li class="d-flex align-items-center mb-3"><i class="bx bx-user"></i><span class="fw-medium mx-2">Full Name:</span> <span>John Doe</span></li>
                        <li class="d-flex align-items-center mb-3"><i class="bx bx-check"></i><span class="fw-medium mx-2">Status:</span> <span>Active</span></li>
                        <li class="d-flex align-items-center mb-3"><i class="bx bx-star"></i><span class="fw-medium mx-2">Role:</span> <span>Developer</span></li>
                        <li class="d-flex align-items-center mb-3"><i class="bx bx-flag"></i><span class="fw-medium mx-2">Country:</span> <span>USA</span></li>
                        <li class="d-flex align-items-center mb-3"><i class="bx bx-detail"></i><span class="fw-medium mx-2">Languages:</span> <span>English</span></li>
                    </ul>
                </div>
            </div>
            <!--/ About User -->
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
