<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplyJobs extends Model
{
    use HasFactory;
    protected $table = 'apply_jobs';

    protected $fillable = [
        'applyer_id',
        'applyer_name',
        'applyer_email',
        'applyer_password',
        'applyer_phone',
        'applyer_bio',
        'applyer_address',
        'applyer_picture',
        'applyer_level',
        'applyer_status',
    ];

    protected $hidden = [
        'applyer_password',
    ];
}
