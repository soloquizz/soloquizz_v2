<?php

namespace App\Http\Controllers\Administration;

use App\Http\Requests\Administration\CreateAnneeScolaireRequest;
use App\Http\Requests\Administration\UpdateAnneeScolaireRequest;
use App\Repositories\Administration\AnneeScolaireRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use RealRashid\SweetAlert\Facades\Alert;
use Response;

class AnneeScolaireController extends AppBaseController
{
    /** @var AnneeScolaireRepository $anneeScolaireRepository*/
    private $anneeScolaireRepository;

    public function __construct(AnneeScolaireRepository $anneeScolaireRepo)
    {
        $this->anneeScolaireRepository = $anneeScolaireRepo;
    }

    /**
     * Display a listing of the AnneeScolaire.
     *
     * @param Request $request
     *
     * @return
     */
    public function index(Request $request)
    {
        $anneeScolaires = $this->anneeScolaireRepository->all();

        return view('template.administration.annee_scolaires.index')
            ->with('anneeScolaires', $anneeScolaires);
    }

    /**
     * Show the form for creating a new AnneeScolaire.
     *
     * @return
     */
    public function create()
    {
        //return view('administration.annee_scolaires.create');
    }

    /**
     * Store a newly created AnneeScolaire in storage.
     *
     * @param CreateAnneeScolaireRequest $request
     *
     * @return
     */
    public function store(CreateAnneeScolaireRequest $request)
    {
        $input = $request->all();

        $anneeScolaire = $this->anneeScolaireRepository->create($input);

        Alert::success('Succés','Annee Scolaire saved successfully.');

        return redirect(route('admin.anneeScolaires.index'));
    }

    /**
     * Display the specified AnneeScolaire.
     *
     * @param int $id
     *
     * @return
     */
    public function show($id)
    {
        $anneeScolaire = $this->anneeScolaireRepository->find($id);

        if (empty($anneeScolaire)) {
            Flash::error('Annee Scolaire not found');

            return redirect(route('administration.anneeScolaires.index'));
        }

        return view('administration.annee_scolaires.show')->with('anneeScolaire', $anneeScolaire);
    }

    /**
     * Show the form for editing the specified AnneeScolaire.
     *
     * @param int $id
     *
     * @return
     */
    public function edit($id)
    {
        $anneeScolaire = $this->anneeScolaireRepository->find($id);

        if (empty($anneeScolaire)) {
            Alert::error('Error','Annee Scolaire not found');

            return redirect(route('administration.anneeScolaires.index'));
        }

        return view('template.administration.annee_scolaires.edit')->with('anneeScolaire', $anneeScolaire);
    }

    /**
     * Update the specified AnneeScolaire in storage.
     *
     * @param int $id
     * @param UpdateAnneeScolaireRequest $request
     *
     * @return
     */
    public function update($id, UpdateAnneeScolaireRequest $request)
    {
        $anneeScolaire = $this->anneeScolaireRepository->find($id);

        if (empty($anneeScolaire)) {
            Alert::error('Error','Annee Scolaire not found');

            return redirect(route('administration.anneeScolaires.index'));
        }

        $anneeScolaire = $this->anneeScolaireRepository->update($request->all(), $id);

        Alert::success('Succés','Annee Scolaire updated successfully.');

        return redirect(route('admin.anneeScolaires.index'));
    }

    /**
     * Remove the specified AnneeScolaire from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return
     */
    public function destroy($id)
    {
        $anneeScolaire = $this->anneeScolaireRepository->find($id);

        if (empty($anneeScolaire)) {
            Flash::error('Annee Scolaire not found');

            return redirect(route('administration.anneeScolaires.index'));
        }

        $this->anneeScolaireRepository->delete($id);

        Flash::success('Annee Scolaire deleted successfully.');

        return redirect(route('administration.anneeScolaires.index'));
    }
}
