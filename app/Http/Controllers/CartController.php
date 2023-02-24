<?php

namespace App\Http\Controllers;
use App\Models\Lapangan;
use App\Models\hours;
use App\Models\Days;
use App\Models\prices;
use Illuminate\Http\Request;
use Redirect;

class CartController extends Controller
{
    public function cartList(Lapangan $lapangan)
    {
        $cartItems = \Cart::getContent();
        $days = Days::get();
        $hours = hours::get();
        $prices = prices::get();
        // dd($cartItems);
        return view('tampilan_user/cart', compact('cartItems','lapangan','days','hours','prices'));
    }

    public function tabel(Lapangan $lapangan){
        $prices = prices::get();
        $hours = hours::get();
        $days = Days::get();
        return view('tampilan_user.tabel_login',compact('hours','days','lapangan','prices') );
    }

    public function addToCart(Request $request)
    {
        // dd( $request->id);
        if (\Cart::has($request->id)) {
            return Redirect::back()->withErrors(['msg' => 'Jam tersebut sudah ada dalam keranjang, Pilih jam lain']);
        }
        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'lapangan' => $request->price,
            'quantity' => $request->quantity,
        ]);
        // dd($request);
        session()->flash('success', 'Product is Added to Cart Successfully !');
        return redirect()->route('cart.list');
    }

    public function updateCart(Request $request)
    {
        \Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );

        session()->flash('success', 'Item Cart is Updated Successfully !');

        return redirect()->route('cart.list');
    }

    public function removeCart(Request $request)
    {
        \Cart::remove($request->id);
        session()->flash('success', 'Item Cart Remove Successfully !');

        return redirect()->route('cart.list');
    }

    public function clearAllCart()
    {
        \Cart::clear();

        session()->flash('success', 'All Item Cart Clear Successfully !');

        return redirect()->route('cart.list');
    }
}
