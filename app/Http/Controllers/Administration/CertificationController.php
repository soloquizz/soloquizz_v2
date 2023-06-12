<?php

namespace App\Http\Controllers\Administration;

use App\Http\Requests\Administration\CreateCertificationRequest;
use App\Http\Requests\Administration\UpdateCertificationRequest;
use App\Repositories\Administration\CertificationRepository;
use App\Http\Controllers\AppBaseController;
use App\Repositories\Administration\EditeurRepository;
use App\Repositories\Administration\NiveauRepository;
use Illuminate\Http\Request;
use Flash;
use RealRashid\SweetAlert\Facades\Alert;
use Response;

class CertificationController extends AppBaseController
{
    /** @var CertificationRepository $certificationRepository*/
    private $certificationRepository;
    private $niveauRepository;
    private $editeurRepository;

    public function __construct(CertificationRepository $certificationRepo, NiveauRepository $niveauRepo, EditeurRepository $editeurRepo)
    {
        $this->certificationRepository = $certificationRepo;
        $this->niveauRepository = $niveauRepo;
        $this->editeurRepository = $editeurRepo;
    }

    /**
     * Display a listing of the Certification.
     *
     * @param Request $request
     *
     * @return
     */
    public function index(Request $request)
    {
        $certifications = $this->certificationRepository->all();

        $niveaux = $this->niveauRepository->all();
        $editeurs = $this->editeurRepository->all();

        return view('template.administration.certifications.index',compact('niveaux','editeurs','certifications'));
    }

    /**
     * Show the form for creating a new Certification.
     *
     * @return
     */
    public function create()
    {
        //return view('administration.certifications.create');
    }

    /**
     * Store a newly created Certification in storage.
     *
     * @param CreateCertificationRequest $request
     *
     * @return
     */
    public function store(CreateCertificationRequest $request)
    {
        $input = $request->all();

        $certification = $this->certificationRepository->create($input);

        Alert::success('Succés','Certification saved successfully.');

        return redirect(route('admin.certifications.index'));
    }

    /**
     * Display the specified Certification.
     *
     * @param int $id
     *
     * @return
     */
    public function show($id)
    {
        $certification = $this->certificationRepository->find($id);

        if (empty($certification)) {
            Alert::error('Error','Certification not found');

            return redirect(route('admin.certifications.index'));
        }

        return view('template.administration.certifications.show')->with('certification', $certification);
    }

    /**
     * Show the form for editing the specified Certification.
     *
     * @param int $id
     *
     * @return
     */
    public function edit($id)
    {
        $certification = $this->certificationRepository->find($id);

        if (empty($certification)) {
            Alert::error('Error','Certification not found');

            return redirect(route('admin.certifications.index'));
        }

        $niveaux = $this->niveauRepository->all();
        $editeurs = $this->editeurRepository->all();

        return view('template.administration.certifications.edit',compact('niveaux','editeurs','certification'));
    }

    /**
     * Update the specified Certification in storage.
     *
     * @param int $id
     * @param UpdateCertificationRequest $request
     *
     * @return
     */
    public function update($id, UpdateCertificationRequest $request)
    {
        $certification = $this->certificationRepository->find($id);

        if (empty($certification)) {
            Alert::error('Error','Certification not found');

            return redirect(route('admin.certifications.index'));
        }

        $certification = $this->certificationRepository->update($request->all(), $id);

        Alert::success('Succés','Certification updated successfully.');

        return redirect(route('admin.certifications.index'));
    }

    /**
     * Remove the specified Certification from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return
     */
    public function destroy($id)
    {
        /*$certification = $this->certificationRepository->find($id);

        if (empty($certification)) {
            Flash::error('Certification not found');

            return redirect(route('administration.certifications.index'));
        }

        $this->certificationRepository->delete($id);

        Flash::success('Certification deleted successfully.');

        return redirect(route('administration.certifications.index'));*/
    }
}
