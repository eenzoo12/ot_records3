<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\agency;
use App\User; 
use App\ot_tbl;
use App\ot_shift;
use Auth;
use Excel;
use DB;


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
                        ->where('first_process', '!=', 'Declined' )
                        ->where('second_process', '!=', 'Approved' )
                        ->where('second_process', '!=', 'Declined' )
                        ->orderBy('id', 'DESC')->paginate(10);
        return view('pages.requester.pendingTab',compact('reports','employees','agencies','shift' ));
    }

    public function import(Request $req)
    {
        $this->validate($req, [
            'select_file' => 'required|mimes:xls,xlsx'
        ]);

        $path = $req->file('select_file')->getRealPath();
 
        $data = Excel::load($path)->get();

        if($data->count() > 0 )
        {
            foreach($data->toArray() as $key => $value)
            {
                foreach($value as $row)
                {
                    $insert_data[] = array(
                        'name' => $row['Name'],
                        'department_id' => $row['Department_ID'],
                        'date' => $row['Date'],
                        'shift_sched' => $row['Shift_ID'],
                        'agency_id' => $row['Agency_ID'],
                        'job_content' => $row['Job_Content'],
                        'results' => $row['Results'],
                        'time_from' => $row['Time_from'],
                        'time_to' => $row['Time_to'],
                        'time_hrs' => $row['Time_hrs'],
                        'first_process' => '',
                        'second_process' => '',
                    );
                }
            }
            if(!empty($insert_data))
            {
                DB::table('ot_tbl')->insert($insert_data);
            }
        }
        return back()->with('success', 'Successfully Imported');
        
      
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
            'jcontent' => 'required|string',
            'results' => 'required|string',
            'shift' => 'required|integer',
            'agency' => 'required|integer',
            'tfrom' => 'required',
            'tto' => 'required',
            'hrs' => 'required|integer',
        ]);

        $request = new ot_tbl;

        $request->name = $req->name;
        $request->department_id = $req->department_id;
        $request->period_from = $req->periodfrom;
        $request->period_to = $req->periodto;
        $request->date = $req->date;
        $request->shift_sched = $req->shift;
        $request->agency_id = $req->agency;
        $request->job_content = $req->jcontent;
        $request->results = $req->results;
        $request->time_from = $req->tfrom;
        $request->time_to = $req->tto;
        $request->time_hrs = $req->hrs;
        $request->first_process='';
        $request->second_process='';
        $request->third_process='';
        $request->save();
    
        return 'success';
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
