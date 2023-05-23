@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2>Edit Hospital</h2>
            @foreach ($hospital as $h)
            {{ $h->hospital }} - {{ $h->doctor_name }}
            @endforeach
        </div>
    </div>
</div>
@endsection