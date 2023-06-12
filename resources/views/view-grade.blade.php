@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 style="display:inline;">Profile of {{ $result->grade }}</h2><a href="{{ route('edit-grade', $result->grade) }}" class="btn btn-primary btn-sm float-right">Edit Profile</a>
            <table class="table table-striped mt-4">
                <tbody>
                    @foreach(json_decode($result) as $k => $v)
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
