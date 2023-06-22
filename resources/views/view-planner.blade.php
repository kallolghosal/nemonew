@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 style="display:inline;">Crew Planner View</h2><a href="{{ route('edit-planner', $crew->entry_id) }}" class="btn btn-primary btn-sm float-right">Edit Plan</a>
            <table class="table table-striped mt-4">
                <tbody>
                    @foreach(json_decode($crew) as $k => $v)
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
