<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function index(){
        $posts = Post::latest()->paginate();
        return view('posts.index', ['posts' => $posts]);
    }

    public function destroy(Post $post){
        $post->delete();

        /* Retornar a la vista anterior */
        return back();
    }
}
