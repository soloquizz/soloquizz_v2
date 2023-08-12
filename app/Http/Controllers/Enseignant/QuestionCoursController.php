<?php

namespace App\Http\Controllers\Enseignant;

use App\Http\Controllers\Controller;
use App\Models\Enseignant\QuestionCours;
use Illuminate\Http\Request;
use App\Repositories\Enseignant\QuestionCoursRepository;
use App\Repositories\Administration\CoursRepository;
use RealRashid\SweetAlert\Facades\Alert;


class QuestionCoursController extends Controller
{
    /** @var QuestionCoursRepository $questionCoursRepository*/
    private $questionCoursRepository;
    private $coursRepository;

    public function __construct(QuestionCoursRepository $questionRepo, CoursRepository $coursRepo)
    {
        $this->questionCoursRepository = $questionRepo;
        $this->coursRepository = $coursRepo;
    }

    public function store(Request $request)
    {  
        $request->validate([
            'contenu' => 'required|string',
            'qcm' => 'required|boolean',
            'created_at' => 'nullable',
            'updated_at' => 'nullable',
            'deleted_at' => 'nullable',
            'cours_id' => 'required'
        ]);
        $input = $request->all();

        $input['contenu'] = str_replace('true','false',$input['contenu']);

        $input['contenu'] = str_replace('input type="text"','input type="hidden"',$input['contenu']);

        $question = $this->questionCoursRepository->create($input);

        $lastPage = $this->coursRepository->getLastPage($input['cours_id'],2);

        Alert::success('Succés','Question ajoutée avec succés');

        //return redirect(route('enseignant.cours.show',$questionCours->cours_id));

        return redirect(route('enseignant.cours.show', ['page' => $lastPage,'search' => '','cours_id'=>$input['cours_id']]));

    }


    public function editCustom(Request $request)
    {
        $page = $request->page;
        $question_id = $request->question_id;
        $questionCours = $this->questionCoursRepository->find($question_id);

        if (empty($questionCours)) {
            Alert::error('Question intouvable');

            return redirect(route('enseignant.cours.show'));
        }

        return view('template.enseignant.questionCours.edit',compact('page','questionCours'));
    }

    public function update(Request $request,$id){
        $question = QuestionCours::find($id);

        if (empty($question))
        {
            Alert::error('Error','Question non trouvé');
            return redirect()->back();
        }

        $request->validate([
            'contenu' => 'required|string',
            'qcm' => 'required|boolean',
            'created_at' => 'nullable',
            'updated_at' => 'nullable',
            'deleted_at' => 'nullable',
            'cours_id' => 'required'
        ]);
        $input = $request->all();
      

        $input['contenu'] = str_replace('true','false',$input['contenu']);

        $input['contenu'] = str_replace('input type="text"','input type="hidden"',$input['contenu']);

        $question = $this->questionCoursRepository->update($input,$id);


        $lastPage = $this->coursRepository->getLastPage($input['cours_id'],2);
        
        Alert::success('Succés','Question modifiée avec succés');

        //return redirect(route('enseignant.cours.show',$questionCours->cours_id));

        return redirect(route('enseignant.cours.show', ['page' => $lastPage,'search' => '','cours_id'=>$input['cours_id']]));

    }

    

}
