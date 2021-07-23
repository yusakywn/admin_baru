<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;

use Illuminate\Http\Request;

class OrderController extends Controller
{
  public  function index ()
  {
    //deklarasi mengambil data dari table
    $order=Order::with("seller","pengguna")->get();
    //mengirim data
    return view ('home',['order' => $order, 'users' => User::count()]);;
    // return response()->json($order);
  }
}
