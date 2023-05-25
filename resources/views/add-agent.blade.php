@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2>Add Port Agent</h2>
            <p class="mt-4"></p>
            <form action="" method="post">
                <div class="row">
                    <div class="col">
                        <label for="agent">Port Agent</label>
                        <input type="text" name="agent" class="form-control">
                    </div>
                    <div class="col">
                        <label for="contact">Contact Person</label>
                        <input type="text" name="contact" class="form-control">
                    </div>
                </div>
                <p class="mt-4"></p>
                <label for="addr">Address</label>
                <textarea name="addr" id="" cols="30" rows="4" class="form-control"></textarea>
                <p class="mt-4"></p>
                <div class="row">
                    <div class="col">
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" class="form-control">
                    </div>
                    <div class="col">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control">
                    </div>
                </div>
                <p class="mt-4"></p>
                <div class="row">
                    <div class="col">
                        <label for="city">City</label>
                        <input type="text" name="city" class="form-control">
                    </div>
                    <div class="col">
                        <label for="state">State</label>
                        <input type="text" name="state" class="form-control">
                    </div>
                    <div class="col">
                        <label for="country">Country</label>
                        <select name="country" id="" class="form-control">
                            <option value="">Select Country</option>
                            @foreach ($countries as $country)
                            <option value="{{ $country->id }}">{{ $country->country }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <p class="mt-4"></p>
                <input type="submit" value="Add Port Agent" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>
@endsection