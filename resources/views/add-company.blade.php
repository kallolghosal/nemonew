@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 style="display: inline;">Add Company</h2>
            <p class="mt-4"></p>
            <form action="" method="post">
                <div class="row">
                    <div class="col">
                        <label for="company">Name of Company</label>
                        <input type="text" name="company" class="form-control" id="">
                    </div>
                    <div class="col">
                        <label for="contact">Contact Person</label>
                        <input type="text" name="contact" class="form-control" id="">
                    </div>
                </div>
                <p class="mt-4"></p>
                <label for="addr">Address</label>
                <textarea name="addr" id="" cols="30" rows="4" class="form-control"></textarea>
                <p class="mt-4"></p>
                <div class="row">
                    <div class="col">
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" class="form-control" id="">
                    </div>
                    <div class="col">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="">
                    </div>
                </div>
                <p class="mt-4"></p>
                <div class="row">
                    <div class="col">
                        <label for="ctype">Type of Company</label>
                        <select name="ctype" id="" class="form-control">
                            <option value="">Select Type</option>
                            <option value="fpp">FPP</option>
                            <option value="fms">FMS</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="owner">Type of Owner</label>
                        <select name="owner" id="" class="form-control">
                            <option value="">Select Type</option>
                            <option value="owner">Owner</option>
                            <option value="manager">Manager</option>
                        </select>
                    </div>
                </div>
                <p class="mt-4"></p>
                <input type="submit" value="Add Company" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>
@endsection
