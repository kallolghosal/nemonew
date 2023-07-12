@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h2 style="display:inline">All Documents</h2><a href="{{ route('add-docs') }}" class="btn btn-primary btn-sm float-right">Add Document</a>
            @if (session('message'))
                <h6 class="text-success">{{ session('message') }}</h6>
            @endif
            <table class="table table-striped mt-4">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Doc Detail</td>
                        <td>Doc No</td>
                        <td>Issue Dt</td>
                        <td>Exp dt</td>
                        <td>Edit</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($docs as $doc)
                    <tr>
                        <td>{{ $doc->mid }}</td>
                        <td>{{ $doc->doc_details }}</td>
                        <td>{{ $doc->doc_number }}</td>
                        <td>{{ $doc->doc_issue_date }}</td>
                        <td>{{ $doc->doc_expiry_date }}</td>
                        <td><a href="{{ route('show-file', $doc->id) }}"><i class="bi bi-eye"></i></a>&nbsp;<a href="{{ route('edit-file', $doc->id) }}"><i class="bi bi-pencil"></i></a>&nbsp;<a href="{{route('delete-document', $doc->id)}}" onclick="return confirm('Are you sure you want to delete this document?');"><i class="bi bi-trash"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $docs->withQueryString()->links('pagination::bootstrap-5') !!}
        </div>
    </div>
</div>
@endsection