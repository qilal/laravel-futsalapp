<?php

namespace App\Http\Controllers;

use LapanganFutsal;
use Auth;
use App\Models\prices;
use App\Models\hours;
use App\Models\Days;
use App\Models\Lapangan;
use Illuminate\Http\Request;




class PricesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('price.data_price');
    }
    public function tabel(){
        $prices = prices::get();
        $lapangans = Lapangan::get();
        $hours = hours::get();
        $days = Days::get();
           return view('tabel',compact('hours','days','lapangans','prices') );
       }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->role_id == 1)
        {
        $lapangans = Lapangan::get();
        }else{
        $lapangans = Lapangan::where('id_lapangan_futsal',Auth::user()->lapangan_id)->get();
        }
        $days = Days::all();
        $hours = hours::all();
        $prices = prices::all();
        return view('price.tambah_price',compact('lapangans','days','hours','prices'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(isset($request->hours)){
            if (is_array($request->hours)) {
                foreach($request->hours as $hour){
                    foreach($request->days as $day){
                       $price = new prices();
                       $price->lapangan_id = $request->lapangan;
                       $price->hour_id = $hour;
                       $price->day_id = $day;
                       $price->harga = $request->harga;
                       $price->is_open = $request->is_open;
                       $price->save();
                     } 
                }
    
            }

        }
        // return redirect()->intended('tabel-admin');
        return redirect()->route('tabel-admin', $request->lapangan);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\prices  $prices
     * @return \Illuminate\Http\Response
     */
    public function show(prices $prices)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\prices  $prices
     * @return \Illuminate\Http\Response
     */
    public function edit(prices $price)
    {
        // dd($prices->is_open);
        if (Auth::user()->role_id == 1)
        {
        $lapangans = Lapangan::get();
        }else{
        $lapangans = Lapangan::where('id_lapangan_futsal',Auth::user()->lapangan_id)->get();
        }
        $days = Days::all();
        $hours = hours::all();
        return view('price.edit_price',compact('lapangans','days','hours','price'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\prices  $prices
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, prices $price)
    {
        {
            // $request->validate([
            //     'lapangan' => 'required',
            //     '' => 'required',
            // ]);
                
            $price->update([
                'harga' => $request->harga,
                'is_open' => $request->is_open
            ]);
          
            return redirect()->route('tabel-admin',$price->lapangan_id)
                            ->with('success','Product updated successfully');    
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\prices  $prices
     * @return \Illuminate\Http\Response
     */
    public function destroy(prices $prices)
    {
        $lapangan = Lapangan::get();
        $prices->delete();
        return redirect()->route('typelapangan.index');
    }
}
