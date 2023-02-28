<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderDetail;
use Auth;

class OrderDetailController extends Controller
{
    public function index(){
        // $orderDetails = OrderDetail::whereHas('order', function ($query) {
        //     return $query->where('status', '=', 'Paid');
        // })->with('hour','day','lapangan')->get();
        $orderDetails = OrderDetail::whereHas('order', function ($query) {
            return $query->where('status', '=', 'Paid');
        })->where('lapangan_id',Auth::user()->lapangan_id)->with('hour','day')->get();
        return view('dsb.order_lapangan',compact('orderDetails'));
    }
}
