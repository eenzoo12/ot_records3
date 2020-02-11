<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\ot_tbl;
use App\department_tbl;
use App\position_tbl;
use App\agency;
use App\ot_shift;
use Auth;

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
        return view('home');
        
    }

    public function pages()
    { 
        if((Auth::user()->position_id==1)){
            return redirect('admin');
        }
        elseif((Auth::user()->position_id==2))
        {
            return redirect('manager');
        }
        elseif((Auth::user()->position_id==3))
        {
            return redirect('supervisor');
        }
        elseif((Auth::user()->position_id==4))
        {
            return redirect('requester');
        }
        elseif((Auth::user()->position_id==5)||(Auth::user()->position_id==6)||(Auth::user()->position_id==7)||(Auth::user()->position_id==8))
        {
            return redirect('hr');
        }
    }
    public function admin(Request $req)
    {
        $positions = position_tbl::all();
        $departments = department_tbl::all();

        if($req->input('search') == ''){
            $employees = User::orderBy('id', 'DESC')->paginate(10);
        }
        else{
            $employees = User::where('name', 'like', '%'.$req->input('search').'%')->orderBy('id', 'DESC')->paginate(10);
        }

        return view('pages.overtime.admin', compact('employees','positions', 'departments'));
    }
    public function manager()
    {
        $agencies = agency::all();
        $employees = User::all();
        $shifts = ot_shift::all();
        
        $reports = ot_tbl::paginate(5);
        return view('pages.overtime.approveM', compact('reports', 'agencies', 'employees', 'shifts'));
    }                                                                                                                                                                
    public function supervisor()
    {
        $agencies = agency::all();
        $employees = User::all();
        $shifts = ot_shift::all();
        $dept = Auth::user()->department_id;

        $reports = ot_tbl::where('department_id', 'like', $dept)->paginate(5);
        return view('pages.overtime.approveS', compact('reports', 'agencies', 'employees', 'shifts'));
    }
    public function hr(Request $req)
    {
        $agencies = agency::all();
        $employees = User::all();
        $shifts = ot_shift::all();
        $reports = ot_tbl::where('agency_id', '')->get();
        
        if(Auth::user()->position_id==5){
            $reports = ot_tbl::where('agency_id', 'like', '1')->paginate(10);
        }
        elseif(Auth::user()->position_id==6){
            $reports = ot_tbl::where('agency_id', 'like', '2' )->paginate(10);
        }
        elseif(Auth::user()->position_id==7){
            $reports = ot_tbl::where('agency_id', 'like', '3')->paginate(10);
        }
        elseif(Auth::user()->position_id==8){
            $reports = ot_tbl::where('agency_id', 'like', '4')->paginate(10);
        }

        return view('pages.overtime.hr', compact('reports', 'agencies', 'employees', 'shifts'));
    }
    public function requester(Request $req)
    {
        $agencies = agency::all();
        $employees = User::all();
        $shifts = ot_shift::all();
        $dept = Auth::user()->department_id;

        $reports = ot_tbl::where('department_id', 'like', $dept)->paginate(10);
        return view('pages.overtime.requester', compact('reports', 'agencies', 'employees', 'shifts'));
    }


}
