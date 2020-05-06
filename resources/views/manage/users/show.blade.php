@extends('layouts.manage')
@section('content')

<div class="manage-users flex-container m-t-30">
  <div class="card">
    <header class="card-header">
      <p class="card-header-title">
        {{$user->name}} Details
      </p>
    </header>
    <div class="card-content">
      <div class="content">
        <p class="subtitle"><strong>Email : </strong> {{$user->email}}</p>
        <time>{{$user->created_at->toFormattedDateString()}}</time>
      </div>
    </div>
    <footer class="card-footer">
      <a href="{{route('users.index')}}" class="card-footer-item">Back</a>
      <a href="{{route('users.edit',$user->id)}}" class="card-footer-item">Edit</a>
    </footer>
  </div>
  <hr>
  <div class="card">
    <header class="card-header">
      <p class="card-header-title">
        User Roles
      </p>
    </header>
    <div class="card-content">
      <div class="content">
        <ul>
        @foreach($user->roles as $ur)
          <li>{{$ur->display_name}}</li>
        @endforeach
        </ul>
      </div>
    </div>
  </div>

</div>
@endsection
