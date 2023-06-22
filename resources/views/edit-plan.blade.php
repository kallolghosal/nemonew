@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 style="display: inline;">Edit Plan</h2><a href="{{ route('crew-planner') }}" class="btn btn-primary btn-sm float-right">All Plans</a>
            <p class="mt-4"></p>
            
            <form action="{{ route('update-planner') }}" method="post">
            @csrf
                <div class="row">
                    <div class="col">
                        <label for="company">Rank</label>
                        <select name="rank" id="" class="form-control">
                            <option value="">Select Rank</option>
                            @foreach($ranks as $rank)
                            <option value="{{ $rank->rank }}" @php if($crew->rank === $rank->rank) echo 'selected' @endphp>{{ $rank->rank }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label for="contact">Client</label>
                        <select name="company" id="" class="form-control">
                            <option value="">Select Company</option>
                            @foreach($comps as $comp)
                            <option value="{{ $comp->company_id }}" @php if($comp->company_id === $crew->client) echo 'selected' @endphp>{{ $comp->company_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <p class="mt-4"></p>
                <div class="row">
                    <div class="col">
                        <label for="company">Vessel Type</label>
                        <select name="vsltype" id="" class="form-control">
                            <option value="">Select Vessel Type</option>
                            @foreach($vsltype as $vtype)
                            <option value="{{ $vtype->vessel }}" @php if($vtype->vessel === $crew->vessel) echo 'selected' @endphp>{{ $vtype->vessel }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label for="contact">Vessel Name</label>
                        <select name="vslname" id="" class="form-control">
                            <option value="">Select Vessel Name</option>
                            @foreach($vslname as $vname)
                            <option value="{{ $vname->id }}" @php if($vname->id === $crew->vslname) echo 'selected' @endphp>{{ $vname->vsl_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
                <p class="mt-4"></p>
                <div class="row">
                    <div class="col">
                        <label for="phone">COC Accepted</label>
                        <select name="coc[]" id="" class="form-control" multiple>
                            @foreach($countries as $country)
                            <option value="{{ $country->id }}" @php if(in_array($country->id, explode(',', $crew->coc_accepted))) echo 'selected' @endphp>{{ $country->country }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label for="trading">Trading</label>
                        <input type="text" name="trading" class="form-control" id="" value="{{ $crew->trading }}">
                    </div>
                </div>
                <p class="mt-4"></p>
                <div class="row">
                    <div class="col">
                        <label for="wages">Wages</label>
                        <input type="text" name="wages" class="form-control" value="{{ $crew->wages }}">
                    </div>
                    <div class="col">
                        <label for="owner">DOJ</label>
                        <input type="date" name="doj" id="" class="form-control" value="{{ $crew->doj }}">
                    </div>
                </div>
                <p class="mt-4"></p>
                <div class="row">
                    <div class="col">
                        <label for="wages">Other Info</label>
                        <input type="text" name="other" class="form-control" value="{{ $crew->other_info }}">
                    </div>
                    <div class="col">
                        <label for="status">Status</label>
                        <select name="status" id="" class="form-control">
                            <option value="POSITION OPEN">Position Open</option>
                            <option value="POSITION HOLD">Position Hold</option>
                            <option value="CLOSED BY NS">Closed By NS</option>
                            <option value="CLOSED BY CLIENT">Closed By Client</option>
                        </select>
                    </div>
                </div>
                <p class="mt-4"></p>
                <input type="submit" value="Save Plan" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>
@endsection
