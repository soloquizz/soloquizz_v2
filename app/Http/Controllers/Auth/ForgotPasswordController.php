<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\ForgotPassword;
use App\Models\Administration\User;
use GuzzleHttp\Psr7\Request;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

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
    public function index(){
        return view('tempalte.auth.email');
    }

    public function verifyEmail(Request $request){
        $request->validate([
            'email' => 'required|string|email|max:255|exists:users',
        ],
          [
            'email.exists'=>'l\'email existe déjà'
          ]);

        $token=Str::random(8);
        $user=User::where('email','=',$request->email)->first();
        if(empty($user)){
            return Alert::error('l\'email n\'existe pas');
        }
        $forgotPassWord=PasswordReset::create([
            'email'=>$user['email'],
            'token'=>$token
        ]);

        $compteData['prenom'] = $user['prenom'];
        $compteData['nom'] = $user['nom'];
        $compteData['token']=$forgotPassWord->token;

        //Envoie des crédentials par mail
        Mail::to($user)->send(new ForgotPassword($compteData));

        Alert::success('Succés','Un message vous a été envoyé par mail. Veuillez consulter votre boite mail pour poursuivre le processus');

        return redirect(route('auth.forgot.password.email'));
    }

    public function resetPassword($token){
        return view('tempalte.auth.new-password',compact('token'));

    }

    public function resetPasswordPost(Request $request){
        $request->validate([
            'email' => 'required|string|email|max:255|exists:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],

        ],
          [
            'email.exists'=>'l\'email existe déjà'
          ]);
          $updatePassword=PasswordReset::where([
            'email'=>$request->email,
            'token'=>$request->token
          ])->first();

          if(!$updatePassword){
            return redirect()->to(route("auth.reset.password"))->with("error","invalid");
          }
          User::where(["email",$request->email])->update(['password' => Hash::make($request->password)]);
          PasswordReset::where('email',  $request->email)->change('statut', 1);
          return redirect()->to(route("auth.login"))->with("Succés","Mot de passe réinitialisé avec succés");
        }

}
