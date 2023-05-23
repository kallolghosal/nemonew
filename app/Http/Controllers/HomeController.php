<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NemoUser;
use App\Models\Company;

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
        return view('home', ['usercount' => $nemouser]);
    }
}
