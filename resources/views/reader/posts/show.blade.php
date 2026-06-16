@extends('layouts.app')

@section('content')

<div class="card shadow-sm">

    <div class="card-body">

        <h2>{{ $post->title }}</h2>

        <hr>

        <p>
            {!! nl2br(e($post->content)) !!}
        </p>

        <hr>

        {{-- Like Button --}}
        <form action="{{ route('reader.posts.like', $post->id) }}"
              method="POST">

            @csrf

            <button class="btn btn-primary">
                👍 Like
            </button>

        </form>

    </div>

</div>

<br>

{{-- Comment Form --}}

<div class="card">

    <div class="card-header">
        Add Comment
    </div>

    <div class="card-body">

        <form action="{{ route('reader.comments.store', $post->id) }}"
              method="POST">

            @csrf

            <textarea name="comment"
                      class="form-control"
                      rows="3"
                      required></textarea>

            <br>

            <button class="btn btn-success">
                Post Comment
            </button>

        </form>

    </div>

</div>

<br>

{{-- Comments List --}}

<div class="card">

    <div class="card-header">
        Comments
    </div>

    <div class="card-body">

        @forelse($post->comments as $comment)

            <div class="border rounded p-3 mb-3">

                <strong>
                    {{ $comment->user->name ?? 'User' }}
                </strong>

                <p class="mt-2">
                    {{ $comment->comment }}
                </p>

                @if(auth()->id() == $comment->user_id)

                    <form action="{{ route('reader.comments.destroy', $comment->id) }}"
                          method="POST">

                        @csrf
                        @method('DELETE')

                        <button class="btn btn-sm btn-danger">
                            Delete Comment
                        </button>

                    </form>

                @endif

            </div>

        @empty

            <p>No comments yet.</p>

        @endforelse

    </div>

</div>

<br>

<a href="{{ route('reader.posts.index') }}"
   class="btn btn-secondary">
    Back
</a>

@endsection