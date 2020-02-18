<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\agency;
use App\User; 
use App\ot_tbl;
use App\ot_shift;
use Auth;

class SupervisorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agencies = agency::all();
        $employees = User::all();
        $shifts = ot_shift::all();
        $dept = Auth::user()->department_id;

        
        $reports = ot_tbl::where('department_id', 'like', $dept)
                ->whereNull('first_process')->paginate(10);
        return view('includes.table.supervisorTbl', compact('reports', 'agencies', 'employees', 'shifts'));
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

    public function approve(Request $request)
    {
       $id = $request->input('id');
       ot_tbl::whereIn('id', $id)
        ->update(['first_process'=>'Approved']);

        return 'success';
    }
    public function decline(Request $request)
    {
        $id = $request->input('id');
        ot_tbl::whereIn('id', $id)
         ->update(['first_process'=>'Declined']);
 
         return 'success';
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
