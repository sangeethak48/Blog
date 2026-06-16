@extends('layouts.app')

@section('content')

<div class="container" style="max-width:600px; margin:auto;">

    <h2 style="text-align:center;">Add Tag</h2>

    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.tags.store') }}" method="POST">
        @csrf

        <label>Name</label><br>
        <input type="text" name="name" value="{{ old('name') }}">

        @error('name')
            <div style="color:red;">{{ $message }}</div>
        @enderror

        <br>

        <label>Slug</label><br>
        <input type="text" name="slug" value="{{ old('slug') }}">

        @error('slug')
            <div style="color:red;">{{ $message }}</div>
        @enderror

        <br><br>

        <button type="submit">Save</button>

        <a href="{{ route('admin.tags.index') }}">
        </a>

    </form>

</div>

@endsection