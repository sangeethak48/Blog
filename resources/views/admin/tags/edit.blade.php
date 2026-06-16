@extends('layouts.app')

@section('content')
<div class="container" style="text-align:center;">
<div class="container">
    <h2>Edit Tag</h2>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li style="color:red;">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.tags.update', $tag->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label>Name</label><br>
            <input type="text" name="name" value="{{ old('name', $tag->name) }}">
        </div>

        <br>

        <div>
            <label>Slug</label><br>
            <input type="text" name="slug" value="{{ old('slug', $tag->slug) }}">
        </div>

        <br>
        <button type="submit">Update</button>
        <a href="{{ route('admin.tags.index') }}">
        </a>
    </form>
</div>

@endsection