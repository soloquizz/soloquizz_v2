<?php

namespace App\Http\Controllers\Administration;

use App\Http\Requests\Administration\CreateEtudiantRequest;
use App\Http\Requests\Administration\UpdateEtudiantRequest;
use App\Imports\EtudiantImport;
use App\Mail\CompteInfos;
use App\Models\Administration\Inscription;
use App\Repositories\Administration\AnneeScolaireRepository;
use App\Repositories\Administration\ClasseRepository;
use App\Repositories\Administration\EtudiantRepository;
use App\Http\Controllers\AppBaseController;
use App\Repositories\Administration\UserRepository;
use Illuminate\Http\Request;
use Flash;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;
use Response;
use Illuminate\Support\Facades\Mail;

class EtudiantController extends AppBaseController
{
    /** @var EtudiantRepository $etudiantRepository*/
    private $etudiantRepository;
    private $userRepository;
    private $anneeScolaireRepository;
    private $classeRepository;

    public function __construct(EtudiantRepository $etudiantRepo,
                                UserRepository $userRepo,
                                AnneeScolaireRepository $anneeScolaireRepo,
                                ClasseRepository $classeRepo
    )
    {
        $this->etudiantRepository = $etudiantRepo;
        $this->userRepository = $userRepo;
        $this->anneeScolaireRepository = $anneeScolaireRepo;
        $this->classeRepository = $classeRepo;
    }

    /**
     * Display a listing of the Etudiant.
     *
     * @param Request $request
     *
     * @return
     */
    public function index(Request $request)
    {
        $etudiants = $this->etudiantRepository->all();

        $annee_scolaires = $this->anneeScolaireRepository->all();
        $classes = $this->classeRepository->all();

        return view('template.administration.etudiants.index',compact('annee_scolaires','classes','etudiants'));
    }

    /**
     * Show the form for creating a new Etudiant.
     *
     * @return
     */
    public function create()
    {
        //return view('administration.etudiants.create');
    }

    /**
     * Store a newly created Etudiant in storage.
     *
     * @param CreateEtudiantRequest $request
     *
     * @return
     */
    public function store(CreateEtudiantRequest $request)
    {
        $input = $request->all();

        $etudiant = $this->etudiantRepository->create($input);

        if (isset($input['email'])){
            $userData['email'] = $input['email'];
            $generatePassword = substr(uniqid(),5);
            $userData['password'] = bcrypt($generatePassword);
            $userData['personne_type'] = 'Etudiant';
            $userData['personne_id'] = $etudiant->id;
            $user = $this->userRepository->create($userData);
        }

        //Add Inscription
        $inscriptionData['classe_id'] = $input['classe_id'];
        $inscriptionData['annee_scolaire_id'] = $input['annee_scolaire_id'];
        $inscriptionData['etudiant_id'] = $etudiant->id;
        Inscription::create($inscriptionData);

        $compteData['prenom'] = $input['prenom'];
        $compteData['nom'] = $input['nom'];
        $compteData['profile'] = 'Étudiant';
        $compteData['email'] =$input['email'];
        $compteData['password'] = $generatePassword;

        //Envoie des crédentials par mail
        Mail::to($user)->send(new CompteInfos($compteData));

        Alert::success('Succés','Etudiant saved successfully.');

        return redirect(route('admin.etudiants.index'));
    }

    /**
     * Display the specified Etudiant.
     *
     * @param int $id
     *
     * @return
     */
    public function show($id)
    {
        $etudiant = $this->etudiantRepository->find($id);

        if (empty($etudiant)) {
            Alert::error('Error','Etudiant not found');

            return redirect(route('administration.etudiants.index'));
        }

        $annee_scolaires = $this->anneeScolaireRepository->all()->filter(function ($annee_scolaire){
            return $annee_scolaire->actif;
        });
        $classes = $this->classeRepository->all();

        return view('template.administration.etudiants.show',compact('etudiant','annee_scolaires','classes'));
    }

    /**
     * Show the form for editing the specified Etudiant.
     *
     * @param int $id
     *
     * @return
     */
    public function edit($id)
    {
        $etudiant = $this->etudiantRepository->find($id);

        if (empty($etudiant)) {
            Alert::error('Succés','Etudiant not found');

            return redirect(route('admin.etudiants.index'));
        }

        return view('template.administration.etudiants.edit')->with('etudiant', $etudiant);
    }

    /**
     * Update the specified Etudiant in storage.
     *
     * @param int $id
     * @param UpdateEtudiantRequest $request
     *
     * @return
     */
    public function update($id, UpdateEtudiantRequest $request)
    {
        $etudiant = $this->etudiantRepository->find($id);

        $input = $request->all();

        if (empty($etudiant)) {
            Alert::error('Error','Etudiant not found');

            return redirect(route('administration.etudiants.index'));
        }

        $etudiant = $this->etudiantRepository->update($input, $id);

        //Update user
        $user = $etudiant->user();

        if (isset($input['email'])){
            $userData['email'] = $input['email'];
            $this->userRepository->update($userData,$user->id);
        }

        Alert::success('Succés','Etudiant updated successfully.');

        return redirect(route('admin.etudiants.index'));
    }

    /**
     * Remove the specified Etudiant from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return
     */
    public function destroy($id)
    {
        $etudiant = $this->etudiantRepository->find($id);

        if (empty($etudiant)) {
            Flash::error('Etudiant not found');

            return redirect(route('administration.etudiants.index'));
        }

        $this->etudiantRepository->delete($id);

        Flash::success('Etudiant deleted successfully.');

        return redirect(route('administration.etudiants.index'));
    }


    public function addInscription(Request $request)
    {
        $input = $request->all();
        Inscription::create($input);
        Alert::success('Succés','Inscription saved successfully.');
        return redirect()->back();
    }

    public function editInscription($id_inscription)
    {
        $inscription = Inscription::find($id_inscription);
        if (empty($inscription)){
            Alert::error('Error','Inscription not found.');
            return redirect()->back();
        }

        $annee_scolaires = $this->anneeScolaireRepository->all()->filter(function ($annee_scolaire){
            return $annee_scolaire->actif;
        });
        $classes = $this->classeRepository->all();
        $etudiant = $inscription->etudiant;

        return view('template.administration.etudiants.edit_inscription',compact('annee_scolaires','classes','inscription','etudiant'));
    }

    public function updateInscription(Request $request)
    {
        $input = $request->all();
        $inscription = Inscription::find($input['inscription_id']);

        if (empty($inscription))
        {
            Alert::error('Error','Inscription not found');
            return redirect()->back();
        }

        $inscription->update($input);
        Alert::success('Succés','Inscription mise à jour avec succés');
        return redirect(route('admin.etudiants.show',$input['etudiant_id']));

    }

    public function import(Request $request)
    {
        /*$request->validate(
            [
                'fichier' => 'required|file|mimes:xlsx,xls,csv|max:1000'
            ]
        );
        $input = $request->all();
        Excel::import($import = new EtudiantImport($input),$request->fichier);*/
    }


}
