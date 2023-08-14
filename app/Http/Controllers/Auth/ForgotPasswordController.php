<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\ForgotPassword;
use App\Models\Administration\ForgotPassword as AdministrationForgotPassword;
use App\Models\Administration\User;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

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
        return view('template.auth.email');
    }

    public function verifyEmail(Request $request){
        $request->validate([
            'email' => 'required|string|email|exists:users',
        ]);

        $token=Str::random(4);
        $user=User::where('email',$request->email)->first();
        if(empty($user)){
           Alert::error('l\'email n\'existe pas');
           return redirect(route('auth.forgot.password.email'));
        }
        //dd($user->email,$token);
        

        $forgotPassWord=AdministrationForgotPassword::create([
            'email' => $user->email,
            'token' => $token
        ]);
        $compteData['prenom'] = $user['prenom'];
        $compteData['nom'] = $user['nom'];
        $compteData['email'] = $user['email'];
        $compteData['token']=$forgotPassWord->token;

        //Envoie des crédentials par mail
        Mail::to($user)->send(new ForgotPassword($compteData));

        Alert::success('Succés','Un message vous a été envoyé par mail. Veuillez consulter votre boite mail pour poursuivre le processus');

        return redirect(route('auth.reset.password'));
    }

    public function resetPassword(){
        return view('template.auth.new-password');

    }

    public function resetPasswordPost(Request $request){
        $request->validate([
            'email' => 'required|string|email|max:255|exists:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'token'=>'required|string|'

        ],
          [
            'email.exists'=>'l\'email n\'existe pas'
          ]);
          $updatePassword=AdministrationForgotPassword::where([
            'email'=>$request->email,
            'token'=>$request->token,
            'statut'=> 0
          ])->first();
       
          if(!$updatePassword){
            Alert::error('Erreur','Invalide veuillez réessayer');

            return redirect()->to(route("auth.reset.password"));
          }
          User::where(["email"=>$updatePassword->email])->update(['password' => Hash::make($request->password)]);
          AdministrationForgotPassword::where(["email"=>$updatePassword->email, 'token'=>$updatePassword->token])->update(['statut'=>1]);
          Alert::success("Succés","Mot de passe réinitialisé avec succés");

          return redirect()->to(route("auth.index"));
        }

}
