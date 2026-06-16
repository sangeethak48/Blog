<?php

namespace App\Http\Controllers\Reader;

use App\Http\Controllers\Controller;
use App\Models\Posts;

class PostController extends Controller
{
    public function index()
    {
        $posts = Posts::latest()->get();

        return view('reader.posts.index', compact('posts'));
    }

    public function show($id)
    {
        $post = Posts::findOrFail($id);

        return view('reader.posts.show', compact('post'));
    }
}