@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h2 style="display: inline;">All Vessels</h2> <a href="{{ route('add-vessel') }}" class="btn btn-primary btn-sm float-right">Add Vessel</a>
            @if (session('message'))
                <h6 class="text-success">{{ session('message') }}</h6>
            @endif
            <table class="table table-striped mt-4">
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
                        <td><a href="#"><i class="bi bi-eye"></i></a>&nbsp;<a href="{{ route('edit-vessel', $vessel->id) }}"><i class="bi bi-pencil"></i></a>&nbsp;<a href="{{ route('delete-vessel', $vessel->id) }}" onclick="return confirm('Are you sure you want to delete this vessel?');"><i class="bi bi-trash"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $vessels->withQueryString()->links('pagination::bootstrap-5') !!}
        </div>
    </div>
</div>
@endsection
