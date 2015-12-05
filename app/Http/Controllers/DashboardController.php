<?php

  namespace App\Http\Controllers;

  use Illuminate\Http\Request;
  use App\Http\Controllers\Controller;
  use App\Pasien;
  use App\BPJS;
  use Input;
  use Session;
  use DB;
  use Illuminate\Database\Eloquent\ModelNotFoundException;

  class DashboardController extends Controller
  {
     public function home()
     {
        $id_pasien = Input::get('id_pasien');
        $id_bpjs = Input::get('id_bpjs');

        if(isset($id_pasien) and empty($id_bpjs)){
          $pasien = Pasien::where('id', '=', $id_pasien)->get();
          return view('dashboard.home')->with('pasien', $pasien);
        }else if(isset($id_bpjs) and isset($id_pasien)){
          $pasien = Pasien::where('id', '=', $id_pasien)->get();
          $bpjs = BPJS::where('id', '=', $id_bpjs)->get();
          
          $pasieninfo = DB::table('pasien')->where('id', $id_pasien)->value('nik');
          $bpjsinfo = DB::table('bpjs')->where('id', $id_bpjs)->value('nik');
          $bpjsstatus = DB::table('bpjs')->where('id',$id_bpjs)->value('status_premi');
          if($bpjsstatus == 0) {
            $info = "BPJS Tidak aktif";
          } else if($pasieninfo == $bpjsinfo) {
            $info = "Data sama";
          } else $info = "Data tidak sama";
          return view('dashboard.home')->with('pasien', $pasien)->with('bpjs', $bpjs)->with('info',$info);
        }else if(empty($id_bpjs) and empty($id_pasien)){
          //if form is still empty
          return view('dashboard.home');
        }
     }

     public function error() {
        return view('errors.roleerror');
     }

     public function __construct()
     {
       $this->middleware('auth');
     }
  }

?>