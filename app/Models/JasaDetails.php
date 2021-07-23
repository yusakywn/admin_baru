<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JasaDetails extends Model
{
    use HasFactory;
    protected $table = 'jasa_orders_details';

    public function users_orders_details() {
        return $this->belongsTo(Jasa::class);
    }
}
