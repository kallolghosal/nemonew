@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 style="display:inline;">Edit Hospital</h2><a href="{{ route('hospitals') }}" class="btn btn-primary btn-sm float-right">All Hospitals</a>
            <p class="mt-4"></p>
            @if (session('message'))
                <h6 class="text-success">{{ session('message') }}</h6>
            @endif
            @foreach ($hospital as $h)
            <form action="{{ route('update-hospital') }}" method="post">
            @csrf
                <label for="hospital">Name of Hospital</label>
                <input type="text" name="hospital" value="{{ $h->hospital }}" class="form-control">
                <p class="mt-4"></p>
                <label for="doctor">Name of Doctor</label>
                <input type="text" name="doctor" value="{{ $h->doctor_name }}" class="form-control">
                <p class="mt-4"></p>
                <label for="addr">Address</label>
                <textarea name="addr" id="" cols="30" rows="4" class="form-control">{{ $h->address }}</textarea>
                <p class="mt-4"></p>
                <div class="row">
                    <div class="col">
                        <label for="city">City</label>
                        <input type="text" name="city" value="{{ $h->city }}" class="form-control">
                    </div>
                    <div class="col">
                        <label for="state">State</label>
                        <select name="state" id="" class="form-control">
                            <option value="">Select State</option>
                            @foreach($states as $state)
                            <option value="{{ $state->name }}" @php if($state->name === $h->state) echo 'selected'; @endphp>{{ $state->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <p class="mt-4"></p>
                <div class="row">
                    <div class="col">
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" value="{{ $h->phone }}" class="form-control">
                    </div>
                    <div class="col">
                        <label for="email">Email</label>
                        <input type="email" name="email" value="{{ $h->email }}" id="" class="form-control">
                    </div>
                </div>
                <p class="mt-4"></p>
                <label for="file">Uploaded File</label>
                <input type="file" name="file" id="" class="form-control">
                <input type="hidden" name="hspid" value="{{ $h->id }}">
                <p class="mt-4"></p>
                <input type="submit" value="Save" name="submit" class="btn btn-primary">&nbsp;
                <a href="{{ route('delete-hospital', $h->id) }}" onclick="return confirm('Are you sure you want to delete this hospital?');" class="btn btn-primary">Delete Hospital</a>
                <p class="mt-4"></p>
            </form>
            @endforeach
        </div>
    </div>
</div>
@endsection