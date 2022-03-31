<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cmp = Company::orderBy('created_at','DESC')->simplePaginate(10);
        return view('company.list')
                    ->with('data',$cmp);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');        
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
            'email' => 'required|unique:companies|max:255',
            'title' => 'required|max:255',
            'mobile' => 'required|max:10|numeric',
            'image' => 'required | image | mimes:jpeg,png,jpg,gif,svg | max:2048',            
        ]);
        $data = new Company;
        $data->name = $request->title;
        $data->email = $request->email;
        $data->phone = $request->mobile;        
        $data->website = $request->website;        
        $image = $request->image->store('public/logo');        
        $data->logo = $image;
        $data->save();
        if ($data) {
            return back()->with('message','Compnay Added Sucessfuly');
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
        return redirect()->route('company.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cmp = Company::find($id);
        return view('company.edit')
                ->with('data',$cmp);

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
            'email' => 'required|max:255|unique:companies,email,'.$id,
            'title' => 'required|max:255',
            'mobile' => 'required|max:255',            
        ]);
        $data = Company::find($id);
        $data->name = $request->title;
        $data->email = $request->email;
        $data->phone = $request->mobile;        
        $data->website = $request->website;        
        
        //images
        if ($request->hasFile('image')) {
            $image = $request->image->store('public/logo');        
            $data->logo = $image;
        }   
        $data->save();
        if ($data) {
            return back()->with('message','Compnay Updated Sucessfuly');
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
        $data = Company::find($id)->delete();
        if ($data) {
            return back()->with('message','1 Row Deleted..');
        }else {
            return back();
        }
    }
}
