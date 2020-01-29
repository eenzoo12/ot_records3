<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; 
use App\User;
use App\department_tbl;
use App\position_tbl;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $employees = User::all();
        return view('pages.overtime.admin',compact('employees'));
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
        $request->validate([
            'name' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|string',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'gender' => 'required|string',
            'position' => 'required|integer',
            'department' => 'required|integer',
            
        ]);
        $password = $request->password;
        $hashed = Hash::make($password);

        $register = new User;
        
        $register->name = $request->name;
        $register->phone = $request->phone;
        $register->email = $request->email;
        $register->password = $hashed;
        $register->gender = $request->gender;
        $register->position_id = $request->position;
        $register->department_id = $request->department;
        $register->save();

        return 'success';
    }

    function getdata()
    {
     $employees = User::select('id', 'name', 'email', 'phone', 'position_id', 'department_id');
     return Datatables::of($employees)
            ->addColumn('action', function($employee){
                return 
                '<a href="#" class="btn btn-xs btn-primary edit" id="'.$employee->id.'"><i class="fa fa-pencil"></i> Edit</a>
                <a href="#" class="btn btn-xs btn-danger delete" id="'.$employee->id.'"><i class="glyphicon glyphicon-remove"></i> Delete</a>';
            })
            ->addColumn('checkbox', '<input type="checkbox" name="employee_checkbox[]" class="employee_checkbox" value="{{$id}}" />')
            ->rowColumns(['checkbox','action'])
            ->make(true);
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
        $employee = User::findOrFail($request->employee_id);
        $employee->name = $request->name;
        $employee->phone = $request->phone;
        $employee->email = $request->email;
        $employee->position_id = $request->position;
        $employee->department_id = $request->department;
        $employee->save();
       
        return redirect('admin')->with('success','Successfully updated!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $employee = User::findOrFail($request->employee_id);
        $employee->delete();
       
        return redirect('admin')->with('success','Successfully deleted!!');
    }


}
