@extends('layouts.manage')
@section('content')

<div class="flex-container m-t-30">
  <div class="columns">
    <div class="column">
      <h1 class="title">Manage Posts</h1>
    </div>
    <div class="column">
      <a href="{{route('posts.create')}}" class="button is-primary is-pulled-right m-r-10">Create New Post</a>
    </div>
  </div>
  <hr>
  <div class="columns is-multiline">
    @foreach($posts as $post)
    <div class="column is-3">
      <div class="card">
        <div class="card-content">
          <div class="media">
            <div class="media-content">
              <p class="title is-4">{{$post->title}}</p>
              <p class="subtitle is-6">{{$post->slug}}</p>
            </div>
          </div>
          <div class="content">
            {{ str_limit($post->content,50,'...') }}
          </div>
        </div>
        <footer class="card-footer">
          <p class="card-footer-item">
            <span>
              <time datetime="2016-1-1">{{$post->created_at->toFormattedDateString()}}</time>
            </span>
          </p>
        </footer>
      </div>
    </div>
    @endforeach
  </div>
</div>

@endsection
