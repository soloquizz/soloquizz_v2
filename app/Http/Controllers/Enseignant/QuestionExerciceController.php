<?php

namespace App\Http\Controllers\Enseignant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Enseignant\QuestionExercice;
use RealRashid\SweetAlert\Facades\Alert;

class QuestionExerciceController extends Controller
{
    public function store(Request $request)
    {
        /*$request->validate([
            'id' => 'integer',
            'question_cours_id' => 'integer',
            'exercice_id' => 'integer',
            'point' => 'integer',
            'duree' => 'integer'
        ], [
            'point.required' => 'Le note maximale est obligatoire.',
            'point.integer' => 'Le note maximale doit être un entier.',
            'duree.required' => 'Le champ Durée est obligatoire.',
            'duree.integer' => 'Le champ Durée doit être un entier.',
            'exercice_id.required' => 'Vous devez choisir au minimum un exercice.',

        ]);*/

        $input = $request->all();
       
        for($question_cours_id=0; $question_cours_id < count($request->question_cours_id);$question_cours_id++){
            $exo = QuestionExercice::create([
                'id'=>$request->id,
                'question_cours_id' => $request->question_cours_id[$question_cours_id], 
                'exercice_id'=>$request->exercice_id[$question_cours_id],
                'point'=>$request->point[$question_cours_id],
                'duree'=>$request->duree[$question_cours_id]
            ]);
           $exo->save();
           
        } 


        Alert::success('Succés','Questions ajoutées avec succés');

        return redirect(route('template.enseignant.question_exercices.show',$exo->exercice_id));
    }

   
}
