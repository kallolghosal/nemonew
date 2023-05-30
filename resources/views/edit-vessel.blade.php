@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2>Edit Vessel</h2>
            @foreach($vessel as $vsl)
            <form action="" method="post">
                <label for="vslname">Name of Vessel</label>
                <input type="text" name="vslname" value="{{ $vsl->vsl_name }}" class="form-control">
                <p class="mt-4"></p>
                <label for="company">Company</label>
                <input type="text" name="company" value="{{$vsl->company_name}}" class="form-control">
                <p class="mt-4"></p>
                <input type="submit" value="Save Vessel" name="submit" class="btn btn-primary">
            </form>
            @endforeach
        </div>
    </div>
</div>
@endsection
