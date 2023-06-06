<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BankAcs;

class BankAcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bankacs = BankAcs::paginate(12);
        return view('bank-accounts', ['bankacs' => $bankacs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add-bankac');
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
        $bankacs = BankAcs::where('id', $id)->get();
        return view('edit-bank', ['banks' => $bankacs]);
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
        $bankac = new BankAcs;
        $validate = $request->validate([
            'memid' => 'required',
            'acname' => 'required',
            'acno' => 'required',
            'bank' => 'required',
            'branch' => 'required',
            'bankaddr' => 'required',
            'acaddr' => 'required',
            'sftcode' => 'required',
            'ifsc' => 'required',
            'bookimg' => 'required',
            'pan' => 'required',
            'pancard' => 'required',
            'types' => 'required',
            'createdby' => 'required'
        ],[
            'memid.required' => 'Please enter member id',
            'acname.required' => 'Please enter account name',
            'acno.required' => 'Please enter account number',
            'bank.required' => 'Please enter Bank',
            'branch.required' => 'Please enter branch',
            'bankaddr.required' => 'Please enter bank address',
            'acaddr.required' => 'Please enter account address',
            'sftcode.required' => 'Please enter swift code',
            'ifsc.required' => 'Please enter IFSC',
            'pan.required' => 'Please enter PAN',
            'pancard.required' => 'Please enter PAN card'
        ]);

        $bankac->where('id', $request->bankid)->update([
            'mem_id' => $request->memid,
            'acct_name' => $request->acname,
            'acct_no' => $request->acno,
            'bank' => $request->bank,
            'branch' => $request->branch,
            'bank_address' => $request->bankaddr,
            'address' => $request->acaddr,
            'swift_code' => $request->sftcode,
            'IFSC_Code' => $request->ifsc,
            'book_image' => $request->bookimg,
            'pan_number' => $request->pan,
            'pan_card' => $request->pancard,
            'types' => $request->types,
            'created_by' => $request->createdby
        ]);

        return \Redirect::route('edit-bank', $request->bankid)->with(['message' => 'Bank Account updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        BankAcs::where('id', $id)->delete();
        return \Redirect::route('bank-accounts')->with(['message' => 'Bank Account deleted successfully']);
    }
}
