<?php

namespace App\Http\Controllers\Access;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perPage = 25;
        $role = Role::latest()->paginate($perPage);

        $user = auth()->user();
        $check = $user->getRoleNames();

        return view('access.role.index', compact('role', 'check'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();

        return view('access.role.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'permissions' => 'required',
        ]);

        $requestData = $request->except('permissions');
        $permissions = $request->permissions;

        $role = Role::create($requestData);

        $role->givePermissionTo($permissions);

        return redirect('access/role')->with('flash_message', 'Role added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::findOrFail($id);

        return view('access.role.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = Role::findOrFail($id);
        $permissions = Permission::all();
        $role_has_permission = DB::table('role_has_permissions')->where('role_id', $roles->id)->get();

        // dd($role_has_permission);

        return view('access.role.edit', compact('roles', 'permissions', 'role_has_permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'permissions' => 'required',
        ]);

        $requestData = $request->except('permissions');
        $permissions = $request->permissions;

        $role = Role::findOrFail($id);
        $role->update($requestData);

        $role->syncPermissions($permissions);

        return redirect('access/role')->with('flash_message', 'Role updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Role::destroy($id);

        return redirect('access/role')->with('flash_message', 'Role deleted!');
    }
}
