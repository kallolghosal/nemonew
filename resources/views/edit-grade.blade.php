@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 style="display:inline;">Edit Grade</h2><a href="{{ route('grades') }}" class="btn btn-primary btn-sm float-right">All Grades</a>
            @if (session('message'))
                <h6 class="text-success">{{ session('message') }}</h6>
            @endif
            <p class="mt-4"></p>
            @foreach($grow as $grade)
            <form action="{{ route('update-grade') }}" method="post">
            @csrf
                <label for="grade">Grade</label>
                <input type="text" name="grade" value="{{ $grade->grade }}" class="form-control">
                <p class="mt-4"></p>
                <input type="submit" value="Save" name="submit" class="btn btn-primary">
            </form>
            @endforeach
        </div>
    </div>
</div>
@endsection
