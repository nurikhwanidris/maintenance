@extends('admin.layouts.main')

@section('content')

@if (session()->has('success'))
<div class="alert alert-primary my-4" role="alert">
    {{ session('success') }}
</div>
@endif

@if (session()->has('error'))
<div class="alert alert-danger my-4" role="alert">
    {{ session('error') }}
</div>
@endif

<h2 class="my-2">List of Maintenance Notice</h2>
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Notice</th>
                <th scope="col">Application Affected</th>
                <th scope="col">Downtime Start</th>
                <th scope="col">Downtime End</th>
                <th scope="col">Created by</th>
                <th scope="col">Created at</th>
                <th scope="col">Last Modified at</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($notices as $notice)
            <tr>
                <td class="align-middle">{{ $loop->iteration }}</td>
                <td class="align-middle">{{ $notice->tajukPenyelenggaraan }}</td>
                <td class="align-middle">
                    @if ($notice->aplikasiPenyelenggaraan == 'ebiz')
                    <span class="badge bg-primary">eBiz</span>
                    @elseif($notice->aplikasiPenyelenggaraan == 'portal')
                    <span class="badge bg-success">Portal</span>
                    @elseif($notice->aplikasiPenyelenggaraan == 'ekadaster')
                    <span class="badge bg-warning">eKadaster</span>
                    @elseif($notice->aplikasiPenyelenggaraan == 'staps')
                    <span class="badge bg-info">STAPS</span>
                    @elseif($notice->aplikasiPenyelenggaraan == 'myrtknet')
                    <span class="badge bg-secondary">MyRTKNet</span>
                    @elseif($notice->aplikasiPenyelenggaraan == 'mygeoserve')
                    <span class="badge bg-dark">MyGeoServe</span>
                    @endif
                </td>
                <td class="align-middle">
                    {{ $notice->mulaPenyelenggaraan }}
                </td>
                <td class="align-middle">
                    {{ $notice->tamatPenyelenggaraan }}
                </td>
                <td class="align-middle">
                    {{ $notice->user->name }}
                </td>
                <td class="align-middle">
                    {{ $notice->created_at }}
                </td>
                <td class="align-middle">
                    {{ $notice->updated_at }}
                </td>
                <td class="align-middle">
                    <a href="/admin/notice/view/{{ $notice->id }}" target="_blank" rel="noopener noreferrer"
                        class="btn btn-outline-info btn-sm"><i data-feather="eye"></i> View</a>
                    <form action="/admin/notice/remove/{{ $notice->id }}" method="post" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger btn-sm"><i data-feather="trash"></i>
                            Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection