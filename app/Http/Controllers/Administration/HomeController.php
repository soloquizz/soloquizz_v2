<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    public function index()
    {
        return view('template.administration.index');
    }

    public function showPasswordChange()
    {
        return view('template.administration.profile.password_change');
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
        return redirect(route('admin.index'));
    }


}
