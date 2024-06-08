<?php

namespace App\Http\Controllers\Administration;

use App\Http\Requests\Administration\CreateHasRoleRequest;
use App\Http\Requests\Administration\UpdateHasRoleRequest;
use App\Repositories\Administration\HasRoleRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Administration\Role;
use Illuminate\Http\Request;
use Flash;
use Response;

class HasRoleController extends AppBaseController
{
    /** @var HasRoleRepository $hasRoleRepository*/
    private $hasRoleRepository;

    public function __construct(HasRoleRepository $hasRoleRepo)
    {
        $this->hasRoleRepository = $hasRoleRepo;
    }

    /**
     * Display a listing of the HasRole.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $hasRoles = $this->hasRoleRepository->all();

        return view('administration.has_roles.index')
            ->with('hasRoles', $hasRoles);
    }

    /**
     * Show the form for creating a new HasRole.
     *
     * @return Response
     */
    public function create()
    {
        return view('administration.has_roles.create');
    }

    /**
     * Store a newly created HasRole in storage.
     *
     * @param CreateHasRoleRequest $request
     *
     * @return Response
     */
    public function store(CreateHasRoleRequest $request,$id)
    {
        $role=Role::find($id);
        
        $input = $request->all();

        $hasRole = $this->hasRoleRepository->create([
            'role_id'=>$role->id,
            'model_id'=>auth
        ]);

        Flash::success('Has Role saved successfully.');

        return redirect(route('administration.hasRoles.index'));
    }

    /**
     * Display the specified HasRole.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $hasRole = $this->hasRoleRepository->find($id);

        if (empty($hasRole)) {
            Flash::error('Has Role not found');

            return redirect(route('administration.hasRoles.index'));
        }

        return view('administration.has_roles.show')->with('hasRole', $hasRole);
    }

    /**
     * Show the form for editing the specified HasRole.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $hasRole = $this->hasRoleRepository->find($id);

        if (empty($hasRole)) {
            Flash::error('Has Role not found');

            return redirect(route('administration.hasRoles.index'));
        }

        return view('administration.has_roles.edit')->with('hasRole', $hasRole);
    }

    /**
     * Update the specified HasRole in storage.
     *
     * @param int $id
     * @param UpdateHasRoleRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateHasRoleRequest $request)
    {
        $hasRole = $this->hasRoleRepository->find($id);

        if (empty($hasRole)) {
            Flash::error('Has Role not found');

            return redirect(route('administration.hasRoles.index'));
        }

        $hasRole = $this->hasRoleRepository->update($request->all(), $id);

        Flash::success('Has Role updated successfully.');

        return redirect(route('administration.hasRoles.index'));
    }

    /**
     * Remove the specified HasRole from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $hasRole = $this->hasRoleRepository->find($id);

        if (empty($hasRole)) {
            Flash::error('Has Role not found');

            return redirect(route('administration.hasRoles.index'));
        }

        $this->hasRoleRepository->delete($id);

        Flash::success('Has Role deleted successfully.');

        return redirect(route('administration.hasRoles.index'));
    }
}
