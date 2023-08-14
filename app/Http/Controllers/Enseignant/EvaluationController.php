<?php

namespace App\Http\Controllers\Enseignant;

use App\Http\Controllers\Controller;
use App\Models\Enseignant\EvaluationExercices;
use App\Models\Enseignant\Evaluations;
use App\Models\Enseignant\Exercice;
use App\Models\Enseignant\OptionCours;
use App\Models\Enseignant\QuestionExercice;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class EvaluationController extends Controller
{
    public function index($id){
        $evaluation=Evaluations::find($id);
        $exercices=Exercice::all();
        return view('template.enseignant.evaluation_exercices.create',compact('evaluation','exercices'));
  
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

    public function show($id){
        $evaluation=Evaluations::find($id);
        $evaluationExercice=EvaluationExercices::paginate(2);
        $questionExercice=QuestionExercice::all();
        $options=OptionCours::all();
        
        $rank=$evaluationExercice->firstItem();
        return view('template.enseignant.evaluation_exercices.show',compact('evaluation','evaluationExercice','questionExercice','options','rank'));
    }

    public function updateS($id){
        $evaluation=Evaluations::find($id);
        $evaluation->statut=1;
        $evaluation->update();
        Alert::success('Succés','Evaluation publié');

         return redirect()->back();
    }

    public function edit($id){
        $evaluation=Evaluations::find($id);
        $evaluation->heure=date('H:i:s');
         return view('template.enseignant.evaluations.edit',compact('evaluation'));
    }
}
