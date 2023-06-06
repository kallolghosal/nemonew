<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grades;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grades = Grades::paginate(12);
        return view('grade', ['grades' => $grades]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add-grade');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $grade = new Grades;
        $grade->grade = $request->grade;
        $grade->save();

        return \Redirect::route('grades')->with(['message' => 'Grade added successfully']);
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
        $grade = Grades::where('grade', $id)->get();
        return view('edit-grade', ['grow' => $grade]);
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
        Grades::where('grade', $request->grade)->update([
            'grade' => $request->grade
        ]);
        return \Redirect::route('edit-grade', $request->grade)->with(['message' => 'Grade updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Grades::where('grade', $id)->delete();
        return \Redirect::route('grades')->with(['message' => 'Grade deleted successfully']);
    }
}
