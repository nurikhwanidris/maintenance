@extends('admin.layouts.main')

@section('content')
<h2 class="my-2">Create a new maintenance notice</h2>
<hr>
<div class="row my-4">
    <form action="/admin/notice/store" method="post">
        @csrf
        <div class="col-sm-12">
            <div class="row mb-3">
                <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Notice Title</label>
                <div class="col-sm-9">
                    <input type="text" name="tajukPenyelenggaraan" class="form-control form-control-sm"
                        id="colFormLabelSm" placeholder="Notice title goes here...">
                </div>
            </div>
            <div class="row mb-3">
                <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">System Affected</label>
                <div class="col-sm-5">
                    <select name="service_id" id="" class="form-control form-control-sm">
                        <option value="">Select a service</option>
                        @foreach ($services as $service)
                        <option value="{{ $service->id }}">{{ $service->serviceName }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <hr>
            <div class="my-3">
                <span class="fs-5">Maintenance Date & Time</span>
            </div>
            <div class="row mb-3">
                <label for="" class="col-sm-3 col-form-label col-form-label-sm">Start Date & Time</label>
                <div class="col-sm-5">
                    <input type="datetime-local" name="mulaPenyelenggaraan" id="" class="form-control form-control-sm">
                </div>
            </div>
            <div class="row mb-3">
                <label for="" class="col-sm-3 col-form-label col-form-sm">End Date & Time</label>
                <div class="col-sm-5">
                    <input type="datetime-local" name="tamatPenyelenggaraan" id="" class="form-control form-control-sm">
                </div>
            </div>
            <hr>
            <div class="my-3">
                <span class="fs-5">Maintenance Intro & Outro</span>
            </div>
            <div class="row mb-3">
                <label for="" class="col-sm-3 col-form-label col-form-label-sm">Use default Introduction</label>
                <div class="col-sm-9">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="defaultIntro" id="defaultMaintenance"
                            value="1">
                        <label class="form-check-label" for="defaultMaintenance">Use default Introduction.</label>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="" class="col-sm-3 col-form-label col-form-label-sm">Introduction</label>
                <div class="col-sm-9">
                    <textarea name="kataAluan" id="kataAluan" cols="30" rows="5"
                        class="form-control form-control-sm"></textarea>
                </div>
            </div>
            <div class="row mb-3">
                <label for="" class="col-sm-3 col-form-label col-form-label-sm">Use default Outroduction</label>
                <div class="col-sm-9">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="defaultOutro" id="defaultMaintenance"
                            value="1">
                        <label class="form-check-label" for="defaultMaintenance">Use default Outroduction.</label>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="" class="col-sm-3 col-form-label col-form-label-sm">Outroduction</label>
                <div class="col-sm-9">
                    <textarea name="kataAkhiran" id="kataAkhiran" cols="30" rows="5"
                        class="form-control form-control-sm"></textarea>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-2">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </form>
</div>
<script>
    ClassicEditor.create( document.querySelector( '#kataAluan' ) );
    ClassicEditor.create( document.querySelector( '#kataAkhiran' ) );
</script>
@endsection