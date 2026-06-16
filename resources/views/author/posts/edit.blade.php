@extends('layouts.app')

@section('content')

<div class="container">

    <h2>Edit Post</h2>

    <form action="{{ route('author.posts.update',$post->id) }}"
          method="POST">

        @csrf
        @method('PUT')

        <label>Title</label>

        <input type="text"
               name="title"
               value="{{ $post->title }}">

        <label>Slug</label>

        <input type="text"
               name="slug"
               value="{{ $post->slug }}">

        <label>Content</label>

        <textarea name="content"
                  rows="6">{{ $post->content }}</textarea>

        <label>Status</label>

        <select name="status">

            <option value="published"
                {{ $post->status == 'published' ? 'selected' : '' }}>
                Published
            </option>

            <option value="draft"
                {{ $post->status == 'draft' ? 'selected' : '' }}>
                Draft
            </option>

        </select>

        <button type="submit">
            Update Post
        </button>

    </form>

</div>

@endsection