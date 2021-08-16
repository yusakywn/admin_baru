<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class refunds extends Model
{
  Protected $table = "refunds";
  public $primaryKey = 'id';
  public $fillable = [
      'status'
  ];
  public function kontrak(){
    return $this->belongsTo(Order::class, "contract_id");
  }
}
