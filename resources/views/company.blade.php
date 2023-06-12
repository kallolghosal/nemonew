@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="table-responsive">
        <h2 style="display:inline">All Companies</h2> <a href="{{ route('add-company') }}" class="btn btn-primary btn-sm float-right">Add Company</a>
        @if (session('message'))
            <h6 class="text-success">{{ session('message') }}</h6>
        @endif
        <table class="table table-bordered" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <td>Company Name</td>
                    <td>Contact Person</td>
                    <td>Phone</td>
                    <td>Email</td>
                    <td width=60>Edit</td>
                </tr>
            </thead>
            <tbody>
                @foreach($companies as $company)
                <tr>
                    <td>{{ $company->company_name }}</td>
                    <td>{{ $company->contact_person }}</td>
                    <td>{{ $company->phone }}</td>
                    <td>{{ $company->email }}</td>
                    <td><a href="{{ route('show-company', $company->company_id) }}"><i class="bi bi-eye"></i></a>&nbsp;<a href="{{ route('edit-company', $company->company_id) }}"><i class="bi bi-pencil"></i></a>&nbsp;<a href="{{ route('delete-company', $company->company_id) }}" onclick="return confirm('Are you sure you want to delete this company?');"><i class="bi bi-trash"></i></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {!! $companies->withQueryString()->links('pagination::bootstrap-5') !!}
    </div>
</div>
@endsection
