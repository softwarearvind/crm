<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::latest()->get();

        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::all();

        return view(
            'admin.roles.create',
            compact('permissions')
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles'
        ]);

        $role = Role::create([
            'name' => $request->name
        ]);

        $role->syncPermissions(
            $request->permissions ?? []
        );

        return redirect()
            ->route('roles.index')
            ->with('success','Role Created Successfully');
    }

    public function edit(Role $role)
    {
        $permissions = Permission::all();

        return view(
            'admin.roles.edit',
            compact('role','permissions')
        );
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $role->update([
            'name' => $request->name
        ]);

        $role->syncPermissions(
            $request->permissions ?? []
        );

        return redirect()
            ->route('roles.index')
            ->with('success','Role Updated Successfully');
    }

    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()
            ->route('roles.index')
            ->with('success','Role Deleted Successfully');
    }
}