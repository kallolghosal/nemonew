@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 style="display:inline">All Ports</h2><a href="{{ route('add-port') }}" class="btn btn-primary btn-sm float-right">Add Port</a>
            <table class="table table-striped mt-4">
                <thead>
                    <tr>
                        <td>Port Name</td>
                        <td>Edit</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ports as $port)
                    <tr>
                        <td>{{ $port->port }}</td>
                        <td><a href="#"><i class="bi bi-eye"></i></a>&nbsp;<a href="{{ route('edit-port', $port->id )}}"><i class="bi bi-pencil"></i></a>&nbsp;<a href="#"><i class="bi bi-trash"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $ports->withQueryString()->links('pagination::bootstrap-5') !!}
        </div>
    </div>
</div>
@endsection
