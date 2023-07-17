<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PasswordChange
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();
        $profile = $user->personne_type;
        if ($user->password_change == 0){
            Alert::warning('Avertissement','Merci de changer votre mot de passe');
            if ($profile == 'Administrateur'){
                return redirect(route('admin.password.change.show'));
            }
            if ($profile == 'Enseignant'){
                return redirect(route('enseignant.password.change.show'));
            }
            if ($profile == 'Etudiant'){
                return redirect(route('etudiant.password.change.show'));
            }
        }
        return $next($request);
    }
}
