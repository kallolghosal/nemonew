@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 style="display:inline;">Edit Company</h2><a href="{{ route('company') }}" class="btn btn-primary btn-sm float-right">All Companies</a>
            <p class="mt-4"></p>
            @if (session('message'))
                <h6 class="text-success">{{ session('message') }}</h6>
            @endif
            @foreach ($company as $camp)
            <p class="mt-4"></p>
            <form action="{{ route('update-company') }}" method="post">
            @csrf
                <div class="row">
                    <div class="col">
                        <label for="company">Name of Company</label>
                        <input type="text" name="company" value="{{ $camp->company_name }}" class="form-control" id="">
                    </div>
                    <div class="col">
                        <label for="contact">Contact Person</label>
                        <input type="text" name="contact" value="{{ $camp->contact_person }}" class="form-control" id="">
                    </div>
                </div>
                <p class="mt-4"></p>
                <label for="addr">Address</label>
                <textarea name="addr" id="" cols="30" rows="4" class="form-control">{{ $camp->address }}</textarea>
                <p class="mt-4"></p>
                <div class="row">
                    <div class="col">
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" value="{{ $camp->phone }}" class="form-control" id="">
                    </div>
                    <div class="col">
                        <label for="email">Email</label>
                        <input type="email" name="email" value="{{ $camp->email }}" class="form-control" id="">
                    </div>
                </div>
                <p class="mt-4"></p>
                <div class="row">
                    <div class="col">
                        <label for="ctype">Type of Company</label>
                        <select name="ctype" id="" class="form-control">
                            <option value="">Select Type</option>
                            <option value="1" @php if($camp->b_type == 1){echo 'selected';} @endphp>FPP</option>
                            <option value="2" @php if($camp->b_type == 2){echo 'selected';} @endphp>FMS</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="owner">Type of Owner</label>
                        <select name="owner" id="" class="form-control">
                            <option value="">Select Type</option>
                            <option value="Owner" @php if($camp->management === 'Owner'){echo 'selected';} @endphp>Owner</option>
                            <option value="Managers" @php if($camp->management === 'Managers'){echo 'selected';} @endphp>Manager</option>
                        </select>
                        <input type="hidden" name="companyid" value="{{ $camp->company_id }}">
                    </div>
                </div>
                <p class="mt-4"></p>
                <input type="submit" value="Save Company" class="btn btn-primary">
            </form>
            @endforeach
        </div>
    </div>
</div>
@endsection