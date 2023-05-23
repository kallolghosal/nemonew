@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h2>Edit Candidate</h2>
            @foreach($candidate as $cand)
            {{ $cand->mem_id }}
            @endforeach
        </div>
    </div>
</div>
@endsection
