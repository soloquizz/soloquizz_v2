<?php

namespace App\Http\Controllers\Enseignant;

use App\Http\Controllers\Controller;
use App\Models\Administration\Cours;
use Illuminate\Http\Request;
use App\Models\Enseignant\Exercice;
use App\Models\Enseignant\QuestionCours;
use RealRashid\SweetAlert\Facades\Alert;

class ExerciceController extends Controller
{
    public function index($id){
        $exo=Exercice::find($id);
        $questions=QuestionCours::all();
        return view('template.enseignant.question_exercices.create',compact('exo','questions'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string',
            'note_max' => 'required|integer',
            'duree' => 'required|integer',
            'created_at' => 'nullable',
            'updated_at' => 'nullable',
            'deleted_at' => 'nullable',
            'cours_id' => 'required',
            'seance_id'=>'required'
        ], [
            'titre.required' => 'Le champ Titre est obligatoire.',
            'titre.string' => 'Le champ Titre doit être une chaîne de caractères.',
            'note_max.required' => 'Le note maximale est obligatoire.',
            'note_max.integer' => 'Le note maximale doit être un entier.',
            'duree.required' => 'Le champ Durée est obligatoire.',
            'duree.integer' => 'Le champ Durée doit être un entier.',
            'seance_id.required' => 'Vous devez choisir une séance.',

        ]);

        $input = $request->all();

        $exo = Exercice::create($input);

        Alert::success('Succés','Séance ajouté avec succés');

        return redirect(route('enseignant.cours.show',$exo->cours_id));
    }
    
    public function show($id){
        $exo=Exercice::find($id);
        return view('template.enseignant.question_exercices.show',compact('exo'));
    }
    
}
