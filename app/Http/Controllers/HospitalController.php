<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hospitals;
use App\Models\States;

class HospitalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hospitals = Hospitals::paginate(12);
        return view('hospitals', ['hospitals' => $hospitals]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states = States::get();
        return view('add-hospital', ['states' => $states]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $hospital = new Hospitals;
        $hvldt = $request->validate([
            'hospital' => 'required',
            'doctor' => 'required',
            'addr' => 'required',
            'city' => 'required',
            'state' => 'required',
            'phone' => 'required',
            'email' => 'required'
        ],[
            'hospital.required' => 'Please enter name of hospital',
            'doctor.required' => 'Please enter name of doctor',
            'addr.required' => 'Please enter address',
            'city.required' => 'Please enter name of city',
            'state.required' => 'Please enter name of state',
            'phone.required' => 'Please enter phone number',
            'email.required' => 'Please enter email',
        ]);

        $hospital->hospital = $request->hospital;
        $hospital->doctor_name = $request->doctor;
        $hospital->address = $request->addr;
        $hospital->city = $request->city;
        $hospital->state = $request->state;
        $hospital->phone = $request->phone;
        $hospital->email = $request->email;
        $hospital->upload_file = $request->file;

        $hospital->save();
        return \Redirect::route('hospitals')->with(['message' => 'Hospital added successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result = Hospitals::where('id', $id)->first();
        return view('hospital-profile', ['result' => $result]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hospital = Hospitals::where('id', $id)->get();
        $states = States::get();
        return view('edit-hospital', ['hospital' => $hospital, 'states' => $states]);
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
        $hvldt = $request->validate([
            'hospital' => 'required',
            'doctor' => 'required',
            'addr' => 'required',
            'city' => 'required',
            'state' => 'required',
            'phone' => 'required',
            'email' => 'required'
        ],[
            'hospital.required' => 'Please enter name of hospital',
            'doctor.required' => 'Please enter name of doctor',
            'addr.required' => 'Please enter address',
            'city.required' => 'Please enter name of city',
            'state.required' => 'Please enter name of state',
            'phone.required' => 'Please enter phone number',
            'email.required' => 'Please enter email',
        ]);

        Hospitals::where('id', $request->hspid)->update([
            'hospital' => $request->hospital,
            'doctor_name' => $request->doctor,
            'address' => $request->addr,
            'city' => $request->city,
            'state' => $request->state,
            'phone' => $request->phone,
            'email' => $request->email,
            'upload_file' => $request->file
        ]);

        return \Redirect::route('edit-hospital', $request->hspid)->with(['message' => 'Hospital updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Hospitals::where('id', $id)->delete();
        return \Redirect::route('hospitals')->with(['message' => 'Hospital deleted successfully']);
    }
}
