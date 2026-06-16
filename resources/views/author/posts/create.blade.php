@extends('layouts.app')

@section('content')

<div class="container mx-auto">

    <div class="bg-white p-6 rounded shadow">

        <h2 class="text-2xl font-bold mb-6">
            Create New Post
        </h2>

        <form action="{{ route('author.posts.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label>Title</label>

                <input type="text"
                       name="title"
                       class="w-full border rounded p-2"
                       required>
            </div>

            <div class="mb-4">
                <label>Slug</label>

                <input type="text"
                       name="slug"
                       class="w-full border rounded p-2"
                       required>
            </div>

            <div class="mb-4">
                <label>Content</label>

                <textarea name="content"
                          rows="5"
                          class="w-full border rounded p-2"
                          required></textarea>
            </div>

            <div class="mb-4">
                <label>Category</label>

                <select name="categories_id"
                        class="w-full border rounded p-2"
                        required>

                    <option value="">
                        Select Category
                    </option>

                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">
                            {{ $category->name }}
                        </option>
                    @endforeach

                </select>
            </div>

            <div class="mb-4">
                <label>Status</label>

                <select name="status"
                        class="w-full border rounded p-2"
                        required>

                    <option value="published">
                        Published
                    </option>

                    <option value="draft">
                        Draft
                    </option>

                </select>
            </div>

            <div class="flex gap-2">

                <a href="{{ route('author.posts.index') }}"
                   class="bg-gray-500 text-white px-4 py-2 rounded">
                    Cancel
                </a>

                <button type="submit"
                        class="bg-indigo-600 text-white px-4 py-2 rounded">
                    Save Post
                </button>

            </div>

        </form>

    </div>

</div>

@endsection