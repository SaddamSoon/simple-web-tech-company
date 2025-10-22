@extends('layouts.admin')

@section('title', 'Services Management')
@section('header', 'Services Management')

@section('content')
<div class="mb-6">
    <a href="{{ route('admin.services.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded inline-block">
        Add New Service
    </a>
</div>

<div class="bg-white rounded-lg shadow-lg overflow-hidden">
    <table id="servicesTable" class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach($services as $service)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">{{ $service->id }}</td>
                <td class="px-6 py-4">{{ $service->title }}</td>
                <td class="px-6 py-4">{{ Str::limit($service->description, 50) }}</td>
                <td class="px-6 py-4 whitespace-nowrap">
                    @if($service->image)
                    <span class="text-green-600">Yes</span>
                    @else
                    <span class="text-gray-400">No</span>
                    @endif
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm">
                    <a href="{{ route('admin.services.edit', $service) }}" class="text-blue-600 hover:text-blue-900 mr-3">Edit</a>
                    <form action="{{ route('admin.services.destroy', $service) }}" method="POST" class="inline">
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
    $('#servicesTable').DataTable({
        "pageLength": 10,
        "ordering": true,
        "searching": true
    });
});
</script>
@endsection