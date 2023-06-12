<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = Company::paginate(12);
        return view('company', ['companies' => $company]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add-company');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $company = new Company;
        $comp = Company::paginate(12);
        $validate = $request->validate([
            'company' => 'required',
            'contact' => 'required',
            'addr' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'ctype' => 'required',
            'owner' => 'required'
        ],
        [
            'company.required' => 'Please enter name of company',
            'contact.required' => 'Please enter contact person',
            'addr.required' => 'Please enter address',
            'phone.required' => 'Please enter phone number',
            'email.required' => 'Please enter email address',
            'ctype.required' => 'Please enter type of company',
            'owner.required' => 'Please enter type of owner',
        ]);

        $company->company_name = $request->company;
        $company->contact_person = $request->contact;
        $company->address = $request->addr;
        $company->phone = $request->phone;
        $company->email = $request->email;
        $company->b_type = $request->ctype;
        $company->management = $request->owner;
        $company->last_update = date('Y-m-d');

        $company->save();

        return \Redirect::route('company')->with(['message' => 'Company saved successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result = Company::where('company_id', $id)->first();
        return view('company-profile', ['result' => $result]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::where('company_id', $id)->get();
        return view('edit-company', ['company' => $company]);
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
        $company = new Company;
        $company->where('company_id', $request->companyid)->update([
            'company_name' => $request->company,
            'contact_person' => $request->contact,
            'address' => $request->addr,
            'phone' => $request->phone,
            'email' => $request->email,
            'b_type' => $request->ctype,
            'management' => $request->owner
        ]);

        return \Redirect::route('edit-company', $request->companyid)->with(['message' => 'Company saved successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Company::where('company_id', $id)->delete();
        return \Redirect::route('company')->with(['message' => 'Company deleted successfully']);
    }
}
