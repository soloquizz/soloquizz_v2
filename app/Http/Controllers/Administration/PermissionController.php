<?php

namespace App\Http\Controllers\Administration;

use App\Http\Requests\Administration\CreatePermissionRequest;
use App\Http\Requests\Administration\UpdatePermissionRequest;
use App\Repositories\Administration\PermissionRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Administration\Permission;
use App\Models\Administration\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Response;

class PermissionController extends AppBaseController
{
    /** @var PermissionRepository $permissionRepository*/
    private $permissionRepository;

    public function __construct(PermissionRepository $permissionRepo)
    {
        $this->permissionRepository = $permissionRepo;
    }

    /**
     * Display a listing of the Permission.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $permissions = $this->permissionRepository->all();

        return view('template.administration.permissions.index')
            ->with('permissions', $permissions);
    }

    /**
     * Show the form for creating a new Permission.
     *
     * @return Response
     */
    public function create()
    {
        return view('template.administration.permissions.create');
    }

    /**
     * Store a newly created Permission in storage.
     *
     * @param CreatePermissionRequest $request
     *
     * @return Response
     */
    public function store(CreatePermissionRequest $request)
    {
        $input = $request->all();

        $permission = $this->permissionRepository->create(
           [ 'name'=>$input['name'],
            'guard_name'=>'web',
            'espace'=>$input['espace']
            ]
        );

        Alert::success('Permission saved successfully.');

        return redirect()->back();
    }

    /**
     * Display the specified Permission.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $permission = $this->permissionRepository->find($id);

        if (empty($permission)) {
            Alert::error('Permission not found');

            return redirect(route('admin.permissions.index'));
        }

        return view('template.administration.permissions.show')->with('permission', $permission);
    }

    /**
     * Show the form for editing the specified Permission.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $permission = $this->permissionRepository->find($id);

        if (empty($permission)) {
            Alert::error('Permission not found');

            return redirect(route('admin.permissions.index'));
        }

        return view('template.administration.permissions.edit')->with('permission', $permission);
    }

    /**
     * Update the specified Permission in storage.
     *
     * @param int $id
     * @param UpdatePermissionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePermissionRequest $request)
    {
        $permission = $this->permissionRepository->find($id);

        if (empty($permission)) {
            Alert::error('Permission not found');

            return redirect(route('admin.permissions.index'));
        }

        $permission = $this->permissionRepository->update($request->all(), $id);

        Alert::success('Permission updated successfully.');

        return redirect()->back();
    }

    /**
     * Remove the specified Permission from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $permission = $this->permissionRepository->find($id);

        if (empty($permission)) {
            Alert::error('Permission not found');

            return redirect(route('admin.permissions.index'));
        }

        $this->permissionRepository->delete($id);

        Alert::success('Permission deleted successfully.');

        return redirect()->back();
    }

    public function addPermissionToUser(Request $request){
    
        $user=User::find($request->model_id);
        $permission=Permission::find($request->permission_id);

        $user->givePermissionTo($permission);

        return redirect()->back();
        
    }

    public function revokePermissionToUser(Request $request){
    
        $user=User::find($request->model_id);
        $permission=Permission::find($request->permission_id);

        $user->revokePermissionTo($permission);

        return redirect()->back();
        
    }
}
