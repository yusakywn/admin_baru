<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penarikan extends Model
{
  Protected $table = "withdraws";
  public $primaryKey = 'id';
  public $fillable = [
      'status',
  ];

  public function bank(){
    return $this->belongsTo(bank::class, "bank_id");
  }

  public function pengguna(){
    return $this->belongsTo(User::class, "user_id");
  }
}
