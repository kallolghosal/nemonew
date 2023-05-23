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
        $candidates = NemoUser::paginate(6000);
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
        //
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
        $candidate = NemoUser::where('mem_id', $id)->get();
        return view('edit-candidate', ['candidate' => $candidate]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
