<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ranks;

class RankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ranks = Ranks::paginate(12);
        return view('ranks', ['ranks' => $ranks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add-rank');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ranks = new Ranks;
        $validate = $request->validate([
            'rank' => 'required',
            'order' => 'required',
            'category' => 'required'
        ],[
            'rank.required' => 'Please enter rank',
            'order.required' => 'Please enter order',
            'category.required' => 'Please enter category',
        ]);

        $ranks->rank = $request->rank;
        $ranks->rank_order = $request->order;
        $ranks->category = $request->category;

        $ranks->save();

        return \Redirect::route('all-ranks')->with(['message' => 'Rank added successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result = Ranks::where('id', $id)->first();
        return view('rank-profile', ['result' => $result]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rank = Ranks::where('id', $id)->get();
        return view('edit-rank', ['rank' => $rank]);
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
        $ranks = new Ranks;
        $validate = $request->validate([
            'rank' => 'required',
            'order' => 'required',
            'category' => 'required'
        ],[
            'rank.required' => 'Please enter rank',
            'order.required' => 'Please enter order',
            'category.required' => 'Please enter category',
        ]);

        Ranks::where('id', $request->rankid)->update([
            'rank' => $request->rank,
            'rank_order' => $request->order,
            'category' => $request->category
        ]);

        return \Redirect::route('edit-rank', $request->rankid)->with(['message' => 'Rank updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Ranks::where('id', $id)->delete();
        return \Redirect::route('all-ranks')->with(['message' => 'Rank deleted successfully']);
    }
}
