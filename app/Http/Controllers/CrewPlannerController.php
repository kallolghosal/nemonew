<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CrewPlanner;
use App\Models\Ranks;
use App\Models\Company;
use App\Models\VslType;
use App\Models\Vessel;
use App\Models\Country;

class CrewPlannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $crew = CrewPlanner::paginate(12);
        return view('crewPlanner', ['crew' => $crew]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ranks = Ranks::get();
        $company = Company::get();
        $vsltype = VslType::get();
        $vslname = Vessel::get();
        $country = Country::get();
        return view('create-planner', ['ranks' => $ranks, 'countries' => $country, 'comps' => $company, 'vsltype' => $vsltype, 'vslname' => $vslname]);
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
        $crew = CrewPlanner::where('entry_id', $id)->first();
        return view('view-planner', ['crew' => $crew]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ranks = Ranks::get();
        $company = Company::get();
        $vsltype = VslType::get();
        $vslname = Vessel::get();
        $country = Country::get();
        $crew = CrewPlanner::where('entry_id', $id)->first();
        return view('edit-plan', ['crew' => $crew, 'ranks' => $ranks, 'countries' => $country, 'comps' => $company, 'vsltype' => $vsltype, 'vslname' => $vslname]);
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
