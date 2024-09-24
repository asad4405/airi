<?php

namespace App\Http\Controllers;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    function index()
    {
        $permissions = Permission::all();
        $roles = Role::all();
        $users = User::all();
        return view('backend.role.index',[
            'permissions' => $permissions,
            'roles' => $roles,
            'users' => $users,
        ]);
    }

    function permission_store(Request $request)
    {
        Permission::create(['name' => $request->permission_name]);
        return back()->with('permission_success', 'Permission Added Success!');
    }

    function role_store(Request $request)
    {
        $role = Role::create(['name' => $request->role_name]);
        $role->givePermissionTo($request->permission);
        return back()->with('role_success', 'Role Added Success!');
    }

    function role_assign(Request $request)
    {
        $user = User::find($request->user_id);
        $user->assignRole($request->role);

        return back()->with('assign_role', 'Role Assigned Success!');
    }

    function edit($id)
    {
        $role = Role::find($id);
        $permissions = Permission::all();
        return view('backend.role.edit',compact('role','permissions'));
    }

    function update(Request $request, $id)
    {
        $role = Role::find($id);
        $role->syncPermissions($request->permission);
        return redirect()->route('role.index')->with('success','Role Updated Success!');
    }

    function delete($id){
        DB::table('role_has_permissions')->where('role_id', $id)->delete();
        Role::find($id)->delete();
        return redirect()->route('role.index')->with('success', 'Role Deleted Success!');
    }
}
