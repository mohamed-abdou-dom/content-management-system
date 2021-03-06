@extends('layouts.manage')
@section('content')

<div class="manage-permissions flex-container m-t-30">
  <div class="columns">
    <div class="column">
      <h1 class="title">Manage Permissions</h1>
    </div>
    <div class="column">
      <a href="{{route('permissions.create')}}" class="button is-primary is-pulled-right m-r-10">Create New Permission</a>
    </div>
  </div>
  <hr>
  <table class="table is-hoverable is-fullwidth">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Slug</th>
        <th>Date Created</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach($permissions as $permission)
      <tr>
        <th>{{$permission->id}}</th>
        <td>{{$permission->display_name}}</td>
        <td>{{$permission->name}}</td>
        <td>{{$permission->created_at->toFormattedDateString()}}</td>
        <td>
          <a class="button is-light" href="{{route('permissions.edit',$permission->id)}}"><i class="fa fa-edit"></i></a>
          <a class="button is-light" href="{{route('permissions.show',$permission->id)}}"><i class="fa fa-eye"></i></a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  {{$permissions->links()}}
</div>
@endsection
