<?php

namespace App\Http\Controllers;

use App\Models\hours;
use Illuminate\Http\Request;

class HoursController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    
    {
            $hours = Hours::get();
            return view('hours.data_hours',compact('hours')); 
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hours.tambah_hours');
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
            'jam' => 'required',
        ]);
        $hours = new Hours ();
        $hours->jam = $request->jam;
        $hours->save();
        return redirect()->route('hour.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\hours  $hours
     * @return \Illuminate\Http\Response
     */
    public function show(hours $hours)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\hours  $hours
     * @return \Illuminate\Http\Response
     */
    public function edit(hours $hour)
    {
        return view('hours.edit_hours',compact('hour'));    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\hours  $hours
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, hours $hour)
    {
        $request->validate([
            'jam' => 'required',
        ]);
      
        $hour->update($request->all());
      
        return redirect()->route('hour.index')
                        ->with('success','Product updated successfully');    
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\hours  $hours
     * @return \Illuminate\Http\Response
     */
    public function destroy(hours $hour)
    {
        $hour->delete();
        return redirect()->route('hour.index');
    }
}
