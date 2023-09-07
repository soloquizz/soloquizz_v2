<?php

namespace App\Http\Controllers\Administration;

use App\Http\Requests\Administration\CreateCertificationRequest;
use App\Http\Requests\Administration\UpdateCertificationRequest;
use App\Repositories\Administration\CertificationRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Administration\Certification;
use App\Models\Administration\DumpUser;
use App\Repositories\Administration\EditeurRepository;
use App\Repositories\Administration\NiveauRepository;
use App\Repositories\Administration\QuestionRepository;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Response;

class CertificationController extends AppBaseController
{
    /** @var CertificationRepository $certificationRepository*/
    private $certificationRepository;
    private $niveauRepository;
    private $editeurRepository;
    private $questionRepository;

    public function __construct(CertificationRepository $certificationRepo, NiveauRepository $niveauRepo, EditeurRepository $editeurRepo, QuestionRepository $questionRepo)
    {
        $this->certificationRepository = $certificationRepo;
        $this->niveauRepository = $niveauRepo;
        $this->editeurRepository = $editeurRepo;
        $this->questionRepository = $questionRepo;
    }

    /**
     * Display a listing of the Certification.
     *
     * @param Request $request
     *
     * @return
     */
    public function index(Request $request)
    {
        $certifications = $this->certificationRepository->all();

        $niveaux = $this->niveauRepository->all();
        $editeurs = $this->editeurRepository->all();

        return view('template.administration.certifications.index',compact('niveaux','editeurs','certifications'));
    }

    /**
     * Show the form for creating a new Certification.
     *
     * @return
     */
    public function create()
    {
        //return view('administration.certifications.create');
    }

    /**
     * Store a newly created Certification in storage.
     *
     * @param CreateCertificationRequest $request
     *
     * @return
     */
    public function store(CreateCertificationRequest $request)
    {
        $input = $request->all();

        $certification = $this->certificationRepository->create($input);

        Alert::success('Succés','Certification saved successfully.');

        return redirect(route('admin.certifications.index'));
    }

    /**
     * Display the specified Certification.
     *
     * @param int $id
     *
     * @return
     */
    public function show($id, Request $request)
    {
        /*$certification = $this->certificationRepository->find($id);

        if (empty($certification)) {
            Alert::error('Error','Certification not found');

            return redirect(route('admin.certifications.index'));
        }

        $textSearch = $request->search;

        if(isset($textSearch)){
            $questions =$this->certificationRepository->search($certification->id,$textSearch,2);
        }else{
            $questions = $this->certificationRepository->questions($certification->id,2);
        }

        $rank = $questions->firstItem();

        return view('template.administration.certifications.show',compact('questions','certification','rank','textSearch'));*/
    }

    /**
     * Show the form for editing the specified Certification.
     *
     * @param int $id
     *
     * @return
     */
    public function edit($id)
    {
        $certification = $this->certificationRepository->find($id);

        if (empty($certification)) {
            Alert::error('Error','Certification not found');

            return redirect(route('admin.certifications.index'));
        }

        $niveaux = $this->niveauRepository->all();
        $editeurs = $this->editeurRepository->all();

        return view('template.administration.certifications.edit',compact('niveaux','editeurs','certification'));
    }

    /**
     * Update the specified Certification in storage.
     *
     * @param int $id
     * @param UpdateCertificationRequest $request
     *
     * @return
     */
    public function update($id, UpdateCertificationRequest $request)
    {
        $certification = $this->certificationRepository->find($id);

        if (empty($certification)) {
            Alert::error('Error','Certification not found');

            return redirect(route('admin.certifications.index'));
        }

        $certification = $this->certificationRepository->update($request->all(), $id);

        Alert::success('Succés','Certification updated successfully.');

        return redirect(route('admin.certifications.index'));
    }

    /**
     * Remove the specified Certification from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return
     */
    public function destroy($id)
    {
        /*$certification = $this->certificationRepository->find($id);

        if (empty($certification)) {
            Flash::error('Certification not found');

            return redirect(route('administration.certifications.index'));
        }

        $this->certificationRepository->delete($id);

        Flash::success('Certification deleted successfully.');

        return redirect(route('administration.certifications.index'));*/
    }


    //END CRUD

    public function searchQuestions(Request $request)
    {
        $textSearch = $request->search;
        $certif_id = $request->certification_id;
        return redirect(route('admin.certifications.questions.display', ['search' => $textSearch,'certification_id'=>$certif_id]));
    }

    public function questionsDisplay(Request $request)
    {
        $id = $request->certification_id;

        $certification = $this->certificationRepository->find($id);

        if (empty($certification)) {
            Alert::error('Error','Certification not found');

            return redirect(route('admin.certifications.index'));
        }

        $textSearch = $request->search;


        if(isset($textSearch)){
            $questions =$this->certificationRepository->search($certification->id,$textSearch,2);
        }else{
            $questions = $this->certificationRepository->questions($certification->id,2);
        }


        $questions->appends($_GET)->links();
        $rank = $questions->firstItem();

        return view('template.administration.certifications.show',compact('questions','certification','rank','textSearch'));
    }


    public function defineNbreQa(Request $request)
    {
        $input = $request->all();

        $certification = $this->certificationRepository->find($input['certification_id']);

        if ($certification->questions->count() < $input['nbre_qa'] ){
            Alert::error('Error','Le nombre maximal de question par dump doit être inférieur à '.$certification->nbre_qa.' le nombre total de question');
            return redirect()->back();
        }

        $this->certificationRepository->update($input, $input['certification_id']);

        Alert::success('Succés','Nombre de question maximal définie avec succés');

        return redirect(route('admin.certifications.questions.display', ['search' => '','certification_id'=>$input['certification_id']]));
    }

    public function updateS($id){
        $certification=Certification::find($id);
        $certification->statut=1;
        $certification->update();
        Alert::success('Succés','Certification publiée');

         return redirect()->back();
    }

    public function depublier($id){
        $certification=Certification::find($id);
        $certification->statut=0;
        $certification->update();
        Alert::success('Succés','Certification dépubliée');

         return redirect()->back();
    }

    public function listEtudiants($id){
        $certification=Certification::find($id);
        //$dumpUser=DumpUser::where('certification_id',$certification->id)->distinct()->get();
        //dd($dumpUser);
        $dumpUser=DB::table('dump_users')
             ->select(DB::raw('count(dump_id) as dump, sum(score) as score_final,etudiants.nom as etudiant_nom,etudiants.prenom as etudiant_prenom,etudiants.id'))
             ->join('etudiants','dump_users.etudiant_id','=','etudiants.id')
             ->join('certifications','dump_users.certification_id','=','certifications.id')
             ->groupBy('etudiant_nom','etudiant_prenom','etudiants.id')
             ->get();
        return view('template.administration.certifications.list-etudiants',compact('dumpUser','certification'));

    }

    //resultats
    
}
