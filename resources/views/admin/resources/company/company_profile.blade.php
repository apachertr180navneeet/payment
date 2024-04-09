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

    {{--  User Profile Content  --}}
    <div class="row">
        <div class="col-xl-4 col-lg-5 col-md-5">
            <!-- About User -->
            <div class="card mb-4">
                <div class="card-body">
                    <small class="text-muted text-uppercase">About</small>
                    <ul class="list-unstyled mb-4 mt-3">
                        <li class="d-flex align-items-center mb-3"><i class="bx bx-user"></i><span class="fw-medium mx-2">Company Name:</span> <span>{{ $company->companyname }}</span></li>
                        <li class="d-flex align-items-center mb-3"><i class="bx bx-check"></i><span class="fw-medium mx-2">Status:</span> <span>{{ $company->status }}</span></li>
                        <li class="d-flex align-items-center mb-3"><i class="bx bx-star"></i><span class="fw-medium mx-2">Domain:</span> <span>{{ $company->domain }}</span></li>
                        <li class="d-flex align-items-center mb-3"><i class="bx bx-star"></i><span class="fw-medium mx-2">UTI Code:</span> <span>{{ $company->uti_code }}</span></li>
                        <li class="d-flex align-items-center mb-3"><i class="bx bx-star"></i><span class="fw-medium mx-2">Sender ID:</span> <span>{{ $company->senderid }}</span></li>
                        <li class="d-flex align-items-center mb-3"><i class="bx bx-star"></i><span class="fw-medium mx-2">SMS UserName:</span> <span>{{ $company->smsusername }}</span></li>
                        <li class="d-flex align-items-center mb-3"><i class="bx bx-star"></i><span class="fw-medium mx-2">SMS Password:</span> <span>{{ $company->smspassword }}</span></li>
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
