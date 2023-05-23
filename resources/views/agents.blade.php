@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h2>All Port Agents</h2>
            <table class="table table-primary table-striped mt-4">
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
                        <td><a href="#"><i class="bi bi-eye"></i></a>&nbsp;<a href="#"><i class="bi bi-pencil"></i></a>&nbsp;<a href="#"><i class="bi bi-trash"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $agents->withQueryString()->links('pagination::bootstrap-5') !!}
        </div>
    </div>
</div>
@endsection