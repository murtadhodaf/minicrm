<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Company;
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Facades\Session;

class CompanyController extends Controller
{
    public function index(){

        $data = Company::simplePaginate(3);
        return view('company', compact('data'));
        Session::put('pageUrl', request()->fullUrl());
    }

    public function addcompany(){
        return view('addcompany');
    }

    public function insertcompany(Request $request){

        $this->validate($request,[
            'name'=>'required',
            'photo'=>'dimensions:max_width=300,max_height=200'
        ]);

        $data = Company::create($request->all());
        if($request->hasFile('photo')){
            $request->file('photo')->move('companyPhoto/', $request->file('photo')->getClientOriginalName());
            $data->photo =$request->file('photo')->getClientOriginalName();
            $data->save();
        }

        return redirect()->route('company')->with('success', 'Adding Company Data Succeessfully');
    }

    public function showcompany($id){
        $data = Company::find($id);
        return view('showCompany', compact('data'));
    }

    public function updatecompany(Request $request, $id){
        $data = Company::find($id);
        $data->update($request->all());
        return redirect()->route('company')->with('success', 'Edit Company Data Succeessfully');
    }

    public function deletecompany($id){
        $data = Company::find($id);
        $data->delete();
        return redirect()->route('company')->with('success', 'Delete Company Data Succeessfully');
    }
}
