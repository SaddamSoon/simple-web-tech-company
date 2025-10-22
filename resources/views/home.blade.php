@extends('layouts.app')

@section('title', 'Home - PT Sinar WebTech')

@section('content')
<!-- Hero Section -->
<section class="bg-gradient-to-r from-blue-600 to-blue-800 text-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-5xl font-bold mb-4">{{ $hero->title ?? 'Welcome to PT Sinar WebTech' }}</h1>
        <p class="text-xl mb-8">{{ $hero->body ?? 'Your Trusted Partner in Digital Transformation' }}</p>
        <a href="{{ route('services') }}" class="bg-white text-blue-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition">
            Our Services
        </a>
    </div>
</section>

<!-- About Section -->
<section class="py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-gray-800 mb-4">About Us</h2>
            <div class="w-20 h-1 bg-blue-600 mx-auto"></div>
        </div>
        <div class="max-w-3xl mx-auto text-center">
            <p class="text-gray-600 text-lg leading-relaxed">
                {{ Str::limit($about->body ?? '', 200) }}
            </p>
            <a href="{{ route('about') }}" class="inline-block mt-6 text-blue-600 hover:text-blue-800 font-semibold">
                Read More →
            </a>
        </div>
    </div>
</section>

<!-- Services Preview -->
<section class="bg-gray-100 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-gray-800 mb-4">Our Services</h2>
            <div class="w-20 h-1 bg-blue-600 mx-auto"></div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($services as $service)
            <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition">
                @if($service->image)
                <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->title }}" class="w-full h-48 object-cover rounded-lg mb-4">
                @endif
                <h3 class="text-xl font-bold text-gray-800 mb-3">{{ $service->title }}</h3>
                <p class="text-gray-600">{{ Str::limit($service->description, 100) }}</p>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-8">
            <a href="{{ route('services') }}" class="inline-block bg-blue-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-blue-700 transition">
                View All Services
            </a>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="bg-blue-600 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-4xl font-bold mb-4">Ready to Start Your Project?</h2>
        <p class="text-xl mb-8">Let's discuss how we can help transform your business</p>
        <a href="{{ route('contact') }}" class="bg-white text-blue-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition">
            Contact Us
        </a>
    </div>
</section>
@endsection

@php
$footerContent = \App\Models\Content::where('section', 'footer')->first();
@endphp