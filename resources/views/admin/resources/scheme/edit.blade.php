@extends('admin.layouts.app')
@section('style')
    <style>

    </style>
@endsection
@section('content')
<div class="container-fluid flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">Schemes /</span> Edit
    </h4>
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{route('admin.resources.scheme.update')}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $scheme->id }}">
                        <div class="mb-3">
                            <label class="form-label" for="name">Bank Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $scheme->name }}" placeholder="Bank Name">
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
