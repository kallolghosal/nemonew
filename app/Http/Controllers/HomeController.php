<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NemoUser;
use App\Models\Company;
use App\Models\Contract;
use App\Models\Ranks;
use App\Models\Vessel;
use App\Models\VslType;
use App\Models\Ports;
use App\Models\BankAcs;
use App\Models\FileUpload;
use App\Models\Discussions;
use App\Models\TravelModel;
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
            ->where('dob', '<', '2002-01-01')
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
            return view('search', ['result' => 0]);
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
        $ranks = Ranks::get();
        $vessels = Vessel::get();
        $vsltype = VslType::get();
        $ports = Ports::get();
        $contract = Contract::where('mem_id', $id)->get();
        $company = Company::select('company_id','company_name')->get();
        $bankacs = BankAcs::where('mem_id', $id)->get();
        $fileuploads = FileUpload::where('mid', $id)->get();
        $discus = Discussions::where('mem_id', $id)->get();
        $travel = TravelModel::where('mem_id', $id)->get();
        return view('candidate-profile', [
            'result' => $reslt, 
            'ranks' => $ranks, 
            'comps' => $company, 
            'vessels' => $vessels, 
            'vsltype' => $vsltype,
            'ports' => $ports,
            'contracts' => $contract,
            'bankacs' => $bankacs,
            'fileuploads' => $fileuploads,
            'discus' => $discus,
            'travel' => $travel,
            'memid' => $id
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        NemoUser::where('mem_id', $id)->delete();
        return \Redirect::route('candidates')->with(['message' => 'Candidate profile deleted successfully']);
    }

}
