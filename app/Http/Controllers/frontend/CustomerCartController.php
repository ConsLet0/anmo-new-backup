<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerCartController extends Controller
{
    public function meja1($no_meja)
    {
        $tables = \App\Models\Table::orderBy('id', 'DESC')
            ->groupBy('no_meja')
            ->where('no_meja', $no_meja)
            ->first();
        $detailTables = \App\Models\Table::orderBy('id', 'DESC')
            ->where('no_meja', $no_meja)
            ->get();
        $foods        = \App\Models\Food::orderBy('id', 'ASC')
            ->get();

        return view('frontend.cart.meja1', compact('tables', 'detailTables', 'foods'));
    }

    public function store(Request $request)
    {
        \Cart::add([
            'id'            =>  $request->id,
            'quantity'      => $request->qty,
            'name'          =>  $request->name,
            'price'         =>  $request->price,
            'attributes'    => array(
                'id'            =>  $request->id,
                'name'          =>  $request->name,
                'price'         =>  $request->price,
                'qty'           =>  $request->qty,
                'photo'         => $request->photo,
                'name_struk'    =>  $request->name_struk,
                'price_struk'   =>  $request->price_struk,
                'table_id'      =>  $request->table_id,
            ),
        ]);

        // $request->session()->forget(Cart::getContent());

        return response()->json([
            'status'    => 200,
            'message'   => 'Product Berhasil Di Tambahkan Ke Keranjang'
        ]);

        // return redirect()->back();
    }

    // public function store(Request $request)
    // {
    //     $carts              = new \App\Models\Cart;
    //     $carts->name        = $request->get('name');
    //     $carts->name_struk  = $request->get('name_struk');
    //     $carts->price       = $request->get('price');
    //     $carts->price_struk = $request->get('price_struk');
    //     $carts->qty         = $request->get('qty');
    //     $carts->photo       = $request->get('photo');
    //     $carts->table_id    = $request->get('table_id');
    //     $carts->save();

    //     return response()->json([
    //         'status'    => 200,
    //         'message'   => 'Product Berhasil Di Tambahkan Ke Keranjang'
    //     ]);

    //     // return redirect()->back();
    // }

    public function update(Request $request)
    {
        \Cart::update(
            $request->id,
            [
                'quantity' => array(
                    'relative' => false,
                    'value'    => $request->qty
                )
            ]
        );

        session()->flash('success', 'Product Quantity Di Keranjang Berhasil Di Update !');
        return redirect()->back();
    }

    // public function update(Request $request)
    // {
    //     $carts = \App\Models\Cart::find($request->get('id'));
    //     $carts->qty = $request->get('qty');
    //     $carts->update();

    //     session()->flash('success', 'Product Quantity Di Keranjang Berhasil Di Update !');
    //     return redirect()->back();
    // }

    public function destroy(Request $request)
    {
        \Cart::remove($request->id);
        session()->flash('danger', 'Product Di Keranjang Berhasil Di Delete !');
        return redirect()->back();
    }

    // public function destroy(Request $request)
    // {
    //     $carts = \App\Models\Cart::find($request->get('id'));
    //     $carts->delete();
    //     session()->flash('danger', 'Product Di Keranjang Berhasil Di Delete !');

    //     return redirect()->back();
    // }

    public function clear()
    {
        \Cart::clear();
        session()->flash('danger', ' Semua Item Keranjang Berhasil Di Hapus !');
        return redirect()->back();
    }
}
