<?php

namespace App\Http\Controllers;

use App\Models\Inv;
use Illuminate\Http\Request;

class InvOrdersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function inv_orders() {
        $inv_orders = Inv::with(['inv_orders_details', 'users_inv_orders'])->take(4)->get();
        return view('/home', ['inv_orders' => $inv_orders]);
    }
}
