<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    use HasFactory;

    protected $table = 'admins';
    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'phone',
        'address',
        'bio',
        'picture',
        'level',
    ];
    protected $hidden = [
        'password',
    ];
}
