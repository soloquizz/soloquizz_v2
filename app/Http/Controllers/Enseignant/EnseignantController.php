<?php

namespace App\Http\Controllers\Enseignant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EnseignantController extends Controller
{
    public function index()
    {
        return redirect(route('enseignant.cours'));
        //return view('template.enseignant.index');
    }
}
