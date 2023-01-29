<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthMemberController extends Controller
{
    public function index()
    {
        return view('auth.loginMember');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required',
            'email'     => 'required|email',
            'password'  => 'required',
            'alamat'    =>  'required',
            'no_hp'     =>  'required'
        ], [
            'name.required'     => 'Field Name Wajib Di Isi !',
            'email.required'    =>  'Field Email Wajib Di Isi !',
            'email.email'       =>  'Field Email Haru Berformat Email Contoh: udin@gmail.com !',
            'alamat.required'   =>  'Field Alamat Wajib Di Isi !',
            'no_hp.required'    =>  'Field No Hp Wajib Di Isi !',
            'password.required' =>  'Filed Password Wajib Di Isi !',
        ]);

        $dataUser           = new \App\Models\User;
        $dataUser->name     = $request->get('name');
        $dataUser->email    = $request->get('email');
        $dataUser->alamat   = $request->get('alamat');
        $dataUser->no_hp    = $request->get('no_hp');
        $dataUser->roles    = $request->get('roles');
        $dataUser->password = bcrypt($request->get('password'));
        $dataUser->save();
        session()->flash('success', 'Anda Berhasil Mendaftar Akun Silahkan Login Sekarang !');
        return redirect()->route('loginMember');
    }

    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
            if (Auth::user()->roles != 'Admin') {
                return redirect()->route('home');
            } else {
                return redirect()->route('dashboard');
            }
        } else {
            
        }
    }
}
