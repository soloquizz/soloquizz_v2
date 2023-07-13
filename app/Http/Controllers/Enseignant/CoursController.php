<?php

namespace App\Http\Controllers\Enseignant;

use App\Http\Controllers\Controller;
use App\Models\Administration\Cours;
use Illuminate\Http\Request;

class CoursController extends Controller
{
    public function index()
    {
        $enseignant =  auth()->user()->enseignant();

        $cours = $enseignant->cours;

        $classes = $enseignant->classes();

        return view('template.enseignant.cours.index',compact('cours','enseignant','classes'));
    }

    public function show($cours_id)
    {
        $cours = Cours::find($cours_id);
        return view('template.enseignant.cours.show',compact('cours'));
    }
}
