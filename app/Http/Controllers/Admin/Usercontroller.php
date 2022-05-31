<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Usercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $roles = Role::all();
        $permissions = Permission::all();

        return view ('admin.users.role', compact('user', 'roles','permissions'));
    }
    //***********************************************ROLES********************************* */
    public function assignRole(Request $request, User $user){

        if ($user->hasRole($request->role)){// in the form we select a user
            return back()->with('message', 'Permission already assigned');

        }
        else{
            $user->givePermissionTo($request->role);
            return back()->with('message','Permission assigned');
        }


    }

    public function revokeRole( User $user, Role $role){

        if ($user->hasRole($role)){// in the form we select a user
            $user->removeRole($role);
            return back()->with('message', 'Role removed');

        }
            return back()->with('message', 'Role not assigned');

    }
    //***********************************************ROLES********************************* */
    //***********************************************Permissions********************************* */


    public function givePermission(Request $request, User $user){

        if ($user->hasPermissionTo($request->permission)){// in the form we select a permission
            return back()->with('message', 'Permission already assigned');

        }
        else{
            $user->givePermissionTo($request->permission);
            return back()->with('message','Permission assigned');
        }


    }

    public function revokePermission(User $user, Permission $permission){

        if ($user->hasPermissionTo($permission)){// in the form we select a permission
            $user->revokePermissionTo($permission);
            return back()->with('message', 'Permission revoked');

        }
            return back()->with('message', 'Permission not assigned');

    }
    //***********************************************Permissions********************************* */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if($user->hasRole('admin')){
            return back()->with('message','Impossible to remove the admin');
        }
        $user->delete();
        return back()->with('message','User removed');

    }
}
