@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="table-responsive">
        <h2 style="display:inline">All Discussions</h2> <a href="{{ route('add-discussion') }}" class="btn btn-primary btn-sm float-right">Add Discussion</a>
        <table class="table table-striped mt-4">
            <thead>
                <tr>
                    <td>Company</td>
                    <td>Join Date</td>
                    <td>Discussion</td>
                    <td>Edit</td>
                </tr>
            </thead>
            <tbody>
                @foreach($discussions as $discn)
                <tr>
                    <td>{{ $discn->companyname }}</td>
                    <td>{{ $discn->join_date }}</td>
                    <td>{{ $discn->discussion }}</td>
                    <td><a href="{{ route('show-discussion', $discn->disc_id) }}"><i class="bi bi-eye"></i></a>&nbsp;<a href="{{ route('edit-discussion', $discn->disc_id) }}"><i class="bi bi-pencil"></i></a>&nbsp;<a href="#"><i class="bi bi-trash"></i></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {!! $discussions->withQueryString()->links('pagination::bootstrap-5') !!}
    </div>
</div>
@endsection
