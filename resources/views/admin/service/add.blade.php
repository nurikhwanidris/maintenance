@extends('admin.layouts.main')

@section('content')

@if (session()->has('success'))
<div class="row my-3">
    <div class="col-sm-12">
        <div class="alert alert-primary" role="alert">
            {!! session('success') !!}
        </div>
    </div>
</div>
@endif

<h2 class="my-2">Add New Services</h2>
<div class="row my-4">
    <form action="/admin/service/store" method="post">
        @csrf
        <div class="col-sm-6">
            <div class="row mb-3">
                <label for="servicesName" class="col-sm-3 col-form-label col-form-label-sm">Service name</label>
                <div class="col-sm-9">
                    <input type="text" name="serviceName" id="servicesName" class="form-control form-control-sm"
                        placeholder="Insert service name here...">
                </div>
            </div>
            <div class="row mb-3 float-end">
                <div class="col-sm-1 float-end">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection