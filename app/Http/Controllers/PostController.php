<?php

namespace App\Http\Controllers;

use App\Models\Post;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
class PostController extends Controller
{
    public function index(){
        $posts = Post::latest()->paginate();
        return view('posts.index', ['posts' => $posts]);
    }

    public function create(Post $post){
        return view('posts.create', ['post' => $post]);
    }

    public function store(Request $request){

        $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        /* Nueva publicacion a partir de usuario que este logueado */
        $post = $request->user()->posts()->create([
            'title' => $title = $request->title,
            'slug'  => Str::slug($title),
            'body'  => $request->body,
        ]);

        return redirect()->route('posts.edit', $post);
    }

    public function edit(Post $post){
        return view('posts.edit', ['post' => $post]);
    }

    public function update(Request $request, Post $post){

        $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $post->update([
            'title' => $title = $request->title,
            'slug'  => Str::slug($title),
            'body'  => $request->body,
        ]);

        return redirect()->route('posts.edit', $post);
    }

    public function destroy(Post $post){
        $post->delete();

        /* Retornar a la vista anterior */
        return back();
    }
}
