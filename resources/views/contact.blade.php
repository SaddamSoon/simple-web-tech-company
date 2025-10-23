@extends('layouts.app')

@section('title', 'Contact Us - PT Sinar WebTech')

@section('content')
<!-- Page Header -->
<section class="bg-gradient-to-r from-blue-600 to-blue-800 text-white py-12 md:py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-5xl font-bold">Contact Us</h1>
        <p class="text-lg md:text-xl mt-4">We'd love to hear from you</p>
    </div>
</section>

<!-- Contact Form -->
<section class="py-12 md:py-16">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
            {{ session('success') }}
        </div>
        @endif

        <div class="bg-white rounded-lg shadow-lg p-6 md:p-8">
            <form action="{{ route('contact.store') }}" method="POST">
                @csrf
                <div class="mb-6">
                    <label for="name" class="block text-gray-700 font-semibold mb-2">Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 @error('name') border-red-500 @enderror">
                    @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="email" class="block text-gray-700 font-semibold mb-2">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 @error('email') border-red-500 @enderror">
                    @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="message" class="block text-gray-700 font-semibold mb-2">Message</label>
                    <textarea id="message" name="message" rows="6" required
                              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 @error('message') border-red-500 @enderror">{{ old('message') }}</textarea>
                    @error('message')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="w-full bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-700 transition">
                    Send Message
                </button>
            </form>
        </div>

        <!-- Contact Info -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-12">
            <div class="bg-blue-50 rounded-lg p-6 text-center">
                <div class="bg-blue-600 rounded-full w-12 h-12 flex items-center justify-center mx-auto mb-3">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                </div>
                <h3 class="font-bold text-gray-800 mb-2">Address</h3>
                <p class="text-gray-600 text-sm">Jl. Teknologi No. 123<br>Jakarta Selatan, Indonesia</p>
            </div>
            <div class="bg-blue-50 rounded-lg p-6 text-center">
                <div class="bg-blue-600 rounded-full w-12 h-12 flex items-center justify-center mx-auto mb-3">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                    </svg>
                </div>
                <h3 class="font-bold text-gray-800 mb-2">Phone</h3>
                <p class="text-gray-600 text-sm">+62 21 1234 5678</p>
            </div>
            <div class="bg-blue-50 rounded-lg p-6 text-center">
                <div class="bg-blue-600 rounded-full w-12 h-12 flex items-center justify-center mx-auto mb-3">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <h3 class="font-bold text-gray-800 mb-2">Email</h3>
                <p class="text-gray-600 text-sm">info@webtech.test</p>
            </div>
            </div>
            </div>
            </section>
            @endsection
@php
$footerContent = \App\Models\Content::where('section', 'footer')->first();
@endphp