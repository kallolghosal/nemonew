@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2>Add Port</h2>
            <p class="mt-4"></p>
            <form action="" method="post">
                <label for="port">Name of Port</label>
                <input type="text" name="port" class="form-control">
                <p class="mt-4"></p>
                <input type="submit" value="Add Port" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>
@endsection
