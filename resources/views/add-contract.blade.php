@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h2 style="display:inline">Add Contract</h2><a href="{{ route('contracts') }}" class="btn btn-primary btn-sm float-right">All Contracts</a>
            <form action="" method="post">
                @csrf
                <div class="row">
                    <div class="col">
                        <label for="rank">Rank</label>
                        <select name="rank" id="" class="form-control">
                            <option value="">Select Rank</option>
                            @foreach($ranks as $rank)
                            <option value="{{ $rank->rank }}">{{ $rank->rank }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label for="company">Company</label>
                        <select name="company" id="" class="form-control">
                            <option value="">Select Company</option>
                            @foreach($comps as $comp)
                            <option value="{{ $comp->company_id }}">{{ $comp->company_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label for="vessel">Vessel</label>
                        <select name="vessel" id="" class="form-control">
                            <option value="">Select Vessel</option>
                            @foreach($vessels as $vessel)
                            <option value="{{ $vessel->id }}">{{ $vessel->vsl_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label for="vsltype">Vessel Type</label>
                        <select name="vsltype" id="" class="form-control">
                            <option value="">Select Vessel Type</option>
                            @foreach($vsltype as $vslt)
                            <option value="{{ $vslt->vessel }}">{{ $vslt->vessel }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <p class="mt-4"></p>
                <div class="row">
                    <div class="col">
                        <label for="portsn">Sign On Port</label>
                        <select name="portsn" id="" class="form-control">
                            <option value="">Select Port</option>
                            @foreach($ports as $port)
                            <option value="{{ $port->id }}">{{ $port->port }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label for="signdt">Sign Date</label>
                        <input type="date" name="signdt" class="form-control" id="">
                    </div>
                    <div class="col">
                        <label for="wagst">Wages Start</label>
                        <input type="date" name="wagst" class="form-control" id="">
                    </div>
                    <div class="col">
                        <label for="eoc">EOC</label>
                        <input type="date" name="eoc" class="form-control" id="">
                    </div>
                </div>
                <p class="mt-4"></p>
                <div class="row">
                    <div class="col">
                        <label for="wages">Wages</label>
                        <input type="text" name="wages" id="" class="form-control">
                    </div>
                    <div class="col">
                        <label for="currency">Couuency</label>
                        <select name="currency" id="" class="form-control">
                            <option>Select Currency</option>
                            <option value="AED">AED</option>
                            <option value="BMD">BMD</option>
                            <option value="EUR">EUR</option>
                            <option value="GBP">GBP</option>
                            <option value="INR">INR</option>
                            <option value="MYR">MYR</option>
                            <option value="SGD">SGD</option>
                            <option value="USD">USD</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="wagtype">Wages Type</label>
                        <select name="wagtype" id="" class="form-control">
                            <option value="">Select</option>
                            <option value="Nett">Nett</option>
                            <option value="Gross">Gross</option>
                            <option value="perday">Per Day</option>
                            <option value="permonth">Per Month</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="signoff">Sign Off</label>
                        <input type="date" name="signoff" class="form-control" id="">
                    </div>
                </div>
                <p class="mt-4"></p>
                <div class="row">
                    <div class="col">
                        <label for="portoff">Sign Off Port</label>
                        <select name="portoff" id="" class="form-control">
                            <option value="">Select Port</option>
                            @foreach($ports as $port)
                            <option value="{{ $port->id }}">{{ $port->port }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label for="reason">Reason for Sign Off</label>
                        <input type="text" name="reason" id="" class="form-control">
                    </div>
                    <div class="col">
                        <label for="docs">Documents</label>
                        <input type="file" name="docs" id="" class="form-control">
                    </div>
                    <div class="col">
                        <label for="aoa">AOA</label>
                        <input type="file" name="aoa" id="" class="form-control">
                    </div>
                </div>
                <p class="mt-4"></p>
                <div class="row">
                    <div class="col">
                        <label for="aoanum">AOA Number</label>
                        <input type="text" name="aoanum" id="" class="form-control">
                    </div>
                    <div class="col">
                        <label for="eminum">Emigrate Number</label>
                        <input type="text" name="eminum" id="" class="form-control">
                    </div>
                    <div class="col"></div>
                    <div class="col"></div>
                </div>
                <p class="mt-4"></p>
                <input type="submit" value="Add Contract" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>
@endsection