<?php

namespace App\Http\Controllers\Administration;

use App\Http\Requests\Administration\CreateCoursRequest;
use App\Http\Requests\Administration\UpdateCoursRequest;
use App\Models\Administration\Enseignant;
use App\Models\Administration\EnseignantCours;
use App\Repositories\Administration\AnneeScolaireRepository;
use App\Repositories\Administration\CoursRepository;
use App\Http\Controllers\AppBaseController;
use App\Repositories\Administration\EnseignantRepository;
use App\Repositories\Administration\SemestreRepository;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Response;

class CoursController extends AppBaseController
{
    /** @var CoursRepository $coursRepository*/
    private $coursRepository;
    private $semestreRepository;
    private $anneeScolaireRepository;
    private $enseignantRepository;

    public function __construct(CoursRepository $coursRepo, SemestreRepository $semestreRepo,
                                AnneeScolaireRepository $anneeScolaireRepo, EnseignantRepository $enseignantRepo
    )
    {
        $this->coursRepository = $coursRepo;
        $this->semestreRepository = $semestreRepo;
        $this->anneeScolaireRepository = $anneeScolaireRepo;
        $this->enseignantRepository = $enseignantRepo;
    }

    /**
     * Display a listing of the Cours.
     *
     * @param Request $request
     *
     * @return
     */
    public function index(Request $request)
    {
        /*$cours = $this->coursRepository->all();

        return view('administration.cours.index')
            ->with('cours', $cours);*/
    }

    /**
     * Show the form for creating a new Cours.
     *
     * @return
     */
    public function create()
    {
        ///return view('administration.cours.create');
    }

    /**
     * Store a newly created Cours in storage.
     *
     * @param CreateCoursRequest $request
     *
     * @return
     */
    public function store(CreateCoursRequest $request)
    {
        $input = $request->all();

        $image = $request->image;

        $fileName = str_replace(' ','_',$input['nom']) . '.' . $image->getClientOriginalExtension();
        Storage::delete('public/image_cours/' . $fileName);
        $image->storeAs('public/image_cours', $fileName);

        $input['image'] = $fileName;

        $cours = $this->coursRepository->create($input);

        Alert::success('Succés','Cours saved successfully.');

        return redirect(route('admin.classes.show',$input['classe_id']));
    }

    /**
     * Display the specified Cours.
     *
     * @param int $id
     *
     * @return
     */
    public function show($id)
    {
        $cours = $this->coursRepository->find($id);

        if (empty($cours)) {
            Alert::error('Error','Cours not found');

            return redirect(route('administration.cours.index'));
        }

        $annee_scolaires = $this->anneeScolaireRepository->all()->filter(function ($annee_scolaire){
            return $annee_scolaire->actif;
        });

        $enseignants = $this->enseignantRepository->all();

        return view('template.administration.cours.show',compact('cours','annee_scolaires','enseignants'));
    }

    /**
     * Show the form for editing the specified Cours.
     *
     * @param int $id
     *
     * @return
     */
    public function edit($id)
    {
        $cours = $this->coursRepository->find($id);

        if (empty($cours)) {
            Alert::error('Érror','Cours not found');

            return redirect(route('admin.cours.index'));
        }

        $semestres = $this->semestreRepository->all();

        return view('template.administration.cours.edit',compact('cours','semestres'));
    }

    /**
     * Update the specified Cours in storage.
     *
     * @param int $id
     * @param UpdateCoursRequest $request
     *
     * @return
     */
    public function update($id, UpdateCoursRequest $request)
    {
        $cours = $this->coursRepository->find($id);

        if (empty($cours)) {
            Alert::error('Érror','Cours not found');

            return redirect(route('admin.cours.index'));
        }

        $input = $request->all();

        $image = $request->image;

        if (isset($image)){
            $fileName = str_replace(' ','_',$input['nom']) . '.' . $image->getClientOriginalExtension();
            Storage::delete('public/image_cours/' . $cours->image);
            $image->storeAs('public/image_cours', $fileName);
            $input['image'] = $fileName;
        }

        $cours = $this->coursRepository->update($input, $id);

        Alert::success('Succés','Cours updated successfully.');

        return redirect(route('admin.classes.show',$input['classe_id']));
    }

    /**
     * Remove the specified Cours from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return
     */
    public function destroy($id)
    {
        /*$cours = $this->coursRepository->find($id);

        if (empty($cours)) {
            Alert::error('Érror','Cours not found');

            return redirect(route('administration.cours.index'));
        }

        $this->coursRepository->delete($id);

        Alert::success('Succés','Cours deleted successfully.');

        return redirect(route('administration.cours.index'));*/
    }


    public function enseignant_store(Request $request)
    {
        $input = $request->all();

        $enseignant = Enseignant::find($input['enseignant_id']);

        $cours = $this->coursRepository->find($input['cours_id']);

        if (empty($enseignant) or empty($cours))
        {
            Alert::error('Error','Enseignant non trouvé');
            return redirect()->back();
        }

        EnseignantCours::updateOrCreate(
            ['cours_id' => $input['cours_id'], 'annee_scolaire_id' => $input['annee_scolaire_id']],
            ['enseignant_id' => $input['enseignant_id']]
        );

        $cours->update(['enseignant_id'=>$enseignant->id]);

        Alert::success('Succés','Cours Affecté avec succés.');

        return redirect(route('admin.classes.show',$cours->classe_id));
    }

}
