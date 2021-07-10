<?php

namespace App\Http\Controllers;

use App\Mail\companyNotif;
use App\Models\Perusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;

class perusahaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perusahaan = Perusahaan::simplePaginate(10);
        return view('layout.perusahaan.index',compact('perusahaan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $perusahaan = new Perusahaan();


        return view('layout.perusahaan.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $perusahaan = new Perusahaan();
        $perusahaan->name = $request->input('name');
        $perusahaan->email = $request->input('email');
        $perusahaan->website = $request->input('website');
        $perusahaan->picture = $request->input('picture');

        if($request->hasfile('picture'))
        {
            $file = $request->file('picture');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('foto/', $filename);
            $perusahaan->picture = $filename;
        }
        $perusahaan->save();
        Mail::to($perusahaan->email)->send(new companyNotif());
        return redirect('perusahaan')->with('success', 'New employee Has been Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Perusahaan  $perusahaan
     * @return \Illuminate\Http\Response
     */
    public function show(Perusahaan $perusahaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Perusahaan  $perusahaan
     * @return \Illuminate\Http\Response
     */
    public function edit(Perusahaan $perusahaan)
    {

        return view('layout.perusahaan.edit',compact('perusahaan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Perusahaan  $perusahaan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Perusahaan $perusahaan)
    {


        // $perusahaan = Perusahaan::find($id);
        // $perusahaan->name = $request->input('name');
        // $perusahaan->email = $request->input('email');
        // $perusahaan->website = $request->input('website');
        // $perusahaan->picture = $request->input('picture');

        // if($request->hasfile('picture'))
        // {
        //     $destination = 'foto/'.$perusahaan->picture;

        //     if (File::exist($destination)) {
        //         File::delete($destination);
        //     }

        //     $file = $request->file('picture');
        //     $extension = $file->getClientOriginalExtension();
        //     $filename = time().'.'.$extension;
        //     $file->move('foto/', $filename);
        //     $perusahaan->picture = $filename;
        // }
        // $perusahaan->update();




        $request->validate([
            'name' => 'required',
            'picture' => 'required'
        ]);

        Perusahaan::where('id', $perusahaan->id)
        ->update([
            'name' => $request->name,
            'website' => $request->website,
            'picture' => $request->picture,
            'email' => $request->email,

        ]);

    return redirect('perusahaan')->with('success', 'employe hasbee edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Perusahaan  $perusahaan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perusahaan $perusahaan)
    {
        $perusahaan->delete();
        return redirect('perusahaan')->with('success', 'employe hasbee delted');
    }
}
