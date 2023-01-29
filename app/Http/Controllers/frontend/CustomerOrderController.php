<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Banner2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomerOrderController extends Controller
{
    public function meja1($no_meja)
    {
        $tables = \App\Models\Table::groupBy('no_meja')
            ->orderBy('id', 'DESC')
            ->where('no_meja', $no_meja)
            ->first();
        $detailTables = \App\Models\Table::orderBy('id', 'DESC')
            ->where('no_meja', $no_meja)
            ->get();
        $foods        = \App\Models\Food::orderBy('id', 'DESC')
            ->get();
        $categories    = \App\Models\Category::all();
        $dataBanner    = Banner::first();
        $dataBanner2   = Banner2::first();

        return view('frontend.order.meja1', compact('tables', 'detailTables', 'foods', 'categories', 'dataBanner', 'dataBanner2'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'  => 'required|string',
        ], [
            'name.required' => 'Field Nama Pemesan Wajib Di Isi !',
            'name.string'   => 'Field Nama Pemsan Harus Berformat Huruf !',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'    => 400,
                'error'     => $validator->errors()->toArray(),
            ]);
        } else {
            try {
                $foods          = $request->get('foods');
                $tables         = $request->get('tables');
                $no_meja        = $request->get('no_meja');
                $qty            = $request->get('qty');
                $namaPemesan    = $request->get('name');
                $status         = $request->get('status');
                $id_orders      = \App\Models\Order::insertGetId([
                    'name'      => $namaPemesan,
                    'status'    => $status,
                    'no_meja'   => $no_meja,
                    'created_at'=> date('Y-m-d H:i:s'),
                    'updated_at'=> date('Y-m-d H:i:s'),
                ]);

                foreach ($qty as $key => $qt) {
                    if ($qt == 0) {
                        continue;
                    }

                    $detailFoods = \App\Models\Food::where('id', $foods[$key])->first();
                    $harga_beli  = $detailFoods->harga_beli;
                    $subtotal    = $qt * $harga_beli;
                    // $stock_now   = $detailFoods->minimal_stock;
                    // $stock_new   = $stock_now - $qt;

                    // \App\Models\Food::where('id', $foods[$key])->update([
                    //     'minimal_stock' => $stock_new
                    // ]);

                    \App\Models\OrderLine::insert([
                        'orders'        => $id_orders,
                        'foods'         => $foods[$key],
                        'tables'        => $tables[$key],
                        'qty'           => $qt,
                        'harga_beli'    => $harga_beli,
                        'subtotal'      => $subtotal,
                        // 'status'        => $status,
                        'created_at'    => date('Y-m-d H:i:s'),
                        'updated_at'    => date('Y-m-d H:i:s')
                    ]);
                }

            } catch (\Exception $e) {
                $e->getMessage();
            }

            return response()->json([
                'status'    => 200,
                'message'   => 'Data Orderan Anda Berhasil Di Kirim',
            ]);


            // return redirect()->back();
        }
    }

    public function status_orderan($no_meja)
    {
        $tables = \App\Models\Table::groupBy('no_meja')
            ->orderBy('id', 'DESC')
            ->where('no_meja', $no_meja)
            ->first();
        $detailTables = \App\Models\Table::orderBy('id', 'DESC')
            ->where('no_meja', $no_meja)
            ->get();
        $orders        = \App\Models\Order::orderBy('id', 'DESC')
            // ->groupBy('status')
            ->get();
        return view('frontend.order.status-orderan', compact('tables', 'detailTables', 'orders'));
    }

    public function fetch_orderan(Request $request)
    {
        if ($request->ajax()) {
            if (!empty($request->get('filter_by_status_orderan'))) {
                $order = \App\Models\Order::orderBy('id', 'DESC')
                    ->where('status', $request->get('filter_by_status_orderan'))
                    ->with('foods')
                    ->with('tables')
                    ->get();
            } else {
                $order = \App\Models\Order::orderBy('id', 'DESC')
                    ->with('foods')
                    ->with('tables')
                    ->get();
            }
            return datatables()->of($order)
                ->addIndexColumn()
                ->addColumn('nama_pengorder', function ($row) {
                    return  '
                                ' . $row->name . '
                            ';
                })
                ->addColumn('no_meja', function ($row) {
                    return  '
                                <span class="badge badge-warning">
                                    ' . $row->tables[0]->no_meja . '
                                </span>
                            ';
                })
                ->addColumn('status', function ($row) {
                    return  '
                                <span class="badge badge-info">
                                    Sedang Di Proses
                                </span>
                            ';
                })
                ->addColumn('action', function ($row) {
                    return  '
                            <div class="btn-group">
                                <a  href="http://localhost/anglo_cafe/public/detail-orderan-pelanggan/' . $row['name'] . '" class="btn-sm btn btn-success">
                                    <i class="far fa-eye"></i>
                                    Struk Pesanan
                                </a>
                            </div>
                            ';
                })
                ->rawColumns(['nama_pengorder', 'no_meja', 'status', 'action'])
                ->make(true);
        }
    }

    public function detail($no_meja, $created_at)
    {
        $tables = \App\Models\Table::groupBy('no_meja')
            ->orderBy('id', 'DESC')
            ->where('no_meja', $no_meja)
            ->first();
        $orders = \App\Models\Order::groupBy('created_at')
            ->orderBy('id', 'DESC')
            ->where('created_at', $created_at)
            ->first();

        $filename = 'struk_belanja_angloResto.pdf';
        $mpdf     = new \Mpdf\Mpdf([
            'mode'          =>      'utf-8',
            'format'        =>      [58, 150],
            'orientation'   =>      'P',
            'margin_left'   => 3,
            'margin_right'   => 3,
            'margin_top'   => 3,
            'margin_bottom'   => 4,
            // 'margin_header'   => 15,
            // 'margin_footer'   => 15,
        ]);
        $html     = view('frontend.order.detail')
            ->with(['orders' => $orders, 'tables' => $tables]);
        $html     = $html->render();

        $mpdf->WriteHTML($html);
        $mpdf->Output($filename, 'I');
    }

}
