@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 style="display:inline">Add Grade</h2><a href="{{ route('grades') }}" class="btn btn-primary btn-sm float-right">All Grades</a>
            <p class="mt-4"></p>
            <form action="{{ route('store-grade') }}" method="post">
                @csrf
                <label for="grade">Grade</label>
                <input type="text" class="form-control" name="grade" required>
                <p class="mt-4"></p>
                <input type="submit" value="Add Grade" name="submit" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>
@endsection
