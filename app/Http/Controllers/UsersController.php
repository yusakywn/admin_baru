<?php

namespace App\Http\Controllers;

use App\Models\Buyer;
use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\brodcast;
use App\Notifications\shoutout;
use App\Notifications\refunds as refundss;
use App\Notifications\penarikan as penarikann;
use App\Models\refunds;
use App\Models\penarikan;
use App\Models\lomba;
use App\Models\data_peserta;

class UsersController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function users(Request $request) {
      $roleid = $request->get('user');
      $users = User::all();
      return view('pengguna', ['users' => $users]);
    }
    //notif
    public function sendbroadcast(Request $request)
    {
      if($request->list = 2){
        $list=2;
      }elseif ($request->list = 3) {
        $list=3;
      }elseif ($request->list = 4) {
        $list=1;
      }

      if ($request->list = 1) {
            $users = User::all();
      }else{
      $users = User::where('role_id',$list)->get();
    }
      $enrollmentData = [

        'subject' =>$request->sub,
        'pesan' =>$request->pesan,
      ];

      foreach ($users as $key => $ulang) {
        $ulang->notify(new brodcast($enrollmentData));
      }
      return redirect('/');

    }
    public function shoutOut(Request $coba){

      $users = User::where('email',$coba->email)->first();
      $enrollmentData = [

        'subyek' =>$coba->subyek,
        'pesan' =>$coba->pesan,
      ];
        $users->notify(new shoutout($enrollmentData));
        return redirect('/users');
    }
    public function freelancer(){
      $users = User::where('role_id','!=',1)->get();
      return view('freelancer', ['users' => $users]);
    }
    public function refunds(){
      $users = refunds::all();
      return view('/refunds', ['users' => $users]);
    }
    public function penarikan(){
      $users = penarikan::all();
      return view('/penarikan', ['users' => $users]);
    }

    public function refunds_verifikasi($id)
    {
      refunds::where('id',$id)->update([
        'status'=>1
      ]);
      $refunds=refunds::where('id',$id)->first();

      $refunds->kontrak['pengguna']->notify(new refundss($refunds));
      return back();
    }

    public function penarikan_verifikasi($id)
    {
    penarikan::where('id',$id)->update([
        'status'=>1
      ]);
      $penarikan=penarikan::where('id',$id)->first();

      $penarikan->pengguna->notify(new penarikann($penarikan));
      return back();
    }

    public function lomba(){
      $users = lomba::all();
      return view('/lomba', ['users' => $users]);
    }
    public function data_peserta($id){
      $lomba = lomba::where('uuid', $id)->first();
      $users = data_peserta::where('competition_id', $lomba->id)->get();
      return view('/data_peserta', ['users' => $users]);
    }

}
