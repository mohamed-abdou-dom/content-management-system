@extends('layouts.manage')
@section('content')

<div class="manage-users flex-container m-t-30">
  <div class="columns">
    <div class="column">
      <h1 class="title">Edit {{$user->name}}</h1>
    </div>
  </div>
  <hr>
  <div class="columns">
    <div class="column is-6">
      <form action="{{route('users.update',$user->id)}}" method="post">
        {{method_field('put')}}
        @csrf
        <fieldset>
          <div class="field">
            <label class="label">Name</label>
            <div class="control">
              <input class="input" name="name" type="text" value="{{$user->name}}">
            </div>
          </div>
          <div class="field">
            <label class="label">Email</label>
            <div class="control">
              <input class="input" name="email" type="email" value="{{$user->email}}">
            </div>
          </div>
          <div class="field">
            <div class="block">
              <div class="field">
                <b-radio name="password_options" v-model="password_options" native-value="keep"> Do Not Change Password </b-radio>
              </div>
              <div class="field">
                <b-radio name="password_options" v-model="password_options" native-value="auto_generate"> Auto Generate New Password </b-radio>
              </div>
              <div class="field">
                <b-radio name="password_options" v-model="password_options" native-value="manaually"> Manaually Set New Password </b-radio>
              </div>
            </div>
          </div>
          <div class="field" v-if="password_options=='manaually'">
            <label class="label">Password</label>
            <div class="control">
              <input class="input" name="password" type="password" placeholder="Manaually give a password to a user">
            </div>
          </div>
          <input type="hidden" name="roles" v-model="roleSelected">
          <div class="field">
            <button type="submit" class="button is-primary">
              Edit User
            </button>
          </div>
        </fieldset>
      </form>
    </div>
    <div class="column is-6">
      <h1 class="title">Roles</h1>
      @foreach($roles as $role)
        <div class="field">
          <b-checkbox :native-value="{{$role->id}}" v-model="roleSelected"> {{ $role->display_name }} </b-checkbox>
        </div>
      @endforeach
    </div>
  </div>
</div>
@endsection
@section('scripts')
<script type="module">
new Vue({
  el:'#app',
  data:{
      password_options: 'keep',
      roleSelected: {!!$user->roles->pluck('id')!!}
  }
});
</script>
@endsection
