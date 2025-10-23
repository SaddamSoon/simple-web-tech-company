@extends('layouts.app')

@section('title', 'Gallery - PT Sinar WebTech')

@section('content')
<!-- Page Header -->
<section class="bg-gradient-to-r from-blue-600 to-blue-800 text-white py-12 md:py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-5xl font-bold">Our Gallery</h1>
        <p class="text-lg md:text-xl mt-4">Explore our workspace and team moments</p>
    </div>
</section>

<!-- Gallery Grid -->
<section class="py-12 md:py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6">
            @forelse($galleries as $gallery)
            <div class="group relative overflow-hidden rounded-lg shadow-lg hover:shadow-xl transition cursor-pointer">
                @if(str_starts_with($gallery->image, 'http'))
                <img src="{{ $gallery->image }}" alt="{{ $gallery->title }}" class="w-full h-64 object-cover group-hover:scale-110 transition duration-300">
                @else
                <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->title }}" class="w-full h-64 object-cover group-hover:scale-110 transition duration-300">
                @endif
                <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-60 transition duration-300 flex items-center justify-center">
                    <h3 class="text-white text-lg md:text-xl font-bold opacity-0 group-hover:opacity-100 transition duration-300 px-4 text-center">
                        {{ $gallery->title }}
                    </h3>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-12">
                <p class="text-gray-600 text-lg">No gallery images available at the moment.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>
@endsection

@php
$footerContent = \App\Models\Content::where('section', 'footer')->first();
@endphp