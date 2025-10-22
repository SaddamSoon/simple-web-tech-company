@extends('layouts.admin')

@section('title', 'Gallery Management')
@section('header', 'Gallery Management')

@section('content')
<div class="mb-6">
    <a href="{{ route('admin.galleries.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded inline-block">
        Add New Gallery
    </a>
</div>

<div class="bg-white rounded-lg shadow-lg overflow-hidden">
    <table id="galleriesTable" class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach($galleries as $gallery)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">{{ $gallery->id }}</td>
                <td class="px-6 py-4">{{ $gallery->title }}</td>
                <td class="px-6 py-4">
                    @if(str_starts_with($gallery->image, 'http'))
                    <img src="{{ $gallery->image }}" alt="{{ $gallery->title }}" class="w-16 h-16 object-cover rounded">
                    @else
                    <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->title }}" class="w-16 h-16 object-cover rounded">
                    @endif
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm">
                    <a href="{{ route('admin.galleries.edit', $gallery) }}" class="text-blue-600 hover:text-blue-900 mr-3">Edit</a>
                    <form action="{{ route('admin.galleries.destroy', $gallery) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
$(document).ready(function() {
    $('#galleriesTable').DataTable({
        "pageLength": 10,
        "ordering": true,
        "searching": true
    });
});
</script>
@endsection