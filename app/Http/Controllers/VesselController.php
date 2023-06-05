<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vessel;
use App\Models\Company;
use Illuminate\Support\Facades\DB;

class VesselController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vessel = DB::table('vsl_name')
            ->leftjoin('company', 'vsl_name.company', '=', 'company.company_id')
            ->select('vsl_name.*', 'company.company_name')
            ->paginate(12);
        return view('vessel', ['vessels' => $vessel]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $company = Company::get();
        return view('add-vessel', ['companies' => $company]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vessel = new Vessel;
        $validate = $request->validate([
            'vslname' => 'required',
            'company' => 'required'
        ],[
            'vslname.required' => 'Please enter vessel name',
            'company.required' => 'Please enter name of company'
        ]);

        $vessel->vsl_name = $request->vslname;
        $vessel->company = $request->company;

        $vessel->save();

        return \Redirect::route('vessel')->with(['message' => 'Vessel added successfully']);
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
        $company = Company::get();
        $vessel = DB::table('vsl_name')
            ->leftjoin('company', 'vsl_name.company', '=', 'company.company_id')
            ->select('vsl_name.*', 'company.company_name')
            ->where('vsl_name.id', $id)
            ->get();
        return view('edit-vessel', ['vessel' => $vessel, 'companies' => $company]);
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
        Vessel::where('id', $request->vslid)->update([
            'vsl_name' => $request->vslname,
            'company' => $request->company
        ]);

        return \Redirect::route('edit-vessel', $request->vslid)->with(['message' => 'Vessel updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Vessel::where('id', $id)->delete();
        return \Redirect::route('vessel')->with(['message' => 'Vessel deleted successfully']);
    }
}
