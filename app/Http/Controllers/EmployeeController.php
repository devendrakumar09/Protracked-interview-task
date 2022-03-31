<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Company;
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emp = Employee::orderBy('created_at','DESC')->paginate(10);
        return view('employee.list')
                    ->with('data',$emp);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cmp = Company::all();
        return view('employee.create')
                    ->with('data',$cmp);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'company' => 'required',
            'email' => 'required|unique:employees|max:255',
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'mobile' => 'required|max:10|numeric',            
        ]);
        $data = new Employee;
        $data->company  = $request->company; 
        $data->first_name = $request->first_name;
        $data->last_name = $request->last_name;        
        $data->email = $request->email;
        $data->phone = $request->mobile;        
                       
        $data->save();
        if ($data) {
            return back()->with('message','Employee Added Sucessfuly');
        }else {
            return back()->with('message','something Went Wrong');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect()->route('employee.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Employee::find($id);
        $cmp = Company::all();
        return view('employee.edit')
                ->with('data',$data)
                ->with('cmp',$cmp);
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
        $validated = $request->validate([
            'company' => 'required',
            'email' => 'required|max:255|unique:employees,email,'.$id,
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'mobile' => 'required|max:255',            
        ]);
        $data = Employee::find($id);
        $data->company  = $request->company; 
        $data->first_name = $request->first_name;
        $data->last_name = $request->last_name;        
        $data->email = $request->email;
        $data->phone = $request->mobile;        
                       
        $data->save();
        if ($data) {
            return back()->with('message','Employee Updated Sucessfuly');
        }else {
            return back()->with('message','something Went Wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Employee::find($id)->delete();
        if ($data) {
            return back()->with('message','1 Row Deleted..');
        }else {
            return back();
        }
    }
}
