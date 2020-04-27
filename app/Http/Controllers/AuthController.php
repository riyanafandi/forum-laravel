<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
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
        return view('auth.register');
    }

    public function postRegister(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]);

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
