<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jasa extends Model
{
    use HasFactory;
    protected $table = 'jasa_orders';
    protected $primaryKey = 'jasa_order_id';

    public function users_orders_details() {  
        return $this->hasOne(JasaDetails::class, 'jasa_order_id');
    }

    public function users_orders() {
        return $this->belongsTo(Buyer::class, 'jasa_buyer_id');
    }
}
