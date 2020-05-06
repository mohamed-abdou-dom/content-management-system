<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;
class PostController extends Controller
{
  //
  // public function __construct()
  // {
  //   $this->middleware('role:superadministrator|administrator|editor|author|contributor');
  // }

  public function index()
    {
      $posts = Post::all();
      return view('manage.posts.index')->withPosts($posts);
    }

    public function create()
    {
        return view('manage.posts.create');
    }

    public function store(Request $request)
    {
      if (!Post::where('slug','=',$request->slug)->exists()) {
        $post = new Post();
        $post->slug = $request->slug;
        $post->author_id = Auth::user()->id;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();
        return redirect()->route('posts.create');
      }else {
        return redirect()->route('posts.create');
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
