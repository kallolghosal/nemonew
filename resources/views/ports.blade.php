@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h2>All Candidates</h2>
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
                        <td><a href="#"><i class="bi bi-eye"></i></a>&nbsp;<a href="#"><i class="bi bi-pencil"></i></a>&nbsp;<a href="#"><i class="bi bi-trash"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $ports->withQueryString()->links('pagination::bootstrap-5') !!}
        </div>
    </div>
</div>
@endsection
