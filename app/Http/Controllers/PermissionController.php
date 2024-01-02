<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response['permissions'] = Permission::all();
        $data['roles'] = Role::all();

        return view('pages.permission.add-new-permission')->with($response);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'permission' => 'required|unique:permissions,name|max:255',
        ]);

        $permission = Permission::create(['name' => $request->permission]);
        $permission = Permission::create(['guard_name' => $request->permission]);

        return redirect()->route('permissions.index')->with('success', 'Permission added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // $permission = Permission::find($id);

        // if (!$permission) {
        //     return redirect()->route('permissions.index')->with('error', 'Permission not found.');
        // }

        // $permission->delete();

        // return redirect()->route('permissions.index')->with('success', 'Permission deleted successfully.');
    }
}
