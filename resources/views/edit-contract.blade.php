@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h2 style="display:inline">All Contracts</h2><a href="{{ route('add-contract') }}" class="btn btn-primary btn-sm float-right">Add Contract</a>
            @if (session('message'))
                <h6 class="text-success">{{ session('message') }}</h6>
            @endif
            <p class="mt-4"></p>
            
            <form action="{{ route('update-contract') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col">
                        <label for="rank">Rank</label>
                        <select name="rank" id="" class="form-control">
                            <option value="">Select Rank</option>
                            @foreach($ranks as $rank)
                            <option value="{{ $rank->rank }}" @php if($contract[0]->c_rank === $rank->rank) echo 'selected' @endphp>{{ $rank->rank }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label for="company">Company</label>
                        <select name="company" id="" class="form-control">
                            <option value="">Select Company</option>
                            @foreach($comps as $comp)
                            <option value="{{ $comp->company_id }}" @php if($contract[0]->c_company === $comp->company_id) echo 'selected' @endphp>{{ $comp->company_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label for="vessel">Vessel</label>
                        <select name="vessel" id="" class="form-control">
                            <option value="">Select Vessel</option>
                            @foreach($vessels as $vessel)
                            <option value="{{ $vessel->id }}" @php if($contract[0]->c_vslname == $vessel->id) echo 'selected' @endphp>{{ $vessel->vsl_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label for="vsltype">Vessel Type</label>
                        <select name="vsltype" id="" class="form-control">
                            <option value="">Select Vessel Type</option>
                            @foreach($vsltype as $vslt)
                            <option value="{{ $vslt->vessel }}" @php if($contract[0]->c_vessel === $vslt->vessel) echo 'selected' @endphp>{{ $vslt->vessel }}</option>
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
                            <option value="{{ $port->id }}" @php if($contract[0]->c_sign_on_port == $port->id) echo 'selected' @endphp>{{ $port->port }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label for="signdt">Sign Date</label>
                        <input type="date" name="signdt" class="form-control" value="{{ $contract[0]->c_sign_on }}">
                    </div>
                    <div class="col">
                        <label for="wagst">Wages Start</label>
                        <input type="date" name="wagst" class="form-control" value="{{ $contract[0]->c_wages_start }}">
                    </div>
                    <div class="col">
                        <label for="eoc">EOC</label>
                        <input type="date" name="eoc" class="form-control" value="{{ $contract[0]->c_eoc }}">
                    </div>
                </div>
                <p class="mt-4"></p>
                <div class="row">
                    <div class="col">
                        <label for="wages">Wages</label>
                        <input type="text" name="wages" value="{{ $contract[0]->c_wages }}" class="form-control">
                    </div>
                    <div class="col">
                        <label for="currency">Couuency</label>
                        <select name="currency" id="" class="form-control">
                            <option>Select Currency</option>
                            <option value="AED" @php if($contract[0]->c_currency === 'AED') echo 'selected' @endphp>AED</option>
                            <option value="BMD" @php if($contract[0]->c_currency === 'BMD') echo 'selected' @endphp>BMD</option>
                            <option value="EUR" @php if($contract[0]->c_currency === 'EUR') echo 'selected' @endphp>EUR</option>
                            <option value="GBP" @php if($contract[0]->c_currency === 'GBP') echo 'selected' @endphp>GBP</option>
                            <option value="INR" @php if($contract[0]->c_currency === 'INR') echo 'selected' @endphp>INR</option>
                            <option value="MYR" @php if($contract[0]->c_currency === 'MYR') echo 'selected' @endphp>MYR</option>
                            <option value="SGD" @php if($contract[0]->c_currency === 'SGD') echo 'selected' @endphp>SGD</option>
                            <option value="USD" @php if($contract[0]->c_currency === 'USD') echo 'selected' @endphp>USD</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="wagtype">Wages Type</label>
                        <select name="wagtype" id="" class="form-control">
                            <option value="">Select</option>
                            <option value="Nett" @php if($contract[0]->c_wages_types === 'Nett') echo 'selected' @endphp>Nett</option>
                            <option value="Gross" @php if($contract[0]->c_wages_types === 'Gross') echo 'selected' @endphp>Gross</option>
                            <option value="Per Day" @php if($contract[0]->c_wages_types === 'Per Day') echo 'selected' @endphp>Per Day</option>
                            <option value="Per Mmonth" @php if($contract[0]->c_wages_types === 'Per Month') echo 'selected' @endphp>Per Month</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="signoff">Sign Off</label>
                        <input type="date" name="signoff" class="form-control" value="{{ $contract[0]->c_sign_off }}">
                    </div>
                </div>
                <p class="mt-4"></p>
                <div class="row">
                    <div class="col">
                        <label for="portoff">Sign Off Port</label>
                        <select name="portoff" id="" class="form-control">
                            <option value="">Select Port</option>
                            @foreach($ports as $port)
                            <option value="{{ $port->id }}" @php if($contract[0]->c_sign_off_port == $port->id) echo 'selected' @endphp>{{ $port->port }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label for="reason">Reason for Sign Off</label>
                        <input type="text" name="reason" value="{{ $contract[0]->c_reason_sign_off }}" class="form-control">
                    </div>
                    <div class="col">
                        <label for="docs">Documents</label>
                        <input type="file" name="docs" value="{{ $contract[0]->files }}" class="form-control">
                    </div>
                    <div class="col">
                        <label for="aoa">AOA</label>
                        <input type="file" name="aoa" value="{{ $contract[0]->aoa }}" class="form-control">
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
                    <div class="col">
                        <input type="hidden" name="memid" value="{{ $memid }}">
                    </div>
                    <div class="col"></div>
                </div>
                <p class="mt-4"></p>
                <input type="submit" value="Update Contract" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>
@endsection