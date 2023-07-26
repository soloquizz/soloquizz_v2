<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Administration\User;
use GuzzleHttp\Psr7\Request;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use RealRashid\SweetAlert\Facades\Alert;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    //use SendsPasswordResetEmails;
    public function verifyEmail(Request $request){
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);
         $user=User::where('email','=',$request->email)->first();
        if(empty($user)){
            return Alert::error('l\'email n\'existe pas');
        }
    }

}
