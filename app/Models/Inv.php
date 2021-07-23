<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inv extends Model
{
    use HasFactory;
    protected $table = 'inv_orders';
    protected $primaryKey = 'inv_order_id';

    public function inv_orders_details() {
        return $this->hasOne(InvDetails::class, 'inv_order_id');
    }

    public function users_inv_orders() {
        return $this->belongsTo(Buyer::class, 'inv_buyer_id');
    }
}
