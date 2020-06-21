<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\ManageSlider;
use App\ManageProduk;

class frontendController extends Controller
{
    public function home(){
      $slider = ManageSlider::all();
      $produk = ManageProduk::all();
      return view('home')->with(compact('slider','produk'));
    }
}
