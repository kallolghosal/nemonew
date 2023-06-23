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
        $validate = $request->validate([
            'rank' => 'required',
            'company' => 'required',
            'vsltype' => 'required',
            'vslname' => 'required',
            'coc' => 'required',
            'status' => 'required'
        ],[
            'rank.required' => 'Please select rank',
            'company.required' => 'Please select company',
            'vsltype.required' => 'Please select vessel type',
            'vslname.required' => 'Please select vessel name',
            'coc.required' => 'Please select a country',
            'status.required' => 'Please select status'
        ]);

        $crewpl = new CrewPlanner;

        $crewpl->rank = $request->rank;
        $crewpl->client = $request->company;
        $crewpl->vessel = $request->vsltype;
        $crewpl->vslname = $request->vslname;
        $crewpl->coc_accepted = implode(',',$request->coc);
        $crewpl->trading = $request->trading;
        $crewpl->wages = $request->wages;
        $crewpl->doj = $request->doj;
        $crewpl->immediate = $request->dojnow ? 1 : 0;
        $crewpl->other_info = $request->other;
        $crewpl->status = $request->status;
        $crewpl->created_by = 1;
        $crewpl->updated_by = 1;
        $crewpl->created_date = date('Y-m-d');

        $crewpl->save();

        return \Redirect::route('crew-planner')->with(['message' => 'New plan added successfully']);
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
    public function update(Request $request)
    {
        $validate = $request->validate([
            'rank' => 'required',
            'company' => 'required',
            'vsltype' => 'required',
            'vslname' => 'required',
            'coc' => 'required',
            'status' => 'required'
        ],[
            'rank.required' => 'Please select rank',
            'company.required' => 'Please select company',
            'vsltype.required' => 'Please select vessel type',
            'vslname.required' => 'Please select vessel name',
            'coc.required' => 'Please select a country',
            'status.required' => 'Please select status'
        ]);

        CrewPlanner::where('entry_id', $request->entryid)->update([
            'rank' => $request->rank,
            'client' => $request->company,
            'vessel' => $request->vsltype,
            'vslname' => $request->vslname,
            'coc_accepted' => implode(',',$request->coc),
            'trading' => $request->trading,
            'wages' => $request->wages,
            'doj' => $request->doj,
            'immediate' => $request->dojnow ? 1 : 0,
            'other_info' => $request->other,
            'status' => $request->status,
            'created_by' => 1,
            'updated_by' => 1,
            'created_date' => date('Y-m-d')
        ]);

        return \Redirect::route('edit-planner', $request->entryid)->with(['message' => 'Planner updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CrewPlanner::where('entry_id', $id)->delete();
        return \Redirect::route('crew-planner')->with(['message' => 'Plan deleted successfully']);
    }
}
