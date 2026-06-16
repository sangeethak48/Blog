@extends('layouts.app')

@section('content')

<div class="container">
    <h2>My Posts</h2>

    <a href="{{ route('author.posts.create') }}" class="btn">
        Create New Post
    </a>

    <br><br>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Slug</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>

        @forelse($posts as $post)

            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->slug }}</td>
                <td>{{ $post->status }}</td>

                <td>

                    <a href="{{ route('author.posts.edit',$post->id) }}"
                       class="btn">
                        Edit
                    </a>

                    <form action="{{ route('author.posts.destroy',$post->id) }}"
                          method="POST"
                          style="display:inline;">

                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                onclick="return confirm('Delete this post?')">
                            Delete
                        </button>

                    </form>

                </td>
            </tr>

        @empty

            <tr>
                <td colspan="5">
                    No Posts Found
                </td>
            </tr>

        @endforelse

        </tbody>
    </table>

</div>

@endsection