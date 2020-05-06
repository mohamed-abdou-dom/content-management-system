@extends('layouts.manage')
@section('content')

<div class="manage-users flex-container m-t-30">
  <div class="columns">
    <div class="column">
      <h1 class="title">Create New User</h1>
    </div>
  </div>
  <hr>

  <form action="{{route('users.store')}}" method="post">
    @csrf
    <fieldset>
      <div class="field">
        <label class="label">Name</label>
        <div class="control">
          <input class="input" name="name" type="text" placeholder="e.g Alex Smith">
        </div>
      </div>
      <div class="field">
        <label class="label">Email</label>
        <div class="control">
          <input class="input" name="email" type="email" placeholder="e.g. alexsmith@gmail.com">
        </div>
      </div>
      <div class="field" v-if="!auto_password">
        <label class="label">Password</label>
        <div class="control">
          <input class="input" name="password" type="password" placeholder="Manaually give a password to a user">
        </div>
      </div>
      <div class="field">
        <b-checkbox name="auto_generate" v-model="auto_password">Auto Generate Password</b-checkbox>
      </div>
      <div class="field">
        <button type="submit" class="button is-primary">
          Create User
        </button>
      </div>
    </fieldset>
  </form>
</div>
@endsection
@section('scripts')
<script type="module">
new Vue({
  el:'#app',
  data:{
      auto_password: true,
  }
});
</script>
@endsection
