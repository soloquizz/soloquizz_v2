<?php

namespace App\Http\Controllers\Enseignant;

use App\Http\Controllers\Controller;
use App\Models\Administration\Seance;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SeanceController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string',
            'date' => 'required',
            'heure_debut' => 'required|date_format:H:i',
            'heure_fin' => 'required|date_format:H:i|after:heure_debut',
            'duree' => 'required|integer',
        ], [
            'titre.required' => 'Le champ Titre est obligatoire.',
            'titre.string' => 'Le champ Titre doit être une chaîne de caractères.',
            'date.required' => 'Le champ Date est obligatoire.',
            'date.after' => 'La date doit être postérieure à la date actuelle.',
            'heure_debut.required' => 'Le champ Heure de début est obligatoire.',
            'heure_debut.date_format' => 'Le champ Heure de début doit être au format HH:ii.',
            'heure_fin.required' => 'Le champ Heure de fin est obligatoire.',
            'heure_fin.date_format' => 'Le champ Heure de fin doit être au format HH:ii.',
            'heure_fin.after' => 'L\'heure de fin doit être postérieure à l\'heure de début.',
            'duree.required' => 'Le champ Durée est obligatoire.',
            'duree.integer' => 'Le champ Durée doit être un entier.',
        ]);

        $input = $request->all();

        $seance = Seance::create($input);

        Alert::success('Succés','Séance ajouté avec succés');

        return redirect(route('enseignant.cours.show',$seance->cours_id));
    }
}
