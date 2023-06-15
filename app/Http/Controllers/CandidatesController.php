<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NemoUser;
use App\Models\Grades;
use App\Models\Country;
use App\Models\VslType;
use App\Models\CountryCode;

class CandidatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidates = NemoUser::paginate(12);
        return view('candidates', ['candidates' => $candidates]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grade = Grades::get();
        $country = Country::get();
        $vsltype = VslType::get();
        $ccode = CountryCode::get();
        return view('add-candidate', ['grades' => $grade, 'countries' => $country, 'vsltypes' => $vsltype, 'ccodes' => $ccode]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'rank' => 'required',
            'dob' => 'required',
            'country' => 'required',
            'mob1' => 'required',
            'email1' => 'required'
        ],[
            'fname.required' => 'Please enter your first name',
            'lname.required' => 'Please enter your last name',
            'rank.required' => 'Please enter your rank',
            'dob.required' => 'Please enter your Date of Birth',
            'country.required' => 'Please enter your nationality',
            'mob1.required' => 'Please enter your mobile no',
            'email1.required' => 'Please enter your email'
        ]);

        $candidate = new NemoUser;

        $candidate->fname = $request->fname;
        $candidate->lname = $request->lname;
        $candidate->p_rank = $request->rank;
        $candidate->dob = $request->dob;
        $candidate->birth_place = $request->pob;
        $candidate->work_nautilus = $request->workwithus;
        $candidate->grade = $request->grade;
        $candidate->boiler_suit_size = $request->bsuit;
        $candidate->safety_shoe_size = $request->sfshoe;
        $candidate->avb_date = $request->aval;
        $candidate->nationalty = $request->country;
        $candidate->m_status = $request->mstatus;
        $candidate->c_vessel = $request->vsltype;
        $candidate->experience = $request->expr;
        $candidate->zone = $request->zone;
        $candidate->height = $request->height;
        $candidate->weight = $request->weight;
        $candidate->l_country = $request->licsconr;
        $candidate->indos_number = $request->indos;
        $candidate->resume = $request->resume;
        $candidate->photos = $request->photos;
        $candidate->p_ad1 = $request->addr1;
        $candidate->p_city = $request->city1;
        $candidate->p_state = $request->state1;
        $candidate->p_pin = $request->pin1;
        $candidate->c_ad1 = $request->addr2;
        $candidate->c_city = $request->city2;
        $candidate->c_state = $request->state2;
        $candidate->c_pin = $request->pin2;
        $candidate->mobile_code2 = $request->ext1;
        $candidate->p_mobi1 = $request->mob1;
        $candidate->mobile_code1 = $request->ext2;
        $candidate->c_mobi1 = $request->mob2;
        $candidate->other_mobile_code = $request->ext3;
        $candidate->other_numbers = $request->mob3;
        $candidate->area_code2 = $request->lextn;
        $candidate->p_tel1 = $request->landph;
        $candidate->email1 = $request->email1;
        $candidate->email2 = $request->email2;
        $candidate->active_details = $request->status;
        $candidate->category = $request->group;
        $candidate->vendor_id = $request->vendor;

        $candidate->save();

        return \Redirect::route('candidates')->with(['message' => 'Candidate added successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $grade = Grades::get();
        $country = Country::get();
        $vsltype = VslType::get();
        $ccode = CountryCode::get();
        $candidate = NemoUser::where('mem_id', $id)->get();
        return view('edit-candidate', ['candidate' => $candidate, 'grades' => $grade, 'countries' => $country, 'vsltypes' => $vsltype, 'ccodes' => $ccode]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // $validate = $request->validate([
        //     'fname' => 'required',
        //     'lname' => 'required',
        //     'rank' => 'required',
        //     'dob' => 'required',
        //     'country' => 'required',
        //     'mob1' => 'required',
        //     'email1' => 'required'
        // ],[
        //     'fname.required' => 'Please enter your first name',
        //     'lname.required' => 'Please enter your last name',
        //     'rank.required' => 'Please enter your rank',
        //     'dob.required' => 'Please enter your Date of Birth',
        //     'country.required' => 'Please enter your nationality',
        //     'mob1.required' => 'Please enter your mobile no',
        //     'email1.required' => 'Please enter your email'
        // ]);

        $nemouser = new NemoUser;

        $nemouser->where('mem_id', $request->memid)->update([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'p_rank' => $request->rank,
            'dob' => $request->dob,
            'birth_place' => $request->pob,
            'work_nautilus' => $request->workwithus,
            'grade' => $request->grade,
            'boiler_suit_size' => $request->bsuit,
            'safety_shoe_size' => $request->sfshoe,
            'avb_date' => $request->aval,
            'nationalty' => $request->country,
            'm_status' => $request->mstatus,
            'c_vessel' => $request->vsltype,
            'experience' => $request->expr,
            'zone' => $request->zone,
            'height' => $request->height,
            'weight' => $request->weight,
            'l_country' => $request->licsconr,
            'indos_number' => $request->indos,
            'resume' => $request->resume,
            'photos' => $request->photos,
            'p_ad1' => $request->addr1,
            'p_city' => $request->city1,
            'p_state' => $request->state1,
            'p_pin' => $request->pin1,
            'c_ad1' => $request->addr2,
            'c_city' => $request->city2,
            'c_state' => $request->state2,
            'c_pin' => $request->pin2,
            'mobile_code2' => $request->ext1,
            'p_mobi1' => $request->mob1,
            'mobile_code1' => $request->ext2,
            'c_mobi1' => $request->mob2,
            'other_mobile_code' => $request->ext3,
            'other_numbers' => $request->mob3,
            'area_code2' => $request->lextn,
            'p_tel1' => $request->landph,
            'email1' => $request->email1,
            'email2' => $request->email2,
            'active_details' => $request->status,
            'category' => $request->group,
            'vendor_id' => $request->vendor
        ]);

        return \Redirect::route('edit-candidate', $request->memid)->with(['message' => 'Candidate updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
