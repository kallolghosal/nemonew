@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 style="display: inline;">Add Hospital</h2><a href="{{ route('hospitals') }}" class="btn btn-primary btn-sm float-right">All Hospitals</a>
            <p class="mt-4"></p>
            <form action="{{ route('save-hospital') }}" method="post">
            @csrf
                <label for="hospital">Name of Hospital</label>
                <input type="text" name="hospital" id="" class="form-control">
                <br>
                <label for="company">Name of Doctor</label>
                <input type="text" name="doctor" id="" class="form-control">
                <br>
                <label for="addr">Address</label>
                <textarea name="addr" id="" cols="30" rows="4" class="form-control"></textarea>
                <br>
                <div class="row">
                    <div class="col">
                        <label for="city">City</label>
                        <input type="text" name="city" class="form-control">
                    </div>
                    <div class="col">
                        <label for="state">State</label>
                        <select name="state" id="" class="form-control">
                            <option value="">Select State</option>
                            @foreach ($states as $state)
                            <option value="{{ $state->name }}">{{ $state->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col">
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" class="form-control">
                    </div>
                    <div class="col">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="" class="form-control">
                    </div>
                </div>
                <br>
                <label for="file">Upload</label>
                <input type="file" name="file" id="" class="form-control">
                <p class="mt-4"></p>
                <input type="submit" value="Add Hospital" class="btn btn-primary">
            </form>
            <p class="mt-4"></p>
        </div>
    </div>
</div>
@endsection
