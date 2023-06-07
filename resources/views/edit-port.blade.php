@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 style="display:inline;">Edit Port</h2><a href="{{ route('ports') }}" class="btn btn-primary btn-sm float-right">All Ports</a>
            @if (session('message'))
                <h6 class="text-success">{{ session('message') }}</h6>
            @endif
            <p class="mt-4"></p>
            @foreach($ports as $port)
            <form action="{{ route('update-port') }}" method="post">
                @csrf
                <label for="port">Name of Port</label>
                <input type="text" name="port" value="{{ $port->port }}" class="form-control">
                <input type="hidden" name="portid" value="{{ $port->id }}">
                <p class="mt-4"></p>
                <input type="submit" value="Save" name="submit" class="btn btn-primary">&nbsp;
                <a href="{{ route('delete-port', $port->id )}}" onclick="return confirm('Are you sure you want to delete this port?');" class="btn btn-primary">Delete Port</a>
            </form>
            @endforeach
        </div>
    </div>
</div>
@endsection
