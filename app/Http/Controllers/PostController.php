<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function getIndex() {
      $posts = Post::orderBy('created_at', 'desc')->paginate(3);
      return view('blog.index', ['posts' => $posts]);
    }

    public function getAdminIndex() {
      $posts = Post::orderBy('title', 'asc')->get();
      return view('admin.index', ['posts' => $posts]);
    }

    public function getPost($id) {
      $post = Post::where('id', '=', $id)->first();
      return view('blog.post', ['post' => $post]);
    }

    public function getAdminCreate() {
      return view('admin.create');
    }

    public function getAdminEdit($id) {
      $post = Post::find($id);
      return view('admin.edit', ['post' => $post, 'postId' => $id]);
    }

    public function postAdminCreate(Request $request) {
      $this->validate($request, [
        'title' => 'required|min:3',
        'description' => 'required|min:10'
      ]);
      $post = new Post([
          'title' => $request->input('title'),
          'price' => $request->input('price'),
          'description' => $request->input('description')
      ]);
      $post->save();
      return redirect()->route('admin.index')->with('info', 'Post created, Title is: ' . $request->input('title'));
    }

    public function postAdminUpdate(Request $request) {
      $this->validate($request, [
        'title' => 'required|min:3',
        'description' => 'required|min:10'
      ]);
      $post = Post::find($request->input('id'));
      $post->title = $request->input('title');
      $post->price = $request->input('price');
      $post->description = $request->input('description');
      $post->save();
      return redirect()->route('admin.index')->with('info', 'Post edited, new Title is: ' . $request->input('title'));
    }

    public function postAdminDelete($id){
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('admin.index')->with('info', 'Post deleted');
    }
}

