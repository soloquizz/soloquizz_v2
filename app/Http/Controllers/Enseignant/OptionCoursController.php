<?php

namespace App\Http\Controllers\Enseignant;

use App\Http\Controllers\Controller;
use App\Models\Enseignant\OptionCours;
use App\Models\Enseignant\QuestionExercice;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class OptionCoursController extends Controller
{
    public function store(Request $request)
    {
        $input = $request->all();

        $input['contenu'] = str_replace('true','false',$input['contenu']);

        $input['contenu'] = str_replace('input type="text"','input type="hidden"',$input['contenu']);
       
        $option = OptionCours::create($input);

        Alert::success('Succés','Option  enregistrée avec succès.');

        $page = '';
        if (isset($input['page'])){
            $page = $input['page'];
        }

        $question = $option->questionCours;
        $cours = $option->questionCours->cours->first()->id;
        return redirect(route('enseignant.cours.show', ['page' => $page,'search' => '','cours_id'=>$cours]));

    }

    public function update($id, Request $request)
    {
        $option = OptionCours::find($id);

        $input = $request->all();

        if (empty($option)) {
            Alert::error('Error','Option not found');

            return redirect()->back();
        }

        $input['contenu'] = str_replace('true','false',$input['contenu']);

        $input['contenu'] = str_replace('input type="text"','input type="hidden"',$input['contenu']);

        $option->contenu=$input['contenu'];
        $option->correcte=$input['correcte'];
        $option->question_cours_id=$input['question_cours_id'];
        $option->update();

        $question = $option->question;

        Alert::success('Succés','Option  enregistrée avec succès.');


        $page = '';
        if (isset($input['page'])){
            $page = $input['page'];
        }

        $question = $option->questionCours;
        $cours = $option->questionCours->cours->first()->id;
        return redirect(route('enseignant.cours.show', ['page' => $page,'search' => '','cours_id'=>$cours]));

    }

    public function editCustom(Request $request)
    {
        $id = $request->option_id;
        $page = $request->page;

        $option = OptionCours::find($id);

        if (empty($option)) {
            Alert::error('Error','Option not found');

            return redirect()->back();
        }

        $question = $option->questionCours;
        $cours = $option->questionCours->cours;

        return view('template.enseignant.options_cours.edit',compact('page','option','question','cours'));
    }

}
