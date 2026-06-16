@extends('layouts.app')

@section('content')

<div class="container">

    <h2 style="text-align: center;">Categories</h2>

    <div style="margin-bottom: 20px;">
        <a href="{{ route('admin.categories.create') }}">
            <button type="button">Add Category</button>
        </a>
    </div>

    <table style="width:100%; border-collapse:collapse;">
        <thead>
            <tr>
                <th style="border:1px solid black; padding:10px;">Name</th>
                <th style="border:1px solid black; padding:10px;">Slug</th>
                <th style="border:1px solid black; padding:10px;">Description</th>
                <th style="border:1px solid black; padding:10px;">Actions</th>
            </tr>
        </thead>

        <tbody>
            @forelse($categories as $category)
                <tr>
                    <td style="border:1px solid black; padding:10px;">
                        {{ $category->name }}
                    </td>

                    <td style="border:1px solid black; padding:10px;">
                        {{ $category->slug }}
                    </td>

                    <td style="border:1px solid black; padding:10px;">
                        {{ $category->description }}
                    </td>

                    <td style="border:1px solid black; padding:10px;">
                        <a href="{{ route('admin.categories.edit', $category->id) }}">
                            <button type="button">Edit</button>
                        </a>

                        <form action="{{ route('admin.categories.destroy', $category->id) }}"
                              method="POST"
                              style="display:inline;">
                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    onclick="return confirm('Are you sure you want to delete this category?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4"
                        style="border:1px solid black; padding:10px; text-align:center;">
                        No categories .
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

</div>

@endsection