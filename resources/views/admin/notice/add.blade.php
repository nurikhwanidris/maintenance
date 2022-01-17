@extends('admin.layouts.main')

@section('content')
<h2 class="my-2">Create a new maintenance notice</h2>
<div class="row my-4">
    <div class="col-md-6">
        <div class="row mb-3">
            <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Notice Title</label>
            <div class="col-sm-9">
                <input type="email" name="title" class="form-control form-control-sm text-uppercase" id="colFormLabelSm"
                    placeholder="Notice title goes here...">
            </div>
        </div>
        <div class="row mb-3">
            <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">System Affected</label>
            <div class="col-sm-5">
                <select name="" id="" class="form-control form-control-sm">
                    <option value="">Please select</option>
                    <option value="portal">JUPEM Portal</option>
                    <option value="ebiz">eBiz</option>
                    <option value="ekadester">eKadester</option>
                    <option value="staps">STAPS</option>
                    <option value="myrtknet">MyRTKNet</option>
                    <option value="mygeoserve">myGeoServe</option>
                </select>
            </div>
        </div>
        <hr>
        <div class="my-3">
            <span class="fs-5">Maintenance Date & Time</span>
        </div>
        <div class="row mb-3">
            <label for="" class="col-sm-3 col-form-label col-form-sm">Start Date & Time</label>
            <div class="col-sm-5">
                <input type="datetime-local" name="startMaintenance" id="" class="form-control form-control-sm">
            </div>
        </div>
        <div class="row mb-3">
            <label for="" class="col-sm-3 col-form-label col-form-sm">End Date & Time</label>
            <div class="col-sm-5">
                <input type="datetime-local" name="endMaintenance" id="" class="form-control form-control-sm">
            </div>
        </div>
        <hr>
        <div class="my-3">
            <span class="fs-5">Maintenance Intro</span>
        </div>
    </div>
</div>
@endsection