<?php

namespace App\Http\Controllers\Etudiant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class EtudiantController extends Controller
{
    public function index()
    {
        return redirect(route('etudiant.cours'));
        //return view('template.etudiant.index');
    }

    public function cours()
    {
        return view('template.etudiant.cours.index');
    }

    public function discussions()
    {
        return view('template.etudiant.discussions.index');
    }

    public function showPasswordChange()
    {
        return view('template.etudiant.profile.password_change');
    }

    public function storePasswordChange(Request $request)
    {
        $request->validate([
            'password' => 'required|min:8|confirmed', // Mot de passe requis, longueur minimale de 8 caractères et doit correspondre au champ password_confirmation
        ], [
            'password.required' => 'Le mot de passe est requis.',
            'password.min' => 'Le mot de passe doit comporter au moins 8 caractères.',
            'password.confirmed' => 'La confirmation du mot de passe ne correspond pas.',
        ]);

        $password = bcrypt($request->password);
        auth()->user()->update(['password'=>$password,'password_change'=>1]);
        Alert::success('Succés','Mot de passe changer avec succés');
        return redirect(route('etudiant.cours'));
    }

}
