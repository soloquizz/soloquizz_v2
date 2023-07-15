<?php

namespace App\Http\Controllers\Enseignant;

use App\Http\Controllers\Controller;
use App\Models\Administration\Cours;
use App\Models\Administration\Support;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

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
        $support = $cours->supports->first();
        //dd($support->getMedia('supports'));
        return view('template.enseignant.cours.show',compact('cours'));
    }

    public function storeSupport(Request $request)
    {
        $request->validate([
            'support' => 'required|file|max:12937|mimetypes:mimetypes:application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/vnd.ms-excel,application/pdf,video/*',
            'file_name' => 'required|unique:supports'
        ], [
            'support.required' => 'Le champ du fichier de support est obligatoire.',
            'support.file' => 'Le fichier de support doit être un fichier.',
            'support.mimetypes' => 'Le fichier de support doit être au format Word, Excel, PDF ou vidéo.',
            'file_name.unique' => 'Ce nom de fichier existe déjà.',
        ]);

        $input = $request->all();

        $support = Support::create($input);

        $support->addMediaFromRequest('support')->toMediaCollection('supports');

        Alert::success('Succés','Ressource ajoutée avec succés');

        return redirect(route('enseignant.cours.show',$input['cours_id']));

    }
}
