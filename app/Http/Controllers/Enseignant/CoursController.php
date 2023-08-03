<?php

namespace App\Http\Controllers\Enseignant;

use App\Http\Controllers\Controller;
use App\Mail\NotificationCours;
use App\Models\Administration\Cours;
use App\Models\Administration\Question;
use App\Models\Administration\Support;
use App\Models\Enseignant\QuestionCours;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Repositories\Enseignant\QuestionCoursRepository;
use App\Repositories\Administration\CoursRepository;
use Illuminate\Support\Facades\Mail;

class CoursController extends Controller
{
     /** @var QuestionCoursRepository $questionCoursRepository*/
     private $questionCoursRepository;
     private $coursRepository;
 
     public function __construct(QuestionCoursRepository $questionRepo, CoursRepository $coursRepo)
     {
         $this->questionCoursRepository = $questionRepo;
         $this->coursRepository = $coursRepo;
     }
 
    public function index()
    {
        $enseignant =  auth()->user()->enseignant();

        $cours = $enseignant->cours;

        $classes = $enseignant->classes();

        return view('template.enseignant.cours.index',compact('cours','enseignant','classes'));
    }

    public function searchQuestions(Request $request)
    {
        $textSearch = $request->search;
        $cours_id = $request->cours_id;
        return redirect(route('template.enseignant.cours.show', ['search' => $textSearch,'cours_id'=>$cours_id]));
    }

    public function show($cours_id,Request $request)
    {
        $cours = Cours::find($cours_id);
        $support = $cours->supports->first();
        $classe=$cours->classe;
        $inscrits=$classe->inscriptions->filter();
        //dd($support->getMedia('supports'));
        
        $textSearch = $request->search;

        if(isset($textSearch)){
            $questions =$this->coursRepository->search($cours_id,$textSearch,2);
        }else{
            $questions = $this->coursRepository->questionsCours($cours_id,2);
        }
        $questions->appends($_GET)->links();
        $rank = $questions->firstItem();

        //selecting all users from classe
         return view('template.enseignant.cours.show',compact('cours','questions','rank','inscrits'));
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

        //Mailing
        $cours=Cours::find($input['cours_id']);
        $classe=$cours->classe;
        $inscrits=$classe->inscriptions->filter(function($inscription){
            return $inscription->etat==0;
        });
        $etudiants=$inscrits->etudiant;
        $user=$etudiants->user;
        $coursData['nom_cours']=$cours['nom'];
        $coursData['classe']=$classe['nom'];
        Mail::to($user)->send(new NotificationCours($coursData));

        Alert::success('Succés','Ressource ajoutée avec succés');
        
        return redirect(route('enseignant.cours.show',$input['cours_id']));

    }


    
}
