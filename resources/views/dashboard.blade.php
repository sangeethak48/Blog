@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-gradient-to-br from-slate-50 to-slate-100 py-12 px-4">

    <div class="max-w-6xl mx-auto">

        <!-- Header Section -->
        <div class="mb-12">
            <h1 class="text-4xl font-bold text-gray-900 mb-2">
                Welcome, {{ Auth::user()->name }}! 👋
            </h1>
            <p class="text-gray-600 text-lg">
                @if(Auth::user()->role == 'admin')
                    Manage your blog platform
                @elseif(Auth::user()->role == 'author')
                    Create and manage your posts
                @else
                    Discover and read amazing posts
                @endif
            </p>
        </div>

        @if(Auth::user()->role == 'admin')

            <!-- Admin Dashboard -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <!-- Manage Categories -->
                <a href="{{ route('admin.categories.index') }}" class="group">
                    <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-all duration-300 p-6 border-l-4 border-blue-500 hover:border-blue-700">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-xl font-bold text-gray-800">Manage Categories</h3>
                            <span class="text-3xl">📁</span>
                        </div>
                        <p class="text-gray-600 text-sm">
                            Organize blog content with categories
                        </p>
                        <div class="mt-4 flex items-center text-blue-600 font-semibold">
                            Go to Categories
                            <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </div>
                    </div>
                </a>

                <!-- Manage Tags -->
                <a href="{{ route('admin.tags.index') }}" class="group">
                    <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-all duration-300 p-6 border-l-4 border-emerald-500 hover:border-emerald-700">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-xl font-bold text-gray-800">Manage Tags</h3>
                            <span class="text-3xl">🏷️</span>
                        </div>
                        <p class="text-gray-600 text-sm">
                            Create and manage post tags
                        </p>
                        <div class="mt-4 flex items-center text-emerald-600 font-semibold">
                            Go to Tags
                            <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </div>
                    </div>
                </a>

                <!-- Manage Users -->
                <a href="{{ route('admin.users.index') }}" class="group">
                    <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-all duration-300 p-6 border-l-4 border-purple-500 hover:border-purple-700">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-xl font-bold text-gray-800">Manage Users</h3>
                            <span class="text-3xl">👥</span>
                        </div>
                        <p class="text-gray-600 text-sm">
                            Control user access and roles
                        </p>
                        <div class="mt-4 flex items-center text-purple-600 font-semibold">
                            Go to Users
                            <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </div>
                    </div>
                </a>

            </div>

        @elseif(Auth::user()->role == 'author')

            <!-- Author Dashboard -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <!-- My Posts -->
                <a href="{{ route('author.posts.index') }}" class="group">
                    <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-all duration-300 p-6 border-l-4 border-blue-500 hover:border-blue-700">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-xl font-bold text-gray-800">My Posts</h3>
                            <span class="text-3xl">📝</span>
                        </div>
                        <p class="text-gray-600 text-sm">
                            View and manage your published posts
                        </p>
                        <div class="mt-4 flex items-center text-blue-600 font-semibold">
                            View Posts
                            <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </div>
                    </div>
                </a>

                <!-- Create Post -->
                <a href="{{ route('author.posts.create') }}" class="group">
                    <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-all duration-300 p-6 border-l-4 border-emerald-500 hover:border-emerald-700">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-xl font-bold text-gray-800">Create Post</h3>
                            <span class="text-3xl">✍️</span>
                        </div>
                        <p class="text-gray-600 text-sm">
                            Write and publish a new post
                        </p>
                        <div class="mt-4 flex items-center text-emerald-600 font-semibold">
                            New Post
                            <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </div>
                    </div>
                </a>

                <!-- View Featured Blogs -->
                <a href="{{ route('reader.posts.index') }}" class="group">
                    <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-all duration-300 p-6 border-l-4 border-amber-500 hover:border-amber-700">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-xl font-bold text-gray-800">Featured Blogs</h3>
                            <span class="text-3xl">⭐</span>
                        </div>
                        <p class="text-gray-600 text-sm">
                            Explore featured posts from all authors
                        </p>
                        <div class="mt-4 flex items-center text-amber-600 font-semibold">
                            Explore
                            <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </div>
                    </div>
                </a>

            </div>

        @elseif(Auth::user()->role == 'reader')

            <!-- Reader Dashboard -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <!-- View Posts -->
                <a href="{{ route('reader.posts.index') }}" class="group">
                    <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-all duration-300 p-6 border-l-4 border-blue-500 hover:border-blue-700">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-xl font-bold text-gray-800">View Posts</h3>
                            <span class="text-3xl">📚</span>
                        </div>
                        <p class="text-gray-600 text-sm">
                            Browse all available blog posts
                        </p>
                        <div class="mt-4 flex items-center text-blue-600 font-semibold">
                            Start Reading
                            <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </div>
                    </div>
                </a>

                <!-- Featured Blogs -->
                <a href="{{ route('reader.posts.index') }}" class="group">
                    <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-all duration-300 p-6 border-l-4 border-purple-500 hover:border-purple-700">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-xl font-bold text-gray-800">Featured Blogs</h3>
                            <span class="text-3xl">✨</span>
                        </div>
                        <p class="text-gray-600 text-sm">
                            Check out featured and trending posts
                        </p>
                        <div class="mt-4 flex items-center text-purple-600 font-semibold">
                            Featured
                            <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </div>
                    </div>
                </a>

                <!-- Like & Comment -->
                <a href="{{ route('reader.posts.index') }}" class="group">
                    <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-all duration-300 p-6 border-l-4 border-rose-500 hover:border-rose-700">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-xl font-bold text-gray-800">Engage & Comment</h3>
                            <span class="text-3xl">💬</span>
                        </div>
                        <p class="text-gray-600 text-sm">
                            Like and comment on your favorite posts
                        </p>
                        <div class="mt-4 flex items-center text-rose-600 font-semibold">
                            Interact
                            <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </div>
                    </div>
                </a>

            </div>

        @endif

    </div>

</div>

@endsection
