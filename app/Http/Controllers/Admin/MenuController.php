<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Menu;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::with('parent')
            ->latest()
            ->get();

        return view(
            'admin.menus.index',
            compact('menus')
        );
    }

    public function create()
    {
        $parents = Menu::where('parent_id',0)->get();

        return view(
            'admin.menus.create',
            compact('parents')
        );
    }

    public function store(Request $request)
    {
        $request->validate([

            'name' => 'required',

        ]);

        Menu::create([

            'name' => $request->name,

            'url' => $request->url,

            'parent_id' => $request->parent_id ?? 0,

            'sort_order' => $request->sort_order ?? 0,

            'status' => $request->status,

        ]);

        return redirect()
            ->route('menus.index')
            ->with('success','Menu Created Successfully');
    }

    public function edit(Menu $menu)
    {
        $parents = Menu::where('parent_id',0)
            ->where('id','!=',$menu->id)
            ->get();

        return view(
            'admin.menus.edit',
            compact('menu','parents')
        );
    }

    public function update(Request $request, Menu $menu)
    {
        $request->validate([

            'name' => 'required',

        ]);

        $menu->update([

            'name' => $request->name,

            'url' => $request->url,

            'parent_id' => $request->parent_id ?? 0,

            'sort_order' => $request->sort_order ?? 0,

            'status' => $request->status,

        ]);

        return redirect()
            ->route('menus.index')
            ->with('success','Menu Updated Successfully');
    }

    public function destroy(Menu $menu)
    {
        $menu->delete();

        return redirect()
            ->route('menus.index')
            ->with('success','Menu Deleted Successfully');
    }
}