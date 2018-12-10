<?php

namespace App\Http\Controllers\Access;

use App\Http\Controllers\Controller;
use App\Models\User;
// use App\Http\Requests;
use Hash;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
// use Datatables;
use Yajra\Datatables\Datatables;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        // $users = User::find(auth()->user()->id);
        // $role_checked = $users->hasAnyRole(['superadmin', 'administrator']);
        // dd($role_checked);

        $users = User::all();

        if ($request->ajax()) {
            return Datatables::of($users)
                ->editColumn('id', function ($users) {
                    return $users->id;
                })
                ->editColumn('first_name', function ($users) {
                    return $users->first_name . ' ' . $users->last_name;
                })
                ->editColumn('active', function ($users) {
                    return '<span class="badge badge-' . ($users->active ? 'success' : 'warning') . '">' . ($users->active ? 'Active' : 'Deactivated') . '</span>';
                })
                ->editColumn('updated_at', function ($users) {
                    return $users->updated_at->diffForHumans();
                })
            // ->editColumn('roles', function ($users) {
            //     return '<span class="badge badge-success">' . ucwords($users->roles()->pluck('name')->implode(' ')) . '</span>';

            // })
                ->addColumn('roles', function ($users) {

                    $roles = "";
                    foreach ($users->getRoleNames() as $role) {
                        $roles .= '<span class="badge badge-info">' . ucwords($role) . ' </span> <br>';
                    }

                    return $roles;

                })
                ->addColumn('actions', 'access.includes.partials.user-action')
                ->rawColumns(['actions', 'active', 'roles'])
                ->make(true);
        }

        return view('access.user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();

        return view('access.user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request    $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'roles' => 'required',
            'active' => 'required',
        ]);

        $requestData = $request->except('roles');
        $roles = $request->roles;
        $password = $request->password;

        // If password was accidentally passed in already hashed, try not to double hash it
        // if (
        //     (\strlen($password) === 60 && preg_match('/^\$2y\$/', $password)) ||
        //     (\strlen($password) === 95 && preg_match('/^\$argon2i\$/', $password))
        // ) {
        //     $hash = $password;
        // } else {
        //     $hash = Hash::make($password);
        // }

        // dd($roles, $requestData);
        $user = User::create($requestData);

        $user->assignRole($roles);

        $user->password = setPasswordEncryption($password);
        $user->save();

        return redirect('access/user')->with('flash_success', 'User added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int                         $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('access.user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int                         $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();

        $selected = $user->getRoleNames();
        // dd($selected);
        // $selected_roles = Role::where()

        return view('access.user.edit', compact('user', 'roles', 'selected'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request    $request
     * @param  int                         $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'roles' => 'required',
            'active' => 'required',
        ]);

        $requestData = $request->except('password');

        $user = User::findOrFail($id);
        $user->update($requestData);

        $user->syncRoles($request->roles);

        return redirect('access/user')->with('flash_success', 'User updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int                         $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);

        return redirect('access/user')->with('flash_message', 'User deleted!');
    }

    public function reactivate($id)
    {
        $user = User::find($id);
        $user->active = true;
        $user->save();

        return redirect('access/user')->with('flash_message', 'User reactivated!');
    }

    public function deactivate($id)
    {
        $user = User::find($id);
        $user->active = false;
        $user->save();

        return redirect('access/user')->with('flash_message', 'User deactivated!');
    }

    public function password($id)
    {
        $user = User::find($id);

        return view('access.user.change-password', compact('user'));
    }

    public function resetPassword(Request $request, $id)
    {

        $user = User::find($id);

        $password = $request->password;
        $password_confirmation = $request->password_confirmation;

        if ($password == $password_confirmation) {
            if (Hash::check($password, $user->password)) {
                return redirect()->back()->with('flash_danger', 'Password same! Please use difference password for a new one.');
            } else {
                $user->password = setPasswordEncryption($password);
                $user->save();

                return redirect('access/user')->with('flash_success', 'Password successfully changed!');
            }

        }

        return redirect()->back()->with('flash_danger', 'Password and password confirmation mismatch!');

    }
}
