<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Auth;
use Response;
use App\ManageSlider;
use App\ManageProduk;
use App\ManagePesanan;
use App\User;

class adminController extends Controller
{
    public function getRoleAdmin() {
      $rolesyangberhak = DB::table('roles')->where('id','=','1')->first()->namaRule;
      return $rolesyangberhak;
    }

    public function __construct()
    {
      $this->middleware('auth');
      $this->middleware('rule:'.$this->getRoleAdmin().',nothingelse');
    }

    public function slider(){
      $manages = ManageSlider::all();
      return view('admin.indexAdmin')->with(compact('manages'));
    }

    public function createSlider(){
      return view('admin.createSlider');
    }

    public function storeSlider(Request $request){
      if ($request->hasFile('tes')) {
         $namafile = $request->file('tes')->getClientOriginalName();
         $ext = $request->file('tes')->getClientOriginalExtension();
         $lokasifileskr = '/photosSlider/'.$namafile;
         //cek jika file sudah ada...
         if ($ext == "png" ||
             $ext == "jpg")
         {
           $destinasi = public_path('/photosSlider');
           $proses = $request->file('tes')->move($destinasi,$namafile);


          $manages = new ManageSlider;
          $manages->slider_name = $request->slider_name;
          $manages->slider_text = $request->slider_text;
          $manages->slider_image = $lokasifileskr;
          $manages->save();

      return redirect('admin')->with('alert-success','data berhasil ditambahkan!!');
    } else {
             return Redirect::back()->withErrors(['file tidak sesuai, tidak bisa diupload']);
           }
         }
    }

    public function editSlider($id){
      $manages = ManageSlider::find($id);
      return view('admin.editSlider')->with(compact('manages'));
    }

    public function updateSlider(Request $request, $id)
    {
      $manages = ManageSlider::find($id);
      $manages->slider_name = $request->slider_name;
      $manages->slider_text = $request->slider_text;

      $manages->save();
      return redirect('admin')->with('alert-success','data berhasil diubah!!');
    }

    public function deleteslider($id){
      $manages = ManageSlider::find($id);
      $manages->delete();
      return redirect('admin')->with('alert-success','data berhasil dihapus!!');
    }

    public function produk(){
      $manages = ManageProduk::all();
      return view('admin.produk')->with(compact('manages'));
    }

    public function createProduk(){
      return view('admin.createProduk');
    }

    public function storeProduk(Request $request){
      if($request -> tes == null){
          $lokasifileskr = null;
        }else{
          $namafile = $request->file('tes')->getClientOriginalName();
          $ext = $request->file('tes')->getClientOriginalExtension();
          $lokasifileskr = '/photosProduk/'.$namafile;
        //cek file sudah ada
        if ($ext == "png" ||
            $ext == "jpg")
        {
          $destinasi = public_path('/photosProduk');
          $proses = $request->file('tes')->move($destinasi,$namafile);
        }else{
          return Redirect::back()->withErrors(['file tidak sesuai, tidak bisa diupload']);
        }
      }

          $manages = new ManageProduk;
          $manages->namaMobil     = $request->product_name;
          $manages->produk_images = $lokasifileskr;
          $manages->kapasitas     = $request->product_kapasitas;
          $manages->bb            = $request->product_bb;
          $manages->harga         = $request->harga_barang;

          $manages->save();
          return redirect('produk')->with('alert-success','data berhasil ditambah!!');
    }

    public function editProduk($id){
      $manages = ManageProduk::find($id);
      return view('admin.editProduk')->with(compact('manages'));
    }

    public function updateProduk(Request $request, $id){
      $manages = ManageProduk::find($id);
      $manages->namaMobil     = $request->product_name;
      $manages->kapasitas     = $request->product_kapasitas;
      $manages->bb            = $request->product_bb;
      $manages->harga         = $request->harga_barang;

      $manages->save();
      return redirect('produk')->with('alert-success','data berhasil diubah!!');
    }

    public function deleteProduk($id){
      $manages = ManageProduk::find($id);
      $manages->delete();
      return redirect('produk')->with('alert-success','data berhasil dihapus!!');
    }

    public function pesananAdmin(){
      $manages =  DB::table('pesanan')
                    ->join('users', 'users.id', '=', 'pesanan.user_id')
                    ->select('users.*', 'pesanan.*')
                    ->where('status','=',1)
                    ->get();
      return view('admin.pesananAdmin')->with(compact('manages'));
    }

    public function viewPesanan($id){
      $manages =  DB::table('pesanan')
                    ->join('users', 'users.id', '=', 'pesanan.user_id')
                    ->select('users.*', 'pesanan.*')
                    ->where('pesanan.id',$id)
                    ->get();

      return view('admin.viewPesanan')->with(compact('manages'));
    }

    public function approvePesanan($id){
      $manages =  ManagePesanan::find($id);
      $manages->status = 2;

      $manages->save();
      return redirect('pesananAdmin')->with('alert-success','data berhasil di approve!!');
    }

    public function pesananKonfrmAdmin(){
      $manages =  DB::table('pesanan')
                    ->join('users', 'users.id', '=', 'pesanan.user_id')
                    ->select('users.*', 'pesanan.*')
                    ->where('status','=',2)
                    ->get();
      return view('admin.konfirmasiAdmin')->with(compact('manages'));
    }
}
