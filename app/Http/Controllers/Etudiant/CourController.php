<?php

namespace App\Http\Controllers\Etudiant;

use App\Http\Controllers\Controller;
use App\Models\Administration\Cours;
use App\Models\Administration\Editeur;
use App\Models\Enseignant\Exercice;
use App\Models\Enseignant\QuestionExercice;
use Illuminate\Http\Request;

class CourController extends Controller
{

    public function index()
    {
        $etudiant = auth()->user()->etudiant();
        $classe = $etudiant->classe();
        $cours = $classe->cours;
        return view('template.etudiant.cours.index',compact('cours','classe','etudiant'));
    }

    public function show($cours_id)
    {
        $cours = Cours::find($cours_id);
        return view('template.etudiant.cours.show',compact('cours'));
    }

  //TD without treatement option
    public function showTD($id){
        $exo=Exercice::find($id);
        $questionExercice=QuestionExercice::where('exercice_id',$id)->paginate(3);
        $rank=$questionExercice->firstItem();
        return view('template.etudiant.question_exercices.show',compact('exo','questionExercice','rank'));
    }


    //TD without treatement option
    public function treatementTD($id){
        $exo=Exercice::find($id);
        $user=auth()->user();
        $questionExercice=QuestionExercice::where('exercice_id',$id)->paginate(3);
        $rank=$questionExercice->firstItem();
        return view('template.etudiant.etudiant_questions.create',compact('exo','questionExercice','rank','user'));
    }

}
