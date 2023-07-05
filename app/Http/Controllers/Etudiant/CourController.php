<?php

namespace App\Http\Controllers\Etudiant;

use App\Http\Controllers\Controller;
use App\Models\Administration\Editeur;
use Illuminate\Http\Request;

class CourController extends Controller
{

    public function index()
    {
        return view('template.etudiant.cours.index');
    }

    public function show($cours_id)
    {
        $editeur = Editeur::find(1);
        return view('template.etudiant.cours.show',compact('editeur'));
    }


}
