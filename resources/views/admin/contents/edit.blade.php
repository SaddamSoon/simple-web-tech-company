@extends('layouts.admin')

@section('title', 'Edit Content')
@section('header', 'Edit Content')

@section('content')
<div class="bg-white rounded-lg shadow-lg p-6">
    <form action="{{ route('admin.contents.update', $content) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="mb-6">
            <label for="section" class="block text-gray-700 font-semibold mb-2">Section</label>
            <select name="section" id="section" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 @error('section') border-red-500 @enderror">
                <option value="">-- Select Section --</option>
                <option value="hero" {{ old('section', $content->section) == 'hero' ? 'selected' : '' }}>Hero</option>
                <option value="about" {{ old('section', $content->section) == 'about' ? 'selected' : '' }}>About</option>
                <option value="footer" {{ old('section', $content->section) == 'footer' ? 'selected' : '' }}>Footer</option>
            </select>
            @error('section')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="title" class="block text-gray-700 font-semibold mb-2">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title', $content->title) }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 @error('title') border-red-500 @enderror">
            @error('title')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="body" class="block text-gray-700 font-semibold mb-2">Body</label>
            <textarea name="body" id="body" rows="8" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 @error('body') border-red-500 @enderror">{{ old('body', $content->body) }}</textarea>
            @error('body')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="image" class="block text-gray-700 font-semibold mb-2">Image (Optional)</label>
            @if($content->image)
            <div class="mb-2">
                <img src="{{ asset('storage/' . $content->image) }}" alt="Current Image" class="w-32 h-32 object-cover rounded">
                <p class="text-sm text-gray-600 mt-1">Current Image</p>
            </div>
            @endif
            <input type="file" name="image" id="image" accept="image/*" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 @error('image') border-red-500 @enderror">
            @error('image')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex space-x-4">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded">
                Update Content
            </button>
            <a href="{{ route('admin.contents.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-6 py-2 rounded inline-block">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection