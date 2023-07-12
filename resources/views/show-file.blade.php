@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h2 style="display:inline">All Contracts</h2><a href="{{ route('add-docs') }}" class="btn btn-primary btn-sm float-right">Add Documents</a>
            <table class="table table-striped mt-4">
                <tbody>
                    @foreach(json_decode($updocs) as $k => $v)
                        <tr>
                            <td>{{ $k }}</td>
                            <td>{{ $v }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection