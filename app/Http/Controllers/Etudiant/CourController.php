<?php

namespace App\Http\Controllers\Etudiant;

use App\Http\Controllers\Controller;
use App\Models\Administration\Cours;
use App\Models\Administration\Editeur;
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


}
