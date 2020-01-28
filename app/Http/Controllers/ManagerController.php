<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        // Myroutes::where('id', $id)
        //         ->update(['start' => $request->input('start'),
        //                  'end'=>$request->input('end'),
        //                  'waypoint'=>$request->input('waypoints')]
        //                 );
       $id = $request->input('id');
        DB::table('ot_table')
        ->where('id', $id)
        ->update(['first_process'=>'Approved']);

        return 'success';
        // $report = ot_table::wherein('id', $request->input('.checkitem:checked'))
        //         ->update(['first_process'=>'Approved']);
        // // $report->save();
        // return redirect('manager')->with('success');
    }
    public function decline(Request $request)
    {

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
