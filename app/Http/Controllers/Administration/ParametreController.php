<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Controller;
use App\Models\Administration\AnneeScolaire;
use App\Models\Administration\Domaine;
use App\Models\Administration\Niveau;
use App\Models\Administration\Parcours;
use App\Models\Administration\Semestre;
use Illuminate\Http\Request;

class ParametreController extends Controller
{
    public function index(){
        $domain=Domaine::all();
        $niveaux=Niveau::all();
        $parcours=Parcours::all();
        $semestres=Semestre::all();
        $annees=AnneeScolaire::all();

        return view('template.administration.parametres.index',compact('domain','niveaux','parcours','semestres','annees'));
    }
}
