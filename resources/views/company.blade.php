@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="table-responsive">
        <h2>All Companies</h2>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                    <td><a href="#"><i class="bi bi-eye"></i></a>&nbsp;<a href="{{ route('edit-company', $company->company_id) }}"><i class="bi bi-pencil"></i></a>&nbsp;<a href="#"><i class="bi bi-trash"></i></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
