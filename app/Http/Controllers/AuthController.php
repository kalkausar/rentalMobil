<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use Auth;
use DB;
use Response;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function getRoot() {
      if (Auth::User()->roles_id == 1) {
        return redirect('admin');
      } elseif (Auth::User()->roles_id == 2) {
        return redirect('/');
      }else {
        return 'hai pengguna! saat ini belom ada view nya karena yg buat males nambahin :V buat logout ketik /logout di akhiran lalu enter';
      }
    }
}
