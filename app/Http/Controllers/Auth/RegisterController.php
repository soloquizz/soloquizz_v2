<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\CompteInfos;
use App\Models\Administration\AnneeScolaire;
use App\Models\Administration\Classe;
use App\Models\Administration\Etudiant;
use App\Models\Administration\Inscription;
use App\Models\Administration\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\Administration\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function showRegister()
    {
        $classes = Classe::all()->filter(function ($classe){
            return $classe->niveau->annee <= 2;
        });
        $annee_scolaire = AnneeScolaire::all()->filter(function ($annee_scolaire){
            return $annee_scolaire->actif;
        })->first();
        return view('template.auth.register',compact('classes','annee_scolaire'));
    }

    public function registerStore(Request $request)
    {
        $request->validate([
            'numero_carte' => 'required|string', // Numéro de carte étudiant requis et doit être numérique
            'prenom' => 'required|string|max:255', // Prénom requis, chaîne de caractères et longueur maximale de 255 caractères
            'nom' => 'required|string|max:255', // Nom requis, chaîne de caractères et longueur maximale de 255 caractères
            'telephone' => 'required|string', // Téléphone requis et doit être numérique
            'email' => 'required|email|unique:users', // Email requis, format d'email valide et doit être unique dans la table 'users'
            'classe_id' => 'required|numeric',
        ], [
            'numero_carte.required' => 'Le numéro de carte étudiant est requis.',
            'numero_carte.numeric' => 'Le numéro de carte étudiant doit être un nombre.',
            'prenom.required' => 'Le prénom est requis.',
            'prenom.string' => 'Le prénom doit être une chaîne de caractères.',
            'prenom.max' => 'Le prénom ne peut pas dépasser 255 caractères.',
            'nom.required' => 'Le nom est requis.',
            'nom.string' => 'Le nom doit être une chaîne de caractères.',
            'nom.max' => 'Le nom ne peut pas dépasser 255 caractères.',
            'telephone.required' => 'Le numéro de téléphone est requis.',
            'telephone.string' => 'Le numéro de téléphone doit être une chaine de caractère.',
            'email.required' => 'L\'adresse email est requise.',
            'email.email' => 'L\'adresse email doit être valide.',
            'email.unique' => 'L\'adresse email est déjà utilisée.',
        ]);

        $input = $request->all();

        $etudiant = Etudiant::create($input);

        if (isset($input['email'])){
            $userData['email'] = $input['email'];
            $generatePassword = substr(uniqid(),5);
            $userData['password'] = bcrypt($generatePassword);
            $userData['personne_type'] = 'Etudiant';
            $userData['personne_id'] = $etudiant->id;
            $user = User::create($userData);
        }

        //Add Inscription
        $inscriptionData['classe_id'] = $input['classe_id'];
        $inscriptionData['annee_scolaire_id'] = $input['annee_scolaire_id'];
        $inscriptionData['etudiant_id'] = $etudiant->id;
        Inscription::create($inscriptionData);

        $compteData['prenom'] = $input['prenom'];
        $compteData['nom'] = $input['nom'];
        $compteData['profile'] = 'Étudiant';
        $compteData['email'] = $user->email;
        $compteData['password'] = $generatePassword;

        //Envoie des crédentials par mail
        Mail::to($user)->send(new CompteInfos($compteData));

        Alert::success('Succés','Votre compte a été créé avec succés. Veuillez consulter votre boite mail pour les crédentials');

        return redirect(route('auth.index'));

    }
}
