@extends('layouts.manage')
@section('content')

<div class="manage-users flex-container m-t-30">
  <div class="columns">
    <div class="column">
      <h1 class="title">Manage Users</h1>
    </div>
    <div class="column">
      <a href="{{route('users.create')}}" class="button is-primary is-pulled-right m-r-10">Create New User</a>
    </div>
  </div>
  <hr>
  <table class="table is-hoverable is-fullwidth">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Date Created</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach($users as $user)
      <tr>
        <th>{{$user->id}}</th>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->created_at->toFormattedDateString()}}</td>
        <td>
          <a class="button is-light" href="{{route('users.edit',$user->id)}}"><i class="fa fa-edit"></i></a>
          <a class="button is-light" href="{{route('users.show',$user->id)}}"><i class="fa fa-eye"></i></a>
          <form style="display:inline" action="{{route('users.destroy',$user->id)}}" method="post">
            {{method_field('delete')}}
            @csrf
            <button class="button is-light" type="submit"><i class="fa fa-minus-circle"></i></button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  {{$users->links()}}
</div>
@endsection
