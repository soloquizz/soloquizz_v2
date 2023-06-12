<?php

namespace App\Http\Controllers\Administration;

use App\Http\Requests\Administration\CreateClasseRequest;
use App\Http\Requests\Administration\UpdateClasseRequest;
use App\Repositories\Administration\ClasseRepository;
use App\Http\Controllers\AppBaseController;
use App\Repositories\Administration\DomaineRepository;
use App\Repositories\Administration\NiveauRepository;
use App\Repositories\Administration\ParcoursRepository;
use Illuminate\Http\Request;
use Flash;
use RealRashid\SweetAlert\Facades\Alert;
use Response;

class ClasseController extends AppBaseController
{
    /** @var ClasseRepository $classeRepository*/
    private $classeRepository;
    private $niveauRepository;
    private $parcourRepository;
    private $domaineRepository;

    public function __construct(ClasseRepository $classeRepo, NiveauRepository $niveauRepo, ParcoursRepository $parcourRepo, DomaineRepository $domaineRepo)
    {
        $this->classeRepository = $classeRepo;
        $this->niveauRepository = $niveauRepo;
        $this->parcourRepository = $parcourRepo;
        $this->domaineRepository = $domaineRepo;
    }

    /**
     * Display a listing of the Classe.
     *
     * @param Request $request
     *
     * @return
     */
    public function index(Request $request)
    {
        $classes = $this->classeRepository->all();

        $parcours = $this->parcourRepository->all();
        $niveaux = $this->niveauRepository->all();
        $domaines = $this->domaineRepository->all();

        return view('template.administration.classes.index',compact('classes','niveaux','domaines','parcours'));
    }

    /**
     * Show the form for creating a new Classe.
     *
     * @return
     */
    public function create()
    {
        //return view('administration.classes.create');
    }

    /**
     * Store a newly created Classe in storage.
     *
     * @param CreateClasseRequest $request
     *
     * @return
     */
    public function store(CreateClasseRequest $request)
    {
        $input = $request->all();

        $classe = $this->classeRepository->create($input);

        Alert::success('Succés','Classe saved successfully.');

        return redirect(route('admin.classes.index'));
    }

    /**
     * Display the specified Classe.
     *
     * @param int $id
     *
     * @return
     */
    public function show($id)
    {
        $classe = $this->classeRepository->find($id);

        if (empty($classe)) {
            Alert::error('Succés','Classe not found');

            return redirect(route('administration.classes.index'));
        }

        return view('administration.classes.show')->with('classe', $classe);
    }

    /**
     * Show the form for editing the specified Classe.
     *
     * @param int $id
     *
     * @return
     */
    public function edit($id)
    {
        $classe = $this->classeRepository->find($id);

        if (empty($classe)) {
            Alert::error('Succés','Classe not found');

            return redirect(route('administration.classes.index'));
        }

        $parcours = $this->parcourRepository->all();
        $niveaux = $this->niveauRepository->all();
        $domaines = $this->domaineRepository->all();

        return view('template.administration.classes.edit',compact('niveaux','domaines','parcours','classe'));
    }

    /**
     * Update the specified Classe in storage.
     *
     * @param int $id
     * @param UpdateClasseRequest $request
     *
     * @return
     */
    public function update($id, UpdateClasseRequest $request)
    {
        $classe = $this->classeRepository->find($id);

        if (empty($classe)) {
            Alert::error('Succés','Classe not found');

            return redirect(route('administration.classes.index'));
        }

        $classe = $this->classeRepository->update($request->all(), $id);

        Alert::success('Succés','Classe updated successfully.');

        return redirect(route('admin.classes.index'));
    }

    /**
     * Remove the specified Classe from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return
     */
    public function destroy($id)
    {
        /*$classe = $this->classeRepository->find($id);

        if (empty($classe)) {
            Flash::error('Classe not found');

            return redirect(route('administration.classes.index'));
        }

        $this->classeRepository->delete($id);

        Flash::success('Classe deleted successfully.');

        return redirect(route('administration.classes.index'));*/
    }
}
