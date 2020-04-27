<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Kelas;
use \Auth;

class AuthController extends Controller
{
    //
    public function login()
    {
        return view('auth.login');
    }
    public function register()
    {
        $kelass = Kelas::all();
        return view('auth.register', compact('kelass'));
    }

    public function postRegister(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users,email|', 
            'password' => 'required|confirmed',
            'kelas_id' => 'required',
            'password_confirmation' => 'required'
        ]);
        User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'kelas_id' => $request->kelas_id,
        ]);
        return redirect('/login')->with('status', 'Anda Berhasil Registrasi, Silahkan Login');

    }

    public function postLogin(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect('/forum');
        }
        return redirect('/login')->with('status', 'Gagal Login');
    }


    public function logout()
    {
        Auth::logout();
        return redirect('/login')->with('logout', 'Anda Telah Logout');
    }
}
