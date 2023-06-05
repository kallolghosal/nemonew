@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 style="display: inline;">Company Added Successfully</h2><a href="{{ route('company') }}" class="btn btn-primary btn-sm float-right">All Companies</a>
            <p class="mt-4"></p>
            
        </div>
    </div>
</div>
@endsection
