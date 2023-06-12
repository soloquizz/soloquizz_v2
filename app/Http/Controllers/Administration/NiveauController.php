<?php

namespace App\Http\Controllers\Administration;

use App\Http\Requests\Administration\CreateNiveauRequest;
use App\Http\Requests\Administration\UpdateNiveauRequest;
use App\Repositories\Administration\NiveauRepository;
use App\Http\Controllers\AppBaseController;
use App\Repositories\Administration\ParcoursRepository;
use Illuminate\Http\Request;
use Flash;
use RealRashid\SweetAlert\Facades\Alert;
use Response;

class NiveauController extends AppBaseController
{
    /** @var NiveauRepository $niveauRepository*/
    private $niveauRepository;
    private $parcourRepositopry;

    public function __construct(NiveauRepository $niveauRepo, ParcoursRepository $parcourRepo)
    {
        $this->niveauRepository = $niveauRepo;
        $this->parcourRepositopry = $parcourRepo;
    }

    /**
     * Display a listing of the Niveau.
     *
     * @param Request $request
     *
     * @return
     */
    public function index(Request $request)
    {
        $niveaux = $this->niveauRepository->all();

        $parcours = $this->parcourRepositopry->all();

        return view('template.administration.niveaux.index',compact('niveaux','parcours'));
    }

    /**
     * Show the form for creating a new Niveau.
     *
     * @return
     */
    public function create()
    {
        //return view('administration.niveaux.create');
    }

    /**
     * Store a newly created Niveau in storage.
     *
     * @param CreateNiveauRequest $request
     *
     * @return
     */
    public function store(CreateNiveauRequest $request)
    {
        $input = $request->all();

        $niveau = $this->niveauRepository->create($input);

        Alert::success('Succés','Niveau saved successfully.');

        return redirect(route('admin.niveaux.index'));
    }

    /**
     * Display the specified Niveau.
     *
     * @param int $id
     *
     * @return
     */
    public function show($id)
    {
        $niveau = $this->niveauRepository->find($id);

        if (empty($niveau)) {
            Flash::error('Niveau not found');

            return redirect(route('administration.niveaux.index'));
        }

        return view('administration.niveaux.show')->with('niveaux', $niveau);
    }

    /**
     * Show the form for editing the specified Niveau.
     *
     * @param int $id
     *
     * @return
     */
    public function edit($id)
    {
        $niveau = $this->niveauRepository->find($id);

        if (empty($niveau)) {
            Flash::error('Niveau not found');

            return redirect(route('administration.niveaux.index'));
        }

        $parcours = $this->parcourRepositopry->all();

        return view('template.administration.niveaux.edit',compact('parcours','niveau'));
    }

    /**
     * Update the specified Niveau in storage.
     *
     * @param int $id
     * @param UpdateNiveauRequest $request
     *
     * @return
     */
    public function update($id, UpdateNiveauRequest $request)
    {
        $niveau = $this->niveauRepository->find($id);

        if (empty($niveau)) {
            Alert::error('Error','Niveau not found');

            return redirect(route('administration.niveaux.index'));
        }

        $niveau = $this->niveauRepository->update($request->all(), $id);

        Alert::success('Succés','Niveau updated successfully.');

        return redirect(route('admin.niveaux.index'));
    }

    /**
     * Remove the specified Niveau from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return
     */
    public function destroy($id)
    {
        /*$niveaux = $this->niveauRepository->find($id);

        if (empty($niveaux)) {
            Flash::error('Niveau not found');

            return redirect(route('administration.niveaux.index'));
        }

        $this->niveauRepository->delete($id);

        Flash::success('Niveau deleted successfully.');

        return redirect(route('administration.niveaux.index'));*/
    }
}
