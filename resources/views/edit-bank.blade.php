@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h2 style="display:inline;">Edit Bank Accounts</h2><a href="{{ route('bank-accounts') }}" class="btn btn-primary btn-sm float-right">View All</a>
            <p class="mt-4"></p>
            @foreach ($banks as $bank)
            <form action="" method="post">
                <div class="row">
                    <div class="col">
                        <label for="memid">Member ID</label>
                        <input type="text" name="memid" value="{{ $bank->mem_id }}" class="form-control">
                    </div>
                    <div class="col">
                        <label for="acname">Account Name</label>
                        <input type="text" name="acname" value="{{ $bank->acct_name }}" class="form-control">
                    </div>
                    <div class="col">
                        <label for="acno">Account No</label>
                        <input type="text" name="acno" value="{{ $bank->acct_no }}" class="form-control">
                    </div>
                </div>
                <p class="mt-4"></p>
                <div class="row">
                    <div class="col">
                        <label for="bank">Bank</label>
                        <input type="text" name="bank" value="{{ $bank->bank }}" class="form-control">
                    </div>
                    <div class="col">
                        <label for="branch">Branch</label>
                        <input type="text" name="branch" value="{{ $bank->branch }}" class="form-control">
                    </div>
                    <div class="col">
                        <label for="bankaddr">Address of Bank</label>
                        <textarea name="bankaddr" id="" cols="30" class="form-control" rows="4">{{ $bank->bank_address }}</textarea>
                    </div>
                </div>
                <p class="mt-4"></p>
                <div class="row">
                    <div class="col">
                        <label for="acaddr">Account Address</label>
                        <textarea name="acaddr" id="" cols="30" rows="4" class="form-control">{{ $bank->address }}</textarea>
                    </div>
                    <div class="col">
                        <label for="sftcode">Swift Code</label>
                        <input type="text" name="sftcode" value="{{ $bank->swift_code }}" class="form-control">
                    </div>
                    <div class="col">
                        <label for="ifsc">IFSC</label>
                        <input type="text" name="ifsc" value="{{ $bank->IFSC_Code }}" class="form-control">
                    </div>
                </div>
                <p class="mt-4"></p>
                <div class="row">
                    <div class="col">
                        <label for="bookimg">Book Image</label>
                        <input type="file" name="bookimg" value="{{ $bank->book_image }}" class="form-control">
                    </div>
                    <div class="col">
                        <label for="pan">PAN</label>
                        <input type="text" name="pan" value="{{ $bank->pan_number }}" class="form-control">
                    </div>
                    <div class="col">
                        <label for="pancard">PAN Card</label>
                        <input type="text" name="pancard" value="{{ $bank->pan_card }}" class="form-control">
                    </div>
                </div>
                <p class="mt-4"></p>
                <div class="row">
                    <div class="col">
                        <label for="types">Types</label>
                        <input type="text" name="types" value="{{ $bank->types }}" class="form-control">
                    </div>
                    <div class="col">
                        <label for="createdby">Created By</label>
                        <input type="text" name="createdby" value="{{ $bank->created_by }}" class="form-control">
                    </div>
                    <div class="col">
                        
                    </div>
                </div>
                <p class="mt-4"></p>
                <input type="submit" value="Save" name="submit" class="btn btn-primary">
                <p class="mt-4"></p>
            </form>
            @endforeach
        </div>
    </div>
</div>
@endsection
