@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h2 style="display:inline;">Add Travel Records</h2><a href="{{ route('travels') }}" class="btn btn-primary btn-sm float-right">All Travel</a>
            <p class="mt-4"></p>
            <form action="#" method="post">
                @csrf
                
            </form>
        </div>
    </div>
</div>
@endsection