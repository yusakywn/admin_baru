<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buyer;

class SubsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function subscription() {
        $subs = Buyer::where('subscription', 'Yes')->get();
        return view('/langganan', ['subs' => $subs]);
    }
}
