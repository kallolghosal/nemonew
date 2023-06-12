<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NemoUser;
use App\Models\Company;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $month = Date('m');
        $day = Date('d');
        $nemouser['total'] = NemoUser::count();
        $nemouser['company'] = Company::count();
        $nemouser['fms'] = Company::where('b_type', 1)->count();
        $nemouser['fpp'] = Company::where('b_type', 2)->count();
        $nemouser['owner'] = Company::where('management', 'owner')->count();
        $nemouser['manager'] = Company::where('management', 'managers')->count();
        $nemouser['master'] = NemoUser::where('p_rank', 'master')->count();
        $nemouser['engineer'] = NemoUser::where('p_rank', 'CHIEF ENGINEER')->count();
        $nemouser['officer'] = NemoUser::where('p_rank', 'CHIEF OFFICER')->count();
        $nemouser['2ndofficer'] = NemoUser::where('p_rank', '2ND OFFICER')->count();
        $nemouser['2ndengineer'] = NemoUser::where('p_rank', '2ND ENGINEER')->count();
        $nemouser['active'] = NemoUser::where('active_details', 1)->count();
        $bdays = NemoUser::whereMonth('dob', $month)
            ->whereDay('dob', '>', $day)
            ->orderBy('dob', 'DESC')
            ->take(12)
            ->get();
        return view('home', ['usercount' => $nemouser, 'bdays' => $bdays]);
    }

    /**
     * Shows the list of all birthdays
     * 
     * with option to edit and delete record;
     */
    public function birthdays() {
        $candidates = NemoUser::paginate(12);
        return view('bdays', ['candidates' => $candidates]);
    }

    /**
     * Shows the result of search candidates
     * 
     * with link to candidate detail page
     */
    public function searchCandidate(Request $request) {
        if(is_numeric($request->search)) {
            $result = NemoUser::where('mem_id', $request->search)->paginate(12);
        } else {
            $result = NemoUser::where('fname', 'LIKE', "%{$request->search}%")->paginate(12);
        }
        
        if($result->isEmpty()) {
            return view('search', ['result' => 'No record found']);
        } else {
            return view('search', ['result' => $result]);
        }
        
    }

    /**
     * Shows detailed profile of a candidate
     * 
     * with link to edit the profile
     */
    public function show($id) {
        $reslt = NemoUser::where('mem_id', $id)->first();
        return view('candidate-profile', ['result' => $reslt]);
    }

}
