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

        $input = $request->all();

        if ($input['questions_id'][0] == "0,0,0"){
            Alert::error("Error","Le choix d'une question est obligatoire");
            return redirect()->back();
        }

        $question_ids = explode(',',$input["questions_id"][0]);
       
        
        foreach ($question_ids as $key => $question_id){
            if ($question_id != 0){
              
          
                $exo = QuestionExercice::create([
                    'question_cours_id' => $question_id,
                    'exercice_id' => $input['exercice_id'],
                    'point' => $input["points"][$key],
                    'duree' => $input["durees"][$key]
                ]);
            
        }
        }

        Alert::success('Succés', 'Questions ajoutées avec succés');
        return redirect(route('enseignant.question_exercices.show', $exo->exercice_id));

    }

}
