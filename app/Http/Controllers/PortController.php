<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ports;

class PortController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ports = Ports::paginate(12);
        return view('ports', ['ports' => $ports]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add-port');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $port = new Ports;
        $port->port = $request->port;
        $port->save();

        return \Redirect::route('ports')->with(['message' => 'Port added successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result = Ports::where('id', $id)->first();
        return view('port-profile', ['result' => $result]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ports = Ports::where('id', $id)->get();
        return view('edit-port', ['ports' => $ports]);
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
        Ports::where('id', $request->portid)->update([
            'port' => $request->port
        ]);

        return \Redirect::route('edit-port', $request->portid)->with(['message' => 'Port updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Ports::where('id', $id)->delete();
        return \Redirect::route('ports')->with(['message' => 'Port deleted successfully']);
    }
}
