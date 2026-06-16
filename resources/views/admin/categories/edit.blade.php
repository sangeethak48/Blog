@extends('layouts.app')
@section('content')
<div class="container" style="text-align:center;">
<div class="container">
    <h2>Edit Category</h2>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li style="color:red;">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label>Name</label><br>
            <input type="text" name="name" value="{{ old('name', $category->name) }}">
        </div>

        <br>

        <div>
            <label>Slug</label><br>
            <input type="text" name="slug" value="{{ old('slug', $category->slug) }}">
        </div>

        <br>

        <div>
            <label>Description</label><br>
            <textarea name="description" rows="4">{{ old('description', $category->description) }}</textarea>
        </div>

        <br>

        <button type="submit">Update Category</button>

        <a href="{{ route('admin.categories.index') }}">
            <button type="button">Cancel</button>
        </a>
    </form>
</div>

@endsection