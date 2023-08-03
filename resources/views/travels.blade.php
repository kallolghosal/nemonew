@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h2 style="display:inline;">All Travel Records</h2><a href="#" class="btn btn-primary btn-sm float-right">Add Travel</a>
            @if (session('message'))
                <h6 class="text-success">{{ session('message') }}</h6>
            @endif
            <table class="table table-striped mt-4">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Date</td>
                        <td>From</td>
                        <td>To</td>
                        <td>Status</td>
                        <td>Port</td>
                        <td>Edit</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($travels as $trav)
                    <tr>
                        <td>{{ $trav->mem_id }}</td>
                        <td>{{ $trav->t_date }}</td>
                        <td>{{ $trav->t_from }}</td>
                        <td>{{ $trav->t_to }}</td>
                        <td>{{ $trav->t_status }}</td>
                        <td>{{ $trav->t_port_agent }}</td>
                        <td><a href="{{ route('show-travel', $trav->id) }}"><i class="bi bi-eye"></i></a>&nbsp;<a href="{{ route('edit-travel', $trav->id) }}"><i class="bi bi-pencil"></i></a>&nbsp;<a href="{{ route('delete-travel', $trav->id) }}" onclick="return confirm('Are you sure you want to delete this Travel Ac?');"><i class="bi bi-trash"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $travels->withQueryString()->links('pagination::bootstrap-5') !!}
        </div>
    </div>
</div>
@endsection