<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index(){
        $roles = Role::all();

        /*Role::create(['name'=>'admin']);
        Role::create(['name'=>'user']);
        Role::create(['name'=>'intern']);*/

        /*$role1=Role::first();
        $permission = Permission::first();
        $role1->givePermissionTo($permission);*/
       //auth()->user()->assignRole('admin');
        //$roles = Role::whereNotIn('name', ['admin'])->get();

        return view('admin.roles.index',compact('roles'));
    }

    public function store(Request $request){
        $validated = $request->validate(['name'=>['required','min:3']]);

        Role::create($validated);   

        return to_route('admin.roles.index')->with('message','Permission created');;
    }

    public function edit(Role $role){
        
        $permissions = Permission::all();
        
        return to_route('admin.roles.edit', compact('role','permissions'));
    }

    public function update(Request $request,Role $role){
        $validated = $request->validate(['name'=>['required','min:3']]);

        $role->update($validated);

        return to_route('admin.roles.index')->with('message','Role updated');
    }

    public function destroy(Role $role){
        $role->delete();

        return back()->with('message','Role deleted');
    }

    public function givePermission(Request $request, Role $role){

        if ($role->hasPermissionTo($request->permission)){// in the form we select a permission
            return back()->with('message', 'Permission already assigned');

        } 
        else{
            $role->givePermissionTo($request->permission);
            return back()->with('message','Permission assigned');
        }


    }

    public function revokePermission(Role $role, Permission $permission){

        if ($role->hasPermissionTo($permission)){// in the form we select a permission
            $role->revokePermissionTo($permission);
            return back()->with('message', 'Permission revoked');

        } 
            return back()->with('message', 'Permission not assigned');

    }

}


