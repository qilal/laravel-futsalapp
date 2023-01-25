<?php

namespace App\Http\Controllers;

use App\Models\prices;
use App\Models\hours;
use App\Models\Days;
use Illuminate\Http\Request;
use App\Models\Lapangan;



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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $lapangans = Lapangan::all();
        $days = Days::all();
        $hours = hours::all();

        return view('price.tambah_price',compact('lapangans','days','hours'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        if(isset($request->hours)){
            if (is_array($request->hours)) {
                foreach($request->hours as $hour){
                    foreach($request->days as $day){
                       $price = new prices();
                       $price->lapangan_id = $request->lapangan;
                       $price->hour_id = $hour;
                       $price->day_id = $day;
                       $price->harga = $request->harga;
                       $price->save();
                     } 
                }
    
            }

        }

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
    public function edit(prices $prices)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\prices  $prices
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, prices $prices)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\prices  $prices
     * @return \Illuminate\Http\Response
     */
    public function destroy(prices $prices)
    {
        //
    }
}
