@extends('layouts.manage')
@section('content')

<div class="manage-users flex-container m-t-30">
  <div class="columns">
    <div class="column">
      <h1 class="title">Create New Permission</h1>
    </div>
  </div>
  <hr>
  <div class="block">
      <b-radio v-model="permission_type" native-value="basic">
          Basic Permission
      </b-radio>
      <b-radio v-model="permission_type" native-value="crud">
          CRUD Permission
      </b-radio>
  </div>

  <div class="basic-permission" v-if="permission_type=='basic'">
    <form action="{{route('permissions.store')}}" method="post">
      @csrf
      <input type="hidden" name="permission_type" v-model="permission_type">
      <fieldset>
        <div class="field">
          <label class="label">Name(Display Name)</label>
          <div class="control">
            <input class="input" name="display_name" type="text" placeholder="permission name">
          </div>
        </div>
        <div class="field">
          <label class="label">Slug</label>
          <div class="control">
            <input class="input" name="name" type="text" placeholder="permission-name">
          </div>
        </div>
        <div class="field">
          <label class="label">Description</label>
          <div class="control">
            <input class="input" name="description" type="text" placeholder="permission description">
          </div>
        </div>
        <div class="field">
          <button type="submit" class="button is-primary">
            Create Permission
          </button>
        </div>
      </fieldset>
    </form>
  </div>

  <div class="crud-permission" v-if="permission_type=='crud'">
    <b-field label="Resource">
      <b-input v-model="resource"></b-input>
    </b-field>
    <div class="columns">
      <div class="column">
        <section>
           <div class="block">
             <div class="field">
               <b-checkbox v-model="crudSelected"
                   native-value="create">
                   Create
               </b-checkbox>
             </div>
             <div class="field">
               <b-checkbox v-model="crudSelected"
                   native-value="read">
                   Read
               </b-checkbox>
             </div>
             <div class="field">
               <b-checkbox v-model="crudSelected"
                   native-value="update">
                   Update
               </b-checkbox>
             </div>
             <div class="field">
               <b-checkbox v-model="crudSelected"
                   native-value="delete">
                   Delete
               </b-checkbox>
             </div>
           </div>
        </section>
      </div>
      <div class="column">
        <table class="table">
          <thead>
            <tr>
              <th>Name</th>
              <th>Slug</th>
              <th>Description</th>
            </tr>
          </thead>
          <tbody v-if="resource.length > 3">
            <tr v-for="item in crudSelected">
              <td v-text="CrudName(item)"></td>
              <td v-text="CrudSlug(item)"></td>
              <td v-text="CrudDescription(item)"></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <form action="{{route('permissions.store')}}" method="post">
      @csrf
      <input type="hidden" name="crud_selected" v-model="crudSelected">
      <input type="hidden" name="resource" v-model="resource">
      <div class="field">
        <button type="submit" class="button is-primary">
          Create Permission
        </button>
      </div>
    </form>
  </div>

</div>
@endsection
@section('scripts')
<script type="module">
new Vue({
  el:'#app',
  data:{
    permission_type: "basic",
    resource : "",
    crudSelected : ['create','read','update','delete']
  },
  methods:{
    CrudName(item){
      return item + ' ' + this.resource;
    },
    CrudSlug(item){
      return item + '-' + this.resource;
    },
    CrudDescription(item){
      return 'allow users to ' + item + ' ' + this.resource;
    }
  }
});
</script>
@endsection
