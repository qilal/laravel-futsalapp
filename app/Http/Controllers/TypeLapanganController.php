<?php

namespace App\Http\Controllers;

use App\Models\TypeLapangan;
use Illuminate\Http\Request;

class TypeLapanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typelapangans = TypeLapangan::get();
        return view('type_lapangan.data_lapangan',compact('typelapangans')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('type_lapangan.tambah_data_lapangan');
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
            'name' => 'required',
        ]);
        $lapangan = new TypeLapangan ();
        $lapangan->name = $request->name;
        $lapangan->save();
        return redirect()->route('typelapangan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TypeLapangan  $typeLapangan
     * @return \Illuminate\Http\Response
     */
    public function show(TypeLapangan $typeLapangan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TypeLapangan  $typeLapangan
     * @return \Illuminate\Http\Response
     */
    public function edit(TypeLapangan $typelapangan)
    {
        return view('type_lapangan.edit_lapangan',compact('typelapangan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TypeLapangan  $typeLapangan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TypeLapangan $typelapangan)
    {
        $request->validate([
            'name' => 'required',
        ]);
      
        $typelapangan->update($request->all());
      
        return redirect()->route('typelapangan.index')
                        ->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TypeLapangan  $typeLapangan
     * @return \Illuminate\Http\Response
     */
    public function destroy(TypeLapangan $typelapangan)
    {
        $typelapangan->delete();
        return redirect()->route('typelapangan.index');
    }
}
