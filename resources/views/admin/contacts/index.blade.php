@extends('layouts.admin')

@section('title', 'Contact Messages')
@section('header', 'Contact Messages')

@section('content')
<div class="bg-white rounded-lg shadow-lg overflow-hidden">
    <table id="contactsTable" class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Message</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach($contacts as $contact)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">{{ $contact->id }}</td>
                <td class="px-6 py-4">{{ $contact->name }}</td>
                <td class="px-6 py-4">{{ $contact->email }}</td>
                <td class="px-6 py-4">{{ Str::limit($contact->message, 50) }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $contact->created_at->format('d M Y') }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm">
                    <button onclick="showMessage({{ $contact->id }}, '{{ addslashes($contact->name) }}', '{{ addslashes($contact->email) }}', '{{ addslashes($contact->message) }}')" class="text-blue-600 hover:text-blue-900 mr-3">View</button>
                    <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" class="inline">
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
<!-- Modal -->
<div id="messageModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
    <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-3/4 lg:w-1/2 shadow-lg rounded-md bg-white">
        <div class="mt-3">
            <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">Contact Message Details</h3>
            <div class="mt-2 px-7 py-3">
                <div class="mb-4">
                    <p class="text-sm text-gray-500 font-semibold">Name:</p>
                    <p class="text-gray-700" id="modalName"></p>
                </div>
                <div class="mb-4">
                    <p class="text-sm text-gray-500 font-semibold">Email:</p>
                    <p class="text-gray-700" id="modalEmail"></p>
                </div>
                <div class="mb-4">
                    <p class="text-sm text-gray-500 font-semibold">Message:</p>
                    <p class="text-gray-700" id="modalMessage"></p>
                </div>
            </div>
            <div class="items-center px-4 py-3">
                <button onclick="closeModal()" class="px-4 py-2 bg-gray-500 text-white text-base font-medium rounded-md w-full shadow-sm hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-300">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $('#contactsTable').DataTable({
        "pageLength": 10,
        "ordering": true,
        "searching": true,
        "order": [[0, "desc"]]
    });
});

function showMessage(id, name, email, message) {
    document.getElementById('modalName').textContent = name;
    document.getElementById('modalEmail').textContent = email;
    document.getElementById('modalMessage').textContent = message;
    document.getElementById('messageModal').classList.remove('hidden');
}

function closeModal() {
    document.getElementById('messageModal').classList.add('hidden');
}

window.onclick = function(event) {
    const modal = document.getElementById('messageModal');
    if (event.target == modal) {
        closeModal();
    }
}
</script>
@endsection