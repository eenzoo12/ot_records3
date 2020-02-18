<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\ot_tbl;
use App\agency;
use App\ot_shift;
use Auth;
use DB;
use Carbon\Carbon;
use App\Exports\RequestsExport;
use Maatwebsite\Excel\Facades\Excel;

class HRController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        $datefrom = $req->input('otfrom');
        $dateto = $req->input('otto');
        $shift = $req->input('shift');
        $name = $req->input('txtname');


        $employees = User::all();
        $agencies = agency::all();
        $shifts = ot_shift::all();
        
        // AGENCY getting data
        if(Auth::user()->position_id==5){
            $reports = ot_tbl::where('agency_id', 'like', '1');
        }
        elseif(Auth::user()->position_id==6){
            $reports = ot_tbl::where('agency_id', 'like', '2' );
        }
        elseif(Auth::user()->position_id==7){
            $reports = ot_tbl::where('agency_id', 'like', '3');
        }
        elseif(Auth::user()->position_id==8){
            $reports = ot_tbl::where('agency_id', 'like', '4');
        }
        
        // Getting name of employee overtime
        if($name){
            $reports = $reports->where('name', 'like', '%'.$name.'%');
        }
        

        // Sort the category
        if($datefrom && $dateto)
        {
            $reports = $reports->whereBetween('date',[$datefrom, $dateto])
                        ->where('shift_sched',$shift);
        }
        
        // Final Query for Overtime record
        $reports = $reports->orderBy('date', 'DESC')->paginate(10);

        return view('includes.table.hrAllreqTbl', compact('reports', 'agencies', 'employees', 'shifts'));
    }

    public function exportRequest(Request $req){
        $filename = 'OVERTIME_';
        if($req->input('otfrom') == $req->input('otto')){
            $filename .= $req->input('otfrom').'_'.Date('His');
        }
        else{
            $filename .= $req->input('otfrom').'_to_'.$req->input('otto').'_'.Date('His');
        }
        return Excel::download(new RequestsExport(
            $req->input('otfrom'),
            $req->input('otto'),
            $req->input('shift')
        ), $filename.'.xlsx');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function approve(Request $request)
    {
       //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
}
