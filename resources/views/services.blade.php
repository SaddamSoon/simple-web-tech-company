@extends('layouts.app')

@section('title', 'Services - PT Sinar WebTech')

@section('content')
<!-- Page Header -->
<section class="bg-gradient-to-r from-blue-600 to-blue-800 text-white py-12 md:py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-5xl font-bold">Our Services</h1>
        <p class="text-lg md:text-xl mt-4">Comprehensive digital solutions for your business</p>
    </div>
</section>

<!-- Services Grid -->
<section class="py-12 md:py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
            @forelse($services as $service)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition">
                @if($service->image)
                <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->title }}" class="w-full h-48 object-cover">
                @else
                <div class="w-full h-48 bg-gradient-to-r from-blue-400 to-blue-600 flex items-center justify-center">
                    <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                </div>
                @endif
                <div class="p-6">
                    <h3 class="text-xl md:text-2xl font-bold text-gray-800 mb-3">{{ $service->title }}</h3>
                    <p class="text-gray-600 text-sm md:text-base leading-relaxed">{{ $service->description }}</p>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-12">
                <p class="text-gray-600 text-lg">No services available at the moment.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="bg-gray-100 py-12 md:py-16">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-4">Interested in Our Services?</h2>
        <p class="text-gray-600 text-base md:text-lg mb-8">Contact us today to discuss your project requirements</p>
        <a href="{{ route('contact') }}" class="inline-block bg-blue-600 text-white px-6 md:px-8 py-3 rounded-lg font-semibold hover:bg-blue-700 transition">
            Get in Touch
        </a>
    </div>
</section>
@endsection

@php
$footerContent = \App\Models\Content::where('section', 'footer')->first();
@endphp