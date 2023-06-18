<?php

namespace App\Http\Controllers\Administration;

use App\Http\Requests\Administration\CreateEditeurRequest;
use App\Http\Requests\Administration\UpdateEditeurRequest;
use App\Repositories\Administration\EditeurRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Response;

class EditeurController extends AppBaseController
{
    /** @var EditeurRepository $editeurRepository*/
    private $editeurRepository;

    public function __construct(EditeurRepository $editeurRepo)
    {
        $this->editeurRepository = $editeurRepo;
    }

    /**
     * Display a listing of the Editeur.
     *
     * @param Request $request
     *
     * @return
     */
    public function index(Request $request)
    {
        $editeurs = $this->editeurRepository->all();

        return view('template.administration.editeurs.index')
            ->with('editeurs', $editeurs);
    }

    /**
     * Show the form for creating a new Editeur.
     *
     * @return
     */
    public function create()
    {
        //return view('administration.editeurs.create');
    }

    /**
     * Store a newly created Editeur in storage.
     *
     * @param CreateEditeurRequest $request
     *
     * @return
     */
    public function store(CreateEditeurRequest $request)
    {
        $input = $request->all();

        $logo = $request->logo;

        $fileName = $input['nom'] . '.' . $logo->getClientOriginalExtension();
        Storage::delete('logo_editeur/' . $fileName);
        $logo->storeAs('logo_editeur', $fileName);

        $input['logo'] = $fileName;

        $editeur = $this->editeurRepository->create($input);

        Alert::success('Succés','Editeur saved successfully.');

        return redirect(route('admin.editeurs.index'));
    }

    /**
     * Display the specified Editeur.
     *
     * @param int $id
     *
     * @return
     */
    public function show($id)
    {
        $editeur = $this->editeurRepository->find($id);

        if (empty($editeur)) {
            Flash::error('Editeur not found');

            return redirect(route('administration.editeurs.index'));
        }

        return view('administration.editeurs.show')->with('editeur', $editeur);
    }

    /**
     * Show the form for editing the specified Editeur.
     *
     * @param int $id
     *
     * @return
     */
    public function edit($id)
    {
        $editeur = $this->editeurRepository->find($id);

        if (empty($editeur)) {
            Flash::error('Editeur not found');

            return redirect(route('administration.editeurs.index'));
        }

        return view('template.administration.editeurs.edit')->with('editeur', $editeur);
    }

    /**
     * Update the specified Editeur in storage.
     *
     * @param int $id
     * @param UpdateEditeurRequest $request
     *
     * @return
     */
    public function update($id, UpdateEditeurRequest $request)
    {
        $editeur = $this->editeurRepository->find($id);

        if (empty($editeur)) {
            Alert::error('Error','Editeur not found');

            return redirect(route('administration.editeurs.index'));
        }

        $input = $request->all();


        $logo = $request->logo;

        if (isset($logo)){
            $fileName = $input['nom'] . '.' . $logo->getClientOriginalExtension();
            Storage::delete('public/logo_editeur/' . $editeur->logo);
            $logo->storeAs('public/logo_editeur', $fileName);
            $input['logo'] = $fileName;
        }


        $editeur = $this->editeurRepository->update($input, $id);

        Alert::success('Succés','Editeur updated successfully.');

        return redirect(route('admin.editeurs.index'));
    }

    /**
     * Remove the specified Editeur from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return
     */
    public function destroy($id)
    {
        $editeur = $this->editeurRepository->find($id);

        if (empty($editeur)) {
            Flash::error('Editeur not found');

            return redirect(route('administration.editeurs.index'));
        }

        $this->editeurRepository->delete($id);

        Flash::success('Editeur deleted successfully.');

        return redirect(route('administration.editeurs.index'));
    }
}
