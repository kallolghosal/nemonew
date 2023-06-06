@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h2 style="display:inline">Add Bank Account</h2><a href="{{ route('bank-accounts') }}" class="btn btn-primary btn-sm float-right">View All</a>
            <p class="mt-4"></p>
            <form action="{{ route('store-bank-ac') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col">
                        <label for="memid">Member ID</label>
                        <input type="text" name="memid" class="form-control">
                    </div>
                    <div class="col">
                        <label for="acname">Account Name</label>
                        <input type="text" name="acname" class="form-control">
                    </div>
                    <div class="col">
                        <label for="acno">Account No</label>
                        <input type="text" name="acno" class="form-control">
                    </div>
                </div>
                <p class="mt-4"></p>
                <div class="row">
                    <div class="col">
                        <label for="bank">Bank</label>
                        <input type="text" name="bank" class="form-control">
                    </div>
                    <div class="col">
                        <label for="branch">Branch</label>
                        <input type="text" name="branch" class="form-control">
                    </div>
                    <div class="col">
                        <label for="bankaddr">Address of Bank</label>
                        <textarea name="bankaddr" id="" cols="30" class="form-control" rows="4"></textarea>
                    </div>
                </div>
                <p class="mt-4"></p>
                <div class="row">
                    <div class="col">
                        <label for="acaddr">Account Address</label>
                        <textarea name="acaddr" id="" cols="30" rows="4" class="form-control"></textarea>
                    </div>
                    <div class="col">
                        <label for="sftcode">Swift Code</label>
                        <input type="text" name="sftcode" class="form-control">
                    </div>
                    <div class="col">
                        <label for="ifsc">IFSC</label>
                        <input type="text" name="ifsc" class="form-control">
                    </div>
                </div>
                <p class="mt-4"></p>
                <div class="row">
                    <div class="col">
                        <label for="bookimg">Book Image</label>
                        <input type="file" name="bookimg" class="form-control">
                    </div>
                    <div class="col">
                        <label for="pan">PAN</label>
                        <input type="text" name="pan" class="form-control">
                    </div>
                    <div class="col">
                        <label for="pancard">PAN Card</label>
                        <input type="file" name="pancard" class="form-control">
                    </div>
                </div>
                <p class="mt-4"></p>
                <div class="row">
                    <div class="col">
                        <label for="types">Types</label>
                        <input type="text" name="types" class="form-control">
                    </div>
                    <div class="col">
                        <label for="createdby">Created By</label>
                        <input type="text" name="createdby" class="form-control">
                    </div>
                    <div class="col">
                        
                    </div>
                </div>
                <p class="mt-4"></p>
                <input type="submit" value="Save" name="submit" class="btn btn-primary">
                <p class="mt-4"></p>
            </form>
        </div>
    </div>
</div>
@endsection
