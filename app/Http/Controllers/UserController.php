<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use validate;
use Hash;
use Session;
use LaraFlash;
class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(5);
        return view('manage.users.index')->withUsers($users);
    }

    public function create()
    {
      LaraFlash::add()->content('hello')->priority(6)->type('info');
        return view('manage.users.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
          'name' => 'required|max:255',
          'email' => 'required|email|unique:users'
        ]);

        if (\Request::has('password')&& !empty($request->password)) {
          $password = trim($request->password);
        }else {
          $length = 10;
          $keyspace = '123456789abcdefghijklmnopqrsvutxyzABCDEFGHIJKLMNOPQRSVUTXYZ';
          $str = '';
          $max = mb_strlen($keyspace,'8bit')-1;
          for ($i=0; $i < $length; ++$i) {
            $str .= $keyspace[random_int(0, $max)];
          }
          $password = $str;
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($password);

        if ($user->save()) {
          return redirect()->route('users.show',$user->id);
        }else{
          Session::flash('danger','Sorry a problem occured while creating this user');
          return redirect()->route('user.create');
        }
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('manage.users.show')->withUser($user);
    }

    public function edit($id)
    {
      $user = User::findOrFail($id);
      $roles = Role::all();
      return view('manage.users.edit')->withUser($user)->withRoles($roles);
    }

    public function update(Request $request, $id)
    {
      $this->validate($request,[
        'name' => 'required|max:255',
        'email' => 'required|email|unique:users,email,'.$id
      ]);

      $user = User::findOrFail($id);
      $user->name = $request->name;
      $user->email = $request->email;
      if ($request->password_options=='auto_generate') {
        $length = 10;
        $keyspace = '123456789abcdefghijklmnopqrsvutxyzABCDEFGHIJKLMNOPQRSVUTXYZ';
        $str = '';
        $max = mb_strlen($keyspace,'8bit')-1;
        for ($i=0; $i < $length; ++$i) {
          $str .= $keyspace[random_int(0, $max)];
        }
        $password = $str;
        $user->password = Hash::make($password);
      }elseif ($request->password_options=='manaually') {
        $user->password = Hash::make($request->password);
      }

      if (!empty($request->roles)) {
          $user->syncRoles(explode(',',$request->roles));
      }else{
          $user->roles()->detach($request->roles);
      }

      if ($user->save()) {
        return redirect()->route('users.show',$user->id);
      }else{
        Session::flash('danger','Sorry a problem occured while updating this user');
        return redirect()->route('user.edit',$user->id);
      }

    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index');
    }
}
