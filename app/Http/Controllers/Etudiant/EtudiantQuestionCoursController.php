<?php

namespace App\Http\Controllers\Etudiant;

use App\Http\Controllers\Controller;
use App\Models\Administration\Cours;
use App\Models\Etudiant\EtudiantQuestionCours;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class EtudiantQuestionCoursController extends Controller
{
    
    public function store(Request $request)
    {  
        
        $input = $request->all();

        $input['contenu'] = str_replace('true','false',$input['contenu']);

        $input['contenu'] = str_replace('input type="text"','input type="hidden"',$input['contenu']);
        if ($input['questions_id'][0] == "0,0,0"){
            Alert::error("Error","Le choix d'une question est obligatoire");
            return redirect()->back();
        }

        $question_ids = explode(',',$input["questions_id"][0]);
       
        
        foreach ($question_ids as $key => $question_id){
            if ($question_id != 0){
              
                $exo = EtudiantQuestionCours::create([
                    'question_cours_id' => $question_id,
                    'user_id' => $input['user_id'],
                    'etudiant_id' => auth()->user()->etudiant()->id,
                    'contenu' => $input["contenu"][$key],
                ]);
            
        }
        }

        Alert::success('Succés', 'Questions ajoutées avec succés');
        return redirect()->back();
    }


    }

