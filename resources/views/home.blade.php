@extends('layouts.app')

@section('title', 'Home - PT Sinar WebTech')

@section('content')
<!-- Hero Section -->
<section class="bg-gradient-to-r from-blue-600 to-blue-800 text-white py-12 md:py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
            <div class="text-center md:text-left">
                <h1 class="text-3xl md:text-5xl font-bold mb-4">{{ $hero->title ?? 'Welcome to PT Sinar WebTech' }}</h1>
                <p class="text-lg md:text-xl mb-8">{{ $hero->body ?? 'Your Trusted Partner in Digital Transformation' }}</p>
                <a href="{{ route('services') }}" class="inline-block bg-white text-blue-600 px-6 md:px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition">
                    Our Services
                </a>
            </div>
            @if($hero && $hero->image)
            <div class="flex justify-center md:justify-end">
                <img src="{{ asset('storage/' . $hero->image) }}" alt="{{ $hero->title }}" class="rounded-lg shadow-2xl w-full max-w-md">
            </div>
            @endif
        </div>
    </div>
</section>

<!-- About Section -->
<section class="py-12 md:py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-8 md:mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">About Us</h2>
            <div class="w-20 h-1 bg-blue-600 mx-auto"></div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
            @if($about && $about->image)
            <div class="order-2 md:order-1">
                <img src="{{ asset('storage/' . $about->image) }}" alt="{{ $about->title }}" class="rounded-lg shadow-lg w-full">
            </div>
            @endif
            <div class="order-1 md:order-2">
                <p class="text-gray-600 text-base md:text-lg leading-relaxed">
                    {{ Str::limit($about->body ?? '', 300) }}
                </p>
                <a href="{{ route('about') }}" class="inline-block mt-6 text-blue-600 hover:text-blue-800 font-semibold">
                    Read More →
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Services Preview -->
<section class="bg-gray-100 py-12 md:py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-8 md:mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Our Services</h2>
            <div class="w-20 h-1 bg-blue-600 mx-auto"></div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
            @foreach($services as $service)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition">
                @if($service->image)
                <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->title }}" class="w-full h-48 object-cover">
                @else
                <div class="w-full h-48 bg-gradient-to-r from-blue-400 to-blue-600"></div>
                @endif
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-3">{{ $service->title }}</h3>
                    <p class="text-gray-600">{{ Str::limit($service->description, 100) }}</p>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-8">
            <a href="{{ route('services') }}" class="inline-block bg-blue-600 text-white px-6 md:px-8 py-3 rounded-lg font-semibold hover:bg-blue-700 transition">
                View All Services
            </a>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="bg-blue-600 text-white py-12 md:py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-4">Ready to Start Your Project?</h2>
        <p class="text-lg md:text-xl mb-8">Let's discuss how we can help transform your business</p>
        <a href="{{ route('contact') }}" class="inline-block bg-white text-blue-600 px-6 md:px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition">
            Contact Us
        </a>
    </div>
</section>
@endsection

@php
$footerContent = \App\Models\Content::where('section', 'footer')->first();
@endphp