<?php

namespace App\Http\Controllers\Administration;

use App\Http\Requests\Administration\CreateDomaineRequest;
use App\Http\Requests\Administration\UpdateDomaineRequest;
use App\Repositories\Administration\DomaineRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use RealRashid\SweetAlert\Facades\Alert;
use Response;

class DomaineController extends AppBaseController
{
    /** @var DomaineRepository $domaineRepository*/
    private $domaineRepository;

    public function __construct(DomaineRepository $domaineRepo)
    {
        $this->domaineRepository = $domaineRepo;
    }

    /**
     * Display a listing of the Domaine.
     *
     * @param Request $request
     *
     * @return
     */
    public function index(Request $request)
    {
        $domaines = $this->domaineRepository->all();

        return view('template.administration.domaines.index')
            ->with('domaines', $domaines);
    }

    /**
     * Show the form for creating a new Domaine.
     *
     * @return
     */
    public function create()
    {
        //return view('administration.domaines.create');
    }

    /**
     * Store a newly created Domaine in storage.
     *
     * @param CreateDomaineRequest $request
     *
     * @return
     */
    public function store(CreateDomaineRequest $request)
    {
        $input = $request->all();

        $domaine = $this->domaineRepository->create($input);

        Alert::success('Succés','Domaine saved successfully.');

        return redirect(route('admin.domaines.index'));
    }

    /**
     * Display the specified Domaine.
     *
     * @param int $id
     *
     * @return
     */
    public function show($id)
    {
        $domaine = $this->domaineRepository->find($id);

        if (empty($domaine)) {
            Alert::error('Succés','Domaine not found');

            return redirect(route('administration.domaines.index'));
        }

        return view('administration.domaines.show')->with('domaine', $domaine);
    }

    /**
     * Show the form for editing the specified Domaine.
     *
     * @param int $id
     *
     * @return
     */
    public function edit($id)
    {
        $domaine = $this->domaineRepository->find($id);

        if (empty($domaine)) {
            Alert::error('Succés','Domaine not found');

            return redirect(route('administration.domaines.index'));
        }

        return view('template.administration.domaines.edit')->with('domaine', $domaine);
    }

    /**
     * Update the specified Domaine in storage.
     *
     * @param int $id
     * @param UpdateDomaineRequest $request
     *
     * @return
     */
    public function update($id, UpdateDomaineRequest $request)
    {
        $domaine = $this->domaineRepository->find($id);

        if (empty($domaine)) {
            Alert::error('Succés','Domaine not found');

            return redirect(route('admin.domaines.index'));
        }

        $domaine = $this->domaineRepository->update($request->all(), $id);

        Alert::success('Succés','Domaine updated successfully.');

        return redirect(route('admin.domaines.index'));
    }

    /**
     * Remove the specified Domaine from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return
     */
    public function destroy($id)
    {
        /*$domaine = $this->domaineRepository->find($id);

        if (empty($domaine)) {
            Flash::error('Domaine not found');

            return redirect(route('administration.domaines.index'));
        }

        $this->domaineRepository->delete($id);

        Flash::success('Domaine deleted successfully.');

        return redirect(route('administration.domaines.index'));*/
    }
}
