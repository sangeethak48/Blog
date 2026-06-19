@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-gradient-to-br from-slate-50 to-slate-100 py-12 px-4">

    <div class="max-w-6xl mx-auto">

        <!-- Header Section -->
        <div class="mb-10">
            <h1 class="text-4xl font-bold text-gray-900 mb-2">Featured Blog Posts</h1>
            <p class="text-gray-600 text-lg">Discover amazing content from our writers</p>
        </div>

        @if($posts->count())

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                @foreach($posts as $post)

                    <a href="{{ route('reader.posts.show', $post->id) }}" class="group">
                        <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden">

                            <!-- Post Header -->
                            <div class="bg-gradient-to-r from-blue-500 to-indigo-600 h-32 relative"></div>

                            <!-- Post Content -->
                            <div class="p-6 relative">

                                <!-- Title -->
                                <h3 class="text-xl font-bold text-gray-900 mb-3 line-clamp-2 group-hover:text-blue-600 transition-colors">
                                    {{ $post->title }}
                                </h3>

                                <!-- Preview -->
                                <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                                    {{ Str::limit($post->content, 150) }}
                                </p>

                                <!-- Meta Info -->
                                <div class="flex items-center justify-between pt-4 border-t border-gray-200">
                                    <div class="flex items-center gap-2">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                            {{ $post->category->name ?? 'General' }}
                                        </span>
                                    </div>
                                    <div class="flex items-center text-blue-600 font-semibold text-sm">
                                        Read More
                                        <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                        </svg>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </a>

                @endforeach

            </div>

        @else

            <div class="bg-white rounded-lg shadow-md p-12 text-center">
                <svg class="w-20 h-20 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
                <p class="text-gray-600 text-xl mb-4">No posts available yet</p>
                <p class="text-gray-500">Check back soon for amazing content!</p>
            </div>

        @endif

    </div>

</div>

@endsection
