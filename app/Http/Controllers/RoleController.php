<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\Permission;
use validate;
use Session;
use Hash;

class RoleController extends Controller
{
    public function index()
    {
      $roles = Role::all();
      return view('manage.roles.index')->withRoles($roles);
    }

    public function create()
    {
      $permission = Permission::all();
      return view('manage.roles.create')->withPermission($permission);
    }

    public function store(Request $request)
    {
      $this->validate($request,[
        'name' => 'required|max:255|unique:roles,name',
        'display_name' => 'required|max:255',
        'description' => 'max:255'
      ]);

      $role = new Role();
      $role->name = $request->name;
      $role->display_name = $request->display_name;
      $role->description = $request->description;
      $role->save();

      if ($request->permissions) {
        $role->syncPermissions(explode(',',$request->permissions));
      }

      Session::flash('success','Created Successfully');
      return redirect()->route('roles.show',$role->id);
    }

    public function show($id)
    {
      $role = Role::findOrFail($id);
      return view('manage.roles.show')->withRole($role);
    }

    public function edit($id)
    {
      $role = Role::findOrFail($id);
      $permission = Permission::all();
      return view('manage.roles.edit')->withRole($role)->withPermission($permission);
    }

    public function update(Request $request, $id)
    {
      $this->validate($request,[
        'display_name' => 'required|max:255',
        'description' => 'max:255'
      ]);

      $role = Role::findOrFail($id);
      $role->display_name = $request->display_name;
      $role->description = $request->description;
      $role->save();

      if ($request->permissions) {
        $role->syncPermissions(explode(',',$request->permissions));
      }

      Session::flash('success','Updated Successfully');
      return redirect()->route('roles.show',$id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
