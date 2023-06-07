@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 style="display:inline">Edit Port Agent</h2><a href="{{ route('portagents') }}" class="btn btn-primary btn-sm float-right">All Agents</a>
            @if (session('message'))
                <h6 class="text-success">{{ session('message') }}</h6>
            @endif
            @foreach ($agents as $agent)
            <p class="mt-4"></p>
            <form action="{{ route('update-agent') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col">
                        <label for="agent">Port Agent</label>
                        <input type="text" name="agent" value="{{ $agent['port_agent'] }}" class="form-control">
                    </div>
                    <div class="col">
                        <label for="contact">Contact Person</label>
                        <input type="text" name="contact" value="{{ $agent['c_person'] }}" class="form-control">
                    </div>
                </div>
                <p class="mt-4"></p>
                <label for="addr">Address</label>
                <textarea name="addr" id="" cols="30" rows="4" class="form-control">{{ $agent['address'] }}</textarea>
                <p class="mt-4"></p>
                <div class="row">
                    <div class="col">
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" value="{{ $agent['phone'] }}" class="form-control">
                    </div>
                    <div class="col">
                        <label for="email">Email</label>
                        <input type="email" name="email" value="{{ $agent['email'] }}" class="form-control">
                    </div>
                </div>
                <p class="mt-4"></p>
                <div class="row">
                    <div class="col">
                        <label for="city">City</label>
                        <input type="text" name="city" value="{{ $agent['city'] }}" class="form-control">
                    </div>
                    <div class="col">
                        <label for="state">State</label>
                        <input type="text" name="state" value="{{ $agent['state'] }}" class="form-control">
                    </div>
                    <div class="col">
                        <label for="country">Country</label>
                        <select name="country" id="" class="form-control" required>
                            <option value="">Select Country</option>
                            @foreach ($countries as $country)
                            <option value="{{ $country->country }}" @php if($country->country === $agent['country']){echo 'selected';} @endphp>{{ $country->country }}</option>
                            @endforeach
                        </select>
                        <input type="hidden" name="agentid" value="{{ $agent['id'] }}">
                    </div>
                </div>
                <p class="mt-4"></p>
                <input type="submit" value="Edit Port Agent" class="btn btn-primary">&nbsp;
                <a href="{{ route('delete-agent', $agent->id) }}" onclick="return confirm('Are you sure you want to delete this agent?');" class="btn btn-primary">Delete Agent</a>
            </form>
            @endforeach
        </div>
    </div>
</div>
@endsection