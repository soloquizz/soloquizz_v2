<?php

namespace App\Http\Controllers\Etudiant;

use App\Http\Controllers\Controller;
use App\Models\Administration\Certification;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DumpController extends Controller
{

    public function dumps($certification_id)
    {
        $certification = Certification::find($certification_id);
        if (empty($certification)){
            Alert::error('Error','Certification not Found');
            return redirect()->back();
        }
        return view('template.etudiant.dumps.index',compact('certification'));
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
