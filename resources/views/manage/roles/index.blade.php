@extends('layouts.manage')
@section('content')

<div class="flex-container">

  <div class="columns">
    <div class="column is-9">
      <h1 class="title">Create New Role</h1>
    </div>
    <div class="column is-3">
      <a href="{{route('roles.create')}}" class="button is-primary m-l-30">Create New Role</a>
    </div>
  </div>
  <hr>

  <div class="columns is-multiline">
    @foreach($roles as $role)
    <div class="column is-3">
      <div class="card">
        <header class="card-header">
          <p class="card-header-title">
            {{$role->display_name}}
          </p>
        </header>
        <div class="card-content">
          <div class="content">
            {{$role->description}}<br>
            <time datetime="2016-1-1">{{$role->created_at->toFormattedDateString()}}</time>
          </div>
        </div>
        <footer class="card-footer">
          <a href="{{route('roles.edit',$role->id)}}" class="card-footer-item">Edit</a>
          <a href="{{route('roles.show',$role->id)}}" class="card-footer-item">Show</a>
        </footer>
      </div>
    </div>
    @endforeach
  </div>
</div>
@endsection
