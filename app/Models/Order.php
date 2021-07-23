<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  Protected $table = "contracts";
  public $primaryKey = 'id';
  public $fillable = [
      'uuid',
      'customer_id',
      'seller_id',
      'harga',

  ];
  public function seller(){
    return $this->belongsTo(User::class, "seller_id");
  }

  public function pengguna(){
    return $this->belongsTo(User::class, "customer");
  }
}
