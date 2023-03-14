<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderDetail;
use Auth;

class OrderDetailController extends Controller
{
    public function index(){
        if (Auth::user()->role->id == 2 ){
        $orderDetails = OrderDetail::whereHas('order', function ($query) {
            return $query->where('status', '=', 'Paid');
        })->where('lapangan_id',Auth::user()->lapangan_id)->with('hour','day')->get();
        return view('dsb.order_lapangan',compact('orderDetails'));
    }elseif(Auth::user()->role->id == 1){
        $orderDetails = OrderDetail::whereHas('order', function ($query) {
            return $query->where('status', '=', 'Paid');
        })->with('hour','day')->get();
        return view('dsb.order_lapangan',compact('orderDetails'));
    }
    }
}
