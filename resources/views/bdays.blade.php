@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h2>Birthdays of Candidates</h2>
            <table class="table table-striped mt-4">
                <thead>
                    <tr>
                        <td>Nemo ID</td>
                        <td>Name</td>
                        <td>Rank</td>
                        <td>Mobile</td>
                        <td>Email</td>
                        <td>DOB</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($candidates as $candidate)
                    <tr>
                        <td>{{ $candidate->mem_id }}</td>
                        <td><a href="{{ route('edit-candidate', $candidate->mem_id) }}">{{ $candidate->fname }}</a></td>
                        <td>{{ $candidate->c_rank }}</td>
                        <td>{{ $candidate->pmobile1 }}</td>
                        <td>{{ $candidate->email }}</td>
                        <td>{{ $candidate->dob }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $candidates->withQueryString()->links('pagination::bootstrap-5') !!}
        </div>
    </div>
</div>
@endsection