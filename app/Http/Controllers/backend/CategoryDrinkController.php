<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryDrinkController extends Controller
{
    public function index()
    {
        return view('backend.category-drink.index');
    }

    public function fetch_kategori_minuman(Request $request)
    {
        $categoryDrink = \App\Models\CategoryDrink::orderBy('id', 'DESC')
            ->get();

        if ($request->ajax()) {
            return datatables()->of($categoryDrink)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return  '
                                <div class="btn-group">
                                    <button id="btnEditKategoriMinuman" class="btn-sm btn btn-warning" data-id="' . $row['id'] . '">
                                        <i class="far fa-edit"></i>
                                    </button>
                                    <button id="btnDeleteKategoriMinuman" class="btn-sm btn btn-danger" data-id="' . $row['id'] . '">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                </div>
                            ';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'      =>  'required',
        ], [
            'name.required' => 'Field Nama Kategori Wajib Di Isi !',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'    =>  400,
                'error'     =>  $validator->errors()->toArray(),
            ]);
        } else {

            $category = new \App\Models\CategoryDrink;
            $category->name     = $request->get('name');
            $category->slug     = \Str::slug($request->get('name'), '-');
            $category->save();

            return response()->json([
                'status'    => 200,
                'message'   => 'Data Kategori Berhasil Di Simpan !',
            ]);
        }
    }

    public function edit(Request $request)
    {
        $category = \App\Models\CategoryDrink::find($request->get('category_id'));
        return response()->json([
            'status'    => 200,
            'category'  => $category,
        ]);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'      =>  'required',
        ], [
            'name.required' => 'Field Nama Kategori Wajib Di Isi !',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'    => 400,
                'error'     =>  $validator->errors()->toArray(),
            ]);
        } else {
            $category       = \App\Models\CategoryDrink::find($request->get('category_id'));
            $category->name = $request->get('name');
            $category->slug = \Str::slug($request->get('name'), '-');
            $category->update();

            return response()->json([
                'status'    => 200,
                'message'   => 'Data Kategori Berhasil Di Perbaharui',
            ]);
        }
    }

    public function destroy(Request $request)
    {
        $category = \App\Models\CategoryDrink::find($request->get('category_id'));
        $category->delete();

        return response()->json([
            'status'    => 200,
            'message'   => 'Kategori Berhasil Di Hapus',
        ]);
    }
}
