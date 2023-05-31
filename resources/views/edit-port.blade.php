@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2>Edit Port</h2>
            <p class="mt-4"></p>
            @foreach($ports as $port)
            <form action="" method="post">
                <label for="port">Name of Port</label>
                <input type="text" name="port" value="{{ $port->port }}" class="form-control">
                <p class="mt-4"></p>
                <input type="submit" value="Save" name="submit" class="btn btn-primary">
            </form>
            @endforeach
        </div>
    </div>
</div>
@endsection
