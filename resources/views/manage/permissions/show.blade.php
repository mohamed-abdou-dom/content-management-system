@extends('layouts.manage')
@section('content')

<div class="manage-permissions flex-container m-t-30">
  <div class="card">
    <header class="card-header">
      <p class="card-header-title">
        {{$permission->display_name}} Details
      </p>
    </header>
    <div class="card-content">
      <div class="content">
        <p class="subtitle"><strong>Slug : </strong> {{$permission->name}}</p>
        <time>{{$permission->created_at->toFormattedDateString()}}</time>
      </div>
    </div>
    <footer class="card-footer">
      <a href="{{route('permissions.index')}}" class="card-footer-item">Back</a>
      <a href="{{route('permissions.edit',$permission->id)}}" class="card-footer-item">Edit</a>
    </footer>
  </div>

</div>
@endsection
