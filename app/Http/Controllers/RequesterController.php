<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\agency;
use App\User; 
use App\ot_tbl;
use App\ot_shift;
use Auth;
use DB;
use Validator;
use App\Imports\RequestsImport;
use Maatwebsite\Excel\Facades\Excel;


class RequesterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = User::all();
        $agencies = agency::all();
        $shift = ot_shift::all();
        $dept = Auth::user()->department_id;
        
        $reports = ot_tbl::where('department_id', 'like', $dept )
                        ->where(function ($query) {
                            $query->whereNull('first_process')
                                ->orwhere('first_process', '!=', 'Declined');
                        })
                        ->whereNull('second_process')
                        
                        ->orderBy('id', 'DESC')->paginate(10);
        return view('pages.requester.pendingTab',compact('reports','employees','agencies','shift' ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $req->validate([
            'name' => 'required|string',
            'date' => 'required|date',
            'department_id' => 'required|integer',
            'job_content' => 'required|string',
            'results' => 'required|string',
            'shift_sched' => 'required|integer',
            'agency_id' => 'required|integer',
            'time_from' => 'required',
            'time_to' => 'required',
            'time_hrs' => 'required|integer',
        ]);

        $request = new ot_tbl;

        $request->name = $req->name;
        $request->department_id = $req->department_id;
        $request->date = $req->date;
        $request->shift_sched = $req->shift_sched;
        $request->agency_id = $req->agency_id;
        $request->job_content = $req->job_content;
        $request->results = $req->results;
        $request->time_from = $req->time_from;
        $request->time_to = $req->time_to;
        $request->time_hrs = $req->time_hrs;
        
        $request->save();
    
        return 'success';
    }

    public function import(Request $req)
    {
        $req->validate([
                'select_file' => 'required|mimes:xls,xlsx'
            ]);
        
        if($req->hasFile('select_file')){
            Excel::import(new RequestsImport, $req->select_file);
        
            return redirect('/requester');
        }
        
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
