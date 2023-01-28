<?php

namespace App\Http\Controllers;
use App\Models\Lapangan;
use App\Models\hours;
use App\Models\Days;
use Illuminate\Http\Request;

class LapanganFutsal extends Controller
{
    public function dashboard(){

        return view('dsb.dashboard_admin');
    }
    
    public function tabel()
    {
     $hours = hours::get();
     $days = Days::get();
        return view('tabel',compact('hours','days') );
    }
    

    public function index()
    {
        $lapangans = Lapangan::get();
        return view('dsb.data_lapangan',compact('lapangans'));  // $lapangans -> compact('lapangans')
    }

    public function edit(Lapangan $lapangan)
    {
        return view('dsb.edit_lapangan',compact('lapangan'));
    }

    public function update(Request $request, Lapangan $lapangan)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'jumlah_lapangan' => 'required',
            'jumlah_bola' => 'required'
        ]);
      
        $lapangan->update($request->all());
      
        return redirect()->route('lapangan.index')
                        ->with('success','Product updated successfully');
    }


    public function create(Lapangan $lapangan)
    {
        return view('dsb.tambah_data_lapangan');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'jumlah_lapangan' => 'required',
            'jumlah_bola' => 'required'
        ]);
        $lapangan = new Lapangan ();
        $lapangan->nama = $request->nama;
        $lapangan->alamat = $request->alamat;
        $lapangan->jumlah_lapangan = $request->jumlah_lapangan;
        $lapangan->jumlah_bola = $request->jumlah_bola;
        $lapangan->save();
        return redirect()->route('lapangan.index');
    }
    
    public function destroy(Lapangan $lapangan)
    {
        $lapangan->delete();
        return redirect()->route('lapangan.index');
    }
}
