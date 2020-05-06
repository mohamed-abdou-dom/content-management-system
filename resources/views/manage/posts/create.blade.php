@extends('layouts.manage')
@section('content')

<div class="flex-container m-t-30">
  <h1 class="subtitle">Add New Blog Post</h1>
  <hr>
  <form action="{{route('posts.store')}}" method="post">
    {{csrf_field()}}
    <div class="columns">
      <div class="column is-9">
          <div class="field">
            <div class="control">
              <input class="input" name="title" v-model="title" type="text" placeholder="Post Title">
              <input class="input" name="slug" v-model="slug" type="hidden">
            </div>
          </div>
          <div class="postUrl">
            <span class="postIcon"><i class="fa fa-link"></i></span>
            <span class="postRoot m-l-10">http://localhost:8000</span>
            <span class="postDirectory">/blog/</span>
            <input class="slug" name="slug" v-model="ConvertSlug()" disabled style="font-size:16px;border: none;background-color: transparent;"></input>
          </div>
          <div class="field">
            <div class="control">
              <textarea name="content" class="textarea" placeholder="compose your masterpiece......" rows="15"></textarea>
            </div>
          </div>
      </div>
      <div class="column is-3">
        <div class="box">
          <article class="media">
            <div class="media-left">
              <figure class="image is-64x64">
                <img src="https://bulma.io/images/placeholders/128x128.png" alt="Image">
              </figure>
            </div>
            <div class="media-content">
              <div class="content">
                <p>
                  <strong>John Smith</strong> <small>@johnsmith</small> <small>31m</small>
                </p>
              </div>
            </div>
          </article>
          <article class="media">
            <div class="media-left">
              <figure class="image is-64x64">
                <i class="fa fa-file fa-lg"></i>
              </figure>
            </div>
            <div class="media-content">
              <div class="content">
                <p>
                  <strong>Save Draft</strong><br> <small>a few minutes</small>
                </p>
              </div>
            </div>
          </article>
          <article class="media">
            <button type="submit" class="m-l-20 button is-primary is-fullwidth">publish</button>
          </article>
        </div>
      </div>
    </div>
  </form>
</div>

@endsection

@section('scripts')
<script type="module">
new Vue({
  el:'#app',
  data:{
        title : '',
        slug : ''
  },
  methods: {
    ConvertSlug() {
      this.slug = Slug(this.title);
      return Slug(this.title);
    },
  }
});
</script>
@endsection
