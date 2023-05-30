@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h2 style="display:inline">Bank Accounts</h2><a href="{{ route('add-bank-account') }}" class="btn btn-primary btn-sm float-right">Add Bank Account</a>
            <table class="table table-striped mt-4">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Name</td>
                        <td>Ac Number</td>
                        <td>Bank</td>
                        <td>Branch</td>
                        <td>Edit</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bankacs as $bankac)
                    <tr>
                        <td>{{ $bankac->mem_id }}</td>
                        <td>{{ $bankac->acct_name }}</td>
                        <td>{{ $bankac->acct_no }}</td>
                        <td>{{ $bankac->bank }}</td>
                        <td>{{ $bankac->branch }}</td>
                        <td><a href="#"><i class="bi bi-eye"></i></a>&nbsp;<a href="{{ route('edit-bank', $bankac->id) }}"><i class="bi bi-pencil"></i></a>&nbsp;<a href="#"><i class="bi bi-trash"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $bankacs->withQueryString()->links('pagination::bootstrap-5') !!}
        </div>
    </div>
</div>
@endsection
