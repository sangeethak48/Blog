@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-gradient-to-br from-slate-50 to-slate-100 py-12 px-4">

    <div class="max-w-2xl mx-auto">

        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Add New Tag</h1>
            <p class="text-gray-600 mt-2">Create a new tag for organizing blog posts</p>
        </div>

        <div class="bg-white rounded-lg shadow-md p-8">

            <!-- Error Messages -->
            @if ($errors->any())
                <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-lg">
                    <h3 class="text-red-800 font-semibold mb-2 flex items-center gap-2">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                        </svg>
                        Please fix the following errors:
                    </h3>
                    <ul class="list-disc list-inside text-red-700 space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.tags.store') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Name Field -->
                <div>
                    <label for="name" class="block text-sm font-semibold text-gray-900 mb-2">
                        Tag Name <span class="text-red-500">*</span>
                    </label>
                    <input type="text"
                           id="name"
                           name="name"
                           value="{{ old('name') }}"
                           placeholder="e.g., Laravel, PHP, Web Development"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all duration-200 @error('name') border-red-500 @enderror"
                           required>
                    @error('name')
                        <p class="mt-1 text-sm text-red-600 flex items-center gap-1">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18.169 12.476l-4.604-4.604a2 2 0 00-2.828 0L9 8.393V4a2 2 0 00-2-2H4a2 2 0 00-2 2v3a2 2 0 002 2h4.393l.717.717a2 2 0 000 2.828l4.604 4.604a2 2 0 102.828-2.828zM16 10a2 2 0 11-4 0 2 2 0 014 0z" clip-rule="evenodd"/>
                            </svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Slug Field -->
                <div>
                    <label for="slug" class="block text-sm font-semibold text-gray-900 mb-2">
                        Slug <span class="text-red-500">*</span>
                    </label>
                    <input type="text"
                           id="slug"
                           name="slug"
                           value="{{ old('slug') }}"
                           placeholder="e.g., laravel, php, web-development"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all duration-200 @error('slug') border-red-500 @enderror"
                           required>
                    <p class="mt-1 text-sm text-gray-500">Use lowercase letters, numbers, and hyphens only</p>
                    @error('slug')
                        <p class="mt-1 text-sm text-red-600 flex items-center gap-1">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18.169 12.476l-4.604-4.604a2 2 0 00-2.828 0L9 8.393V4a2 2 0 00-2-2H4a2 2 0 00-2 2v3a2 2 0 002 2h4.393l.717.717a2 2 0 000 2.828l4.604 4.604a2 2 0 102.828-2.828zM16 10a2 2 0 11-4 0 2 2 0 014 0z" clip-rule="evenodd"/>
                            </svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Action Buttons -->
                <div class="flex gap-4 pt-6 border-t border-gray-200">
                    <a href="{{ route('admin.tags.index') }}" class="flex-1 px-6 py-3 bg-gray-100 text-gray-700 rounded-lg font-semibold hover:bg-gray-200 transition-colors duration-200 text-center">
                        Cancel
                    </a>
                    <button type="submit" class="flex-1 px-6 py-3 bg-gradient-to-r from-emerald-600 to-emerald-700 text-white rounded-lg font-semibold hover:shadow-lg transition-all duration-200">
                        Create Tag
                    </button>
                </div>

            </form>

        </div>

    </div>

</div>

@endsection
