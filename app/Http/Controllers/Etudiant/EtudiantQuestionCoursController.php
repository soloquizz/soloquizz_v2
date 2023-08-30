<?php

namespace App\Http\Controllers\Etudiant;

use App\Http\Controllers\Controller;
use App\Models\Administration\Cours;
use App\Models\Etudiant\EtudiantQuestionCours;
use App\Models\Etudiant\EtudiantQuestionCoursOption;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class EtudiantQuestionCoursController extends Controller
{
    
    public function store(Request $request)
    {  
        
        $input = $request->all();
        //dd($input);
        $input['contenu'] = str_replace('true','false',$input['contenu']);

        $input['contenu'] = str_replace('input type="text"','input type="hidden"',$input['contenu']);
        
       
      
        /*foreach ($question_ids as $key => $question_id){
            if ($question_id != 0){
              
                $exo = EtudiantQuestionCours::create([
                    'question_cours_id' => $question_id,
                    'user_id' => $input['user_id'],
                    'etudiant_id' => auth()->user()->etudiant()->id,
                    'contenu' => $input["contenu"][$key],
                ]);
            
        }*/
      dd(count($request->question_cours_id));
      
        for($i=0; $i < count($request->question_cours_id);$i++){
            
                $exo = EtudiantQuestionCours::create([
                  
                    'question_cours_id' => $request->question_cours_id[$i],
                    'user_id' => $request->user_id[$i],
                    'etudiant_id' => $request->etudiant_id[$i],
                    'contenu' => $request->contenu[$i],
                    //dd($request->question_cours_id[$i]),
                ]);
                $exo->save();
                
                /*$option = EtudiantQuestionCoursOption::create([
                    'etud_quest_cours_id' => $exo->id,
                    'user_id' => $request->user_id[$i],
                    'etudiant_id' => $request->etudiant_id[$i],
                    'option_id'=>$request->option_id[$i]
                ]);*/
        }

        Alert::success('Succés', 'Réponses envoyées avec succés');
        return redirect()->back();
    }    
}