<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inv;
use App\Models\Jasa;
use App\Models\JasaDetails;
use App\Models\Buyer;

class JasaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function jasa_orders() {
        $jasa_orders = Jasa::first()->with(['users_orders_details', 'users_orders'])->take(4)->get();
        $inv_orders = Inv::with(['inv_orders_details', 'users_inv_orders'])->take(4)->get();
        $users = Buyer::all()->count();
        $subs = Buyer::all()->where('subscription', 'Yes')->count();
        $jasa_count = Jasa::all()->count();
        $inv_count = Inv::all()->count();
        $revenue = JasaDetails::all()->where('jasa_payment_status', 'success')->sum('jasa_order_total');
        $orders_total = $jasa_count + $inv_count;
        return view('/home', ['jasa_orders' => $jasa_orders, 'inv_orders' => $inv_orders,
         'users' => $users, 'subs' => $subs, 'jasa_count' => $orders_total, 'revenue' => $revenue]);
        //return response()->json(['data' => $jasa_orders]);
    }
    public function modals($id) {
        $jasa_orders = Jasa::with(['users_orders_details', 'users_orders'])->find([$id]);
        return view('modal.modal-jasa', ['jasa_orders' => $jasa_orders]);
    }
    public function modals_inv($id) {
        $inv_orders = Inv::with(['inv_orders_details', 'users_inv_orders'])->find([$id]);
        return view('modal.modal-inv', ['inv_orders' => $inv_orders]);
    }
    public function index()
    {
      // code...
      return view("jasa");
    }
}
