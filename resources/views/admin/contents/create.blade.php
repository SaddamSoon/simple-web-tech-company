@extends('layouts.admin')

@section('title', 'Create Content')
@section('header', 'Create New Content')

@section('content')
<div class="bg-white rounded-lg shadow-lg p-6">
    <form action="{{ route('admin.contents.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="mb-6">
            <label for="section" class="block text-gray-700 font-semibold mb-2">Section</label>
            <select name="section" id="section" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 @error('section') border-red-500 @enderror">
                <option value="">-- Select Section --</option>
                <option value="hero" {{ old('section') == 'hero' ? 'selected' : '' }}>Hero</option>
                <option value="about" {{ old('section') == 'about' ? 'selected' : '' }}>About</option>
                <option value="footer" {{ old('section') == 'footer' ? 'selected' : '' }}>Footer</option>
            </select>
            @error('section')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="title" class="block text-gray-700 font-semibold mb-2">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 @error('title') border-red-500 @enderror">
            @error('title')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="body" class="block text-gray-700 font-semibold mb-2">Body</label>
            <textarea name="body" id="body" rows="8" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 @error('body') border-red-500 @enderror">{{ old('body') }}</textarea>
            @error('body')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="image" class="block text-gray-700 font-semibold mb-2">Image (Optional)</label>
            <input type="file" name="image" id="image" accept="image/*" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 @error('image') border-red-500 @enderror">
            @error('image')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex space-x-4">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded">
                Create Content
            </button>
            <a href="{{ route('admin.contents.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-6 py-2 rounded inline-block">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection