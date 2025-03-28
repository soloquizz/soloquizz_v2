<?php

namespace App\Http\Controllers\Etudiant;

use App\Http\Controllers\Controller;
use App\Models\Administration\Certification;
use App\Models\Administration\Dump;
use App\Models\Administration\DumpQuestion;
use App\Models\Administration\DumpUser;
use App\Models\Administration\DumpUserQuestion;
use App\Models\Administration\EtudiantQuestion;
use App\Models\Administration\Option;
use App\Models\Administration\Question;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DumpController extends Controller
{

    public function dumps($certification_id)
    {
        $certification = Certification::find($certification_id);
        if (empty($certification)){
            Alert::error('Error','Certification not Found');
            return redirect()->back();
        }
        $dumpUsers = $certification->dumpUsers;
        $percent = intval(($dumpUsers->sum('score')/$certification->questions->sum('point'))*100);
        if ($percent>80){
            Alert::success('Succés','Test réussi avec succès');
        }
        return view('template.etudiant.dumps.index',compact('certification','dumpUsers'));
    }


    public function dumps_take($certification_id)
    {
        $certification = Certification::find($certification_id);

        if (empty($certification)){
            Alert::error('Error','Certification not Found');
            return redirect()->back();
        }

        //Vérifier s'il existe un dump non effectué
        $user = auth()->user();
        $dumpUser = DumpUser::where('user_id',$user->id)->where('etat',0)->first();
        if (!empty($dumpUser)){
            $dump = $dumpUser->dump;
            $questions = $dump->questions;
            $duree = $dump->duree;
        }
        else{
            $etudiant_questions_true = DumpUserQuestion::where('user_id',$user->id)->where('trouve',1)->pluck('question_id')->toArray();
            $questions = $certification->questions->whereNotIn('id',$etudiant_questions_true);
            if($questions->count() > $certification->nbre_qa){
                $questions = $questions->random($certification->nbre_qa);
            }

            //Paramètre du dump
            $duree = $questions->sum('duree');
            $score = $questions->sum('point');
            $nbreDump = DumpUser::where('user_id',$user->id)->get()->count()+1;

            $dumpData['titre'] = 'Entrainement '.$nbreDump;
            $dumpData['duree'] = $duree;
            $dumpData['score'] = $score;
            $dumpData['certification_id'] = $certification->id;

            $dump = Dump::create($dumpData);

            foreach ($questions as $question)
            {
                DumpQuestion::create([
                    'question_id' => $question->id,
                    'dump_id' => $dump->id
                ]);
            }

            $dumpUser = DumpUser::create([
                'dump_id' => $dump->id,
                'user_id' => $user->id,
                'etudiant_id' => $user->etudiant()->id,
                'certification_id' => $certification->id,
                'etat' => 0,
            ]);
        }

        return view('template.etudiant.dumps.dump_take',
            compact('certification','duree','questions','dump','dumpUser'));
    }

    public function info()
    {
        return view('template.etudiant.dumps.dump_info');
    }

    public function resultat($dump_user_id)
    {
        $dump_user = DumpUser::find($dump_user_id);
        $dump = $dump_user->dump;
        $certification = $dump->certification;
        $dumpUsers = $certification->dumpUsers;
        $percent = intval(($dumpUsers->sum('score')/$certification->questions->sum('point'))*100);
        if ($percent>80){
            Alert::success('Succés','Test réussi avec succès');
        }
        return view('template.etudiant.dumps.dump_resultat',compact('dump_user','dump','certification','dumpUsers'));
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $user = auth()->user();

        $etudiantQuestionData['etudiant_id'] = $user->etudiant()->id;
        $etudiantQuestionData['user_id'] = $user->id;
        $etudiantQuestionData['certification_id'] = $input['certification_id'];
        $etudiantQuestionData['dump_user_id'] = $input['dump_user_id'];
        $etudiantQuestionData['dump_id'] = $input['dump_id'];

        $score = 0;
        $nbreTrue = 0;
        $nbreFalse = 0;

        foreach ($input['questions'] as $question_id)
        {

            $question = Question::find($question_id);

            $questionTrue = true;

            $correct_options_id = $question->options->filter(function ($option){
                return $option->correcte;
            })->pluck('id')->toArray();

            $etudiantQuestionData['question_id'] = $question_id;

            //Si la question n'est pas traitée
            if (isset($input['reponses'.$question_id])){
                $reponses = $input['reponses'.$question_id];
            }
            else{
                $questionTrue = false;
            }


            //Si les réponses choisies sont différentes aux bonne réponses
            if (isset($reponses)){
                $diffArray = array_diff($correct_options_id,$reponses);
                if (count($diffArray)>0){
                    $questionTrue = false;
                }
            }
            else{
                $questionTrue = false;
            }



            $dump_user_question['user_id'] = $user->id;
            $dump_user_question['certification_id'] = $input['certification_id'];
            $dump_user_question['question_id'] = $question_id;
            $dump_user_question['dump_id'] = $input['dump_id'];
            $dump_user_question['dump_user_id'] = $input['dump_user_id'];
            $dumpUserQuestion = DumpUserQuestion::create($dump_user_question);

            //On vérifie s'il a traité la question
            if (isset($reponses)){
                foreach ($reponses as $reponse)
                {
                    $etudiantQuestionData['option_id'] = $reponse;
                    $etudiantQuestionData['dump_user_question_id'] = $dumpUserQuestion->id;
                    $option = Option::find($reponse);
                    if ($option->correcte)
                    {
                        $etudiantQuestionData['trouve'] = 1;
                    }
                    else{
                        $etudiantQuestionData['trouve'] = 0;
                        $questionTrue = false;
                    }
                    EtudiantQuestion::create($etudiantQuestionData);
                }
            }

            if ($questionTrue){
                $nbreTrue+=1;
                $score+=$question->point;
                $dumpUserQuestion->update(['trouve'=>1]);
                $dump_user_question['trouve'] = 1;
            }
            else{
                $nbreFalse+=1;
                $dumpUserQuestion->update(['trouve'=>0]);
            }

        }

        $dump_user = DumpUser::find($input['dump_user_id']);

        $dump_user_data['question_true'] = $nbreTrue;
        $dump_user_data['question_false'] = $nbreFalse;
        $dump_user_data['score'] = $score;
        $dump_user_data['etat'] = 1;

        $dump_user->update($dump_user_data);

        return redirect(route('etudiant.dumps.resultat',$input['dump_user_id']));
    }

}
