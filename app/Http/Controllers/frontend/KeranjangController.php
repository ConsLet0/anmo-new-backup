<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Auth;

class KeranjangController extends Controller
{
    public function keranjang_meja1($no_meja)
    {
        $tables = \App\Models\Table::groupBy('no_meja')
            ->orderBy('id', 'DESC')
            ->where('no_meja', $no_meja)
            ->first();
        $detailTables = \App\Models\Table::orderBy('id', 'DESC')
            ->where('no_meja', $no_meja)
            ->get();
        $cartConditions = \Cart::getConditions();
        $cartItems = \Cart::getContent();
        return view('frontend.cart.meja1', compact('cartItems', 'cartConditions', 'tables', 'detailTables'));
    }

    public function keranjang_meja2($no_meja)
    {
        $tables = \App\Models\Table::groupBy('no_meja')
            ->orderBy('id', 'DESC')
            ->where('no_meja', $no_meja)
            ->first();
        $detailTables = \App\Models\Table::orderBy('id', 'DESC')
            ->where('no_meja', $no_meja)
            ->get();
        $cartConditions = \Cart::getConditions();
        $cartItems = \Cart::getContent();
        return view('frontend.cart.meja2', compact('cartItems', 'cartConditions', 'tables', 'detailTables'));
    }

    public function store(Request $request)
    {
        \Cart::add([
            'id'            => $request->id,
            'name'          => $request->name,
            'price'         => $request->price,
            'quantity'      => $request->qty,
            'attributes'    => array(
                'image' => $request->photo,
            )
        ]);

        // session()->flash('success', 'Product Berhasil Di Tambahkan Ke Keranjang !');
        return redirect()->back();
    }

    public function update(Request $request)
    {
        \Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value'    => $request->qty,
                ],
            ]
        );

        session()->flash('success', 'Product Berhasil Di Perbaharui Di Keranjang !');
        return redirect()->route('keranjang');
    }

    public function destroy(Request $request)
    {
        \Cart::remove($request->id);
        session()->flash('success', 'Product Berhasil Di Delete Ke Keranjang !');
        return redirect()->route('keranjang');
    }

    public function destroy_all(Request $request)
    {
        \Cart::clear();
        session()->flash('success', ' Semua Product Berhasil Di Delete Ke Keranjang !');
        return redirect()->route('keranjang');
    }

    public function checkout(Request $request)
    {
        $dataOrderan                = new \App\Models\Order;
        $namaMakanan                = $request->get('name');
        // deklarasi sebagai empty string;
        $hasil                      = '';
        for ($i = 0; $i < count($namaMakanan); $i++) {
            // cek apa $i adalah index terakhir dari namaMakanan
            if ($i == count($namaMakanan) - 1) {
                $hasil .= $namaMakanan[$i];
                // kalau terakhir ga perlu tambah ','
                // perhatikan $hasil .= (bukan deklarasi tapi penambahan strings)
                // bukan $hasil = (kalau begini jadi deklarasi)
            } else {
                // kalau bukan terakhir tambahkan ','
                $hasil .= $namaMakanan[$i] . ',';
            }
        }
        // close loop sehingga $hasil valuenya 'arik,agus,gabriella'
        // kalau tanpa if else di atas jadinya 'arik,agus,gabriella,'
        $dataOrderan->name          = $hasil;
        $dataOrderan->qty           = $request->get('qty');
        $dataOrderan->no_meja       = $request->get('no_meja');
        $dataOrderan->total_price   = $request->get('total_price');
        $dataOrderan->status        = $request->get('status');
        $dataOrderan->user_id       = Auth::user()->id;
        $dataOrderan->save();
        // $dataOrderan->foods()->attach($request->get('foods'));
        session()->flash('success', ' Pesananmu Berhasil Di Kirim !');
        return redirect()->route('orderanMember');
    }
}
