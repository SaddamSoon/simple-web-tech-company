@extends('layouts.admin')

@section('title', 'Content Management')
@section('header', 'Content', 'Management')
@section('content')
<div class="mb-6">
    <a href="{{ route('admin.contents.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded inline-block">
        Add New Content
    </a>
</div>
<div class="bg-white rounded-lg shadow-lg overflow-hidden">
    <table id="contentsTable" class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Section</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach($contents as $content)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">{{ $content->id }}</td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                        {{ $content->section }}
                    </span>
                </td>
                <td class="px-6 py-4">{{ Str::limit($content->title, 50) }}</td>
                <td class="px-6 py-4 whitespace-nowrap">
                    @if($content->image)
                    <span class="text-green-600">Yes</span>
                    @else
                    <span class="text-gray-400">No</span>
                    @endif
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm">
                    <a href="{{ route('admin.contents.edit', $content) }}" class="text-blue-600 hover:text-blue-900 mr-3">Edit</a>
                    <form action="{{ route('admin.contents.destroy', $content) }}" method="POST" class="inline">
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
    $('#contentsTable').DataTable({
        "pageLength": 10,
        "ordering": true,
        "searching": true,
        "responsive": true,
        "language": {
            "search": "Search:",
            "lengthMenu": "Show _MENU_ entries",
            "info": "Showing _START_ to _END_ of _TOTAL_ entries",
            "paginate": {
                "first": "First",
                "last": "Last",
                "next": "Next",
                "previous": "Previous"
            }
        }
    });
});
</script>
@endsection