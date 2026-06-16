@extends('layouts.app')

@section('content')

<div class="bg-white p-6 shadow-sm sm:rounded-lg">

<h1 class="text-2xl font-bold mb-2">
    Welcome, {{ Auth::user()->name }}
</h1>



@if(Auth::user()->role == 'admin')

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

        <a href="{{ route('admin.categories.index') }}"
           class="p-5 bg-blue-100 rounded shadow hover:bg-blue-200">
            Manage Categories
        </a>

        <a href="{{ route('admin.tags.index') }}"
           class="p-5 bg-green-100 rounded shadow hover:bg-green-200">
            Manage Tags
        </a>

        <a href="{{ route('admin.users.index') }}"
           class="p-5 bg-yellow-100 rounded shadow hover:bg-yellow-200">
            Manage Users
        </a>

    </div>

@elseif(Auth::user()->role == 'author')

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

        <a href="{{ route('author.posts.index') }}"
           class="p-5 bg-blue-100 rounded shadow hover:bg-blue-200">
            My Posts
        </a>

        <a href="{{ route('author.posts.create') }}"
           class="p-5 bg-green-100 rounded shadow hover:bg-green-200">
            Create Post
        </a>

        <a href="{{ route('reader.posts.index') }}"
           class="p-5 bg-yellow-100 rounded shadow hover:bg-yellow-200">
            View Featured Blogs
        </a>

    </div>

@elseif(Auth::user()->role == 'reader')

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

        <a href="{{ route('reader.posts.index') }}"
           class="p-5 bg-blue-100 rounded shadow hover:bg-blue-200">
            View Posts
        </a>

        <a href="{{ route('reader.posts.index') }}"
           class="p-5 bg-green-100 rounded shadow hover:bg-green-200">
            Featured Blogs
        </a>

        <a href="{{ route('reader.posts.index') }}"
           class="p-5 bg-yellow-100 rounded shadow hover:bg-yellow-200">
            Like & Comment Posts
        </a>

    </div>

@endif


</div>

@endsection
