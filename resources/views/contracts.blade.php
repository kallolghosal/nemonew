@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h2 style="display:inline">All Contracts</h2><a href="{{ route('add-contract') }}" class="btn btn-primary btn-sm float-right">Add Contract</a>
            @if (session('message'))
                <h6 class="text-success">{{ session('message') }}</h6>
            @endif
            <table class="table table-striped mt-4">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Rank</td>
                        <td>Company</td>
                        <td>Vsl Type</td>
                        <td>EOC</td>
                        <td>Edit</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contracts as $contract)
                    <tr>
                        <td>{{ $contract->mem_id }}</td>
                        <td>{{ $contract->c_rank }}</td>
                        <td>{{ $contract->c_company }}</td>
                        <td>{{ $contract->c_vessel }}</td>
                        <td>{{ $contract->c_eoc }}</td>
                        <td><a href="{{ route('show-contract', $contract->id) }}"><i class="bi bi-eye"></i></a>&nbsp;<a href="{{ route('edit-contract', $contract->id) }}"><i class="bi bi-pencil"></i></a>&nbsp;<a href="{{ route('delete-contract', $contract->id) }}" onclick="return confirm('Are you sure you want to delete this contract?');"><i class="bi bi-trash"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $contracts->withQueryString()->links('pagination::bootstrap-5') !!}
        </div>
    </div>
</div>
@endsection