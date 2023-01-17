<?php

namespace App\Http\Controllers;

use App\Models\Days;
use Illuminate\Http\Request;

class DaysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $days = Days::get();
        return view('days.data_days',compact('days'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('days.tambah_data');
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
            'nama' => 'required',
        ]);
        $days = new Days ();
        $days->nama = $request->nama;
        $days->save();
        return redirect()->route('day.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Days  $days
     * @return \Illuminate\Http\Response
     */
    public function show(Days $days)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Days  $days
     * @return \Illuminate\Http\Response
     */
    public function edit(Days $days)
    {
        return view('days.edit_data',compact('days'));   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Days  $days
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Days $days)
    {
        $request->validate([
            'nama' => 'required',
        ]);
      
        $typelapangan->update($request->all());
      
        return redirect()->route('typelapangan.index')
                        ->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Days  $days
     * @return \Illuminate\Http\Response
     */
    public function destroy(Days $days)
    {
        $days->delete();
        return redirect()->route('day.index');
    }
}
