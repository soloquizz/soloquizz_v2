<?php

namespace App\Http\Controllers\Enseignant;

use App\Http\Controllers\Controller;
use App\Models\Enseignant\Exercice;
use Illuminate\Http\Request;
use App\Models\Enseignant\QuestionExercice;
use RealRashid\SweetAlert\Facades\Alert;

class QuestionExerciceController extends Controller
{
    public function store(Request $request)
    {
        /*$request->validate([
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
        $input=$request->all();
       
       foreach($request->input('question_cours_id') as $key =>$value){
            $exo = new  QuestionExercice;
            $exo->question_cours_id = $request->question_cours_id[$key]; 
            $exo->exercice_id=$request->exercice_id;
            $exo->point=$request->point[$key];
            $exo->duree=$request->duree[$key];
            
            $exo->save();
        }
           
        Alert::success('Succés','Questions ajoutées avec succés');
        return redirect(route('template.enseignant.question_exercices.show',$exo->exercice_id));
    }

    

   
}
