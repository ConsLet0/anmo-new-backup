<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Banner2;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function index()
    {
        $dataBanner2 = Banner2::first();
        $dataBanner = Banner::first();
        return view('backend.banner.index', compact('dataBanner','dataBanner2'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'      => ['required', 'string', 'max:255'],
            'foto'      => ['required', 'max:2048'],
        ], [
            'name.required'     => 'Field Nama Banner Wajib Di Isi !',
            'foto.required'     => 'Field Foto Banner Wajib Di Upload !',
        ]);

        $filePathBanner     = 'storage/banner/';
        $fileBanner         = $request->file('foto');
        $filenameBanner     = $fileBanner->getClientOriginalName();
        $request->file('foto')->move($filePathBanner, $filenameBanner);

        $dataBanner         = new Banner;
        $dataBanner->name   = $request->get('name');
        $dataBanner->foto   = $filenameBanner;
        $dataBanner->save();

        Alert::success('Success', 'Data Banner Berhasil Di Tambahkan');
        return redirect()->back();
    }

    public function edit($id)
    {
        $dataBanner     = Banner::findOrFail($id);
        return view('backend.banner.edit',compact('dataBanner'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'      => ['required', 'string', 'max:255'],
            'foto'      => ['max:2048'],
        ], [
            'name.required'     => 'Field Nama Banner Wajib Di Isi !',
        ]);

        $dataBanner     = Banner::findOrFail($id);

        if ($request->hasFile('foto'))
        {
            $fileOldBanner  = 'banner/'.$dataBanner->foto;
            //file exists;
            if ($dataBanner->foto != null && Storage::disk('public')->exists($fileOldBanner))
            {
                Storage::disk('public')->delete($fileOldBanner);
            }

            //save new foto;
            $filePathBanner     = 'storage/banner/';
            $fileBanner         = $request->file('foto');
            $filenameBanner     = $fileBanner->getClientOriginalName();
            $request->file('foto')->move($filePathBanner, $filenameBanner);
            $saveBanner         = $filenameBanner;
        }
        else
        {
            $saveBanner = $request->get('tmpBanner');
        }

        //save to db banner;
        $dataBanner->name   = $request->get('name');
        $dataBanner->foto   = $saveBanner;
        $dataBanner->update();

        Alert::success('Success', 'Banner Promo Berhasil Di Perbaharui');
        return redirect()->route('banner');
    }

    public function destroy($id)
    {
        $dataBanner     = Banner::findOrFail($id);
        //delete img;
        $fileOldBanner  = 'banner/'.$dataBanner->foto;
        if ($dataBanner->foto != null && Storage::disk('public')->exists($fileOldBanner))
        {
            Storage::disk('public')->delete($fileOldBanner);
        }
        $dataBanner->delete();

        Alert::success('success', 'Banner Promo Berhasil Di Hapus !');
        return redirect()->back();
    }
}
