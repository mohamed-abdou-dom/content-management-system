@extends('layouts.manage')
@section('content')
<div class="manage-users flex-container m-t-30">
  <div class="columns">
    <div class="column">
      <h1 class="title">Edit {{$permission->display_name}}</h1>
    </div>
  </div>
  <hr>
  <div>
    <form action="{{route('permissions.update',$permission->id)}}" method="post">
      {{method_field('put')}}
      @csrf
      <fieldset>
        <div class="field">
          <label class="label">Name(Display Name)</label>
          <div class="control">
            <input class="input" name="display_name" type="text" value="{{$permission->display_name}}">
          </div>
        </div>
        <div class="field">
          <label class="label">Description</label>
          <div class="control">
            <input class="input" name="description" type="text" value="{{$permission->description}}">
          </div>
        </div>
        <div class="field">
          <button type="submit" class="button is-primary">
            Update Permission
          </button>
        </div>
      </fieldset>
    </form>
  </div>
</div>
@endsection
