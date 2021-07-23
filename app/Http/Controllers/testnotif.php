<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\brodcast;

class testnotif extends Controller
{
    public function sendTestNotification()
    {
      $user = User::first();
      $enrollmentData = [
        'subject' =>'asd',
        'pesan' =>'asd',
      ];

      $user->notify(new brodcast($enrollmentData));
    }
}
