@extends('layouts.app')

@section('content')

<div class="container" style="max-width:600px; margin:auto;">

    <h2 style="text-align:center;">Add Category</h2>

    @if ($errors->any())
        <div style="color:red; margin-bottom:15px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.categories.store') }}" method="POST">
        @csrf

        <label>Name</label><br>
        <input type="text" name="name" value="{{ old('name') }}"><br>

        @error('name')
            <span style="color:red;">{{ $message }}</span><br>
        @enderror

        <br>

        <label>Slug</label><br>
        <input type="text" name="slug" value="{{ old('slug') }}"><br>

        @error('slug')
            <span style="color:red;">{{ $message }}</span><br>
        @enderror

        <br>

        <label>Description</label><br>
        <textarea name="description">{{ old('description') }}</textarea><br>

        @error('description')
            <span style="color:red;">{{ $message }}</span><br>
        @enderror

        <br>

        <button type="submit">Save</button>
    </form>

</div>

@endsection