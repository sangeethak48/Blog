@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-gradient-to-br from-slate-50 to-slate-100 py-12 px-4">

    <div class="max-w-4xl mx-auto">

        <!-- Post Header -->
        <div class="bg-white rounded-lg shadow-md p-8 mb-6">

            <div class="flex items-center justify-between mb-4">
                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                    {{ $post->category->name ?? 'General' }}
                </span>
                <a href="{{ route('reader.posts.index') }}" class="text-blue-600 hover:text-blue-700 font-semibold text-sm">
                    ← Back to Posts
                </a>
            </div>

            <h1 class="text-4xl font-bold text-gray-900 mb-4">
                {{ $post->title }}
            </h1>

            <div class="flex items-center gap-4 text-gray-600 text-sm">
                <span>By <strong>{{ $post->user->name ?? 'Anonymous' }}</strong></span>
                <span>•</span>
                <span>{{ $post->created_at->format('M d, Y') }}</span>
            </div>

        </div>

        <!-- Post Content -->
        <div class="bg-white rounded-lg shadow-md p-8 mb-6">

            <div class="prose prose-lg max-w-none text-gray-700 mb-8 leading-relaxed">
                {!! nl2br(e($post->content)) !!}
            </div>

            <hr class="my-8">

            <!-- Like Button -->
            <div class="mb-6">
                <form action="{{ route('reader.posts.like', $post->id) }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="px-6 py-3 bg-gradient-to-r from-red-500 to-rose-600 text-white rounded-lg font-semibold hover:shadow-lg transition-all duration-200 flex items-center gap-2">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"/>
                        </svg>
                        👍 Like This Post
                    </button>
                </form>
            </div>

        </div>

        <!-- Comment Form -->
        <div class="bg-white rounded-lg shadow-md p-8 mb-6">

            <h2 class="text-2xl font-bold text-gray-900 mb-6">Add a Comment</h2>

            <form action="{{ route('reader.comments.store', $post->id) }}" method="POST">
                @csrf

                <textarea name="comment"
                          class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                          rows="5"
                          placeholder="Share your thoughts..."
                          required></textarea>

                @error('comment')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror

                <button type="submit" class="mt-4 px-6 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-lg font-semibold hover:shadow-lg transition-all duration-200">
                    Post Comment
                </button>

            </form>

        </div>

        <!-- Comments List -->
        @if($post->comments->count())

            <div class="bg-white rounded-lg shadow-md p-8">

                <h2 class="text-2xl font-bold text-gray-900 mb-6">
                    Comments ({{ $post->comments->count() }})
                </h2>

                <div class="space-y-6">

                    @foreach($post->comments as $comment)

                        <div class="border-l-4 border-blue-500 pl-6 pb-6">

                            <!-- Comment Header -->
                            <div class="flex items-center justify-between mb-2">
                                <strong class="text-gray-900 text-lg">
                                    {{ $comment->user->name ?? 'Anonymous User' }}
                                </strong>
                                <span class="text-gray-500 text-sm">
                                    {{ $comment->created_at->diffForHumans() }}
                                </span>
                            </div>

                            <!-- Comment Body -->
                            <p class="text-gray-700 mb-3">
                                {{ $comment->comment }}
                            </p>

                            <!-- Delete Button (only for own comments) -->
                            @if(auth()->id() == $comment->user_id)

                                <form action="{{ route('reader.comments.destroy', $comment->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" onclick="return confirm('Delete this comment?')" class="text-red-600 hover:text-red-700 text-sm font-semibold">
                                        Delete Comment
                                    </button>

                                </form>

                            @endif

                        </div>

                    @endforeach

                </div>

            </div>

        @else

            <div class="bg-gray-50 rounded-lg border-2 border-dashed border-gray-300 p-12 text-center">
                <p class="text-gray-600 text-lg">No comments yet. Be the first to comment!</p>
            </div>

        @endif

    </div>

</div>

@endsection
