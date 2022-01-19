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
    <table class="table table-striped table-sm table-hover">
        <thead>
            <tr>
                <th scope="col" class="align-middle text-center">#</th>
                <th scope="col">Notice</th>
                <th scope="col">Application Affected</th>
                <th scope="col">Downtime Start</th>
                <th scope="col">Downtime End</th>
                <th scope="col">Created by</th>
                <th scope="col">Created at</th>
                <th scope="col">Last Modified at</th>
                <th scope="col" class="align-middle text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($notices as $notice)
            <tr>
                <td class="align-middle text-center">{{ $loop->iteration }}</td>
                <td class="align-middle">{{ $notice->user->name }}</td>
                <td class="align-middle">
                    {{ $notice->services->serviceName }}
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
                <td class="align-middle text-center">
                    <a href="/admin/notice/view/{{ $notice->id }}" target="_blank" rel="noopener noreferrer"
                        class="btn btn-outline-info btn-sm"><i data-feather="eye"></i> View</a>
                    <a href="/admin/notice/{{ $notice->id }}/edit" target="_blank" rel="noopener noreferrer"
                        class="btn btn-outline-warning btn-sm"><i data-feather="edit"></i> Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection