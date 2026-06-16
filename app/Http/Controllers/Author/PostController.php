<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Models\posts;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = posts::where('users_id', Auth::id())
                    ->latest()
                    ->get();

        return view('author.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('author.posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'categories_id' => 'required|exists:categories,id',
            'title'         => 'required',
            'slug'          => 'required|unique:posts,slug',
            'content'       => 'required',
            'status'        => 'required',
        ]);

        posts::create([
            'users_id'      => Auth::id(),
            'categories_id' => $request->categories_id,
            'title'         => $request->title,
            'slug'          => $request->slug,
            'content'       => $request->content,
            'status'        => $request->status,
        ]);

        return redirect()
                ->route('author.posts.index')
                ->with('success', 'Post created successfully');
    }
}