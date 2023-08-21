<?php

namespace App\Http\Controllers\Administration;

use App\Http\Requests\Administration\CreateRoleRequest;
use App\Http\Requests\Administration\UpdateRoleRequest;
use App\Repositories\Administration\RoleRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Administration\Role;
use App\Models\Administration\User;
use Illuminate\Http\Request;
use Flash;
use Laracasts\Flash\Flash as FlashFlash;
use RealRashid\SweetAlert\Facades\Alert;
use Response;

class RoleController extends AppBaseController
{
    /** @var RoleRepository $roleRepository*/
    private $roleRepository;

    public function __construct(RoleRepository $roleRepo)
    {
        $this->roleRepository = $roleRepo;
    }

    /**
     * Display a listing of the Role.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $roles = $this->roleRepository->all();

        return view('template.administration.roles.index')
            ->with('roles', $roles);
    }

    /**
     * Show the form for creating a new Role.
     *
     * @return Response
     */
    public function create()
    {
        return view('administration.roles.create');
    }

    /**
     * Store a newly created Role in storage.
     *
     * @param CreateRoleRequest $request
     *
     * @return Response
     */
    public function store(CreateRoleRequest $request)
    {
        $input = $request->all();

        $role = $this->roleRepository->create([
            'name'=>$input['name'],
            'guard_name'=>'web'
        ]);

        Alert::success('Role saved successfully.');

        return redirect(route('template.administration.roles.index'));
    }

    /**
     * Display the specified Role.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $role = $this->roleRepository->find($id);

        if (empty($role)) {
            Alert::error('Role not found');

            return redirect(route('template.administration.roles.index'));
        }

        return view('template.administration.roles.show')->with('role', $role);
    }

    /**
     * Show the form for editing the specified Role.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $role = $this->roleRepository->find($id);

        if (empty($role)) {
            Alert::error('Role not found');

            return redirect(route('admin.roles.index'));
        }

        return view('template.administration.roles.edit')->with('role', $role);
    }

    /**
     * Update the specified Role in storage.
     *
     * @param int $id
     * @param UpdateRoleRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRoleRequest $request)
    {
        $role = $this->roleRepository->find($id);

        if (empty($role)) {
            Alert::error('Role not found');

            return redirect(route('admin.roles.index'));
        }

        $role = $this->roleRepository->update($request->all(), $id);

        Alert::success('Role updated successfully.');

        return redirect(route('admin.role&permission'));
    }

    /**
     * Remove the specified Role from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $role = $this->roleRepository->find($id);

        if (empty($role)) {
            Alert::error('Role not found');

            return redirect(route('admin.roles.index'));
        }

        $this->roleRepository->delete($id);

        Alert::success('Role deleted successfully.');

        return redirect(route('admin.roles.index'));
    }

    public function addRole(Request $request){
    
        $user=User::find($request->model_id);
        $role=Role::find($request->role_id);

        $user->assignRole($role);

        return redirect()->back();
        
    }
}
