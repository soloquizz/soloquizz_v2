<?php

namespace App\Http\Controllers\Etudiant;

use App\Http\Controllers\Controller;
use App\Models\Administration\Classe;
use App\Models\Enseignant\EvaluationExercices;
use App\Models\Enseignant\Evaluations;
use App\Models\Enseignant\OptionCours;
use App\Models\Enseignant\QuestionExercice;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{
    public function index($id){
        $classe=Classe::find($id);
        $date = Carbon::now();
        $tabDates=[];
        $data_difference=0;
        foreach($classe->cours as $crs){
            foreach($crs->evaluations as $ev){
                $data_difference = $date->diffInDays($ev->date, false);
                array_push($tabDates,$data_difference);
            }

        }

        //dd($data_difference);
       
        return view('template.etudiant.evaluations.index',compact('classe','date','data_difference'));
    }

    public function show($id){
        $evaluation=Evaluations::find($id);
        $evaluationExercice=EvaluationExercices::paginate(2);
        $questionExercice=QuestionExercice::all();
        $options=OptionCours::all();
        
        $rank=$evaluationExercice->firstItem();
        return view('template.etudiant.question_evaluations.show',compact('evaluation','evaluationExercice','questionExercice','options','rank'));
    }

    public function treatementTD($id){
        $evaluation=Evaluations::find($id);
        $evaluationExercice=EvaluationExercices::paginate(2);
        $questionExercice=QuestionExercice::all();
        $options=OptionCours::all();
        $user=auth()->user();  
        $rank=$evaluationExercice->firstItem();
        return view('template.etudiant.etudiant_evaluations.create',compact('evaluation','evaluationExercice','questionExercice','options','rank','user'));
    }
}
