<?php

namespace App\Http\Controllers\Administration;

use App\Http\Requests\Administration\CreateCandidatsRequest;
use App\Http\Requests\Administration\UpdateCandidatsRequest;
use App\Imports\CandidatImport;
use App\Repositories\Administration\CandidatsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;
use Response;

class CandidatsController extends AppBaseController
{
    /** @var CandidatsRepository $candidatsRepository*/
    private $candidatsRepository;

    public function __construct(CandidatsRepository $candidatsRepo)
    {
        $this->candidatsRepository = $candidatsRepo;
    }

    /**
     * Display a listing of the Candidats.
     *
     * @param Request $request
     *
     * @return
     */
    public function index(Request $request)
    {
        $candidats = $this->candidatsRepository->all();

        return view('template.administration.candidats.index')
            ->with('candidats', $candidats);
    }

    /**
     * Show the form for creating a new Candidats.
     *
     * @return Response
     */
    public function create()
    {
        return view('administration.candidats.create');
    }

    /**
     * Store a newly created Candidats in storage.
     *
     * @param CreateCandidatsRequest $request
     *
     * @return Response
     */
    public function store(CreateCandidatsRequest $request)
    {
        $input = $request->all();

        $candidats = $this->candidatsRepository->create($input);

        Flash::success('Candidats saved successfully.');

        return redirect(route('administration.candidats.index'));
    }

    /**
     * Display the specified Candidats.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $candidats = $this->candidatsRepository->find($id);

        if (empty($candidats)) {
            Flash::error('Candidats not found');

            return redirect(route('administration.candidats.index'));
        }

        return view('administration.candidats.show')->with('candidats', $candidats);
    }

    /**
     * Show the form for editing the specified Candidats.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $candidats = $this->candidatsRepository->find($id);

        if (empty($candidats)) {
            Flash::error('Candidats not found');

            return redirect(route('administration.candidats.index'));
        }

        return view('administration.candidats.edit')->with('candidats', $candidats);
    }

    /**
     * Update the specified Candidats in storage.
     *
     * @param int $id
     * @param UpdateCandidatsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCandidatsRequest $request)
    {
        $candidats = $this->candidatsRepository->find($id);

        if (empty($candidats)) {
            Flash::error('Candidats not found');

            return redirect(route('administration.candidats.index'));
        }

        $candidats = $this->candidatsRepository->update($request->all(), $id);

        Flash::success('Candidats updated successfully.');

        return redirect(route('administration.candidats.index'));
    }

    /**
     * Remove the specified Candidats from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $candidats = $this->candidatsRepository->find($id);

        if (empty($candidats)) {
            Flash::error('Candidats not found');

            return redirect(route('administration.candidats.index'));
        }

        $this->candidatsRepository->delete($id);

        Flash::success('Candidats deleted successfully.');

        return redirect(route('administration.candidats.index'));
    }


    public function upload(Request $request)
    {
        Excel::import($imports = new CandidatImport(), $request->fichier,null,\Maatwebsite\Excel\Excel::XLSX);
        Alert::success('Succès','Impoirtation effectué avec succès');
        return back();
    }
}
