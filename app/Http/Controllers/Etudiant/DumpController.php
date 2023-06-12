<?php

namespace App\Http\Controllers\Etudiant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DumpController extends Controller
{

    public function dumps()
    {
        return view('template.etudiant.dumps.index');
    }

    public function info()
    {
        return view('template.etudiant.dumps.dump_info');
    }

    public function resultat()
    {
        return view('template.etudiant.dumps.dump_resultat');
    }

}
