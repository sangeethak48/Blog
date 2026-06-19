@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-gradient-to-br from-slate-50 to-slate-100 py-12 px-4">

    <div class="max-w-7xl mx-auto">

        <!-- Header Section -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">My Posts Dashboard</h1>
            <p class="text-gray-600">Create, manage, and track your blog posts</p>
        </div>

        <!-- Quick Stats -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
            <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-blue-500">
                <div class="text-2xl font-bold text-gray-900">{{ $posts->count() }}</div>
                <div class="text-gray-600">Total Posts</div>
            </div>
            <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-emerald-500">
                <div class="text-2xl font-bold text-gray-900">{{ $posts->where('status', 'published')->count() }}</div>
                <div class="text-gray-600">Published</div>
            </div>
            <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-amber-500">
                <div class="text-2xl font-bold text-gray-900">{{ $posts->where('status', 'draft')->count() }}</div>
                <div class="text-gray-600">Drafts</div>
            </div>
        </div>

        <!-- Action Button -->
        <div class="mb-8">
            <a href="{{ route('author.posts.create') }}" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-indigo-600 to-indigo-700 text-white rounded-lg font-semibold hover:shadow-lg transition-all duration-300">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Create New Post
            </a>
        </div>

        <!-- Posts Table -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">

            @if($posts->count())

                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="bg-gradient-to-r from-gray-50 to-gray-100 border-b border-gray-200">
                                <th class="px-6 py-4 text-left">
                                    <span class="text-sm font-semibold text-gray-700 uppercase tracking-wider">Title</span>
                                </th>
                                <th class="px-6 py-4 text-left">
                                    <span class="text-sm font-semibold text-gray-700 uppercase tracking-wider">Slug</span>
                                </th>
                                <th class="px-6 py-4 text-left">
                                    <span class="text-sm font-semibold text-gray-700 uppercase tracking-wider">Status</span>
                                </th>
                                <th class="px-6 py-4 text-left">
                                    <span class="text-sm font-semibold text-gray-700 uppercase tracking-wider">Created</span>
                                </th>
                                <th class="px-6 py-4 text-center">
                                    <span class="text-sm font-semibold text-gray-700 uppercase tracking-wider">Actions</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach($posts as $post)
                                <tr class="hover:bg-gray-50 transition-colors duration-200">
                                    <td class="px-6 py-4">
                                        <p class="text-gray-900 font-medium">{{ $post->title }}</p>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-gray-100 text-gray-800">
                                            {{ $post->slug }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        @if($post->status == 'published')
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-emerald-100 text-emerald-800">
                                                <span class="w-2 h-2 bg-emerald-600 rounded-full mr-2"></span>
                                                Published
                                            </span>
                                        @else
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-amber-100 text-amber-800">
                                                <span class="w-2 h-2 bg-amber-600 rounded-full mr-2"></span>
                                                Draft
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        <p class="text-gray-600 text-sm">{{ $post->created_at->format('M d, Y') }}</p>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex justify-center gap-3">
                                            <a href="{{ route('author.posts.edit',$post->id) }}" class="px-4 py-2 bg-blue-100 text-blue-700 rounded-lg font-medium hover:bg-blue-200 transition-colors duration-200 flex items-center gap-1">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                                </svg>
                                                Edit
                                            </a>

                                            <form action="{{ route('author.posts.destroy',$post->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Are you sure you want to delete this post?')" class="px-4 py-2 bg-red-100 text-red-700 rounded-lg font-medium hover:bg-red-200 transition-colors duration-200 flex items-center gap-1">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                    </svg>
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            @else

                <div class="p-12 text-center">
                    <svg class="w-20 h-20 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                    </svg>
                    <p class="text-gray-600 text-xl mb-4">No posts yet</p>
                    <p class="text-gray-500 mb-6">Start creating your first post and share your ideas with the world!</p>
                    <a href="{{ route('author.posts.create') }}" class="inline-flex items-center px-6 py-3 bg-indigo-600 text-white rounded-lg font-semibold hover:bg-indigo-700 transition-colors duration-200">
                        Create Your First Post
                    </a>
                </div>

            @endif

        </div>

    </div>

</div>

@endsection
