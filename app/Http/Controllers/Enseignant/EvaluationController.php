<?php

namespace App\Http\Controllers\Enseignant;

use App\Http\Controllers\Controller;
use App\Models\Enseignant\Evaluations;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class EvaluationController extends Controller
{
    public function index($id){
        $evaluation=Evaluations::find($id);
        //$questions=QuestionCours::paginate(5);
        //$rank = $questions->firstItem();
        return view('template.enseignant.evaluation_exercices.create',compact('evaluation'));
  
    }
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string',
            'date' => 'required|after:today',
            'heure' => 'required',
            'duree' => 'required|integer',
            'note_max' => 'required|integer',
            'type' => 'required|in:Devoir,Examen'
        ], [
            'titre.required' => 'Le champ Titre est obligatoire.',
            'titre.string' => 'Le champ Titre doit être une chaîne de caractères.',
            'date.required' => 'Le champ Date est obligatoire.',
            'date.after' => 'La date doit être postérieure à la date actuelle.',
            'heure.required' => 'Le champ Heure est obligatoire.',
            'duree.required' => 'Le champ Durée est obligatoire.',
            'duree.integer' => 'Le champ Durée doit être un entier.',
            'note_max.required' => 'Le champ Note est obligatoire.',
            'note_max.integer' => 'Le champ Note doit être un entier.',
            'type.required' =>'Le champ Type est obligatoire.'
        ]);

        $input = $request->all();

        $evaluation = Evaluations::create($input);

        Alert::success('Succés','Evaluation ajoutée avec succés');

        return redirect(route('enseignant.cours.show',$evaluation->cours_id));
    }
}
