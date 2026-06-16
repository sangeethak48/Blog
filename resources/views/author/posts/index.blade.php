@extends('layouts.app')

@section('content')

<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6">

        <div class="flex justify-between items-center mb-6">

            <h2 class="text-2xl font-bold text-gray-800">
                My Posts
            </h2>

            <a href="{{ route('author.posts.create') }}"
               class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">
                Create New Post
            </a>

        </div>

        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto">

            <table class="min-w-full bg-white border border-gray-200">

                <thead>
                    <tr class="bg-gray-100">

                        

                        <th class="px-4 py-3 border text-left">
                            Title
                        </th>

                        <th class="px-4 py-3 border text-left">
                            Slug
                        </th>

                        <th class="px-4 py-3 border text-left">
                            Status
                        </th>

                        <th class="px-4 py-3 border text-center">
                            Actions
                        </th>

                    </tr>
                </thead>

                <tbody>

                    @forelse($posts as $post)

                        <tr>

                            
                            <td class="px-4 py-3 border">
                                {{ $post->title }}
                            </td>

                            <td class="px-4 py-3 border">
                                {{ $post->slug }}
                            </td>

                            <td class="px-4 py-3 border">

                                @if($post->status == 'published')
                                    <span class="px-2 py-1 bg-green-100 text-green-700 rounded">
                                        Published
                                    </span>
                                @else
                                    <span class="px-2 py-1 bg-yellow-100 text-yellow-700 rounded">
                                        Draft
                                    </span>
                                @endif

                            </td>

                            <td class="px-4 py-3 border text-center">

                                <a href="{{ route('author.posts.edit',$post->id) }}"
                                   class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">
                                    Edit
                                </a>

                                <form action="{{ route('author.posts.destroy',$post->id) }}"
                                      method="POST"
                                      class="inline">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            onclick="return confirm('Are you sure you want to delete this post?')"
                                            class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600">
                                        Delete
                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="5"
                                class="px-4 py-4 border text-center text-gray-500">
                                No Posts Found
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>
</div>

@endsection