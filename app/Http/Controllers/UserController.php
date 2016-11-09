<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function __construct()
    {
        
    }

    public function sendMail($email){
       // $user = Auth::guard('user')->user()->toArray();
$user = '';
        Mail::send('emails.registration', ['user' => $user], function ($m) use ($user, $email) {
            $m->from('lookrestaurants@gmail.com', 'Look Restaurants Application');

            $m->to($email)->subject('Registration success');
        });
    }
}
