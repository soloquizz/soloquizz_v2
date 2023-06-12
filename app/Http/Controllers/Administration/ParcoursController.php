<?php

namespace App\Http\Controllers\Administration;

use App\Http\Requests\Administration\CreateParcoursRequest;
use App\Http\Requests\Administration\UpdateParcoursRequest;
use App\Repositories\Administration\ParcoursRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use RealRashid\SweetAlert\Facades\Alert;
use Response;

class ParcoursController extends AppBaseController
{
    /** @var ParcoursRepository $parcoursRepository*/
    private $parcoursRepository;

    public function __construct(ParcoursRepository $parcoursRepo)
    {
        $this->parcoursRepository = $parcoursRepo;
    }

    /**
     * Display a listing of the Parcours.
     *
     * @param Request $request
     *
     * @return
     */
    public function index(Request $request)
    {
        $parcours = $this->parcoursRepository->all();

        return view('template.administration.parcours.index')
            ->with('parcours', $parcours);
    }

    /**
     * Show the form for creating a new Parcours.
     *
     * @return
     */
    public function create()
    {
        //return view('administration.parcours.create');
    }

    /**
     * Store a newly created Parcours in storage.
     *
     * @param CreateParcoursRequest $request
     *
     * @return
     */
    public function store(CreateParcoursRequest $request)
    {
        $input = $request->all();

        $parcours = $this->parcoursRepository->create($input);

        Alert::success('Succés','Parcours saved successfully.');

        return redirect(route('admin.parcours.index'));
    }

    /**
     * Display the specified Parcours.
     *
     * @param int $id
     *
     * @return
     */
    public function show($id)
    {
        /*$parcours = $this->parcoursRepository->find($id);

        if (empty($parcours)) {
            Flash::error('Parcours not found');

            return redirect(route('administration.parcours.index'));
        }

        return view('administration.parcours.show')->with('parcours', $parcours);*/
    }

    /**
     * Show the form for editing the specified Parcours.
     *
     * @param int $id
     *
     * @return
     */
    public function edit($id)
    {
        $parcours = $this->parcoursRepository->find($id);

        if (empty($parcours)) {
            Flash::error('Parcours not found');

            return redirect(route('admin.parcours.index'));
        }

        return view('template.administration.parcours.edit')->with('parcours', $parcours);
    }

    /**
     * Update the specified Parcours in storage.
     *
     * @param int $id
     * @param UpdateParcoursRequest $request
     *
     * @return
     */
    public function update($id, UpdateParcoursRequest $request)
    {
        $parcours = $this->parcoursRepository->find($id);

        if (empty($parcours)) {
            Flash::error('Parcours not found');

            return redirect(route('administration.parcours.index'));
        }

        $parcours = $this->parcoursRepository->update($request->all(), $id);

        Alert::success('Succés','Parcours updated successfully.');

        return redirect(route('admin.parcours.index'));
    }

    /**
     * Remove the specified Parcours from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return
     */
    public function destroy($id)
    {
        $parcours = $this->parcoursRepository->find($id);

        if (empty($parcours)) {
            Flash::error('Parcours not found');

            return redirect(route('administration.parcours.index'));
        }

        $this->parcoursRepository->delete($id);

        Flash::success('Parcours deleted successfully.');

        return redirect(route('administration.parcours.index'));
    }
}
