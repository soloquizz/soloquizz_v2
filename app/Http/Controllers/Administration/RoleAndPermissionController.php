<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Controller;
use App\Models\Administration\Role;
use Illuminate\Http\Request;

class RoleAndPermissionController extends Controller
{
    public function index(){
        $roles=Role::all();
       
        return view('template.administration.roleEtPermission.index',compact('roles'));
    }
}
