<?php

namespace App\Http\Controllers;

use App\Models\employe;
use App\Models\Company;
use App\Models\Perusahaan;
use Illuminate\Http\Request;

class employeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = employe::simplePaginate(10);
        // return $employe;
        return view('employe', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $company = Perusahaan::all();
        return view('addEmploye', compact('company'));
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
            'first_name' => 'required',
            'last_name' => 'required',
            'company_id' => 'required'
        ]);

        employe::create($request->all());
        return redirect('employe')->with('success', 'New employee Has been Added');
        // return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function show(employe $employe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function edit(employe $employe)
    {
        $company = Perusahaan::all();
        return view('showEmploye', compact('employe', 'company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, employe $employe)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'company_id' => 'required'
        ]);

        employe::where('id', $employe->id)
        ->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'company_id' => $request->company_id,
            'email' => $request->email,
            'phone' => $request->email,

        ]);

    return redirect('employe')->with('success', 'employe hasbee edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function destroy(employe $employe)
    {
        $employe->delete();
        return redirect('employe')->with('success', 'New employee Has been deleted');
    }
}
