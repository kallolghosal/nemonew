<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contract;
use App\Models\Company;
use App\Models\Ranks;
use App\Models\Vessel;
use App\Models\VslType;
use App\Models\Ports;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contracts = Contract::paginate(12);
        return view('contracts', ['contracts' => $contracts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ranks = Ranks::get();
        $vessels = Vessel::get();
        $vsltype = VslType::get();
        $ports = Ports::get();
        $company = Company::select('company_id','company_name')->get();
        return view('add-contract', [
            'ranks' => $ranks, 
            'comps' => $company, 
            'vessels' => $vessels, 
            'vsltype' => $vsltype,
            'ports' => $ports
        ]);
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
        $contract = Contract::where('id', $id)->first();
        return view('show-contract', ['contract' => $contract]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contract = Contract::where('id', $id)->get();
        return view('edit-contract', ['contract' => $contract]);
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
        Contract::where('id', $id)->delete();
        return \Redirect::route('contracts')->with(['message' => 'Contract deleted successfully']);
    }
}
