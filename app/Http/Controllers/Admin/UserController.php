<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::query()->get();
        return view('admin.pages.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $data = $request->getSanitized();
        if ($request->has('image')) {
            $data['image'] = $this->upload_file($request->file('image'), ('users'));
        }
        User::create($data);
        session()->flash('success', 'Item created  sucessfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $roles = Role::all();
        $permissions = Permission::all();
        return view('admin.pages.user.show', compact('user', 'roles', 'permissions'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {

        return view('admin.pages.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {
        $data = $request->getSanitized();
        if ($request->hasFile('image')) {
            @unlink($user->image);
            $data['image'] = $this->upload_file($request->file('image'), ('users'));
        }
        $user->update($data);
        session()->flash('success', 'Item updated  sucessfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if ($user->hasRole('admin')) {
            return back()->with('success', 'you are admin.');
        }
        @unlink($user->image);
        $user->delete();
        session()->flash('success', 'Item Deleted  sucessfully');
        return redirect()->back();
    }

    public function status_update($id)
    {
        $user = User::findOrfail($id);
        $user->status == 1 ? $user->status = 0 : $user->status = 1;
        $user->save();
        session()->flash('success', 'Item status updated  sucessfully');
        return redirect()->back();
    }


    public function assignRole(Request $request, User $user)
    {
        if ($user->hasRole($request->role)) {
            return back()->with('error', 'Role exists.');
        }

        $user->assignRole($request->role);
        return back()->with('success', 'Role assigned.');
    }

    public function removeRole(User $user, Role $role)
    {
        if ($user->hasRole($role)) {
            $user->removeRole($role);
            return back()->with('success', 'Role removed.');
        }

        return back()->with('error', 'Role not exists.');
    }

    public function givePermission(Request $request, User $user)
    {
        if ($user->hasPermissionTo($request->permission)) {
            return back()->with('error', 'Permission exists.');
        }
        $user->givePermissionTo($request->permission);
        return back()->with('success', 'Permission added.');
    }

    public function revokePermission(User $user, Permission $permission)
    {
        if ($user->hasPermissionTo($permission)) {
            $user->revokePermissionTo($permission);
            return back()->with('success', 'Permission revoked.');
        }
        return back()->with('error', 'Permission does not exists.');
    }
}
