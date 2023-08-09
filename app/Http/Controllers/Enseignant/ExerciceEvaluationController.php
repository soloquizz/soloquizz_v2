<?php

namespace App\Http\Controllers\Enseignant;

use App\Http\Controllers\Controller;
use App\Models\Enseignant\EvaluationExercices;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ExerciceEvaluationController extends Controller
{
    public function store(Request $request)
    {

        $input = $request->all();

        if ($input['exercice_ids'][0] == "0,0,0"){
            Alert::error("Error","Le choix d'un exercice est obligatoire");
            return redirect()->back();
        }

        $question_ids = explode(',',$input["exercice_ids"][0]);
       
        
        foreach ($question_ids as $key => $question_id){
            if ($question_id != 0){
                $exo = EvaluationExercices::create([
                    'exercice_id' => $question_id,
                    'evaluation_id' => $input['evaluation_id'],
                ]);
            
        }
        }

        Alert::success('Succés', 'Exercice(s) ajoutés avec succés');
        return redirect()->back();
    }
}
