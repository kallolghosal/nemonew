@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 style="display:inline">All Grades</h2><a href="{{ route('add-grade') }}" class="btn btn-primary btn-sm float-right">Add Grade</a>
            @if (session('message'))
                <h6 class="text-success">{{ session('message') }}</h6>
            @endif
            <table class="table table-striped mt-4">
                <thead>
                    <tr>
                        <td>Sl</td>
                        <td>Grade</td>
                        <td>Edit</td>
                    </tr>
                </thead>
                @php
                $count = 1;
                @endphp
                <tbody>
                    @foreach($grades as $grade)
                    <tr>
                        <td>{{ $count }}</td>
                        <td>{{ $grade->grade }}</td>
                        <td><a href="{{ route('show-grade', $grade->grade) }}"><i class="bi bi-eye"></i></a>&nbsp;<a href="{{ route('edit-grade', $grade->grade) }}"><i class="bi bi-pencil"></i></a>&nbsp;<a href="{{ route('delete-grade', $grade->grade) }}" onclick="return confirm('Are you sure you want to delete this grade?');"><i class="bi bi-trash"></i></a></td>
                    </tr>
                    @php
                    $count++;
                    @endphp
                    @endforeach
                </tbody>
            </table>
            {!! $grades->withQueryString()->links('pagination::bootstrap-5') !!}
        </div>
    </div>
</div>
@endsection
