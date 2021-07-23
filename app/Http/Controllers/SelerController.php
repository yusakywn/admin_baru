<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SelerController extends Controller
{
   public function seler(){
       $seler = DB::table('seler')->get();

       return view('seler',['seler'=>$seler]);
   }
}
