<?php

namespace App\Http\Controllers\Administration;

use App\Http\Requests\Administration\CreateAdministrateurRequest;
use App\Http\Requests\Administration\UpdateAdministrateurRequest;
use App\Mail\CompteInfos;
use App\Repositories\Administration\AdministrateurRepository;
use App\Http\Controllers\AppBaseController;
use App\Repositories\Administration\UserRepository;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;
use Response;

class AdministrateurController extends AppBaseController
{
    /** @var AdministrateurRepository $administrateurRepository*/
    private $administrateurRepository;
    private $userRepository;

    public function __construct(AdministrateurRepository $administrateurRepo,
                                 UserRepository $userRepo
    )
    {
        $this->administrateurRepository = $administrateurRepo;
        $this->userRepository = $userRepo;
    }

    /**
     * Display a listing of the Administrateur.
     *
     * @param Request $request
     *
     * @return
     */
    public function index(Request $request)
    {
        $administrateurs = $this->administrateurRepository->all();

        return view('template.administration.administrateurs.index',compact('administrateurs'));
    }

    /**
     * Show the form for creating a new Administrateur.
     *
     * @return
     */
    public function create()
    {
        return view('administration.administrateurs.create');
    }

    /**
     * Store a newly created Administrateur in storage.
     *
     * @param CreateAdministrateurRequest $request
     *
     * @return
     */
    public function store(CreateAdministrateurRequest $request)
    {
        $input = $request->all();

        $administrateur = $this->administrateurRepository->create($input);

        if (isset($input['email'])){
            $userData['email'] = $input['email'];
            $generatePassword = substr(uniqid(),5);
            $userData['password'] = bcrypt($generatePassword);
            $userData['personne_type'] = 'Administrateur';
            $userData['personne_id'] = $administrateur->id;
            $user = $this->userRepository->create($userData);
        }

        $compteData['email'] = $generatePassword;
        $compteData['password'] = $generatePassword;

        //Envoie des crédentials par mail
        Mail::to($user)->send(new CompteInfos($compteData));

        Alert::success('Administrateur saved successfully.');

        return redirect(route('admin.administrateurs.index'));
    }

    /**
     * Display the specified Administrateur.
     *
     * @param int $id
     *
     * @return
     */
    public function show($id)
    {
        $administrateur = $this->administrateurRepository->find($id);

        if (empty($administrateur)) {
            Alert::error('Administrateur not found');

            return redirect(route('admin.administrateurs.index'));
        }

        return view('template.administration.administrateurs.show')->with('administrateur', $administrateur);
    }

    /**
     * Show the form for editing the specified Administrateur.
     *
     * @param int $id
     *
     * @return
     */
    public function edit($id)
    {
        $administrateur = $this->administrateurRepository->find($id);

        if (empty($administrateur)) {
            Alert::error('Administrateur not found');

            return redirect(route('admin.administrateurs.index'));
        }

        return view('template.administration.administrateurs.edit',compact('administrateur'));
    }

    /**
     * Update the specified Administrateur in storage.
     *
     * @param int $id
     * @param UpdateAdministrateurRequest $request
     *
     * @return
     */
    public function update($id, UpdateAdministrateurRequest $request)
    {
        $administrateur = $this->administrateurRepository->find($id);


        if (empty($administrateur)) {
            Alert::error('Administrateur not found');

            return redirect(route('admin.administrateurs.index'));
        }

        $administrateur = $this->administrateurRepository->update($request->all(), $id);

        Alert::success('Administrateur updated successfully.');

        return redirect(route('admin.administrateurs.index'));
    }

    /**
     * Remove the specified Administrateur from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return
     */
    public function destroy($id)
    {
        $administrateur = $this->administrateurRepository->find($id);

        if (empty($administrateur)) {
            Alert::error('Administrateur not found');

            return redirect(route('admin.administrateurs.index'));
        }

        $this->administrateurRepository->delete($id);

        Alert::success('Administrateur deleted successfully.');

        return redirect(route('admin.administrateurs.index'));
    }
}
