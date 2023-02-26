<?php

namespace App\Http\Controllers;

use App\Models\prices;
use Config;
use Illuminate\Http\Request;
use Midtrans;
use App\Models\Order;
use App\Models\OrderDetail;
use Auth;
use Redirect;

class OrderController extends Controller
{
    public function checkout()
    {
        $cartItems = \Cart::getContent();
        $order = new Order;
        $order->user_id = Auth::user()->id;
        $order->total_item = \Cart::getTotalQuantity();
        $order->total_price = \Cart::getTotal();
        $order->status = 'Unpaid';
        $order->save();
        foreach ($cartItems as $value) {
            $price = prices::findOrFail($value->id);
            $orderdetail = new OrderDetail;
            $orderdetail->order_id = $order->id;
            $orderdetail->lapangan_id = $price->lapangan_id;
            $orderdetail->hour_id = $price->hour_id;
            $orderdetail->day_id = $price->day_id;
            $orderdetail->price = $value->price;
            $orderdetail->save();
        }
        \Cart::clear();
        return redirect()->route('order.detail',$order->id);
        // dd($snapToken);
    }

    public function GetAllOrder(){
        $orders = Order::where('user_id',Auth::user()->id)->get();
        return view('tampilan_user.order',compact('orders'));
    }

    public function GetDetailOrder(Order $order){
        \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $order->id,
                'gross_amount' => $order->total_price,
            ),
            'customer_details' => array(
                'name' => Auth::user()->name,
                'email' => Auth::user()->email,
                'phone' => Auth::user()->nomer_tlp,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        return view('tampilan_user.order_detail',compact('order','snapToken'));
    }

    public function callback(Request $request)
    {
        $serverkey = env('MIDTRANS_SERVER_KEY');
        $hashed = hash("sha512", $request->order_id.$request->status_code.$request->gross_amount.$serverkey);
        if ($hashed == $request->signature_key) {
            if ($request->transaction_status == "capture") {
                $order = Order::find($request->order_id);
                $order->update(['status' => 'Paid']);

                // return redirect()->route('order.getall');
            }
        }
    
    }

}
