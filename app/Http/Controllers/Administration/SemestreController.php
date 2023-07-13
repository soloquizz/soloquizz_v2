<?php

namespace App\Http\Controllers\Administration;

use App\Http\Requests\Administration\CreateSemestreRequest;
use App\Http\Requests\Administration\UpdateSemestreRequest;
use App\Repositories\Administration\SemestreRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use RealRashid\SweetAlert\Facades\Alert;
use Response;

class SemestreController extends AppBaseController
{
    /** @var SemestreRepository $semestreRepository*/
    private $semestreRepository;

    public function __construct(SemestreRepository $semestreRepo)
    {
        $this->semestreRepository = $semestreRepo;
    }

    /**
     * Display a listing of the Semestre.
     *
     * @param Request $request
     *
     * @return
     */
    public function index(Request $request)
    {
        $semestres = $this->semestreRepository->all();

        return view('template.administration.semestres.index',compact('semestres'));
    }

    /**
     * Show the form for creating a new Semestre.
     *
     * @return
     */
    public function create()
    {
        return view('administration.semestres.create');
    }

    /**
     * Store a newly created Semestre in storage.
     *
     * @param CreateSemestreRequest $request
     *
     * @return
     */
    public function store(CreateSemestreRequest $request)
    {
        $input = $request->all();

        $semestre = $this->semestreRepository->create($input);

        Alert::success('Succés','Semestre saved successfully.');

        return redirect(route('admin.semestres.index'));
    }

    /**
     * Display the specified Semestre.
     *
     * @param int $id
     *
     * @return
     */
    public function show($id)
    {
        /*$semestre = $this->semestreRepository->find($id);

        if (empty($semestre)) {
            Flash::error('Semestre not found');

            return redirect(route('administration.semestres.index'));
        }

        return view('administration.semestres.show')->with('semestre', $semestre);*/
    }

    /**
     * Show the form for editing the specified Semestre.
     *
     * @param int $id
     *
     * @return
     */
    public function edit($id)
    {
        $semestre = $this->semestreRepository->find($id);

        if (empty($semestre)) {
            Alert::error('Error','Semestre not found');

            return redirect(route('administration.semestres.index'));
        }

        return view('template.administration.semestres.edit',compact('semestre'));
    }

    /**
     * Update the specified Semestre in storage.
     *
     * @param int $id
     * @param UpdateSemestreRequest $request
     *
     * @return
     */
    public function update($id, UpdateSemestreRequest $request)
    {
        $semestre = $this->semestreRepository->find($id);

        if (empty($semestre)) {
            Alert::error('Error','Semestre not found');

            return redirect(route('administration.semestres.index'));
        }

        $semestre = $this->semestreRepository->update($request->all(), $id);

        Alert::success('Sucés','Semestre updated successfully.');

        return redirect(route('admin.semestres.index'));
    }

    /**
     * Remove the specified Semestre from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return
     */
    public function destroy($id)
    {
        $semestre = $this->semestreRepository->find($id);

        if (empty($semestre)) {
            Alert::error('Error','Semestre not found');

            return redirect(route('administration.semestres.index'));
        }

        $this->semestreRepository->delete($id);

        Alert::success('Succès','Semestre deleted successfully.');

        return redirect(route('admin.semestres.index'));
    }
}
