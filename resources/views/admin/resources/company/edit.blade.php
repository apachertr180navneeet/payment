@extends('admin.layouts.app')
@section('style')
    <style>

    </style>
@endsection
@section('content')
<div class="container-fluid flex-grow-1 container-p-y">
    <h5 class="py-2 mb-2">
        <span class="text-primary fw-light">Company</span>
    </h5>
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{route('admin.resources.company.update')}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $company->id }}">
                        <div class="row">
                            <div class="mb-3 col-md-4">
                                <label class="form-label" for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $company->companyname }}" placeholder="Name">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label class="form-label" for="website">Website</label>
                                <input type="text" class="form-control" id="website" name="website" value="{{ $company->domain }}" placeholder="Website">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label class="form-label" for="uti_code">Uti Code</label>
                                <input type="text" class="form-control" id="uti_code" name="uti_code" value="{{ $company->uti_code }}" placeholder="Uti Code">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label class="form-label" for="senderid">Sender Id</label>
                                <input type="text" class="form-control" id="senderid" name="senderid" value="{{ $company->senderid }}" placeholder="Sender Id">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label class="form-label" for="smsuser">Sms User</label>
                                <input type="text" class="form-control" id="smsuser" name="smsuser" value="{{ $company->smsusername }}" placeholder="SMS User">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label class="form-label" for="smspassword">Sms Password</label>
                                <input type="text" class="form-control" id="smspassword" name="smspassword" value="{{ $company->smspassword }}" placeholder="SMS Password">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Send</button>
                    </form>
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
