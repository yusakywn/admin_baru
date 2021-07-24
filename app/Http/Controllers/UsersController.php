<?php

namespace App\Http\Controllers;

use App\Models\Buyer;
use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\brodcast;
use App\Notifications\shoutout;

class UsersController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function users() {
        $users = Buyer::all();
        return view('/pengguna', ['users' => $users]);
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
        $users->notify(new shoutOut($enrollmentData));
        return redirect('/users');
    }
}
