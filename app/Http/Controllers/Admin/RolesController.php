<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $roles = Role::whereNotIn('name', ['admin'])->get();
        return view('admin.pages.roles.index', compact('roles'));
    }

    public function create()
    {
        return view('admin.pages.roles.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate(['name' => ['required', 'min:3']]);

        Role::create($validated);

        return to_route('admin.roles.index')->with('success', 'Role Created successfully.');
    }

    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('admin.pages.roles.edit', compact('role', 'permissions'));
    }

    public function update(Request $request, Role $role)
    {
        $validated = $request->validate(['name' => ['required', 'min:3']]);
        $role->update($validated);

        return to_route('admin.roles.index')->with('message', 'Role Updated successfully.');
    }

    public function destroy(Role $role)
    {
        $role->delete();

        return back()->with('message', 'Role deleted.');
    }

    public function givePermission(Request $request, Role $role)
    {
        if($role->hasPermissionTo($request->permission)){
            return back()->with('error', 'Permission exists.');
        }
        $role->givePermissionTo($request->permission);
        return back()->with('success', 'Permission added.');
    }

    public function revokePermission(Role $role, Permission $permission)
    {
        if($role->hasPermissionTo($permission)){
            $role->revokePermissionTo($permission);
            return back()->with('success', 'Permission revoked.');
        }
        return back()->with('error', 'Permission not exists.');
    }
}
