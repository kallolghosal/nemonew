@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2>All Grades</h2>
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
                        <td><a href="#"><i class="bi bi-eye"></i></a>&nbsp;<a href="{{ route('edit-grade', $grade->grade) }}"><i class="bi bi-pencil"></i></a>&nbsp;<a href="#"><i class="bi bi-trash"></i></a></td>
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
