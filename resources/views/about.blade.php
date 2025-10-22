@extends('layouts.app')

@section('title', 'About Us - PT Sinar WebTech')

@section('content')
<!-- Page Header -->
<section class="bg-gradient-to-r from-blue-600 to-blue-800 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-5xl font-bold">About Us</h1>
    </div>
</section>

<!-- About Content -->
<section class="py-16">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-lg shadow-lg p-8">
            @if($about)
                <h2 class="text-3xl font-bold text-gray-800 mb-6">{{ $about->title }}</h2>
                @if($about->image)
                <img src="{{ asset('storage/' . $about->image) }}" alt="{{ $about->title }}" class="w-full rounded-lg mb-6">
                @endif
                <div class="text-gray-600 text-lg leading-relaxed">
                    {!! nl2br(e($about->body)) !!}
                </div>
            @else
                <p class="text-gray-600">Content not available.</p>
            @endif
        </div>

        <!-- Why Choose Us -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-12">
            <div class="bg-blue-50 rounded-lg p-6">
                <h3 class="text-xl font-bold text-gray-800 mb-3">Our Mission</h3>
                <p class="text-gray-600">Memberikan solusi teknologi terbaik yang membantu bisnis berkembang di era digital dengan inovasi dan pelayanan terbaik.</p>
            </div>
            <div class="bg-blue-50 rounded-lg p-6">
                <h3 class="text-xl font-bold text-gray-800 mb-3">Our Vision</h3>
                <p class="text-gray-600">Menjadi perusahaan teknologi terdepan yang dipercaya oleh klien di seluruh Indonesia dan Asia Tenggara.</p>
            </div>
        </div>
    </div>
</section>
@endsection

@php
$footerContent = \App\Models\Content::where('section', 'footer')->first();
@endphp