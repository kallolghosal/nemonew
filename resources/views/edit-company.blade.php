@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2>Edit Company</h2>
            @foreach ($company as $cmp)
            {{ $cmp->company_name }} - {{ $cmp->address }}
            @endforeach
        </div>
    </div>
</div>
@endsection