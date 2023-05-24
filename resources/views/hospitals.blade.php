@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h2>All Hospitals</h2>
            <table class="table table-striped mt-4">
                <thead>
                    <tr>
                        <td>Hospital</td>
                        <td>Doctor</td>
                        <td>City</td>
                        <td>Phone</td>
                        <td>Email</td>
                        <td>Edit</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($hospitals as $hospital)
                    <tr>
                        <td>{{ $hospital->hospital }}</td>
                        <td>{{ $hospital->doctor_name }}</td>
                        <td>{{ $hospital->city }}</td>
                        <td>{{ $hospital->phone }}</td>
                        <td>{{ $hospital->email }}</td>
                        <td><a href="#"><i class="bi bi-eye"></i></a>&nbsp;<a href="{{ route('edit-hospital', $hospital->id) }}"><i class="bi bi-pencil"></i></a>&nbsp;<a href="#"><i class="bi bi-trash"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $hospitals->withQueryString()->links('pagination::bootstrap-5') !!}
        </div>
    </div>
</div>
@endsection
