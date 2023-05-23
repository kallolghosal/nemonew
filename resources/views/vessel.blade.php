@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h2>All Vessels</h2>
            <table class="table table-primary table-striped mt-4">
                <thead>
                    <tr>
                        <td>Vessel</td>
                        <td>Company</td>
                        <td>Edit</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($vessels as $vessel)
                    <tr>
                        <td>{{ $vessel->vsl_name }}</td>
                        <td>{{ $vessel->company_name }}</td>
                        <td><a href="#"><i class="bi bi-eye"></i></a>&nbsp;<a href="#"><i class="bi bi-pencil"></i></a>&nbsp;<a href="#"><i class="bi bi-trash"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $vessels->withQueryString()->links('pagination::bootstrap-5') !!}
        </div>
    </div>
</div>
@endsection
