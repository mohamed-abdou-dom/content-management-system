@extends('layouts.manage')
@section('content')

<div class="flex-container">
  <div class="head">
    <div class="columns">
      <div class="column is-9">
        <h1 class="title">{{$role->display_name}} <em class="subtitle">({{$role->name}})</em></h1>
        <p>{{$role->description}}</p>
      </div>
      <div class="column is-3">
        <a href="{{route('roles.edit',$role->id)}}" class="button is-primary m-l-50">edit this role</a>
      </div>
    </div>
  </div>
  <hr>
  <div class="card">
    <div class="card-content">
      <p class="title">
        Permissions
      </p>
      <ul class="m-l-30">
        @foreach($role->permissions as $rp)
          <li>{{$rp->display_name}} <em class="m-l-20">({{$rp->name}})</em></li>
        @endforeach
      </ul>
    </div>
  </div>
</div>

@endsection
