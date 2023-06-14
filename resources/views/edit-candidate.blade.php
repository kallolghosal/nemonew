@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h2>Edit Candidate</h2>
            <!-- {{ $candidate }} -->
            <p class="mt-4"></p>
            @foreach($candidate as $cand)
            <form action="#" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col">
                        <label for="fname">First Name <span class="text-danger">*</span></label>
                        <input type="text" name="fname" value="{{ $cand->fname }}" id="" class="form-control">
                    </div>
                    <div class="col">
                        <label for="lname">Last Name <span class="text-danger">*</span></label>
                        <input type="text" name="lname" value="{{ $cand->lname }}" id="" class="form-control">
                    </div>
                    <div class="col">
                        <label for="rank">Rank <span class="text-danger">*</span></label>    
                        <input type="text" name="rank" value="{{ $cand->c_rank }}" id="" class="form-control">
                    </div>
                    <div class="col">
                        <label for="dob">Date of Birth <span class="text-danger">*</span></label>
                        <input type="date" name="dob" value="{{ $cand->dob }}" id="dob" class="form-control">
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col">
                        <label for="pob">Place of Birth</label>
                        <input type="text" name="pob" value="{{ $cand->birth_place }}" id="" class="form-control">
                    </div>
                    <div class="col">
                        <label for="workwithus">Worked with Us</label>    
                        <select name="workwithus" class="form-control" id="">
                            <option value="">Select</option>
                            <option value="Yes" @php if($cand->work_nautilus === 'Yes') echo 'selected' @endphp>Yes</option>
                            <option value="No" @php if($cand->work_nautilus === 'No') echo 'selected' @endphp>No</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="grade">Grade</label>    
                        <select name="grade" id="" class="form-control">
                            <option value="">Select Grade</option>
                            @foreach ($grades as $grade)
                            <option value="{{ $grade->grade }}" @php if($cand->grade === $grade->grade) echo 'selected' @endphp>{{ $grade->grade }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label for="bsuit">Boiler Suit Size</label>
                        <input type="text" name="bsuit" value="{{ $cand->boiler_suit_size }}" id="" class="form-control">
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col">
                        <label for="sfshoe">Safety Shoe Size</label>    
                        <input type="text" name="sfshoe" value="{{ $cand->safety_shoe_size }}" class="form-control">
                    </div>
                    <div class="col">
                        <label for="aval">Availability</label>    
                        <input type="date" name="aval" value="{{ $cand->avb_date }}" class="form-control">
                    </div>
                    <div class="col">
                        <label for="country">Nationality</label>
                        <select name="country" id="" class="form-control">
                            <option value="">Select Country</option>
                            @foreach ($countries as $country)
                            <option value="{{ $country->id }}" @php if($cand->nationalty == $country->id) echo 'selected' @endphp>{{ $country->country }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label for="mstatus">Marital Status</label>    
                        <select name="mstatus" id="" class="form-control">
                            <option value="">Select Marital Status</option>
                            <option value="SINGLE" @php if($cand->m_status === 'SINGLE') echo 'selected' @endphp>Single</option>
                            <option value="MARRIED" @php if($cand->m_status === 'MARRIED') echo 'selected' @endphp>Married</option>
                            <option value="DIVORCED" @php if($cand->m_status === 'DIVORCED') echo 'selected' @endphp>Divorced</option>
                            <option value="WIDOW" @php if($cand->m_status === 'WIDOW') echo 'selected' @endphp>Widow</option>
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
                            <option value="< 6 Months" @php if($cand->experience === '< 6 Months') echo 'selected' @endphp>< 6 Months</option>
                            <option value="6-12 Months" @php if($cand->experience === '6-12 Months') echo 'selected' @endphp>6-12 Months</option>
                            <option value="12-24 Months" @php if($cand->experience === '12-24 Months') echo 'selected' @endphp>12-24 Months</option>
                            <option value="> 24 Months" @php if($cand->experience === '> 24 Months') echo 'selected' @endphp> > 24 Months</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="zone">Zone</label>
                        <select name="zone" id="" class="form-control">
                            <option value="">Select Zone</option>
                            <option value="north" @php if($cand->zone === 'NORTH') echo 'selected' @endphp>North</option>
                            <option value="east" @php if($cand->zone === 'EAST') echo 'selected' @endphp>East</option>
                            <option value="south" @php if($cand->zone === 'SOUTH') echo 'selected' @endphp>South</option>
                            <option value="west" @php if($cand->zone === 'WEST') echo 'selected' @endphp>West</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="height">Height(cm)</label>    
                        <input type="text" name="height" value="{{ $cand->height }}" class="form-control">
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col">
                        <label for="weight">Weight(kg)</label>    
                        <input type="text" name="weight" value="{{ $cand->weight }}" class="form-control">
                    </div>
                    <div class="col">
                        <label for="licsconr">License Country</label>
                        <select name="licsconr" id="" class="form-control">
                            <option value="">Select Country</option>
                            @foreach ($countries as $country)
                            <option value="{{ $country->id }}" @php if($cand->l_country == $country->id) echo 'selected' @endphp>{{ $country->country }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label for="indos">INDoS Number</label>    
                        <input type="text" name="indos" value="{{ $cand->indos_number }}" class="form-control">
                    </div>
                    <div class="col"></div>
                </div>
                <div class="row mt-4">
                    <div class="col">
                        <label for="resume">Resume</label>
                        <input type="file" class="form-control" id="resume" aria-describedby="inputGroupFileAddon04" name="resume" aria-label="Upload">
                    </div>
                    <div class="col">
                        <label for="photos">Photos</label>
                        <input type="file" class="form-control" id="phptos" aria-describedby="inputGroupFileAddon05" name="photos" aria-label="Upload">
                    </div>
                    <div class="col"></div>
                </div>
                <hr>
                <h4>Permanent Adderess</h4>
                <div class="row mt-4">
                    <div class="col">
                        <label for="prntaddr">Address</label>
                        <textarea name="prntaddr" id="prntaddr" cols="30" rows="4" class="form-control"></textarea>
                    </div>
                    <div class="col">
                        <label for="city">City</label>
                        <input type="text" name="city" id="city" class="form-control">
                    </div>
                    <div class="col">
                        <label for="state">State</label>
                        <input type="text" name="state" id="state" class="form-control">
                    </div>
                    <div class="col">
                        <label for="pin">PIN</label>
                        <input type="text" name="pin" id="pin" class="form-control">
                    </div>
                </div>
                <hr>
                <h4>Temporary Adderess</h4>
                <div class="row mt-4">
                    <div class="col">
                        <label for="prntaddr">Address</label>
                        <textarea name="caddr" id="prntaddr" cols="30" rows="4" class="form-control">{{ $cand->c_ad1 }}</textarea>
                    </div>
                    <div class="col">
                        <label for="city">City</label>
                        <input type="text" name="c_city" value="{{ $cand->c_city }}" id="city" class="form-control">
                    </div>
                    <div class="col">
                        <label for="state">State</label>
                        <input type="text" name="c_state" value="{{ $cand->c_state }}" id="state" class="form-control">
                    </div>
                    <div class="col">
                        <label for="pin">PIN</label>
                        <input type="text" name="c_pin" value="{{ $cand->c_pin }}" id="pin" class="form-control">
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col">
                        <label for="mob1">1st Mobile</label>
                        <div class="row">
                            <div class="col-md-3">
                                <select name="ext1" id="" class="form-control">
                                    <option value="">Extn</option>
                                    @foreach($ccodes as $ccode)
                                    <option value="{{ $ccode->phone }}" @php if($cand->mobile_code1 === $ccode->phone) echo 'selected' @endphp>{{ $ccode->phone }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-9">
                                <input type="text" name="mob1" value="{{ $cand->c_mobi1 }}" class="form-control" id="">
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
                                    <option value="{{ $ccode->phone }}" @php if($cand->mobile_code2 === $ccode->phone) echo 'selected' @endphp>{{ $ccode->phone }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-9">
                                <input type="text" name="mob2" value="{{ $cand->p_mobi1 }}" class="form-control" id="">
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
                                    <option value="{{ $ccode->phone }}" @php if($cand->other_mobile_code === $ccode->phone) echo 'selected' @endphp>{{ $ccode->phone }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-9">
                                <input type="text" name="mob3" value="{{ $cand->other_numbers }}" class="form-control" id="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col">
                        <label for="mob1">Landline Number</label>
                        <div class="row">
                            <div class="col-md-3">
                                <input type="text" name="lextn" value="{{ $cand->area_code1 }}" class="form-control" id="">
                            </div>
                            <div class="col-md-9">
                                <input type="text" name="landph" value="{{ $cand->c_tel1 }}" class="form-control" id="">
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <label for="email1">1st Email</label>
                        <input type="email" name="email1" value="{{ $cand->email1 }}" class="form-control" id="">
                    </div>
                    <div class="col">
                        <label for="email2">2nd Email</label>
                        <input type="email" name="email2" value="{{ $cand->email2 }}" class="form-control" id="">
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col">
                        <label for="status">Status</label>
                        <select name="status" id="" class="form-control">
                            <option value="">Select Status</option>
                            <option value="1" @php if($cand->active_details === 1) echo 'selected' @endphp>Active</option>
                            <option value="0" @php if($cand->active_details === 0) echo 'selected' @endphp>Inactive</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="group">Group</label>
                        <select name="group" id="" class="form-control">
                            <option value="">Select Group</option>
                            <option value="officer">Officer</option>
                            <option value="rating">Rating</option>
                            <option value="ivcrew">IV Crew</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="vendor">Vendor</label>
                        <select name="vendor" id="" class="form-control">
                            <option value="">Select Vendor</option>
                            <option value="copper">Copper Marine &amp; Offshore Limited</option>
                            <option value="alpha">Alpha Marine Services</option>
                            <option value="manila">Manila Shipmanagement &amp; Manning Inc.</option>
                        </select>
                    </div>
                </div>
                <p class="mb-4"></p>
                <input type="submit" value="Save Candidate" class="btn btn-primary" name="submit">
                <br>
                <p class="mb-4"></p>
            </form>
            @endforeach
        </div>
    </div>
</div>
@endsection
