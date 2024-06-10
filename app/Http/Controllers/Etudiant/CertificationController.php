<?php

namespace App\Http\Controllers\Etudiant;

use App\Http\Controllers\Controller;
use App\Models\Administration\Editeur;
use Illuminate\Http\Request;

class CertificationController extends Controller
{
    public function index()
    {

        if (auth()->user()->personne_type=='Candidat'){
            $editeurs = Editeur::where('nom','Test_Psychotechnique')->get();
        }
        else{
            $editeurs = Editeur::all();
        }
        return view('template.etudiant.certifications.index',compact('editeurs'));
    }
}
