@extends('layouts.app')

@section('title', 'About Us - PT Sinar WebTech')

@section('content')
<!-- Page Header -->
<section class="bg-gradient-to-r from-blue-600 to-blue-800 text-white py-12 md:py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-5xl font-bold">About Us</h1>
    </div>
</section>

<!-- About Content -->
<section class="py-12 md:py-16">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-lg shadow-lg p-6 md:p-8">
            @if($about)
                <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-6">{{ $about->title }}</h2>
                @if($about->image)
                <img src="{{ asset('storage/' . $about->image) }}" alt="{{ $about->title }}" class="w-full rounded-lg mb-6 shadow-md">
                @endif
                <div class="text-gray-600 text-base md:text-lg leading-relaxed">
                    {!! nl2br(e($about->body)) !!}
                </div>
            @else
                <p class="text-gray-600">Content not available.</p>
            @endif
        </div>

        <!-- Why Choose Us -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8 mt-12">
            <div class="bg-blue-50 rounded-lg p-6">
                <div class="flex items-center mb-3">
                    <div class="bg-blue-600 rounded-full p-2 mr-3">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800">Our Mission</h3>
                </div>
                <p class="text-gray-600">Memberikan solusi teknologi terbaik yang membantu bisnis berkembang di era digital dengan inovasi dan pelayanan terbaik.</p>
            </div>
            <div class="bg-blue-50 rounded-lg p-6">
                <div class="flex items-center mb-3">
                    <div class="bg-blue-600 rounded-full p-2 mr-3">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800">Our Vision</h3>
                </div>
                <p class="text-gray-600">Menjadi perusahaan teknologi terdepan yang dipercaya oleh klien di seluruh Indonesia dan Asia Tenggara.</p>
            </div>
        </div>
    </div>
</section>
@endsection

@php
$footerContent = \App\Models\Content::where('section', 'footer')->first();
@endphp