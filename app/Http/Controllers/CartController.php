<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cartList()
    {
        $cartItems = \Cart::getContent();
        //dd($cartItems);
        return view('cart', compact('cartItems'));
    }

    public function addToCart(Request $request)
    {
        \Cart::add([
            'id'            => $request->id,
            'name'          => $request->name,
            'price'         => $request->price,
            'quantity'      => $request->quantity,
            'attributes'    => array(
                'image' => $request->image,
            )
        ]);
        session()->flash('success', 'Product Berhasil Di Tambahkan Ke Keranjang !');
        return redirect()->route('cart.list');
    }

    public function updateCart(Request $request)
    {
        \Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value'    => $request->quantity
                ],
            ]
        );

        session()->flash('success', 'Item Keranjang Berhasil Di Update !');
        return redirect()->route('cart.list');
    }

    public function removeCart(Request $request)
    {
        \Cart::remove($request->id);
        session()->flash('success', 'Item Keranjang Berhasil Di Hapus !');
        return redirect()->route('cart.list');
    }

    public function clearAllCart()
    {
        \Cart::clear();
        session()->flash('success', ' Semua Item Keranjang Berhasil Di Hapus !');
        return redirect()->route('cart.list');
    }
}
