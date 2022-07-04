<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;


class PermissionController extends Controller
{
    public function index(){
        $permissions = Permission::all();
        /*Permission::create(['name'=>'full edit']);
        Permission::create(['name'=>'some edits']);
        Permission::create(['name'=>'full view']);
        Permission::create(['name'=>'some view']);*/
        
        return view('admin.permissions.index', compact('permissions'));
    }

    public function store(Request $request){
        $validated = $request->validate(['name'=>['required','min:3']]);

        Permission::create($validated);   

        return to_route('admin.permissions.index')->with('message','Permission created');;
    }


    public function edit(Permission $permission){
        
        $roles = Role::all();
        return to_route('admin.permissions.edit', compact('permission','roles'));
    }

    public function update(Request $request,Permission $permission){
        $validated = $request->validate(['name'=>['required','min:3']]);

        $permission->update($validated);

        return to_route('admin.permissions.index')->with('message','Permission updated');
    }

    public function destroy(Permission $permission){
        $permission->delete();

        return back()->with('message','Permission deleted');
    }
    
    public function assignRole(Request $request, Permission $permission){

        if ($permission->hasRole($request->role)){// in the form we select a permission
            return back()->with('message', 'Permission already assigned');

        } 
        else{
            $permission->assignRole($request->role);
            return back()->with('message','Permission assigned');
        }


    }

    public function revokeRole( Permission $permission, Role $role){

        if ($permission->hasRole($role)){// in the form we select a permission
            $permission->removeRole($role);
            return back()->with('message', 'Role removed');

        } 
            return back()->with('message', 'Role not assigned');

    }

}


