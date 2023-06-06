@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 style="display:inline;">Edit Vessel</h2><a href="{{ route('vessel') }}" class="btn btn-primary btn-sm float-right">All Vessel</a>
            <p class="mt-4"></p>
            @if (session('message'))
                <h6 class="text-success">{{ session('message') }}</h6>
            @endif
            @foreach($vessel as $vsl)
            <form action="{{ route('update-vessel') }}" method="post">
            @csrf
                <label for="vslname">Name of Vessel</label>
                <input type="text" name="vslname" value="{{ $vsl->vsl_name }}" class="form-control">
                <p class="mt-4"></p>
                <label for="company">Company</label>
                <label for="company">Company</label>
                <select name="company" id="" class="form-control">
                    <option value="">Select Company</option>
                    @foreach ($companies as $company)
                    <option value="{{ $company->company_id }}" @php if($vsl->company == $company->company_id) echo 'selected' @endphp>{{ $company->company_name }}</option>
                    @endforeach
                </select>
                <input type="hidden" name="vslid" value="{{ $vsl->id }}">
                <p class="mt-4"></p>
                <input type="submit" value="Save Vessel" name="submit" class="btn btn-primary">&nbsp;
                <a href="{{ route('delete-vessel', $vsl->id) }}" onclick="return confirm('Are you sure you want to delete this vessel?');" class="btn btn-primary">Delete Vessel</a>
            </form>
            @endforeach
        </div>
    </div>
</div>
@endsection
