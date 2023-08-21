<?php

namespace App\Http\Controllers\Administration;

use App\Http\Requests\Administration\CreateEnseignantRequest;
use App\Http\Requests\Administration\UpdateEnseignantRequest;
use App\Mail\CompteInfos;
use App\Repositories\Administration\EnseignantRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Administration\Role;
use App\Repositories\Administration\UserRepository;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;
use Response;

class EnseignantController extends AppBaseController
{
    /** @var EnseignantRepository $enseignantRepository*/
    private $enseignantRepository;
    private $userRepository;

    public function __construct(EnseignantRepository $enseignantRepo,
                                UserRepository $userRepo)
    {
        $this->enseignantRepository = $enseignantRepo;
        $this->userRepository = $userRepo;
    }

    /**
     * Display a listing of the Enseignant.
     *
     * @param Request $request
     *
     * @return
     */
    public function index(Request $request)
    {
        $enseignants = $this->enseignantRepository->all();

        return view('template.administration.enseignants.index',compact('enseignants'));
    }

    /**
     * Show the form for creating a new Enseignant.
     *
     * @return
     */
    public function create()
    {
        return view('administration.enseignants.create');
    }

    /**
     * Store a newly created Enseignant in storage.
     *
     * @param CreateEnseignantRequest $request
     *
     * @return
     */
    public function store(CreateEnseignantRequest $request)
    {
        $input = $request->all();

        $enseignant = $this->enseignantRepository->create($input);

        if (isset($input['email'])){
            $userData['email'] = $input['email'];
            $generatePassword = substr(uniqid(),5);
            $userData['password'] = bcrypt($generatePassword);
            $userData['personne_type'] = 'Enseignant';
            $userData['personne_id'] = $enseignant->id;
            $user = $this->userRepository->create($userData);
        }

        $compteData['prenom'] = $input['prenom'];
        $compteData['nom'] = $input['nom'];
        $compteData['profile'] = 'Enseignant';
        $compteData['email'] = $input['email'];
        $compteData['password'] = $generatePassword;

        //Envoie des crédentials par mail
        Mail::to($user)->send(new CompteInfos($compteData));

        Alert::success('Succés','Enseignant saved successfully.');

        return redirect(route('admin.enseignants.index'));
    }

    /**
     * Display the specified Enseignant.
     *
     * @param int $id
     *
     * @return
     */
    public function show($id)
    {
        $enseignant = $this->enseignantRepository->find($id);
        $roles=Role::all();

        if (empty($enseignant)) {
            Alert::error('Succés','Enseignant not found');

            return redirect(route('administration.enseignants.index'));
        }

        return view('template.administration.enseignants.show',compact('enseignant','roles'));
    }

    /**
     * Show the form for editing the specified Enseignant.
     *
     * @param int $id
     *
     * @return
     */
    public function edit($id)
    {
        $enseignant = $this->enseignantRepository->find($id);

        if (empty($enseignant)) {
            Alert::error('Error','Enseignant not found');

            return redirect(route('administration.enseignants.index'));
        }

        return view('template.administration.enseignants.edit',compact('enseignant'));
    }

    /**
     * Update the specified Enseignant in storage.
     *
     * @param int $id
     * @param UpdateEnseignantRequest $request
     *
     * @return
     */
    public function update($id, UpdateEnseignantRequest $request)
    {
        $enseignant = $this->enseignantRepository->find($id);

        if (empty($enseignant)) {
            Alert::error('Error','Enseignant not found');

            return redirect(route('administration.enseignants.index'));
        }

        $enseignant = $this->enseignantRepository->update($request->all(), $id);

        Alert::success('Succés','Enseignant updated successfully.');

        return redirect(route('admin.enseignants.index'));
    }

    /**
     * Remove the specified Enseignant from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return
     */
    public function destroy($id)
    {
        /*$enseignant = $this->enseignantRepository->find($id);

        if (empty($enseignant)) {
            Alert::error('Error','Enseignant not found');

            return redirect(route('administration.enseignants.index'));
        }

        $this->enseignantRepository->delete($id);

        Alert::success('Succés','Enseignant deleted successfully.');

        return redirect(route('administration.enseignants.index'));*/
    }
}
