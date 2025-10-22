@extends('layouts.admin')

@section('title', 'Edit Gallery')
@section('header', 'Edit Gallery')

@section('content')
<div class="bg-white rounded-lg shadow-lg p-6">
    <form action="{{ route('admin.galleries.update', $gallery) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="mb-6">
            <label for="title" class="block text-gray-700 font-semibold mb-2">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title', $gallery->title) }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 @error('title') border-red-500 @enderror">
            @error('title')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="image" class="block text-gray-700 font-semibold mb-2">Image</label>
            <div class="mb-2">
                @if(str_starts_with($gallery->image, 'http'))
                <img src="{{ $gallery->image }}" alt="{{ $gallery->title }}" class="w-32 h-32 object-cover rounded">
                @else
                <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->title }}" class="w-32 h-32 object-cover rounded">
                @endif
                <p class="text-sm text-gray-600 mt-1">Current Image</p>
            </div>
            <input type="file" name="image" id="image" accept="image/*" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 @error('image') border-red-500 @enderror">
            @error('image')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex space-x-4">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded">
                Update Gallery
            </button>
            <a href="{{ route('admin.galleries.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-6 py-2 rounded inline-block">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection