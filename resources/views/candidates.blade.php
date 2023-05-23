@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h2>All Candidates</h2>
            <table class="table table-striped mt-4" id="dataTable">
                <thead>
                    <tr>
                        <td>Sl</td>
                        <td>First Name</td>
                        <td>Last Name</td>
                        <td>DOB</td>
                        <td>Rank</td>
                        <td>Zone</td>
                        <td>Edit</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($candidates as $candidate)
                    <tr>
                        <td>{{ $candidate->mem_id }}</td>
                        <td>{{ $candidate->fname }}</td>
                        <td>{{ $candidate->lname }}</td>
                        <td>{{ $candidate->dob}}</td>
                        <td>{{ $candidate->p_rank }}</td>
                        <td>{{ $candidate->zone }}</td>
                        <td><a href="#"><i class="bi bi-eye"></i></a>&nbsp;<a href="{{ route('edit-candidate', $candidate->mem_id) }}"><i class="bi bi-pencil"></i></a>&nbsp;<a href="#"><i class="bi bi-trash"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
