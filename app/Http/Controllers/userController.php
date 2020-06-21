<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Response;
use DateTime;
use App\ManageSlider;
use App\ManageProduk;
use App\ManagePesanan;

class userController extends Controller
{
    public function getRoleAdmin() {
      $rolesyangberhak = DB::table('roles')->where('id','=','2')->first()->namaRule;
      return $rolesyangberhak;
    }

    public function __construct()
    {
      $this->middleware('auth');
      $this->middleware('rule:'.$this->getRoleAdmin().',nothingelse');
    }

    public function formPesan($id){
      $manages = ManageProduk::find($id);
      return view('pesan')->with(compact('manages'));
    }

    public function storePesanan(Request $request){
      $a = new DateTime($request->date1);
      $b = new DateTime($request->date2);
      $durasi = $b->diff($a)->format("%a");
      $c = $request->id;
      $d = DB::table('produk')->where('id','=',$c)->get();
      $nama = $d[0]->namaMobil;
      $harga = $d[0]->harga;
      $j = $request->jenis_rent;
      if($j==0){
        $tot = $harga*$durasi;
      }else{
        $tot = ($harga*$durasi)+100000;
      }

      $manages = new ManagePesanan;
      $manages->produk_id = $request->id;
      $manages->user_id   = Auth::id();
      $manages->nama      = $nama;
      $manages->date1     = $request->date1;
      $manages->date2     = $request->date2;
      $manages->durasi    = $durasi;
      $manages->jenis     = $request->jenis_rent;
      $manages->tujuan    = $request->tujuan;
      $manages->harga     = $tot;
      $manages->terbilang = $this->terbilang($tot);

      $manages->save();

      return redirect('pesanan')->with('alert-success','Berhasil Melakukan Pesanan');
    }

    public function pesanan(){
      $manages = ManagePesanan::where('user_id','=', Auth::id())->get();
      return view('pesanan')->with(compact('manages'));
    }

    public function upload($id){
      $manages = ManagePesanan::find($id);
      return view('upload')->with(compact('manages'));
    }

    public function uploadBukti(Request $request,$id){
      if($request -> tes == null){
          $lokasifileskr = null;
        }else{
          $namafile = $request->file('tes')->getClientOriginalName();
          $ext = $request->file('tes')->getClientOriginalExtension();
          $lokasifileskr = '/photosBukti/'.$namafile;
        //cek file sudah ada
        if ($ext == "png" ||
            $ext == "jpg")
        {
          $destinasi = public_path('/photosBukti');
          $proses = $request->file('tes')->move($destinasi,$namafile);
        }else{
          return Redirect::back()->withErrors(['file tidak sesuai, tidak bisa diupload']);
        }
      }

      $manages = ManagePesanan::find($id);
      $manages->status = 1;
      $manages->bukti  = $lokasifileskr;

      $manages->save();
      return redirect('pesanan')->with('alert-success','Bukti Berhasil di Upload!!');
    }

    function terbilang($bilangan) {
      $angka = array('0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0');
      $kata = array('','Satu','Dua','Tiga','Empat','Lima','Enam','Tujuh','Delapan','Sembilan');
      $tingkat = array('','Ribu','Juta','Milyar','Triliun');

      $panjang_bilangan = strlen($bilangan);
      /* pengujian panjang bilangan */
      if ($panjang_bilangan > 15) {
        $kalimat = "Diluar Batas";
        return $kalimat;
      }
      /* mengambil angka-angka yang ada dalam bilangan,
         dimasukkan ke dalam array */
      for ($i = 1; $i <= $panjang_bilangan; $i++) {
        $angka[$i] = substr($bilangan,-($i),1);
      }
      $i = 1;
      $j = 0;
      $kalimat = "";
      /* mulai proses iterasi terhadap array angka */
      while ($i <= $panjang_bilangan) {
        $subkalimat = "";
        $kata1 = "";
        $kata2 = "";
        $kata3 = "";
        /* untuk ratusan */
        if ($angka[$i+2] != "0") {
          if ($angka[$i+2] == "1") {
            $kata1 = "Seratus";
          } else {
            $kata1 = $kata[$angka[$i+2]] . " Ratus";
          }
        }
        /* untuk puluhan atau belasan */
        if ($angka[$i+1] != "0") {
          if ($angka[$i+1] == "1") {
            if ($angka[$i] == "0") {
              $kata2 = "Sepuluh";
            } elseif ($angka[$i] == "1") {
              $kata2 = "Sebelas";
            } else {
              $kata2 = $kata[$angka[$i]] . " Belas";
            }
          } else {
            $kata2 = $kata[$angka[$i+1]] . " Puluh";
          }
        }
        /* untuk satuan */
        if ($angka[$i] != "0") {
          if ($angka[$i+1] != "1") {
            $kata3 = $kata[$angka[$i]];
          }
        }
        /* pengujian angka apakah tidak nol semua,
           lalu ditambahkan tingkat */
        if (($angka[$i] != "0") OR ($angka[$i+1] != "0") OR
            ($angka[$i+2] != "0")) {
          $subkalimat = "$kata1 $kata2 $kata3 " . $tingkat[$j] . " ";
        }
        /* gabungkan variabe sub kalimat (untuk satu blok 3 angka)
           ke variabel kalimat */
        $kalimat = $subkalimat . $kalimat;
        $i = $i + 3;
        $j = $j + 1;
      }
      /* mengganti satu ribu jadi seribu jika diperlukan */
      if (($angka[5] == "0") AND ($angka[6] == "0")) {
        $kalimat = str_replace("Satu Ribu","Seribu",$kalimat);
      }
      return trim($kalimat);
    }

    public function viewKwitansi($id){
      $manages = DB::table('pesanan')
                ->join('users','pesanan.user_id','=','users.id')
                ->where('pesanan.id','=',$id)
                ->select('pesanan.*','users.*')
                ->get();
      return view('kwitansipdf')->with(compact('manages','a'));
    }

}
