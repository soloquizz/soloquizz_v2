<?php

namespace App\Http\Controllers\Etudiant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    public function index()
    {
        return view('template.etudiant.index');
    }

    public function cours()
    {
        return view('template.etudiant.cours.index');
    }

    public function discussions()
    {
        return view('template.etudiant.discussions.index');
    }

}
