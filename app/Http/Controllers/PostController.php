<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function index(){
        $posts = Post::latest()->paginate();
        return view('posts.index', ['posts' => $posts]);
    }

    public function create(){
        return view('posts.create');
    }

    public function edit(Post $post){
        return view('posts.edit', ['post' => $post]);
    }

    public function destroy(Post $post){
        $post->delete();

        /* Retornar a la vista anterior */
        return back();
    }
}
