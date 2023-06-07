@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 style="display:inline">Add Port</h2><a href="{{ route('ports') }}" class="btn btn-primary btn-sm float-right">All Ports</a>
            <p class="mt-4"></p>
            <form action="{{ route('store-port') }}" method="post">
                @csrf
                <label for="port">Name of Port</label>
                <input type="text" name="port" class="form-control">
                <p class="mt-4"></p>
                <input type="submit" value="Add Port" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>
@endsection
