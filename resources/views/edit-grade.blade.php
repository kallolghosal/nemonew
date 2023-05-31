@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2>Edit Grade</h2>
            <p class="mt-4"></p>
            @foreach($grow as $grade)
            <form action="" method="post">
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
