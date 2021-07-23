<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvDetails extends Model
{
    use HasFactory;
    protected $table = 'inv_orders_details';
    
    public function inv_orders_details() {
        return $this->belongsTo(Inv::class);
    }

}
