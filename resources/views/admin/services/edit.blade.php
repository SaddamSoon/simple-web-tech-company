@extends('layouts.admin')

@section('title', 'Edit Service')
@section('header', 'Edit Service')

@section('content')
<div class="bg-white rounded-lg shadow-lg p-6">
    <form action="{{ route('admin.services.update', $service) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="mb-6">
            <label for="title" class="block text-gray-700 font-semibold mb-2">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title', $service->title) }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 @error('title') border-red-500 @enderror">
            @error('title')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="description" class="block text-gray-700 font-semibold mb-2">Description</label>
            <textarea name="description" id="description" rows="6" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 @error('description') border-red-500 @enderror">{{ old('description', $service->description) }}</textarea>
            @error('description')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="image" class="block text-gray-700 font-semibold mb-2">Image (Optional)</label>
            @if($service->image)
            <div class="mb-2">
                <img src="{{ asset('storage/' . $service->image) }}" alt="Current Image" class="w-32 h-32 object-cover rounded">
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
                Update Service
            </button>
            <a href="{{ route('admin.services.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-6 py-2 rounded inline-block">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection