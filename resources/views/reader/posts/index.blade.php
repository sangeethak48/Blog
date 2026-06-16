@extends('layouts.app')

@section('content')

<h2 class="mb-4">Featured Posts</h2>

@if($posts->count())

    @foreach($posts as $post)

        <div class="card mb-4 shadow-sm">
            <div class="card-body">

                <h3>{{ $post->title }}</h3>

                <p>
                    {{ Str::limit($post->content, 200) }}
                </p>

                <a href="{{ route('reader.posts.show', $post->id) }}"
                   class="btn btn-dark">
                    Read More
                </a>

            </div>
        </div>

    @endforeach

@else

    <div class="alert alert-info">
        No featured posts found.
    </div>

@endif

@endsection