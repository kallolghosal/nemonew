@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h2 style="display:inline">Crew Planner</h2><a href="{{ route('add-planner') }}" class="btn btn-primary btn-sm float-right">Add a Plan</a>
            @if (session('message'))
                <h6 class="text-success">{{ session('message') }}</h6>
            @endif
            <table class="table table-striped mt-4">
                <thead>
                    <tr>
                        <td>Sl</td>
                        <td>Rank</td>
                        <td>Client</td>
                        <td>Vessel Type</td>
                        <td>Vessel Name</td>
                        <td>Status</td>
                        <td>Edit</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($crew as $crw)
                    <tr>
                        <td>{{ $crw->entry_id }}</td>
                        <td>{{ $crw->rank }}</td>
                        <td>{{ $crw->client }}</td>
                        <td>{{ $crw->vessel }}</td>
                        <td>{{ $crw->vslname }}</td>
                        <td>{{ $crw->status }}</td>
                        <td><a href="{{ route('show-planner', $crw->entry_id) }}"><i class="bi bi-eye"></i></a>&nbsp;<a href="{{ route('edit-planner', $crw->entry_id) }}"><i class="bi bi-pencil"></i></a>&nbsp;<a href="{{ route('delete-planner', $crw->entry_id) }}" onclick="return confirm('Are you sure you want to delete this plan?');"><i class="bi bi-trash"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $crew->withQueryString()->links('pagination::bootstrap-5') !!}
        </div>
    </div>
</div>
@endsection
