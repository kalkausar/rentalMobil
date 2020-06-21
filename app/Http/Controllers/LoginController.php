<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Admin;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\support\Facades\Redirect;

class LoginController extends Controller
{
    public function index()
    {
      return view('auth.login');
    }

    public function postLogin(Request $request){
      if(Auth::attempt ([
        'email' => $request->email,
        'password' => $request->password
      ]))
      {
        return redirect('dashboard')->with('alert','Anda Berhasil Login!');
      }
      else{
        return redirect('loginPage')->with('alert','Password atau Email, Salah !');
      }

    }

    public function logout(Request $request){
        Auth::logout();
        return redirect('/')->with('alert','Kamu sudah logout');
    }
}
