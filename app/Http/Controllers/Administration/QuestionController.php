<?php

namespace App\Http\Controllers\Administration;

use App\Http\Requests\Administration\CreateQuestionRequest;
use App\Http\Requests\Administration\UpdateQuestionRequest;
use App\Repositories\Administration\CertificationRepository;
use App\Repositories\Administration\QuestionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Aler;
use RealRashid\SweetAlert\Facades\Alert;
use Response;

class QuestionController extends AppBaseController
{
    /** @var QuestionRepository $questionRepository*/
    private $questionRepository;
    private $certificationRepository;

    public function __construct(QuestionRepository $questionRepo, CertificationRepository $certificationRepo)
    {
        $this->questionRepository = $questionRepo;
        $this->certificationRepository = $certificationRepo;
    }

    /**
     * Display a listing of the Question.
     *
     * @param Request $request
     *
     * @return
     */
    public function index(Request $request)
    {
        $questions = $this->questionRepository->all();

        return view('administration.questions.index')
            ->with('questions', $questions);
    }

    /**
     * Show the form for creating a new Question.
     *
     * @return
     */
    public function create()
    {
        //return view('administration.questions.create');
    }

    /**
     * Store a newly created Question in storage.
     *
     * @param CreateQuestionRequest $request
     *
     * @return
     */
    public function store(CreateQuestionRequest $request)
    {
        $input = $request->all();

        $input['contenu'] = str_replace('true','false',$input['contenu']);

        $input['contenu'] = str_replace('input type="text"','input type="hidden"',$input['contenu']);

        $question = $this->questionRepository->create($input);

        $lastPage = $this->certificationRepository->getLastPage($input['certification_id'],2);


        Alert::success('Succés','Question saved successfully.');

        return redirect(route('admin.certifications.questions.display', ['page' => $lastPage,'search' => '','certification_id'=>$input['certification_id']]));

    }

    /**
     * Display the specified Question.
     *
     * @param int $id
     *
     * @return
     */
    public function show($id)
    {
        /*$question = $this->questionRepository->find($id);

        if (empty($question)) {
            Alert::error('Question not found');

            return redirect(route('administration.questions.index'));
        }

        return view('administration.questions.show')->with('question', $question);*/
    }

    /**
     * Show the form for editing the specified Question.
     *
     * @param int $id
     *
     * @return
     */
    public function edit($id)
    {
        /*$question = $this->questionRepository->find($id);

        if (empty($question)) {
            Alert::error('Question not found');

            return redirect(route('administration.questions.index'));
        }

        $certification = $question->certification;

        if(isset($_GET['page'])) {
            $page = $_GET['page'];
        }
        else{
            $page = '';
        }

        return view('template.administration.questions.edit',compact('page','certification','question'));*/
    }

    /**
     * Update the specified Question in storage.
     *
     * @param int $id
     * @param UpdateQuestionRequest $request
     *
     * @return
     */
    public function update($id, UpdateQuestionRequest $request)
    {
        $question = $this->questionRepository->find($id);

        if (empty($question)) {
            Alert::error('Question not found');

            return redirect(route('administration.questions.index'));
        }

        $input = $request->all();

        $input['contenu'] = str_replace('true','false',$input['contenu']);

        $input['contenu'] = str_replace('input type="text"','input type="hidden"',$input['contenu']);

        $question = $this->questionRepository->update($input, $id);

        Alert::success('Question updated successfully.');

        $certification = $question->certification;

        $page = '';

        if (isset($input['page'])){
            $page = $input['page'];
        }


        return redirect(route('admin.certifications.questions.display', ['page' => $page,'search' => '','certification_id'=>$certification->id]));

    }

    /**
     * Remove the specified Question from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return
     */
    public function destroy($id)
    {
        /*$question = $this->questionRepository->find($id);

        if (empty($question)) {
            Alert::error('Question not found');

            return redirect(route('administration.questions.index'));
        }

        $this->questionRepository->delete($id);

        Alert::success('Question deleted successfully.');

        return redirect(route('administration.questions.index'));*/
    }


    //END CRUD

    public function editCustom(Request $request)
    {
        $id = $request->question_id;
        $page = $request->page;

        $question = $this->questionRepository->find($id);

        if (empty($question)) {
            Alert::error('Question not found');

            return redirect(route('administration.questions.index'));
        }

        $certification = $question->certification;


        return view('template.administration.questions.edit',compact('page','certification','question'));
    }


}
