<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class DrinkController extends Controller
{
    public function index()
    {
        $categories = \App\Models\Category::all();
        $categoryDrink = \App\Models\CategoryDrink::all();
        return view('backend.drink.index', compact('categories', 'categoryDrink'));
    }

    public function fetch_minuman(Request $request)
    {
        $drink = \App\Models\Drink::orderBy('id', 'DESC')
            ->get();

        if ($request->ajax()) {
            return datatables()->of($drink)
                ->addIndexColumn()
                ->addColumn('photo', function ($row) {
                    return  '
                                <img src="storage/minuman/' . $row->photo . '" width="80px" />
                            ';
                })
                ->addColumn('price', function ($row) {
                    return  '
                                ' . formatRupiah($row->price) . '
                            ';
                })
                ->addColumn('action', function ($row) {
                    return  '
                            <div class="btn-group">
                                <button id="btnEditMinuman" class="btn-sm btn btn-warning" data-id="' . $row['id'] . '">
                                    <i class="far fa-edit"></i>
                                </button>
                                <button id="btnDeleteMinuman" class="btn-sm btn btn-danger" data-id="' . $row['id'] . '">
                                    <i class="far fa-trash-alt"></i>
                                </button>
                            </div>
                        ';
                })
                ->rawColumns(['photo', 'price', 'action'])
                ->make(true);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'          =>  'required',
            'description'   =>  'required|max:255',
            'photo'         =>  'required|max:2048',
            'price'         =>  'required',
            'stock'         =>  'required',
            'status'        =>  'required',
        ], [
            'name.required'         =>  'Field Nama Minuman Wajib Di Isi !',
            'description.required'  => 'Field Deskripsi Minuman Wajib Di Isi !',
            'description.max'       => 'Field Deskripsi Minuman Panjang Karakter Maksimal 255 Karakter !',
            'photo.required'        => 'Field Foto Minuman Wajib Di Upload !',
            'photo.max'             => 'Field Foto Minuman Maksimal Ukuran Gambar 2 Mb !',
            'price.required'        => 'Field Harga Minuman Wajib Di Isi !',
            'stock.required'        => 'Field Stock Minuman Wajib Di Isi !',
            'status.required'       => 'Field Status Minuman Wajib Di Pilih !',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'    =>  400,
                'error'     =>  $validator->errors()->toArray(),
            ]);
        } else {
            $file_path_minuman = 'storage/minuman/';
            $file_minuman      = $request->file('photo');
            $filename_minuman  = $file_minuman->getClientOriginalName();
            $request->file('photo')->move($file_path_minuman, $filename_minuman);

            $drink               = new \App\Models\Drink;
            $drink->name         = $request->get('name');
            $drink->description  = $request->get('description');
            $drink->photo        = $filename_minuman;
            $drink->price        = $request->get('price');
            $drink->stock        = $request->get('stock');
            $drink->slug         = \Str::slug($request->get('name'), '-');
            $drink->status       = $request->get('status');
            $drink->category_drink_id  = $request->get('category_drink_id');
            $drink->save();

            return response()->json([
                'status'    => 200,
                'message'   => 'Data Minuman Berhasil Di Tambahkan',
            ]);
        }
    }

    public function edit(Request $request)
    {
        $drink = \App\Models\Drink::find($request->get('drink_id'));
        return response()->json([
            'status'    => 200,
            'drink'      => $drink,
        ]);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'          =>  'required',
            'description'   =>  'required|max:255',
            'price'         =>  'required',
            'stock'         =>  'required',
            'status'        =>  'required',
        ], [
            'name.required'         =>  'Field Nama Minuman Wajib Di Isi !',
            'description.required'  => 'Field Deskripsi Minuman Wajib Di Isi !',
            'description.max'       => 'Field Deskripsi Minuman Panjang Karakter Maksimal 255 Karakter !',
            'price.required'        => 'Field Harga Minuman Wajib Di Isi !',
            'stock.required'        => 'Field Stock Minuman Wajib Di Isi !',
            'status.required'       => 'Field Status Minuman Wajib Di Pilih !',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'    => 400,
                'error'     => $validator->errors()->toArray(),
            ]);
        } else {
            $drink = \App\Models\Drink::find($request->get('drink_id'));

            if ($request->hasFile('photo_edit')) {
                $file_old_photo = 'minuman/' . $drink->photo;
                //file exists
                if ($drink->photo != null && Storage::disk('public')->exists($file_old_photo)) {
                    Storage::disk('public')->delete($file_old_photo);
                }
                // save new phdrink
                $file_path_photo = 'storage/minuman/';
                $file_photo      = $request->file('photo_edit');
                $filename_photo  = $file_photo->getClientOriginalName();
                $request->file('photo_edit')->move($file_path_photo, $filename_photo);
                $save_photo      = $filename_photo;
            } else {
                $save_photo = $request->get('tmp_photo');
            }

            //save to db drink;
            $drink->name         =   $request->get('name');
            $drink->description  =   $request->get('description');
            $drink->photo        =   $save_photo;
            $drink->price        =   $request->get('price');
            $drink->stock        =   $request->get('stock');
            $drink->slug         =   \Str::slug($request->get('name'), '-');
            $drink->status       =   $request->get('status');
            $drink->category_drink_id  = $request->get('category_drink_id');
            $drink->update();

            return response()->json([
                'status'    => 200,
                'message'   => 'Data Minuman Berhasil Di Perbaharui',
            ]);
        }
    }

    public function destroy(Request $request)
    {
        $drink           = \App\Models\Drink::find($request->get('drink_id'));
        //delete img
        $file_old_photo = 'minuman/' . $drink->photo;
        if ($drink->photo != null && Storage::disk('public')->exists($file_old_photo)) {
            Storage::disk('public')->delete($file_old_photo);
        }
        $drink->delete();

        return response()->json([
            'status'    => 200,
            'message'   => 'Data Minuman Berhasil Di Hapus',
        ]);
    }

    public function ajaxSearch(Request $request)
    {
        $keyword    =   $request->get('q');
        $drink       =   \App\Models\Drink::where("name", "LIKE", "%$keyword%")
            ->get();

        return $drink;
    }
}
