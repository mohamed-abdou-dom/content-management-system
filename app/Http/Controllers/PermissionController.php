<?php

namespace App\Http\Controllers;

use App\Permission;
use Illuminate\Http\Request;
use validate;
use Session;

class PermissionController extends Controller
{

    public function index()
    {
      $permissions = Permission::paginate(5);
      return view('manage.permissions.index')->withPermissions($permissions);
    }

    public function create()
    {
      return view('manage.permissions.create');
    }

    public function store(Request $request)
    {
      if ($request->permission_type=='basic') {

        $this->validate($request,[
          'display_name' => 'required|max:255',
          'name' => 'required|max:255|alphadash|unique:permissions,name',
          'description' => 'required|max:255'
        ]);

        $permission = new Permission();
        $permission->name = $request->name;
        $permission->display_name = $request->display_name;
        $permission->description = $request->description;

        if ($permission->save()) {
          Session::flash('success','Permission Added Successfully.');
          return redirect()->route('permissions.index');
        }else {
          Session::flash('danger','Problem occur while creating Permission.');
          return redirect()->route('permissions.create');
        }
      }else{
        $resource = $request->resource;
        $crud = explode(',',$request->crud_selected);
        if (count($crud)>0) {
          foreach ($crud as $item) {
            $slug = $item.'-'.$resource;
            $display_name = $item.' '.$resource;
            $description = 'allow user to '.$item.' '.$resource;

            $permission = new Permission();
            $permission->name = $slug;
            $permission->display_name = $display_name;
            $permission->description = $description;
            $permission->save();
          }
          Session::flash('success','Permissions Successfully Addedd');
          return redirect()->route('permissions.index');
        }
      }
    }

    public function show($id)
    {
        $permission = Permission::findOrFail($id);
        return view('manage.permissions.show')->withPermission($permission);
    }

    public function edit($id)
    {
      $permission = Permission::findOrFail($id);
      return view('manage.permissions.edit')->withPermission($permission);
    }

    public function update(Request $request, $id)
    {
      $this->validate($request,[
        'display_name' => 'required|max:255',
        'description' => 'required|max:255'
      ]);

      $permission = Permission::findOrFail($id);
      $permission->display_name = $request->display_name;
      $permission->description = $request->description;

      if ($permission->save()) {
        Session::flash('success','Permission Added Successfully.');
        return redirect()->route('permissions.edit',$id);
      }else {
        Session::flash('danger','Problem occur while creating Permission.');
        return redirect()->route('permissions.edit',$id);
      }
    }

    public function destroy($id)
    {
        //
    }
}
