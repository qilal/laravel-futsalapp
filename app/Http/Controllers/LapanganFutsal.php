<?php

namespace App\Http\Controllers;
use App\Models\Lapangan;
use App\Models\hours;
use App\Models\Days;
use App\Models\prices;
use Illuminate\Http\Request;

class LapanganFutsal extends Controller
{
    public function dashboard(){
        
        $lapangans = Lapangan::get();
        $hours = hours::get();
        $days = Days::get();
        return view('dsb.dashboard_admin',compact('hours','days','lapangans'));
    }
    // user sudah login
    public function tabel(Lapangan $lapangan){
        $prices = prices::get();
        $hours = hours::get();
        $days = Days::get();
        return view('tampilan_user.tabel_login',compact('hours','days','lapangan','prices') );
    }
    // user belum login
     public function gettabel(Lapangan $lapangan){

            $hours = hours::get();
            $days = Days::get();
            $prices = prices::get();
           return view('tampilan_user.tabel',compact('hours','days','lapangan','prices') );
        }
    // admin
        public function tabeladmin(Lapangan $lapangan){

        $hours = hours::get();
        $days = Days::get();
        $prices = prices::get();
           return view('dsb.tabel_admin',compact('hours','days','lapangan','prices') );
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
            'link_alamat' => 'required',
            'nomor_tlp' => 'required',
            'jumlah_lapangan' => 'required',
            'jumlah_bola' => 'required'
        ]);
      
        $input =  $request->all();
        if ($image = $request->file('gambar')) {
            $destinationPath = 'img/';  
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['gambar'] = "$profileImage";
        }else{
            unset($input['gambar']);
        }
      $lapangan->update($input);
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
            'link_alamat' => 'required',
            'gambar' => 'required',
            'nomor_tlp' => 'required',
            'jumlah_lapangan' => 'required',
            'jumlah_bola' => 'required'
        ]);
        $lapangan = new Lapangan ();
        $lapangan->nama = $request->nama;
        $lapangan->alamat = $request->alamat;
        $lapangan->link_alamat = $request->link_alamat;
        $lapangan->gambar = $request->gambar;
        $lapangan->nomor_tlp = $request->nomor_tlp;
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
