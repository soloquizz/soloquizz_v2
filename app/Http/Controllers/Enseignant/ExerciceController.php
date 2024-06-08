<?php

namespace App\Http\Controllers\Enseignant;

use App\Http\Controllers\Controller;
use App\Models\Administration\Cours;
use Illuminate\Http\Request;
use App\Models\Enseignant\Exercice;
use App\Models\Enseignant\OptionCours;
use App\Models\Enseignant\QuestionCours;
use App\Models\Enseignant\QuestionExercice;
use RealRashid\SweetAlert\Facades\Alert;

class ExerciceController extends Controller
{
    public function index($id){
        $exo=Exercice::find($id);
        $questions=QuestionCours::paginate(5);
        $rank = $questions->firstItem();
        return view('template.enseignant.question_exercices.create',compact('exo','questions','rank'));
     
    }

    /////////////sauvegarder un exercice//////////////
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string',
            'note_max' => 'required|integer',
            'duree' => 'required|integer',
            'created_at' => 'nullable',
            'updated_at' => 'nullable',
            'deleted_at' => 'nullable',
            'cours_id' => 'required',
            'seance_id'=>'required'
        ], [
            'titre.required' => 'Le champ Titre est obligatoire.',
            'titre.string' => 'Le champ Titre doit être une chaîne de caractères.',
            'note_max.required' => 'Le note maximale est obligatoire.',
            'note_max.integer' => 'Le note maximale doit être un entier.',
            'duree.required' => 'Le champ Durée est obligatoire.',
            'duree.integer' => 'Le champ Durée doit être un entier.',
            'seance_id.required' => 'Vous devez choisir une séance.',

        ]);

        $input = $request->all();

        $exo = Exercice::create($input);

        Alert::success('Succés','Exercice ajouté avec succés');

        return redirect(route('enseignant.cours.show',$exo->cours_id));

    }

    public function update($id,Request $request)
    {
        $request->validate([
            'titre' => 'required|string',
            'note_max' => 'required|integer',
            'duree' => 'required|integer',
            'created_at' => 'nullable',
            'updated_at' => 'nullable',
            'deleted_at' => 'nullable',
            'cours_id' => 'required',
            'seance_id'=>'required'
        ], [
            'titre.required' => 'Le champ Titre est obligatoire.',
            'titre.string' => 'Le champ Titre doit être une chaîne de caractères.',
            'note_max.required' => 'Le note maximale est obligatoire.',
            'note_max.integer' => 'Le note maximale doit être un entier.',
            'duree.required' => 'Le champ Durée est obligatoire.',
            'duree.integer' => 'Le champ Durée doit être un entier.',
            'seance_id.required' => 'Vous devez choisir une séance.',

        ]);

        $input = $request->all();

        $exo = Exercice::find($id);
        $exo->titre=$input['titre'];
        $exo->note_max=$input['note_max'];
        $exo->duree=$input['duree'];
        $exo->seance_id=$input['seance_id'];
        $exo->update();

        Alert::success('Succés','Exercice modifié avec succés');

        return redirect()->back();
    }
    
    /////////////Afficher un exercice avec ses questions/////////////
    public function show($id){
        $exo=Exercice::find($id);
        $questionExercice=QuestionExercice::where('exercice_id',$id)->paginate(3);
        //$questionCours=$questionExercice->firstItem()->question_cours_id;
        
        $rank=$questionExercice->firstItem();
        return view('template.enseignant.question_exercices.show',compact('exo','questionExercice','rank'));
    }
   ///////////////publier un exercice coté etudiant////////////////// 
    public function updateS($id){
        $exo=Exercice::find($id);
        $exo->statut=1;
        $exo->update();
        Alert::success('Succés','Exercice publié');

         return redirect()->back();
    }

    ////////////Depublier un exercice coté etudiant/////////////////
    public function depublier($id){
        $exo=Exercice::find($id);
        $exo->statut=0;
        $exo->update();
        Alert::success('Succés','Exercice dépublié');

         return redirect()->back();
    }
}
