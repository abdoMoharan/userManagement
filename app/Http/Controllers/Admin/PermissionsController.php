<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class PermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = Permission::all();
        return view('admin.pages.permission.index' ,compact('permissions'));
    }


    public function create()
    {
        return view('admin.pages.permission.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate(['name' => 'required']);

        Permission::create($validated);

        return to_route('admin.permissions.index')->with('success', 'Permission created.');
    }

    public function edit(Permission $permission)
    {
        $roles = Role::all();
        return view('admin.pages.permission.edit', compact('permission', 'roles'));
    }

    public function update(Request $request, Permission $permission)
    {
        $validated = $request->validate(['name' => 'required']);
        $permission->update($validated);

        return to_route('admin.permissions.index')->with('success', 'Permission updated.');
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();

        return back()->with('success', 'Permission deleted.');
    }

    public function assignRole(Request $request, Permission $permission)
    {
        if ($permission->hasRole($request->role)) {
            return back()->with('error', 'Role exists.');
        }

        $permission->assignRole($request->role);
        return back()->with('success', 'Role assigned.');
    }

    public function removeRole(Permission $permission, Role $role)
    {
        if ($permission->hasRole($role)) {
            $permission->removeRole($role);
            return back()->with('success', 'Role removed.');
        }

        return back()->with('error', 'Role not exists.');
    }
}
