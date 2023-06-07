<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portagents;
use App\Models\Country;

class PortagentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agents = Portagents::paginate(12);
        return view('agents', ['agents' => $agents]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $country = Country::get();
        return view('add-agent', ['countries' => $country]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $agent = new Portagents;
        $validate = $request->validate([
            'agent' => 'required',
            'contact' => 'required',
            'addr' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required'
        ],[
            'agent.required' => 'Please enter name of agent',
            'contact.required' => 'Please enter contact person',
            'addr.required' => 'Please enter address',
            'phone.required' => 'Please enter phone no',
            'email.required' => 'Please enter email',
            'city.required' => 'Please enter city',
            'state.required' => 'Please enter state',
            'country.required' => 'Please select country'
        ]);

        $agent->port_agent = $request->agent;
        $agent->c_person = $request->contact;
        $agent->address = $request->addr;
        $agent->phone = $request->phone;
        $agent->email = $request->email;
        $agent->city = $request->city;
        $agent->state = $request->state;
        $agent->country = $request->country;
        $agent->save();

        return \Redirect::route('portagents')->with(['message' => 'Agent added successfully']);
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
        $agents = Portagents::where('id', $id)->get();
        $country = Country::get();
        return view('edit-agent', ['agents' => $agents, 'countries' => $country]);
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
        $agent = new Portagents;
        $validate = $request->validate([
            'agent' => 'required',
            'contact' => 'required',
            'addr' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required'
        ],[
            'agent.required' => 'Please enter name of agent',
            'contact.required' => 'Please enter contact person',
            'addr.required' => 'Please enter address',
            'phone.required' => 'Please enter phone no',
            'email.required' => 'Please enter email',
            'city.required' => 'Please enter city',
            'state.required' => 'Please enter state',
            'country.required' => 'Please select country'
        ]);

        $agent->where('id', $request->agentid)->update([
            'port_agent' => $request->agent,
            'c_person' => $request->contact,
            'address' => $request->addr,
            'phone' => $request->phone,
            'email' => $request->email,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country
        ]);

        return \Redirect::route('edit-agent', $request->agentid)->with(['message' => 'Port agent updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Portagents::where('id', $id)->delete();
        return \Redirect::route('portagents')->with(['message' => 'Agent deleted successfully']);
    }
}
