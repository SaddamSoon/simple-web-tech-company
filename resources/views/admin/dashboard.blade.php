@extends('layouts.admin')

@section('title', 'Dashboard')
@section('header', 'Dashboard')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div class="bg-white rounded-lg shadow-lg p-6">
        <div class="flex items-center">
            <div class="flex-1">
                <h3 class="text-gray-500 text-sm font-semibold uppercase">Total Services</h3>
                <p class="text-3xl font-bold text-gray-800">{{ $stats['services'] }}</p>
            </div>
            <div class="bg-blue-100 rounded-full p-3">
                <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                </svg>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-lg p-6">
        <div class="flex items-center">
            <div class="flex-1">
                <h3 class="text-gray-500 text-sm font-semibold uppercase">Gallery Images</h3>
                <p class="text-3xl font-bold text-gray-800">{{ $stats['galleries'] }}</p>
            </div>
            <div class="bg-green-100 rounded-full p-3">
                <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-lg p-6">
        <div class="flex items-center">
            <div class="flex-1">
                <h3 class="text-gray-500 text-sm font-semibold uppercase">Contact Messages</h3>
                <p class="text-3xl font-bold text-gray-800">{{ $stats['contacts'] }}</p>
            </div>
            <div class="bg-yellow-100 rounded-full p-3">
                <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                </svg>
            </div>
        </div>
    </div>
</div>

<div class="bg-white rounded-lg shadow-lg p-6">
    <h2 class="text-2xl font-bold text-gray-800 mb-4">Welcome to Admin Panel</h2>
    <p class="text-gray-600 mb-4">Manage your website content from this dashboard. Use the sidebar navigation to access different sections.</p>
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-6">
        <a href="{{ route('admin.contents.index') }}" class="block p-4 bg-blue-50 rounded-lg hover:bg-blue-100 transition">
            <h3 class="font-bold text-gray-800 mb-2">Content Management</h3>
            <p class="text-gray-600 text-sm">Manage hero, about, and footer content</p>
        </a>
        <a href="{{ route('admin.services.index') }}" class="block p-4 bg-green-50 rounded-lg hover:bg-green-100 transition">
            <h3 class="font-bold text-gray-800 mb-2">Services</h3>
            <p class="text-gray-600 text-sm">Add, edit, or remove services</p>
        </a>
        <a href="{{ route('admin.galleries.index') }}" class="block p-4 bg-purple-50 rounded-lg hover:bg-purple-100 transition">
            <h3 class="font-bold text-gray-800 mb-2">Gallery</h3>
            <p class="text-gray-600 text-sm">Upload and manage gallery images</p>
        </a>
        <a href="{{ route('admin.contacts.index') }}" class="block p-4 bg-yellow-50 rounded-lg hover:bg-yellow-100 transition">
            <h3 class="font-bold text-gray-800 mb-2">Contact Messages</h3>
            <p class="text-gray-600 text-sm">View and manage contact form submissions</p>
        </a>
    </div>
</div>
@endsection