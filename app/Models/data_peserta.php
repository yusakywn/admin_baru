<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class data_peserta extends Model
{
  Protected $table = "photo_competitions";
  public $primaryKey = 'id';
  
  public function data_peserta(){
    return $this->belongsTo(User::class, "user_id");
  }
  public function files(){
    return $this->belongsTo(files::class, "file_id");
  }
}
