@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h4 style="display:inline;">Add Candidate</h4><a href="{{ route('candidates') }}" class="btn btn-primary btn-sm float-right">All Candidates</a>
            <p class="mt-4"></p>
            <form action="{{ route('store-candidate') }}" method="post" enctype="multipart/form-data">
            @csrf
                <div class="row">
                    <div class="col">
                        <label for="fname">First Name <span class="text-danger">*</span></label>
                        <input type="text" name="fname" id="" class="form-control" required>
                    </div>
                    <div class="col">
                        <label for="lname">Last Name <span class="text-danger">*</span></label>
                        <input type="text" name="lname" id="" class="form-control" required>
                    </div>
                    <div class="col">
                        <label for="rank">Rank <span class="text-danger">*</span></label>    
                        <input type="text" name="rank" id="" class="form-control" required>
                    </div>
                    <div class="col">
                        <label for="dob">Date of Birth <span class="text-danger">*</span></label>
                        <input type="date" name="dob" id="dob" class="form-control" required>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col">
                        <label for="pob">Place of Birth</label>
                        <input type="text" name="pob" id="" class="form-control">
                    </div>
                    <div class="col">
                        <label for="workwithus">Worked with Us</label>    
                        <select name="workwithus" class="form-control" id="">
                            <option value="">Select</option>
                            <option value="y">Yes</option>
                            <option value="n">No</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="grade">Grade</label>    
                        <select name="grade" id="" class="form-control">
                            <option value="">Select Grade</option>
                            @foreach ($grades as $grade)
                            <option value="{{ $grade->grade }}">{{ $grade->grade }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label for="bsuit">Boiler Suit Size</label>
                        <input type="text" name="bsuit" id="" class="form-control">
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col">
                        <label for="sfshoe">Safety Shoe Size</label>    
                        <input type="text" name="sfshoe" class="form-control">
                    </div>
                    <div class="col">
                        <label for="aval">Availability</label>    
                        <input type="date" name="aval" class="form-control">
                    </div>
                    <div class="col">
                        <label for="country">Nationality <span class="text-danger">*</span></label>
                        <select name="country" id="" class="form-control" required>
                            <option value="">Select Country</option>
                            @foreach ($countries as $country)
                            <option value="{{ $country->id }}">{{ $country->country }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label for="mstatus">Marital Status</label>    
                        <select name="mstatus" id="" class="form-control">
                            <option value="">Select Marital Status</option>
                            <option value="SINGLE">Single</option>
                            <option value="MARRIED">Married</option>
                            <option value="DIVORCED">Divorced</option>
                            <option value="WIDOW">Widow</option>
                        </select>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col">
                        <label for="vsltype">Vessel Type</label>    
                        <select name="vsltype" id="" class="form-control">
                            <option value="">Select Vessel Type</option>
                            @foreach($vsltypes as $vsltype)
                            <option value="{{ $vsltype->vessel }}">{{ $vsltype->vessel }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label for="expr">Experience</label>    
                        <select name="expr" id="" class="form-control">
                            <option value="">Select Experience</option>
                            <option value="< 6 months">< 6 Months</option>
                            <option value="6-12 months">6-12 Months</option>
                            <option value="12-24 months">12-24 Months</option>
                            <option value="> 24 months">> 24 Months</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="zone">Zone</label>
                        <select name="zone" id="" class="form-control">
                            <option value="">Select Zone</option>
                            <option value="NORTH">North</option>
                            <option value="EAST">East</option>
                            <option value="SOUTH">South</option>
                            <option value="WEST">West</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="height">Height(cm)</label>    
                        <input type="text" name="height" class="form-control">
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col">
                        <label for="weight">Weight(kg)</label>    
                        <input type="text" name="weight" class="form-control">
                    </div>
                    <div class="col">
                        <label for="licsconr">License Country</label>
                        <select name="licsconr" id="" class="form-control">
                            <option value="">Select Country</option>
                            @foreach ($countries as $country)
                            <option value="{{ $country->id }}">{{ $country->country }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label for="indos">INDoS Number</label>    
                        <input type="text" name="indos" class="form-control">
                    </div>
                    <div class="col"></div>
                </div>
                <div class="row mt-4">
                    <div class="col">
                        <label for="resume">Resume</label>
                        <input type="file" class="form-control" id="resume" name="resume">
                    </div>
                    <div class="col">
                        <label for="photos">Photos</label>
                        <input type="file" class="form-control" id="photos" name="photos">
                    </div>
                    <div class="col"></div>
                </div>
                <hr>
                <h4>Permanent Adderess</h4>
                <div class="row mt-4">
                    <div class="col">
                        <label for="prntaddr">Address</label>
                        <textarea name="addr1" id="prntaddr" cols="30" rows="4" class="form-control"></textarea>
                    </div>
                    <div class="col">
                        <label for="city">City</label>
                        <input type="text" name="city1" id="city" class="form-control">
                    </div>
                    <div class="col">
                        <label for="state">State</label>
                        <input type="text" name="state1" id="state" class="form-control">
                    </div>
                    <div class="col">
                        <label for="pin">PIN</label>
                        <input type="text" name="pin1" id="pin" class="form-control">
                    </div>
                </div>
                <hr>
                <h4>Temporary Adderess</h4>
                <div class="row mt-4">
                    <div class="col">
                        <label for="prntaddr">Address</label>
                        <textarea name="addr2" id="prntaddr" cols="30" rows="4" class="form-control"></textarea>
                    </div>
                    <div class="col">
                        <label for="city">City</label>
                        <input type="text" name="city2" id="city" class="form-control">
                    </div>
                    <div class="col">
                        <label for="state">State</label>
                        <input type="text" name="state2" id="state" class="form-control">
                    </div>
                    <div class="col">
                        <label for="pin">PIN</label>
                        <input type="text" name="pin2" id="pin" class="form-control">
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col">
                        <label for="mob1">1st Mobile <span class="text-danger">*</span></label>
                        <div class="row">
                            <div class="col-md-3">
                                <select name="ext1" id="" class="form-control">
                                    <option value="">Extn</option>
                                    @foreach($ccodes as $ccode)
                                    <option value="{{ $ccode->id }}">{{ $ccode->phone }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-9">
                                <input type="text" name="mob1" class="form-control" id="" required>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <label for="mob1">2nd Mobile</label>
                        <div class="row">
                            <div class="col-md-3">
                                <select name="ext2" id="" class="form-control">
                                    <option value="">Extn</option>
                                    @foreach($ccodes as $ccode)
                                    <option value="{{ $ccode->id }}">{{ $ccode->phone }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-9">
                                <input type="text" name="mob2" class="form-control" id="">
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <label for="mob1">3rd Mobile</label>
                        <div class="row">
                            <div class="col-md-3">
                                <select name="ext3" id="" class="form-control">
                                    <option value="">Extn</option>
                                    @foreach($ccodes as $ccode)
                                    <option value="{{ $ccode->id }}">{{ $ccode->phone }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-9">
                                <input type="text" name="mob3" class="form-control" id="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col">
                        <label for="mob1">Landline Number</label>
                        <div class="row">
                            <div class="col-md-3">
                                <input type="text" name="lextn" class="form-control" id="">
                            </div>
                            <div class="col-md-9">
                                <input type="text" name="landph" class="form-control" id="">
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <label for="email1">1st Email <span class="text-danger">*</span></label>
                        <input type="email" name="email1" class="form-control" id="" required>
                    </div>
                    <div class="col">
                        <label for="email2">2nd Email</label>
                        <input type="email" name="email2" class="form-control" id="">
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col">
                        <label for="status">Status</label>
                        <select name="status" id="" class="form-control">
                            <option value="">Select Status</option>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="group">Group</label>
                        <select name="group" id="" class="form-control">
                            <option value="">Select Group</option>
                            <option value="1">Officer</option>
                            <option value="2">Rating</option>
                            <option value="3">IV Crew</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="vendor">Vendor</label>
                        <select name="vendor" id="" class="form-control">
                            <option value="">Select Vendor</option>
                            <option value="1">Copper Marine &amp; Offshore Limited</option>
                            <option value="2">Alpha Marine Services</option>
                            <option value="3">Manila Shipmanagement &amp; Manning Inc.</option>
                        </select>
                    </div>
                </div>
                <p class="mb-4"></p>
                <input type="submit" value="Add Candidate" class="btn btn-primary" name="submit">
                <br>
                <p class="mb-4"></p>
            </form>
        </div>
    </div>
</div>
@endsection
