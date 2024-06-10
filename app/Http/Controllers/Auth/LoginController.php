<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function showLoginForm()
    {
        return view('template.auth.login');
    }

    public function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
    }

    public function login(Request $request)
    {
        if ($this->attemptLogin($request)) {
            if ($request->hasSession()) {
                $request->session()->put('auth.password_confirmed_at', time());
            }

            $user = auth()->user();

            if ($user->personne_type == 'Administrateur')
            {
                return redirect(route('admin.index'));
            }
            if ($user->personne_type == 'Etudiant')
            {
                return redirect(route('etudiant.index'));
            }

            if ($user->personne_type == 'Enseignant')
            {
                return redirect(route('enseignant.index'));
            }

            if ($user->personne_type == 'Candidat')
            {
                return redirect(route('etudiant.certifications'));
            }


        }
        else{
            $this->incrementLoginAttempts($request);

            return $this->sendFailedLoginResponse($request);
        }
    }

    public function username()
    {
        return 'email';
    }

}
