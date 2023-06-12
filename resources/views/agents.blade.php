@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h2 style="display:inline">All Port Agents</h2><a href="{{ route('add-agent') }}" class="btn btn-primary btn-sm float-right">Add Port Agent</a>
            @if (session('message'))
                <h6 class="text-success">{{ session('message') }}</h6>
            @endif
            <table class="table table-striped mt-4">
                <thead>
                    <tr>
                        <td>Agent</td>
                        <td>Contact Person</td>
                        <td>Phone</td>
                        <td>Email</td>
                        <td>Edit</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($agents as $agent)
                    <tr>
                        <td>{{ $agent->port_agent }}</td>
                        <td>{{ $agent->c_person }}</td>
                        <td>{{ $agent->phone }}</td>
                        <td>{{ $agent->email }}</td>
                        <td><a href="{{ route('show-agent', $agent->id) }}"><i class="bi bi-eye"></i></a>&nbsp;<a href="{{ route('edit-agent', $agent->id) }}"><i class="bi bi-pencil"></i></a>&nbsp;<a href="{{ route('delete-agent', $agent->id) }}" onclick="return confirm('Are you sure you want to delete this agent?');"><i class="bi bi-trash"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $agents->withQueryString()->links('pagination::bootstrap-5') !!}
        </div>
    </div>
</div>
@endsection