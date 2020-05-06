@extends('layouts.manage')
@section('content')

<div class="flex-container">
  <div class="columns">
    <div class="column">
      <h1 class="title">Edit {{$role->name}}</h1>
    </div>
  </div>
  <hr>
  <form action="{{route('roles.update',$role->id)}}" method="post">
    {{method_field('put')}}
    @csrf
    <fieldset>
      <div class="field">
        <label class="label">Display Name</label>
        <div class="control">
          <input class="input" name="display_name" type="text" value="{{$role->display_name}}">
        </div>
      </div>
      <div class="field">
        <label class="label">Description</label>
        <div class="control">
          <input class="input" name="description" type="text" value="{{$role->description}}">
        </div>
      </div>
    </fieldset>
    <br>
    <div class="card">
    <div class="card-content">
      <p class="title">
        Permissions
      </p>
      <ul class="m-l-30">
        @foreach($permission as $p)
        <li>
          <b-checkbox v-model="PermissionSelected"
              :native-value="{{$p->id}}">
              {{$p->display_name}} <em>({{$p->description}})</em>
          </b-checkbox>
        </li>
        @endforeach
      </ul>
    </div>
  </div>
    <br>
    <input type="hidden" name="permissions" v-model="PermissionSelected">
    <button type="submit" class="button is-primary">Edit</button>
  </form>
</div>
@endsection
@section('scripts')
<script type="module">
new Vue({
  el:'#app',
  data:{
    PermissionSelected : {!!$role->permissions->pluck('id')!!}
  }
});
</script>
@endsection
