<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::latest()->get();

        return view(
            'admin.permissions.index',
            compact('permissions')
        );
    }

    public function create()
    {
        return view('admin.permissions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:permissions'
        ]);

        Permission::create([
            'name' => $request->name
        ]);

        return redirect()
            ->route('permissions.index')
            ->with('success','Permission Created Successfully');
    }

    public function edit(Permission $permission)
    {
        return view(
            'admin.permissions.edit',
            compact('permission')
        );
    }

    public function update(Request $request, Permission $permission)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $permission->update([
            'name' => $request->name
        ]);

        return redirect()
            ->route('permissions.index')
            ->with('success','Permission Updated Successfully');
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();

        return redirect()
            ->route('permissions.index')
            ->with('success','Permission Deleted Successfully');
    }
}