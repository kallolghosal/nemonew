@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 style="display: inline;">Add Vessel</h2><a href="{{ route('vessel') }}" class="btn btn-primary btn-sm float-right">All Vessel</a>
            <p class="mt-4"></p>
            @if (session('message'))
                <h6 class="text-success">{{ session('message') }}</h6>
            @endif
            <form action="{{ route('store-vessel') }}" method="post">
                @csrf
                <label for="vslname">Name of Vessel</label>
                <input type="text" name="vslname" id="" class="form-control">
                <br>
                <label for="company">Company</label>
                <select name="company" id="" class="form-control">
                    <option value="">Select Company</option>
                    @foreach ($companies as $company)
                    <option value="{{ $company->company_id }}">{{ $company->company_name }}</option>
                    @endforeach
                </select>
                <p class="mt-4"></p>
                <input type="submit" value="Add Vessel" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>
@endsection
