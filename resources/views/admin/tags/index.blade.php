@extends('layouts.app')

@section('content')
<div class="container">
  <h1 style="text-align: center;">Tags</h1>
  <a href="{{ route('admin.tags.create') }}">
        <button type="button">Add Tag</button>
    </a>
    <br><br>
    <table style="width:100%; border-collapse:collapse;">
        <thead>
            <tr>
                <th style="border:1px solid black; padding:10px;">Name</th>
                <th style="border:1px solid black; padding:10px;">Slug</th>
                <th style="border:1px solid black; padding:10px;">Actions</th>
            </tr>
        </thead>

        <tbody>
            @forelse($tags as $tag)
                <tr>
                    <td style="border:1px solid black; padding:10px;">
                        {{ $tag->name }}
                    </td>

                    <td style="border:1px solid black; padding:10px;">
                        {{ $tag->slug }}
                    </td>

                    <td style="border:1px solid black; padding:10px;">
                        <a href="{{ route('admin.tags.edit', $tag->id) }}">
                            <button type="button">Edit</button>
                        </a>

                        <form action="{{ route('admin.tags.destroy', $tag->id) }}"
                              method="POST"
                              style="display:inline;">
                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    onclick="return confirm('Are you sure you want to delete this tag?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3"
                        style="border:1px solid black; padding:10px; text-align:center;">
                        No tags found.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

</div>
@endsection